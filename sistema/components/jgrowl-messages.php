<?php

if (isset($_GET["info"])) {
    if ($_GET["info"] === 'bienvenido') {
?>
        <script>
            (function($) {
                $(document).ready(function() {
                    $.jGrowl('ES UN GUSTO VOLVER A VERTE!', {
                        header: 'BIENVENIDO'
                    })
                });
            })(jQuery);
        </script>
    <?php
    } else if ($_GET["info"] === 'error') {
    ?>
        <script>
            (function($) {
                $(document).ready(function() {
                    $.jGrowl('LO SENTIMOS ALGO NO HA SALIDO BIEN!', {
                        header: 'RESPUESTA'
                    })
                });

            })(jQuery);
        </script>
    <?php
    } else if ($_GET["info"] === 'user_error') {
    ?>
        <script>
            (function($) {
                $(document).ready(function() {
                    $.jGrowl('CORREO O CONTRASEÑA INCORRECTA', {
                        header: 'RESPUESTA'
                    })
                });

            })(jQuery);
        </script>
    <?php
    } else if ($_GET["info"] === 'rol_error') {
    ?>
        <script>
            (function($) {
                $(document).ready(function() {
                    $.jGrowl('AUN NO PUEDES INICIAR SESIÓN', {
                        header: 'RESPUESTA'
                    })
                });

            })(jQuery);
        </script>
    <?php
    } else if ($_GET["info"] === 'no_session') {
    ?>
        <script>
            (function($) {
                $(document).ready(function() {
                    $.jGrowl('ACCESO NO PERMITIDO, DEBE INICIAR SESIÓN PRIMERO', {
                        header: 'RESPUESTA'
                    })
                });

            })(jQuery);
            debugger;
        </script>
<?php
    }
}


?>