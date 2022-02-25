<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Detalles del Evento";
    $ssite = $site;
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
            <a onclick="history.back()" rel="external nofollow" class="addButton button is-dark is-outlined is-size-6-desktop is-size-4"><em class="has-text-success fas fa-share"></em>Volver a la Pagina Anterior</a>
            <h1 class="has-text-centered title is-cookie">Detalles</h1>
        </div>
        <div class="wd-90">
            <?php include "components/events-details.php" ?>
        </div>

    </div>
</body>

<footer id="footy" class="<?= $foot ?>">
    <?php include "components/footer.php" ?>
</footer>

<?php include "includes/scripts.php" ?>
<?php include "components/jgrowl-messages.php" ?>
<?php include "components/tables/script.php" ?>

</html>