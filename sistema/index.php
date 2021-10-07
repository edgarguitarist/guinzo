<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Bienvenido";
    include "components/head.php"
    ?>
</head>

<!-- partial:index.partial.html -->


<body id="page-top">
    <!-- Navigation -->
    <?php include "components/nav.php" ?>


    <div class="bg-fix">

    </div>

    <!-- servicio Modals -->
    <!-- Use the modals below to showcase details about your services in this projects! -->

    <?php include "components/modals.php" ?>

</body>
<footer style="position:fixed; bottom:0;">
    <?php include "components/footer.php" ?>
</footer>
<?php include "includes/scripts.php" ?>

<?php include "components/jgrowl-messages.php" ?>


</html>