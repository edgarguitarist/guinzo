<?php

include "includes/dbcon.php";

$id = $_GET['id'];
$sql = "SELECT * FROM eventos e, events_details ed, customers cu, users u ,type_event te WHERE e.id_event = $id AND e.id_event_detail = ed.id_event_detail AND ed.id_customer = cu.id_customer AND cu.id_user = u.dni AND ed.id_type_event = te.id_type_event";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$id_event = $row['id_event'];

function getFullNameEmployees($con, $id_event, $role, $anotherRole = false, $secRole = '')
{
    $query_employee = "SELECT * FROM events_employee WHERE id_event = $id_event";
    $result_employee = mysqli_query($con, $query_employee);
    $employees = array();
    while ($row_employee = mysqli_fetch_array($result_employee)) {
        $id_employee = $row_employee['id_employee'];
        $query_employee_details = "SELECT * FROM employee WHERE id_employee = $id_employee";
        $result_employee_details = mysqli_query($con, $query_employee_details);
        $row_employee_details = mysqli_fetch_array($result_employee_details);
        $employee_dni = $row_employee_details['id_user'];
        if (!$anotherRole) {
            $query_employee_user = "SELECT * FROM users WHERE dni = $employee_dni AND id_role = '$role'";
        } else {
            $query_employee_user = "SELECT * FROM users WHERE dni = $employee_dni AND (id_role = '$role' OR id_role = '$secRole')";
        }
        $result_employee_user = mysqli_query($con, $query_employee_user);
        $row_employee_user = mysqli_fetch_array($result_employee_user);
        $employee_name = $row_employee_user['name'] ?? "";
        $employee_lastname = $row_employee_user['lastname'] ?? "";
        $employee_fullname = $employee_name . " " . $employee_lastname;
        if (strlen($employee_fullname) > 1) {
            $employees[] = $employee_fullname;
        }
    }
    $num_employees = count($employees);
    if ($num_employees > 0) {
        $employees = count($employees) > 1 ? implode(", ", $employees) : $employees[0];
    } else {
        $employees = "";
    }
    return [$employees, $num_employees];
}

$captains = getFullNameEmployees($con, $id_event, 2);
$captains = $captains[0] != "" ? $captains[0] . '. (' . $captains[1] . ')' : "Sin capitanes";
$chefs = getFullNameEmployees($con, $id_event, 3, true, 9);
$chefs = $chefs[0] != "" ? $chefs[0] . '. (' . $chefs[1] . ')' : "Sin Chefs.";
$waitress = getFullNameEmployees($con, $id_event, 4, true, 5);
$waitress = $waitress[0] != "" ? $waitress[0] . '. (' . $waitress[1] . ')' : "Sin Saloneros.";
$stewards = getFullNameEmployees($con, $id_event, 8);
$stewards = $stewards[0] != "" ? $stewards[0] . '. (' . $stewards[1] . ')' : "Sin Stewards.";
$otherEmployees = getFullNameEmployees($con, $id_event, 10);
$otherEmployees = $otherEmployees[0] != "" ? $otherEmployees[0] . '. (' . $otherEmployees[1] . ')' : "Sin otros Empleados.";

$lugar = $row['place'];


function getMenu($con, $id_event, $type_menu)
{

    $query_menu = "SELECT * FROM events_menu em, menus me WHERE id_event = $id_event AND em.id_menu = me.id_menu AND me.type_menu = $type_menu";
    $result_menu = mysqli_query($con, $query_menu);
    $row_menu = mysqli_fetch_array($result_menu);
    $num_rows = mysqli_num_rows($result_menu);
    if ($num_rows > 0) {
        $menu = $row_menu['name_menu'];
    } else {
        $menu = null;
    }
    return $menu;
}

$entrada = getMenu($con, $id_event, 1) ?? "Sin Entrada";
$plato_fuerte = getMenu($con, $id_event, 2) ?? "Sin Plato Fuerte";
$postre = getMenu($con, $id_event, 3) ?? "Sin Postre";
$otro_plato = getMenu($con, $id_event, 4) ?? "Sin Otro Plato";



