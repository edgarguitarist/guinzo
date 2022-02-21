<?php
include 'sistema/includes/dbcon.php';

if(isset($_POST['password']) && isset($_POST['userID'])){
    $password = $_POST['password'];
    $token = $_POST['userID'];
    $query = "UPDATE users SET password = '$password' WHERE token = '$token'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die("Query Failed.");
        header("Location: login.php?info=error_change_pass");
    }
    echo "Contraseña cambiada con exito";
    header("Location: login.php?info=success_change_pass");
}

echo $_POST['password'];
echo $_POST['userID'];