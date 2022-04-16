<?php
$who = $_GET['who'];
$action = $_GET['action'];
$id = $_GET['id'];

$consultas = [
    "carousel_images" => [
        "activate" => "UPDATE carousel_images SET status = 1 WHERE id_image = '$id'",
        "desactivate" => "UPDATE carousel_images SET status = 0 WHERE id_image = '$id'",
        "delete" => "UPDATE carousel_images SET deleted = 1 WHERE id_image = '$id'",
    ],
    "carousel_customers" => [
        "activate" => "UPDATE carousel_customers SET status = 1 WHERE id_image = '$id'",
        "desactivate" => "UPDATE carousel_customers SET status = 0 WHERE id_image = '$id'",
        "delete" => "UPDATE carousel_customers SET deleted = 1 WHERE id_image = '$id'",
    ],
    "services" => [
        "activate" => "UPDATE services SET status = 1 WHERE id_service = '$id'",
        "desactivate" => "UPDATE services SET status = 0 WHERE id_service = '$id'",
    ],    
];
include "../includes/dbcon.php";
$query = $consultas[$who][$action];
$result = mysqli_query($con, $query);
if ($result) {
    header("Location: ../home-page.php?info=" . $action);
} else {
    header("Location: ../home-page.php?info=" . $action . "_error");
}
