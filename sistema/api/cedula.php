<?php
require '../includes/dbcon.php';
$contador=0;
if (isset($_POST['dni'])){
    $dni = $_POST['dni'];
    $consulta="SELECT * FROM users WHERE dni= '$dni'";
    $resultado=mysqli_query($con,$consulta);
    $contador = mysqli_num_rows($resultado);
    echo $contador > 0 ? 'existe' : 'no existe';
}else if(isset($_POST['dni_pro'])){
    $dni_pro = $_POST['dni_pro'];
    $consulta2="SELECT * FROM proveedor WHERE dni_pro= '$dni_pro'";
    $resultado2=mysqli_query($con,$consulta2);
    $contador = mysqli_num_rows($resultado2);
    echo $contador > 0 ? 'existe' : 'no existe';
}

?>