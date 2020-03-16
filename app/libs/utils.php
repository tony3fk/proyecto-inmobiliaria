<?php
//Aqui pondremos las funciones de validación de los campos

function validarDatos($tipo, $operacion, $provincia, $superficie, $precio_venta)
{
    return (is_string($tipo) &
        is_string($operacion) &
        is_string($provincia) &
        is_numeric($superficie) &
        is_numeric($precio_venta));
}


function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp = strip_tags(sinEspacios($_REQUEST[$var]));
    else
        $tmp = "";

    return $tmp;
}

function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}


function _email($valor)
{
    if (filter_var($valor, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {

        return false;
    }
}


function errorsLog($errorMensaje)
{
    $archivo = "logError.txt";

    file_put_contents($archivo, $errorMensaje . "\n", FILE_APPEND);
    return true;
}
//funcion para encriptar contraseña
function crypt_blowfish($password)
{

    $salt = '$2a$07$usesomesillystringforsalt$';
    $pass = crypt($password, $salt);


    return $pass;
}
