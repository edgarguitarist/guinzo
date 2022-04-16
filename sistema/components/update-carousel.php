<?php
include "../includes/dbcon.php";
$type_upload = $_POST['type_upload'];

$data_type_upload = [
    'principal' => [
        "name" => "slide",
        "path" => 'images/slides/',
        "table" => 'carousel_images',
    ],
    'clients' => [
        "name" => "client",
        "path" => 'images/clients/',
        "table" => 'carousel_customers',
    ],
    'services' => [
        "name" => "service",
        "path" => 'images/services/',
        "table" => 'services',
    ],
];

$today = date("Y-m-d");
$timeStamp = new DateTime();
$newName = $timeStamp->getTimestamp();

$path = "../" . $data_type_upload[$type_upload]['path'];
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$uploaded_photo = $path . $newName . '.' . $ext;
$path_photo = "sistema/" . $data_type_upload[$type_upload]['path'] . $newName . '.' . $ext;

move_uploaded_file($_FILES['photo']['tmp_name'], $uploaded_photo);
$table = $data_type_upload[$type_upload]['table'];

if ($type_upload != 'services') {
    $query = "SELECT MAX(id_image) AS MAX FROM $table ORDER BY id_image DESC";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $id = $row['MAX'] + 1;
    $name = $data_type_upload[$type_upload]['name'] . $id;

    $query2 = "INSERT INTO $table (name, path) VALUES ('$name','$path_photo')";
    $result2 = mysqli_query($con, $query2);
}else{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $subtitle = $_POST['subtitle'];
    $query = "INSERT INTO $table (name_service, description, subtitle, path) VALUES ('$name','$description','$subtitle','$path_photo')";
    $result = mysqli_query($con, $query);
}

header("Location: ../home-page.php?info=upload_success");
