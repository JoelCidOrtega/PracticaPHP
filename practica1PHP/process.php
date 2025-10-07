<?php
$perfil = [
    'nombre' => 'Joel',
    'edad' => 19,
    'profesion' => 'Estudiante'
];

$musica = [
    'canción' => 'Smartphone',
    'artista' => 'Soto Asa'
];

$peliculas = [
    'Nombre' => 'seven',
    'Director' => 'David Fincher',
    'foto' => 'https://storage.googleapis.com/pod_public/1300/262767.jpg',
    'duracion' => '127 minutos'
];

$menu = [
    'nombre' => 'Tortilla de patatas',
    'precio' => '5.00',
    'ingredientes' => ['huevos', 'patatas', 'cebolla', 'aceite de oliva', 'sal'],
    'foto' => 'https://elikaeskola.com/wp-content/uploads/me-siento-culpable-por-comer.png'
];

// Ticket muy simple: datos básicos y total calculado
$eventos = [
    'evento' => 'Rocanrola',
    'fecha' => '9-11 de octubre',
    'lugar' => 'Multiespacio Rabasa, Alicante',
    'entradas' => 1,
    'precio_unitario' => 60.00,
    'gastos_gestion' => 5.00,
];

// total sencillo
$eventos['total'] = $eventos['entradas'] * $eventos['precio_unitario'] + $eventos['gastos_gestion'];

$viajes = [
    'Destino' => 'Chongqing, China',
    'Estancia' => '3 semanas',
    'Mensaje' => 'Estoy emocionado por explorar la cultura y la comida local.',
    'mapa' => 'https://cdn.plnspttrs.net/46333/b-9976-chongqing-airlines-airbus-a320-232_PlanespottersNet_1334581_19fc19f3d2_o.jpg'
];
?>