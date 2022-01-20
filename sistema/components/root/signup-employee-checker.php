<?php

$middle_name = $_POST['middleName']; //
$second_lastname = $_POST['secondLastName']; //
$city = $_POST['residence'];  //
$question = $_POST['question'];  //
//$curriculum = $_POST['curriculum']; // ruta + archivo 

$cedula = $_POST['cedula']; #
$name = $_POST['firstName']; #
$lastname = $_POST['lastName']; #
$phone = '0'.$_POST['phone']; #
$birthday = $_POST['birthday']; #
$email = $_POST['email']; #
$password = $_POST['password']; #
$id_role = 7; #
//$photo = $_POST['photo']; # ruta + archivo 

$today = date("Y-m-d");
$token = base64_encode($email);
$timeStamp = new DateTime();
$newName = $timeStamp->getTimestamp();

$path = "../../uploads/";
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$uploaded_photo = $path . $newName . '.' . $ext;
$path_photo = "uploads/" . $newName . '.' . $ext;


$ext2 = pathinfo($_FILES['curriculum']['name'], PATHINFO_EXTENSION);
$uploaded_curriculum = $path . $newName . '.' . $ext2;
$path_curriculum = "uploads/" . $newName . '.' . $ext2;

move_uploaded_file($_FILES['photo']['tmp_name'], $uploaded_photo);
move_uploaded_file($_FILES['curriculum']['tmp_name'], $uploaded_curriculum);

$curri_error = "Location: ../../../workwithus.php?info=no_curri"; //login
$signup_error = "Location: ../../../workwithus.php?info=signup_error"; //login
$error = "Location: ../../../workwithus.php?info=error"; //login
$signup_success = "Location: ../../../workwithus.php?info=employee"; //login


include "../../includes/dbcon.php";
session_start();
$consulta = "SELECT * FROM users WHERE email='$email' OR dni='$cedula'"; // Revision de que ese cliente no exista
$result = mysqli_query($con, $consulta);

$rows = mysqli_num_rows($result);

if ($rows > 0) {
    header($signup_error);
    exit();
} else {
    
    $insertar_user = "INSERT INTO users (dni, name, lastname, phone, birthday, email, password, token, id_role, path_photo) VALUES ('$cedula', '$name', '$lastname', '$phone', '$birthday', '$email', '$password', '$token', '$id_role', '$path_photo')";
   
    $insertar_employee = "INSERT INTO employee (id_user, middleName, secondLastName, date_signup, curriculum, know_us) VALUES ('$cedula', '$middle_name', '$second_lastname', '$today', '$path_curriculum ', '$question')";
    

    $resultado_user = mysqli_query($con, $insertar_user);
    $resultado_employee = mysqli_query($con, $insertar_employee);
    echo $resultado_user;
    echo $resultado_employee;

    if ($resultado_user && $resultado_employee) {
        header($signup_success);
    }else{
        header($error);
        session_destroy();
        exit();
    }
}
