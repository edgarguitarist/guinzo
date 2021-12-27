<?php



$types = [
    'customer' => [
        'Nuevo' => 'Nuevo',
        'Regular' => '',
        'Concurrente' => '',
        'Preferencial' => '',
        'VIP' => '',
        'Problematico' => '',
        'Vetado' => '',
        'Otro' => ''
    ],
    'employee' => [
        'header' => 'ADVERTENCIA!',
        'message' => 'Acceso no permitido, Primero debe iniciar sesión.',
        'type' => 'WARNING'
    ],
];


function get_type($type, $key)
{
    global $types;
    return $types[$type][$key];
}
