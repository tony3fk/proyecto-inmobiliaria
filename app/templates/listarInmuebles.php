<?php ob_start(); ?>

<!-- Listar inmuebles para el admin desde el menú de admin -->

<div class="container-fluid mt-2">
    <h3 class="text-center">Gestión de inmuebles</h3>

    <?php

    if (isset($_GET['borrado'])) {

        echo '<h2 class="text-danger bg-warning text-center">';
        echo $_GET['borrado'];
        echo "</h2>";
    } ?>


    <table id="tabla" class="table table-hover table-bordered table-sm " cellspacing="0" width="100%">

        <thead class="thead-dark">
            <tr>
                <th class="th-sm text-center">REF</th>
                <th class="th-sm text-center">FECHA_ALTA</th>
                <th class="th-sm text-center">TIPO</th>
                <th class="th-sm text-center">OPERACION</th>
                <th class="th-sm text-center">PROVINCIA</th>
                <th class="th-sm text-center">SUPERFICIE</th>
                <th class="th-sm text-center">PRECIO</th>
                <th class="th-sm text-center">IMAGENES</th>
                <th class="th-sm text-center">EDITAR</th>
                <th class="th-sm text-center">ELIMINAR</th>




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
                <div class="row justify-content-start m-1">

                    <?php
                            $arrayImg = json_decode($inmuebles['imagen'], true);

                            if (json_last_error() === JSON_ERROR_NONE) {
                                foreach ($arrayImg as $img) {
                                    ?>
                    <div class="d-inline p-2">
                        <a href="<?php echo $img ?>" target="_blank" class="thumb"> <img src="<?php echo $img ?>" alt="thumb" style="width:5rem;"></a>
                        <?php }
                                    } else { ?>
                        <a href="<?php echo $inmuebles['imagen'] ?>" target="_blank" class="thumb"><img src="<?php echo $inmuebles['imagen'] ?>" alt="thumb" style="width:5rem;"></a>
                        <?php } ?>
                    </div>
                </div>

            </td>


            <td class="text-center">
                <a href="index.php?ctl=editarInmuebles&id=<?php echo $inmuebles['referencia'] ?>" class="btn btn-outline-warning w-100" target="_blank">Editar Registro</a>
            </td>
            <td class="text-center">
                <a href="index.php?ctl=eliminarInmuebles&id=<?php echo $inmuebles['referencia'] ?>" class=" btnEliminar btn btn-outline-danger w-100">Eliminar Registro</a>

            </td>
        </tr>
        <?php

        }
        ?>
    </table>
</div>
<script src="./app/libs/sortTables.js"></script>



<?php $contenido = ob_get_clean(); ?>

<?php include 'layout.php' ?>
