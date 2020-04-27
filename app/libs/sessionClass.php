<?php


class Session
{

    public function init()
    {
        session_start();
    }

    public function setSession(array $params)
    {
        //session_name($nombre);
        $_SESSION['email'] = $params['email'];
        setcookie('email', $params['email']);
        $_SESSION['nombre'] = $params['nombre'];
        setcookie('nombre', $params['nombre']);
        $_SESSION['tipo'] = $params['tipo'];
        setcookie('tipo', $params['tipo']);
        $_SESSION['time'] = time();

        $_SESSION['ciudad'] = $params['ciudad'];

        //si no se registra con avatar, se le asigna avatar por defecto
        if (!$params['avatar']) {
            $_SESSION['avatar'] = './app/images/avatars/profile.png';
            setcookie('avatar', './app/images/avatars/profile.png');
        } else {
            $_SESSION['avatar'] = $params['avatar'];
            setcookie('avatar', $params['avatar']);
        }


        //$_SESSION['temp'] = $params['temp'];


    }

    public static function get($key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }


    public function getAll()
    {
        return $_SESSION;
    }

    public function remove($key)
    {
        if (!empty($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }



    public function cerrarSesion()
    {
        session_unset();
        session_destroy();
    }


    public function getStatus()
    {
        return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
    }

    // public function inactividad()
    // {

    //     if (time() - $_SESSION['time'] > 900) { //tiempo de inactividad 15 minutos.

    //         session_destroy();
    //         return true;
    //     } else {
    //         $_SESSION['time'] = time();
    //         return false;
    //     }
    // }
}
