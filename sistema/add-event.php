<!DOCTYPE html>
<html class="no-overflow-x" lang="es">
<?php
include "includes/dbcon.php";
?>


<head>
    <?php
    $site = "Agregar Evento";
    $ssite = "Agregar Evento";
    include "components/head.php";
    ?>
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="css/tables.css">
</head>


<body>
    <!-- Navigation -->
    <?php include "components/nav.php" ?>

    <div class="is-center wd-100 top-nav">
        <div>
            <a href="events.php" rel="external nofollow" class="addButton button is-dark is-outlined is-size-6-desktop is-size-4"><em class="has-text-success fas fa-share"></em>Volver a la Pagina Anterior</a>
            <h1 class="has-text-centered title is-cookie"><?= $site ?></h1>
        </div>

        <div class="wd-80">
            <br>
            <br>
            <form onchange="checkForm()" onclick="checkForm()" method="post" action="components/forms/update-data.php">
                <input type="hidden" id="who" name="who" value="events">
                <input type="hidden" id="action" name="action" value="add">
                <?php include "components/forms/form-events.php" ?>
                <button onmouseover="checkForm()" id="submit" name="submit" type="submit" class="form_button mt-5">Agregar</button>
            </form>
        </div>

    </div>

</body>

<footer id="footy" class="footerN">
    <?php include "components/footer.php" ?>
</footer>



<?php
include "includes/scripts.php";
include "components/jgrowl-messages.php";
?>

</html>