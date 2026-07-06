<?php
/** Ajustes centrales. Cada sala guarda una copia de sus reglas al crearse. */
defined('MYAAC') or die('Direct access not allowed!');

return [
    'price' => ['min' => 1, 'max' => 100000],
    'speed' => [
        'min_seconds' => 6,
        'max_seconds' => 60,
        'presets' => ['Rapida' => 6, 'Normal' => 10, 'Lenta' => 15],
    ],
    'players' => [
        // Hay tres premios, por lo que se necesitan tres cuentas distintas.
        'min_to_start' => 3,
        'max_allowed' => 100,
        'default_max' => 10,
    ],
    'cards' => [
        'offered' => 4,
        'per_player' => 2,
        'cells' => 16,
        'offer_lifetime_minutes' => 120,
    ],
    'prizes' => [1 => 60, 2 => 25, 3 => 15],
    'one_prize_per_account' => true,
    'win_condition' => 'full_card',
    'victory_modes' => [
        'traditional' => 'Tradicional (lineas y cuadros)',
        'square' => 'Cuadro (2x2)',
        'four_corners' => 'Cuatro esquinas',
        'full_card' => 'Tabla llena',
    ],
    'poll_interval_ms' => 1500,
    'lobby_poll_interval_ms' => 10000,
    'intro' => [
        'audio_file' => 'intruduccion.mp3',
        // Respaldo si el creador cierra la pestana o el navegador bloquea el audio.
        'fallback_seconds' => 60,
    ],
    // Tolera la limitacion de temporizadores de pestanas en segundo plano.
    'presence_ttl_seconds' => 90,
    'empty_room_lifetime_seconds' => 120,
    'room_name_max_length' => 60,
    'max_waiting_rooms_per_creator' => 3,
    'assets' => [
        'image_base_url' => '/images/loteria/cards/',
        'audio_base_url' => '/sounds/loteria/',
    ],
];
