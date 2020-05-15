<?php ob_start() ?>

<div class="container">

    <h3 class="text-center"> Ha habido un error </h3>
    <h5 class="text-center alert alert-danger" role="alert">
        <?php echo $_SESSION['mensaje'];
        $_SESSION['mensaje'] = ''; ?>
    </h5>
</div>



<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
