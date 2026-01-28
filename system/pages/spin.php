<?php
// system/pages/spin.php

defined('MYAAC') or die('Direct access not allowed!');

header('Content-Type: application/json');

if (!$logged || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'No autorizado.']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$bet = isset($input['bet']) ? (int)$input['bet'] : 0;
$minBet = 10;

if ($bet < $minBet) {
    echo json_encode(['success' => false, 'message' => "La apuesta mínima es de {$minBet} coins."]);
    exit;
}

$accountId = $account_logged->getId();
$currentCoins = (int)$account_logged->getCustomField('coins_transferable');

if ($bet > $currentCoins) {
    echo json_encode(['success' => false, 'message' => 'Saldo insuficiente.']);
    exit;
}

$symbols = [
    1 => ['type' => 'low',  'multipliers' => [3 => 2, 4 => 4, 5 => 8]],
    2 => ['type' => 'low',  'multipliers' => [3 => 2, 4 => 5, 5 => 9]],
    3 => ['type' => 'low',  'multipliers' => [3 => 3, 4 => 6, 5 => 12]],
    4 => ['type' => 'low',  'multipliers' => [3 => 4, 4 => 8, 5 => 15]],
    5 => ['type' => 'high', 'multipliers' => [3 => 5, 4 => 10, 5 => 18]],
    6 => ['type' => 'high', 'multipliers' => [3 => 6, 4 => 12, 5 => 20]],
    7 => ['type' => 'high', 'multipliers' => [3 => 10, 4 => 20, 5 => 40]],
    8 => ['type' => 'high', 'multipliers' => [3 => 8, 4 => 16, 5 => 30]],
    9 => ['type' => 'high', 'multipliers' => [3 => 12, 4 => 24, 5 => 50]],
];

// Probabilidades para generar símbolos
$symbolPool = array_merge(
    array_fill(0, 25, 1),
    array_fill(0, 25, 2),
    array_fill(0, 20, 3),
    array_fill(0, 20, 4),
    array_fill(0, 12, 5),
    array_fill(0, 12, 6),
    array_fill(0, 8, 7),
    array_fill(0, 6, 8),
    array_fill(0, 4, 9)
);

shuffle($symbolPool);

// Crear grilla 3x5 con símbolos aleatorios
$grid = [];
for ($row = 0; $row < 3; $row++) {
    $line = [];
    for ($col = 0; $col < 5; $col++) {
        $symbol = $symbolPool[array_rand($symbolPool)];
        $line[] = $symbol;
    }
    $grid[] = $line;
}

// Definir líneas ganadoras (izquierda a derecha, horizontales y zigzag)
// Cada línea es un array de posiciones [fila, columna]
$lines = [
    // Horizontales simples
    [[0,0],[0,1],[0,2],[0,3],[0,4]],
    [[1,0],[1,1],[1,2],[1,3],[1,4]],
    [[2,0],[2,1],[2,2],[2,3],[2,4]],
    // Zigzag (ejemplos)
    [[0,0],[1,1],[2,2],[1,3],[0,4]], // V invertida
    [[2,0],[1,1],[0,2],[1,3],[2,4]], // V normal
    [[0,0],[1,1],[0,2],[1,3],[0,4]], // zigzag arriba-abajo-arriba-arriba
    [[2,0],[1,1],[2,2],[1,3],[2,4]], // zigzag abajo-arriba-abajo-arriba
];

// Función para verificar líneas ganadoras
// Se gana si hay al menos 3 símbolos iguales consecutivos empezando desde columna 0 hacia derecha,
// siguiendo la línea de posiciones y la condición es que los primeros N símbolos son iguales (N>=3)
function checkLineWin($grid, $linePositions, $symbols, $bet) {
    $symbolIds = [];
    foreach ($linePositions as $pos) {
        [$r, $c] = $pos;
        $symbolIds[] = $grid[$r][$c];
    }

    $firstSymbol = $symbolIds[0];

    // Contar cuántos símbolos iguales consecutivos desde la izquierda
    $count = 1;
    for ($i = 1; $i < count($symbolIds); $i++) {
        if ($symbolIds[$i] === $firstSymbol) {
            $count++;
        } else {
            break;
        }
    }

    if ($count >= 3) {
        $count = min($count, 5);
        $multiplier = $symbols[$firstSymbol]['multipliers'][$count] ?? 0;
        $winAmount = $bet * $multiplier;

        // Solo retornamos las posiciones ganadoras (las primeras 'count' en la línea)
        $winPositions = array_slice($linePositions, 0, $count);

        return [$winAmount, $winPositions];
    }

    return [0, []];
}

// Calcular ganancias y detectar líneas ganadoras
$totalWin = 0;
$winningLines = [];

foreach ($lines as $linePositions) {
    list($lineWin, $winPositions) = checkLineWin($grid, $linePositions, $symbols, $bet);
    if ($lineWin > 0) {
        $totalWin += $lineWin;
        $winningLines[] = [
            'symbol' => $grid[$winPositions[0][0]][$winPositions[0][1]],
            'positions' => $winPositions,
            'win' => $lineWin
        ];
    }
}

$newCoins = $currentCoins - $bet + $totalWin;

// Actualizar saldo en base de datos
$db->query("UPDATE accounts SET coins_transferable = {$newCoins} WHERE id = {$accountId}");

echo json_encode([
    'success' => true,
    'grid' => $grid,
    'balance' => $newCoins,
    'message' => $totalWin > 0 ? "¡Ganaste {$totalWin} monedas!" : "Sin premio esta vez.",
    'winningLines' => $winningLines
]);
exit;
