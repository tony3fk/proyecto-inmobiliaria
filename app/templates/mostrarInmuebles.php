<?php ob_start() ?>


<!-- Grid column -->

<div class="row m-3"></div>

<div class="row col-12">


    <?php foreach ($params['inmuebles'] as $inmuebles) : ?>


    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
        <!-- Card Dark -->
        <div class="card" id="card">

            <!-- Card image -->
            <div class="embed-responsive embed-responsive-4by3">

                <img class="card-img-top embed-responsive-item img-thumbnail  mx-auto d-block" src="
                <?php
                    $string = json_decode($inmuebles['imagen']);
                    if (json_last_error() == JSON_ERROR_NONE) {
                        $arrayImgs = json_decode($inmuebles['imagen'], true);
                        echo $arrayImgs[0];
                    } else {
                        echo $inmuebles['imagen'];
                    }



                    ?>" alt="Card image cap" id="img-inmueble">

            </div>

            <!-- Card content -->
            <div class="card-body ">



                <!-- Title  -->
                <h4 class="card-title">Precio:
                    <?php
                            if ($inmuebles['operacion'] == "Alquiler") {
                                echo number_format(substr($inmuebles['precio_venta'], 1, 4), 2, ',', '.') . " €/mes";
                            } else {
                                echo number_format($inmuebles['precio_venta'], 2, ',', '.') . " €";
                            }
                            ?>



                </h4>


                <hr class="hr-light">
                <!-- Text -->

                <h6 class="card-text   ">Provincia: <?php echo $inmuebles['provincia'] ?></h6>

                <p class="card-text  "><?php echo $inmuebles['tipo'] . " en " . $inmuebles['operacion'] ?>
                </p>
                <!-- Link -->
                <div class="text-right">
                    <a href="index.php?ctl=verInmueble&referencia=<?php echo $inmuebles['referencia'] ?>" class="btn btn-warning" target="_blank">
                        <h5>Más info. </h5>
                    </a>
                </div>


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
