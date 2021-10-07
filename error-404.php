<!DOCTYPE html>
<html style="overflow-y: hidden;" lang="es">

<head>
    <?php
    $site = 'Error 404';
    include('sistema/components/root/head.php');
    ?>
</head>

<!-- DOIT: Arreglar la pagina de Error 404 -->

<body>
    <?php include "sistema/components/root/nav.php" ?>
    <div class="center">
        <h1 style="margin-top:7.5%;"></h1>
        <img src="sistema/images/logos/cropped-logo_bockcao-black-270x270.png" alt="error-404" class="vh-50">
        <h1 class="title">Lo sentimos...</h1>
        <h1 class="title">Pagina no Encontrada!</h1>
    </div>
</body>

<footer style="position: fixed; bottom: 0;">
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>

</html>