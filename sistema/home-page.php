<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Pagina Principal";
    $ssite = substr($site, 0, -1);
    include "components/head.php";
    include "includes/dbcon.php";
    ?>
    <!-- Datatables -->
    <link rel="stylesheet" href="css/tables.css">
</head>


<body>
    <!-- Navigation -->
    <?php include "components/nav.php" ?>

    <div class="is-center wd-100 top-nav">
        <div>
            <a href="../index.php" class="addButton button is-dark is-outlined is-size-6-desktop is-size-4"><em class="has-text-success fas fa-share"></em>Ver Pagina Principal</a>
            <h1 class="has-text-centered title is-cookie">Pagina Principal</h1>
        </div>

        <section id="ci" class="wd-90 pv-0">
            <h1 class="title mt-6 has-text-left">Carousel de Imágenes</h1>
            <?php include "components/cards/cards-carousel-principal.php" ?>
        </section>

        <section id="services" class="wd-90 pv-0">
            <h1 class="title mt-6 has-text-left">Servicios</h1>
            <?php //include "components/cards/cards-carousel-customers.php" 
            ?>
        </section>

        <section id="clc" class="wd-90 pv-0">
            <h1 class="title mt-6 has-text-left">Carousel de Logos de Clientes</h1>
            <?php include "components/cards/cards-carousel-customers.php" ?>
        </section>

    </div>
</body>

<footer id="footy">
    <?php include "components/footer.php" ?>
</footer>

<?php include "includes/scripts.php" ?>
<?php include "components/jgrowl-messages.php" ?>
<?php include "components/tables/script.php" ?>

</html>