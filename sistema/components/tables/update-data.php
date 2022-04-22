<?php
include "../../includes/dbcon.php";
if (isset($_GET['who']) && isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    $who = $_GET['who'];
    if ($who == "types") {
        include "../types.php";
        $campo = "id_" . $table;
        if($table == "roles"){
            $campo = "id_role";
        }
    }

    $consultas = [
        "employees" => [
            "delete" => "UPDATE users SET status_user = 'Inactive' WHERE dni = '$id'",
            "undelete" => "UPDATE users SET status_user = 'Active' WHERE dni = '$id'",
            "upgrade" => "UPDATE employee SET rank_employee = rank_employee + 1 WHERE id_user = '$id'",
            "downgrade" => "UPDATE employee SET rank_employee = rank_employee - 1 WHERE id_user = '$id'",
            "accept" => "UPDATE users SET id_role = 5 WHERE dni = '$id'",
        ],
        "customers" => [
            "delete" => "UPDATE users SET status_user = 'Inactive' WHERE dni = '$id'",
            "undelete" => "UPDATE users SET status_user = 'Active' WHERE dni = '$id'",
            "upgrade" => "UPDATE customers SET type_customer = type_customer + 1 WHERE id_user = '$id'",
            "downgrade" => "UPDATE customers SET type_customer = type_customer - 1 WHERE id_user = '$id'",
        ],
        "providers" => [
            "delete" => "UPDATE providers SET deleted = 1 WHERE dni_provider = '$id'",
            "undelete" => "UPDATE providers SET deleted = 0 WHERE dni_provider = '$id'",
        ],
        "products" => [
            "delete" => "UPDATE products SET deleted = 1 WHERE id_product = '$id'",
            "undelete" => "UPDATE products SET deleted = 0 WHERE id_product = '$id'",
        ],
        "events" => [
            "delete" => "UPDATE eventos SET deleted = 1, status = 'Cancelado' WHERE id_event = '$id'",
            "undelete" => "UPDATE eventos SET deleted = 0, status = 'Aprobado' WHERE id_event = '$id'",
            "completed" => "UPDATE eventos SET status = 'Completado' WHERE id_event = '$id'",
            "nocompleted" => "UPDATE eventos SET status = 'Aprobado' WHERE id_event = '$id'",
        ],
        "menus" => [
            "delete" => "UPDATE menus SET deleted = 1 WHERE id_menu = '$id'",
            "undelete" => "UPDATE menus SET deleted = 0 WHERE id_menu = '$id'",
        ],
        "admins" => [
            "delete" => "UPDATE users SET id_role = 7 WHERE dni = '$id'",
            "setadmin" => "UPDATE users SET id_role = 1 WHERE dni = '$id'",
        ],
        "types" => [
            "delete" => "UPDATE $table SET status = 0 WHERE $campo = '$id'",
            "undelete" => "UPDATE $table SET status = 1 WHERE $campo = '$id'",
        ],
    ];
    $query = $consultas[$who][$action];
    $result = mysqli_query($con, $query);

    if ($result) {
        if ($who == 'types') {
            header("Location: ../../" . $who . ".php?info=" . $action . "&type=" . $type);
        } else {
            header("Location: ../../" . $who . ".php?info=" . $action);
        }
    } else {
        if ($who == 'types') {
            header("Location: ../../" . $who . ".php?info=" . $action . "_error&type=" . $type);
        } else {
            header("Location: ../../" . $who . ".php?info=" . $action . "_error");
        }
    }
} else {
    header("Location: ../../" . $who . ".php");
}
