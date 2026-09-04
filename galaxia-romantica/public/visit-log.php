<?php
declare(strict_types=1);

date_default_timezone_set('America/Guatemala');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit;
}

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
$host = $_SERVER['HTTP_HOST'] ?? '';
if ($origin !== '' && parse_url($origin, PHP_URL_HOST) !== $host) {
    http_response_code(403);
    exit;
}

$logDir = __DIR__ . DIRECTORY_SEPARATOR . 'logs';
if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$cloudflareIp = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? '';
$forwardedFor = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$referer = $_SERVER['HTTP_REFERER'] ?? '';

$entry = [
    'time' => date('Y-m-d H:i:s'),
    'ip' => $ip,
    'cf_ip' => $cloudflareIp,
    'forwarded_for' => $forwardedFor,
    'user_agent' => $userAgent,
    'referer' => $referer,
];

$line = json_encode($entry, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL;
file_put_contents($logDir . DIRECTORY_SEPARATOR . 'visits.log', $line, FILE_APPEND | LOCK_EX);

http_response_code(204);
