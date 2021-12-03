<?php

$cedula = $_POST['cedula'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$email = $_POST['email_r'];
$password = $_POST['password_r'];
$token = base64_encode($email);

$user_error = "Location: ../../../login.php?info=user_error"; //login
$signup_error = "Location: ../../../login.php?info=signup_error"; //login
$rol_error = "Location: ../../../login.php?info=rol_error"; //login
$error = "Location: ../../../login.php?info=error"; //login
$signup_success = "Location: ../../../index.php?info=bienvenido"; //login

if (empty($email) || empty($password)) {
    header($user_error);
    exit();
}

include "../../includes/dbcon.php";
session_start();
$consulta = "SELECT * FROM users WHERE email='$email' OR dni='$cedula'";
$result = mysqli_query($con, $consulta);

$rows = mysqli_num_rows($result);

if ($rows > 0) {
    header($signup_error);
    exit();
} else {
    $insertar = "INSERT INTO users (dni, name, lastname, birthday, email, password, token) VALUES ('$cedula', '$name', '$lastname', '$birthday', '$email', '$password', '$token')";
    $resultado = mysqli_query($con, $insertar);
    if ($resultado) {
        $consulta = "SELECT * FROM users WHERE dni='$cedula'";
        $result = mysqli_query($con, $consulta);
        $row = mysqli_fetch_array($result);
        //$_SESSION['id'] = $row['id'];
        $_SESSION['dni'] = $row['dni'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['lastname'] = $row['lastname'];
		$_SESSION['username'] = $row['name'].' '.$row['lastname'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['birthday'] = $row['birthday'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['token'] = $row['token'];
        $_SESSION['id_role'] = $row['id_role'];
        $_SESSION['photo'] = $row['floc'];
        header($signup_success);
    }else{
        header($error);
        session_destroy();
        exit();
    }
}
