<?php ob_start(); ?>


<script></script>

<div class="container">
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
            <td><?php echo $usuarios['password'] ?></td>
            <td><?php echo $usuarios['tipo'] ?></td>
            <td><?php echo $usuarios['ciudad'] ?></td>
            <td>
                <button type="button" class="btn btn-outline-danger">Eliminar</button>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>










<?php $contenido = ob_get_clean(); ?>

<?php include 'layout.php' ?>
