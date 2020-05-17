<?php
require('vendor/autoload.php');

// web/index.php
// carga del modelo y los controladores
require_once('app/config.php');
require_once('app/model.php');
require_once('app/controller.php');
require_once('app/libs/sessionClass.php');



// ini_set("session.use_trans_sid", "0");
// ini_set("session.use_only_cookies", "1");
error_reporting(0);


session_set_cookie_params(0, "/", $_SERVER["HTTP_HOST"], 0); //Esta configuración cierra la sesion al cerrar el navegador.




/*
Si tenemos que usar sesiones podemos poner aqui el inicio de sesión, de manera que si el usuario todavia no está logueado
lo identificamos como visitante, por ejemplo de la siguiente manera: $_SESSION['nivel_usuario']=0
*/

$sesion = new Session;
$sesion->init();


// //comprobación de inactividad para cerrar sesion
// if (isset($_SESSION['time'])) {
//     if ($sesion->inactividad()) {

//         echo "<script> alert('Se cerro la sesion por inactividad.'); window.location= 'index.php?ctl=login' </script>"; //se lanza un alert y se redirecciona a la página de login
//     }
// }





// enrutamiento
$map = array(
    /*
    En cada elemento podemos añadir una posición mas que se encargará de otorgar el nivel mínimo para ejecutar la acción
    Puede quedar de la siguiente manera
    tipo 0->público / 1->usuario / admin->2 / 
    */
    'login' => array('controller' => 'Controller', 'action' => 'login', 'tipo' => 0),
    'register' => array('controller' => 'Controller', 'action' => 'register', 'tipo' => 0),
    // 'registerAdmin' => array('controller' => 'Controller', 'action' => 'registerAdmin', 'tipo' => 2),
    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'tipo' => 0),
    'listarVenta' => array('controller' => 'Controller', 'action' => 'listarVenta', 'tipo' => 0),
    'listarAlquiler' => array('controller' => 'Controller', 'action' => 'listarAlquiler', 'tipo' => 0),
    'insertar' => array('controller' => 'Controller', 'action' => 'insertarInmueble', 'tipo' => 2),
    'updateInmueble' => array('controller' => 'Controller', 'action' => 'updateInmueble', 'tipo' => 2),
    'buscarConParametros' => array('controller' => 'Controller', 'action' => 'buscarConParametros', 'tipo' => 0),
    'listarUsuarios' => array('controller' => 'Controller', 'action' => 'listarUsuarios', 'tipo' => 2),
    'listarInmuebles' => array('controller' => 'Controller', 'action' => 'listarInmuebles', 'tipo' => 2),
    'editarInmuebles' => array('controller' => 'Controller', 'action' => 'editarInmuebles', 'tipo' => 2),
    'modificarInmueble' => array('controller' => 'Controller', 'action' => 'modificarInmueble', 'tipo' => 2),
    'eliminarInmuebles' => array('controller' => 'Controller', 'action' => 'eliminarInmuebles', 'tipo' => 2),
    'eliminarUsuario' => array('controller' => 'Controller', 'action' => 'eliminarUsuario', 'tipo' => 2),
    'resetPassword' => array('controller' => 'Controller', 'action' => 'resetPassword', 'tipo' => 0),
    'verInmueble' => array('controller' => 'Controller', 'action' => 'verInmueble', 'tipo' => 0),
    'salir' => array('controller' => 'Controller', 'action' => 'salir', 'tipo' => 0),
    'error' => array('controller' => 'Controller', 'action' => 'error', 'tipo' => 0),
    'errorderuta' => array('controller' => 'Controller', 'action' => 'errorderuta', 'tipo' => 0)

);




// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        if ($_SESSION['tipo'] == 0) { //si no está logueado mostrará el mensaje sólamente
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

    if ($map[$ruta]['tipo'] <= $sesion->get('tipo') || $map[$ruta]['tipo'] <= $_COOKIE['tipo']) {
        call_user_func(array(new $controlador['controller'], $controlador['action']));
    } else {

        $errorMensaje = $sesion->get('nombre') . ", no tienes permiso para realizar esta acción. Se requiere ser administrador.";
        $_SESSION['mensaje'] = $errorMensaje;
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
