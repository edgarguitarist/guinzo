<?php

$Nombres = $_SESSION['username'] != '' ? $_SESSION['username'] : '';

$mensajes = [
    'bienvenido' => [
        'header' => 'BIENVENIDO!!! 🤩',
        'message' => 'Es un gusto volver a verte ' . $Nombres. '!',
        'type' => 'INFO'
    ],
    'no_session' => [
        'header' => 'ADVERTENCIA!',
        'message' => 'Acceso no permitido, Primero debe iniciar sesión.',
        'type' => 'WARNING'
    ],
    'logout' => [
        'header' => '',
        'message' => 'SIGUE DISFRUTANDO DE NUESTROS SERVICIOS.',
        'type' => 'INFO'
    ],
    'error' => [
        'header' => 'ERROR',
        'message' => 'Lo sentimos, Algo no ha salido bien!',
        'type' => 'ERROR'
    ],
    'user_error' => [
        'header' => 'VUELVA A INTENTAR! 😀',
        'message' => 'Correo O Contraseña Incorrecta.',
        'type' => 'ERROR'
    ],
    'rol_error' => [
        'header' => 'LO SENTIMOS! ',
        'message' => 'Aún no puedes iniciar sesión.',
        'type' => 'ERROR'
    ]
];


echo json_encode($mensajes);

if (isset($_GET["info"])) {
    $mensaje = $_GET["info"];
    $cabecera = $mensajes[$mensaje]['header'];
    $respuesta = $mensajes[$mensaje]['message'];   
?>
    <script>
        (function($) {
            $(document).ready(function() {
                $.jGrowl('<?php echo $respuesta ?>', {
                    header: '<?php echo $cabecera ?>'
                })
            });
        })(jQuery);
    </script>
<?php
}
?>