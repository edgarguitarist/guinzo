<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Sitio en Construcción";
    include "components/head.php"
    ?>
</head>

<!-- partial:index.partial.html -->


<body>
    <!-- Navigation -->
    <?php include "components/nav.php" ?>
    <div class="container padre center_login">
        <div class="has-text-centered wd-100">
            <h1 style="margin-bottom: 0px;" class="has-text-centered title is-cookie">Sitio en Construcción</h1>

            <img src="images/logos/logo-bockcao-white.png" alt="logo" class="wd-40 is-color-inverted">
            <br>
            <h1 style="margin-bottom: 0px;" class="has-text-centered subtitle is-size-4-desktop is-size-2">Regresa pronto para ver las cosas nuevas!</h1>

        </div>
    </div>

</body>
<footer id="footy" class="footer2">
    <?php include "components/footer.php" ?>
</footer>
<?php include "includes/scripts.php" ?>

<?php include "components/jgrowl-messages.php" ?>


</html>