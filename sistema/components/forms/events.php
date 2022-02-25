<?php
include "../../includes/dbcon.php";

if (isset($_POST['action'])) {
    #helpers
    $price = 0;
    $count = 0;
    $total_errors = 0;

    #events_details
    $name_event = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $amount_guest = $_POST['cantidad'];
    $type_event = $_POST['tipo_evento'];
    $place = $_POST['place'];
    $price = $_POST['precio'] ?? $_POST['price_total'];
    $id_customer = $_POST['customer'];
    $date_request = $_POST['date_request'];
    $date_approval = $date_request;
    $date_event = $_POST['date_event'];
    $date_clausure = $_POST['date_clausure'];

    #employees
    $captains = $_POST['captains'] ?? [];
    $chefs = $_POST['chefs'] ?? [];
    $waitress = $_POST['waitress'] ?? [];
    $stewards = $_POST['stewards'] ?? [];
    $others = $_POST['others'] ?? [];

    #menus
    $entrances = $_POST['entrances'] ?? [];
    $entrancesInput = $_POST['entrancesInput'] ?? [];
    $principals = $_POST['principals'] ?? [];
    $principalsInput = $_POST['principalsInput'] ?? [];
    $desserts = $_POST['desserts'] ?? [];
    $dessertsInput = $_POST['dessertsInput'] ?? [];
    $othermenus = $_POST['othermenus'] ?? [];
    $othermenusInput = $_POST['othermenusInput'] ?? [];

    #products
    $meats = $_POST['meats'] ?? [];
    $meatsInput = $_POST['meatsInput'] ?? "";
    $fruitsveges = $_POST['fruitsveges'] ?? [];
    $fruitsvegesInput = $_POST['fruitsvegesInput'] ?? "";
    $drinks = $_POST['drinks'] ?? [];
    $drinksInput = $_POST['drinksInput'] ?? "";
    $otherproducts = $_POST['otherproducts'] ?? [];
    $otherproductsInput = $_POST['otherproductsInput'] ?? "";

    #materials
    $kitchen = $_POST['kitchen'] ?? [];
    $kitchenInput = $_POST['kitchenInput'] ?? "";
    $cuberteria = $_POST['cuberteria'] ?? [];
    $cuberteriaInput = $_POST['cuberteriaInput'] ?? "";
    $bar = $_POST['bar'] ?? [];
    $barInput = $_POST['barInput'] ?? "";
    $decoration = $_POST['decoration'] ?? [];
    $decorationInput = $_POST['decorationInput'] ?? "";
    $othermaterials = $_POST['othermaterials'] ?? [];
    $othermaterialsInput = $_POST['othermaterialsInput'] ?? "";

    #providers
    $transporte = $_POST['transporte'] ?? [];
    $transporteInput = $_POST['transporteInput'] ?? "";
    $transporteDescription = $_POST['transporteDescription'] ?? "";
    $buffet = $_POST['buffet'] ?? [];
    $buffetInput = $_POST['buffetInput'] ?? "";
    $buffetDescription = $_POST['buffetDescription'] ?? "";
    $otherproviders = $_POST['otherproviders'] ?? [];
    $otherprovidersInput = $_POST['otherprovidersInput'] ?? "";
    $otherprovidersDescription = $_POST['otherprovidersDescription'] ?? "";

    #other concepts
    $otherConcepts = $_POST['otherConcepts'] ?? [];
    $otherConceptsDetail = $_POST['otherConceptsDetail'] ?? "";
    $otherConceptsPrice = $_POST['otherConceptsPrice'] ?? "";

    $consultas = [
        0 => [ #Event_details
            "query" => "INSERT INTO events_details (name_event, description_event, address_event, amount_guest, id_type_event, place, price, id_customer, date_request, date_approval, date_event, date_clausura) VALUES ('$name_event', '$description', '$address', '$amount_guest', '$type_event', '$place', '$price', (SELECT id_customer FROM customers WHERE id_user = '$id_customer'), '$date_request', '$date_approval', '$date_event', '$date_clausure')"
        ],
        1 => [ #Event
            "query" => "INSERT INTO eventos (id_event_detail, status) VALUES ((SELECT id_event_detail FROM events_details WHERE name_event = '$name_event' AND date_event ='$date_event'), 'Aprobado')"
        ],
    ];

    $consultas_form = [
        0 => [ #Employees
            0 => [
                "var" => $captains,
            ],
            1 => [
                "var" => $chefs,
            ],
            2 => [
                "var" => $waitress,
            ],
            3 => [
                "var" => $stewards,
            ],
            4 => [
                "var" => $others,
            ],
            "query" => "INSERT INTO events_employee (id_employee, id_event) VALUES ((SELECT id_employee FROM employee WHERE id_user = 'TEMP_VALUE'), 'ACTUAL_EVENT')",
            "otherquery" => true,
            "query2" => "UPDATE employee SET available = '0' WHERE id_user= 'TEMP_VALUE'",
        ],
        1 => [  #Menus
            0 => [
                "var" => $entrances,
                "input" => $entrancesInput,
            ],
            1 => [
                "var" => $principals,
                "input" => $principalsInput,
            ],
            2 => [
                "var" => $desserts,
                "input" => $dessertsInput,
            ],
            3 => [
                "var" => $othermenus,
                "input" => $othermenusInput,
            ],
            "query" => "INSERT INTO events_menu (id_menu, amount, id_event) VALUES ((SELECT id_menu FROM menus WHERE name_menu = 'TEMP_VALUE'), 'SECOND_TV', 'ACTUAL_EVENT')",
            "otherquery" => false,
            "query2" => ""
        ],
        2 => [ #Products
            0 => [
                "var" => $meats,
                "var2" => $meatsInput,
            ],
            1 => [
                "var" => $fruitsveges,
                "var2" => $fruitsvegesInput,
            ],
            2 => [
                "var" => $drinks,
                "var2" => $drinksInput,
            ],
            3 => [
                "var" => $otherproducts,
                "var2" => $otherproductsInput,
            ],
            "query" => "INSERT INTO events_products (id_product, amount, id_event) VALUES ((SELECT id_product FROM products WHERE name_product = 'TEMP_VALUE' GROUP BY name_product), 'SECOND_TV', 'ACTUAL_EVENT')",
            "otherquery" => false,
            "query2" => ""
        ],
        3 => [  #Materials
            0 => [
                "var" => $kitchen,
                "var2" => $kitchenInput,
            ],
            1 => [
                "var" => $cuberteria,
                "var2" => $cuberteriaInput,
            ],
            2 => [
                "var" => $bar,
                "var2" => $barInput,
            ],
            3 => [
                "var" => $decoration,
                "var2" => $decorationInput,
            ],
            4 => [
                "var" => $othermaterials,
                "var2" => $othermaterialsInput,
            ],
            "query" => "INSERT INTO events_materials (id_material, amount, id_event) VALUES ((SELECT id_material FROM materials WHERE name_material = 'TEMP_VALUE' GROUP BY name_material), 'SECOND_TV', 'ACTUAL_EVENT')",
            "otherquery" => false,
            "query2" => ""
        ],
        4 => [  #Providers
            0 => [
                "var" => $transporte,
                "var2" => $transporteInput,
                "var3" => $transporteDescription,
            ],
            "query" => "INSERT INTO events_thirds (id_provider, price_event_third, description_event_third, id_event) VALUES ('TEMP_VALUE', 'SECOND_TV', 'THIRDS', 'ACTUAL_EVENT')",
            "otherquery" => false,
            "query2" => ""
        ],
        5 => [   #Other Concepts
            0 => [
                "var" => $otherConcepts,
                "var2" => $otherConceptsDetail,
                "var3" => $otherConceptsPrice,
            ],
            "query" => "INSERT INTO events_otherconcepts (name_otherconcept, description_otherconcept, price_otherconcept, id_event) VALUES ('TEMP_VALUE', 'SECOND_TV', 'THIRDS', 'ACTUAL_EVENT')",
            "otherquery" => false,
            "query2" => ""
        ],
    ];

    for ($i = 0; $i < count($consultas); $i++) {
        $result = mysqli_query($con, $consultas[$i]["query"]);
        if (!$result) {
            echo "Error al crear el evento: " . mysqli_error($con);
            $total_errors++;
        }
    }

    $query_actual_event = "SELECT id_event FROM eventos WHERE id_event_detail = (SELECT id_event_detail FROM events_details WHERE name_event = '$name_event' AND date_event ='$date_event')";
    $result_actual_event = mysqli_query($con, $query_actual_event);
    $row_actual_event = mysqli_fetch_array($result_actual_event);
    $id_actual_event = $row_actual_event["id_event"];

    for ($i = 0; $i < count($consultas_form); $i++) {
        for ($j = 0; $j < count($consultas_form[$i]) - 3; $j++) {
            $temp_vars = $consultas_form[$i][$j]['var'];
            $temp_vars2 = $consultas_form[$i][$j]['var2'] ?? "";
            $temp_vars3 = $consultas_form[$i][$j]['var3'] ?? "";

            for ($k = 0; $k < count($temp_vars); $k++) {
                $query = $consultas_form[$i]['query'];
                $new_temp_var = $temp_vars[$k];
                $new_temp_var2 = $temp_vars2[$k] ?? "";
                $new_temp_var3 = $temp_vars3[$k] ?? "";
                if (!$new_temp_var) {
                    continue;
                }
                $price = $consultas_form[$i][$j]['price'] ?? 0;
                $query = str_replace("TEMP_VALUE", $new_temp_var, $query);
                $query = str_replace("SECOND_TV", $new_temp_var2, $query);
                $query = str_replace("THIRDS", $new_temp_var3, $query);
                $query = str_replace("ACTUAL_EVENT", $id_actual_event, $query);
                // echo $query . '<br>';
                $result = mysqli_query($con, $query);
                if (!$result) {
                    echo "Error agregar información de los eventos: " . mysqli_error($con);
                    $total_errors++;
                }
                if ($consultas_form[$i]['otherquery']) {
                    $query2 = $consultas_form[$i]['query2'];
                    $query2 = str_replace("TEMP_VALUE", $new_temp_var, $query2);
                    //echo $query2 . '<br>';
                    $result = mysqli_query($con, $query2);
                    if (!$result) {
                        echo "Error al hacer la segunda consulta: " . mysqli_error($con);
                        $total_errors++;
                    }
                }
            }
        }
    }
    if ($total_errors == 0) {
        echo "Evento creado con éxito";
        header("Location: ../../events.php?info=event_created");
    } else {
        echo "Error al crear el evento";
        header("Location: ../../events.php?info=event_error");

    }
}
