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
        <div class="col-12 col-xl-6 m-auto ">
            <a href="<?php echo $params['imagen']; ?>" target="_blank">
                <img class="w-100 img-thumbnail" src="<?php echo $params['imagen']; ?>">
            </a>
        </div>


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
