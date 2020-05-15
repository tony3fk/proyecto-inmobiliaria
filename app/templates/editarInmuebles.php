<?php ob_start(); ?>


<?php
$referencia = $_GET['ref'];
$tipo = $_GET['tipo'];
$operacion = $_GET['operacion'];
$provincia = $_GET['provincia'];
$superficie = $_GET['superficie'];
$precio_venta = $_GET['precio_venta'];
$imagen = unserialize($_GET['imagen']);

// !is_array($imagen) ? $imagen = $_GET['imagen'] : true;

?>



<div class="container mb-5">
    <br>
    <form name="formInsertar" action="index.php?ctl=updateInmueble" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Ref: </label>
            <input type="text" name="referencia" value="<?php echo $referencia ?>" readonly class="bg-warning text-center col-1"></input>
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <select class="form-control" id="FormControlSelect1" name="tipo" required>
                <option default value="<?php echo $tipo ?>"><?php echo $tipo ?></option>
                <option value="Parking">Parking</option>
                <option value="Local">Local</option>
                <option value="Oficina">Oficina</option>
                <option value="Suelo">Suelo</option>
                <option value="Industrial">Industrial</option>
                <option value="Casa">Casa</option>
                <option value="Piso">Piso</option>
            </select>
        </div>

        <div class="form-group">
            <label>Operación</label>
            <select class="form-control" id="FormControlSelect2" name="operacion" required>
                <option default value="<?php echo $operacion ?>"><?php echo $operacion ?></option>
                <option value="Venta">Venta</option>
                <option value="Alquiler">Alquiler</option>
            </select>

        </div>


        <div class="form-group">
            <label>Provincia</label>
            <select class="form-control" id="FormControlSelect3" name="provincia" required>
                <option default value="<?php echo $provincia ?>"><?php echo $provincia ?></option>
                <option value='alava'>Álava</option>
                <option value='albacete'>Albacete</option>
                <option value='alicante'>Alicante/Alacant</option>
                <option value='almeria'>Almería</option>
                <option value='asturias'>Asturias</option>
                <option value='avila'>Ávila</option>
                <option value='badajoz'>Badajoz</option>
                <option value='barcelona'>Barcelona</option>
                <option value='burgos'>Burgos</option>
                <option value='caceres'>Cáceres</option>
                <option value='cadiz'>Cádiz</option>
                <option value='cantabria'>Cantabria</option>
                <option value='castellon'>Castellón/Castelló</option>
                <option value='ceuta'>Ceuta</option>
                <option value='ciudadreal'>Ciudad Real</option>
                <option value='cordoba'>Córdoba</option>
                <option value='cuenca'>Cuenca</option>
                <option value='girona'>Girona</option>
                <option value='laspalmas'>Las Palmas</option>
                <option value='granada'>Granada</option>
                <option value='guadalajara'>Guadalajara</option>
                <option value='guipuzcoa'>Guipúzcoa</option>
                <option value='huelva'>Huelva</option>
                <option value='huesca'>Huesca</option>
                <option value='illesbalears'>Illes Balears</option>
                <option value='jaen'>Jaén</option>
                <option value='acoruña'>A Coruña</option>
                <option value='larioja'>La Rioja</option>
                <option value='leon'>León</option>
                <option value='lleida'>Lleida</option>
                <option value='lugo'>Lugo</option>
                <option value='madrid'>Madrid</option>
                <option value='malaga'>Málaga</option>
                <option value='melilla'>Melilla</option>
                <option value='murcia'>Murcia</option>
                <option value='navarra'>Navarra</option>
                <option value='ourense'>Ourense</option>
                <option value='palencia'>Palencia</option>
                <option value='pontevedra'>Pontevedra</option>
                <option value='salamanca'>Salamanca</option>
                <option value='segovia'>Segovia</option>
                <option value='sevilla'>Sevilla</option>
                <option value='soria'>Soria</option>
                <option value='tarragona'>Tarragona</option>
                <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                <option value='teruel'>Teruel</option>
                <option value='toledo'>Toledo</option>
                <option value='valencia'>Valencia/Valéncia</option>
                <option value='valladolid'>Valladolid</option>
                <option value='vizcaya'>Vizcaya</option>
                <option value='zamora'>Zamora</option>
                <option value='zaragoza'>Zaragoza</option>
            </select>

        </div>

        <div class="form-group">
            <label>Superficie (m2)</label>
            <input type="number" class="form-control" name="superficie" aria-describedby="SuperficieHelp" value="<?php echo $superficie ?>" required>
        </div>

        <div class="form-group">
            <label>Precio (€)</label>
            <input type="number" class="form-control" name="precio_venta" aria-describedby="tipoHelp" value="<?php echo $precio_venta ?>" required>
        </div>
        <div class="form-group">

            <?php if (is_array($imagen)) {  ?>

            <?php foreach ($imagen as $img) { ?>
            <a href="<?php echo $img ?>">
                <img class="img-responsive" style="width:12em; height:7em" src="<?php echo $img ?>" alt="imagen">
            </a>

            <?php }
                } else { ?>
            <a href="<?php echo $img ?>">
                <img class="img-responsive" style="width:12em; height:7em" src="<?php echo $imagen ?>" alt="imagen">
            </a>

            <?php } ?>


            <br><br>

            <label>Modificar imágenes? </label>
            <input type="file" name="imagen[]" id="imagen" accept="image/png, image/jpeg, image/jpg, image/gif" multiple />

        </div>



        <br>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" value="Actualizar" name="update" />
            <input type="button" onclick="javascript:history.go(-1)" class="btn btn-danger" value="Cancelar" name="cancel" />
        </div>

    </form>



</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
