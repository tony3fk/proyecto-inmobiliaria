<?php ob_start() ?>

<div class="row">

    <h3> Ha habido un error </h3>
    <h2><?php echo $_SESSION['mensaje']; ?></h2>



    <?php $contenido = ob_get_clean() ?>

    <?php include 'layout.php' ?>
