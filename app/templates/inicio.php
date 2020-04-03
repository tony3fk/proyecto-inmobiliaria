<?php ob_start() ?>

<div class=" col-md-12 " id="inicio">
    <!-- <img src="../app/images/inicio.jpg" alt="ImagenInicio" id="imagenInicio"> -->





    <div class="jumbotron ">

        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <h2 class="h1-responsive font-weight-bold text-center ">¿Qué estás buscando?</h2>
                <br>

                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group row">
                    <label class="col-md-7 control-label text-center" for="checkboxes">Operación</label>
                    <div class="col-md-4">
                        <label class="checkbox-inline" for="checkboxes-0">
                            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="Comprar">
                            Comprar
                        </label>
                        &nbsp;
                        <label class="checkbox-inline" for="checkboxes-1">
                            <input type="checkbox" name="checkboxes" id="checkboxes-1" value="Alquilar">
                            Alquilar
                        </label>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group row">
                    <label class="col-md-7 control-label text-center" for="selectbasic">Tipo</label>
                    <div class="col-md-2">
                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="Parking">Parking</option>
                            <option value="Local">Local</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Suelo">Suelo</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Piso">Piso</option>
                            <option value="Casa">Casa</option>
                        </select>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group row">
                    <label class="col-md-7 control-label text-center" for="selectbasic">Provincia</label>
                    <div class="col-md-2">
                        <select id="selectbasic" name="selectbasic" class="form-control">
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
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-md-5 control-label text-center" for="selectbasic"></div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary col-12">Submit</button>
                    </div>

                </div>

            </fieldset>
        </form>
    </div>







    <?php if (isset($params['mensajeError'])) : ?>
    <div class="alert alert-danger">
        <h5><strong>Lo siento. </strong> <?php echo $params['mensajeError'] ?></h5>
    </div>
    <?php endif; ?>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
