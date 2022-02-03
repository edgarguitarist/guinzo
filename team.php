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

    <div class="has-text-centered is-flex top-nav">
        <div class="mv-auto mh-auto has-text-centered">
            <?php include "sistema/components/crew.php" ?>
        </div>
    </div>
</body>
<footer id="footy" class="footer3">
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>

</html>