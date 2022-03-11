
<?php
require '../includes/dbcon.php';

$table = $_POST['table'];
$name = $_POST['name'];

$tabla = $table . "s";
$nombre = "name_" . $table;

$consulta = "SELECT * FROM $tabla WHERE $nombre = '$name' GROUP BY $nombre";
$resultado = mysqli_query($con, $consulta);
$contador = mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);
if ($contador > 0) {
    echo $table == 'menu' ? $row['price_menu'] : $row['price'];
}



?>