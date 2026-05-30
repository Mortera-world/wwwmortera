<?php

global $config, $db, $template_path;
$loggedAccountId = null;
if ($logged && isset($account_logged) && method_exists($account_logged, 'getId')) {
    $loggedAccountId = (int) $account_logged->getId();
}

$auction_iddetails = (int) $getPageDetails;
if ($auction_iddetails <= 0) {
    echo 'We can not find auction with this id!';
    return;
}

/* GET INFO AUCTION */
$auctionStatement = $db->prepare('SELECT `id`, `account_old`, `account_new`, `player_id`, `price`, `date_end`, `date_start`, `bid_account`, `bid_price`, `status` FROM `myaac_charbazaar` WHERE `id` = :id');
$auctionStatement->execute([':id' => $auction_iddetails]);
$getAuction = $auctionStatement->fetch(PDO::FETCH_ASSOC);
if (!$getAuction) {
    echo 'We can not find auction with this id!';
    return;
}
/* GET INFO AUCTION END */

/* GET INFO CHARACTER */
$characterStatement = $db->prepare('SELECT `name`, `vocation`, `level`, `sex`, `looktype`, `lookaddons`, `lookhead`, `lookbody`, `looklegs`, `lookfeet`, `health`, `healthmax`, `mana`, `manamax`, `maglevel`, `manaspent`, `balance`, `skill_fist`, `skill_fist_tries`, `skill_club`, `skill_club_tries`, `skill_sword`, `skill_sword_tries`, `skill_axe`, `skill_axe_tries`, `skill_dist`, `skill_dist_tries`, `skill_shielding`, `skill_shielding_tries`, `skill_fishing`, `skill_fishing_tries`, `cap`, `soul`, `created`, `experience`, `boss_points`, `forge_dusts`, `forge_dust_level`, `blessings1`, `blessings2`, `blessings3`, `blessings4`, `blessings5`, `blessings6`, `blessings7`, `blessings8` FROM `players` WHERE `id` = :player');
$characterStatement->execute([':player' => $getAuction['player_id']]);
$character = $characterStatement->fetch(PDO::FETCH_ASSOC);
if (!$character) {
    echo 'We can not find character for this auction!';
    return;
}
/* GET INFO CHARACTER END */

/* GET ITEMS FROM DIFFERENT SOURCES */
$playerId = (int) $getAuction['player_id'];

if (!function_exists('bazaarExtractItemTier')) {
    function bazaarExtractItemTier($attributes): int
    {
        if (empty($attributes)) {
            return 0;
        }

        $attributes = (string) $attributes;
        $offset = 0;
        $length = strlen($attributes);

        while ($offset < $length) {
            $attribute = ord($attributes[$offset]);
            $offset++;

            switch ($attribute) {
                case 0:
                    return 0;
                case 1:
                case 18:
                    $offset += 8;
                    break;
                case 4:
                case 5:
                case 12:
                case 22:
                case 39:
                    $offset += 2;
                    break;
                case 6:
                case 7:
                case 19:
                case 24:
                case 25:
                case 26:
                case 34:
                case 42:
                    if ($offset + 2 > $length) {
                        return 0;
                    }

                    $stringLength = unpack('v', substr($attributes, $offset, 2))[1];
                    $offset += 2 + $stringLength;
                    break;
                case 15:
                case 17:
                case 32:
                case 33:
                case 36:
                    $offset += 1;
                    break;
                case 16:
                case 27:
                case 28:
                case 29:
                case 30:
                case 31:
                case 35:
                case 38:
                case 43:
                case 44:
                    $offset += 4;
                    break;
                case 40:
                    if ($offset >= $length) {
                        return 0;
                    }

                    return max(1, min(30, ord($attributes[$offset])));
                case 41:
                    return 0;
                default:
                    return 0;
            }
        }

        return 0;
    }
}

if (!function_exists('bazaarExtractItemUpgradeCount')) {
    function bazaarExtractItemUpgradeCount($attributes): int
    {
        if (empty($attributes)) {
            return 0;
        }

        $attributes = (string) $attributes;
        $pos = strpos($attributes, 'upgrade_count');
        if ($pos === false) {
            return 0;
        }

        $valuePos = $pos + strlen('upgrade_count') + 1;
        $bytes = substr($attributes, $valuePos, 8);
        if (strlen($bytes) < 4) {
            return 0;
        }

        $value = (int) (unpack('V', substr($bytes, 0, 4))[1] ?? 0);
        if ($value <= 0) {
            return 0;
        }

        return min(100, $value);
    }
}

if (!function_exists('bazaarRenderTieredItem')) {
    function bazaarRenderTieredItem($itemType, int $tier = 0, int $upgradeCount = 0): string
    {
        $image = Validator::number($itemType)
            ? getItemImage($itemType)
            : "<img src='images/items/{$itemType}.gif' width='32' height='32' border='0' alt='{$itemType}' />";

        if (!Validator::number($itemType) || ($tier <= 0 && $upgradeCount <= 0)) {
            return $image;
        }

        $badges = '';
        if ($tier > 0) {
            $badges .= '<span class="character-item-tier">' . max(1, min(30, $tier)) . '</span>';
        }

        if ($upgradeCount > 0) {
            $badges .= '<span class="character-item-upgrade">+' . max(1, min(100, $upgradeCount)) . '</span>';
        }

        return '<span class="character-tiered-item">' . $image . $badges . '</span>';
    }
}

$getDepotItems = [];
if ($db->hasTableAndColumns('player_depotitems', ['itemtype'])) {
    $depotHasCount = $db->hasTableAndColumns('player_depotitems', ['count']);
    $depotHasTier = $db->hasTableAndColumns('player_depotitems', ['tier']);
    $depotHasAttributes = $db->hasTableAndColumns('player_depotitems', ['attributes']);
    $depotColumns = '`itemtype`';
    if ($depotHasCount) {
        $depotColumns .= ', `count`';
    }
    if ($depotHasTier) {
        $depotColumns .= ', `tier`';
    }
    if ($depotHasAttributes) {
        $depotColumns .= ', `attributes`';
    }
    $depotStatement = $db->prepare('SELECT ' . $depotColumns . ' FROM `player_depotitems` WHERE `player_id` = :player');
    $depotStatement->execute([':player' => $playerId]);
    foreach ($depotStatement as $depotRow) {
        $count = $depotHasCount && isset($depotRow['count']) ? (int) $depotRow['count'] : 1;
        if ($count <= 0) {
            $count = 1;
        }
        $depotAttributes = $depotHasAttributes ? ($depotRow['attributes'] ?? '') : '';
        $getDepotItems[] = [
            'itemtype' => (int) $depotRow['itemtype'],
            'count' => $count,
            'tier' => $depotHasTier && isset($depotRow['tier']) ? (int) $depotRow['tier'] : bazaarExtractItemTier($depotAttributes),
            'upgrade_count' => bazaarExtractItemUpgradeCount($depotAttributes),
        ];
    }
}

$backpackItems = [];
$equipment = [];
$equipmentTier = array_fill(0, 11, 0);
$equipmentUpgrade = array_fill(0, 11, 0);
$playerItemsHasPidItem = $db->hasTableAndColumns('player_items', ['pid', 'itemtype']);
$playerItemsHasCount = $db->hasTableAndColumns('player_items', ['count']);
$playerItemsHasTier = $db->hasTableAndColumns('player_items', ['tier']);
$playerItemsHasAttributes = $db->hasTableAndColumns('player_items', ['attributes']);
if ($playerItemsHasPidItem) {
    $itemColumns = '`pid`, `itemtype`';
    if ($playerItemsHasCount) {
        $itemColumns .= ', `count`';
    }
    if ($playerItemsHasTier) {
        $itemColumns .= ', `tier`';
    }
    if ($playerItemsHasAttributes) {
        $itemColumns .= ', `attributes`';
    }
    $itemsStatement = $db->prepare('SELECT ' . $itemColumns . ' FROM `player_items` WHERE `player_id` = :player');
    $itemsStatement->execute([':player' => $playerId]);
    foreach ($itemsStatement as $itemRow) {
        $pid = (int) $itemRow['pid'];
        $itemType = (int) $itemRow['itemtype'];
        $itemCount = $playerItemsHasCount && isset($itemRow['count']) ? (int) $itemRow['count'] : 1;
        if ($itemCount <= 0) {
            $itemCount = 1;
        }
        $itemAttributes = $playerItemsHasAttributes ? ($itemRow['attributes'] ?? '') : '';
        $itemTier = $playerItemsHasTier && isset($itemRow['tier']) ? (int) $itemRow['tier'] : bazaarExtractItemTier($itemAttributes);
        $itemUpgradeCount = bazaarExtractItemUpgradeCount($itemAttributes);

        if ($pid >= 1 && $pid <= 10) {
            $equipment[$pid] = $itemType;
            $equipmentTier[$pid] = $itemTier;
            $equipmentUpgrade[$pid] = $itemUpgradeCount;
            continue;
        }

        $backpackItems[] = [
            'itemtype' => $itemType,
            'count' => $itemCount,
            'tier' => $itemTier,
            'upgrade_count' => $itemUpgradeCount,
        ];
    }
}

