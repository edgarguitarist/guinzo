<?php
$who = $_GET['who'];
$action = $_GET['action'];
$id = $_GET['id'];
$name = '';
$path_photo = '';

$consultas = [
    "carousel_images" => [
        "activate" => "UPDATE carousel_images SET status = 1 WHERE id_image = '$id'",
        "desactivate" => "UPDATE carousel_images SET status = 0 WHERE id_image = '$id'",
        "delete" => "UPDATE carousel_images SET deleted = 1 WHERE id_image = '$id'",
        "add" => "INSERT INTO carousel_images (name, path) VALUES ('$name', '$path_photo')",
    ],
    "carousel_customers" => [
        "activate" => "UPDATE carousel_customers SET status = 1 WHERE id_image = '$id'",
        "desactivate" => "UPDATE carousel_customers SET status = 0 WHERE id_image = '$id'",
        "delete" => "UPDATE carousel_customers SET deleted = 1 WHERE id_image = '$id'",
        "add" => "INSERT INTO carousel_customers (name, path) VALUES ('$name', '$path_photo')",
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
