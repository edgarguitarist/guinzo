<?php

$email = $_POST['email'];
$password = $_POST['password'];
$user_error = "Location: ../../../login.php?info=user_error"; //login
$rol_error = "Location: ../../../login.php?info=rol_error"; //login

if (empty($email) || empty($password)) {
	header($user_error);
	exit();
}

include "../../includes/dbcon.php";
session_start();
$consulta = "SELECT * FROM users WHERE email='$email' AND password = '$password' AND status_user = 'Active'";
$result = mysqli_query($con, $consulta);

if ($row = mysqli_fetch_array($result)) {
	$_SESSION['dni'] = $row['dni'];
	$_SESSION['name'] = $row['name'];
	$_SESSION['lastname'] = $row['lastname'];
	$_SESSION['username'] = $row['name'] . ' ' . $row['lastname'];
	$_SESSION['phone'] = $row['phone'];
	$_SESSION['birthday']   = $row['birthday'];
	$_SESSION['email']   = $row['email'];
	$_SESSION['password']   = $row['password'];
	$_SESSION['token'] = $row['token'];
	$_SESSION['id_role'] = $row['id_role'];
	$_SESSION['photo']   = $row['path_photo'];

	if ($row['id_role'] == 1) {
		header("Location: ../../index.php?info=bienvenido");
	} else if ($row['id_role'] == 6) {
		header("Location: ../../../index.php?info=bienvenido");
	} else {
		header($rol_error);
	}
} else {	
	header($user_error);
	session_destroy();
	exit();
}