$inboxItems = [];
if ($db->hasTableAndColumns('player_inboxitems', ['itemtype'])) {
    $inboxHasCount = $db->hasTableAndColumns('player_inboxitems', ['count']);
    $inboxHasTier = $db->hasTableAndColumns('player_inboxitems', ['tier']);
    $inboxHasAttributes = $db->hasTableAndColumns('player_inboxitems', ['attributes']);
    $inboxColumns = '`itemtype`';
    if ($inboxHasCount) {
        $inboxColumns .= ', `count`';
    }
    if ($inboxHasTier) {
        $inboxColumns .= ', `tier`';
    }
    if ($inboxHasAttributes) {
        $inboxColumns .= ', `attributes`';
    }
    $inboxStatement = $db->prepare('SELECT ' . $inboxColumns . ' FROM `player_inboxitems` WHERE `player_id` = :player');
    $inboxStatement->execute([':player' => $playerId]);
    foreach ($inboxStatement as $inboxRow) {
        $count = $inboxHasCount && isset($inboxRow['count']) ? (int) $inboxRow['count'] : 1;
        if ($count <= 0) {
            $count = 1;
        }
        $inboxAttributes = $inboxHasAttributes ? ($inboxRow['attributes'] ?? '') : '';
        $inboxItems[] = [
            'itemtype' => (int) $inboxRow['itemtype'],
            'count' => $count,
            'tier' => $inboxHasTier && isset($inboxRow['tier']) ? (int) $inboxRow['tier'] : bazaarExtractItemTier($inboxAttributes),
            'upgrade_count' => bazaarExtractItemUpgradeCount($inboxAttributes),
        ];
    }
}

$stashItems = [];
if ($db->hasTableAndColumns('player_stash', ['item_id', 'item_count'])) {
    $stashStatement = $db->prepare('SELECT `item_id`, `item_count` FROM `player_stash` WHERE `player_id` = :player');
    $stashStatement->execute([':player' => $playerId]);
    foreach ($stashStatement as $stashRow) {
        $stashItems[] = [
            'itemtype' => (int) $stashRow['item_id'],
            'count' => (int) $stashRow['item_count'],
            'tier' => 0,
            'upgrade_count' => 0,
        ];
    }
}
/* GET ITEMS FROM DIFFERENT SOURCES END */

$characterVocationId = (int) $character['vocation'];
$skillPercents = [
    'axe' => getSkillProgressPercent((int) $character['skill_axe'], (int) $character['skill_axe_tries'], 'axe', $characterVocationId),
    'club' => getSkillProgressPercent((int) $character['skill_club'], (int) $character['skill_club_tries'], 'club', $characterVocationId),
    'dist' => getSkillProgressPercent((int) $character['skill_dist'], (int) $character['skill_dist_tries'], 'dist', $characterVocationId),
    'fishing' => getSkillProgressPercent((int) $character['skill_fishing'], (int) $character['skill_fishing_tries'], 'fishing', $characterVocationId),
    'fist' => getSkillProgressPercent((int) $character['skill_fist'], (int) $character['skill_fist_tries'], 'fist', $characterVocationId),
    'shielding' => getSkillProgressPercent((int) $character['skill_shielding'], (int) $character['skill_shielding_tries'], 'shielding', $characterVocationId),
    'sword' => getSkillProgressPercent((int) $character['skill_sword'], (int) $character['skill_sword_tries'], 'sword', $characterVocationId),
];
$magicLevelPercent = OTS_Player::getMagicLevelPercent($character);
$bazaarGeneralSkills = [
    ['label' => 'Axe Fighting', 'value' => (int) $character['skill_axe'], 'percent' => (int) $skillPercents['axe']],
    ['label' => 'Club Fighting', 'value' => (int) $character['skill_club'], 'percent' => (int) $skillPercents['club']],
    ['label' => 'Distance Fighting', 'value' => (int) $character['skill_dist'], 'percent' => (int) $skillPercents['dist']],
    ['label' => 'Fishing', 'value' => (int) $character['skill_fishing'], 'percent' => (int) $skillPercents['fishing']],
    ['label' => 'Fist Fighting', 'value' => (int) $character['skill_fist'], 'percent' => (int) $skillPercents['fist']],
    ['label' => 'Shielding', 'value' => (int) $character['skill_shielding'], 'percent' => (int) $skillPercents['shielding']],
    ['label' => 'Sword Fighting', 'value' => (int) $character['skill_sword'], 'percent' => (int) $skillPercents['sword']],
    ['label' => 'Magic Level', 'value' => (int) $character['maglevel'], 'percent' => (int) $magicLevelPercent],
];
$exaltedDustCurrent = (int) ($character['forge_dusts'] ?? 0);
$exaltedDustMax = (int) ($character['forge_dust_level'] ?? 0);

$bazaarBestSkills = [
    'Magic Level' => (int) $character['maglevel'],
    'Fist' => (int) $character['skill_fist'],
    'Club' => (int) $character['skill_club'],
    'Sword' => (int) $character['skill_sword'],
    'Axe' => (int) $character['skill_axe'],
    'Distance' => (int) $character['skill_dist'],
    'Shielding' => (int) $character['skill_shielding'],
    'Fishing' => (int) $character['skill_fishing'],
];
arsort($bazaarBestSkills);
$bazaarBestSkillName = (string) array_key_first($bazaarBestSkills);
$bazaarBestSkillValue = (int) reset($bazaarBestSkills);

/* GET BLESS */
$BlessCount = 0;
for ($b = 1; $b < 8; $b++) {
    if ($character["blessings$b"] >= 1) {
        $BlessCount++;
    }
}
$BlessTwist = ($character['blessings8'] >= 1) ? 'yes' : 'no';
/* GET BLESS END */

/* GET CHARM CHARACTER */
$getCharm = [];
if ($db->hasTableAndColumns('player_charms', ['player_id'])) {
    $charmStatement = $db->prepare('SELECT `charm_points`, `max_charm_points`, `charm_expansion`, `UsedRunesBit`, `UnlockedRunesBit` FROM `player_charms` WHERE `player_id` = :player');
    $charmStatement->execute([':player' => $getAuction['player_id']]);
    $getCharm = $charmStatement->fetch(PDO::FETCH_ASSOC) ?: [];
}

$Charm_Points = isset($getCharm['max_charm_points']) ? (int) $getCharm['max_charm_points'] : (int) ($getCharm['charm_points'] ?? 0);
$Charm_UsedPoints = (int) ($getCharm['charm_points'] ?? 0);
$Charm_Expansion = isset($getCharm['charm_expansion']) && $getCharm['charm_expansion'] == 1
    ? "<img src='{$template_path}/images/premiumfeatures/icon_yes.png'> yes"
    : "<img src='{$template_path}/images/premiumfeatures/icon_no.png'> no";
/* GET CHARM CHARACTER END */

/* OUTFIT CHARACTER */
$outfit_url = "{$config['outfit_images_url']}?id={$character['looktype']}" . (!empty($character['lookaddons']) ? "&addons={$character['lookaddons']}" : '') . "&head={$character['lookhead']}&body={$character['lookbody']}&legs={$character['looklegs']}&feet={$character['lookfeet']}";
/* OUTFIT CHARACTER */

/* EQUIPAMENT CHARACTER */
global $db;
if (empty($equipment) && $db->hasTableAndColumns('player_items', ['pid', 'itemtype'])) {
    $tierColumn = $db->hasTableAndColumns('player_items', ['tier']) ? ', `tier`' : '';
    $attributesColumn = $db->hasTableAndColumns('player_items', ['attributes']) ? ', `attributes`' : '';
    $equipmentStatement = $db->prepare('SELECT `pid`, `itemtype`' . $tierColumn . $attributesColumn . ' FROM `player_items` WHERE `player_id` = :player AND (`pid` >= 1 and `pid` <= 10)');
    $equipmentStatement->execute([':player' => $playerId]);
    foreach ($equipmentStatement as $eq) {
        $pid = (int) $eq['pid'];
        $equipment[$pid] = (int) $eq['itemtype'];
        if (!isset($equipmentTier[$pid])) {
            $equipmentTier[$pid] = 0;
        }
        if (!isset($equipmentUpgrade[$pid])) {
            $equipmentUpgrade[$pid] = 0;
        }
        if ($tierColumn && isset($eq['tier'])) {
            $equipmentTier[$pid] = (int) $eq['tier'];
        }
        if (!$tierColumn && isset($eq['attributes'])) {
            $equipmentTier[$pid] = bazaarExtractItemTier($eq['attributes']);
        }
        if (isset($eq['attributes'])) {
            $equipmentUpgrade[$pid] = bazaarExtractItemUpgradeCount($eq['attributes']);
        }
    }
}

$empty_slots = ["", "no_helmet", "no_necklace", "no_backpack", "no_armor", "no_handleft", "no_handright", "no_legs", "no_boots", "no_ring", "no_ammo"];
for ($i = 0; $i <= 10; $i++) {
    if (!isset($equipment[$i]) || $equipment[$i] == 0) {
        $equipment[$i] = $empty_slots[$i];
        $equipmentTier[$i] = 0;
        $equipmentUpgrade[$i] = 0;
    }
}

