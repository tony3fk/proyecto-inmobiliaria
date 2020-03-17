<?php ob_start() ?>

<div class="row">
    <h1>Hola <?php echo $_SESSION['nombre'] ?></h1>
    <h3> Fecha: <?php echo date('d-m-Y', time()) ?> </h3>

    <?php if (isset($params['mensajeError'])) : ?>
    <div class="alert alert-danger">
        <h5><strong>Lo siento. </strong> <?php echo $params['mensajeError'] ?></h5>
    </div>
    <?php endif; ?>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
