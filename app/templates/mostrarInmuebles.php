<?php ob_start() ?>


<!-- Grid column -->
<div class="row">
    <?php foreach ($params['inmuebles'] as $inmuebles) : ?>


    <div class="col-md-4 col-12 col-sm-6">
        <!-- Card Dark -->
        <div class="card id=" card">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="../app/images/<?php echo $inmuebles['referencia'] . ".jpeg"; ?>"
                    alt="Card image cap" id="img-inmueble">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body elegant-color white-text rounded-bottom ">


                <!-- Title -->
                <h4 class="card-title">Precio:
                    <?php echo number_format($inmuebles['precio_venta'], 2, ',', '.') . " €" ?>
                </h4>
                <hr class="hr-light">
                <!-- Text -->

                <h6 class="card-text white-text mb-4 ">Provincia: <?php echo $inmuebles['provincia'] ?></h6>

                <p class="card-text white-text mb-4"><?php echo $inmuebles['tipo'] . " en " . $inmuebles['operacion'] ?>
                </p>
                <!-- Link -->
                <a href="index.php?ctl=verInmueble&referencia=<?php echo $inmuebles['referencia'] ?>"
                    class="white-text d-flex justify-content-end">
                    <h5>Más info. </h5>
                </a>

            </div>

        </div>
        <br>
        <!-- Card Dark -->

    </div>

    <br>


    <?php endforeach; ?>


</div>
<!-- Grid column -->



<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