for ($i = 1; $i < 11; $i++) {
    if (!isset($equipmentTier[$i])) {
        $equipmentTier[$i] = 0;
    }
    if (!isset($equipmentUpgrade[$i])) {
        $equipmentUpgrade[$i] = 0;
    }
    if (!Validator::number($equipment[$i])) {
        $equipmentTier[$i] = 0;
        $equipmentUpgrade[$i] = 0;
    }

    $equipment[$i] = bazaarRenderTieredItem($equipment[$i], (int) $equipmentTier[$i], (int) $equipmentUpgrade[$i]);
}
/* EQUIPAMENT CHARACTER END */

/* CONVERT SEX */
$character_sex = $config['genders'][$character['sex']] ?? ($character['sex'] == 0 ? 'Male' : 'Female');
/* CONVERT SEX END */

/* CONVERT VOCATION */
$character_voc = $config['vocations'][$character['vocation']] ?? null;
if (!$character_voc) {
    $vocationId = $character['vocation'];
    $character_voc = '';
    switch ($vocationId) {
        default:
        case 0:
            $character_voc = 'None';
            break;
        case 1:
        case 5:
            if ($vocationId == 5) {
                $character_voc = 'Master ';
            }
            $character_voc .= 'Sorcerer';
            break;
        case 2:
        case 6:
            if ($vocationId == 6) {
                $character_voc = 'Elder ';
            }
            $character_voc .= 'Druid';
            break;
        case 3:
        case 7:
            if ($vocationId == 7) {
                $character_voc = 'Royal ';
            }
            $character_voc .= 'Paladin';
            break;
        case 4:
        case 8:
            if ($vocationId == 8) {
                $character_voc = 'Elite ';
            }
            $character_voc .= 'Knight';
            break;
    }
}
/* CONVERT VOCATION END */

/* GET QUESTS */
$quests = [];
$questDefinitions = $config['quests'] ?? [];
if (!empty($questDefinitions)) {
    $playerId = (int) $getAuction['player_id'];

    $storageKeys = [];
    $kvKeys = [];

    foreach ($questDefinitions as $questName => $questValue) {
        if (is_numeric($questValue)) {
            $storageKeys[$questName] = (int) $questValue;
        } else {
            $kvKeys[$questName] = $questValue;
        }
    }

    $player_storage = [];
    if (!empty($storageKeys) && $db->hasTableAndColumns('player_storage', ['player_id', 'key', 'value'])) {
        $placeholders = [];
        $params = [':player' => $playerId];
        $index = 0;

        foreach ($storageKeys as $storageKey) {
            $placeholder = ':storage' . $index++;
            $placeholders[] = $placeholder;
            $params[$placeholder] = $storageKey;
        }

        if (!empty($placeholders)) {
            $storageStatement = $db->prepare('SELECT `key`, `value` FROM `player_storage` WHERE `player_id` = :player AND `key` IN (' . implode(', ', $placeholders) . ')');
            foreach ($params as $param => $value) {
                $storageStatement->bindValue($param, $value, PDO::PARAM_INT);
            }
            $storageStatement->execute();
            foreach ($storageStatement as $storage) {
                $player_storage[$storage['key']] = $storage['value'];
            }
        }
    }

    $player_kv = [];
    if (!empty($kvKeys) && $db->hasTableAndColumns('kv_store', ['key_name', 'value'])) {
        $kvPlaceholders = [];
        $kvParams = [];
        $index = 0;

        foreach ($kvKeys as $kvKey) {
            $placeholder = ':kv' . $index++;
            $kvPlaceholders[] = $placeholder;
            $kvParams[$placeholder] = 'player.' . $playerId . '.quests.' . $kvKey . '.completed';
        }

        if (!empty($kvPlaceholders)) {
            $kvStatement = $db->prepare('SELECT `key_name`, `value` FROM `kv_store` WHERE `key_name` IN (' . implode(', ', $kvPlaceholders) . ')');
            foreach ($kvParams as $param => $value) {
                $kvStatement->bindValue($param, $value, PDO::PARAM_STR);
            }
            $kvStatement->execute();
            foreach ($kvStatement as $kvEntry) {
                $player_kv[$kvEntry['key_name']] = $kvEntry['value'];
            }
        }
    }

    foreach ($questDefinitions as $questName => $questValue) {
        if (is_numeric($questValue)) {
            $quests[$questName] = isset($player_storage[$questValue]) && $player_storage[$questValue] > 0;
        } else {
            $questKey = 'player.' . $playerId . '.quests.' . $questValue . '.completed';
            $quests[$questName] = isset($player_kv[$questKey]);
        }
    }
}
/* GET QUESTS END */

/* COLLECTIONS: MOUNTS & OUTFITS */
$mountCollections = [];
$mountNames = [];
$outfitCollections = [];
$quoteCollectionIdentifier = static function (string $identifier): string {
    return '`' . str_replace('`', '``', $identifier) . '`';
};

$decodeKvInteger = static function ($rawValue): ?int {
    if ($rawValue === null || $rawValue === '') {
        return null;
    }

    if (is_scalar($rawValue) && is_numeric(trim((string) $rawValue))) {
        return (int) trim((string) $rawValue);
    }

    $bytes = unpack('C*', (string) $rawValue);
    if ($bytes === false || empty($bytes)) {
        return null;
    }

    $bytes = array_values($bytes);
    $offsets = [0];
    if (isset($bytes[0]) && in_array($bytes[0], [8, 16, 24], true)) {
        array_unshift($offsets, 1);
    }

    foreach ($offsets as $offset) {
        $value = 0;
        $shift = 0;
        for ($index = $offset; $index < count($bytes); $index++) {
            $byte = $bytes[$index];
            $value |= ($byte & 0x7F) << $shift;
            if (($byte & 0x80) === 0) {
                return $value;
            }
            $shift += 7;
            if ($shift > 28) {
                break;
            }
        }
    }

    return null;
};

$findCollectionSource = static function (array $candidates) use ($db): ?array {
    foreach ($candidates as $candidate) {
        $columns = [$candidate['player'], $candidate['id']];
        if (isset($candidate['addons'])) {
            $columns[] = $candidate['addons'];
        }

        if ($db->hasTableAndColumns($candidate['table'], $columns)) {
            return $candidate;
        }
    }

    return null;
};

$findDefinitionSource = static function (array $candidates) use ($db): ?array {
    foreach ($candidates as $candidate) {
        if ($db->hasTableAndColumns($candidate['table'], [$candidate['id'], $candidate['name']])) {
            return $candidate;
        }
    }

    return null;
};

$addMountCollection = static function (int $mountId, string $mountName = '') use (&$mountCollections): void {
    if ($mountId <= 0) {
        return;
    }

    $mountName = trim($mountName);
    if ($mountName === '') {
        $mountName = 'Mount #' . $mountId;
    }

    $mountCollections[$mountId] = $mountName;
};

$knownOutfitNames = [
    128 => 'Citizen Outfit', 136 => 'Citizen Outfit',
    129 => 'Hunter Outfit', 137 => 'Hunter Outfit',
    130 => 'Mage Outfit', 138 => 'Mage Outfit',
    131 => 'Knight Outfit', 139 => 'Knight Outfit',
    132 => 'Noble Outfit', 140 => 'Noble Outfit',
    133 => 'Summoner Outfit', 141 => 'Summoner Outfit',
    134 => 'Warrior Outfit', 142 => 'Warrior Outfit',
    143 => 'Barbarian Outfit', 147 => 'Barbarian Outfit',
    144 => 'Druid Outfit', 148 => 'Druid Outfit',
    145 => 'Wizard Outfit', 149 => 'Wizard Outfit',
    146 => 'Oriental Outfit', 150 => 'Oriental Outfit',
    151 => 'Pirate Outfit', 155 => 'Pirate Outfit',
    152 => 'Assassin Outfit', 156 => 'Assassin Outfit',
    153 => 'Beggar Outfit', 157 => 'Beggar Outfit',
    154 => 'Shaman Outfit', 158 => 'Shaman Outfit',
    251 => 'Norseman Outfit', 252 => 'Norseman Outfit',
    268 => 'Nightmare Outfit', 269 => 'Nightmare Outfit',
    273 => 'Jester Outfit', 270 => 'Jester Outfit',
    278 => 'Brotherhood Outfit', 279 => 'Brotherhood Outfit',
    289 => 'Demon Hunter Outfit', 288 => 'Demon Hunter Outfit',
    325 => 'Yalaharian Outfit', 324 => 'Yalaharian Outfit',
    328 => 'Warmaster Outfit', 329 => 'Warmaster Outfit',
    335 => 'Wayfarer Outfit', 336 => 'Wayfarer Outfit',
];

$knownMaleOutfitIds = [
    128, 129, 130, 131, 132, 133, 134, 143, 144, 145, 146, 151, 152, 153, 154,
    251, 268, 273, 278, 289, 325, 328, 335,
];
$knownFemaleOutfitIds = [
    136, 137, 138, 139, 140, 141, 142, 147, 148, 149, 150, 155, 156, 157, 158,
    252, 269, 270, 279, 288, 324, 329, 336,
];

