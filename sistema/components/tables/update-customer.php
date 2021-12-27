<?php
include "../../includes/dbcon.php";
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    $consultas = [
        "delete" => "UPDATE users SET status_user = 'Inactive' WHERE dni = '$id'",
        "undelete" => "UPDATE users SET status_user = 'Active' WHERE dni = '$id'",
        "upgrade" => "UPDATE customers SET type_customer = type_customer + 1 WHERE id_user = '$id'",
        "downgrade" => "UPDATE customers SET type_customer = type_customer - 1 WHERE id_user = '$id'",
    ];
    $query = $consultas[$action];
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../../customers.php?info=" . $action);
    } else {
        header("Location: ../../customers.php?info=" . $action . "_error");
    }

} else {
    header("Location: ../../customers.php");
}
