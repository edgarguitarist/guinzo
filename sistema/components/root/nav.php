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


<nav class="navbar is-fixed-top has-background-black-bis" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="sistema/images/logos/logo-bockcao-white.png" class="h-60e" alt="logo">
        </a>

        <a role="button" class="navbar-burger has-text-white is-size-6-desktop is-size-3" aria-label="menu" aria-expanded="false" data-target="navbarBulma" style="align-self: center;">
            <!-- <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span> -->
            <em style="margin-top:10px;" class="wd-60 maxcon fas fa-bars"></em>
        </a>
    </div>
    <div id="navbarBulma" class="navbar-menu has-background-black-bis">
        <div class="navbar-end">
            <a class="navbar-item has-text-weight-medium has-text-white is-size-6-desktop is-size-3" href="index.php#">
                <em class="fas fa-home"></em>Inicio
            </a>

            <a class="navbar-item has-text-weight-medium has-text-white is-size-6-desktop is-size-3" href="index.php#servicio">
                <em class="fas fa-concierge-bell"></em>Servicios
            </a>

            <a class="navbar-item has-text-weight-medium has-text-white is-size-6-desktop is-size-3" href="index.php#contact">
                <em class="fas fa-info-circle"></em>Información
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white is-size-6-desktop is-size-3" href="index.php#posts">
                <em class="fas fa-info-circle"></em>Publicaciones
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white is-size-6-desktop is-size-3" href="index.php#about">
                <em class="fas fa-comments"></em>Quienes Somos
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white is-size-6-desktop is-size-3" href="index.php#myv">
                <em class="fas fa-star"></em>Misión y Visión
            </a>
            <?php if (!isset($_SESSION['id_role'])) { ?>
                <a class="navbar-item has-text-weight-medium has-text-white is-size-6-desktop is-size-3" href="workwithus.php">
                    <em class="fas fa-user-tie"></em>Trabaja con Nosotros
                </a>
            <?php } ?>
        </div>
        <div class="navbar-end">

            <?php
            if (isset($_SESSION['id_role'])) {
            ?>
                <div class="navbar-item is-flex-mobile">
                    <div class="navbar-item has-dropdown is-hoverable is-my-primary">
                        <img id="photo-user" class="h-60 w-60 mr-15 inline-flex-mobile" src="sistema/<?= $_SESSION['photo']; ?>" alt="photo">
                        <a class="navbar-link  inline-flex-mobile">
                            <!-- Docs -->
                            <span class="is-in-nav has-text-weight-bold is-size-6-desktop is-size-3"><?= $_SESSION['username']; ?></span>
                        </a>

                        <div class="navbar-dropdown">
                            <a id="modal-js-example" href="#changePhoto" class="navbar-item is-size-6 text-white-mobile" data-toggle="modal">
                                Cambiar Foto de Perfil
                            </a>
                            <a id="modal-js-example" href="#updateProfile" class="navbar-item is-size-6 text-white-mobile" data-toggle="modal">
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
                        <a target="_blank" class="button is-primary-light is-size-6-desktop is-size-3" onclick="logout2();">
                            <em class="fas fa-sign-out-alt"></em>Cerrar Sesión
                        </a>
                    </div>
                <?php
            } else { ?>
                    <div class="buttons">
                        <a target="_blank" class="button is-primary-light is-size-6-desktop is-size-3 mr-3" href="login.php">
                            <em class="fas fa-user"></em>Iniciar Sesión
                        </a>
                    </div>
                <?php
            }

                ?>


                </div>
        </div>
    </div>
</nav>
<?php include "sistema/components/modals/modals-profile.php" ?>