$addOutfitCollection = static function (int $outfitId, int $addonsValue = 0, string $outfitName = '', ?int $sourceKey = null) use (&$outfitCollections, $knownOutfitNames): void {
    if ($outfitId <= 0) {
        return;
    }

    $outfitName = trim($outfitName);
    if ($outfitName === '') {
        $outfitName = $knownOutfitNames[$outfitId] ?? ('Outfit #' . $outfitId);
    }

    if (!isset($outfitCollections[$outfitId]) || $addonsValue > $outfitCollections[$outfitId]['addons']) {
        $outfitCollections[$outfitId] = [
            'name' => $outfitName,
            'addons' => max(0, $addonsValue),
            'source_key' => $sourceKey,
        ];
    }
};

$outfitStorageStart = 10001000;
$outfitStorageEnd = 10001500;
$mountStorageStart = 10002001;
$mountStorageEnd = 10002010;
$currentMountStorage = 10002011;
$outfitStorageMaleStart = null;

if ($db->hasTableAndColumns('player_storage', ['player_id', 'key', 'value'])) {
    $storageOutfitStatement = $db->prepare('SELECT `key`, `value` FROM `player_storage` WHERE `player_id` = :player AND `key` BETWEEN :start AND :end ORDER BY `key`');
    $storageOutfitStatement->bindValue(':player', $playerId, PDO::PARAM_INT);
    $storageOutfitStatement->bindValue(':start', $outfitStorageStart, PDO::PARAM_INT);
    $storageOutfitStatement->bindValue(':end', $outfitStorageEnd, PDO::PARAM_INT);
    $storageOutfitStatement->execute();

    foreach ($storageOutfitStatement as $outfitStorageRow) {
        $storageKey = (int) $outfitStorageRow['key'];
        $storageValue = (int) $outfitStorageRow['value'];
        if ($storageValue <= 0) {
            continue;
        }

        if ($storageValue >= 65536) {
            $outfitId = intdiv($storageValue, 65536);
            $addonsValue = $storageValue & 0xFF;
        } else {
            $outfitId = $storageKey - $outfitStorageStart;
            $addonsValue = $storageValue;
        }

        if ($outfitId === 128 && $outfitStorageMaleStart === null) {
            $outfitStorageMaleStart = $storageKey;
        }

        $addOutfitCollection($outfitId, $addonsValue, '', $storageKey);
    }

    $storageMountStatement = $db->prepare('SELECT `key`, `value` FROM `player_storage` WHERE `player_id` = :player AND `key` BETWEEN :start AND :end ORDER BY `key`');
    $storageMountStatement->bindValue(':player', $playerId, PDO::PARAM_INT);
    $storageMountStatement->bindValue(':start', $mountStorageStart, PDO::PARAM_INT);
    $storageMountStatement->bindValue(':end', $mountStorageEnd, PDO::PARAM_INT);
    $storageMountStatement->execute();

    foreach ($storageMountStatement as $mountStorageRow) {
        $storageKey = (int) $mountStorageRow['key'];
        $storageValue = (int) $mountStorageRow['value'];
        if ($storageValue === 0) {
            continue;
        }

        if ($storageValue < 0) {
            $storageValue += 4294967296;
        }

        $mountBlock = $storageKey - $mountStorageStart;
        for ($bit = 0; $bit < 32; $bit++) {
            if (($storageValue & (1 << $bit)) !== 0) {
                $mountId = ($mountBlock * 32) + $bit + 1;
                $addMountCollection($mountId);
            }
        }
    }

    $currentMountStatement = $db->prepare('SELECT `value` FROM `player_storage` WHERE `player_id` = :player AND `key` = :key LIMIT 1');
    $currentMountStatement->bindValue(':player', $playerId, PDO::PARAM_INT);
    $currentMountStatement->bindValue(':key', $currentMountStorage, PDO::PARAM_INT);
    $currentMountStatement->execute();
    $currentMountId = (int) $currentMountStatement->fetchColumn();
    if ($currentMountId > 0) {
        $addMountCollection($currentMountId, 'Current mount #' . $currentMountId);
    }
}

$mountSource = $findCollectionSource([
    ['table' => 'player_mounts', 'player' => 'player_id', 'id' => 'mount_id'],
    ['table' => 'player_mount', 'player' => 'player_id', 'id' => 'mount_id'],
    ['table' => 'player_mounts', 'player' => 'player_id', 'id' => 'mountid'],
    ['table' => 'player_mount', 'player' => 'player_id', 'id' => 'mountid'],
]);
$mountDefinition = $findDefinitionSource([
    ['table' => 'mounts', 'id' => 'id', 'name' => 'name'],
    ['table' => 'mount', 'id' => 'id', 'name' => 'name'],
]);

if ($mountSource !== null) {
    $mountTable = $quoteCollectionIdentifier($mountSource['table']);
    $mountIdColumn = $quoteCollectionIdentifier($mountSource['id']);
    $mountPlayerColumn = $quoteCollectionIdentifier($mountSource['player']);
    $mountQuery = 'SELECT pm.' . $mountIdColumn . ' AS mount_id';

    if ($mountDefinition !== null) {
        $mountDefinitionTable = $quoteCollectionIdentifier($mountDefinition['table']);
        $mountDefinitionIdColumn = $quoteCollectionIdentifier($mountDefinition['id']);
        $mountDefinitionNameColumn = $quoteCollectionIdentifier($mountDefinition['name']);
        $mountQuery .= ', m.' . $mountDefinitionNameColumn . ' AS name';
        $mountQuery .= ' FROM ' . $mountTable . ' pm LEFT JOIN ' . $mountDefinitionTable . ' m ON m.' . $mountDefinitionIdColumn . ' = pm.' . $mountIdColumn;
        $mountQuery .= ' WHERE pm.' . $mountPlayerColumn . ' = :player ORDER BY m.' . $mountDefinitionNameColumn . ' IS NULL, m.' . $mountDefinitionNameColumn . ', pm.' . $mountIdColumn;
    } else {
        $mountQuery .= ' FROM ' . $mountTable . ' pm WHERE pm.' . $mountPlayerColumn . ' = :player ORDER BY pm.' . $mountIdColumn;
    }

    $mountStatement = $db->prepare($mountQuery);
    $mountStatement->execute([':player' => $playerId]);
    foreach ($mountStatement as $mountRow) {
        $addMountCollection((int) $mountRow['mount_id'], isset($mountRow['name']) ? (string) $mountRow['name'] : '');
    }
}

if (empty($mountCollections) && $db->hasTableAndColumns('kv_store', ['key_name', 'value'])) {
    $lastMountStatement = $db->prepare('SELECT `value` FROM `kv_store` WHERE `key_name` = :key LIMIT 1');
    $lastMountStatement->execute([':key' => 'player.' . $playerId . '.last-mount']);
    $lastMountValue = $lastMountStatement->fetchColumn();
    $lastMountId = $decodeKvInteger($lastMountValue);
    if ($lastMountId !== null && $lastMountId > 0) {
        $addMountCollection($lastMountId, 'Last selected mount #' . $lastMountId);
    }
}

$outfitSource = $findCollectionSource([
    ['table' => 'player_outfits', 'player' => 'player_id', 'id' => 'outfit_id', 'addons' => 'addons'],
    ['table' => 'player_outfit', 'player' => 'player_id', 'id' => 'outfit_id', 'addons' => 'addons'],
    ['table' => 'player_outfits', 'player' => 'player_id', 'id' => 'looktype', 'addons' => 'addons'],
    ['table' => 'player_outfit', 'player' => 'player_id', 'id' => 'looktype', 'addons' => 'addons'],
    ['table' => 'player_outfits', 'player' => 'player_id', 'id' => 'looktype', 'addons' => 'lookaddons'],
    ['table' => 'player_outfit', 'player' => 'player_id', 'id' => 'looktype', 'addons' => 'lookaddons'],
]);
$outfitDefinition = $findDefinitionSource([
    ['table' => 'outfits', 'id' => 'id', 'name' => 'name'],
    ['table' => 'outfits', 'id' => 'looktype', 'name' => 'name'],
    ['table' => 'outfit', 'id' => 'id', 'name' => 'name'],
    ['table' => 'outfit', 'id' => 'looktype', 'name' => 'name'],
]);

if ($outfitSource !== null) {
    $outfitTable = $quoteCollectionIdentifier($outfitSource['table']);
    $outfitIdColumn = $quoteCollectionIdentifier($outfitSource['id']);
    $outfitAddonsColumn = $quoteCollectionIdentifier($outfitSource['addons']);
    $outfitPlayerColumn = $quoteCollectionIdentifier($outfitSource['player']);
    $outfitQuery = 'SELECT po.' . $outfitIdColumn . ' AS outfit_id, po.' . $outfitAddonsColumn . ' AS addons';

    if ($outfitDefinition !== null) {
        $outfitDefinitionTable = $quoteCollectionIdentifier($outfitDefinition['table']);
        $outfitDefinitionIdColumn = $quoteCollectionIdentifier($outfitDefinition['id']);
        $outfitDefinitionNameColumn = $quoteCollectionIdentifier($outfitDefinition['name']);
        $outfitQuery .= ', o.' . $outfitDefinitionNameColumn . ' AS name';
        $outfitQuery .= ' FROM ' . $outfitTable . ' po LEFT JOIN ' . $outfitDefinitionTable . ' o ON o.' . $outfitDefinitionIdColumn . ' = po.' . $outfitIdColumn;
        $outfitQuery .= ' WHERE po.' . $outfitPlayerColumn . ' = :player ORDER BY o.' . $outfitDefinitionNameColumn . ' IS NULL, o.' . $outfitDefinitionNameColumn . ', po.' . $outfitIdColumn;
    } else {
        $outfitQuery .= ' FROM ' . $outfitTable . ' po WHERE po.' . $outfitPlayerColumn . ' = :player ORDER BY po.' . $outfitIdColumn;
    }

    $outfitStatement = $db->prepare($outfitQuery);
    $outfitStatement->execute([':player' => $playerId]);
    foreach ($outfitStatement as $outfitRow) {
        $addOutfitCollection((int) $outfitRow['outfit_id'], (int) $outfitRow['addons'], isset($outfitRow['name']) ? (string) $outfitRow['name'] : '');
    }
}

