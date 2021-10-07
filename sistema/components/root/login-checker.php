<?php

$email = $_POST['email'];
$password = $_POST['password'];
$user_error = "Location: ../../../login.php?info=user_error"; //login
$rol_error = "Location: ../../../login.php?info=rol_error"; //login

if(empty($email) || empty($password)){
	header($user_error);
	exit();
}

include "../../includes/dbcon.php";
session_start();
$consulta="SELECT * FROM users WHERE email='$email' AND password = '$password'";
$result=mysqli_query($con,$consulta);

if($row = mysqli_fetch_array($result)){
	if($row['id_role'] = 1){
		$_SESSION['username'] = $row['name'].' '.$row['lastname'];
		$_SESSION['dni'] = $row['dni'];
		$_SESSION['id_role'] = 1;
		$_SESSION['birthday']   = $row['birthday'];
        $_SESSION['password']   = $row['password'];
        $_SESSION['email']   = $row['email'];
		$_SESSION['photo']   = $row['floc'];
        echo "todo bien";
		header("Location: ../../index.php?info=bienvenido");
	}else if($row['id_role'] = 6 || $row['id_role'] = 7){
		$_SESSION['username'] = $row['name'].' '.$row['lastname'];
		$_SESSION['dni'] = $row['dni'];
		$_SESSION['id_role'] = 1;
		$_SESSION['birthday']   = $row['birthday'];
        $_SESSION['password']   = $row['password'];
        $_SESSION['email']   = $row['email'];
		$_SESSION['photo']   = $row['floc'];
        echo "todo bien";
		header("Location: ../../../index.php?info=bienvenido");
	}else{
		header($rol_error);
	}
}else{
    echo "usuario no encontrado";
	header($user_error);
	session_destroy();
	exit();
}
