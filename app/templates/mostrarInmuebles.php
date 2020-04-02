<?php ob_start() ?>


<!-- Grid column -->
<div class="row">


    <?php foreach ($params['inmuebles'] as $inmuebles) : ?>


    <div class="col-xl-3 col-lg-4 col-md-6 col-xs-12" id="card">
        <!-- Card Dark -->
        <div class="card">

            <!-- Card image -->
            <div class="embed-responsive embed-responsive-4by3">

                <img class="card-img-top embed-responsive-item"
                    src="../app/images/<?php echo $inmuebles['referencia'] . ".jpeg"; ?>" alt="Card image cap"
                    id="img-inmueble">

            </div>

            <!-- Card content -->
            <div class="card-body ">


                <!-- Title -->
                <h4 class="card-title">Precio:
                    <?php echo number_format($inmuebles['precio_venta'], 2, ',', '.') . " €" ?>
                </h4>


                <hr class="hr-light">
                <!-- Text -->

                <h6 class="card-text   ">Provincia: <?php echo $inmuebles['provincia'] ?></h6>

                <p class="card-text  "><?php echo $inmuebles['tipo'] . " en " . $inmuebles['operacion'] ?>
                </p>
                <!-- Link -->
                <a href="index.php?ctl=verInmueble&referencia=<?php echo $inmuebles['referencia'] ?>"
                    class="btn btn-primary">
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
