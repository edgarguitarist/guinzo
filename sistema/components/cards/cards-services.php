<?php
$query_services = mysqli_query($con, "SELECT * FROM services");
?>
<div id="servicio" class="columns mt-6 is-centrado is-multiline">
    <?php while ($data = mysqli_fetch_array($query_services)) {
        $status = $data['status'] == 1 ? '<em class="has-text-danger fas fa-minus-circle"></em>Desactivar' : '<em class="has-text-success fas fa-plus"></em>Activar';
        $href = $data['status'] == 1 ? "components/update-home-page.php?who=services&action=desactivate&id=" . $data["id_service"] : "components/update-home-page.php?who=services&action=activate&id=" . $data["id_service"];
    ?>
        <div class="column is-one-fifth-desktop is-half servicio-item scale-101 mb-6">
            <div class="card">
                <div class="card-image">
                    <a href="<?= $href ?>">
                        <figure class="image is-4by3">
                            <img class="" src="../<?= $data['path']; ?>" alt="<?= $data['name_service']; ?>">
                        </figure>
                    </a>
                </div>
                <div style="padding: 0px!important;" class="card-content">
                    <div style="padding: 10px!important;" class="media">
                        <div class="media-content">
                            <p class="title is-5"><?= $data['name_service']; ?></p>
                            <p style="margin: 7px 0px -3px ;" class="subtitle is-6"><?= $data['subtitle']; ?></p>
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="<?= $href ?>" class="card-footer-item"><?= $status ?></a>
                </footer>
            </div>
        </div>
    <?php } ?>
    <div class="column is-one-fifth-desktop is-half servicio-item scale-101 mb-6">
        <div class="card">
            <a id="prueba" href="#addService" onclick="setType('services', 'type_upload_service')" class="img-card-fix servicio-link" data-toggle="modal">
                <div class="img-card-fix servicio-hover img-responsive">
                    <div class="servicio-hover-content">
                        <em class="fa fa-plus fa-3x"></em>
                    </div>
                </div>
                <div class="img-card-fix center">
                    <em class="img-card-fix add-image far fa-image fa-3x img-responsive p-5 "></em>
                </div>
            </a>
            <footer class="card-footer">
                <a onclick="setType('services', 'type_upload_service')" href="#addService" class="card-footer-item decoration-none" data-toggle="modal"><em class='has-text-success fas fa-plus'></em>Agregar un Nuevo Servicio</a>
            </footer>
        </div>
    </div>
</div>