<?php
/**
 * Last kills
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @author    OpenTibiaBR
 * @copyright 2023 MyAAC
 * @link      https://github.com/opentibiabr/myaac
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Last Kills';

if (!function_exists('lastKillsBuildOutfitUrl')) {
	function lastKillsBuildOutfitUrl(array $config, array $row, string $prefix = '', bool $hasAddons = true): ?string
	{
		$looktype = $row[$prefix . 'looktype'] ?? null;
		if (empty($config['outfit_images_url']) || empty($looktype)) {
			return null;
		}

		$url = $config['outfit_images_url'] . '?id=' . (int)$looktype;
		if ($hasAddons && isset($row[$prefix . 'lookaddons']) && $row[$prefix . 'lookaddons'] !== '') {
			$url .= '&addons=' . (int)$row[$prefix . 'lookaddons'];
		}

		$url .= '&head=' . (int)($row[$prefix . 'lookhead'] ?? 0);
		$url .= '&body=' . (int)($row[$prefix . 'lookbody'] ?? 0);
		$url .= '&legs=' . (int)($row[$prefix . 'looklegs'] ?? 0);
		$url .= '&feet=' . (int)($row[$prefix . 'lookfeet'] ?? 0);

		if (isset($row[$prefix . 'lookmount'])) {
			$url .= '&mount=' . (int)$row[$prefix . 'lookmount'];
		}

		return $url;
	}
}

if (!function_exists('lastKillsAddDirectoryCandidate')) {
	function lastKillsAddDirectoryCandidate(array &$directories, string $path): void
	{
		$path = trim($path);
		if ($path === '') {
			return;
		}

		$realPath = realpath($path);
		if ($realPath !== false && is_dir($realPath)) {
			$directories[$realPath] = $realPath;
		}
	}
}

if (!function_exists('lastKillsGetDataPathCandidates')) {
	function lastKillsGetDataPathCandidates(array $config): array
	{
		$directories = array();

		lastKillsAddDirectoryCandidate($directories, (string)($config['data_path'] ?? ''));

		$serverPath = rtrim((string)($config['server_path'] ?? ''), "/\\");
		if ($serverPath !== '') {
			lastKillsAddDirectoryCandidate($directories, $serverPath . DIRECTORY_SEPARATOR . 'data');
			lastKillsAddDirectoryCandidate($directories, $serverPath . DIRECTORY_SEPARATOR . 'data-otservbr-global');
			lastKillsAddDirectoryCandidate($directories, $serverPath . DIRECTORY_SEPARATOR . 'data-canary');
		}

		return array_values($directories);
	}
}

if (!function_exists('lastKillsBuildLookRowFromXmlAttributes')) {
	function lastKillsBuildLookRowFromXmlAttributes(SimpleXMLElement $look): ?array
	{
		$lookType = (string)($look['type'] ?? '');
		if ($lookType === '') {
			$lookType = (string)($look['looktype'] ?? '');
		}
		if ($lookType === '') {
			$lookType = (string)($look['lookType'] ?? '');
		}

		if ($lookType === '') {
			return null;
		}

		return array(
			'looktype' => (int)$lookType,
			'lookaddons' => (int)($look['addons'] ?? $look['lookaddons'] ?? $look['lookAddons'] ?? 0),
			'lookhead' => (int)($look['head'] ?? $look['lookhead'] ?? $look['lookHead'] ?? 0),
			'lookbody' => (int)($look['body'] ?? $look['lookbody'] ?? $look['lookBody'] ?? 0),
			'looklegs' => (int)($look['legs'] ?? $look['looklegs'] ?? $look['lookLegs'] ?? 0),
			'lookfeet' => (int)($look['feet'] ?? $look['lookfeet'] ?? $look['lookFeet'] ?? 0),
			'lookmount' => (int)($look['mount'] ?? $look['lookmount'] ?? $look['lookMount'] ?? 0),
		);
	}
}

if (!function_exists('lastKillsMonsterLookupKey')) {
	function lastKillsMonsterLookupKey(string $monsterName): string
	{
		$name = strtolower(trim($monsterName));
		$name = preg_replace('/^(a|an|the)\s+/i', '', $name);

		return trim((string)$name);
	}
}

if (!function_exists('lastKillsMonsterSlug')) {
	function lastKillsMonsterSlug(string $monsterName): string
	{
		$slug = lastKillsMonsterLookupKey($monsterName);
		$slug = preg_replace('/[^a-z0-9]+/i', '_', $slug);

		return trim((string)$slug, '_');
	}
}

if (!function_exists('lastKillsFindIntInLua')) {
	function lastKillsFindIntInLua(string $content, string $field): int
	{
		return preg_match('/\b' . preg_quote($field, '/') . '\s*=\s*(\d+)/i', $content, $match) ? (int)$match[1] : 0;
	}
}

if (!function_exists('lastKillsBuildCreatureOutfitFromLua')) {
	function lastKillsBuildCreatureOutfitFromLua(string $monsterName, array $config): ?string
	{
		static $luaOutfitCache = array();

		$key = lastKillsMonsterLookupKey($monsterName);
		if ($key === '') {
			return null;
		}

		if (array_key_exists($key, $luaOutfitCache)) {
			return $luaOutfitCache[$key];
		}

		$slug = lastKillsMonsterSlug($monsterName);
		if ($slug === '') {
			return $luaOutfitCache[$key] = null;
		}

		foreach (lastKillsGetDataPathCandidates($config) as $dataPath) {
			$monsterDirectory = $dataPath . DIRECTORY_SEPARATOR . 'monster';
			if (!is_dir($monsterDirectory)) {
				continue;
			}

			$iterator = new RecursiveIteratorIterator(
				new RecursiveDirectoryIterator($monsterDirectory, FilesystemIterator::SKIP_DOTS)
			);

			foreach ($iterator as $file) {
				if (!$file->isFile() || strtolower($file->getExtension()) !== 'lua') {
					continue;
				}

				if (strtolower($file->getBasename('.lua')) !== $slug) {
					continue;
				}

				$content = @file_get_contents($file->getPathname());
				if ($content === false || !preg_match('/Game\.createMonsterType\(\s*[\'"]([^\'"]+)[\'"]\s*\)/i', $content, $nameMatch)) {
					continue;
				}

				if (strtolower(trim($nameMatch[1])) !== $key) {
					continue;
				}

				$lookType = lastKillsFindIntInLua($content, 'lookType');
				if ($lookType <= 0) {
					continue;
				}

				$row = array(
					'looktype' => $lookType,
					'lookaddons' => lastKillsFindIntInLua($content, 'lookAddons'),
					'lookhead' => lastKillsFindIntInLua($content, 'lookHead'),
					'lookbody' => lastKillsFindIntInLua($content, 'lookBody'),
					'looklegs' => lastKillsFindIntInLua($content, 'lookLegs'),
					'lookfeet' => lastKillsFindIntInLua($content, 'lookFeet'),
					'lookmount' => lastKillsFindIntInLua($content, 'lookMount'),
				);

				return $luaOutfitCache[$key] = lastKillsBuildOutfitUrl($config, $row, '', true);
			}
		}

		return $luaOutfitCache[$key] = null;
	}
}

if (!function_exists('lastKillsBuildCreatureOutfitFromXml')) {
	function lastKillsBuildCreatureOutfitFromXml(string $monsterName, array $config): ?string
	{
		static $monsterIndex = null;
		static $outfitCache = array();

		$key = lastKillsMonsterLookupKey($monsterName);
		if ($key === '') {
			return null;
		}

		if (array_key_exists($key, $outfitCache)) {
			return $outfitCache[$key];
		}

		if ($monsterIndex === null) {
			$monsterIndex = array();
			foreach (lastKillsGetDataPathCandidates($config) as $dataPath) {
				$monsterBase = $dataPath . DIRECTORY_SEPARATOR . 'monster' . DIRECTORY_SEPARATOR;
				$monstersXml = $monsterBase . 'monsters.xml';
				if (!file_exists($monstersXml)) {
					continue;
				}

				$xml = @simplexml_load_file($monstersXml);
				if ($xml === false) {
					continue;
				}

				foreach ($xml->monster as $monster) {
					$name = strtolower(trim((string)$monster['name']));
					if ($name === '') {
						continue;
					}

					$lookRow = lastKillsBuildLookRowFromXmlAttributes($monster);
					if ($lookRow !== null) {
						$monsterIndex[$name] = array('outfit' => lastKillsBuildOutfitUrl($config, $lookRow, '', true));
						continue;
					}

					$file = trim((string)$monster['file']);
					if ($file !== '') {
						$monsterIndex[$name] = array(
							'file' => $monsterBase . str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, str_replace('..', '', $file)),
						);
					}
				}
			}
		}

		if (empty($monsterIndex[$key])) {
			return $outfitCache[$key] = lastKillsBuildCreatureOutfitFromLua($monsterName, $config);
		}

		if (!empty($monsterIndex[$key]['outfit'])) {
			return $outfitCache[$key] = $monsterIndex[$key]['outfit'];
		}

		if (empty($monsterIndex[$key]['file']) || !file_exists($monsterIndex[$key]['file'])) {
			return $outfitCache[$key] = lastKillsBuildCreatureOutfitFromLua($monsterName, $config);
		}

		$monsterXml = @simplexml_load_file($monsterIndex[$key]['file']);
		if ($monsterXml === false || !isset($monsterXml->look)) {
			return $outfitCache[$key] = lastKillsBuildCreatureOutfitFromLua($monsterName, $config);
		}

		$row = lastKillsBuildLookRowFromXmlAttributes($monsterXml->look);
		if ($row === null) {
			return $outfitCache[$key] = lastKillsBuildCreatureOutfitFromLua($monsterName, $config);
		}

		return $outfitCache[$key] = lastKillsBuildOutfitUrl($config, $row, '', true);
	}
}

if (!function_exists('lastKillsBuildKillerData')) {
	function lastKillsBuildKillerData(array $killer, array $config, bool $hasPlayerAddons, bool $hasCreatureLook): array
	{
		$monsterName = trim((string)($killer['monster_name'] ?? ''));
		$playerName = trim((string)($killer['player_name'] ?? ''));

		if ($monsterName !== '') {
			$outfit = null;
			if ($hasCreatureLook && !empty($killer['monster_looktype'])) {
				$outfit = lastKillsBuildOutfitUrl($config, $killer, 'monster_', true);
			}
			if ($outfit === null) {
				$outfit = lastKillsBuildCreatureOutfitFromXml($monsterName, $config);
			}

			return array(
				'name' => $monsterName,
				'type' => 'Creature',
				'outfit' => $outfit,
				'url' => null,
				'subtitle' => $playerName !== '' ? 'Summoned by ' . $playerName : 'Final hit',
			);
		}

		if ($playerName !== '') {
			$isDeleted = isset($killer['player_exists']) && (int)$killer['player_exists'] !== 0;

			return array(
				'name' => $playerName,
				'type' => 'Player',
				'outfit' => lastKillsBuildOutfitUrl($config, $killer, 'killer_', $hasPlayerAddons),
				'url' => $isDeleted ? null : getPlayerLink($playerName, false),
				'subtitle' => 'Final hit',
			);
		}

		return array(
			'name' => 'Unknown',
			'type' => 'Unknown',
			'outfit' => null,
			'url' => null,
			'subtitle' => 'Final hit',
		);
	}
}

$last_kills = array();
$players_deaths_count = 0;
$hasPlayerAddons = $db->hasColumn('players', 'lookaddons');
$playerLookColumns = ', `players`.`id` AS `player_id`, `players`.`looktype`, `players`.`lookhead`, `players`.`lookbody`, `players`.`looklegs`, `players`.`lookfeet`';
if ($hasPlayerAddons) {
	$playerLookColumns .= ', `players`.`lookaddons`';
}

$cacheKey = 'last_kills_cards_v3';
$tmp = null;
if($cache->enabled() && $cache->fetch($cacheKey, $tmp)) {
	$last_kills = unserialize($tmp);
}
else {
	if($db->hasTable('player_killers')) // tfs 0.3
	{
		$worldColumn = $db->hasColumn('players', 'world_id') ? ', `players`.`world_id`' : '';
		$players_deaths = $db->query('SELECT `player_deaths`.`id`, `player_deaths`.`date`, `player_deaths`.`level`, `players`.`name`' . $playerLookColumns . $worldColumn . ' FROM `player_deaths` LEFT JOIN `players` ON `player_deaths`.`player_id` = `players`.`id` ORDER BY `date` DESC LIMIT 0, ' . $config['last_kills_limit']);

		$hasCreatureLook = $db->hasTable('environment_killers') && $db->hasColumn('environment_killers', 'looktype');
		$creatureLookColumns = '';
		if ($hasCreatureLook) {
			$creatureLookColumns = ', environment_killers.looktype AS monster_looktype'
				. ($db->hasColumn('environment_killers', 'lookaddons') ? ', environment_killers.lookaddons AS monster_lookaddons' : '')
				. ($db->hasColumn('environment_killers', 'lookhead') ? ', environment_killers.lookhead AS monster_lookhead' : '')
				. ($db->hasColumn('environment_killers', 'lookbody') ? ', environment_killers.lookbody AS monster_lookbody' : '')
				. ($db->hasColumn('environment_killers', 'looklegs') ? ', environment_killers.looklegs AS monster_looklegs' : '')
				. ($db->hasColumn('environment_killers', 'lookfeet') ? ', environment_killers.lookfeet AS monster_lookfeet' : '')
				. ($db->hasColumn('environment_killers', 'lookmount') ? ', environment_killers.lookmount AS monster_lookmount' : '');
		}

		$killerLookColumns = ', players.id AS killer_player_id, players.looktype AS killer_looktype, players.lookhead AS killer_lookhead, players.lookbody AS killer_lookbody, players.looklegs AS killer_looklegs, players.lookfeet AS killer_lookfeet';
		if ($hasPlayerAddons) {
			$killerLookColumns .= ', players.lookaddons AS killer_lookaddons';
		}

		if(!empty($players_deaths)) {
			foreach($players_deaths as $death) {
				$players_deaths_count++;

				$killers = $db->query("SELECT environment_killers.name AS monster_name, players.name AS player_name, players.deleted AS player_exists" . $creatureLookColumns . $killerLookColumns . " FROM killers LEFT JOIN environment_killers ON killers.id = environment_killers.kill_id LEFT JOIN player_killers ON killers.id = player_killers.kill_id LEFT JOIN players ON players.id = player_killers.player_id WHERE killers.death_id = '" . (int)$death['id'] . "' ORDER BY killers.final_hit DESC, killers.id ASC")->fetchAll();
				$primaryKiller = !empty($killers) ? $killers[0] : array();
				$killerData = lastKillsBuildKillerData($primaryKiller, $config, $hasPlayerAddons, $hasCreatureLook);

				$last_kills[] = array(
					'id' => $players_deaths_count,
					'time' => $death['date'],
					'player_name' => $death['name'] ?: 'Unknown player',
					'player_url' => $death['name'] ? getPlayerLink($death['name'], false) : null,
					'player_outfit' => lastKillsBuildOutfitUrl($config, $death, '', $hasPlayerAddons),
					'level' => (int)$death['level'],
					'killer' => $killerData,
					'assist_count' => max(0, count($killers) - 1),
					'world_id' => isset($death['world_id']) && isset($config['worlds'][(int)$death['world_id']]) ? $config['worlds'][(int)$death['world_id']] : null,
				);
			}
		}
	} else {
		$oldPlayerLookColumns = ', `p`.`id` AS `player_id`, `p`.`looktype`, `p`.`lookhead`, `p`.`lookbody`, `p`.`looklegs`, `p`.`lookfeet`';
		if ($hasPlayerAddons) {
			$oldPlayerLookColumns .= ', `p`.`lookaddons`';
		}

		$players_deaths = $db->query("SELECT `p`.`name` AS `victim`, `d`.`killed_by` as `killed_by`, `d`.`time` as `time`, `d`.`level`, `d`.`is_player`" . $oldPlayerLookColumns . " FROM `player_deaths` as `d` INNER JOIN `players` as `p` ON d.player_id = p.id ORDER BY `time` DESC LIMIT " . $config['last_kills_limit'] . ";");
		if(!empty($players_deaths)) {
			foreach($players_deaths as $death) {
				$players_deaths_count++;

				$killerData = array(
					'name' => $death['killed_by'],
					'type' => $death['is_player'] == '1' ? 'Player' : 'Creature',
					'outfit' => null,
					'url' => null,
					'subtitle' => 'Final hit',
				);

				if($death['is_player'] == '1') {
					$killerLookColumns = '`id`, `name`, `looktype`, `lookhead`, `lookbody`, `looklegs`, `lookfeet`';
					if ($hasPlayerAddons) {
						$killerLookColumns .= ', `lookaddons`';
					}

					$killerPlayer = $db->query('SELECT ' . $killerLookColumns . ' FROM `players` WHERE `name` = ' . $db->quote($death['killed_by']) . ' LIMIT 1')->fetch();
					if ($killerPlayer) {
						$killerData['name'] = $killerPlayer['name'];
						$killerData['outfit'] = lastKillsBuildOutfitUrl($config, $killerPlayer, '', $hasPlayerAddons);
						$killerData['url'] = getPlayerLink($killerPlayer['name'], false);
					}
				} else {
					$killerData['outfit'] = lastKillsBuildCreatureOutfitFromXml($death['killed_by'], $config);
				}

				$last_kills[] = array(
					'id' => $players_deaths_count,
					'time' => $death['time'],
					'player_name' => $death['victim'],
					'player_url' => getPlayerLink($death['victim'], false),
					'player_outfit' => lastKillsBuildOutfitUrl($config, $death, '', $hasPlayerAddons),
					'level' => (int)$death['level'],
					'killer' => $killerData,
					'assist_count' => 0,
					'world_id' => null,
				);
			}
		}
	}

	if($cache->enabled()) {
		$cache->set($cacheKey, serialize($last_kills), 120);
	}
}

$twig->display('lastkills.html.twig', array(
	'lastkills' => $last_kills
));
