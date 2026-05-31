<?php
/**
 * Bans
 *
 * @package   MyAAC
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Bans list';

$limit = max(1, (int) $config['bans_limit']);
$page = isset($_GET['page']) ? max(0, (int) $_GET['page']) : 0;
$offset = $page * $limit;
$fetchLimit = $config['bans_display_all'] ? $limit + 1 : $limit;

$hasBannedPlayer = $db->hasColumn('account_bans', 'banned_player');
$hasBannedAt = $db->hasColumn('account_bans', 'banned_at');
$hasExpiresAt = $db->hasColumn('account_bans', 'expires_at');
$hasReason = $db->hasColumn('account_bans', 'reason');
$hasType = $db->hasColumn('account_bans', 'type');
$hasComment = $db->hasColumn('account_bans', 'comment');
$hasLookAddons = $db->hasColumn('players', 'lookaddons');

$orderColumn = $hasBannedAt ? 'banned_at' : ($hasExpiresAt ? 'expires_at' : 'account_id');
$bansQuery = 'SELECT * FROM ' . $db->tableName('account_bans') . ' ORDER BY `' . $orderColumn . '` DESC LIMIT ' . $fetchLimit . ' OFFSET ' . $offset;
$bansResult = $db->query($bansQuery);

$bans = [];
$nextPage = false;

foreach ($bansResult as $ban) {
    if (count($bans) >= $limit) {
        $nextPage = true;
        break;
    }

    $accountId = isset($ban['account_id']) ? (int) $ban['account_id'] : 0;
    $playerName = $hasBannedPlayer && !empty($ban['banned_player']) ? $ban['banned_player'] : '';
    $player = null;

    if ($playerName !== '') {
        $playerQuery = $db->query(
            'SELECT `name`, `level`, `looktype`, `lookhead`, `lookbody`, `looklegs`, `lookfeet`' .
            ($hasLookAddons ? ', `lookaddons`' : '') .
            ' FROM `players` WHERE `name` = ' . $db->quote($playerName) . ' LIMIT 1'
        );
        $player = $playerQuery ? $playerQuery->fetch() : null;
    }

    if (!$player && $accountId > 0) {
        $playerQuery = $db->query(
            'SELECT `name`, `level`, `looktype`, `lookhead`, `lookbody`, `looklegs`, `lookfeet`' .
            ($hasLookAddons ? ', `lookaddons`' : '') .
            ' FROM `players` WHERE `account_id` = ' . $accountId . ' ORDER BY `level` DESC, `name` ASC LIMIT 1'
        );
        $player = $playerQuery ? $playerQuery->fetch() : null;
    }

    if ($player && isset($player['name'])) {
        $playerName = $player['name'];
    }

    if ($playerName === '') {
        $playerName = 'Unknown Player';
    }

    $outfit = null;
    if ($player) {
        $outfit = $config['outfit_images_url'] . '?id=' . (int) $player['looktype']
            . ($hasLookAddons && !empty($player['lookaddons']) ? '&addons=' . (int) $player['lookaddons'] : '')
            . '&head=' . (int) $player['lookhead']
            . '&body=' . (int) $player['lookbody']
            . '&legs=' . (int) $player['looklegs']
            . '&feet=' . (int) $player['lookfeet'];
    }

    $bannedAt = $hasBannedAt && isset($ban['banned_at']) ? (int) $ban['banned_at'] : 0;
    $expiresAt = $hasExpiresAt && isset($ban['expires_at']) ? (int) $ban['expires_at'] : 0;

    $bans[] = [
        'player_name' => $playerName,
        'player_link' => $player && $playerName !== 'Unknown Player' ? getPlayerLink($playerName, false) : null,
        'outfit' => $outfit,
        'type' => $hasType ? bansPageBanType((int) $ban['type']) : 'Banishment',
        'reason' => $hasReason ? bansPageBanReason((int) $ban['reason']) : 'Unknown Reason',
        'comment' => $hasComment && !empty($ban['comment']) ? $ban['comment'] : 'No comment.',
        'banned_at' => bansPageDate($bannedAt),
        'expires_at' => bansPageExpires($expiresAt),
        'duration' => bansPageDuration($bannedAt, $expiresAt),
        'active' => $expiresAt === -1 || $expiresAt > time(),
    ];
}
?>

<link rel="stylesheet" href="/tools/simple-page.css?v=20260531">

<div class="bans-page">
    <section class="bans-hero">
        <div>
            <span>Banishments</span>
            <h1>Bans List</h1>
            <p>Players currently or previously punished by the staff, including reason, ban time, expiration, and public notes.</p>
        </div>
        <strong><?= count($bans); ?> <?= count($bans) === 1 ? 'ban' : 'bans'; ?></strong>
    </section>

    <?php if (empty($bans)): ?>
        <section class="bans-empty">
            <h2>No players banned</h2>
            <p>There are no banishments to display right now.</p>
        </section>
    <?php else: ?>
        <section class="bans-list">
            <?php foreach ($bans as $ban): ?>
                <article class="ban-card">
                    <div class="ban-player">
                        <div class="ban-outfit">
                            <?php if ($ban['outfit']): ?>
                                <img src="<?= htmlspecialchars($ban['outfit']); ?>" alt="<?= htmlspecialchars($ban['player_name']); ?>">
                            <?php endif; ?>
                        </div>

                        <div>
                            <?php if ($ban['player_link']): ?>
                                <a href="<?= htmlspecialchars($ban['player_link']); ?>"><?= htmlspecialchars($ban['player_name']); ?></a>
                            <?php else: ?>
                                <strong><?= htmlspecialchars($ban['player_name']); ?></strong>
                            <?php endif; ?>
                            <span class="<?= $ban['active'] ? 'is-active' : 'is-expired'; ?>"><?= $ban['active'] ? 'Active ban' : 'Expired ban'; ?></span>
                        </div>
                    </div>

                    <div class="ban-info-grid">
                        <div><span>Type</span><strong><?= htmlspecialchars($ban['type']); ?></strong></div>
                        <div><span>Ban Time</span><strong><?= htmlspecialchars($ban['duration']); ?></strong></div>
                        <div><span>Banned On</span><strong><?= htmlspecialchars($ban['banned_at']); ?></strong></div>
                        <div><span>Expires</span><strong><?= htmlspecialchars($ban['expires_at']); ?></strong></div>
                    </div>

                    <div class="ban-reason">
                        <span>Reason</span>
                        <strong><?= htmlspecialchars($ban['reason']); ?></strong>
                        <p><?= nl2br(htmlspecialchars($ban['comment'])); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

        <?php if ($config['bans_display_all'] && ($page > 0 || $nextPage)): ?>
            <nav class="bans-pagination">
                <?php if ($page > 0): ?>
                    <a href="?subtopic=bans&page=<?= $page - 1; ?>">Previous Page</a>
                <?php endif; ?>
                <?php if ($nextPage): ?>
                    <a href="?subtopic=bans&page=<?= $page + 1; ?>">Next Page</a>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php
function bansPageDate($timestamp)
{
    if (!is_numeric($timestamp) || (int) $timestamp <= 0) {
        return 'Unknown';
    }

    return date('M d, Y H:i', (int) $timestamp);
}

function bansPageExpires($timestamp)
{
    if ((int) $timestamp === -1) {
        return 'Permanent';
    }

    if (!is_numeric($timestamp) || (int) $timestamp <= 0) {
        return 'Unknown';
    }

    return date('M d, Y H:i', (int) $timestamp);
}

function bansPageDuration($bannedAt, $expiresAt)
{
    $bannedAt = (int) $bannedAt;
    $expiresAt = (int) $expiresAt;

    if ($expiresAt === -1) {
        return 'Permanent';
    }

    if ($bannedAt <= 0 || $expiresAt <= 0 || $expiresAt <= $bannedAt) {
        return 'Unknown';
    }

    $seconds = $expiresAt - $bannedAt;
    $days = intdiv($seconds, 86400);
    $seconds %= 86400;
    $hours = intdiv($seconds, 3600);
    $seconds %= 3600;
    $minutes = intdiv($seconds, 60);

    $parts = [];
    if ($days > 0) {
        $parts[] = $days . ' day' . ($days === 1 ? '' : 's');
    }
    if ($hours > 0) {
        $parts[] = $hours . ' hour' . ($hours === 1 ? '' : 's');
    }
    if ($minutes > 0 && count($parts) < 2) {
        $parts[] = $minutes . ' minute' . ($minutes === 1 ? '' : 's');
    }

    return empty($parts) ? 'Less than 1 minute' : implode(', ', $parts);
}

function bansPageBanReason($reasonId)
{
    $reasons = [
        0 => 'Offensive Name',
        1 => 'Invalid Name Format',
        2 => 'Unsuitable Name',
        3 => 'Name Inciting Rule Violation',
        4 => 'Offensive Statement',
        5 => 'Spamming',
        6 => 'Illegal Advertising',
        7 => 'Off-Topic Public Statement',
        8 => 'Non-English Public Statement',
        9 => 'Inciting Rule Violation',
        10 => 'Bug Abuse',
        11 => 'Game Weakness Abuse',
        12 => 'Using Unofficial Software to Play',
        13 => 'Hacking',
        14 => 'Multi-Clienting',
        15 => 'Account Trading or Sharing',
        16 => 'Threatening Gamemaster',
        17 => 'Pretending to Have Influence on Rule Enforcement',
        18 => 'False Report to Gamemaster',
        19 => 'Destructive Behaviour',
        20 => 'Excessive Unjustified Player Killing',
        21 => 'Invalid Payment',
        22 => 'Spoiling Auction',
    ];

    return $reasons[$reasonId] ?? 'Unknown Reason';
}

function bansPageBanType($typeId)
{
    $types = [
        1 => 'IP Banishment',
        2 => 'Namelock',
        3 => 'Banishment',
        4 => 'Notation',
        5 => 'Deletion',
    ];

    return $types[$typeId] ?? 'Banishment';
}
?>
