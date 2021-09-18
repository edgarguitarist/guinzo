<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Inicio";
    include "sistema/components/root/head.php"
    ?>

</head>


<!-- partial:index.partial.html -->

<body id="page-top" class="index" data-pinterest-extension-installed="cr1.3.4">

    <!-- Navigation -->
    <?php include "sistema/components/nav.php" ?>

    <!-- Header -->
    <header>
        <?php include "sistema/components/root/header.php" ?>
    </header>
    <div class="bg-fix">
        <!-- SERVICIOS Section -->
        <section id="servicio" class="bg-light-gray">
            <?php include "sistema/components/services.php" ?>
        </section>

        <!-- CONTACTO Section -->
        <section id="contact">
            <?php include "sistema/components/contact.php" ?>
        </section>


        <!-- Quienes somos Section -->
        <section id="about" class="bg-light-gray">
            <?php include "sistema/components/about.php" ?>
        </section>

        <!-- MISION Y VISION Section -->
        <section id="myv">
            <?php include "sistema/components/myv.php" ?>
        </section>
    </div>

   

    <!-- servicio Modals -->
    <!-- Use the modals below to showcase details about your services in this projects! -->

    <?php include "sistema/components/modals.php" ?>

</body>
<footer >
        <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>

</html>