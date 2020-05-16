<?php ob_start() ?>

<div class="container" style="height: 50em;">

    <br><br>


    <h3 class="text-center alert alert-danger" role="alert">
        <?php echo $_GET['msg'];
        ?>
    </h3>

    <div class="text-center">
        <input class="btn btn-primary " type="button" onclick="history.back()" name="volver" value="Volver">

    </div>

</div>



<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
