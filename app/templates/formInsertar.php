<?php ob_start() ?>

<?php if (isset($params['mensaje'])) : ?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<br />
<form name="formInsertar" action="index.php?ctl=insertar" method="POST">
    <table>
        <tr>
            <th>Tipo</th>
            <th>Operación</th>
            <th>Provincia</th>
            <th>Superficie</th>
            <th>Precio Venta</th>

        </tr>
        <tr>
            <td><input type="text" name="tipo" value="<?php echo $params['tipo'] ?>" /></td>
            <td><input type="text" name="operacion" value="<?php echo $params['operacion'] ?>" /></td>
            <td><input type="text" name="provincia" value="<?php echo $params['provincia'] ?>" /></td>
            <td><input type="text" name="superficie" value="<?php echo $params['superficie'] ?>" /></td>
            <td><input type="text" name="precio_venta" value="<?php echo $params['precio_venta'] ?>" /></td>

        </tr>

    </table>
    <input type="submit" value="insertar" name="insertar" />
</form>
* Los valores deben referirse a 100 g del alimento

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
