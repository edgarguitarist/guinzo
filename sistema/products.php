<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Productos";
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
            <a class="addButton button is-dark is-outlined is-size-6-desktop is-size-4" id="addProduct"><em class="has-text-success fas fa-plus"></em>Añadir Producto</a> <!-- TODO: Add Proveedores Button to Modal -->
            <h1 class="has-text-centered title is-cookie">Productos</h1>
        </div>
        <div class="wd-90">
            <?php include "components/tables/table-products.php" ?>
        </div>
    </div>
</body>

<footer id="footy" class="<?= $foot ?>">
    <?php include "components/footer.php" ?>
</footer>

<?php 
    include "includes/scripts.php"; 
    include "components/jgrowl-messages.php";
    include "components/tables/script.php" 
?>

</html>