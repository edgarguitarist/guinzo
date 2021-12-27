<?php
require '../includes/dbcon.php';
$contador=0;
if (isset($_POST['email'])){
    $email = $_POST['email'];
    $consulta="SELECT * FROM users WHERE email= '$email'";
    $resultado=mysqli_query($con,$consulta);
    $contador = mysqli_num_rows($resultado);
    if($contador>0){
        echo 'existe';
    }
}

?>