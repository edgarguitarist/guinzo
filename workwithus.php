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

    <div class="top-nav container">
        <?php include "sistema/components/forms/form-workwithus.php" ?>
    </div>

</body>

<footer class="footerN">
    <?php include "sistema/components/footer.php" ?>
</footer>

<?php include "sistema/includes/root/scripts.php" ?>
<?php include "sistema/components/jgrowl-messages.php" ?>
<script src="sistema/js/draganddrop.js"></script>
<script src="sistema/js/signup.js"></script>

</html>