$addOutfitCollection((int) $character['looktype'], (int) $character['lookaddons'], 'Current outfit #' . (int) $character['looktype']);

uasort($mountCollections, static function (string $left, string $right): int {
    return strcasecmp($left, $right);
});
$mountNames = array_values($mountCollections);

uasort($outfitCollections, static function (array $left, array $right): int {
    return strcasecmp($left['name'], $right['name']);
});

$formatAddonList = static function (int $addonsValue): array {
    $addons = [];
    if ($addonsValue & 1) {
        $addons[] = 'Addon 1';
    }
    if ($addonsValue & 2) {
        $addons[] = 'Addon 2';
    }
    if ($addonsValue & 4) {
        $addons[] = 'Addon 3';
    }

    return $addons;
};

$outfitDescriptions = [];
foreach ($outfitCollections as $outfitData) {
    $ownedAddons = $formatAddonList($outfitData['addons']);
    if (!empty($ownedAddons)) {
        $outfitDescriptions[] = $outfitData['name'] . ' (' . implode(', ', $ownedAddons) . ')';
    } else {
        $outfitDescriptions[] = $outfitData['name'];
    }
}

$characterIsMale = (int) $character['sex'] === 1;
$outfitMatchesCharacterSex = static function (int $outfitId, ?int $sourceKey = null) use ($characterIsMale, $knownMaleOutfitIds, $knownFemaleOutfitIds, $outfitStorageMaleStart): bool {
    if (in_array($outfitId, $knownMaleOutfitIds, true)) {
        return $characterIsMale;
    }

    if (in_array($outfitId, $knownFemaleOutfitIds, true)) {
        return !$characterIsMale;
    }

    if ($sourceKey !== null && $outfitStorageMaleStart !== null) {
        return $characterIsMale ? $sourceKey >= $outfitStorageMaleStart : $sourceKey < $outfitStorageMaleStart;
    }

    return true;
};

$collectionOutfitUrl = static function (int $looktype, int $addons = 0, ?int $mountId = null) use ($config, $character): string {
    $url = $config['outfit_images_url'] . '?id=' . $looktype;
    if ($addons > 0) {
        $url .= '&addons=' . $addons;
    }
    $url .= '&head=' . (int) $character['lookhead'];
    $url .= '&body=' . (int) $character['lookbody'];
    $url .= '&legs=' . (int) $character['looklegs'];
    $url .= '&feet=' . (int) $character['lookfeet'];
    if ($mountId !== null && $mountId > 0) {
        $url .= '&mount=' . $mountId;
    }

    return $url;
};

$collectionMountUrl = static function (int $mountId) use ($config): string {
    return $config['outfit_images_url'] . '?id=0&mount=' . $mountId;
};

$formatCollectionTooltip = static function (string $name, int $addonsValue): string {
    $addonText = $addonsValue >= 3 ? 'full addons: 3' : 'addons: ' . max(0, $addonsValue);

    return $name . ', ' . $addonText;
};

$outfitCollectionCards = [];
foreach ($outfitCollections as $outfitId => $outfitData) {
    if (!$outfitMatchesCharacterSex((int) $outfitId, $outfitData['source_key'] ?? null)) {
        continue;
    }

    $outfitCollectionCards[] = [
        'name' => $outfitData['name'],
        'tooltip' => $formatCollectionTooltip($outfitData['name'], (int) $outfitData['addons']),
        'image' => $collectionOutfitUrl((int) $outfitId, (int) $outfitData['addons']),
    ];
}

$mountCollectionCards = [];
foreach ($mountCollections as $mountId => $mountName) {
    $mountCollectionCards[] = [
        'name' => $mountName,
        'tooltip' => $mountName,
        'image' => $collectionOutfitUrl((int) $character['looktype'], (int) $character['lookaddons'], (int) $mountId),
    ];
}
$displayedOutfitCount = count($outfitCollectionCards);
$displayedMountCount = count($mountCollectionCards);
/* COLLECTIONS: MOUNTS & OUTFITS END */

/* ITEM SUMMARY PREPARATION */
$aggregateItems = static function (array $items): array {
    $result = [];
    foreach ($items as $item) {
        if (!isset($item['itemtype'])) {
            continue;
        }
        $itemType = (int) $item['itemtype'];
        if ($itemType <= 0) {
            continue;
        }
        $count = isset($item['count']) ? (int) $item['count'] : 1;
        if ($count <= 0) {
            $count = 1;
        }
        $tier = isset($item['tier']) ? (int) $item['tier'] : 0;
        if ($tier < 0) {
            $tier = 0;
        }
        if ($tier > 30) {
            $tier = 30;
        }
        $upgradeCount = isset($item['upgrade_count']) ? (int) $item['upgrade_count'] : 0;
        if ($upgradeCount < 0) {
            $upgradeCount = 0;
        }
        if ($upgradeCount > 100) {
            $upgradeCount = 100;
        }

        $key = $itemType . ':' . $tier . ':' . $upgradeCount;
        if (!isset($result[$key])) {
            $result[$key] = [
                'itemtype' => $itemType,
                'tier' => $tier,
                'upgrade_count' => $upgradeCount,
                'count' => 0,
            ];
        }
        $result[$key]['count'] += $count;
    }

    usort($result, static function (array $a, array $b): int {
        if ($a['itemtype'] === $b['itemtype']) {
            if ($a['tier'] === $b['tier']) {
                return $a['upgrade_count'] <=> $b['upgrade_count'];
            }

            return $a['tier'] <=> $b['tier'];
        }

        return $a['itemtype'] <=> $b['itemtype'];
    });

    return $result;
};

$itemSummaryItems = $aggregateItems(array_merge($backpackItems, $inboxItems, $getDepotItems, $stashItems));
/* ITEM SUMMARY PREPARATION END */

/* GET MY BID */
  $bidStatement = $db->prepare('SELECT `account_id`, `auction_id`, `bid`, `date` FROM `myaac_charbazaar_bid` WHERE `auction_id` = :auction ORDER BY `date` DESC LIMIT 1');
  $bidStatement->execute([':auction' => $getAuction['id']]);
  $getAuctionBid = $bidStatement->fetch(PDO::FETCH_ASSOC);

$My_Bid = '<img src="' . $template_path . '/images/premiumfeatures/icon_no.png">';
if ($loggedAccountId !== null && isset($getAuctionBid['account_id']) && (int) $getAuctionBid['account_id'] === $loggedAccountId) {
    $val = number_format($getAuctionBid['bid'], 0, ',', ',');
    $My_Bid = "<b>{$val}</b> <img src='{$template_path}/images/account/icon-tibiacointrusted.png' class='VSCCoinImages' title='Transferable Tibia Coins'>";
}
/* GET MY BID END */

/* VERIFY DATE */
$Hoje = date('Y-m-d H:i:s');
$End = date('Y-m-d H:i:s', strtotime($getAuction['date_end']));
/* VERIFY DATE END */
?>

<style>
.BazaarCollectionGrid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(72px, 72px));
    gap: 8px;
    justify-content: start;
    padding: 10px;
}

