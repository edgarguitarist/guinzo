<!DOCTYPE html>
<html style="overflow-y: hidden;" lang="es">

<head>
    <?php
    $site = "Login";
    include "sistema/components/root/head.php"
    ?>
    <link rel="stylesheet" href="sistema/css/login.css">
    
</head>

<!-- partial:index.partial.html -->


<body id="page-top">
    <!-- Navigation -->
    <?php include "sistema/components/root/nav.php" ?>
    
    
     <div class="padre center_login">
        
        <!-- Sections -->
        <?php include "sistema/components/form-recovery.php" ?>
    </div>




</body>
<footer width="100%" style="position: fixed; bottom: 0px;">
    <?php include "sistema/components/footer.php" ?>
</footer>
<?php include "sistema/includes/root/scripts.php" ?>
<script src="sistema/js/login.js"></script>
</html>