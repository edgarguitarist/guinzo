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
    <a onclick="javascript:history.back();" rel="external nofollow" class="addButton button is-dark is-outlined is-size-6-desktop is-size-4"><em class="has-text-success fas fa-share"></em>Volver a la Pagina Anterior</a>

        <h1 style="margin-top:7.5%;"></h1>
        <img src="sistema/images/logos/logo-bockcao-white.png" alt="error-404" class="vh-50 is-color-inverted">
        <h1 class="title">Lo sentimos...</h1>
        <h1 class="title">Pagina no Encontrada!</h1>
    </div>
</body>

<footer id="footy" style="position: fixed; bottom: 0;">
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>

</html>