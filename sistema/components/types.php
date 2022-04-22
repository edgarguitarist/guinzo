<?php
$type = $_GET['type'] ?? null;
$types = [
    'product' => [
        'name' => 'Producto',
        'table' => 'type_product',
        'status' => 'abled',
    ],
    'employee' => [
        'name' => 'Empleado',
        'table' => 'type_employee',
        'status' => 'disabled',
    ],
    'role' => [
        'name' => 'Rol',
        'table' => 'roles',
        'status' => 'abled',
    ],
    'provider' => [
        'name' => 'Empresa',
        'table' => 'type_company',
        'status' => 'abled',
    ],
    'event' => [
        'name' => 'Evento',
        'table' => 'type_event',
        'status' => 'abled',
    ],
    'menu' => [
        'name' => 'Menu',
        'table' => 'type_menu',
        'status' => 'abled',
    ],
    'customer' => [
        'name' => 'Cliente',
        'table' => 'type_customer',
        'status' => 'abled',
    ],
    'amount' => [
        'name' => 'Medida',
        'table' => 'type_amount',
        'status' => 'abled',
    ],
    'material' => [
        'name' => 'Material',
        'table' => 'type_material',
        'status' => 'abled',
    ],
];
if (!$types[$type] || $types[$type]['status'] == 'disabled') {
    header("Location: index.php");
}

$name_type = $types[$type]['name'];
$table = $types[$type]['table'];
