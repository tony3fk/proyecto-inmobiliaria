<?php ob_start(); ?>




<div class="container">

    <?php
    if (isset($_GET['borrado'])) {

        echo '<h2 class="text-danger bg-warning">';
        echo " Entrada eliminada";
        echo "</h2>";
    } ?>


    <table class="table table-striped">

        <thead>
            <tr>
                <th>REF</th>
                <th>FECHA_ALTA</th>
                <th>TIPO</th>
                <th>OPERACION</th>
                <th>PROVINCIA</th>
                <th>SUPERFICIE</th>
                <th>PRECIO</th>



            </tr>
        </thead>
        <?php
        foreach ($params['inmuebles'] as $inmuebles) { // aquí hago la consulta la itero con each. 
        ?>
        <tr>

            <td><?php echo $inmuebles['referencia'] ?></td>
            <td><?php echo $inmuebles['fecha_alta'] ?></td>
            <td><?php echo $inmuebles['tipo'] ?></td>
            <td><?php echo $inmuebles['operacion'] ?></td>
            <td><?php echo $inmuebles['provincia'] ?></td>
            <td><?php echo $inmuebles['superficie'] ?></td>
            <td><?php echo $inmuebles['precio_venta'] ?></td>

            <td>
                <a href="index.php?ctl=eliminarInmuebles&id=<?php echo $inmuebles['referencia'] ?>"
                    class="btn btn-outline-danger">Eliminar</a>
            </td>
        </tr>
        <?php

            // $id = extract($_GET);

            // if (@$idborrar == 2) {

            //     header('location:index.php?ctl=eliminarInmuebles?id=$id');




            //     echo '<script>alert("ELIMINADO")</script> ';
            //     echo "<script>location.href='/templates/listarInmuebles.php'</script>";
            // }
        }
        ?>
    </table>
</div>












<?php $contenido = ob_get_clean(); ?>

<?php include 'layout.php' ?>
