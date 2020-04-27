<?php
include('app/libs/utils.php');
include('app/libs/sessionClass.php');
include('app/libs/sendbymail.php');

class Controller
{

    //LOGIN
    public function login()
    {
        $params['mensaje'] = "";
        $m = new Model;
        $sesion = new Session;



        $params['email'] = recoge('email');
        $params['password'] = crypt_blowfish(recoge('password'))  /*recoge('password')*/;


        if (isset($params['email']) && isset($params['password'])) { //compruebo si tengo datos 

            if (isset($_POST['bLogin'])) { // si se pulsa login

                if ($registro = $m->SelectUser($params['email'],  $params['password'])) {

                    //$sesion->cerrarSesion(); //cierra sesion de invitado
                    //$sesion->init(); //inicia sesion de usuario registrado

                    //include('libs/clima.php'); //archivo con la funcion API del tiempo
                    //$params['temp'] = weather($registro['ciudad']); //llamada a la función que retorna la temperatura de la ciudad
                    $params['nombre'] = $registro['nombre'];
                    $params['tipo'] = $registro['tipo'];
                    $params['ciudad'] = $registro['ciudad'];
                    $params['avatar'] = $registro['avatar'];
                    $sesion->setSession($params); //establece el user, el nivel a la sesion, la ciudad y la temperatura

                    header('location: index.php?ctl=inicio');
                } else {

                    $params['mensaje'] = 'Email o contraseña incorrectos.';
                }
            }
        }


        require('./app/templates/login.php');
    }
    //FIN LOGIN



