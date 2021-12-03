<?php
$services = [
    'servicioModal1' => [
        'id' => 'servicioModal1',
        'title' => 'Chef en casa',
        'subtitle' => 'Culinary Services',
        'img' => 'sistema/images/services/encasa.jpeg',
        'description' => '  <p>Agregar descripcion mas concisa y detallada</p> <!-- Descripcion -->
                            <p><strong>Que servicios estan disponibles?</strong></p>
                            <p>Poner Lista de Servicios Aqui.</p>',
        'link' => '1'
    ],
    'servicioModal2' => [
        'id' => 'servicioModal2',
        'title' => 'Eventos Corporativos',
        'subtitle' => 'Event Planner',
        'img' => 'sistema/images/services/corporativo.jpg',
        'description' => '  <p>Agregar descripcion mas concisa y detallada</p> <!-- Descripcion -->
                            <p><strong>Que servicios estan disponibles?</strong></p>
                            <p>Poner Lista de Servicios Aqui.</p>',
        'link' => '2'
    ],
    'servicioModal3' => [
        'id' => 'servicioModal3',
        'title' => 'Eventos Especiales',
        'subtitle' => 'Special Events',
        'img' => 'sistema/images/services/especial.jpeg',
        'description' => '  <p>Agregar descripcion mas concisa y detallada</p> <!-- Descripcion -->
                            <p><strong>Que servicios estan disponibles?</strong></p>
                            <p>Poner Lista de Servicios Aqui.</p>',
        'link' => '3'
    ],
    'servicioModal4' => [
        'id' => 'servicioModal4',
        'title' => 'Eventos Sociales',
        'subtitle' => 'Event Planners',
        'img' => 'sistema/images/services/social.jpg',
        'description' => '  <p>Agregar descripcion mas concisa y detallada</p> <!-- Descripcion -->
                            <p><strong>Que servicios estan disponibles?</strong></p>
                            <p>Poner Lista de Servicios Aqui.</p>',
        'link' => '4'
    ],
    'servicioModal5' => [
        'id' => 'servicioModal5',
        'title' => 'Matrimonios',
        'subtitle' => 'Wedding Planners',
        'img' => 'sistema/images/services/matrimonio.jpg',
        'description' => '  <p>Agregar descripcion mas concisa y detallada</p> <!-- Descripcion -->
                            <p><strong>Que servicios estan disponibles?</strong></p>
                            <p>Poner Lista de Servicios Aqui.</p>',
        'link' => '5'
    ]
];
?>

<div class="container has-text-centered">

    <div class="columns is-centrado">
        <div class="column">
            <h1 class="section-heading has-text-weight-semibold is-uppercase">Servicios</h1>
        </div>
    </div>
    <div class="columns is-centrado is-multiline">
        <?php foreach ($services as $service) : ?>
            <div class="column is-one-third servicio-item">
                <a id="prueba" href="#<?= $service['id'] ?>" class="servicio-link" data-toggle="modal">
                    <!-- a href -->
                    <div class="servicio-hover modern img-responsive">
                        <div class="servicio-hover-content">
                            <em class="fa fa-search fa-3x"></em>
                        </div>
                    </div>
                    <div class="center">
                        <img src="<?= $service['img'] ?>" class="img-responsive modern" alt="encasa"> <!-- img src -->
                    </div>
                </a>
                <div class="servicio-caption old">
                    <h4 class="is-uppercase"><?= $service['title'] ?></h4> <!-- title -->
                    <p class="text-muted is-capitalized"><?= $service['subtitle'] ?></p> <!-- subtitle -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>