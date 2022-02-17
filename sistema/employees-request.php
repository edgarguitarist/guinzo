<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Solicitudes";
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
            <h1 class="has-text-centered title is-cookie">Solicitudes</h1>
        </div>

        <div class="wd-90">
            <?php include "components/tables/table-employees-request.php" ?>
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