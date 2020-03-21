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
        $_SESSION['nombre'] = $params['nombre'];
        $_SESSION['tipo'] = $params['tipo'];
        $_SESSION['time'] = time();
        $_SESSION['ciudad'] = $params['ciudad'];
        $_SESSION['temp'] = $params['temp'];
    }

    public function get($key)
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

    public function inactividad()
    {

        if (time() - $_SESSION['time'] > 900) { //tiempo de inactividad 15 minutos.

            session_destroy();
            return true;
        } else {
            $_SESSION['time'] = time();
            return false;
        }
    }
}
