<meta charset="UTF-8">

<!-- Session_Start -->
<?php 
session_start();
// session_destroy();
//$login = "Location: ../login.php?info=no_session";
?>

<!-- Tittle & Logo -->
<title><?php echo $site ?> - Bockcao</title>
<link rel="icon" type="image/png" href="sistema/images/logos/cropped-logo_bockcao-black-270x270.png" />

<!-- jQuery -->
<!-- 
<script type="text/javascript" src="sistema/js/jquery.min.js"></script>
<script src="sistema/vendors/jquery-1.11.1.min.js"></script>
<link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> -->


<!-- Bootstrap -->
<link rel='stylesheet' href='sistema/vendors/bootstrap/css/font-awesome.css'>
<!-- <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> -->
<link rel='stylesheet' href='sistema/vendors/bootstrap/css/bootstrap-me.css'>

<!-- Bulma 0.9.3 -->
<link rel="stylesheet" href="sistema/vendors/bulma-0.9.3/css/bulma.css">
<link rel="stylesheet" href="sistema/vendors/bulma-carousel/dist/css/bulma-carousel.min.css">

<!-- My Styles -->
<link rel="stylesheet" href="sistema/css/style.css">
<link rel="stylesheet" href="sistema/css/footer.css">
<link rel="stylesheet" href="sistema/css/modal.css">


<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

<!-- Iconos -->
<script type="text/javascript" src="sistema/js/icons.js"></script>
<!-- <script src='https://use.fontawesome.com/826a7e3dce.js'></script> -->
<!-- <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"/> -->

<!-- jGrowl -->
<link href="sistema/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
<!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script> -->


<!-- slick -->

<!-- fechas -->
<?php
date_default_timezone_set('America/Guayaquil');
$hoy = date('Y-m-d');
$hora = date('H:i:s');
$fecha = date('Y-m-d H:i:s'); 
$minimo = date("Y-m-d", strtotime($hoy."- 18 years"));
?>