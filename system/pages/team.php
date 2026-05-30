<?php
/**
 * Team
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @author    OpenTibiaBR
 * @copyright 2023 MyAAC
 * @link      https://github.com/opentibiabr/myaac
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Support in Game';

if ($config['account_country'])
    require SYSTEM . 'countries.conf.php';

$groups = new OTS_Groups_List();
if (!$groups->count()) {
    echo 'Error while reading groups.xml';
    return;
}

$outfit_addons = false;
$outfit = '';
if ($config['team_display_outfit']) {
    $outfit = ', lookbody, lookfeet, lookhead, looklegs, looktype';
    if ($db->hasColumn('players', 'lookaddons')) {
        $outfit .= ', lookaddons';
        $outfit_addons = true;
    }
}

$groupMember = array();
$groupList = $groups->getGroups();
foreach ($groupList as $id => $group) {
    if ($id <= 1)
        continue;

    $group_members = $group->getPlayersList();
    if (!count($group_members))
        continue;

    $members = array();
    foreach ($group_members as $member) {
        /** @var OTS_Player $member */
        if (!admin() && $member->isHidden())
            continue;

        $lastLogin = 'Never.';
        if ($member->getLastLogin() > 0)
            $lastLogin = date("j F Y, g:i a", $member->getLastLogin());

        $members[] = array(
            'group_name' => $group->getName(),
            'player_name' => $member->getName(),
            'player' => $member,
            'outfit' => $config['team_display_outfit'] ? $config['outfit_images_url'] . '?id=' . $member->getLookType() . ($outfit_addons ? '&addons=' . $member->getLookAddons() : '') . '&head=' . $member->getLookHead() . '&body=' . $member->getLookBody() . '&legs=' . $member->getLookLegs() . '&feet=' . $member->getLookFeet() : null,
            'status' => $config['team_display_status'] ? $member->isOnline() : null,
            'link' => getPlayerLink($member->getName()),
            'character_url' => getPlayerLink($member->getName(), false),
            'flag_image' => $config['account_country'] ? getFlagImage($member->getAccount()->getCountry()) : null,
            'world_name' => ($config['multiworld'] || $config['team_display_world']) ? getWorldName($member->getWorldId()) : null,
            'last_login' => $config['team_display_lastlogin'] ? $lastLogin : null
        );
    }

    $groupName = strtolower($group->getName());
    $groupMeta = [
        'kicker' => 'Staff Support',
        'title' => ucwords($groupName),
        'description' => 'Staff members available to support players and keep the community organized.',
    ];

    switch ($groupName) {
        case 'god':
            $groupMeta = [
                'kicker' => 'Server Administration',
                'title' => 'Administrador',
                'description' => 'Technical operations, service stability, and high-level support.',
            ];
            break;

        case 'community manager':
            $groupMeta = [
                'kicker' => 'Community Management',
                'title' => 'Community Manager',
                'description' => 'Community leads who coordinate player communication and support.',
            ];
            break;

        case 'gamemaster':
            $groupMeta = [
                'kicker' => 'Game Support',
                'title' => 'GameMaster',
                'description' => 'Game masters who help with reports, rules, and in-game situations.',
            ];
            break;

        case 'senior tutor':
            $groupMeta = [
                'kicker' => 'Player Guidance',
                'title' => 'Senior Tutor',
                'description' => 'Experienced helpers who guide players and support the tutor team.',
            ];
            break;

        case 'tutor':
            $groupMeta = [
                'kicker' => 'Community Help',
                'title' => 'Tutor',
                'description' => 'Community helpers focused on questions and basic player support.',
            ];
            break;
    }

    $groupMember[] = array(
        'group_name' => $group->getName(),
        'meta' => $groupMeta,
        'members' => $members
    );
}

$twig->display('team.html.twig', array(
    'groupmember' => $groupMember
));
?>
