<?php ob_start() ?>
<div class="container-fluid">
    <div class="row">
        <img class="col-6" src="../app/images/<?php echo $params['referencia'] . ".jpeg"; ?>">


        <table class="col-4 bg-light  ml-5">
            <tr>
                <td>
                    <h1>Ref: <?php echo $params['referencia'] ?></h1>
                </td>
            </tr>


            <tr>
                <td>fecha_alta</td>
                <td><?php echo $params['fecha_alta'] ?></td>

            </tr>
            <tr>
                <td>Tipo &nbsp;</td>
                <td><?php echo $params['tipo'] ?></td>

            </tr>
            <tr>
                <td>operacion</td>
                <td><?php echo $params['operacion'] ?></td>

            </tr>
            <tr>
                <td>Provincia</td>
                <td><?php echo $params['provincia'] ?></td>

            </tr>
            <tr>
                <td>superficie</td>
                <td><?php echo $params['superficie'] . " m2" ?></td>

            </tr>
            <tr>
                <td>precio</td>
                <td><?php echo "" . number_format($params['precio_venta'], 2, ',', '.') . " €" ?></td>

            </tr>

        </table>
    </div>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
