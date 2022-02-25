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
        <div class="wd-90 hidden">
            <?php include "components/events-contract.php" ?>
        </div>
        <br>
        <br>
        <div class="has-text-centered">
            <button class="button is-info is-outlined is-size-5-desktop is-size-4 b-bolder" onclick="genPDF('<?= $namepdf; ?>', 'pdf_container')"><em class="fas fa-print"></em> IMPRIMIR</button>
            <button class="button is-dark is-outlined is-size-5-desktop is-size-4 b-bolder" onclick="genPDF('<?= 'Contrato_' . $namepdf; ?>', 'pdf_container_contrato')"><em class="fas fa-file-alt "></em> CONTRATO</button>
        </div>
    </div>
</body>

<footer id="footy" class="footer3">
    <?php include "components/footer.php" ?>
</footer>

<?php include "includes/scripts.php" ?>
<?php include "components/jgrowl-messages.php" ?>
<?php include "components/tables/script.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.1.1/jspdf.umd.min.js" integrity="sha512-/Am09zlYshHgRizY3RkConGj4BsYIdb8mS7r5XAXw0rTiLgGSHzpUHTQBhinWR32C/KzLr749J1xuORzT2JnRA==" crossorigin="anonymous"></script>

</html>