<?php
/**
 * Server info
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @author    whiteblXK
 * @author    OpenTibiaBR
 * @copyright 2023 MyAAC
 * @link      https://github.com/opentibiabr/myaac
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Server Info';

$rent = trim(strtolower(configLua('houseRentPeriod')));
if ($rent != 'yearly' && $rent != 'monthly' && $rent != 'weekly' && $rent != 'daily')
    $rent = 'never';

$houseLevel = configLua('houseBuyLevel');
$cleanOld = null;

if ($pzLocked = configLua('pzLocked') ?? null)
    $pzLocked = eval('return ' . $pzLocked . ';');

if ($whiteSkullTime = configLua('whiteSkullTime') ?? null)
    $whiteSkullTime = eval('return ' . $whiteSkullTime . ';');

if ($timeToDecreaseFrags = configLua('timeToDecreaseFrags') ?? null)
    $timeToDecreaseFrags = eval('return ' . $timeToDecreaseFrags . ';');

if ($redSkullDuration = configLua('redSkullDuration') ?? null)
    $redSkullDuration = eval('return ' . $redSkullDuration . ';');

if ($blackSkullDuration = configLua('blackSkullDuration') ?? null)
    $blackSkullDuration = eval('return ' . $blackSkullDuration . ';');

$tampicoTimezone = new DateTimeZone('America/Monterrey');
$explodeServerSave = ['18', '00', '00'];
$serverSaveDisplay = '6:00 p.m.';
$serverSaveTimezone = 'hora Tampico, Tamaulipas';

$now = new DateTime('now', $tampicoTimezone);
$serverSaveTime = new DateTime('now', $tampicoTimezone);
$serverSaveTime->setTime(18, 0, 0);

if ($now > $serverSaveTime) {
    $serverSaveTime->modify('+1 day');
}

$serverOpenedAt = new DateTime('2021-12-24 00:00:00', $tampicoTimezone);

function serverInfoFormatMilliseconds($milliseconds) {
    if (!is_numeric($milliseconds) || $milliseconds <= 0) {
        return 'Not configured';
    }

    $seconds = (int) round($milliseconds / 1000);
    $parts = [];

    $days = intdiv($seconds, 86400);
    $seconds %= 86400;
    $hours = intdiv($seconds, 3600);
    $seconds %= 3600;
    $minutes = intdiv($seconds, 60);
    $seconds %= 60;

    if ($days > 0) {
        $parts[] = $days . ' day' . ($days === 1 ? '' : 's');
    }

    if ($hours > 0) {
        $parts[] = $hours . ' hour' . ($hours === 1 ? '' : 's');
    }

    if ($minutes > 0) {
        $parts[] = $minutes . ' minute' . ($minutes === 1 ? '' : 's');
    }

    if ($seconds > 0 && empty($parts)) {
        $parts[] = $seconds . ' second' . ($seconds === 1 ? '' : 's');
    }

    return implode(', ', $parts);
}

$twig->display('serverinfo.html.twig', [
    'serverSave' => $explodeServerSave,
    'serverSaveTime' => $serverSaveTime->getTimestamp() * 1000,
    'serverSaveDisplay' => $serverSaveDisplay,
    'serverSaveTimezone' => $serverSaveTimezone,
    'rateUseStages' => $rateUseStages = getBoolean(configLua('rateUseStages')),
    'rateStages' => $rateUseStages && isset($config['lua']['rateStages']) ? $config['lua']['rateStages'] : [],
    'serverIp' => str_replace(['http://', 'https://', '/'], '', configLua('url')),
    'clientVersion' => $status['clientVersion'] ?? null,
    'protectionLevel' => configLua('protectionLevel'),
    'houseRent' => $rent == 'never' ? 'disabled' : $rent,
    'houseOld' => $cleanOld ?? null, // in progressing
    'rateExp' => configLua('rateExp'),
    'rateMagic' => configLua('rateMagic'),
    'rateSkill' => configLua('rateSkill'),
    'rateLoot' => configLua('rateLoot'),
    'rateSpawn' => configLua('rateSpawn'),
    'houseLevel' => $houseLevel,
    'pzLocked' => $pzLocked,
    'whiteSkullTime' => $whiteSkullTime,
    'timeToDecreaseFrags' => $timeToDecreaseFrags,
    'pzLockedDisplay' => serverInfoFormatMilliseconds($pzLocked),
    'whiteSkullTimeDisplay' => serverInfoFormatMilliseconds($whiteSkullTime),
    'timeToDecreaseFragsDisplay' => serverInfoFormatMilliseconds($timeToDecreaseFrags),
    'redSkullDuration' => $redSkullDuration,
    'blackSkullDuration' => $blackSkullDuration,
    'dailyFragsToRedSkull' => configLua('dayKillsToRedSkull') ?? null,
    'weeklyFragsToRedSkull' => configLua('weekKillsToRedSkull') ?? null,
    'monthlyFragsToRedSkull' => configLua('monthKillsToRedSkull') ?? null,
    'serverOpenedAt' => $serverOpenedAt->getTimestamp() * 1000,
]);
