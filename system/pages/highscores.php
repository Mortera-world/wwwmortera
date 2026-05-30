<?php
/**
 * Highscores
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @author    OpenTibiaBR
 * @copyright 2023 MyAAC
 * @link      https://github.com/opentibiabr/myaac
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Highscores';

if($config['account_country'] && $config['highscores_country_box'])
	require SYSTEM . 'countries.conf.php';

$list = $_GET['list'] ?? '';
$_page = $_GET['page'] ?? 0;
$vocation = $_GET['vocation'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$rank_vocation = trim((string)($_POST['profession'] ?? ''));
	$rank_category = trim((string)($_POST['category'] ?? 'experience'));
	$allowed_categories = array('axe', 'club', 'distance', 'experience', 'fishing', 'fist', 'magic', 'shield', 'sword', 'frags', 'balance');

	if(!in_array($rank_category, $allowed_categories, true)) {
		$rank_category = 'experience';
	}

	$target = getLink('highscores') . '/' . $rank_category;
	if($rank_vocation !== '') {
		$target .= '/' . strtolower($rank_vocation);
	}

	header('Location: ' . $target);
	exit;
}

if (!is_numeric($_page) || $_page < 0 || $_page > PHP_INT_MAX) {
    $_page = 0;
}

$add_sql = '';
$config_vocations = $config['vocations'];
if($config['highscores_vocation_box'] && isset($vocation))
{
	foreach($config['vocations'] as $id => $name) {
		if(strtolower($name) == $vocation) {
			$add_vocs = array($id);

			$i = $id + $config['vocations_amount'];
			while(isset($config['vocations'][$i])) {
				$add_vocs[] = $i;
				$i += $config['vocations_amount'];
			}

			$add_sql = 'AND `vocation` IN (' . implode(', ', $add_vocs) . ')';
			break;
		}
	}
}

define('SKILL_FRAGS', -1);
define('SKILL_BALANCE', -2);

$skill = POT::SKILL__LEVEL;
if(is_numeric($list))
{
	$list = (int) $list;
	if($list >= POT::SKILL_FIRST && $list <= POT::SKILL__LAST)
		$skill = $list;
}
else
{
	switch($list)
	{
		case 'fist':
			$skill = POT::SKILL_FIST;
			break;

		case 'club':
			$skill = POT::SKILL_CLUB;
			break;

		case 'sword':
			$skill = POT::SKILL_SWORD;
			break;

		case 'axe':
			$skill = POT::SKILL_AXE;
			break;

		case 'distance':
			$skill = POT::SKILL_DIST;
			break;

		case 'shield':
			$skill = POT::SKILL_SHIELD;
			break;

		case 'fishing':
			$skill = POT::SKILL_FISH;
			break;

		case 'level':
		case 'experience':
			$skill = POT::SKILL_LEVEL;
			break;

		case 'magic':
			$skill = POT::SKILL__MAGLEVEL;
			break;

		case 'frags':
			if($config['highscores_frags'] && $config['otserv_version'] == TFS_03)
				$skill = SKILL_FRAGS;
			break;

		case 'balance':
			if($config['highscores_balance'])
				$skill = SKILL_BALANCE;
			break;
	}
}

$promotion = '';
if($db->hasColumn('players', 'promotion'))
	$promotion = ',promotion';

$online = '';
if($db->hasColumn('players', 'online'))
	$online = ',online';

$deleted = 'deleted';
if($db->hasColumn('players', 'deletion'))
	$deleted = 'deletion';

$outfit_addons = false;
$outfit = '';
if($config['highscores_outfit']) {
	$outfit = ', lookbody, lookfeet, lookhead, looklegs, looktype';
	if($db->hasColumn('players', 'lookaddons')) {
		$outfit .= ', lookaddons';
		$outfit_addons = true;
	}
}

$offset = $_page * $config['highscores_length'];
if($skill >= POT::SKILL_FIRST && $skill <= POT::SKILL_LAST) { // skills
	if($db->hasColumn('players', 'skill_fist')) {// tfs 1.0
		$skill_ids = array(
			POT::SKILL_FIST => 'skill_fist',
			POT::SKILL_CLUB => 'skill_club',
			POT::SKILL_SWORD => 'skill_sword',
			POT::SKILL_AXE => 'skill_axe',
			POT::SKILL_DIST => 'skill_dist',
			POT::SKILL_SHIELD => 'skill_shielding',
			POT::SKILL_FISH => 'skill_fishing',
		);

		$skills = $db->query('SELECT accounts.country, players.id,players.name' . $online . ',level,vocation' . $promotion . $outfit . ', ' . $skill_ids[$skill] . ' as value FROM accounts,players WHERE players.id NOT IN (' . implode(', ', $config['highscores_ids_hidden']) . ') AND players.' . $deleted . ' = 0 AND players.group_id < '.$config['highscores_groups_hidden'].' '.$add_sql.' AND accounts.id = players.account_id ORDER BY ' . $skill_ids[$skill] . ' DESC LIMIT 101 OFFSET '.$offset)->fetchAll();
	}
	else
		$skills = $db->query('SELECT accounts.country, players.id,players.name' . $online . ',value,level,vocation' . $promotion . $outfit . ' FROM accounts,players,player_skills WHERE players.id NOT IN (' . implode(', ', $config['highscores_ids_hidden']) . ') AND players.' . $deleted . ' = 0 AND players.group_id < '.$config['highscores_groups_hidden'].' '.$add_sql.' AND players.id = player_skills.player_id AND player_skills.skillid = '.$skill.' AND accounts.id = players.account_id ORDER BY value DESC, count DESC LIMIT 101 OFFSET '.$offset)->fetchAll();
}
else if($skill == SKILL_FRAGS && $config['otserv_version'] == TFS_03) // frags
{
	$skills = $db->query('SELECT accounts.country, players.id,players.name' . $online . ',level,vocation' . $promotion . $outfit . ',COUNT(`player_killers`.`player_id`) as value' .
			' FROM `accounts`, `players`, `player_killers` ' .
			' WHERE players.id NOT IN (' . implode(', ', $config['highscores_ids_hidden']) . ') AND players.' . $deleted . ' = 0 AND players.group_id < '.$config['highscores_groups_hidden'].' '.$add_sql.' AND players.id = player_killers.player_id AND accounts.id = players.account_id' .
			' GROUP BY `player_id`' .
			' ORDER BY value DESC' .
			' LIMIT 101 OFFSET '.$offset)->fetchAll();
}
else if($skill == SKILL_BALANCE) // balance
{
	$skills = $db->query('SELECT accounts.country, players.id,players.name' . $online . ',level,balance as value,vocation' . $promotion . $outfit . ' FROM accounts,players WHERE players.id NOT IN (' . implode(', ', $config['highscores_ids_hidden']) . ') AND players.' . $deleted . ' = 0 AND players.group_id < '.$config['highscores_groups_hidden'].' '.$add_sql.' AND accounts.id = players.account_id ORDER BY value DESC LIMIT 101 OFFSET '.$offset)->fetchAll();
}
else
{
	if($skill == POT::SKILL__MAGLEVEL) {
		$skills = $db->query('SELECT accounts.country, players.id,players.name' . $online . ',maglevel,level,vocation' . $promotion . $outfit . ' FROM accounts, players WHERE players.id NOT IN (' . implode(', ', $config['highscores_ids_hidden']) . ') AND players.' . $deleted . ' = 0 '.$add_sql.' AND players.group_id < '.$config['highscores_groups_hidden'].' AND accounts.id = players.account_id ORDER BY maglevel DESC, manaspent DESC LIMIT 101 OFFSET '.$offset)->fetchAll();
	}
	else { // level
		$skills = $db->query('SELECT accounts.country, players.id,players.name' . $online . ',level,experience,vocation' . $promotion . $outfit . ' FROM accounts, players WHERE players.id NOT IN (' . implode(', ', $config['highscores_ids_hidden']) . ') AND players.' . $deleted . ' = 0 '.$add_sql.' AND players.group_id < '.$config['highscores_groups_hidden'].' AND accounts.id = players.account_id ORDER BY level DESC, experience DESC LIMIT 101 OFFSET '.$offset)->fetchAll();
		$list = 'experience';
	}
}
$show_link_to_next_page = false;
$i = 0;
$highscore_players = array();
$is_online = array();

$online_exist = false;
if($db->hasColumn('players', 'online'))
	$online_exist = true;

$players = array();
foreach($skills as $player) {
	$players[] = $player['id'];
}

if($db->hasTable('players_online') && count($players) > 0) {
	$query = $db->query('SELECT `player_id`, 1 FROM `players_online` WHERE `player_id` IN (' . implode(', ', $players) . ')')->fetchAll();
	foreach($query as $t) {
		$is_online[$t['player_id']] = true;
	}
}

foreach($skills as $player)
{
    if(isset($is_online)) {
	    $player['online'] = (isset($is_online[$player['id']]) ? 1 : 0);
    } else {
        if(!isset($player['online'])) {
	        $player['online'] = 0;
        }
    }

	if(++$i <= $config['highscores_length']) {
		if($skill == POT::SKILL__MAGLEVEL)
			$player['value'] = $player['maglevel'];
		else if($skill == POT::SKILL__LEVEL)
			$player['value'] = $player['level'];

		if(isset($player['promotion']) && (int)$player['promotion'] > 0)
			$player['vocation'] += ($player['promotion'] * $config['vocations_amount']);

		$tmp = 'Unknown';
		if(isset($config['vocations'][$player['vocation']]))
			$tmp = $config['vocations'][$player['vocation']];

		$highscore_players[] = array(
			'rank' => $offset + $i,
			'name' => $player['name'],
			'url' => getPlayerLink($player['name'], false),
			'online' => (int)$player['online'] > 0,
			'vocation' => $tmp,
			'level' => (int)$player['level'],
			'value' => $skill == SKILL_BALANCE ? number_format((int)$player['value']) : number_format((int)$player['value']),
			'experience' => isset($player['experience']) ? number_format((int)$player['experience']) : null,
			'outfit' => ($config['highscores_outfit'] && !empty($player['looktype']) ? $config['outfit_images_url'] . '?id=' . (int)$player['looktype'] . ($outfit_addons && isset($player['lookaddons']) ? '&addons=' . (int)$player['lookaddons'] : '') . '&head=' . (int)$player['lookhead'] . '&body=' . (int)$player['lookbody'] . '&legs=' . (int)$player['looklegs'] . '&feet=' . (int)$player['lookfeet'] : null),
		);
	} else {
		$show_link_to_next_page = true;
	}
}

$category_labels = array(
	'axe' => 'Axe Fighting',
	'club' => 'Club Fighting',
	'distance' => 'Distance Fighting',
	'experience' => 'Experience Points',
	'fishing' => 'Fishing',
	'fist' => 'Fist Fighting',
	'magic' => 'Magic Level',
	'shield' => 'Shielding',
	'sword' => 'Sword Fighting',
);

if($config['highscores_frags'] && $config['otserv_version'] == TFS_03)
	$category_labels['frags'] = 'Frags';

if($config['highscores_balance'])
	$category_labels['balance'] = 'Balance';

$current_category = $list ?: 'experience';
if(is_numeric($current_category)) {
	$current_category = 'experience';
}

$current_category_label = $category_labels[$current_category] ?? 'Experience Points';
$stat_label = $current_category_label;
if($skill == POT::SKILL__LEVEL)
	$stat_label = 'Level';
else if($skill == POT::SKILL__MAGLEVEL)
	$stat_label = 'Magic Level';
else if($skill == SKILL_FRAGS)
	$stat_label = 'Frags';
else if($skill == SKILL_BALANCE)
	$stat_label = 'Balance';

$selected_vocation = isset($vocation) ? strtolower($vocation) : '';
$vocation_options = array(
	'' => '(all)',
	'knight' => 'Knights',
	'paladin' => 'Paladins',
	'sorcerer' => 'Sorcerers',
	'druid' => 'Druids',
);

if(!function_exists('highscoresEscape')) {
	function highscoresEscape($value): string
	{
		return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
	}
}
?>

<link rel="stylesheet" href="tools/simple-page.css">

<div class="highscores-page">
	<section class="highscores-hero">
		<div>
			<span>Ranking</span>
			<h1>Highscores</h1>
			<p>Los mejores personajes del servidor ordenados por <?php echo highscoresEscape($current_category_label); ?>.</p>
		</div>
		<strong><?php echo count($highscore_players); ?> shown</strong>
	</section>

	<section class="highscores-filter-panel">
		<div>
			<span>Filter</span>
			<h2>Choose ranking</h2>
			<p>Selecciona vocacion y categoria para ver otro highscore.</p>
		</div>

		<form class="highscores-filter-form" method="post" action="">
			<label>
				<span>World</span>
				<select name="world">
					<option value="0" selected>All Worlds</option>
				</select>
			</label>

			<label>
				<span>Vocation</span>
				<select name="profession">
					<?php foreach($vocation_options as $value => $label) { ?>
						<option value="<?php echo highscoresEscape($value); ?>"<?php echo $selected_vocation === $value ? ' selected' : ''; ?>><?php echo highscoresEscape($label); ?></option>
					<?php } ?>
				</select>
			</label>

			<label>
				<span>Category</span>
				<select name="category">
					<?php foreach($category_labels as $value => $label) { ?>
						<option value="<?php echo highscoresEscape($value); ?>"<?php echo $current_category === $value ? ' selected' : ''; ?>><?php echo highscoresEscape($label); ?></option>
					<?php } ?>
				</select>
			</label>

			<button class="guild-button highscores-submit" type="submit">Submit</button>
		</form>
	</section>

	<p class="highscores-note">Skills displayed in the Highscores do not include any bonuses, loyalty or equipment.</p>

	<section class="highscores-list">
		<div class="highscores-section-head">
			<div>
				<span><?php echo highscoresEscape($stat_label); ?></span>
				<h2>Top characters</h2>
			</div>
			<strong>Page <?php echo (int)$_page + 1; ?></strong>
		</div>

		<?php if(empty($highscore_players)) { ?>
			<div class="guilds-empty highscores-empty">
				<h2>No records yet.</h2>
				<p>No hay personajes para mostrar en esta categoria.</p>
			</div>
		<?php } else { ?>
			<div class="highscores-card-grid">
				<?php foreach($highscore_players as $player) { ?>
					<a class="highscore-card" href="<?php echo highscoresEscape($player['url']); ?>">
						<div class="highscore-rank">#<?php echo (int)$player['rank']; ?></div>

						<div class="highscore-outfit">
							<?php if($player['outfit']) { ?>
								<img src="<?php echo highscoresEscape($player['outfit']); ?>" alt="<?php echo highscoresEscape($player['name']); ?>">
							<?php } else { ?>
								<b><?php echo highscoresEscape(substr($player['name'], 0, 1)); ?></b>
							<?php } ?>
						</div>

						<div class="highscore-main">
							<h2><?php echo highscoresEscape($player['name']); ?></h2>
							<div class="highscore-meta">
								<span><?php echo highscoresEscape($player['vocation']); ?></span>
								<span>Level <?php echo (int)$player['level']; ?></span>
								<span class="<?php echo $player['online'] ? 'is-online' : 'is-offline'; ?>"><?php echo $player['online'] ? 'Online' : 'Offline'; ?></span>
							</div>
						</div>

						<div class="highscore-stat">
							<span><?php echo highscoresEscape($stat_label); ?></span>
							<strong><?php echo highscoresEscape($player['value']); ?></strong>
							<?php if($skill == POT::SKILL__LEVEL && $player['experience']) { ?>
								<em><?php echo highscoresEscape($player['experience']); ?> exp</em>
							<?php } ?>
						</div>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</section>

	<?php if($_page > 0 || $show_link_to_next_page) { ?>
		<nav class="highscores-pagination">
			<?php if($_page > 0) { ?>
				<a class="guild-button" href="<?php echo highscoresEscape(getLink('highscores') . '/' . $list . (isset($vocation) ? '/' . $vocation : '') . '/' . ($_page - 1)); ?>">Prev</a>
			<?php } ?>
			<?php if($show_link_to_next_page) { ?>
				<a class="guild-button" href="<?php echo highscoresEscape(getLink('highscores') . '/' . $list . (isset($vocation) ? '/' . $vocation : '') . '/' . ($_page + 1)); ?>">Next</a>
			<?php } ?>
		</nav>
	<?php } ?>
</div>
