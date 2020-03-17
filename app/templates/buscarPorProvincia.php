<?php ob_start() ?>

<form name="formBusqueda" action="index.php?ctl=buscarPorProvincia" method="POST">

    <table>
        <tr>
            <td>Provincia:</td>
            <td><input type="text" name="provincia" value="<?php echo $params['provincia'] ?>">(puedes utilizar '%' como
                comodín)</td>

            <td><input type="submit" value="buscar"></td>
        </tr>
    </table>

    </table>

</form>

<?php if (count($params['resultado']) > 0) : ?>
<table>
    <tr>
        <th>Tipo:</th>
        <th>Operación:</th>
        <th>Superficie:</th>
        <th>Precio venta:</th>
    </tr>
    <?php foreach ($params['resultado'] as $inmueble) : ?>
    <tr>
        <td><a href="index.php?ctl=verInmueble&referencia=<?php echo $inmueble['referencia'] ?>">
                <?php echo $inmueble['tipo'] ?></a></td>
        <td><?php echo $inmueble['operacion'] ?></td>
        <td><?php echo $inmueble['superficie'] ?></td>
        <td><?php echo $inmueble['precio_venta'] ?></td>
    </tr>
    <?php endforeach; ?>

</table>
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
