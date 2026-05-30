<?php
/**
 * Online
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @author    OpenTibiaBR
 * @copyright 2023 MyAAC
 * @link      https://github.com/opentibiabr/myaac
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Who is online?';

if($config['account_country'])
	require SYSTEM . 'countries.conf.php';

$promotion = '';
if($db->hasColumn('players', 'promotion'))
	$promotion = '`promotion`,';
$order = isset($_GET['order']) ? $_GET['order'] : 'name';
if(!in_array($order, array('country', 'name', 'level', 'vocation')))
	$order = $db->fieldName('name');
else if($order == 'country')
	$order = $db->tableName('accounts') . '.' . $db->fieldName('country');
else if($order == 'vocation')
	$order = $promotion . 'vocation ASC';

$skull_type = 'skull';
if($db->hasColumn('players', 'skull_type')) {
	$skull_type = 'skull_type';
}

$skull_time = 'skulltime';
if($db->hasColumn('players', 'skull_time')) {
	$skull_time = 'skull_time';
}

$outfit_addons = false;
$outfit = '';
if($config['online_outfit']) {
	$outfit = ', lookbody, lookfeet, lookhead, looklegs, looktype';
	if($db->hasColumn('players', 'lookaddons')) {
		$outfit .= ', lookaddons';
		$outfit_addons = true;
	}
}

if($config['online_vocations']) {
	$vocs = array();
	foreach($config['vocations'] as $id => $name) {
		$vocs[$id] = 0;
	}
}

if($db->hasTable('players_online')) // tfs 1.0
	$playersOnline = $db->query('SELECT `accounts`.`country`, `players`.`name`, `players`.`level`, `players`.`vocation`' . ($promotion ? ', ' . rtrim($promotion, ',') : '') . $outfit . ', `' . $skull_time . '` as `skulltime`, `' . $skull_type . '` as `skull` FROM `accounts`, `players`, `players_online` WHERE `players`.`id` = `players_online`.`player_id` AND `accounts`.`id` = `players`.`account_id`  ORDER BY ' . $order);
else
	$playersOnline = $db->query('SELECT `accounts`.`country`, `players`.`name`, `players`.`level`, `players`.`vocation`' . $outfit . ', ' . $promotion . ' `' . $skull_time . '` as `skulltime`, `' . $skull_type . '` as `skull` FROM `accounts`, `players` WHERE `players`.`online` > 0 AND `accounts`.`id` = `players`.`account_id`  ORDER BY ' . $order);

$players_data = array();
$explodeFlags = array();
$players = 0;
$data = '';
foreach($playersOnline as $player){
	$skull = '';
	if($config['online_skulls'])
	{
		if($player['skulltime'] > 0)
		{
			if($player['skull'] == 3)
				$skull = ' <img style="border: 0;" src="images/white_skull.gif"/>';
			elseif($player['skull'] == 4)
				$skull = ' <img style="border: 0;" src="images/red_skull.gif"/>';
			elseif($player['skull'] == 5)
				$skull = ' <img style="border: 0;" src="images/black_skull.gif"/>';
		}
	}

	if(isset($player['promotion'])) {
		if((int)$player['promotion'] > 0)
			$player['vocation'] += ($player['promotion'] * $config['vocations_amount']);
	}

	$players_data[] = array(
		'name' => getPlayerLink($player['name']),
		'display_name' => $player['name'],
		'url' => getPlayerLink($player['name'], false),
		'player' => $player,
		'level' => $player['level'],
		'vocation' => $config['vocations'][$player['vocation']] ?? 'Unknown',
		'skull' => $skull,
		'country_image' => $config['account_country'] ? getFlagImage($player['country']) : null,
		'outfit' => $config['online_outfit'] ? $config['outfit_images_url'] . '?id=' . $player['looktype'] . ($outfit_addons ? '&addons=' . $player['lookaddons'] : '') . '&head=' . $player['lookhead'] . '&body=' . $player['lookbody'] . '&legs=' . $player['looklegs'] . '&feet=' . $player['lookfeet'] : null
	);

	if($config['online_vocations']) {
		$vocs[($player['vocation'] > $config['vocations_amount'] ? $player['vocation'] - $config['vocations_amount'] : $player['vocation'])]++;
	}
}

if(empty($players_data) && !empty($status['players']) && class_exists('OTS_ServerInfo')) {
	$statusHost = $status_ip ?? ($config['status_ip'] ?? ($config['lua']['ip'] ?? '127.0.0.1'));
	$statusPort = $status_port ?? ($config['status_port'] ?? ($config['lua']['statusPort'] ?? 7171));
	$serverInfo = new OTS_ServerInfo($statusHost, $statusPort);
	$serverStatus = $serverInfo->info(OTS_ServerStatus::REQUEST_PLAYERS_INFO | OTS_ServerStatus::REQUEST_EXT_PLAYERS_INFO);
	$statusPlayers = $serverStatus ? $serverStatus->getPlayers() : array();

	if(!empty($statusPlayers)) {
		$playerNames = array_keys($statusPlayers);
		$quotedNames = array();
		foreach($playerNames as $playerName) {
			$quotedNames[] = $db->quote($playerName);
		}

		$selectPromotion = $promotion ? ', ' . rtrim($promotion, ',') : '';
		$onlineRows = $db->query('SELECT `accounts`.`country`, `players`.`name`, `players`.`level`, `players`.`vocation`' . $selectPromotion . $outfit . ', `' . $skull_time . '` as `skulltime`, `' . $skull_type . '` as `skull` FROM `accounts`, `players` WHERE `players`.`name` IN (' . implode(', ', $quotedNames) . ') AND `accounts`.`id` = `players`.`account_id`')->fetchAll();
		$playersByName = array();
		foreach($onlineRows as $onlineRow) {
			$playersByName[strtolower($onlineRow['name'])] = $onlineRow;
		}

		foreach($playerNames as $playerName) {
			$key = strtolower($playerName);
			$player = $playersByName[$key] ?? array(
				'country' => '',
				'name' => $playerName,
				'level' => $statusPlayers[$playerName],
				'vocation' => 0,
				'skulltime' => 0,
				'skull' => 0,
			);

			$skull = '';
			if($config['online_skulls'] && !empty($player['skulltime'])) {
				if($player['skull'] == 3)
					$skull = ' <img style="border: 0;" src="images/white_skull.gif"/>';
				elseif($player['skull'] == 4)
					$skull = ' <img style="border: 0;" src="images/red_skull.gif"/>';
				elseif($player['skull'] == 5)
					$skull = ' <img style="border: 0;" src="images/black_skull.gif"/>';
			}

			if(isset($player['promotion']) && (int)$player['promotion'] > 0)
				$player['vocation'] += ($player['promotion'] * $config['vocations_amount']);

			$players_data[] = array(
				'name' => getPlayerLink($player['name']),
				'display_name' => $player['name'],
				'url' => getPlayerLink($player['name'], false),
				'player' => $player,
				'level' => $player['level'],
				'vocation' => $config['vocations'][$player['vocation']] ?? 'Unknown',
				'skull' => $skull,
				'country_image' => $config['account_country'] && !empty($player['country']) ? getFlagImage($player['country']) : null,
				'outfit' => ($config['online_outfit'] && !empty($player['looktype']) ? $config['outfit_images_url'] . '?id=' . $player['looktype'] . ($outfit_addons && isset($player['lookaddons']) ? '&addons=' . $player['lookaddons'] : '') . '&head=' . $player['lookhead'] . '&body=' . $player['lookbody'] . '&legs=' . $player['looklegs'] . '&feet=' . $player['lookfeet'] : null),
			);

			if($config['online_vocations'] && isset($vocs[$player['vocation'] > $config['vocations_amount'] ? $player['vocation'] - $config['vocations_amount'] : $player['vocation']])) {
				$vocs[($player['vocation'] > $config['vocations_amount'] ? $player['vocation'] - $config['vocations_amount'] : $player['vocation'])]++;
			}
		}
	}
}

$record = '';
if($config['online_record']){
	$timestamp = false;
	if($db->hasTable('server_record')) {
		$query =
			$db->query(
				'SELECT `record`, `timestamp` FROM `server_record` WHERE `world_id` = ' . (int)$config['lua']['worldId'] .
				' ORDER BY `record` DESC LIMIT 1');
		$timestamp = true;
	}else if($db->hasTable('server_config')) { // tfs 1.0
		$query = $db->query('SELECT `timestamp`, `value` as `record` FROM `server_config` WHERE `config` = ' . $db->quote('players_record'));
	}else{
		$query = NULL;
	}

	if(isset($query) && $query->rowCount() > 0){
		$result = $query->fetch();
		$record = '' . $result['record'] . ' players<br><small>'.date('d/m/Y, H:i:s', strtotime($result['timestamp'])).'</small>';
	}
}

$twig->display('online.html.twig', array(
	'players' => $players_data,
	'record' => $record,
	'current_date' => date('d/m/Y'),
	'vocs' => $vocs,
));

//search bar
$twig->display('online.form.html.twig');