function getProducts($con, $id_event, $type_product, $anotherProduct = false, $secType_product = '')
{
    $query_products = "SELECT * FROM events_products WHERE id_event = $id_event";
    $result_products = mysqli_query($con, $query_products);
    $salida = '';
    while ($row_product = mysqli_fetch_array($result_products)) {
        $id_product = $row_product['id_product'] ?? 0;
        if (!$anotherProduct) {
            $query_product_details = "SELECT * FROM products WHERE id_product = $id_product AND type_product = $type_product";
        } else {
            $query_product_details = "SELECT * FROM products WHERE id_product = $id_product AND (type_product = $type_product OR type_product = $secType_product)";
        }
        $result_product_details = mysqli_query($con, $query_product_details);
        $row_product_details = mysqli_fetch_array($result_product_details);
        $product_name = $row_product_details['name_product'] ?? "";
        $product_amount = $row_product['amount'] ?? 0;
        if (strlen($product_name) > 1) {
            $temp_salida = "<span>$product_name ($product_amount)</span>";
            $salida .= $salida == '' ? $temp_salida : ', ' . $temp_salida;
        }
    }
    return $salida;
}

$carnes = getProducts($con, $id_event, 1) != "" ? getProducts($con, $id_event, 1) : "Sin Carnes";
$frutavege = getProducts($con, $id_event, 2, true, 5) != "" ? getProducts($con, $id_event, 2, true, 5) : "Sin Frutas y Verduras";
$bebidas = getProducts($con, $id_event, 3, true, 4) != "" ? getProducts($con, $id_event, 3, true, 4) : "Sin Bebidas";
$otrosProductos = getProducts($con, $id_event, 6, true, 7) != "" ? getProducts($con, $id_event, 6, true, 7) : "Sin Otros Productos";

function getMaterials($con, $id_event, $type_material, $anotherMaterial = false, $secType_material = '')
{
    $query_materials = "SELECT * FROM events_materials WHERE id_event = $id_event";
    $result_materials = mysqli_query($con, $query_materials);
    $salida = '';
    while ($row_material = mysqli_fetch_array($result_materials)) {
        $id_material = $row_material['id_material'] ?? 0;
        if (!$anotherMaterial) {
            $query_material_details = "SELECT * FROM materials WHERE id_material = $id_material AND type_material = $type_material";
        } else {
            $query_material_details = "SELECT * FROM materials WHERE id_material = $id_material AND (type_material = $type_material OR type_material = $secType_material)";
        }
        $result_material_details = mysqli_query($con, $query_material_details);
        $row_material_details = mysqli_fetch_array($result_material_details);
        $material_name = $row_material_details['name_material'] ?? "";
        $material_amount = $row_material['amount'] ?? 0;
        
        if (strlen($material_name) > 1) {
            $temp_salida = "<span>$material_name ($material_amount)</span>";
            $salida .= $salida == '' ? $temp_salida : ', ' . $temp_salida;
        }
    }
    return $salida;
}

$kitchen = getMaterials($con, $id_event, 1) != "" ? getMaterials($con, $id_event, 1) : "Sin Materiales de Cocina";
$bar = getMaterials($con, $id_event, 2) != "" ? getMaterials($con, $id_event, 2) : "Sin Materiales de Bar";
$decoration = getMaterials($con, $id_event, 3) != "" ? getMaterials($con, $id_event, 3) : "Sin Materiales de Decoración";
$cuberteria = getMaterials($con, $id_event, 4) != "" ? getMaterials($con, $id_event, 4) : "Sin Materiales de Cubertería";
$otherMaterial = getMaterials($con, $id_event, 5) != "" ? getMaterials($con, $id_event, 5) : "Sin Otros Materiales";


