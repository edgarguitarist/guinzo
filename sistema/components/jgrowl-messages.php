<?php

$Nombres = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if (!isset($ssite)) {
    $ssite = $site;
}

$mensajes = [
    'bienvenido' => [
        'header' => 'BIENVENIDO!!!',
        'message' => 'Es un gusto volver a verte ' . $Nombres . '!',
        'type' => 'INFO'
    ],
    'employee' => [
        'header' => 'BIENVENIDO!!!',
        'message' => 'Estamos revisando tu perfil ' . $Nombres . '!',
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
    ],
    'delete' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Hemos Eliminado el ' . $ssite . '.',
        'type' => 'SUCCESS'
    ],
    'delete_error' => [
        'header' => 'LO SENTIMOS! ',
        'message' => 'No hemos podido Eliminar el ' . $ssite . '.',
        'type' => 'ERROR'
    ],
    'undelete' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Hemos Restaurado el ' . $ssite . '.',
        'type' => 'SUCCESS'
    ],
    'undelete_error' => [
        'header' => 'LO SENTIMOS! ',
        'message' => 'No hemos podido Restaurar el ' . $ssite . '.',
        'type' => 'ERROR'
    ],
    'upgrade' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Hemos Mejorado el Rank del ' . $ssite . '.',
        'type' => 'SUCCESS'
    ],
    'upgrade_error' => [
        'header' => 'LO SENTIMOS! ',
        'message' => 'No hemos podido Mejorar el Rank del ' . $ssite . '.',
        'type' => 'ERROR'
    ],
    'downgrade' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Hemos Cambiado el Rank del ' . $ssite . '.',
        'type' => 'SUCCESS'
    ],
    'downgrade_error' => [
        'header' => 'LO SENTIMOS! ',
        'message' => 'No hemos podido Cambiar el Rank del ' . $ssite . '.',
        'type' => 'ERROR'
    ],
    'add' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Hemos agregado un nuevo ' . $ssite . '.',
        'type' => 'SUCCESS'
    ],
    'add_error' => [
        'header' => 'LO SENTIMOS! ',
        'message' => 'No hemos podido agregar el ' . $ssite . '.',
        'type' => 'ERROR'
    ],
    'update-photo' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Hemos actualizado su Foto.',
        'type' => 'SUCCESS'
    ],
    'email_error' => [
        'header' => 'LO SENTIMOS!',
        'message' => 'No se pudo enviar el Correo, vuelva a intentar más tarde.',
        'type' => 'ERROR'
    ],
    'email_success' => [
        'header' => 'Datos Actualizados!',
        'message' => 'Hemos enviado el correo de recuperación.',
        'type' => 'SUCCESS'
    ],
    'error_change_pass' => [
        'header' => 'LO SENTIMOS! ',
        'message' => 'No hemos podido cambiar la contraseña.',
        'type' => 'ERROR'
    ],
    'success_change_pass' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Hemos cambiado la contraseña.',
        'type' => 'SUCCESS'
    ],
    'event_created' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Hemos creado un nuevo evento.',
        'type' => 'SUCCESS'
    ],
    'event_error' => [
        'header' => 'LO SENTIMOS! ',
        'message' => 'No hemos podido crear un nuevo evento.',
        'type' => 'ERROR'
    ],
    'upload_success' => [
        'header' => 'Datos Actualizados! ',
        'message' => 'Carga Exitosa.',
        'type' => 'SUCCESS'
    ],
];


//echo json_encode($mensajes);

if (isset($_GET["info"])) {
    $mensaje = $_GET["info"];
    $cabecera = $mensajes[$mensaje]['header'] ?? 'Información';
    $respuesta = $mensajes[$mensaje]['message'] ?? 'Datos Actualizados';
?>
    <script>
        (function($) {
            $(document).ready(function() {
                $.jGrowl('<?= $respuesta ?>', {
                    header: '<?= $cabecera ?>'
                })
            });
        })(jQuery);
    </script>
<?php
}
?>