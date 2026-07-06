<?php
/** Catalogo oficial. Los nombres de imagen coinciden con los archivos instalados. */
defined('MYAAC') or die('Direct access not allowed!');

$names = [
    1 => 'El Gallo', 2 => 'El Diablito', 3 => 'La Dama', 4 => 'El Catrin',
    5 => 'El Paraguas', 6 => 'La Sirena', 7 => 'La Escalera', 8 => 'La Botella',
    9 => 'El Barril', 10 => 'El Arbol', 11 => 'El Melon', 12 => 'El Valiente',
    13 => 'El Gorrito', 14 => 'La Muerte', 15 => 'La Pera', 16 => 'La Bandera',
    17 => 'El Bandolon', 18 => 'El Violoncello', 19 => 'La Garza', 20 => 'El Pajaro',
    21 => 'La Mano', 22 => 'La Bota', 23 => 'La Luna', 24 => 'El Cotorro',
    25 => 'El Borracho', 26 => 'El Negrito', 27 => 'El Corazon', 28 => 'La Sandia',
    29 => 'El Tambor', 30 => 'El Camaron', 31 => 'Las Jaras', 32 => 'El Musico',
    33 => 'La Arana', 34 => 'El Soldado', 35 => 'La Estrella', 36 => 'El Cazo',
    37 => 'El Mundo', 38 => 'El Apache', 39 => 'El Nopal', 40 => 'El Alacran',
    41 => 'La Rosa', 42 => 'La Calavera', 43 => 'La Campana', 44 => 'El Cantarito',
    45 => 'El Venado', 46 => 'El Sol', 47 => 'La Corona', 48 => 'La Chalupa',
    49 => 'El Pino', 50 => 'El Pescado', 51 => 'La Palma', 52 => 'La Maceta',
    53 => 'El Arpa', 54 => 'La Rana',
];

$images = [
    1 => '1 el gallo-min.jpg', 2 => '2 el diablito-min.jpg', 3 => '3 la dama-min.jpg',
    4 => '4 el catrin-min.jpg', 5 => '5 el paraguas-min.jpg', 6 => '6-la-sirena-min.jpg',
    7 => '7 la escalera-min.jpg', 8 => '8 la botella-min.jpg', 9 => '9 barril-min.jpg',
    10 => '10 arbol-min.jpg', 11 => '11 melon-min.jpg', 12 => '12 el valiente-min.jpg',
    13 => '13 el gorrito-min.jpg', 14 => '14 la muerte-min.jpg', 15 => '15 la pera-min.jpg',
    16 => '16 la bandera-min.jpg', 17 => '17 el bandolon-min.jpg', 18 => '18 el violoncello-min.jpg',
    19 => '19 la garza-min.jpg', 20 => '20 el pajaro-min.jpg', 21 => '21 la mano-min.jpg',
    22 => '22 la bota-min.jpg', 23 => '23 la luna-min.jpg', 24 => '24 el cotorro-min.jpg',
    25 => '25 el borracho-min.jpg', 26 => '26 el negrito-min.jpg', 27 => '27 el corazon-min.jpg',
    28 => '28 la sandia-min.jpg', 29 => '29 el tambor-min.jpg', 30 => '30 el camaron-min.jpg',
    31 => '31 las jaras-min.jpg', 32 => '32 el musico-min.jpg', 33 => '33 la arana-min.jpg',
    34 => '34 el soldado-min.jpg', 35 => '35 la estrella-min.jpg', 36 => '36 el cazo-min.jpg',
    37 => '37 el mundo-min.jpg', 38 => '38 el apache-min.jpg', 39 => '39 el nopal-min.jpg',
    40 => '40 el alacran-min.jpg', 41 => '41 la rosa-min.jpg', 42 => '42 la calavera-min.jpg',
    43 => '43 la campana-min.jpg', 44 => '44 el cantarito-min.jpg', 45 => '45 el venado-min.jpg',
    46 => '46 el sol-min.jpg', 47 => '47 la corona-min.jpg', 48 => '48 la chalupa-min.jpg',
    49 => '49 el pino-min.jpg', 50 => '50 el pescado-min.jpg', 51 => '51 la palma-min.jpg',
    52 => '52 la maceta-min.jpg', 53 => '53 el arpa-min.jpg', 54 => '54 la rana-min.jpg',
];

$catalog = [];
foreach ($names as $id => $name) {
    $audioSlug = strtolower(str_replace(' ', '-', $name));
    $catalog[$id] = [
        'id' => $id,
        'name' => $name,
        'image_file' => $images[$id],
        'audio_file' => $id . '-' . $audioSlug . '.mp3',
    ];
}

return $catalog;
