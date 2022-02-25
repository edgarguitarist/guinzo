<?php
$who  = $_GET['who'] ?? '';
$id   = $_GET['id'] ?? '';
$info = $_GET['info'] ?? '';

if($info === 'update-photo') {
    header("Location: index.php?info=update-photo");
    exit();
}

if($who === '' && $id === '' ){
    header("Location: index.php?info=error");
    exit();
}

$isquery2 = false;
$data_who = [
    "customers" => [
        "translate" => "Cliente",
        "title" => "Editar Cliente",
        "form" => "form-customers.php",
        "who" => "customers",
        "query" => "SELECT * FROM users WHERE dni = $id",
        "query2" => "SELECT * FROM customers WHERE id_user = '$id'",
        "isquery2" => true,
    ],
    "employees" => [
        "translate" => "Empleado",
        "title" => "Editar Empleado",
        "form" => "form-employees.php",
        "who" => "employees",
        "query" => "SELECT * FROM users WHERE dni = $id",
        "query2" => "SELECT * FROM employee WHERE id_user = '$id'",
        "isquery2" => true,
    ],
    "providers" => [
        "translate" => "Proveedor",
        "title" => "Editar Proveedor",
        "form" => "form-providers.php",
        "who" => "providers",
        "query" => "SELECT * FROM providers WHERE dni_provider = '$id'",
        "query2" => "",
        "isquery2" => false,
    ],
    "products" => [
        "translate" => "Producto",
        "title" => "Editar Producto",
        "form" => "form-products.php",
        "who" => "products",
        "query" => "SELECT * FROM products WHERE id_product = '$id'",
        "query2" => "",
        "isquery2" => false,
    ],
    "materials" => [
        "translate" => "Material",
        "title" => "Editar Material",
        "form" => "form-materials.php",
        "who" => "materials",
        "query" => "SELECT * FROM materials WHERE id_material = '$id'",
        "query2" => "",
        "isquery2" => false,
    ],
    "menus" => [
        "translate" => "Menu",
        "title" => "Editar Menu",
        "form" => "form-menu.php",
        "who" => "menus",
        "query" => "SELECT * FROM menus WHERE id_menu = '$id'",
        "query2" => "",
        "isquery2" => false,
    ], 
];
$query = $data_who[$who]['query'];
$result = mysqli_query($con, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows != 1) {
    header("Location: " . $data_who[$who]['who'] . ".php?info=error_edit");
    exit();
}
$row = mysqli_fetch_assoc($result);
$isquery2 = $data_who[$who]['isquery2'];
$query2 = $data_who[$who]['query2'];
if ($isquery2) {
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_assoc($result2);
}

$data_result = [
    "customers" => [
        "firstname" => $row['name'] ?? '',
        "lastname" => $row['lastname'] ?? '',
        "dni" => $row['dni'] ?? '',
        "phone" => $row['phone'] ?? '',
        "email" => $row['email'] ?? '',
        "city" => $row2['city'] ?? '',
        "birthday" => $row['birthday'] ?? '',
    ],
    "employees" => [
        "firstname" => $row['name'] ?? '',
        "middlename" => $row2['middleName'] ?? '',
        "lastname" => $row['lastname'] ?? '',
        "secondlastname" => $row2['secondLastName'] ?? '',
        "dni" => $row['dni'] ?? '',
        "phone" => $row['phone'] ?? '',
        "city" => $row2['city'] ?? '',
        "birthday" => $row['birthday'] ?? '',
        "email" => $row['email'] ?? '',
        "role" => $row['id_role'] ?? '',
        "rank" => $row2['rank_employee'] ?? '',
    ],
    "providers" => [
        "name" => $row['name_provider'] ?? '',
        "lastname" => $row['lastname_provider'] ?? '',
        "dni" => $row['dni_provider'] ?? '',
        "phone" => $row['phone'] ?? '',
        "email" => $row['email'] ?? '',
        "ruc" => $row['ruc'] ?? '',
        "name_company" => $row['name_company'] ?? '',
        "email_company" => $row['email_company'] ?? '',
        "tel_company" => $row['tel_company'] ?? '',
        "address_company" => $row['address_company'] ?? '',
        "type_company" => $row['type_company'] ?? '',
    ],
    "products" => [
        "name" => $row['name_product'] ?? '',
        "tipo" => $row['type_product'] ?? '',
        "precio" => $row['price'] ?? '',
        "peso" => $row['amount'] ?? '',
        "description" => $row['description_product'] ?? '',
        "expiration" => $row['expiry_date'] ?? '',
        "provider" => $row['id_provider'] ?? '',
    ],
    "materials" => [
        "name" => $row['name_material'] ?? '',
        "tipo" => $row['type_material'] ?? '',
        "precio" => $row['price'] ?? '',
        "cantidad" => $row['amount'] ?? '',
        "description" => $row['description_material'] ?? '',
        "expiration" => $row['expiry_date_material'] ?? '',
        "provider" => $row['id_provider'] ?? '',
    ],
    "menus" => [
        "name" => $row['name_menu'] ?? '',
        "description" => $row['description_menu'] ?? '',
        "price" => $row['price_menu'] ?? '',
        "type" => $row['type_menu'] ?? '',
    ],
];

$control = $data_who[$who]['lastname'] ?? '';

$disableDNI = $control === '' ? true : false;
?>