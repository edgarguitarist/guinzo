<?php
include "../../includes/dbcon.php";

if (isset($_POST['action'])) {
    #helpers
    $temp_var = "";

    #event_details
    $name_event = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $amount_guest = $_POST['cantidad'];
    $type_event = $_POST['tipo_evento'];
    $ownsite = $_POST['ownsite'];
    $price = $_POST['precio'];
    $id_customer = $_POST['customer'];
    $date_request = $_POST['date_request'];
    $date_approval = $date_request;
    $date_event = $_POST['date_event'];
    $date_clausure = $_POST['date_clausure'];

    #employees
    $captains = $_POST['captains'];
    $chefs = $_POST['chefs'];
    $waitress = $_POST['waitress'];
    $stewards = $_POST['stewards'];
    $others = $_POST['others'];

    #products
    $meats = $_POST['meats'];
    $meatsInput = $_POST['meatsInput'] ?? "";
    $fruitsveges = $_POST['fruitsveges'];
    $fruitsvegesInput = $_POST['fruitsvegesInput'];
    $drinks = $_POST['drinks'];
    $drinksInput = $_POST['drinksInput'];
    $otherproducts = $_POST['otherproducts'];
    $otherproductsInput = $_POST['otherproductsInput'];

    $consultas = [
        0 =>
        [
            "name" => "event_details",
            "query" => "INSERT INTO event_details (name_event, description_event, address_event, amount_guest, id_type_event, income_place, price, id_customer, date_request, date_approval, date_event, date_clausura) VALUES ('$name_event', '$description', '$address', '$amount_guest', '$type_event', '$ownsite', '$price', '$id_customer', '$date_request', '$date_approval', '$date_event', '$date_clausure')"
        ],
        1 => [
            "name" => "event",
            "query" => "INSERT INTO eventos (id_event, status) VALUES ((SELECT id_event FROM event_details WHERE name_event = '$name_event'), 'Aprobado')"
        ],
    ];

    $consultas_form = [
        0 => [ #Employees
            0 => [
                "var" => $captains,
                "none" => "noneCaptains",
                "query" => "INSERT INTO employees_event (id_employee, id_event) VALUES ('TEMP_VALUE', (SELECT id_event FROM event_details WHERE name_event = '$name_event'))"
            ],
            1 => [
                "var" => $chefs,
                "none" => "noneChefs",
                "query" => "INSERT INTO employees_event (id_employee, id_event) VALUES ('TEMP_VALUE', (SELECT id_event FROM event_details WHERE name_event = '$name_event'))"
            ],
            2 => [
                "var" => $waitress,
                "none" => "noneWaitress",
                "query" => "INSERT INTO employees_event (id_employee, id_event) VALUES ('TEMP_VALUE', (SELECT id_event FROM event_details WHERE name_event = '$name_event'))"
            ],
            3 => [
                "var" => $stewards,
                "none" => "noneStewards",
                "query" => "INSERT INTO employees_event (id_employee, id_event) VALUES ('TEMP_VALUE', (SELECT id_event FROM event_details WHERE name_event = '$name_event'))"
            ],
            4 => [
                "var" => $others,
                "none" => "noneOthers",
                "query" => "INSERT INTO employees_event (id_employee, id_event) VALUES ('TEMP_VALUE', (SELECT id_event FROM event_details WHERE name_event = '$name_event'))"
            ],
        ],
        

    ];

    for ($i = 0; $i < count($consultas_form); $i++) {
        for ($j = 0; $j < count($consultas_form[$i]); $j++) {
            $temp_vars = $consultas_form[$i][$j]['var'];
            $none = $consultas_form[$i][$j]['none'];
            $query = $consultas_form[$i][$j]['query'];

            for ($k = 0; $k < count($temp_vars); $k++) {
                $new_temp_var = $temp_vars[$k] == $none || $temp_vars == null ?  0 : $temp_vars[$k];
                if ($new_temp_var == 0) {
                    continue;
                }
                $query = str_replace("TEMP_VALUE", $new_temp_var, $query);
                // $result = mysqli_query($conn, $query);
                // if (!$result) {
                //     echo "Error: " . mysqli_error($conn);
                // }
                echo $query;
            }
        }
    }



    for ($i = 0; $i < count($consultas); $i++) {
        //     $result = mysqli_query($con, $consultas[$i]);
        //     if(!$result){
        //         echo "Error: " . mysqli_error($con);
        //     }
        echo $consultas[$i]['query'];
    }
}
