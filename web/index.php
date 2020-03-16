<?php

// web/index.php
// carga del modelo y los controladores
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';
require_once __DIR__ . '../../app/libs/sessionClass.php';

ini_set("session.use_trans_sid", "0");
ini_set("session.use_only_cookies", "1");

session_set_cookie_params(0, "/", $_SERVER["HTTP_HOST"], 0); //Esta configuración cierra la sesion al cerrar el navegador.




/*
Si tenemos que usar sesiones podemos poner aqui el inicio de sesión, de manera que si el usuario todavia no está logueado
lo identificamos como visitante, por ejemplo de la siguiente manera: $_SESSION['nivel_usuario']=0
*/

$sesion = new Session;
$sesion->init();


//comprobación de inactividad para cerrar sesion
if (isset($_SESSION['time'])) {
    if ($sesion->inactividad()) {

        echo "<script> alert('Se cerro la sesion por inactividad.'); window.location= 'index.php?ctl=login' </script>"; //se lanza un alert y se redirecciona a la página de login
    }
}





// enrutamiento
$map = array(
    /*
    En cada elemento podemos añadir una posición mas que se encargará de otorgar el nivel mínimo para ejecutar la acción
    Puede quedar de la siguiente manera
    tipo 0->público / 1->cliente / vendedor->2 / administrador->3
    */
    'login' => array('controller' => 'Controller', 'action' => 'login', 'tipo' => 0),
    'register' => array('controller' => 'Controller', 'action' => 'register', 'tipo' => 0),
    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'tipo' => 1),
    'listar' => array('controller' => 'Controller', 'action' => 'listar', 'tipo' => 1),
    'insertar' => array('controller' => 'Controller', 'action' => 'insertar', 'tipo' => 2),
    'buscar' => array('controller' => 'Controller', 'action' => 'buscarPorNombre', 'tipo' => 1),
    'buscarInmueblesPorTipo' => array('controller' => 'Controller', 'action' => 'buscarInmueblesPorTipo', 'tipo' => 1),
    'ver' => array('controller' => 'Controller', 'action' => 'ver', 'tipo' => 1),
    'salir' => array('controller' => 'Controller', 'action' => 'salir', 'tipo' => 0),
    'error' => array('controller' => 'Controller', 'action' => 'error', 'tipo' => 0),
    'errorderuta' => array('controller' => 'Controller', 'action' => 'errorderuta', 'tipo' => 0)

);




// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        if ($_SESSION['nivel'] == 0) { //si no está logueado mostrará el mensaje sólamente
            //Si el valor puesto en ctl en la URL no existe en el array de mapeo escribe en el fichero logError.txt y envía una cabecera de error
            $errorMensaje = "Error 404: No existe la ruta " . $_GET['ctl'];
            errorsLog($errorMensaje);
            //header('../../app/libs/error.php');
            echo '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] . '</p></body></html>';
            exit;
        } else { //si está logueado mostrará el mensaje con el menú
            //Si el valor puesto en ctl en la URL no existe en el array de mapeo escribe en el fichero logError.txt y envía una cabecera de error
            $errorMensaje = "Error 404: No existe la ruta " . $_GET['ctl'];
            errorsLog($errorMensaje);
            $contenido = '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] . '</p></body></html>';
            header('location: index.php?ctl=errorderuta');
            $contenido = '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] . '</p></body></html>';
            exit;
        }
    }
} else {
    $ruta = 'login';
}
$controlador = $map[$ruta];
/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, si es así ejecutamos el método correspondiente.
En aso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariaos tambien si el usuario tiene permiso suficiente para ejecutar esa acción
*/


if (method_exists($controlador['controller'], $controlador['action'])) { //comprobar aqui si el usuario tiene el nivel suficiente para ejecutar la accion
    //--------------control de nivel//

    if ($map[$ruta]['nivel'] <= $sesion->get('nivel')) {
        call_user_func(array(new $controlador['controller'], $controlador['action']));
    } else {

        $errorMensaje = $sesion->get('user') . " No tienes perniso para realizar esta acción. Se requiere un nivel " . $map[$ruta]['nivel'] . " pero sólo tienes nivel " . $sesion->get('nivel');
        errorsLog($errorMensaje);
        header('location: index.php?ctl=error');
        //echo '<html><body><h1>Error: No tiene privilegios para realizar esta acción.</h1></body></html>';
    }



    //--------------//
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
}






//} while (!$sesion->inactividad());
