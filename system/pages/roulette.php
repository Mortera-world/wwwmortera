<?php
/**
 * Roulette Winners
 *
 * @package   MyAAC
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Roulette Winners';

// Consulta SQL para obtener los últimos 25 ganadores de la tabla roulette_plays
$query = "SELECT player_id, reward_count, reward_id FROM roulette_plays ORDER BY id DESC LIMIT 200";
$result = $db->query($query);

// Verificar si se obtuvieron resultados
if ($result === false) {
    echo 'Error fetching data from roulette_plays table';
    return;
}

$winners = [];
while ($row = $result->fetch()) {
    // Asume que tienes una función getPlayerNameById para obtener el nombre del jugador
    $playerName = getPlayerNameById($row['player_id']);
    $playerLink = "?characters/" . urlencode($playerName); // URL para el perfil del jugador

    $winners[] = [
        'player_name' => $playerName,
        'player_link' => $playerLink, // Agrega el enlace al jugador
        'reward_count' => $row['reward_count'],
        'reward_id' => $row['reward_id'],
    ];
}

// Mostrar la plantilla Twig con los datos de los ganadores
$twig->display('roulette.html.twig', ['winners' => $winners]);

// Función para obtener el nombre del jugador según su ID
function getPlayerNameById($playerId) {
    global $db;
    $query = "SELECT name FROM players WHERE id = " . intval($playerId);
    $result = $db->query($query);
    
    if ($result && $row = $result->fetch()) {
        return $row['name'];
    }
    return "Unknown Player";
}
?>
