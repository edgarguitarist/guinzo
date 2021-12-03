<?php
require '../includes/dbcon.php';
$contador=0;
if (isset($_POST['dni'])){
    $dni = $_POST['dni'];
    $consulta="SELECT * FROM users WHERE dni= '$dni'";
    $resultado=mysqli_query($con,$consulta);
    $contador = mysqli_num_rows($resultado);
    if($contador>0){
        echo 'existe';
    }
}else if(isset($_POST['dni_pro'])){
    $dni_pro = $_POST['dni_pro'];
    $consulta2="SELECT * FROM proveedor WHERE dni_pro= '$dni_pro'";
    $resultado2=mysqli_query($con,$consulta2);
    $contador = mysqli_num_rows($resultado2);
    if($contador>0){
        echo 'existe';
    }
}

?>