<?php
$query_carousel_images = mysqli_query($con, "SELECT * FROM carousel_images WHERE deleted='0'");
?>
<div id="servicio" class="columns mt-6 is-centrado is-multiline">
    <?php while ($data = mysqli_fetch_array($query_carousel_images)) {
        $status = $data['status'] == 1 ? '<em class="has-text-danger fas fa-minus-circle"></em>Desactivar' : '<em class="has-text-success fas fa-plus"></em>Activar';
        $href = $data['status'] == 1 ? "components/update-home-page.php?who=carousel_images&action=desactivate&id=" . $data["id_image"] : "components/update-home-page.php?who=carousel_images&action=activate&id=" . $data["id_image"];
    ?>
        <div class="column is-one-fifth-desktop is-half servicio-item scale-101 mb-6">
            <div class="card">
                <div class="card-image">
                    <a href="<?= $href ?>">
                        <figure class="image is-4by3">
                            <img class="" src="../<?= $data['path']; ?>" alt="<?= $data['name']; ?>">
                        </figure>
                    </a>
                </div>
                <footer class="card-footer">
                    <a href="<?= $href ?>" class="card-footer-item"><?= $status ?></a>
                    <a href="components/update-home-page.php?who=carousel_images&action=delete&id=<?= $data['id_image']; ?>" class="card-footer-item"><em class="has-text-danger far fa-times-circle"></em>Eliminar</a>
                </footer>
            </div>
        </div>
    <?php } ?>
    <div class="column is-one-fifth-desktop is-half servicio-item scale-101 mb-6">
        <div class="card" style="height: 100%;">
            <a id="prueba" href="#changeCarouselImage" onclick="setType('principal')" class="img-card-fix servicio-link" data-toggle="modal">
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
                <a onclick="setType('principal')" href="#changeCarouselImage" class="card-footer-item decoration-none" data-toggle="modal"><em class='has-text-success fas fa-plus'></em>Agregar Nueva Imagen</a>
            </footer>
        </div>
    </div>
</div>

