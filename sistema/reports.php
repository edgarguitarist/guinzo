<!DOCTYPE html>
<html lang="es">
<?php
$initial_date = $_GET['initial_date'] ?? '';
$final_date = $_GET['final_date'] ?? '';
$customer = $_GET['customer'] ?? '';
$provider = $_GET['provider'] ?? '';
$type = $_GET['type'] ?? 'events';
$types = [
    'events' => [
        'title' => 'Eventos',
        'form' => 'table-report-events.php',
        'who' => 'events',
    ],
    'customer' => [
        'title' => 'Cliente',
        'form' => 'table-report-customers.php',
        'who' => 'customer',
    ],
    'provider' => [
        'title' => 'Proveedores',
        'form' => 'table-report-providers.php',
        'who' => 'provider',
    ]
];
if (!isset($types[$type])) {
    header('Location: index.php');
}
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
            <h1 class="has-text-centered title is-cookie">Reporte de <?= $types[$type]['title'] ?></h1>
        </div>

        <div class="buscador2">
            <?php include "components/buscador.php" ?>
        </div>
<br>
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