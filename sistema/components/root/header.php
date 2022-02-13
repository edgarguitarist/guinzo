<?php
include "sistema/includes/dbcon.php";
$queryCarousel = mysqli_query($con, "SELECT * FROM carousel_images WHERE status='1' AND deleted='0'");
$num_rows = mysqli_num_rows($queryCarousel);
?>

<div>

    <div id="carousel-example-generic" class="carousel slide carousel-height" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            for ($i = 0; $i < $num_rows; $i++) {
                if ($i == 0) {
                    echo '<li data-target="#carousel-example-generic" data-slide-to="' . $i . '" class="active"></li>';
                } else {
                    echo '<li data-target="#carousel-example-generic" data-slide-to="' . $i . '"></li>';
                }
            }
            ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
            $cont = 0;
            while ($data = mysqli_fetch_array($queryCarousel)) {
                if ($cont == 0) { ?>
                    <div class="item active">
                    <?php } else { ?>
                        <div class="item">
                        <?php } ?>
                        <img class="carousel-height wd-100 m-auto" src="<?= $data['path'] ?>" alt="<?= $data['name'] ?>">
                        </div>
                    <?php
                    $cont++;
                }
                    ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
        </div>


    </div>