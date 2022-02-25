<?php
$query_carousel_images = mysqli_query($con, "SELECT * FROM carousel_images WHERE deleted='0'");
?>
<div id="servicio" class="columns mt-6 is-centrado is-multiline">
    <?php while ($data = mysqli_fetch_array($query_carousel_images)) {
        $status = $data['status'] == 1 ? '<em class="has-text-danger fas fa-minus-circle"></em>Desactivar' : '';
        $href = $data['status'] == 1 ? "components/update-home-page.php?who=carousel_images&action=desactivate&id=" . $data["id_image"] : "components/update-home-page.php?who=carousel_images&action=activate&id=" . $data["id_image"];
    ?>
        <div class="column is-one-quarter-desktop is-half servicio-item scale-101 mb-6">
            <div class="card">
                <div class="card-image">
                    <a href="<?= $href ?>">
                        <figure class="image is-4by3">
                            <img class="" src="../<?= $data['path']; ?>" alt="<?= $data['name']; ?>">
                        </figure>
                    </a>
                </div>
                <div class="content has-text-left mv-10 mh-10">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                </div>
                <footer class="card-footer">
                    <a href="<?= $href ?>" class="card-footer-item"><em class="has-text-success fas fa-edit"></em>Editar</a>
                    <a href="components/update-home-page.php?who=carousel_images&action=delete&id=<?= $data['id_image']; ?>" class="card-footer-item"><em class="has-text-danger far fa-times-circle"></em>Eliminar</a>
                </footer>
            </div>
        </div>
    <?php } ?>
    
</div>