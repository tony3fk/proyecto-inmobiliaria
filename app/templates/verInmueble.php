<?php ob_start() ?>

<h1><?php echo $params['referencia'] ?></h1>
<table border="1">

    <tr>
        <td>fecha_alta</td>
        <td><?php echo $params['fecha_alta'] ?></td>

    </tr>
    <tr>
        <td>Tipo</td>
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
        <td>precio_venta</td>
        <td><?php echo $params['precio_venta'] . " €" ?></td>

    </tr>

</table>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
