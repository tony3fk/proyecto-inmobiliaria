<?php ob_start() ?>

<div class="row" id="inicio">
    <img src="../app/images/inicio.jpg" alt="ImagenInicio" id="imagenInicio">

    <?php if (isset($params['mensajeError'])) : ?>
    <div class="alert alert-danger">
        <h5><strong>Lo siento. </strong> <?php echo $params['mensajeError'] ?></h5>
    </div>
    <?php endif; ?>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
