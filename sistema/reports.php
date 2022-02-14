<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Proveedores";
    $ssite = substr($site, 0, -2);
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
            <a class="addButton button is-dark is-outlined is-size-6-desktop is-size-4" id="addProvider"><em class="has-text-success fas fa-plus"></em>Añadir Proveedor</a> 
            <h1 class="has-text-centered title is-cookie">Proveedores</h1>
        </div>
        <div class="wd-90">
            <?php include "components/tables/table-providers.php" ?>
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