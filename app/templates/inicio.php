<?php ob_start() ?>

<div class=" col-md-12 " id="inicio" style="height: 45rem">
    <!-- <img src="../app/images/inicio.jpg" alt="ImagenInicio" id="imagenInicio"> -->





    <div class="jumbotron h-100" style="background-image: url(../app/images/inicio.jpg); background-size: cover; ">

        <form class="form-horizontal" action="index.php?ctl=inicio" method="POST">
            <fieldset style="margin-top: 9rem">

                <!-- Form Name -->
                <h2 class="h1-responsive font-weight-bold text-center text-warning ">¿Qué estás buscando?</h2>
                <br>

                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group row">
                    <h6 class="col-md-5 control-label text-right text-warning" for="radiobutton">Operación</h6>
                    <div class="col-md-4">
                        <label class="checkbox-inline text-light" for="radiobutton">
                            <input type="radio" name="operacion" id="radiobutton" value="Venta">
                            Venta
                        </label>
                        &nbsp;
                        <label class="checkbox-inline text-light" for="radiobutton">
                            <input type="radio" name="operacion" id="radiobutton" value="Alquiler">
                            Alquiler
                        </label>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group row">
                    <h6 class="col-md-5 control-label text-right text-warning " for="tipo">Tipo</h6>
                    <div class="col-md-2">
                        <select id="selectTipo" name="tipo" class="form-control">
                            <option value="">Todos</option>
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
                    <h6 class="col-md-5 control-label text-right text-warning" for="provincia">Provincia</h6>
                    <div class="col-md-2">
                        <select id="selectProvincia" name="provincia" class="form-control">
                            <option value=''>Todas</option>
                            <option value='Alava'>Álava</option>
                            <option value='Albacete'>Albacete</option>
                            <option value='Alicante'>Alicante/Alacant</option>
                            <option value='Almeria'>Almería</option>
                            <option value='Asturias'>Asturias</option>
                            <option value='Avila'>Ávila</option>
                            <option value='Badajoz'>Badajoz</option>
                            <option value='Barcelona'>Barcelona</option>
                            <option value='Burgos'>Burgos</option>
                            <option value='Caceres'>Cáceres</option>
                            <option value='Cadiz'>Cádiz</option>
                            <option value='Cantabria'>Cantabria</option>
                            <option value='Castellon'>Castellón/Castelló</option>
                            <option value='Ceuta'>Ceuta</option>
                            <option value='Ciudadreal'>Ciudad Real</option>
                            <option value='Cordoba'>Córdoba</option>
                            <option value='Cuenca'>Cuenca</option>
                            <option value='Girona'>Girona</option>
                            <option value='Laspalmas'>Las Palmas</option>
                            <option value='Granada'>Granada</option>
                            <option value='Guadalajara'>Guadalajara</option>
                            <option value='Guipuzcoa'>Guipúzcoa</option>
                            <option value='Huelva'>Huelva</option>
                            <option value='Huesca'>Huesca</option>
                            <option value='Illesbalears'>Illes Balears</option>
                            <option value='Jaen'>Jaén</option>
                            <option value='Acoruña'>A Coruña</option>
                            <option value='Larioja'>La Rioja</option>
                            <option value='Leon'>León</option>
                            <option value='Lleida'>Lleida</option>
                            <option value='Lugo'>Lugo</option>
                            <option value='Madrid'>Madrid</option>
                            <option value='Malaga'>Málaga</option>
                            <option value='Melilla'>Melilla</option>
                            <option value='Murcia'>Murcia</option>
                            <option value='Navarra'>Navarra</option>
                            <option value='Ourense'>Ourense</option>
                            <option value='Palencia'>Palencia</option>
                            <option value='Pontevedra'>Pontevedra</option>
                            <option value='Salamanca'>Salamanca</option>
                            <option value='Segovia'>Segovia</option>
                            <option value='Sevilla'>Sevilla</option>
                            <option value='Soria'>Soria</option>
                            <option value='Tarragona'>Tarragona</option>
                            <option value='Santacruztenerife'>Santa Cruz de Tenerife</option>
                            <option value='Teruel'>Teruel</option>
                            <option value='Toledo'>Toledo</option>
                            <option value='Valencia'>Valencia/Valéncia</option>
                            <option value='Valladolid'>Valladolid</option>
                            <option value='Vizcaya'>Vizcaya</option>
                            <option value='Zamora'>Zamora</option>
                            <option value='Zaragoza'>Zaragoza</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-md-5 control-label text-center"></div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning col-12" name="bSubmitInicio">Enviar</button>
                    </div>

                </div>

            </fieldset>
        </form>
    </div>



</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
