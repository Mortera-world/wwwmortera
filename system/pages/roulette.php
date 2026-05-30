<?php
/**
 * Roulette Winners
 *
 * @package   MyAAC
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Roulette Winners';

// Agrega aqui mas rewards posibles de la ruleta para mostrarlos en la pagina.
$possibleRewards = [
    [
        'item_id' => 2160,
        'name' => 'Crystal Coin',
    ],
    [
        'item_id' => 2472,
        'name' => 'Magic Plate Armor',
    ],
    [
        'item_id' => 2494,
        'name' => 'Demon Armor',
    ],
    [
        'item_id' => 2646,
        'name' => 'Golden Boots',
    ],
];

$hasLookAddons = $db->hasColumn('players', 'lookaddons');
$hasPromotion = $db->hasColumn('players', 'promotion');

$query = 'SELECT rp.player_id, rp.reward_count, rp.reward_id, p.name, p.level, p.vocation, p.looktype, p.lookhead, p.lookbody, p.looklegs, p.lookfeet'
    . ($hasLookAddons ? ', p.lookaddons' : '')
    . ($hasPromotion ? ', p.promotion' : '')
    . ' FROM roulette_plays rp'
    . ' INNER JOIN players p ON p.id = rp.player_id'
    . ' ORDER BY rp.id DESC LIMIT 500';

$result = $db->query($query);
if ($result === false) {
    echo 'Error fetching data from roulette_plays table';
    return;
}

$winners = [];
foreach ($result as $row) {
    $playerId = (int) $row['player_id'];
    $rewardId = (int) $row['reward_id'];
    $rewardCount = max(1, (int) $row['reward_count']);

    if (!isset($winners[$playerId])) {
        $vocationId = (int) $row['vocation'];
        if ($hasPromotion && !empty($row['promotion'])) {
            $vocationId += (int) $row['promotion'] * (int) $config['vocations_amount'];
        }

        $outfit = $config['outfit_images_url'] . '?id=' . (int) $row['looktype']
            . ($hasLookAddons && !empty($row['lookaddons']) ? '&addons=' . (int) $row['lookaddons'] : '')
            . '&head=' . (int) $row['lookhead']
            . '&body=' . (int) $row['lookbody']
            . '&legs=' . (int) $row['looklegs']
            . '&feet=' . (int) $row['lookfeet'];

        $winners[$playerId] = [
            'player_name' => $row['name'],
            'player_link' => getPlayerLink($row['name'], false),
            'level' => (int) $row['level'],
            'vocation' => $config['vocations'][$vocationId] ?? ($config['vocations'][(int) $row['vocation']] ?? 'Unknown'),
            'outfit' => $outfit,
            'total_rewards' => 0,
            'items' => [],
        ];
    }

    if (!isset($winners[$playerId]['items'][$rewardId])) {
        $winners[$playerId]['items'][$rewardId] = [
            'item_id' => $rewardId,
            'image' => $config['item_images_url'] . $rewardId . '.gif',
            'count' => 0,
        ];
    }

    $winners[$playerId]['items'][$rewardId]['count'] += $rewardCount;
    $winners[$playerId]['total_rewards'] += $rewardCount;
}

foreach ($winners as &$winner) {
    usort($winner['items'], static function ($a, $b) {
        if ($a['count'] === $b['count']) {
            return $a['item_id'] <=> $b['item_id'];
        }

        return $b['count'] <=> $a['count'];
    });
}
unset($winner);

usort($winners, static function ($a, $b) {
    if ($a['total_rewards'] === $b['total_rewards']) {
        return strcasecmp($a['player_name'], $b['player_name']);
    }

    return $b['total_rewards'] <=> $a['total_rewards'];
});

foreach ($possibleRewards as &$reward) {
    $reward['image'] = $config['item_images_url'] . (int) $reward['item_id'] . '.gif';
}
unset($reward);

$twig->display('roulette.html.twig', [
    'winners' => $winners,
    'possible_rewards' => $possibleRewards,
]);
?>
