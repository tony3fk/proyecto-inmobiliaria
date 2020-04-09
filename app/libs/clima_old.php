<?php
function weather($ciudad)
{
    $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $ciudad . ",es&appid=96edde9f7c64ae00b99322b16b678542";
    $json = file_get_contents($url);

    $weather = json_decode($json);
    $kelvin = $weather->main->temp;
    $celsius = $kelvin - 273.15; //la API devuelve la temperatura en kelvin, conversion a grados celsius
    return round($celsius, 1); //redondeo de temperatura a un decimal
}
?>