function getProviders($con, $id_event, $type_provider)
{
    $query_providers = "SELECT * FROM events_thirds WHERE id_event = $id_event";
    $result_providers = mysqli_query($con, $query_providers);
    $salida = '';
    while ($row_provider = mysqli_fetch_array($result_providers)) {
        $id_provider = $row_provider['id_provider'] ?? 0;

        $query_provider_details = "SELECT * FROM providers WHERE dni_provider = $id_provider AND type_company = $type_provider";

        $result_provider_details = mysqli_query($con, $query_provider_details);
        $row_provider_details = mysqli_fetch_array($result_provider_details);
        $provider_name = $row_provider_details['name_provider'] ?? "";
        $provider_price = $row_provider['price_event_third'] ?? 0;
        $detail = $row_provider['description_event_third'] ?? "";
        if (strlen($provider_name) > 1) {
            $provider_name = $row_provider_details['name_provider'] . " " . $row_provider_details['lastname_provider'];
            $temp_salida = "<span>$provider_name ($ $provider_price)</span><br><b>Detalle: </b><span>$detail</span>";
            $salida .= '<br>' . $temp_salida;
        }
    }
    return $salida;
}

$transporte = getProviders($con, $id_event, 5) != "" ? getProviders($con, $id_event, 5) : "Sin Transporte";
$buffet = getProviders($con, $id_event, 4) != "" ? getProviders($con, $id_event, 4) : "Sin Buffet";
$otherProvider = getProviders($con, $id_event, 7) != "" ? getProviders($con, $id_event, 7) : "Sin Otros Proveedores";


function getOtherConcepts($con, $id_event)
{
    $query_otherConcepts = "SELECT * FROM events_otherconcepts WHERE id_event = $id_event";
    $result_otherConcepts = mysqli_query($con, $query_otherConcepts);
    $salida = '';
    while ($row_otherConcept = mysqli_fetch_array($result_otherConcepts)) {
        $otherConcept_name = $row_otherConcept['name_otherconcept'] ?? "";
        $otherConcept_price = $row_otherConcept['price_otherconcept'] ?? 0;
        $detail = $row_otherConcept['description_otherconcept'] ?? "";
        if (strlen($otherConcept_name) > 1) {
            $temp_salida = "<li>
            <span>$otherConcept_name. ($ $otherConcept_price)</span>
            <br>
            <b>Detalle: </b> <span>$detail.</span></li>";
            $salida .= $temp_salida . "<br>";
        }
    }
    return $salida;
}

$concepts = getOtherConcepts($con, $id_event) != "" ? getOtherConcepts($con, $id_event) : "Sin Otros Conceptos";
$nombre_evento = $row['name_event'];

$full_fecha_evento = $row['date_event'];
$date_event = date('d/m/Y', strtotime($full_fecha_evento));
$time_event = date('H:i a', strtotime($full_fecha_evento));
$day_event = date('d', strtotime($full_fecha_evento));
$month_event = date('m', strtotime($full_fecha_evento));
$year_event = date('Y', strtotime($full_fecha_evento));

$full_fecha_clausura = $row['date_clausura'];
$date_clausura = date('d/m/Y', strtotime($full_fecha_clausura));
$time_clausura = date('H:i a', strtotime($full_fecha_clausura));
$day_clausura = date('d', strtotime($full_fecha_clausura));
$month_clausura = date('m', strtotime($full_fecha_clausura));
$year_clausura = date('Y', strtotime($full_fecha_clausura));

$namepdf = $nombre_evento . '_' . $full_fecha_evento;

?>

