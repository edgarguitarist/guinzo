<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = 'Error 404';
    include('sistema/components/root/head.php');
    ?>
</head>

<!-- FIXME: Arreglar la pagina de Error 404 -->

<body>
    <?php include "sistema/components/nav-404.php" ?>
    <div class="center">
        <h1 style="margin-top:10%;"></h1>
        <img src="sistema/images/logos/cropped-logo_bockcao-black-270x270.png" alt="error-404">
        <h1>Lo sentimos...</h1>
        <h2>Pagina no Encontrada!!!</h2>
    </div>
</body>

<footer style="position: absolute; bottom: 0;">
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>

</html>