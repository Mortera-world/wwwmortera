<?php
/**
 * Top rare items showcase
 */
defined('MYAAC') or die('Direct access not allowed!');

$title = 'Top Items';

$trackedItems = [
    ['id' => 40592, 'name' => 'Alchemists Boots'],
    ['id' => 39149, 'name' => 'Alicorn Headguard'],
    ['id' => 3394, 'name' => 'Amazon Armor'],
    ['id' => 3393, 'name' => 'Amazon Helmet'],
    ['id' => 47375, 'name' => 'Amber Axe'],
    ['id' => 47370, 'name' => 'Amber Bludgeon'],
    ['id' => 47371, 'name' => 'Amber Bow'],
    ['id' => 47377, 'name' => 'Amber Crossbow'],
    ['id' => 47376, 'name' => 'Amber Cudgel'],
    ['id' => 47369, 'name' => 'Amber Greataxe'],
    ['id' => 50239, 'name' => 'Amber Kusarigama'],
    ['id' => 47373, 'name' => 'Amber Rod'],
    ['id' => 47374, 'name' => 'Amber Sabre'],
    ['id' => 47368, 'name' => 'Amber Slayer'],
    ['id' => 47372, 'name' => 'Amber Wand'],
    ['id' => 40588, 'name' => 'Antler-Horn Helmet'],
    ['id' => 39153, 'name' => 'Arboreal Crown'],
    ['id' => 44623, 'name' => 'Arcane Dragon Robe'],
    ['id' => 39151, 'name' => 'Arcanomancer Regalia'],
    ['id' => 50270, 'name' => 'Bambus Jo'],
    ['id' => 35517, 'name' => 'Bast Legs'],
    ['id' => 3395, 'name' => 'Ceremonial Mask'],
    ['id' => 30396, 'name' => 'Cobra Axe'],
    ['id' => 50167, 'name' => 'Cobra Bo'],
    ['id' => 30394, 'name' => 'Cobra Boots'],
    ['id' => 30395, 'name' => 'Cobra Club'],
    ['id' => 30393, 'name' => 'Cobra Crossbow'],
    ['id' => 30397, 'name' => 'Cobra Hood'],
    ['id' => 30400, 'name' => 'Cobra Rod'],
    ['id' => 30398, 'name' => 'Cobra Sword'],
    ['id' => 30399, 'name' => 'Cobra Wand'],
    ['id' => 10200, 'name' => 'Crystal Boots'],
    ['id' => 3329, 'name' => 'Daramian Axe'],
    ['id' => 8037, 'name' => 'Dark Lords Cape'],
    ['id' => 8099, 'name' => 'Dark Trinity Mace'],
    ['id' => 44621, 'name' => 'Dauntless Dragon Scale Armor'],
    ['id' => 39166, 'name' => 'Dawnfire Pantaloons'],
    ['id' => 39164, 'name' => 'Dawnfire Sherwani'],
    ['id' => 3389, 'name' => 'Demon Legs'],
    ['id' => 50189, 'name' => 'Demon Mengu'],
    ['id' => 49534, 'name' => 'Demonfang Mask'],
    ['id' => 50176, 'name' => 'Depth Claws'],
    ['id' => 10201, 'name' => 'dragon scale boots'],
    ['id' => 3363, 'name' => 'Dragon Scale Legs'],
    ['id' => 49862, 'name' => 'Draining Inferniarch Arbalest'],
    ['id' => 49865, 'name' => 'Draining Inferniarch Battleaxe'],
    ['id' => 49877, 'name' => 'Draining Inferniarch Blade'],
    ['id' => 49859, 'name' => 'Draining Inferniarch Bow'],
    ['id' => 50252, 'name' => 'Draining Inferniarch Claws'],
    ['id' => 49871, 'name' => 'Draining Inferniarch Flail'],
    ['id' => 49868, 'name' => 'Draining Inferniarch Greataxe'],
    ['id' => 49886, 'name' => 'Draining Inferniarch Rod'],
    ['id' => 49880, 'name' => 'Draining Inferniarch Slayer'],
    ['id' => 49883, 'name' => 'Draining Inferniarch Wand'],
    ['id' => 49874, 'name' => 'Draining Inferniarch Warhammer'],
    ['id' => 49533, 'name' => 'Dreadfire Headpiece'],
    ['id' => 8054, 'name' => 'Earthborn Titan Armor'],
    ['id' => 36664, 'name' => 'Eldritch Bow'],
    ['id' => 36667, 'name' => 'Eldritch Breeches'],
    ['id' => 36657, 'name' => 'Eldritch Claymore'],
    ['id' => 36670, 'name' => 'Eldritch Cowl'],
    ['id' => 50169, 'name' => 'Eldritch Crescent Moon Spade'],
    ['id' => 36663, 'name' => 'Eldritch Cuirass'],
    ['id' => 36661, 'name' => 'Eldritch Greataxe'],
    ['id' => 36671, 'name' => 'Eldritch Hood'],
    ['id' => 50266, 'name' => 'Eldritch Monk Boots'],
    ['id' => 36674, 'name' => 'Eldritch Rod'],
    ['id' => 36668, 'name' => 'Eldritch Wand'],
    ['id' => 36659, 'name' => 'Eldritch Warmace'],
    ['id' => 50188, 'name' => 'Ethereal Coned Hat'],
    ['id' => 35516, 'name' => 'Exotic Legs'],
    ['id' => 28724, 'name' => 'Falcon Battleaxe'],
    ['id' => 28718, 'name' => 'Falcon Bow'],
    ['id' => 28714, 'name' => 'Falcon Circlet'],
    ['id' => 28715, 'name' => 'Falcon Coif'],
    ['id' => 28720, 'name' => 'Falcon Greaves'],
    ['id' => 28723, 'name' => 'Falcon Longsword'],
    ['id' => 28725, 'name' => 'Falcon Mace'],
    ['id' => 28719, 'name' => 'Falcon Plate'],
    ['id' => 28716, 'name' => 'Falcon Rod'],
    ['id' => 50161, 'name' => 'Falcon Sai'],
    ['id' => 28717, 'name' => 'Falcon Wand'],
    ['id' => 5903, 'name' => 'Ferumbras Hat'],
    ['id' => 39161, 'name' => 'Feverbloom Boots'],
    ['id' => 39158, 'name' => 'Frostflower Boots'],
    ['id' => 19391, 'name' => 'Furious Frock'],
    ['id' => 50275, 'name' => 'Ghazbaran Oyoroi'],
    ['id' => 36665, 'name' => 'Gilded Eldritch Bow'],
    ['id' => 36658, 'name' => 'Gilded Eldritch Claymore'],
    ['id' => 50170, 'name' => 'Gilded Eldritch Crescent Moon Spade'],
    ['id' => 36662, 'name' => 'Gilded Eldritch Greataxe'],
    ['id' => 36675, 'name' => 'Gilded Eldritch Rod'],
    ['id' => 36669, 'name' => 'Gilded Eldritch Wand'],
    ['id' => 36660, 'name' => 'Gilded Eldritch Warmace'],
    ['id' => 3365, 'name' => 'Golden Helmet'],
    ['id' => 43875, 'name' => 'Grand Sanguine Battleaxe'],
    ['id' => 43865, 'name' => 'Grand Sanguine Blade'],
    ['id' => 43873, 'name' => 'Grand Sanguine Bludgeon'],
    ['id' => 43878, 'name' => 'Grand Sanguine Bow'],
    ['id' => 50158, 'name' => 'Grand Sanguine Claws'],
    ['id' => 43883, 'name' => 'Grand Sanguine Coil'],
    ['id' => 43880, 'name' => 'Grand Sanguine Crossbow'],
    ['id' => 43867, 'name' => 'Grand Sanguine Cudgel'],
    ['id' => 43869, 'name' => 'Grand Sanguine Hatchet'],
    ['id' => 43871, 'name' => 'Grand Sanguine Razor'],
    ['id' => 43886, 'name' => 'Grand Sanguine Rod'],
    ['id' => 37608, 'name' => 'Green Demon Armor'],
    ['id' => 37609, 'name' => 'Green Demon Helmet'],
    ['id' => 37607, 'name' => 'Green Demon Legs'],
    ['id' => 37610, 'name' => 'Green Demon Slippers'],
    ['id' => 7450, 'name' => 'Hammer of Prophecy'],
    ['id' => 49532, 'name' => 'Hellstalker Visor'],
    ['id' => 19366, 'name' => 'Icy Culottes'],
    ['id' => 50291, 'name' => 'Iks Footwraps'],
    ['id' => 22760, 'name' => 'Impaler of the Igniter'],
    ['id' => 49522, 'name' => 'Inferniarch Arbalest'],
    ['id' => 49523, 'name' => 'Inferniarch Battleaxe'],
    ['id' => 49527, 'name' => 'Inferniarch Blade'],
    ['id' => 49520, 'name' => 'Inferniarch Bow'],
    ['id' => 50250, 'name' => 'Inferniarch Claws'],
    ['id' => 49525, 'name' => 'Inferniarch Flail'],
    ['id' => 49524, 'name' => 'Inferniarch Greataxe'],
    ['id' => 49529, 'name' => 'Inferniarch Rod'],
    ['id' => 49530, 'name' => 'Inferniarch Slayer'],
    ['id' => 49528, 'name' => 'Inferniarch Wand'],
    ['id' => 49526, 'name' => 'Inferniarch Warhammer'],
    ['id' => 35518, 'name' => 'Jungle Bow'],
    ['id' => 35514, 'name' => 'Jungle Flail'],
    ['id' => 35521, 'name' => 'Jungle Rod'],
    ['id' => 50186, 'name' => 'Jungle Survivor Legs'],
    ['id' => 35522, 'name' => 'Jungle Wand'],
    ['id' => 34253, 'name' => 'Lion Axe'],
    ['id' => 50162, 'name' => 'Lion Claws'],
    ['id' => 34254, 'name' => 'Lion Hammer'],
    ['id' => 34150, 'name' => 'Lion Longbow'],
    ['id' => 34155, 'name' => 'Lion Longsword'],
    ['id' => 34157, 'name' => 'Lion Plate'],
    ['id' => 34151, 'name' => 'Lion Rod'],
    ['id' => 34156, 'name' => 'Lion Spangenhelm'],
    ['id' => 34152, 'name' => 'Lion Wand'],
    ['id' => 12599, 'name' => 'Mages Cap'],
    ['id' => 35520, 'name' => 'Make-Do Boots'],
    ['id' => 35519, 'name' => 'Makeshift Boots'],
    ['id' => 49531, 'name' => 'Maliceforged Helmet'],
    ['id' => 50264, 'name' => 'Merudri Battle Mail'],
    ['id' => 39167, 'name' => 'Midnight Sarong'],
    ['id' => 39165, 'name' => 'Midnight Tunic'],
    ['id' => 8058, 'name' => 'Molten Plate'],
    ['id' => 40593, 'name' => 'Mutant Bone Boots'],
    ['id' => 40595, 'name' => 'Mutant Bone Kilt'],
    ['id' => 50184, 'name' => 'Mutant Hide Trousers'],
    ['id' => 40591, 'name' => 'Mutated Skin Armor'],
    ['id' => 40590, 'name' => 'Mutated Skin Legs'],
    ['id' => 44624, 'name' => 'Mystical Dragon Robe'],
    ['id' => 7455, 'name' => 'Mythril Axe'],
    ['id' => 39156, 'name' => 'Naga Axe'],
    ['id' => 39157, 'name' => 'Naga Club'],
    ['id' => 39159, 'name' => 'Naga Crossbow'],
    ['id' => 50160, 'name' => 'Naga Katar'],
    ['id' => 39163, 'name' => 'Naga Rod'],
    ['id' => 39155, 'name' => 'Naga Sword'],
    ['id' => 50262, 'name' => 'Naga Tanko'],
    ['id' => 39162, 'name' => 'Naga Wand'],
    ['id' => 34098, 'name' => 'Pair of Soulstalkers'],
    ['id' => 34097, 'name' => 'Pair of Soulwalkers'],
    ['id' => 22759, 'name' => 'Plague Bite'],
    ['id' => 7433, 'name' => 'Ravenwing'],
    ['id' => 49861, 'name' => 'Rending Inferniarch Arbalest'],
    ['id' => 49864, 'name' => 'Rending Inferniarch Battleaxe'],
    ['id' => 49876, 'name' => 'Rending Inferniarch Blade'],
    ['id' => 49858, 'name' => 'Rending Inferniarch Bow'],
    ['id' => 50251, 'name' => 'Rending Inferniarch Claws'],
    ['id' => 49870, 'name' => 'Rending Inferniarch Flail'],
    ['id' => 49867, 'name' => 'Rending Inferniarch Greataxe'],
    ['id' => 49885, 'name' => 'Rending Inferniarch Rod'],
    ['id' => 49879, 'name' => 'Rending Inferniarch Slayer'],
    ['id' => 49882, 'name' => 'Rending Inferniarch Wand'],
    ['id' => 49873, 'name' => 'Rending Inferniarch Warhammer'],
    ['id' => 8038, 'name' => 'Robe of the Ice Queen'],
    ['id' => 43874, 'name' => 'Sanguine Battleaxe'],
    ['id' => 43864, 'name' => 'Sanguine Blade'],
    ['id' => 43872, 'name' => 'Sanguine Bludgeon'],
    ['id' => 43884, 'name' => 'Sanguine Boots'],
    ['id' => 43877, 'name' => 'Sanguine Bow'],
    ['id' => 50157, 'name' => 'Sanguine Claws'],
    ['id' => 43882, 'name' => 'Sanguine Coil'],
    ['id' => 43879, 'name' => 'Sanguine Crossbow'],
    ['id' => 43866, 'name' => 'Sanguine Cudgel'],
    ['id' => 43887, 'name' => 'Sanguine Galoshes'],
    ['id' => 43881, 'name' => 'Sanguine Greaves'],
    ['id' => 43868, 'name' => 'Sanguine Hatchet'],
    ['id' => 43876, 'name' => 'Sanguine Legs'],
    ['id' => 43870, 'name' => 'Sanguine Razor'],
    ['id' => 43885, 'name' => 'Sanguine Rod'],
    ['id' => 50146, 'name' => 'Sanguine Trousers'],
    ['id' => 49863, 'name' => 'Siphoning Inferniarch Arbalest'],
    ['id' => 49866, 'name' => 'Siphoning Inferniarch Battleaxe'],
    ['id' => 49878, 'name' => 'Siphoning Inferniarch Blade'],
    ['id' => 49860, 'name' => 'Siphoning Inferniarch Bow'],
    ['id' => 50253, 'name' => 'Siphoning Inferniarch Claws'],
    ['id' => 49872, 'name' => 'Siphoning Inferniarch Flail'],
    ['id' => 49869, 'name' => 'Siphoning Inferniarch Greataxe'],
    ['id' => 49887, 'name' => 'Siphoning Inferniarch Rod'],
    ['id' => 49881, 'name' => 'Siphoning Inferniarch Slayer'],
    ['id' => 49884, 'name' => 'Siphoning Inferniarch Wand'],
    ['id' => 49875, 'name' => 'Siphoning Inferniarch Warhammer'],
    ['id' => 8097, 'name' => 'Solar Axe'],
    ['id' => 34084, 'name' => 'Soulbiter'],
    ['id' => 34088, 'name' => 'Soulbleeder'],
    ['id' => 34086, 'name' => 'Soulcrusher'],
    ['id' => 34082, 'name' => 'Soulcutter'],
    ['id' => 34085, 'name' => 'Souleater'],
    ['id' => 50254, 'name' => 'Soulgarb'],
    ['id' => 34091, 'name' => 'Soulhexer'],
    ['id' => 50159, 'name' => 'Soulkamas'],
    ['id' => 34087, 'name' => 'Soulmaimer'],
    ['id' => 34095, 'name' => 'Soulmantle'],
    ['id' => 34089, 'name' => 'Soulpiercer'],
    ['id' => 34092, 'name' => 'Soulshanks'],
    ['id' => 34094, 'name' => 'Soulshell'],
    ['id' => 34083, 'name' => 'Soulshredder'],
    ['id' => 34096, 'name' => 'Soulshroud'],
    ['id' => 50240, 'name' => 'Soulsoles'],
    ['id' => 34093, 'name' => 'Soulstrider'],
    ['id' => 34090, 'name' => 'Soultainter'],
    ['id' => 39147, 'name' => 'Spiritthorn Armor'],
    ['id' => 39148, 'name' => 'Spiritthorn Helmet'],
    ['id' => 40589, 'name' => 'Stitched Mutant Hide Legs'],
    ['id' => 44648, 'name' => 'Stoic Iks Boots'],
    ['id' => 44636, 'name' => 'Stoic Iks Casque'],
    ['id' => 44620, 'name' => 'Stoic Iks Chestplate'],
    ['id' => 44619, 'name' => 'Stoic Iks Cuirass'],
    ['id' => 44642, 'name' => 'Stoic Iks Culet'],
    ['id' => 44643, 'name' => 'Stoic Iks Faulds'],
    ['id' => 44637, 'name' => 'Stoic Iks Headpiece'],
    ['id' => 50255, 'name' => 'Stoic Iks Robe'],
    ['id' => 44649, 'name' => 'Stoic Iks Sandals'],
    ['id' => 35515, 'name' => 'Throwing Axe'],
    ['id' => 3309, 'name' => 'Thunder Hammer'],
    ['id' => 22756, 'name' => 'Treader of Torment'],
    ['id' => 19356, 'name' => 'Triple Bolt Crossbow'],
    ['id' => 20072, 'name' => 'Umbral Master Axe'],
    ['id' => 20084, 'name' => 'Umbral Master Bow'],
    ['id' => 20075, 'name' => 'Umbral Master Chopper'],
    ['id' => 20087, 'name' => 'Umbral Master Crossbow'],
    ['id' => 20081, 'name' => 'Umbral Master Hammer'],
    ['id' => 50165, 'name' => 'Umbral Master Katar'],
    ['id' => 20078, 'name' => 'Umbral Master Mace'],
    ['id' => 20069, 'name' => 'Umbral Master Slayer'],
    ['id' => 20066, 'name' => 'Umbral Masterblade'],
    ['id' => 44622, 'name' => 'Unerring Dragon Scale Armor'],
    ['id' => 22754, 'name' => 'Visage of the End Days'],
    ['id' => 12603, 'name' => 'Wand of Dimensions'],
];

