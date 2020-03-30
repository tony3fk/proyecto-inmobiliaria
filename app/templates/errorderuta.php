<?php ob_start() ?>

<div class="row">

    <h3> La ruta no existe. </h3>



    <?php $contenido = ob_get_clean() ?>

    <?php include 'layout.php' ?>
