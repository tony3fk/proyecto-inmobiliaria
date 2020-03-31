<?php ob_start(); ?>




<div class="container">

    <?php
    if (isset($_GET['borrado'])) {

        echo '<h2 class="text-danger bg-warning">';
        echo " Usuario eliminado";
        echo "</h2>";
    } ?>


    <table class="table table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>TIPO</th>
                <th>CIUDAD</th>


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
            <td>
                <a href="index.php?ctl=eliminarUsuario&id=<?php echo $usuarios['id'] ?>"
                    class="btn btn-outline-danger">Eliminar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>



<?php $contenido = ob_get_clean(); ?>

<?php include 'layout.php' ?>
