<meta charset="UTF-8">

<!-- Session_Start -->
<?php 
session_start();
$login = "Location: ../login.php?info=no_session";
if (!isset($_SESSION['id_role'])) {
    header($login);
    session_destroy();
}else{
    if ($_SESSION['id_role'] != 1) {
        header($login);
        session_destroy();
    }
}
?>

<!-- Tittle & Logo -->
<title><?= $site ?> - Bockcao</title>
<link rel="icon" type="image/png" href="images/logos/cropped-logo_bockcao-black-270x270.png" />

<!-- Bootstrap -->
<link rel='stylesheet' href='vendors/bootstrap/css/font-awesome.css'>
<!-- <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> -->
<link rel='stylesheet' href='vendors/bootstrap/css/bootstrap-me.css'>

<!-- Bulma 0.9.3 -->
<link rel="stylesheet" href="vendors/bulma-0.9.3/css/bulma.css">
<link rel="stylesheet" href="vendors/bulma-carousel/dist/css/bulma-carousel.min.css">

<!-- My Styles -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/modal.css">

<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

<!-- Iconos -->
<script type="text/javascript" src="js/icons.js"></script>

<!-- jGrowl -->
<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">

<!-- Modals Need it -->
<link rel="stylesheet" href="css/form_signup.css">

<?php
include 'paths.php ';
date_default_timezone_set('America/Guayaquil');
$hoy = date('Y-m-d');
$hoy_extended = date('Y-m-d').'T'.date('H:i');

$ayer = date("Y-m-d", strtotime($hoy."- 1 days"));
$dos_semanas = date("Y-m-d", strtotime($hoy."+ 15 days"));
$un_mes = date("Y-m-d", strtotime($hoy."+ 1 months"));
$minimo = date("Y-m-d", strtotime($hoy."- 18 years"));
?>