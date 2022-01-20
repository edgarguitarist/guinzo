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
        ]
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
