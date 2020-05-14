<?php ob_start() ?>

<?php if (isset($params['mensaje'])) : ?>
<b><span style="color: red;"><?php echo $params['mensaje'];
                                        $params['mensaje'] = ""; ?></span></b>
<?php endif; ?>
<br />

<div class="container ">
    <br>
    <form name="formInsertar" action="index.php?ctl=insertar" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Tipo</label>
            <select class="form-control" id="FormControlSelect1" name="tipo" required>
                <option value="<?php echo $params['tipo'] ?>"><?php echo $params['tipo'] ?></option>
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
                <option value="<?php echo $params['operacion'] ?>"><?php echo $params['operacion'] ?></option>
                <option value="Venta">Venta</option>
                <option value="Alquiler">Alquiler</option>
            </select>

        </div>


        <div class="form-group">
            <label>Provincia</label>
            <select class="form-control" id="FormControlSelect3" name="provincia" required>
                <option value="<?php echo $params['provincia'] ?>"><?php echo $params['provincia'] ?></option>
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
            <input type="number" class="form-control" name="superficie" aria-describedby="SuperficieHelp" value="<?php echo $params['superficie'] ?>" required>
        </div>

        <div class="form-group">
            <label>Precio (€)</label>
            <input type="number" class="form-control" name="precio_venta" aria-describedby="tipoHelp" value="<?php echo $params['precio_venta'] ?>" required>
        </div>
        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name="imagen[]" id="imagen" multiple />
        </div>



        <br>
        <input type="submit" class="btn btn-primary" value="insertar" name="insertar" />
    </form>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
