<?php
require '../includes/dbcon.php';
$contador=0;
if (isset($_POST['table'])){
    $conditions = $_POST['conditions'] != '' ? " WHERE " . $_POST['conditions'] : "";
    $table = $_POST['table'];
    $consulta="SELECT * FROM $table" . $conditions;
    $resultado=mysqli_query($con,$consulta);
    $contador = mysqli_num_rows($resultado);
    //si hay proveedores devolverlos en un echo
    if($contador>0){
        $response = array();
        while($row = mysqli_fetch_array($resultado)){
            $response[] = $row;
        }
        echo json_encode($response);
    }else{
        echo false ;
    }
}

?>