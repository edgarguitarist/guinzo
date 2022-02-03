<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Empleados";
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
            <a class="addButton button is-dark is-outlined is-size-6-desktop is-size-4" id="addEmployee"><em class="has-text-success fas fa-plus"></em>Añadir Empleado</a> <!-- TODO: Add Employee Button to Modal -->
            <h1 class="has-text-centered title is-cookie">Empleados</h1>
        </div>

        <div class="wd-90">
            <?php include "components/tables/table-employees.php" ?>
        </div>

    </div>
</body>

<footer id="footy" class="<?= $foot ?>">
    <?php include "components/footer.php" ?>
</footer>

<script>
    position_sort_table = 2 
</script>

<?php 
    include "includes/scripts.php"; 
    include "components/jgrowl-messages.php";    
    include "components/tables/script_sort.php"; 
?>

</html>