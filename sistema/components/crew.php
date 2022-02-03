<?php
include "sistema/includes/dbcon.php";
$query_crew = mysqli_query($con, "SELECT * FROM employee em, users us, type_employee te WHERE te.id_type_employee = em.rank_employee AND us.dni = id_user AND rank_employee BETWEEN '5' AND '6'");
$num_rows_crew = mysqli_num_rows($query_crew);
?>

<div class="columns is-centrado">
    <div class="column">
        <h1 class="h1-cookie">Nuestro Equipo</h1>

    </div>
</div>

<div class="columns mh-auto wd-90 is-multiline">
    <div class="column  is-one-quarter-desktop is-half">
        <div class="card">
            <div class="card-image pt-5">
                <figure class="image is-4by3">
                    <img class="fit-contain modern" src="sistema/images/team/Antonio-c2.jpg" alt="Placeholder image">
                </figure>
            </div>
            <div class="card-content">
                <div class="media mb-1">
                    <div class="wd-90 mh-auto">
                        <p class="title is-size-4-desktop is-size-3">ANTONIO CACAO</p>
                        <p class="ml-3 is-size-6-desktop is-size-4">Event Designer</p>
                    </div>
                </div>
                <div class="content mt-3">
                    <span class="is-size-6-desktop is-size-5">Breve descripcion de cada miembro del equipo</span>
                    <br>
                    <time datetime="2016-1-1"></time>
                </div>
            </div>
        </div>
    </div>
    <div class="column  is-one-quarter-desktop is-half">
        <div class="card">
            <div class="card-image pt-5">
                <figure class="image is-4by3">
                    <img class="fit-contain modern" src="sistema/images/team/Celia-300x300.jpeg" alt="Placeholder image">
                </figure>
            </div>
            <div class="card-content">
                <div class="media mb-1">
                    <div class="wd-90 mh-auto">
                        <p class="title is-size-4-desktop is-size-3">CELIA CACAO</p>
                        <p class="ml-3 is-size-6-desktop is-size-4">Event Designer</p>
                    </div>
                </div>
                <div class="content mt-3">
                    <span class="is-size-6-desktop is-size-5">Breve descripcion de cada miembro del equipo</span>
                    <br>
                    <time datetime="2016-1-1"></time>
                </div>
            </div>
        </div>
    </div>
    <?php while ($data = mysqli_fetch_array($query_crew)) {
        //$name_Service = str_replace(' ', '', $data['name_service']); ?>
        <div class="column  is-one-quarter-desktop is-half">
            <div class="card">
                <div class="card-image pt-5">
                    <figure class="image is-4by3">
                        <img class="fit-contain" src="<?= "sistema/".$data['path_photo']; ?>" alt="Placeholder image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media mb-1">
                        <div class="wd-90 mh-auto">
                            <p class="title is-size-4-desktop is-size-3"><?= $data['name'] . " " . $data['lastname']; ?></p>
                            <p class="ml-3 is-size-6-desktop is-size-4"><?= "Miembro " . $data['name_type_employee'] ?></p>
                        </div>
                    </div>
                    <div class="content mt-3">
                        <span class="is-size-6-desktop is-size-5">Breve descripcion de cada miembro del equipo</span>
                        <br>
                        <time datetime="2016-1-1"></time>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="column  is-one-quarter-desktop is-half">
        <div class="card">
            <div class="card-image pt-5">
                <figure class="image is-4by3">
                    <img class="fit-contain is-color-inverted" src="sistema/images/logos/logo-bockcao-white.png" alt="Placeholder image">
                </figure>
            </div>
            <div class="card-content">
                <div class="media mb-1">
                    <div class="wd-90 mh-auto">
                        <p class="title is-size-4-desktop is-size-3">Otro Miembro</p>
                        <p class="ml-3 is-size-6-desktop is-size-4">Event Designer</p>
                    </div>
                </div>
                <div class="content mt-3">
                    <span class="is-size-6-desktop is-size-5">Breve descripcion de cada miembro del equipo</span>
                    <br>
                    <time datetime="2016-1-1"></time>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<h1 class="title">¿Porque elegir nuestro equipo?</h1>
<br>
<ul.b style="list-style-type: square;">

    <li class="is-size-4 is-size-5-desktop">
        Seleccionar al mejor equipo para los Eventos Especiales es una decisión importante.
    </li>
    <li class="is-size-4 is-size-5-desktop">
        Deseas tener junto a ti a un Equipo de Profesionales en eventos, con Experiencia probada, y con Testimonios reales de Eventos exitosos.
    </li>
    <li class="is-size-4 is-size-5-desktop">
        Eso es Bockcao, además le añadimos Energía positiva, toque de Originalidad y sobretodo el Carisma único que nos caracteriza.
    </li>
    <li class="is-size-4 is-size-5-desktop">
        El equipo Bockcao te brinda confianza y tranquilidad que te garantiza que disfrutes al 100% tu evento.
    </li>
    <li class="is-size-4 is-size-5-desktop">
        Ser El ALMA DE FIESTA!!
    </li>
</ul.b>

<br><br>
<h2 class="title is-size-5-desktop is-size-4"><em class="fas fa-star"></em> Somos un equipo de profesionales que resolveremos todo por ti
    Creamos momentos únicos y especiales, haciendo lo ordinario… extraordinario.</h2>
<!-- <div class="has-text-centered">
    <a href="#servicioModalCacao" class="servicio-link" data-toggle="modal">
        <img src="sistema/images/team/antonio-c.jpg" class="img-large modern" alt="encasa" width="80%">

        <h1 class="subtitle b-600 mv-10">ANTONIO CACAO</h1>
        <h2 class="subtitle is-6">Event Designer</h2>
    </a>
</div> -->

<!-- INFO:
Porque elegir nuestro equipo?
Seleccionar al mejor equipo para los Eventos Especiales es una decisión importante. Deseas tener junto a ti a un Equipo de Profesionales en eventos, con Experiencia probada, y con Testimonios reales de Eventos exitosos.
Eso es Bockcao, además le añadimos Energía positiva, toque de Originalidad y sobretodo el Carisma único que nos caracteriza.
El equipo Bockcao te brinda confianza y tranquilidad que te garantiza que disfrutes al 100% tu evento.
Ser El ALMA DE FIESTA!!

-->