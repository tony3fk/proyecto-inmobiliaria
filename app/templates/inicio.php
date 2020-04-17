<?php ob_start() ?>

<div class=" col-12 " id="inicio">

    <div id="fondoInicio" class="jumbotron h-100 row">

        <form class="form-horizontal justify-content-center col-12" action="index.php?ctl=buscarConParametros"
            method="POST">
            <fieldset style="margin-top: 9rem">

                <!-- Form Name -->
                <h1 class="h1-responsive font-weight-bold text-center text-warning ">¿Qué estás buscando?</h1>
                <br>
                <br>

                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group row justify-content-center">
                    <div class="col-5">
                        <h5 class="control-label text-warning text-md-right text-sm-left font-weight-bold"
                            for="radiobutton">Operación
                        </h5>
                    </div>

                    <div class="col-2 text-center">
                        <h5 class="checkbox-inline text-light  " for="radiobutton">
                            <input type="radio" name="operacion" id="radiobutton" value="Venta" checked>Venta
                        </h5>


                    </div>
                    <div class="col-5">
                        <h5 class="checkbox-inline text-light" for="radiobutton">
                            <input type="radio" name="operacion" id="radiobutton" value="Alquiler">
                            Alquiler
                        </h5>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group row justify-content-center">
                    <div class="col-3 col-md-2 ">
                        <h5 class=" control-label text-warning text-center font-weight-bold " for=" tipo">Tipo</h5>
                    </div>

                    <div class="col-9 col-md-5 col-xl-3">
                        <select id="selectTipo" name="tipo" class="form-control">
                            <option value="%">Todos</option>
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
                <div class="form-group row justify-content-center">
                    <div class="col-3 col-md-2">
                        <h5 class=" control-label text-warning text-center font-weight-bold" for="provincia">Provincia
                        </h5>
                    </div>

                    <div class="col-9 col-md-5 col-xl-3">
                        <select id="selectProvincia" name="provincia" class="form-control">
                            <option value='%'>Todas</option>
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
                <div class="form-group row justify-content-center">
                    <!-- <div class="col-md-5 control-label text-center"></div> -->

                    <div class="col-6 col-md-5 col-xl-3">
                        <button type="submit" class="btn btn-warning col-12" name="bSubmitInicio">Enviar</button>
                    </div>

                </div>

            </fieldset>
        </form>
    </div>



</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
