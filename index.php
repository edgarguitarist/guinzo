<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Inicio";
    if (isset($_SESSION['id_role'])) {
        if ($_SESSION['id_role'] == 1) {
            $my_role = "Administrador";
        }
    }
    include "sistema/components/root/head.php"
    ?>

</head>

<!-- partial:index.partial.html -->

<body class="large-body">
    <?php
    if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1) {
        ?>
        <a class="btn-flotante is-size-3" href="sistema/home-page.php"><em class="fas fa-edit"></em> Editar</a>
    <?php 
    }
    ?>
    <!-- Navigation -->
    <?php include "sistema/components/root/nav.php" ?>
    <div>
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

        <!-- Publicaciones Section -->
        <!-- <section id="posts">
            <?php //include "sistema/components/publications.php" ?>
        </section> -->

        <!-- Quienes somos Section -->
        <section id="about" class="bg-light-gray">
            <?php include "sistema/components/about.php" ?>
        </section>

        <!-- MISION Y VISION Section -->
        <section id="myv">
            <?php include "sistema/components/myv.php" ?>
        </section>
    </div>

    <?php include "sistema/components/root/modals-services.php" ?>

</body>
<!-- Modals -->

<footer id="footy" class="footer3">
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>
<?php include "sistema/components/jgrowl-messages.php" ?>


</html>