<?php ob_start() ?>
<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-12 col-xl-6 m-auto ">
            <a href="<?php echo $params['imagen']; ?>" target="_blank">
                <img class="w-100 img-thumbnail" src="<?php echo $params['imagen']; ?>">
            </a>
        </div>


        <div id="fichaInmueble" class=" col- 12 col-xl-6  m-auto">
            <button type="button" class="btn btn-lg btn-warning w-25" onClick=goback()><i
                    class="fa fa-arrow-left"></i></button>
            <h1 class="text-center">Ref: <?php echo $params['referencia'] ?></h1>
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
