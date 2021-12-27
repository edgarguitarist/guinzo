<!DOCTYPE html>
<html style="overflow-y: hidden;" lang="es">

<head>
    <?php
    $site = "Login";
    include "sistema/components/root/head.php";

    ?>
    <link rel="stylesheet" href="sistema/css/login.css">

</head>

<!-- partial:index.partial.html -->


<body>
    <!-- Navigation -->
    <?php include "sistema/components/root/nav.php" ?>


    <div class="padre center_login">

        <!-- Sections -->
        <?php include "sistema/components/forms/form-login.php" ?>

    </div>




</body>
<footer class="footer2">
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>
<script src="sistema/js/login.js"></script>
<?php include "sistema/components/jgrowl-messages.php" ?>


</html>