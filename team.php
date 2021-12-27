<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    $site = "Team";
    include "sistema/components/root/head.php"
    ?>
</head>

<!-- partial:index.partial.html  -->



<body>
    <!-- Navigation -->
    <?php include "sistema/components/root/nav.php" ?>

    <div class="padre center_login has-text-centered" style="place-content: center;">
        <?php include "sistema/components/crew.php" ?>
    </div>

</body>
<footer style="position: fixed; bottom: 0;">
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>

</html>