<?php
$hostname = 'localhost';
$username1 = 'u103247758_bockcao'; // username online
$password1 = '^roSzIvBaX7'; // password online

$username2 = 'root';
$password2 = '';

$dbname = 'u103247758_bockcao';

$selector='online';
#Para efectos del ejemplo supondremos que es la misma base de datos en ambas bases de datos tanto la remota como la local 

$con = @mysqli_connect($hostname, $username1, $password1);
#notese el @ antes del comando mysql_connect para evitar que arroje mensaje de error de PHP 

if (!($con)) {
  $con = @mysqli_connect($hostname, $username2, $password2) or die('No puedo conectarme a ninguna base de datos! Intentelo nuevamente.');
  $selector='local';
}

mysqli_select_db($con, $dbname);
mysqli_query($con, "SET NAMES 'utf8'");
?>