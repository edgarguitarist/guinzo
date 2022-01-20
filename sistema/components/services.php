<?php
$query_Services = mysqli_query($con, "SELECT * FROM services WHERE status='1'");
$num_rows_Services = mysqli_num_rows($query_Services);
?>

<div class="container has-text-centered">

    <div class="columns is-centrado">
        <div class="column">
            <h1 class="section-heading has-text-weight-semibold is-uppercase">Servicios</h1>
        </div>
    </div>
    <div class="columns is-centrado is-multiline">
        <?php while ($data = mysqli_fetch_array($query_Services)) {
            $name_Service = str_replace(' ', '', $data['name_service']);?>
            <div class="column is-one-third-desktop is-half servicio-item scale-105">
                <a id="prueba" href="#<?= $name_Service ?>" class="servicio-link" data-toggle="modal">                    
                    <div class="servicio-hover modern img-responsive">
                        <div class="servicio-hover-content">
                            <em class="fa fa-search fa-3x"></em>
                        </div>
                    </div>
                    <div class="center">
                        <img src="<?= $data['path'] ?>" class="img-responsive modern" alt="encasa"> 
                    </div>
                </a>
                <div class="servicio-caption old">
                    <h4 class="is-uppercase is-size-4 is-size-6-desktop"><?= $data['name_service'] ?></h4> 
                    <p class="text-muted is-capitalized is-size-4 is-size-6-desktop"><?= $data['subtitle'] ?></p> 
                </div>
            </div>
       <?php } ?>
    </div>

</div>