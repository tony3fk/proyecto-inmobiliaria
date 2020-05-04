<?php ob_start(); ?>




<div class="container-fluid">

    <?php
    if (isset($_GET['borrado'])) {

        echo '<h2 class="text-danger bg-warning">';
        echo " Usuario eliminado";
        echo "</h2>";
    } ?>


    <table id="tabla" class="table table-hover table-bordered table-sm " cellspacing="0" width="100%">

        <thead class="thead-dark">
            <tr>
                <th class="th-sm text-center">ID</th>
                <th class="th-sm text-center">NOMBRE</th>
                <th class="th-sm text-center">EMAIL</th>
                <th class="th-sm text-center">PASSWORD</th>
                <th class="th-sm text-center">TIPO</th>
                <th class="th-sm text-center">CIUDAD</th>
                <th class="th-sm text-center">AVATAR</th>
                <th class="th-sm text-center"></th>



            </tr>
        </thead>
        <?php
        foreach ($params['usuarios'] as $usuarios) { // aquí hago la consulta la itero con each. 
        ?>
        <tr>

            <td><?php echo $usuarios['id'] ?></td>
            <td><?php echo $usuarios['nombre'] ?></td>
            <td><?php echo $usuarios['email'] ?></td>
            <td><?php echo "******" /*$usuarios['password']*/ ?></td>
            <td><?php echo $usuarios['tipo'] ?></td>
            <td><?php echo $usuarios['ciudad'] ?></td>
            <td><a href="<?php echo $usuarios['avatar'] ?>"><?php echo $usuarios['avatar'] ?></a></td>
            <td class="text-center">
                <a href="index.php?ctl=eliminarUsuario&id=<?php echo $usuarios['id'] ?>" class="btnEliminar btn btn-outline-danger w-100">Eliminar Registro</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>



<?php $contenido = ob_get_clean(); ?>

<?php include 'layout.php' ?>
