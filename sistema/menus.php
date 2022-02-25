<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Menús";
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
            <a class="addButton button is-dark is-outlined is-size-6-desktop is-size-4" id="addMenu" data-toggle="modal" href="#addMenuModal"><em class="has-text-success fas fa-plus"></em>Añadir Menú</a> 
            <h1 class="has-text-centered title is-cookie">Menús</h1>
        </div>
        <div class="wd-90 zoom-100">
            <?php // include "components/cards/cards-menus.php" ?>
            <?php include "components/tables/table-menu.php" ?>
        </div>
    </div>
</body>

<footer id="footy" class="<?= $foot ?>">
    <?php include "components/footer.php" ?>
</footer>

<?php include "includes/scripts_nm.php" ?>
<?php include "components/modals/modal_menu.php" ?>
<?php include "components/jgrowl-messages.php" ?>
<?php include "components/tables/script.php" ?>

</html>