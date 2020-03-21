<?php ob_start() ?>

<form name="formBusqueda" action="index.php?ctl=buscarPorProvincia" method="POST">

    <table>
        <tr>
            <td>Provincia:</td>
            <td><input type="text" name="provincia" value="<?php echo $params['provincia'] ?>">(puedes utilizar '%' como
                comodín)</td>

            <td><input type="submit" value="buscar" name="buscar"></td>
        </tr>
    </table>

    </table>

</form>

<?php if (count($params['resultado']) > 0) : ?>
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
    <?php foreach ($params['resultado'] as $inmuebles) : ?>
    <tr>
        <td><a href="index.php?ctl=verInmueble&referencia=<?php echo $inmuebles['referencia'] ?>">
                <?php echo $inmuebles['referencia'] ?>
            </a>
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
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
