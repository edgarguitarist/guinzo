<!-- <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Alternar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">BOCKCAO</a>

            <img class="old" style="height: 50px;" src="sistema/images/logos/logo-bockcao-white.png">
        </div>

        <!-- Collect the nav links, forms, and other content for toggling 
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden active">
                    <a href="index.php#page-top"></a>
                </li>
                <!-- TODO: Poner iconos en el navbar 
                <li class="">
                    <a class="page-scroll" href="index.php#servicio"><b>SERVICIOS</b></a> 
                </li>
                <li class="">
                    <a class="page-scroll" href="index.php#contact"><b>INFORMACIÓN</b></a>
                </li>

                <li class="">
                    <a class="page-scroll" href="index.php#about"><b>Quienes Somos</b></a>
                </li>
                <li class="">
                    <a class="page-scroll" href="index.php#myv"><b>Misión y Visión</b></a>
                </li>

                <li class="">
                    <a class="page-scroll" target="_blank" href="sistema/index.html"><b>Iniciar Sesión</b></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse 
    </div>
    <!-- /.container-fluid 
</nav> -->

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
            <img src="sistema/images/logos/logo-bockcao-white.png" style="max-height: 3rem;" alt="logo">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBulma" style="align-self: center;">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
<!-- TODO: Reparar el responsive, posible problema -> "Los iconos! :C" -->
    <div id="navbarBulma" class="navbar-menu has-background-black-bis">
        <div class="navbar-end">
            <a class="navbar-item has-text-weight-medium has-text-white	" href="index.php#">
            <i class="fas fa-home" style="/*margin-top: -4.5px;*/"></i>&nbsp;Inicio
            </a>

            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#servicio">
            <i class="fas fa-concierge-bell"></i>&nbsp;Servicios
            </a>

            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#contact">
            <i class="fas fa-info-circle"></i>&nbsp;Información
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#about">
            <i class="fas fa-comments"></i>&nbsp;Quienes Somos
            </a>
            <a class="navbar-item has-text-weight-medium has-text-white" href="index.php#myv">
            <i class="fas fa-star"></i>&nbsp;Misión y Visión
            </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <!-- <a class="button is-primary" href="signup.php">
                        <strong>Registrarse</strong>
                    </a> -->
                    <a target="_blank" class="button is-primary-light" href="login.php">
                    <i class="fas fa-user"></i>&nbsp;Iniciar Sesión
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