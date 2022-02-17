<?php
include "../../includes/dbcon.php";
if (isset($_GET['who']) && isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    $who = $_GET['who'];

    $consultas = [
        "employees" => [
            "delete" => "UPDATE users SET status_user = 'Inactive' WHERE dni = '$id'",
            "undelete" => "UPDATE users SET status_user = 'Active' WHERE dni = '$id'",
            "upgrade" => "UPDATE employee SET rank_employee = rank_employee + 1 WHERE id_user = '$id'",
            "downgrade" => "UPDATE employee SET rank_employee = rank_employee - 1 WHERE id_user = '$id'",
            "accept" => "UPDATE employee SET rank_employee = 1 WHERE id_user = '$id'",
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
            "undelete" => "UPDATE eventos SET deleted = 0, status = 'Pendiente' WHERE id_event = '$id'",
        ],
    ];
    $query = $consultas[$who][$action];
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../../" . $who . ".php?info=" . $action);
    } else {
        header("Location: ../../" . $who . ".php?info=" . $action . "_error");
    }
} else {
    header("Location: ../../" . $who . ".php");
}
