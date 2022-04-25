<!DOCTYPE html>
<html lang="es">
<?php
$initial_date = $_GET['initial_date'] ?? null;
$final_date = $_GET['final_date'] ?? null;
$type = $_GET['type'] ?? 'events';
$types = [
    'events' => [
        'title' => 'Reporte',
        'form' => 'table-report-events.php',
        'who' => 'events',
    ],
    'customer' => [
        'title' => 'Reporte Cliente',
        'form' => 'table-report-customers.php',
        'who' => 'customer',
    ],
    'provider' => [
        'title' => 'Reporte Proveedor',
        'form' => 'table-report-providers.php',
        'who' => 'provider',
    ]
];
?>

<head>
    <?php
    $site = "Reporte";
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
            <h1 class="has-text-centered title is-cookie">Reporte</h1>
        </div>

        <div class="buscador">
            <?php include "components/buscador.php" ?>
        </div>

        <div class="wd-90">
            <?php include "components/tables/" . $types[$type]['form'] ?>
        </div>
        
    </div>
</body>

<footer id="footy" class="<?= $foot ?>">
    <?php include "components/footer.php" ?>
</footer>

<?php include "includes/scripts.php" ?>
<?php include "components/jgrowl-messages.php" ?>
<?php include "components/tables/script_sum.php" ?>

</html>