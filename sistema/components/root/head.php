<meta charset="UTF-8">

<!-- Session_Start -->
<?php 
session_start();
// session_destroy();
//$login = "Location: ../login.php?info=no_session";
?>

<!-- Tittle & Logo -->
<title><?= $site ?> - Bockcao</title>
<link rel="icon" type="image/png" href="sistema/images/logos/cropped-logo_bockcao-black-270x270.png" />

<!-- Bootstrap -->
<link rel='stylesheet' href='sistema/vendors/bootstrap/css/font-awesome.css'>
<link rel='stylesheet' href='sistema/vendors/bootstrap/css/bootstrap-me.css'>

<!-- Bulma 0.9.3 -->
<link rel="stylesheet" href="sistema/vendors/bulma-0.9.3/css/bulma.css">
<link rel="stylesheet" href="sistema/vendors/bulma-carousel/dist/css/bulma-carousel.min.css">

<!-- My Styles -->
<link rel="stylesheet" href="sistema/css/style.css">
<link rel="stylesheet" href="sistema/css/custom.css">
<link rel="stylesheet" href="sistema/css/footer.css">
<link rel="stylesheet" href="sistema/css/modal.css">

<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

<!-- Iconos -->
<script type="text/javascript" src="sistema/js/icons.js"></script>

<!-- jGrowl -->
<link href="sistema/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">

<!-- Modals Need it -->
<link rel="stylesheet" href="sistema/css/form_signup.css">

<!-- fechas -->
<?php
include 'paths.php ';
date_default_timezone_set('America/Guayaquil');
$hoy = date('Y-m-d');
$hora = date('H:i:s');
$fecha = date('Y-m-d H:i:s'); 
$minimo = date("Y-m-d", strtotime($hoy."- 18 years"));
?>