.BazaarCollectionCard {
    width: 72px;
    height: 72px;
    border: 1px solid #d8c7a7;
    border-radius: 6px;
    background: linear-gradient(180deg, #fffdf8 0%, #f3eee4 100%);
    box-sizing: border-box;
    padding: 4px;
    text-align: center;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.BazaarCollectionImage {
    width: 64px;
    height: 64px;
    object-fit: contain;
    image-rendering: auto;
}

.BazaarCollectionToggle {
    align-items: center;
    background: linear-gradient(180deg, #1c9df0 0%, #0563b6 100%);
    border: 1px solid #003b77;
    border-radius: 5px;
    color: #ffffff;
    cursor: pointer;
    display: inline-flex;
    font-size: 12px;
    font-weight: 900;
    justify-content: center;
    margin: 6px 10px;
    min-width: 130px;
    padding: 7px 12px;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.45);
}

.BazaarCollectionToggle:hover {
    filter: brightness(1.07);
}

.BazaarCollectionPanel {
    display: none;
    max-height: 360px;
    overflow-y: auto;
}

.character-tiered-item {
    align-items: center;
    display: inline-flex;
    height: 40px;
    justify-content: center;
    position: relative;
    width: 31px;
}

.character-item-tier {
    background: linear-gradient(180deg, #ffc85a 0%, #ff961f 100%);
    border: 1px solid #7d4600;
    border-radius: 3px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.35);
    box-sizing: border-box;
    color: #000000;
    font-size: 10px;
    font-weight: 900;
    height: 15px;
    line-height: 13px;
    min-width: 15px;
    padding: 0 3px;
    position: absolute;
    right: -3px;
    text-align: center;
    top: -3px;
    z-index: 2;
}

.character-item-upgrade {
    background: linear-gradient(180deg, #1c9df0 0%, #0563b6 100%);
    border: 1px solid #003b77;
    border-radius: 3px;
    bottom: -3px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.35);
    box-sizing: border-box;
    color: #ffffff;
    font-size: 9px;
    font-weight: 900;
    height: 14px;
    left: -3px;
    line-height: 12px;
    min-width: 16px;
    padding: 0 3px;
    position: absolute;
    text-align: center;
    z-index: 2;
}

.BazaarCollectionEmpty {
    padding: 16px;
    color: #5b4b36;
    text-align: center;
    font-weight: 700;
}
</style>
<script>
function ToggleBazaarCollectionPanel(panelId, button) {
    const panel = document.getElementById(panelId);
    if (!panel) {
        return;
    }

    const isOpen = panel.style.display === 'block';
    panel.style.display = isOpen ? 'none' : 'block';
    if (button) {
        button.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
    }
}
</script>

<div class="TableContainer">
    <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
            <span class="CaptionEdgeLeftTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionEdgeRightTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionBorderTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
            <span class="CaptionVerticalLeft"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
            <div class="Text">Auction Details</div>
            <span class="CaptionVerticalRight"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
            <span class="CaptionBorderBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
            <span class="CaptionEdgeLeftBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionEdgeRightBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
        </div>
    </div>
    <table class="Table5" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td>
                <div class="InnerTableContainer">
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <td>
                                <div class="TableContentContainer">
                                    <table class="TableContent" style="border:1px solid #faf0d7;" width="100%">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="Auction">
                                                    <div class="AuctionHeader">
                                                        <div class="AuctionLinks"></div>
                                                        <div
                                                            class="AuctionCharacterName"><?= $character['name'] ?></div>
                                                        Level: <?= $character['level'] ?> |
                                                        Vocation: <?= $character_voc ?> | <?= $character_sex ?> |
                                                        World: <?= $config['lua']['serverName'] ?>
                                                        <br>
                                                    </div>
                                                    <div class="AuctionBody">
                                                        <div class="AuctionBodyBlock AuctionDisplay AuctionOutfit"
                                                             style="font-size: 10px; text-align: center;">
                                                            Current outfit:
                                                            <img class="AuctionOutfitImage" src="<?= $outfit_url ?>">
                                                        </div>
                                                        <div
                                                            class="AuctionBodyBlock AuctionDisplay AuctionItemsViewBox">
                                                            <?php foreach ([2, 1, 3, 6, 4, 5, 9, 7, 10] as $i) { ?>
                                                                <div class="CVIcon CVIconObject">
                                                                    <?= $equipment[$i]; ?></div>
                                                            <?php } ?>
                                                            <div class="CVIcon CVIconObject NoEquipment" title="soul">
                                                                <p>Soul<br><?= $character['soul'] ?></p></div>
                                                            <div class="CVIcon CVIconObject"
                                                                 title="boots">
                                                                <?= $equipment[8]; ?></div>
                                                            <div class="CVIcon CVIconObject NoEquipment" title="cap">
                                                                <p>Cap<br><?= $character['cap'] ?></p></div>
                                                        </div>
                                                        <div class="AuctionBodyBlock ShortAuctionData">
                                                            <?php $dateFormat = $subtopic == 'currentcharactertrades' ? 'M d Y, H:i:s' : 'd M Y' ?>
                                                            <div class="ShortAuctionDataLabel">Auction Start:</div>
                                                            <div
                                                                class="ShortAuctionDataValue"><?= date($dateFormat, strtotime($getAuction['date_start'])) ?></div>
                                                            <div class="ShortAuctionDataLabel">Auction End:</div>
                                                            <?php
                                                            if ($subtopic == 'currentcharactertrades') {
                                                                $dateTimer = date('Y-m-d', strtotime($getAuction['date_end']));
                                                                if ($showCounter ?? (date('Y-m-d', strtotime($dateTimer . ' - 1 days')) == date('Y-m-d'))) { ?>
                                                                    <script>
                                                                        const countDownDate = new Date("<?= date($dateFormat, strtotime($getAuction['date_end'])) ?>").getTime();
                                                                        const x = setInterval(function () {
                                                                            const now = new Date().getTime();
                                                                            const distance = countDownDate - now;

                                                                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                                            document.getElementById("timeAuction").innerHTML = "in " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
                                                                            document.getElementById("timeAuction").style.color = 'red';

                                                                            if (distance < 0) {
                                                                                clearInterval(x);
                                                                                document.getElementById("timeAuction").innerHTML = "Finished";
                                                                            }
                                                                        }, 1000);
                                                                    </script>
                                                            <?php } ?>
                                                                <div id="timeAuction" class="ShortAuctionDataValue">
                                                                    <?= date($dateFormat, strtotime($getAuction['date_end'])) ?>
                                                                </div>
                                                                <div class="ShortAuctionDataBidRow">
                                                                    <div class="ShortAuctionDataLabel">Current Bid:
                                                                    </div>
                                                                    <div class="ShortAuctionDataValue">
                                                                        <b><?= number_format($getAuction['price'], 0, ',', ',') ?></b>
                                                                        <img
                                                                            src="<?= $template_path; ?>/images/account/icon-tibiacointrusted.png"
                                                                            class="VSCCoinImages"
                                                                            title="Transferable Tibia Coins">
                                                                    </div>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="ShortAuctionDataValue">
                                                                    <?= date($dateFormat, strtotime($getAuction['date_end'])) ?>
                                                                </div>
                                                                <?php if ((int) $getAuction['status'] === 2) { ?>
                                                                    <div class="ShortAuctionDataBidRow">
                                                                        <div class="ShortAuctionDataLabel">Status:</div>
                                                                        <div class="ShortAuctionDataValue" style="color: #a80000;">Cancelled</div>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="ShortAuctionDataBidRow">
                                                                        <div class="ShortAuctionDataLabel">Winning Bid:
                                                                        </div>
                                                                        <div class="ShortAuctionDataValue">
                                                                            <b><?= number_format($getAuction['bid_price'], 0, ',', ',') ?></b>
                                                                            <img
                                                                                src="<?= $template_path; ?>/images/account/icon-tibiacointrusted.png"
                                                                                class="VSCCoinImages"
                                                                                title="Transferable Tibia Coins"></div>
                                                                    </div>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <?php if ($loggedAccountId !== null && isset($getAuctionBid['account_id']) && (int) $getAuctionBid['account_id'] === $loggedAccountId) { ?>
                                                                <div class="ShortAuctionDataBidRow"
                                                                     style="background-color: #d4c0a1; padding: 5px; border: 1px solid #f0e8da; box-shadow: 2px 2px 5px 0 rgb(0 0 0 / 50%);">
                                                                    <div class="ShortAuctionDataLabel">My Bid:</div>
                                                                    <div
                                                                        class="ShortAuctionDataValue"><?= $My_Bid ?></div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                        <?php if ($logged && $getAuction['status'] == 0) { ?>
                                                            <?php if (strtotime($End) > strtotime($Hoje) && $loggedAccountId !== null && $loggedAccountId !== (int) $getAuction['account_old']) { ?>
                                                                <div class="AuctionBodyBlock CurrentBid">
                                                                    <div class="Container">
                                                                        <div class="MyMaxBidLabel">My Bid Limit
                                                                        </div>
                                                                        <form
                                                                            action="?subtopic=currentcharactertrades&action=bid"
                                                                            method="POST">
                                                                            <input type="hidden" name="auction_iden"
                                                                                   value="<?= $getAuction['id'] ?>">
                                                                            <input class="MyMaxBidInput" type="text"
                                                                                   name="maxbid">
                                                                            <div class="BigButton"
                                                                                 style="background-image:url(<?= $template_path; ?>/images/global/buttons/sbutton_green.gif)">
                                                                                <div
                                                                                    onmouseover="MouseOverBigButton(this);"
                                                                                    onmouseout="MouseOutBigButton(this);">
                                                                                    <div class="BigButtonOver"
                                                                                         style="background-image: url(<?= $template_path; ?>/images/global/buttons/sbutton_green_over.gif); visibility: hidden;"></div>
                                                                                    <input name="auction_confirm"
                                                                                           class="BigButtonText"
                                                                                           type="submit"
                                                                                           value="Bid On Auction">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if (strtotime($End) > strtotime($Hoje) && $loggedAccountId !== null && $loggedAccountId === (int) $getAuction['account_old']) { ?>
                                                                <div class="AuctionBodyBlock CurrentBid">
                                                                    <div class="Container">
                                                                        <div class="MyMaxBidLabel"
                                                                             style="font-weight: normal;">My auction.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if (strtotime($End) < strtotime($Hoje) && (
                                                                    ($loggedAccountId !== null && $loggedAccountId === (int) $getAuction['account_old'] && $loggedAccountId !== (int) $getAuction['bid_account']) ||
                                                                    ($loggedAccountId !== null && $loggedAccountId !== (int) $getAuction['account_old'] && $loggedAccountId === (int) $getAuction['bid_account'])
                                                                )) { ?>
                                                                <div class="AuctionBodyBlock CurrentBid">
                                                                    <div class="Container">
                                                                        <div class="MyMaxBidLabel"
                                                                             style="font-weight: bold; color: green;">
                                                                            <form method="post"
                                                                                  action="?subtopic=currentcharactertrades&action=finish">
                                                                                <input type="hidden"
                                                                                       name="auction_iden"
                                                                                       value="<?= $getAuction['id'] ?>">
                                                                                <div class="BigButton"
                                                                                     style="background-image:url(<?= $template_path; ?>/images/global/buttons/sbutton_green.gif)">
                                                                                    <div
                                                                                        onmouseover="MouseOverBigButton(this);"
                                                                                        onmouseout="MouseOutBigButton(this);">
                                                                                        <div class="BigButtonOver"
                                                                                             style="background-image: url(<?= $template_path; ?>/images/global/buttons/sbutton_green_over.gif); visibility: hidden;"></div>
                                                                                        <input name="auction_finish"
                                                                                               class="BigButtonText"
                                                                                               type="submit"
                                                                                               value="Finish Auction">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if (strtotime($End) < strtotime($Hoje) && $loggedAccountId !== null && $loggedAccountId !== (int) $getAuction['account_old'] && $loggedAccountId !== (int) $getAuction['bid_account']) {
                                                                $auctionStatusLabel = (int) $getAuction['status'] === 2 ? 'cancelled' : 'finished';
                                                                $auctionStatusColor = (int) $getAuction['status'] === 2 ? '#a80000' : 'green';
                                                                ?>
                                                                <div class="AuctionBodyBlock CurrentBid">
                                                                    <div class="Container">
                                                                        <div class="MyMaxBidLabel"
                                                                             style="font-weight: bold; color: <?= $auctionStatusColor; ?>;">
                                                                            <?= $auctionStatusLabel; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php if ($logged && (int) $getAuction['status'] === 2) { ?>
                                                            <div class="AuctionBodyBlock CurrentBid">
                                                                <div class="Container">
                                                                    <div class="MyMaxBidLabel"
                                                                         style="font-weight: normal; color: #a80000;">cancelled
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (!$logged) { ?>
                                                            <?php if ($getAuction['status'] == 0) { ?>
                                                                <div class="AuctionBodyBlock CurrentBid">
                                                                    <div class="Container">
                                                                        <div class="MyMaxBidLabel"
                                                                             style="font-weight: normal;">Please
                                                                            first login.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($getAuction['status'] == 1) { ?>
                                                                <div class="AuctionBodyBlock CurrentBid">
                                                                    <div class="Container">
                                                                        <div class="MyMaxBidLabel"
                                                                             style="font-weight: normal;">finished
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($getAuction['status'] == 2) { ?>
                                                                <div class="AuctionBodyBlock CurrentBid">
                                                                    <div class="Container">
                                                                        <div class="MyMaxBidLabel"
                                                                             style="font-weight: normal; color: #a80000;">cancelled
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <div class="AuctionBodyBlock SpecialCharacterFeatures">
                                                            <div class="BazaarFeatureTile">
                                                                <img src="<?= $template_path; ?>/images/charactertrade/usp-category-3.png" alt="">
                                                                <span>Blessings</span>
                                                                <strong><?= $BlessCount ?>/7</strong>
                                                            </div>
                                                            <div class="BazaarFeatureTile">
                                                                <img src="<?= $template_path; ?>/images/charactertrade/usp-category-7.png" alt="">
                                                                <span>Charm Points</span>
                                                                <strong><?= $Charm_Points ?></strong>
                                                            </div>
                                                            <div class="BazaarFeatureTile">
                                                                <img src="<?= $template_path; ?>/images/charactertrade/usp-category-7.png" alt="">
                                                                <span>Boss Points</span>
                                                                <strong><?= (int) $character['boss_points'] ?></strong>
                                                            </div>
                                                            <div class="BazaarFeatureTile">
                                                                <img src="<?= $template_path; ?>/images/charactertrade/usp-category-0.png" alt="">
                                                                <span><?= htmlspecialchars($bazaarBestSkillName, ENT_QUOTES) ?></span>
                                                                <strong><?= $bazaarBestSkillValue ?></strong>
                                                            </div>
                                                            <div class="BazaarFeatureTile">
                                                                <img src="<?= $template_path; ?>/images/charactertrade/usp-category-0.png" alt="">
                                                                <span>Shielding</span>
                                                                <strong><?= (int) $character['skill_shielding'] ?></strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<center>
    <a href="?subtopic=<?= $subtopic == 'currentcharactertrades' ? 'currentcharactertrades' : 'pastcharactertrades' ?>">
        <div class="BigButton"
             style="background-image:url(<?= $template_path; ?>/images/global/buttons/sbutton.gif)">
            <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);">
                <div class="BigButtonOver"
                     style="background-image: url(<?= $template_path; ?>/images/global/buttons/sbutton_over.gif); visibility: hidden;"></div>
                <input name="auction_confirm" class="BigButtonText" type="button" value="Back"></div>
        </div>
    </a>
</center>
<br>
<div class="TopButtonContainer">
    <div class="TopButton" style="">
        <a href="#top">
            <img style="border:0px;" src="<?= $template_path; ?>/images/content/back-to-top.gif">
        </a>
    </div>
</div>
<div class="TableContainer">
    <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
            <span class="CaptionEdgeLeftTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionEdgeRightTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionBorderTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
            <span class="CaptionVerticalLeft"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
            <div class="Text">General</div>
            <span class="CaptionVerticalRight"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
            <span class="CaptionBorderBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
            <span class="CaptionEdgeLeftBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionEdgeRightBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
        </div>
    </div>
    <table class="Table5" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td>
                <div class="InnerTableContainer">
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <td>
                                <div class="BazaarGeneralPanel">
                                    <div class="BazaarGeneralTop">
                                        <div class="BazaarGeneralGroup">
                                            <div class="BazaarGeneralRow"><span>Hit Points:</span><strong><?= number_format((int) $character['health'], 0, ',', ',') ?> / <?= number_format((int) $character['healthmax'], 0, ',', ',') ?></strong></div>
                                            <div class="BazaarGeneralRow"><span>Mana:</span><strong><?= number_format((int) $character['mana'], 0, ',', ',') ?> / <?= number_format((int) $character['manamax'], 0, ',', ',') ?></strong></div>
                                            <div class="BazaarGeneralRow"><span>Capacity:</span><strong><?= number_format((int) $character['cap'], 0, ',', ',') ?></strong></div>
                                            <div class="BazaarGeneralRow"><span>Soul:</span><strong><?= number_format((int) $character['soul'], 0, ',', ',') ?></strong></div>
                                            <div class="BazaarGeneralRow"><span>Blessings:</span><strong><?= $BlessCount ?>/7</strong></div>
                                            <div class="BazaarGeneralRow"><span>Mounts:</span><strong><?= $displayedMountCount ?></strong></div>
                                            <div class="BazaarGeneralRow"><span>Outfits:</span><strong><?= $displayedOutfitCount ?></strong></div>
                                        </div>
                                        <div class="BazaarGeneralGroup">
                                            <?php foreach ($bazaarGeneralSkills as $skillRow) { ?>
                                                <div class="BazaarGeneralSkill">
                                                    <span><?= htmlspecialchars($skillRow['label'], ENT_QUOTES) ?></span>
                                                    <strong><?= number_format((int) $skillRow['value'], 0, ',', ',') ?></strong>
                                                    <div class="BazaarGeneralPercent">
                                                        <div style="width: <?= max(0, min(100, (int) $skillRow['percent'])) ?>%;"></div>
                                                        <em><?= (int) $skillRow['percent'] ?> %</em>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="BazaarGeneralFull">
                                        <div class="BazaarGeneralRow"><span>Creation Date:</span><strong><?= date('M d Y, H:i', (int) $character['created']) ?></strong></div>
                                        <div class="BazaarGeneralRow"><span>Experience:</span><strong><?= number_format((int) $character['experience'], 0, ',', ',') ?></strong></div>
                                        <div class="BazaarGeneralRow">
                                            <span>Gold:</span>
                                            <strong><img class="BazaarInlineIcon" src="images/icons/coins.png" alt=""> <?= number_format((int) $character['balance'], 0, ',', ',') ?></strong>
                                        </div>
                                        <div class="BazaarGeneralRow"><span>Charm Expansion:</span><strong><?= strip_tags($Charm_Expansion) ?></strong></div>
                                        <div class="BazaarGeneralRow"><span>Available Charm Points:</span><strong><?= number_format((int) $Charm_Points, 0, ',', ',') ?></strong></div>
                                        <div class="BazaarGeneralRow">
                                            <span>Exalted Dust:</span>
                                            <strong><img class="BazaarInlineIcon" src="images/forge/Dust.gif" alt=""> <?= number_format($exaltedDustCurrent, 0, ',', ',') ?> / <?= number_format($exaltedDustMax, 0, ',', ',') ?></strong>
                                        </div>
                                        <div class="BazaarGeneralRow"><span>Boss Points:</span><strong><?= number_format((int) $character['boss_points'], 0, ',', ',') ?></strong></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<div class="TableContainer">
    <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
            <span class="CaptionEdgeLeftTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionEdgeRightTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionBorderTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
            <span class="CaptionVerticalLeft"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
            <div class="Text">Outfits & Mounts</div>
            <span class="CaptionVerticalRight"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
            <span class="CaptionBorderBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
            <span class="CaptionEdgeLeftBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionEdgeRightBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
        </div>
    </div>
    <table class="Table3" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td>
                <div class="InnerTableContainer">
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <td>
                                <div class="TableContentContainer">
                                    <table class="TableContent" style="border:1px solid #faf0d7;" width="100%">
                                        <tbody>
                                        <tr class="Even">
                                            <td>
                                                <button class="BazaarCollectionToggle" type="button" aria-expanded="false" onclick="ToggleBazaarCollectionPanel('BazaarOutfitsPanel', this);">Outfits (<?= $displayedOutfitCount ?>)</button>
                                                <div id="BazaarOutfitsPanel" class="BazaarCollectionPanel">
                                                    <?php if (!empty($outfitCollectionCards)) { ?>
                                                        <div class="BazaarCollectionGrid">
                                                        <?php foreach ($outfitCollectionCards as $outfitCard) { ?>
                                                            <div class="BazaarCollectionCard" title="<?= htmlspecialchars($outfitCard['tooltip'], ENT_QUOTES) ?>">
                                                                <img class="BazaarCollectionImage" src="<?= htmlspecialchars($outfitCard['image'], ENT_QUOTES) ?>" alt="<?= htmlspecialchars($outfitCard['name'], ENT_QUOTES) ?>">
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="BazaarCollectionEmpty">No outfits found.</div>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="Odd">
                                            <td>
                                                <button class="BazaarCollectionToggle" type="button" aria-expanded="false" onclick="ToggleBazaarCollectionPanel('BazaarMountsPanel', this);">Mounts (<?= $displayedMountCount ?>)</button>
                                                <div id="BazaarMountsPanel" class="BazaarCollectionPanel">
                                                    <?php if (!empty($mountCollectionCards)) { ?>
                                                        <div class="BazaarCollectionGrid">
                                                        <?php foreach ($mountCollectionCards as $mountCard) { ?>
                                                            <div class="BazaarCollectionCard" title="<?= htmlspecialchars($mountCard['tooltip'], ENT_QUOTES) ?>">
                                                                <img class="BazaarCollectionImage" src="<?= htmlspecialchars($mountCard['image'], ENT_QUOTES) ?>" alt="<?= htmlspecialchars($mountCard['name'], ENT_QUOTES) ?>">
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="BazaarCollectionEmpty">No mounts found.</div>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<div class="TopButtonContainer">
    <div class="TopButton" style="">
        <a href="#top">
            <img style="border:0px;" src="<?= $template_path; ?>/images/content/back-to-top.gif">
        </a>
    </div>
</div>
<div class="TableContainer">
    <div class="CaptionContainer">
        <div class="CaptionInnerContainer">
            <span class="CaptionEdgeLeftTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionEdgeRightTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionBorderTop"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
            <span class="CaptionVerticalLeft"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
            <div class="Text">Item Summary</div>
            <span class="CaptionVerticalRight"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
            <span class="CaptionBorderBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
            <span class="CaptionEdgeLeftBottom"
                  style="background-image:url(https://static.tibia.com/images/global/content/box-frame-edge.gif);"></span>
            <span class="CaptionEdgeRightBottom"
                  style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
        </div>
    </div>
    <table class="Table3" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td>
                <div class="InnerTableContainer">
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <td>
                                <div class="TableContentContainer">
                                    <table class="TableContent" style="border:1px solid #faf0d7;" width="100%">
                                        <tbody>
                                        <tr class="Even tmp-container-ItemSummary">
                                            <td>
                                                <?php if (!empty($itemSummaryItems)) { ?>
                                                    <div class="ItemSummaryList">
                                                        <?php foreach ($itemSummaryItems as $itemData) { ?>
                                                            <div class="ItemSummaryEntry">
                                                                <div class="CVIcon CVIconObject">
                                                                    <?= bazaarRenderTieredItem($itemData['itemtype'], (int) ($itemData['tier'] ?? 0), (int) ($itemData['upgrade_count'] ?? 0)); ?>
                                                                    <?php if (($itemData['count'] ?? 0) > 1) { ?>
                                                                        <div class="ObjectAmount"><?= (int) $itemData['count']; ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } else { ?>
                                                    <div style="text-align: center;">No items.</div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<div class="CharacterDetailsBlock " id="Charms"><a name="Charms"></a>
    <div class="TopButtonContainer"><a name="Charms"></a>
        <div class="TopButton"><a name="Charms"></a><a onclick="ScrollToAnchor('top');">
                <img style="border: 0px;" src="<?= $template_path; ?>/images/global/content/back-to-top.gif"></a>
        </div>
    </div>
    <div class="TableContainer">
        <div class="CaptionContainer">
            <div class="CaptionInnerContainer">
                    <span class="CaptionEdgeLeftTop"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionBorderTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                <span class="CaptionVerticalLeft"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                <div class="Text">Charms</div>
                <span class="CaptionVerticalRight"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                <span class="CaptionBorderBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                <span class="CaptionEdgeLeftBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            </div>
        </div>
        <?php
        $Charm_CountRunes = 0;
        $charmNames = ['wound', 'enflame', 'poison', 'freeze', 'zap', 'curse', 'cripple', 'parry', 'dodge', 'adrenaline', 'numb', 'cleanse', 'bless', 'scavenge', 'gut', 'low_blow', 'divine', 'vamp', 'void'];
        $charmBits = array_flip($charmNames);
        $unlockedRunesBit = isset($getCharm['UnlockedRunesBit']) ? (int) $getCharm['UnlockedRunesBit'] : 0;
        if ($unlockedRunesBit === 0 && isset($getCharm['UsedRunesBit'])) {
            $unlockedRunesBit = (int) $getCharm['UsedRunesBit'];
        }
        $runes = [];
        foreach ($charmNames as $charm) {
            $bitIndex = $charmBits[$charm] ?? null;
            $isUnlocked = $bitIndex !== null && ($unlockedRunesBit & (1 << $bitIndex)) !== 0;
            if ($isUnlocked) {
                $Charm_CountRunes++;
            }
            $icon = $isUnlocked ? 'icon_yes' : 'icon_no';
            $runes["rune_$charm"] = '<img src="' . $template_path . '/images/premiumfeatures/' . $icon . '.png">';
        }
        ?>
        <table class="Table3" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td>
                    <div class="InnerTableContainer">
                        <table style="width:100%;">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="TableContentContainer">
                                        <table class="TableContent" style="border:1px solid #faf0d7;" width="100%">
                                            <tbody>
                                            <?php foreach ($charmNames as $k => $charm) { ?>
                                                <tr class="<?= $k % 2 == 0 ? 'Even' : 'Odd' ?>">
                                                    <td>
                                                        <?= $runes["rune_$charm"] ?>
                                                        Rune <?= ucwords(str_replace('_', ' ', $charm)) ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="CharacterDetailsBlock " id="CompletedQuestLines"><a name="Completed Quest Lines"></a>
    <div class="TopButtonContainer"><a name="Completed Quest Lines"></a>
        <div class="TopButton"><a name="Completed Quest Lines"></a><a onclick="ScrollToAnchor('top');"><img
                    style="border: 0px;" src="<?= $template_path; ?>/images/global/content/back-to-top.gif"></a>
        </div>
    </div>
    <div class="TableContainer">
        <div class="CaptionContainer">
            <div class="CaptionInnerContainer"><span class="CaptionEdgeLeftTop"
                                                     style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionBorderTop"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                <span class="CaptionVerticalLeft"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                <div class="Text">Completed Quest Lines</div>
                <span class="CaptionVerticalRight"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                <span class="CaptionBorderBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                <span class="CaptionEdgeLeftBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                <span class="CaptionEdgeRightBottom"
                      style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
            </div>
        </div>
        <table class="Table3" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td>
                    <div class="InnerTableContainer">
                        <table style="width:100%;">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="TableContentContainer">
                                        <table class="TableContent" style="border:1px solid #faf0d7;" width="100%">
                                            <tbody>
                                            <tr class="LabelH">
                                                <td>Quest Line Name</td>
                                                <td style="width: 130px; text-align: center;">Status</td>
                                            </tr>
                                            <?php
                                            $i_bg = 0;
                                            if (!empty($quests)) {
                                                foreach ($quests as $quest_name => $quest_completed) {
                                                    $i_bg++;
                                                    $icon = $quest_completed ? 'icon_yes' : 'icon_no';
                                                    $statusText = $quest_completed ? 'Completed' : 'Not completed';
                                                    ?>
                                                    <tr bgcolor="<?= getStyle($i_bg) ?>">
                                                        <td><?= $quest_name; ?></td>
                                                        <td style="text-align: center;">
                                                            <img src="<?= $template_path; ?>/images/premiumfeatures/<?= $icon; ?>.png"
                                                                 alt="<?= $statusText; ?>"
                                                                 title="<?= $statusText; ?>">
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="2">No quest information available.</td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- END PAGE DETAILS -->
