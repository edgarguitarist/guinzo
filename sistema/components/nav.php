<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>
<?php
$a_class = "navbar-item has-text-weight-medium has-text-white is-size-6-desktop is-size-3";
?>

<nav class="navbar is-fixed-top has-background-black-bis" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img id="logo" src="images/logos/logo-bockcao-white.png" class="h-60e" alt="logo">
        </a>

        <a role="button" class="navbar-burger has-text-white is-size-6-desktop is-size-3" aria-label="menu" aria-expanded="false" data-target="navbarBulma" style="align-self: center;">
            <!-- <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span> -->
            <em style="margin-top:10px;" class="wd-60 maxcon fas fa-bars"></em>
        </a>
    </div>
    <!-- TODO: Reparar el responsive, posible problema -> "Los iconos! :C" -->
    <div id="navbarBulma" class="navbar-menu has-background-black-bis">
        <div class="navbar-end">
            <a class="<?= $a_class; ?>" href="index.php#">
                <em class="fas fa-home"></em>Inicio
            </a>
            <a class="<?= $a_class; ?>" href="customers.php">
                <em class="fas fa-star"></em>Clientes
            </a>
            <a class="<?= $a_class; ?>" href="employees.php">
                <em class="fas fa-users"></em>Empleados
            </a>
            <a class="<?= $a_class; ?>" href="providers.php">
                <em class="fas fa-truck"></em>Proveedores
            </a>
            <a class="<?= $a_class; ?>" href="coming-soon.php">
                <em class="fas fa-apple-alt"></em>Productos
            </a>
            <a class="<?= $a_class; ?>" href="coming-soon.php">
                <em class="fas fa-utensils"></em>Materiales
            </a>
            <a class="<?= $a_class; ?>" href="coming-soon.php">
                <em class="fas fa-calendar-alt"></em>Eventos
            </a>
            <a class="<?= $a_class; ?>" href="coming-soon.php">
                <em class="fas fa-table"></em>Reportes
            </a>
            <a class="<?= $a_class; ?>" href="home-page.php">
                <em class="fas fa-store"></em>Pagina Principal
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item is-flex-mobile">
                <div class="navbar-item has-dropdown is-hoverable is-my-primary">
                    <img id="photo-user" class="h-60 w-60 mr-15 inline-flex-mobile" src="<?= $_SESSION['photo']; ?>" alt="photo">
                    <a class="navbar-link  inline-flex-mobile">
                        <!-- Docs -->
                        <span class="is-in-nav has-text-weight-bold is-size-6-desktop is-size-3"><?= $_SESSION['username']; ?></span>
                    </a>

                    <div class="navbar-dropdown">
                        <a href="#changePhoto" class="navbar-item is-size-6 text-white-mobile" data-toggle="modal">
                            Cambiar Foto de Perfil
                        </a>
                        <a id="modal-js-example" href="#" class="navbar-item is-size-6 text-white-mobile">
                                Editar mi Perfil
                            </a>
                        <hr class="navbar-divider">
                        <div class="navbar-item  text-white-mobile">
                            Version 2.0.1
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-item">
                <div class="buttons">
                    <a target="_blank" class="button is-primary-light is-size-6-desktop is-size-3" onclick="logout();">
                        <em class="fas fa-sign-out-alt"></em>Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php include "components/modals/modals-photo.php" ?>