<div class="container">
    <div id="pdf_container" class="card">
        <div class="card-content">
            <div class="content has-text-centered">
                <br>
                <br>
                <img class="addButton" style="width: 150px; margin-top: -25px !important;" src="images/logos/logo-bockcao-black.png" alt="logo">
                <h1 class="title is-4">EVENTO <?= $nombre_evento ?></h1>
                <br>
                <br>
                <div class="columns">
                    <div class="column is-1"></div>
                    <div class="column is-5 has-text-left">
                        <ul style="list-style-type: none;">
                            <li>
                                <span class="b-bolder subtitle is-6">CLIENTE: </span>
                                <span><?= $row['name'] . ' ' . $row['lastname'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">DESCRIPCIÓN: </span>
                                <span><?= $row['description_event'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">CIUDAD: </span>
                                <span><?= $row['city'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">DIRECCIÓN: </span>
                                <span><?= $row['address_event'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">LUGAR: </span>
                                <span><?= $lugar ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">CAPITAN(ES): </span>
                                <span><?= $captains ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-1 "></div>
                    <div class="column is-5 has-text-left">
                        <ul style="list-style-type: none;">
                            <li>
                                <span class="b-bolder subtitle is-6">TIPO DE EVENTO: </span>
                                <span><?= $row['name_type_event'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">FECHA DE INICIO: </span>
                                <span><?= $row['date_event'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">FECHA DE FIN: </span>
                                <span><?= $row['date_clausura'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">INVITADOS: </span>
                                <span><?= $row['amount_guest'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">PRECIO: </span>
                                <span>$<?= $row['price'] ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">ESTADO: </span>
                                <span><?= $row['status'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="columns">
                    <div class="column">
                        <h1 class="title is-4">EMPLEADOS</h1>
                    </div>
                    <div class="column">
                        <h1 class="title is-4">MENÚ</h1>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-1"></div>

                    <div class="column is-5 has-text-left">
                        <ul style="list-style-type: none;">
                            <li>
                                <span class="b-bolder subtitle is-6">CHEF(ES): </span>
                                <span><?= $chefs ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">SALONERO(S): </span>
                                <span><?= $waitress ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">STEWARD(ES): </span>
                                <span><?= $stewards ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">OTROS: </span>
                                <span><?= $otherEmployees ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-1"></div>
                    <div class="column is-5 has-text-left">
                        <ul style="list-style-type: none;">
                            <li>
                                <span class="b-bolder subtitle is-6">ENTRADA: </span>
                                <span><?= $entrada ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">PLATO FUERTE: </span>
                                <span><?= $plato_fuerte ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">POSTRE: </span>
                                <span><?= $postre ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">OTROS: </span>
                                <span><?= $otro_plato ?>.</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="columns">
                    <div class="column">
                        <h1 class="title is-4">PRODUCTOS</h1>
                    </div>
                    <div class="column">
                        <h1 class="title is-4">MATERIALES</h1>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-1"></div>

                    <div class="column is-5 has-text-left">
                        <ul style="list-style-type: none;">
                            <li>
                                <span class="b-bolder subtitle is-6">CARNE(S): </span>
                                <span><?= $carnes ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">FRUTA(S) Y VERDURA(S): </span>
                                <span><?= $frutavege ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">BEBIDAS(S): </span>
                                <span><?= $bebidas ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">OTROS: </span>
                                <span><?= $otrosProductos ?>.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-1"></div>
                    <div class="column is-5 has-text-left">
                        <ul style="list-style-type: none;">
                            <li>
                                <span class="b-bolder subtitle is-6">COCINA: </span>
                                <span><?= $kitchen ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">CUBERTERÍA: </span>
                                <span><?= $cuberteria ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">BAR: </span>
                                <span><?= $bar ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">DECORACIÓN: </span>
                                <span><?= $decoration ?>.</span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">OTROS: </span>
                                <span><?= $otherMaterial ?>.</span>
                            </li>
                        </ul>
                    </div>
                </div> <!-- break -->
                <br>
                <div class="columns">
                    <div class="column">
                        <h1 class="title is-4">PROVEEDOR(ES)</h1>
                    </div>
                    <div class="column">
                        <h1 class="title is-4">OTROS CONCEPTOS</h1>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-1"></div>

                    <div class="column is-5 has-text-left">
                        <ul style="list-style-type: none;">
                            <li>
                                <span class="b-bolder subtitle is-6">TRANSPORTE(S): </span>
                                <span><?= $transporte ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">BUFFET: </span>
                                <span><?= $buffet ?></span>
                            </li>
                            <li>
                                <span class="b-bolder subtitle is-6">OTROS: </span>
                                <span><?= $otherProvider ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="column is-1"></div>
                    <div class="column is-5 has-text-left">
                        <ul style="list-style-type: none;">
                            <?= $concepts ?>
                        </ul>
                    </div>
                </div> <!-- break -->
                <h1 class="title is-4">OBSERVACIONES</h1>
                <div class="columns">
                    <div class="column is-1"></div>
                    <div class="column is-11">
                        <div class="wd-0 has-text-left">
                            <span class="ml-30 b-semibold subtitle ">
                                <?= $row['observations'] != '' ? $row['observations'] : 'Sin Observaciones.' ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>