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
            <img src="images/logos/logo-bockcao-white.png" class="h-60" alt="logo">
        </a>

        <a role="button" class="navbar-burger has-text-white" aria-label="menu" aria-expanded="false" data-target="navbarBulma" style="align-self: center;">
            <!-- <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span> -->
            <em style="margin-top:10px;" class="wd-60 maxcon fas fa-bars"></em>
        </a>
    </div>
    <!-- TODO: Reparar el responsive, posible problema -> "Los iconos! :C" -->
    <div id="navbarBulma" class="navbar-menu has-background-black-bis">
        <div class="navbar-end">
            <a class="navbar-item has-text-weight-medium has-text-white	" href="index.php#">
                <em class="fas fa-home" style="/*margin-top: -4.5px;*/"></em>&nbsp;Inicio
            </a>

            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#servicio">
                <em class="fas fa-star"></em>&nbsp;Clientes
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#contact">
                <em class="fas fa-users"></em>&nbsp;Empleados
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#about">
                <em class="fas fa-apple-alt"></em>&nbsp;Productos
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#about">
                <em class="fas fa-utensils"></em>&nbsp;Materiales
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#myv">
                <em class="fas fa-calendar-alt"></em>&nbsp;Eventos
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#myv">
                <em class="fas fa-table"></em>&nbsp;Reportes
            </a>

        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <img class="h-60 mr-15" src="<?php echo $_SESSION['photo']; ?>" alt="photo">
                <span class="is-in-nav"><?php echo $_SESSION['username']; ?></span>
            </div>
            <div class="navbar-item">
                <div class="buttons">
                    <a target="_blank" class="button is-primary-light" onclick="logout();">
                        <em class="fas fa-sign-out-alt"></em>&nbsp;Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>


        <!-- <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link has-text-weight-bold is-size-6">
                    
                </a>

                <div class="navbar-dropdown is-right">
                    <a class="navbar-item">
                        Cerrar Sesion
                    </a>                   
                </div>
            </div>
        </div> -->
    </div>
</nav>