    //REGISTRO
    public function register()
    {
        try {

            $params = array(
                'nombre' => '',
                'email' => '',
                'password' => '',
                'ciudad' => '',
                'tipo' => '',
                'avatar' => NULL,
                'mensaje' => ''

            );

            $params['nombre'] = recoge('nombre');
            $params['email'] = recoge('email');
            $params['password'] = crypt_blowfish(recoge('password'));

            if ($_SESSION['tipo'] == 2 || $_COOKIE['tipo'] == 2) { //si está iniciada una sesión de administrador
                $params['tipo'] = 2;
            } else {
                $params['tipo'] = 1;
            }

            $params['ciudad'] = recoge('ciudad');
            // comprobar campos formulario

            //compruebo si tengo datos y si el email es correcto
            if (isset($params['nombre']) &&  _email($params['email'])  && isset($params['password']) && is_numeric($params['tipo'])  && isset($params['ciudad'])) {
                if (isset($_POST['bRegister'])) { //si se pulsa registrar


                    //comprobar foto
                    //comprobación de la imagen si la hay, sin errores y tamaño menos a 2 MB
                    if ($_FILES['avatar']['error'] == 0 && $_FILES['avatar']['size'] <= 2097152) {
                        $avatar = $_FILES['avatar']['name'];
                        $dir = './app/images/avatars/';


                        //Añadimos el tiempo para asegurarnos que el nombre es único

                        $params['avatar'] = $dir . time() . '_' . $avatar;

                        //subida de avatar a carpeta avatares
                        if (move_uploaded_file($_FILES['avatar']['tmp_name'],  $params['avatar'])) {
                            $params['mensaje'] = "El fichero ha sido guardado";
                        } else {
                            $params['mensaje'] = 'Error: No se puede mover el fichero a su destino';
                        }
                    } else {
                        $params['mensaje'] == 'Formato incorrecto o imagen demasiado grande';
                    }



                    // Si no ha habido problema creo modelo y hago inserción
                    $m = new Model();
                    if ($m->InsertUser($params)) {

                        self::email($params['email']);

                        if ($_SESSION['tipo'] == 2 || $_COOKIE['tipo'] == 2) {
                            header('Location: index.php?ctl=listarUsuarios'); //si es admin
                        } else {
                            header('Location: index.php?ctl=login'); //si no es admin
                        }
                    } else {
                        $params = array(
                            'nombre' => $params['nombre'],
                            'email' =>   $params['email'],
                            'provincia' => $params['password'],
                            'ciudad' =>  $params['ciudad'],
                            'tipo' => $params['tipo'],
                            'avatar' => $params['avatar']


                        );
                        $params['mensaje'] = 'Revisa el formulario';
                    }
                } else {
                    $params = array(
                        'nombre' => $params['nombre'],
                        'email' =>   $params['email'],
                        'provincia' => $params['password'],
                        'ciudad' =>  $params['ciudad'],
                        'tipo' => $params['tipo'],
                        'avatar' => $params['avatar']

                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . date("H:i:s - d/m/Y", time()) . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . date("H:i:s - d/m/Y", time()) . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        require('./app/templates/login.php');
    }
    //FIN REGISTRO




    //INICIO
    public function inicio()

    {

        $operacion = recoge('operacion');
        $tipo = recoge('tipo');
        $provincia = recoge('provincia');


        if (isset($_POST['bSubmitInicio'])) {

            if ($operacion == 'Venta') {

                Self::listarVenta($tipo, $provincia);
            } else {
                Self::listarAlquiler($tipo, $provincia);
            }
        }




        require('./app/templates/inicio.php');
    }
    //FIN INICIO


    //PÁGINA DE ERROR
    public function error()
    {

        require('./app/templates/error.php');
    }
    //FIN PAGINA DE ERROR


    //PÁGINA ERROR DE RUTA
    public function errorDeRuta()
    {
        require('./app/templates/errorderuta.php');
    }
    //FIN PÁGINA ERROR DE RUTA



    //LISTAR INMUEBLES EN VENTA
    public function listarVenta($tipo = '', $provincia = '')
    {
        try {
            $m = new Model();
            $params = array(
                'inmuebles' => $m->listarVenta($tipo, $provincia)
            );

            // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require('./app/templates/mostrarInmuebles.php');
    }
    //FIN LISTAR INMUEBLES EN VENTA



    //LISTAR INMUEBLES EN ALQUILER
    public function listarAlquiler($tipo = '', $provincia = '')
    {
        try {
            $m = new Model();
            $params = array(
                'inmuebles' => $m->listarAlquiler($tipo, $provincia)
            );

            // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require('./app/templates/mostrarInmuebles.php');
    }
    //FIN LISTAR INMUEBLES EN ALQUILER



    //LISTAR USUARIOS MENU ADMIN
    public function listarUsuarios()
    {
        try {
            $m = new Model();
            $params = array(
                'usuarios' => $m->listarUsuarios()
            );

            // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require('./app/templates/listarUsuarios.php');
    }
    //FIN LISTAR USUARIOS MENÚ ADMIN



    //LISTAR INMUEBLES MENÚ ADMIN
    public function listarInmuebles()
    {
        try {
            $m = new Model();
            $params = array(
                'inmuebles' => $m->listarInmuebles()
            );

            // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require('./app/templates/listarInmuebles.php');
    }
    //FIN LISTAR INMUEBLES MENÚ ADMIN




    //INSERTAR INMUEBLES
    public function insertarInmueble()
    {
        try {
            $params['mensaje'] = '';


            if (isset($_POST['insertar'])) {



                //comprobación de la imagen
                if ($_FILES['imagen']['error'] == 0 && ($_FILES['imagen']['type'] != 'image/jpg' || $_FILES['imagen']['type'] != 'image/jpeg')) {
                    $imagen = $_FILES['imagen']['name'];
                    $dir = './app/images/';


                    //Añadimos el tiempo para asegurarnos que el nombre es único
                    $idUnico = time();
                    $nombreImagen = $dir . $idUnico . '_' . $imagen;

                    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreImagen)) {
                        $params['mensaje'] = "El fichero ha sido guardado";
                    } else {
                        $params['mensaje'] = 'Error: No se puede mover el fichero a su destino';
                    }
                }


                //recogida de datos del formulario
                $tipo = recoge('tipo');
                $operacion = recoge('operacion');
                $provincia = recoge('provincia');
                $superficie = recoge('superficie');
                $precio_venta = recoge('precio_venta');



                // comprobar campos formulario
                if (validarDatos($tipo, $operacion, $provincia, $superficie, $precio_venta)) {

                    // Si no ha habido problema creo modelo y hago inserción
                    $m = new Model();
                    if ($m->insertarInmueble($tipo, $operacion, $provincia, $superficie, $precio_venta, $nombreImagen)) {
                        $params['mensaje'] = "Insertado correctamente";
                        header('Location: index.php?ctl=listarInmuebles');
                    } else {
                        $params = array(
                            'tipo' => $tipo,
                            'operacion' => $operacion,
                            'provincia' => $provincia,
                            'superficie' => $superficie,
                            'precio_venta' => $precio_venta


                        );
                        $params['mensaje'] = 'No se ha podido insertar el inmueble. Revisa el formulario';
                    }
                } else {
                    $params = array(
                        'tipo' => $tipo,
                        'operacion' => $operacion,
                        'provincia' => $provincia,
                        'superficie' => $superficie,
                        'precio_venta' => $precio_venta
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . date("H:i:s - d/m/Y", time()) . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . date("H:i:s - d/m/Y", time()) . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        require('./app/templates/formInsertar.php');
    }
    //FIN INSERTAR INMUEBLES

    //UPDATE INMUEBLES
    public function updateInmueble()
    {
        try {

            if (isset($_POST['update'])) {
                $referencia = $_POST['referencia'];
                $tipo = $_POST['tipo'];
                $operacion = $_POST['operacion'];
                $provincia = $_POST['provincia'];
                $superficie = $_POST['superficie'];
                $precio_venta = $_POST['precio_venta'];

                // comprobar campos formulario


                // Si no ha habido problema creo modelo y hago update
                $m = new Model();
                if ($m->updateInmueble($referencia, $tipo, $operacion, $provincia, $superficie, $precio_venta)) {
                    $params['mensaje'] = "Actualizado correctamente";
                    header('Location: index.php?ctl=listarInmuebles');
                } else {
                    $params = array(
                        'referencia' => $referencia,
                        'tipo' => $tipo,
                        'operacion' => $operacion,
                        'provincia' => $provincia,
                        'superficie' => $superficie,
                        'precio_venta' => $precio_venta

                    );

                    $params['mensaje'] = 'No se ha podido insertar el inmueble. Revisa el formulario';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . date(" H:i:s - d/m/Y", time()) . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . date(" H:i:s - d/m/Y", time()) . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        require('./app/templates/formInsertar.php');
    }
    //FIN UPDATE INMUEBLES





    //VER INMUEBLE
    public function verInmueble()
    {
        try {
            if (!isset($_GET['referencia'])) {
                throw new Exception('Página no encontrada');
            }
            $referencia = recoge('referencia');
            $m = new Model();
            $result = $m->verInmueble($referencia);
            $params = $result;
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }



        require('./app/templates/verInmueble.php');
    }
    //FIN VER INMUEBLE



    //ELIMINAR INMUEBLE
    public function eliminarInmuebles()
    {
        try {


            if (!isset($_GET['id'])) {
                throw new Exception('Inmueble no encontrado');
            }
            $referencia = recoge('id');
            $m = new Model();
            $imagen = $m->eliminarInmuebles($referencia);
            unlink($imagen);
            $mensaje = "Ref: " . $referencia . " eliminada";
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        header("Location: index.php?ctl=listarInmuebles&borrado=$mensaje");
    }
    //FIN ELIMINAR INMUEBLE

    //EDITAR INMUEBLE
    public function editarInmuebles()
    {
        try {



            $referencia = $_GET['id'];



            $m = new Model();
            $result = $m->verInmueble($referencia);
            $params['resultado'] = $result;
            $ref = $params['resultado']['referencia'];
            $tipo = $params['resultado']['tipo'];
            $operacion = $params['resultado']['operacion'];
            $provincia = $params['resultado']['provincia'];
            $superficie = $params['resultado']['superficie'];
            $precio_venta = $params['resultado']['precio_venta'];

            header('Location: index.php?ctl=modificarInmueble&ref=' . $ref . '&tipo=' . $tipo . '&operacion=' . $operacion . '&provincia=' . $provincia . '&superficie=' . $superficie . '&precio_venta=' . $precio_venta);



            //$params['mensaje'] = "Ref: " . $referencia . " eliminado";
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        require('./app/templates/editarInmuebles.php');
        //header('Location: index.php?ctl=editarInmuebles&tipo=' . $tipo . '&operacion=' . $operacion . '&provincia=' . $provincia . '&superficie=' . $superficie . '&precio_venta=' . $precio_venta . "'");
    }
    //FIN EDITAR INMUEBLE

    public function modificarInmueble()
    {
        require('./app/templates/editarInmuebles.php');
    }


    //ELIMINAR USUARIOS
    public function eliminarUsuario()
    {
        try {


            if (!isset($_GET['id'])) {
                throw new Exception('Usuario no encontrado');
            }
            $id = recoge('id');
            $m = new Model();
            $avatar = $m->eliminarUsuario($id);
            unlink($avatar); //se elimina su avatar

            $params['mensaje'] = "Usuario eliminado";
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        header('Location: index.php?ctl=listarUsuarios&borrado=1');
    }
    //FIN ELIMINAR USUARIOS


    //SALIR
    public function salir()
    {
        session_destroy();
        setcookie('nombre', '', time() - 100);
        setcookie('imagen', '', time() - 100);
        setcookie('tipo', '', time() - 100);
        setcookie('email', '', time() - 100);
        setcookie('avatar', '', time() - 100);
        header('Location: index.php?ctl=login');
    }
    //FIN SALIR


    //ENVÍO EMAIL DE REGISTRO
    public function email($email)
    {

        $para = $email; //aquí mail del registrado
        $asunto = "Alta Gestión Inmobiliaria";
        $mensaje = "<hr>";
        $mensaje .= "<h2>Bienvenidos a Gestión Inmobiliaria </h2><br>";
        $mensaje .= "<hr>";

        // Para enviar correo HTML, la cabecera Content-type debe definirse
        $cabeceras  = "MIME-Version: 1.0\n";
        $cabeceras .= "Content-type: text/html; charset=UTF-8\n";

        // Cabeceras adicionales
        $cabeceras .= "From: Tony <mail@yahoo.es>\n";
        $cabeceras .= "To: Tony <tony3fk@gmail.com>\n";
        $cabeceras .= "Reply-To: mail@gmail.com\n";
        $cabeceras .= "X-Mailer: PHP/" . phpversion();

        // Enviarlo
        if (mail($para, $asunto, $mensaje, $cabeceras)) {
            return true;
        }
    }
    //FIN ENVÍO EMAIL DE REGISTRO


    public function resetPassword()
    {

        $_SESSION['mensaje'] = "";
        $m = new Model();

        //Recojo y valido datos del formulario
        $email = recoge('email');
        $password = crypt_blowfish(recoge('password'));
        $confirm_password = crypt_blowfish(recoge('password'));

        if (isset($_POST['bReset'])) {

            if ($password == $confirm_password) {



                // $nombre = recoge('nombre');
                if ($reg = $m->resetPassword($password, $email)) {
                    if ($reg == 0) {
                        $_SESSION['mensaje'] = "No hay ningún usuario con ese email";
                        // echo $_SESSION['mensaje'];
                        // die();
                    } else {
                        header('Location: index.php?ctl=login');
                    }
                }
            } else {
                $_SESSION['mensaje'] = "Los passwords han de ser iguales";
            }
        }



        require('./app/templates/resetPassword.php');
    }

    //busqueda Parametrica
    public function buscarConParametros()
    {
        try {
            $params = array(

                'inmuebles' => '',
                'mensaje' => ''
            );

            if (isset($_POST['bSubmitInicio'])) {

                $_COOKIE['operacion'] = $_POST['operacion'];
                $_COOKIE['tipo'] = $_POST['tipo'];
                $_COOKIE['provincia'] = $_POST['provincia'];
                $m = new Model();
                $params['inmuebles'] = $m->listarConParametros($_COOKIE['operacion'],  $_COOKIE['tipo'],  $_COOKIE['provincia']);

                if (count($params['inmuebles']) == 0) {
                    echo "no hay resultados";
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/mostrarInmuebles.php';
    }
    // busqueda parametrica

}
