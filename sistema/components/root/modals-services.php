<!-- DOIT: Convertir en un componente o mejor no... -->
<?php
$modal_services = [
    'servicioModal1' => [
        'id' => 'servicioModal1',
        'title' => 'Chef en casa',
        'img' => 'sistema/images/services/encasa.jpeg',
        'description' => '  <p>Agregar descripcion mas concisa y detallada</p> <!-- Descripcion -->
                            <p><strong>Que servicios estan disponibles?</strong></p>
                            <p>Poner Lista de Servicios Aqui.</p>',
        'link' => '1'
    ],
    'servicioModal2' => [
        'id' => 'servicioModal2',
        'title' => 'Evento Corporativo',
        'img' => 'sistema/images/services/encasa.jpeg',
        'description' => '  <p>Agregar descripcion mas concisa y detallada</p> <!-- Descripcion -->
                            <p><strong>Que servicios estan disponibles?</strong></p>
                            <p>Poner Lista de Servicios Aqui.</p>',
        'link' => '2'
    ],
    'servicioModal3' => [
        'id' => 'servicioModal3',
        'title' => 'Evento Especiales',
        'img' => 'sistema/images/services/encasa.jpeg',
        'description' => '  <p>Agregar descripcion mas concisa y detallada</p> <!-- Descripcion -->
                            <p><strong>Que servicios estan disponibles?</strong></p>
                            <p>Poner Lista de Servicios Aqui.</p>',
        'link' => '3'
    ]
];
?>

<!-- usar el array modal_services -->
<?php foreach ($modal_services as $modal_service) : ?>
    <div class="servicio-modal modal fade" id="<?= $modal_service['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $modal_service['id'] ?>" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?= $modal_service['title'] ?></h2>
                            <img class="img-modal modern" src="<?= $modal_service['img'] ?>" alt="encasa">
                            <div>
                                <?= $modal_service['description'] ?>
                            </div>
                        </div>
                        <div>
                            <a href="service.php?details=<?= $modal_service['link'] ?>" type="button" class="btn btn-info b-700 f-16"><em class="fas fa-info"></em> Detalles</a>
                            <button style="margin-left: 90px;" type="button" class="btn btn-danger b-700 f-16" data-dismiss="modal"><em class="fa fa-times"></em> Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
