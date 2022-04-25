<!DOCTYPE html>
<html class="no-overflow-x" lang="es">
<?php
include "includes/dbcon.php";
if(isset($_GET['type'])){
    include "components/types.php";
}
require_once "components/forms/get-data.php";
?>


<head>
    <?php
    $site = $who != '' ? $data_who[$who]["title"] : 'Editar Datos';
    $ssite = substr($site, 0, -1);
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
            <a onclick="history.back()" rel="external nofollow" class="addButton button is-dark is-outlined is-size-6-desktop is-size-4"><em class="has-text-success fas fa-share"></em>Volver a la Pagina Anterior</a>
            <h1 class="has-text-centered title is-cookie"><?= $site ?></h1>
        </div>

        <div class="wd-80">
            <br>
            <br>
            <form enctype="multipart/form-data" onchange="checkForm()" onclick="checkForm()" onkeyup="checkForm()" method="post" action="components/forms/update-data.php">
                <input type="hidden" id="who" name="who" value="<?= $data_who[$who]["who"] ?>">
                <input type="hidden" id="action" name="action" value="update">
                <?php include "components/forms/" . $data_who[$who]["form"] ?>
                <button onmouseover="checkForm()" id="submit" name="submit" type="submit" class="form_button mt-5">Actualizar</button>
            </form>
        </div>

    </div>

</body>

<footer id="footy" class="footer2">
    <?php include "components/footer.php" ?>
</footer>


<?php
include "includes/scripts.php";
include "components/jgrowl-messages.php";
if ($disableDNI) {
    echo '
    <script defer> 
        const find_cedula = document.getElementsByName("cedula")
        
            for (let i = 0; i < find_cedula.length; i++) {
                find_cedula[i].disabled = true
            }
        
        const find_ruc = document.getElementById("ruc")
        if (find_ruc) {
            find_ruc.disabled = true
        }
    </script>';
}
?>


</html>