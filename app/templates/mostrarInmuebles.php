<?php ob_start() ?>

<table>
    <tr>
        <th>Referencia</th>
        <th>Fecha_alta</th>
        <th>tipo</th>
        <th>operacion</th>
        <th>provincia</th>
        <th>superficie</th>
        <th>precio_venta</th>
    </tr>
    <?php foreach ($params['inmuebles'] as $inmuebles) : ?>
    <tr>
        <td><a
                href="index.php?ctl=verInmueble&referencia=<?php echo $inmuebles['referencia'] ?>"><?php echo $inmuebles['referencia'] ?></a>
        </td>
        <td><?php echo $inmuebles['fecha_alta'] ?></td>
        <td><?php echo $inmuebles['tipo'] ?></td>
        <td><?php echo $inmuebles['operacion'] ?></td>
        <td><?php echo $inmuebles['provincia'] ?></td>
        <td><?php echo $inmuebles['superficie'] ?></td>
        <td><?php echo $inmuebles['precio_venta'] ?></td>

    </tr>
    <?php endforeach; ?>

</table>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
