<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Inicio";
    include "sistema/components/root/head.php"
    ?>
</head>

<!-- partial:index.partial.html -->


<body id="page-top">
    <!-- Navigation -->
    <?php include "sistema/components/root/nav.php" ?>

    
    <div class="bg-fix">
        <!-- DOIT: Revisar la importancia de esto para el responsive -->
        <!-- Header -->
        <header style="margin-top: inherit;" id="top">
            <div class="columns has-background-info-light" id="carousel-prueba">
                <div class="column">
                    <?php include "sistema/components/root/header.php" ?>
                </div>
            </div>
        </header>
        
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

    <?php include "sistema/components/root/modals-services.php" ?>

</body>
<footer>
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>
<?php include "sistema/components/jgrowl-messages.php" ?>
</html>