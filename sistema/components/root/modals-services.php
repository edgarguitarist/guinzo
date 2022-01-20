<?php
$queryModal = mysqli_query($con, "SELECT * FROM services WHERE status='1'");
?>

<?php while ($dataModal = mysqli_fetch_array($queryModal)) { 
    $nameModal = str_replace(' ', '', $dataModal['name_service']);
?>
    <div class="servicio-modal modal fade" id="<?= $nameModal ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $nameModal ?>" aria-hidden="true">
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
                            <h2><?= $dataModal['name_service'] ?></h2>
                            <img class="img-modal modern" src="<?= $dataModal['path'] ?>" alt="encasa">
                            <div>
                                <?= $dataModal['description'] ?>
                            </div>
                        </div>
                        <div>
                            <a href="service.php?details=<?= $dataModal['id_service'] ?>" type="button" class="btn btn-info b-700 f-16"><em class="fas fa-info"></em> Detalles</a>
                            <button style="margin-left: 90px;" type="button" class="btn btn-danger b-700 f-16" data-dismiss="modal"><em class="fa fa-times"></em> Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
