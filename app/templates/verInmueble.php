<?php ob_start() ?>
<div class="container-fluid">
    <br>
    <div class="row justify-content-around">
        <div class="col-1 ">
            <a href="index.php?ctl=verInmueble&referencia=<?php echo $params['referencia'] - 1; ?>" type="button" class="btn btn-lg btn-outline-warning w-100">
                <i class="text-dark fa fa-angle-double-left"></i>
            </a>
        </div>
        <div class="col-1">
            <a type="button" class="btn btn-outline-secondary " href="index.php?ctl=inicio"><i class="fa fa-search"></i></a>
        </div>
        <div class="col-1">
            <a href="index.php?ctl=verInmueble&referencia=<?php echo $params['referencia'] + 1; ?>" type="button" class="btn btn-lg btn-outline-warning w-100">
                <i class="text-dark fa fa-angle-double-right"></i>
            </a>
        </div>


    </div>
    <br>
    <div class="row">

        <!-- imagen -->
        <!-- <div class="col-12 col-xl-6 m-auto "> -->
        <!-- <a href="<?php //echo $params['imagen']; 
                        ?>" target="_blank">
                <img class="w-100 img-thumbnail" src="<?php //echo $params['imagen']; 
                                                        ?>">
            </a> -->
        <div id="carouselExampleIndicators" class="carousel slide col-12 col-xl-6 m-auto " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner">

                <?php //for ($i = 0; $i <= count($params['imagen']); $i++) { 
                ?>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo $params['imagen'][0]; ?>" alt="First slide">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="<?php echo $params['imagen'][1]; ?>" alt="First slide">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="<?php echo $params['imagen'][2]; ?>" alt="First slide">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="<?php echo $params['imagen'][3]; ?>" alt="First slide">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="<?php echo $params['imagen'][4]; ?>" alt="First slide">
                </div>
                <?php //} 
                ?>
                <!-- <div class="carousel-item">
                        <img class="d-block w-100" src="..." alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="..." alt="Third slide">
                    </div> -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- </div> -->
        <!-- fin imagen -->


        <div id="fichaInmueble" class=" col- 12 col-xl-6  mt-1">

            <h1 class="text-center">Ref: <?php echo $params['referencia'] ?></h1>

            <!--Implantar siguiente registro -->
            <table class="bg-light table-striped ">

                <tr>
                    <td>Fecha de alta</td>
                    <td><?php echo $params['fecha_alta'] ?></td>

                </tr>
                <tr>
                    <td>Tipo &nbsp;</td>
                    <td><?php echo $params['tipo'] ?></td>

                </tr>
                <tr>
                    <td>Operación</td>
                    <td><?php echo $params['operacion'] ?></td>

                </tr>
                <tr>
                    <td>Provincia</td>
                    <td><?php echo $params['provincia'] ?></td>

                </tr>
                <tr>
                    <td>Superficie</td>
                    <td><?php echo $params['superficie'] . " m2" ?></td>

                </tr>
                <tr>
                    <td>Precio</td>
                    <td><?php echo "" . number_format($params['precio_venta'], 2, ',', '.') . " €" ?></td>

                </tr>

                <?php $displayNone = '';
                if ($_COOKIE['tipo'] != 2) {
                    $displayNone = 'd-none';
                }
                ?>
                <tr>
                    <td class="text-center">
                        <a href="index.php?ctl=editarInmuebles&id=<?php echo $params['referencia'] ?>" class="btn btn-warning w-25 <?php echo $displayNone ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>

                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>
<script>
function goback() {
    history.go(-2);
}
</script>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