$itemDefinitions = [];
$itemNameMap = [];

foreach ($trackedItems as $item) {
    $id = (int) ($item['id'] ?? 0);
    if ($id <= 0) {
        continue;
    }

    $name = trim($item['name'] ?? '');
    if ($name === '') {
        $name = getItemNameById($id);
    }

    if ($name === '') {
        $name = 'Item ' . $id;
    }

    $itemDefinitions[] = [
        'id' => $id,
        'name' => $name,
        'image' => $config['item_images_url'] . $id . '.gif',
    ];
    $itemNameMap[$id] = $name;
}

$trackedItemIds = array_column($itemDefinitions, 'id');
$playersList = [];

if (!empty($trackedItemIds)) {
    $placeholders = implode(',', array_fill(0, count($trackedItemIds), '?'));

    $itemSources = [];
    $queryParams = [];

    if ($db->hasTable('player_items')) {
        $itemSources[] = 'SELECT player_id, itemtype AS item_id, SUM(count) AS quantity FROM player_items WHERE itemtype IN (' . $placeholders . ') GROUP BY player_id, itemtype';
        $queryParams = array_merge($queryParams, $trackedItemIds);
    }

    if ($db->hasTable('player_depotitems')) {
        $itemSources[] = 'SELECT player_id, itemtype AS item_id, SUM(count) AS quantity FROM player_depotitems WHERE itemtype IN (' . $placeholders . ') GROUP BY player_id, itemtype';
        $queryParams = array_merge($queryParams, $trackedItemIds);
    }

    if ($db->hasTable('player_inboxitems')) {
        $itemSources[] = 'SELECT player_id, itemtype AS item_id, SUM(count) AS quantity FROM player_inboxitems WHERE itemtype IN (' . $placeholders . ') GROUP BY player_id, itemtype';
        $queryParams = array_merge($queryParams, $trackedItemIds);
    }

    if ($db->hasTable('player_stash')) {
        $itemSources[] = 'SELECT player_id, item_id AS item_id, SUM(item_count) AS quantity FROM player_stash WHERE item_id IN (' . $placeholders . ') GROUP BY player_id, item_id';
        $queryParams = array_merge($queryParams, $trackedItemIds);
    }

    if (!empty($itemSources)) {
        $itemQuery = 'SELECT player_id, item_id, SUM(quantity) AS total_quantity FROM (' . implode(' UNION ALL ', $itemSources) . ') AS item_union GROUP BY player_id, item_id';
        $statement = $db->prepare($itemQuery);
        $statement->execute($queryParams);

        $playerItemData = [];
        foreach ($statement as $row) {
            $playerId = (int) $row['player_id'];
            $itemId = (int) $row['item_id'];
            $count = (int) $row['total_quantity'];

            if ($count <= 0) {
                continue;
            }

            if (!isset($playerItemData[$playerId])) {
                $playerItemData[$playerId] = [
                    'items' => [],
                    'total' => 0,
                ];
            }

            $playerItemData[$playerId]['items'][$itemId] = $count;
            $playerItemData[$playerId]['total'] += $count;
        }

        if (!empty($playerItemData)) {
            $playerIds = array_keys($playerItemData);
            $playerPlaceholders = implode(',', array_fill(0, count($playerIds), '?'));
            $playerQuery = 'SELECT id, name, level, vocation, looktype, lookaddons, lookhead, lookbody, looklegs, lookfeet FROM players WHERE id IN (' . $playerPlaceholders . ')';
            $playerStmt = $db->prepare($playerQuery);
            $playerStmt->execute($playerIds);

            $outfitHasAddons = $db->hasColumn('players', 'lookaddons');

            foreach ($playerStmt as $player) {
                $playerId = (int) $player['id'];
                if (!isset($playerItemData[$playerId])) {
                    continue;
                }

                $itemsForPlayer = [];
                foreach ($playerItemData[$playerId]['items'] as $itemId => $count) {
                    $itemsForPlayer[] = [
                        'id' => $itemId,
                        'name' => $itemNameMap[$itemId] ?? ('Item ' . $itemId),
                        'count' => $count,
                        'image' => $config['item_images_url'] . $itemId . '.gif',
                    ];
                }

                usort($itemsForPlayer, static function ($a, $b) {
                    if ($a['count'] === $b['count']) {
                        return $a['id'] <=> $b['id'];
                    }

                    return $b['count'] <=> $a['count'];
                });

                $outfit = $config['outfit_images_url'] . '?id=' . (int) $player['looktype']
                    . ($outfitHasAddons && !empty($player['lookaddons']) ? '&addons=' . (int) $player['lookaddons'] : '')
                    . '&head=' . (int) $player['lookhead']
                    . '&body=' . (int) $player['lookbody']
                    . '&legs=' . (int) $player['looklegs']
                    . '&feet=' . (int) $player['lookfeet'];

                $playersList[] = [
                    'id' => $playerId,
                    'name' => $player['name'],
                    'level' => (int) $player['level'],
                    'vocation' => $config['vocations'][$player['vocation']] ?? $player['vocation'],
                    'outfit' => $outfit,
                    'items' => $itemsForPlayer,
                    'total_items' => $playerItemData[$playerId]['total'],
                ];
            }

            usort($playersList, static function ($a, $b) {
                if ($a['total_items'] === $b['total_items']) {
                    return strcasecmp($a['name'], $b['name']);
                }

                return $b['total_items'] <=> $a['total_items'];
            });
        }
    }
}

// --- Paginación de jugadores ---
$perPage = 10; // máximo jugadores por página
$totalPlayers = count($playersList);
$totalPages = $totalPlayers > 0 ? (int) ceil($totalPlayers / $perPage) : 0;

// página actual desde ?page=, mínimo 1
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}
if ($totalPages > 0 && $page > $totalPages) {
    $page = $totalPages;
}

// offset y slice del array
$offset = ($page - 1) * $perPage;
$playersPage = array_slice($playersList, $offset, $perPage);

// Render Twig
$twig->display('top-items.html.twig', [
    'rare_items'    => $itemDefinitions,
    'players'       => $playersPage,      // <--- solo 10 jugadores
    'total_pages'   => $totalPages,
    'current_page'  => $page,
    'total_players' => $totalPlayers,
]);
