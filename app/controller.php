<?php
include('libs/utils.php');
include('libs/sessionClass.php');
include('libs/enviaMail.php');



class Controller
{


    public function login()
    {
        $params['mensaje'] = "";
        $m = new Model;
        $sesion = new Session;

        //Recojo y valido datos del formulario
        $params['nombre'] = recoge('nombre');
        $params['password'] = recoge('password')/*crypt_blowfish(recoge('password')) No lo utilizo porque el campo para la contraseña está limitado a varchar(30) y se trunca el dato*/;


        if (isset($params['nombre']) && isset($params['password'])) { //compruebo si tengo datos 

            if (isset($_POST['bLogin'])) { // si se pulsa login

                if ($registro = $m->SelectUser($params['nombre'],  $params['password'])) {

                    //$sesion->cerrarSesion(); //cierra sesion de invitado
                    //$sesion->init(); //inicia sesion de usuario registrado

                    include('libs/clima.php'); //archivo con la funcion API del tiempo
                    $params['temp'] = weather($registro['ciudad']); //llamada a la función que retorna la temperatura de la ciudad
                    $params['tipo'] = $registro['tipo'];
                    $params['ciudad'] = $registro['ciudad'];
                    $sesion->setSession($params); //establece el user, el nivel a la sesion, la ciudad y la temperatura

                    header('location: index.php?ctl=inicio');
                } else {

                    $params['mensaje'] = 'Usuario o contraseña incorrectos.';
                }
            }
        }


        require __DIR__ . '/templates/login.php';
    }







    // function register()
    // {
    //     $params['mensaje'] = "";
    //     $m = new Model;
    //     //Recojo y valido datos del formulario
    //     $nombre = recoge('nombre');
    //     $email = recoge('email');
    //     $password = recoge('password') /*crypt_blowfish(recoge('password'))*/;
    //     $ciudad = recoge('ciudad');
    //     if (isset($nombre) && isset($email) && _email($password) && isset($ciudad)) { //compruebo si tengo datos y si el email es correcto

    //         if (isset($_POST['bRegister'])) { //si se pulsa registrar

    //             if ($m->InsertUser($nombre, $email, $password, $ciudad)) {
    //                 $params['mensaje'] = 'Registrado con éxito.';

    //                 enviaMail($email);

    //                 header('Location: index.php?ctl=login');
    //             } else {

    //                 //$params['mensaje'] = 'No se ha podido registrar el usuario o ya existe.';
    //                 echo "No se ha podido registrar el usuario o ya existe.";
    //             }
    //         }
    //     }

    //     require __DIR__ . '/templates/register.php';
    // }



    public function register()
    {
        try {

            $params = array(
                'nombre' => '',
                'email' => '',
                'password' => '',
                'ciudad' => '',
                'mensaje' => ''

            );


            $params['nombre'] = recoge('nombre');
            $params['email'] = recoge('email');
            $params['password'] = recoge('password');
            $params['ciudad'] = recoge('ciudad');


            // comprobar campos formulario
            if (isset($params['nombre']) &&  _email($params['email'])  && isset($params['password'])  && isset($params['ciudad'])) { //compruebo si tengo datos y si el email es correcto
                if (isset($_POST['bRegister'])) { //si se pulsa registrar

                    // Si no ha habido problema creo modelo y hago inserción
                    $m = new Model();
                    if ($m->InsertUser($params)) {

                        header('Location: index.php?ctl=login');
                    } else {
                        $params = array(
                            'nombre' => $params['nombre'],
                            'email' =>   $params['email'],
                            'provincia' => $params['password'],
                            'ciudad' =>  $params['ciudad']


                        );
                        $params['mensaje'] = 'No se ha podido insertar el inmueble. Revisa el formulario';
                    }
                } else {
                    $params = array(
                        'nombre' => $params['nombre'],
                        'email' =>   $params['email'],
                        'provincia' => $params['password'],
                        'ciudad' =>  $params['ciudad']
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        require __DIR__ . '/templates/register.php';
    }




    public function inicio()
    {
        $params = array(
            'mensaje' => 'Bienvenido a Gestión Inmobiliaria',
            'fecha' => date('d-m-yy')
        );
        require __DIR__ . '/templates/inicio.php';
    }

    public function error()
    {

        require __DIR__ . '/templates/error.php';
    }


    public function errorDeRuta()
    {
        require __DIR__ . '/templates/errorderuta.php';
    }



    public function listarVenta()
    {
        try {
            $m = new Model();
            $params = array(
                'inmuebles' => $m->listarVenta()
            );

            // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/mostrarInmuebles.php';
    }

    public function listarAlquiler()
    {
        try {
            $m = new Model();
            $params = array(
                'inmuebles' => $m->listarAlquiler()
            );

            // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/mostrarInmuebles.php';
    }

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
        require __DIR__ . '/templates/listarUsuarios.php';
    }


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
        require __DIR__ . '/templates/listarInmuebles.php';
    }





    public function insertarInmueble()
    {
        try {

            $params = array(
                'tipo' => '',
                'operacion' => '',
                'provincia' => '',
                'superficie' => '',
                'precio_venta' => '',

            );

            if (isset($_POST['insertar'])) {
                $tipo = recoge('tipo');
                $operacion = recoge('operacion');
                $provincia = recoge('provincia');
                $superficie = recoge('superficie');
                $precio_venta = recoge('precio_venta');

                // comprobar campos formulario
                if (validarDatos($tipo, $operacion, $provincia, $superficie, $precio_venta)) {

                    // Si no ha habido problema creo modelo y hago inserción
                    $m = new Model();
                    if ($m->insertarInmueble($tipo, $operacion, $provincia, $superficie, $precio_venta)) {
                        header('Location: index.php?ctl=listar');
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
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        require __DIR__ . '/templates/formInsertar.php';
    }






    public function buscarPorProvincia()
    {
        try {
            $params = array(
                'provincia' => '',
                'resultado' => array()
            );
            $m = new Model();
            if (isset($_POST['buscar'])) {
                $provincia =  recoge("provincia");
                $params['provincia'] = $provincia;

                $params['resultado'] = $m->buscarPorProvincia($provincia);
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/buscarPorProvincia.php';
    }




    public function buscarPorTipo()
    {
        try {
            $params = array(
                'tipo' => '',
                'resultado' => array()
            );
            $m = new Model();
            if (isset($_POST['buscar'])) {
                $tipo = recoge("tipo");
                $params['tipo'] = $tipo;
                $params['resultado'] = $m->buscarPorTipo($tipo);
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/buscarPorTipo.php';
    }



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



        require __DIR__ . '/templates/verInmueble.php';
    }




    public function eliminarInmuebles()
    {
        try {


            if (!isset($_GET['id'])) {
                throw new Exception('Inmueble no encontrado');
            }
            $referencia = recoge('id');
            $m = new Model();
            $result = $m->eliminarInmuebles($referencia);
            $params['resultado'] = $result;
            $params['mensaje'] = "Ref: " . $referencia . " eliminado";
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        header('Location: index.php?ctl=listarInmuebles&borrado=1');
    }




    public function salir()
    {
        session_destroy();
        header('Location: index.php?ctl=login');
    }


    public function email($email)
    {

        $para = $email; //aquí mail del registrado
        $asunto = "Alta repositorio de alimentos";
        $mensaje = "<hr>";
        $mensaje .= "<h2>Bienvenido al repositorio de alimentos </h2><br>";
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
}
