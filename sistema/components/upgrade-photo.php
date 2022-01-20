<?php

$timeStamp = new DateTime();
$name = $timeStamp->getTimestamp();

$today = date("Y-m-d");
$id = $_POST['dni'];
$path = "../uploads/";

$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$uploaded_photo = $path . $name . '.' . $ext;
$path_photo = "uploads/" . $name . '.' . $ext;

$success = "?info=update-photo";
$error = "?info=error";

include "../includes/dbcon.php";
session_start();

if ($_SESSION['dni'] == null) {
    echo "<script> window.location.href = localStorage.getItem('currentPath') + '" . $error . "'</script>";
    exit();
} else {

    $consulta = "UPDATE users SET path_photo = '$path_photo' WHERE dni = '$id'";

    $resultado = mysqli_query($con, $consulta);

    if ($resultado) {
        echo "<script> window.location.href = localStorage.getItem('currentPath') + '" . $success . "'</script>";
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploaded_photo);
        $_SESSION['photo'] = $path_photo;
    } else {
        echo "<script> window.location.href = localStorage.getItem('currentPath') + '" . $error . "'</script>";
        session_destroy();
        exit();
    }
}
