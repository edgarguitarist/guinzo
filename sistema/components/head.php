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
<title><?php echo $site ?> - Bockcao</title>
<link rel="icon" type="image/png" href="images/logos/cropped-logo_bockcao-black-270x270.png" />

<!-- jQuery -->
<!-- <script type="text/javascript" src="js/jquery.min.js"></script>
<script src="vendors/jquery-1.11.1.min.js"></script>
<link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> -->


<!-- Bootstrap -->
<link rel='stylesheet' href='vendors/bootstrap/css/font-awesome.css'>
<!-- <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> -->
<link rel='stylesheet' href='vendors/bootstrap/css/bootstrap-me.css'>

<!-- Bulma 0.9.3 -->
<link rel="stylesheet" href="vendors/bulma-0.9.3/css/bulma.css">
<link rel="stylesheet" href="vendors/bulma-carousel/dist/css/bulma-carousel.min.css">

<!-- My Styles -->
<link rel="stylesheet" href="css/style.css">
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
<!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script> -->


<?php
date_default_timezone_set('America/Guayaquil');
$hoy = date('Y-m-d');
$minimo = date("Y-m-d", strtotime($hoy."- 18 years"));
?>