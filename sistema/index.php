<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Bienvenido";
    include "components/head.php"
    ?>
</head>

<!-- partial:index.partial.html -->


<body>
    <!-- Navigation -->
    <?php include "components/nav.php" ?>
    <div class="container padre center_login">
        <div class="has-text-centered wd-100">
            <h1 style="margin-bottom: 0px;" class="has-text-centered title is-cookie">Bienvenido</h1>

            <img src="images/logos/logo-bockcao-white.png" alt="logo" class="wd-40 is-color-inverted">

        </div>
    </div>

    <!-- servicio Modals -->
    <!-- Use the modals below to showcase details about your services in this projects! -->

    <?php //include "components/modals.php" 
    ?>

</body>
<footer class="footer2">
    <?php include "components/footer.php" ?>
</footer>
<?php include "includes/scripts.php" ?>

<?php include "components/jgrowl-messages.php" ?>


</html>