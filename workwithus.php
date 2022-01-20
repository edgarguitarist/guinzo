<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Trabaja con Nosotros";
    include "sistema/components/root/head.php"
    ?>
    <link rel="stylesheet" href="sistema/css/login.css">
    <link rel="stylesheet" href="sistema/css/form_signup.css">


</head>

<!-- partial:index.partial.html -->

<body>
    <!-- Navigation -->
    <?php include "sistema/components/root/nav.php" ?>

    <div id="form-work" class="top-nav container">
        <?php include "sistema/components/forms/form-workwithus.php" ?>
    </div>
    <div id="sucess-signup" style="display: none;" class="top-nav container">

        <div class="center">
            <h1 style="margin-top:7.5%;"></h1>
            <img src="sistema/images/logos/logo-bockcao-white.png" alt="error-404" class="vh-50 is-color-inverted">
            <h1 class="title">Registro Exitoso, en breve se habilitará tu cuenta!</h1>
            <h1 class="title">Bienvenido a la familia Bockcao!</h1>
        </div>
    </div>


</body>

<footer id="footy" class="footerN">
    <?php include "sistema/components/footer.php" ?>
</footer>

<?php include "sistema/includes/root/scripts.php" ?>
<?php include "sistema/components/jgrowl-messages.php" ?>
<script src="sistema/js/draganddrop.js"></script>
<script src="sistema/js/signup.js"></script>
<script src="sistema/js/actions.js"></script>
<script defer>
    //obtener el valor del get
    var get = getUrlVars();
    var info = get.info;
    if (info == "bienvenido") {
        document.getElementById("form-work").style.display = "none"
        document.getElementById("sucess-signup").style.display = "block"
        document.getElementById("footy").classList.remove("footerN")
        document.getElementById("footy").style = "position: fixed; bottom: 0;"
    }

    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
            vars[key] = value;
        });
        return vars;
    }
</script>

</html>