<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Inicio";
    include "sistema/includes/root/head.php"
    ?>
</head>

<body>
    <!-- partial:index.partial.html -->

    <body id="page-top" class="index" data-pinterest-extension-installed="cr1.3.4">

        <!-- Navigation -->
        <?php include "sistema/includes/nav.php" ?>

        <!-- Header -->
        <header>
            <?php include "sistema/includes/root/header.php"?>
        </header>

        <!-- SERVICIOS Section -->
        <section id="servicio" class="bg-light-gray">        
            <?php include "sistema/includes/services.php" ?>
        </section>

        <!-- CONTACTO Section -->
        <section id="contact">
            <?php include "sistema/includes/contact.php" ?>
        </section>


        <!-- Quienes somos Section -->
        <section id="about" class="bg-light-gray">
            <?php include "sistema/includes/about.php" ?>
        </section>

        <!-- MISION Y VISION Section -->
        <section id="myv">
            <?php include "sistema/includes/myv.php" ?>
        </section>

        <footer>
            <?php include "sistema/includes/footer.php" ?>
        </footer>

        <!-- servicio Modals -->
        <!-- Use the modals below to showcase details about your services in this projects! -->

        <?php include "sistema/includes/modals.php" ?>

    </body>

    <?php include "sistema/includes/root/scripts.php" ?>

</body>

</html>