<?php
include_once('Config.php');

class Model extends PDO
{

    protected $conexion;

    public function __construct()
    {

        $this->conexion = new PDO('mysql:host=' . Config::$mvc_bd_hostname . ';dbname=' . Config::$mvc_bd_nombre . '', Config::$mvc_bd_usuario, Config::$mvc_bd_clave);
        // Realiza el enlace con la BD en utf-8
        $this->conexion->exec("set names utf8");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }



    public function listarVenta()
    {

        $consulta = "select * from inmuebles where operacion = 'Venta'";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }
    public function listarAlquiler()
    {

        $consulta = "select * from inmuebles where operacion = 'Alquiler'";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    public function listarUsuarios()
    {

        $consulta = "select * from usuarios";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }









    public function buscarPorOperacion($operacion)
    {

        $consulta = "select * from inmuebles where operacion like :operacion";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':operacion', $operacion);
        $result->execute();

        return $result->fetchAll();
    }






    public function buscarPorTipo($tipo)
    {
        try {
            $consulta = "select * from inmuebles where tipo like :tipo";

            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':tipo', $tipo);
            $result->execute();

            return $result->fetchAll();
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage();
        }
    }




    public function buscarPorProvincia($provincia)
    {

        $consulta = "select * from inmuebles where provincia=:provincia";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':provincia', $provincia);
        $result->execute();
        return $result->fetch();
    }


    public function verInmueble($referencia)
    {

        $consulta = "select * from inmuebles where referencia=:referencia";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':referencia', $referencia);
        $result->execute();
        return $result->fetch();
    }





    public function insertarInmueble($tipo, $operacion, $provincia, $superficie, $precio_venta)
    {
        $consulta = "insert into inmuebles (fecha_alta, tipo, operacion, provincia, superficie, precio_venta) values (?, ?, ?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, date('d/m/Y', time()));
        $result->bindParam(2, $tipo);
        $result->bindParam(3, $operacion);
        $result->bindParam(4, $provincia);
        $result->bindParam(5, $superficie);
        $result->bindParam(6, $precio_venta);
        $result->execute();

        return $result;
    }




    //funcion para insertar nuevos usuarios
    function InsertUser(array $params)
    {

        $consulta = "INSERT INTO usuarios (nombre, email, password, ciudad) VALUES (:nombre,  :email, :password, :ciudad)"; //por defecto los usuarios registrados son de nivel 1
        $insert = $this->conexion->prepare($consulta);
        $insert->bindParam(':nombre', $params['nombre']);
        $insert->bindParam('email', $params['email']);
        $insert->bindParam(':password', $params['password']);

        $insert->bindParam('ciudad', $params['ciudad']);
        $insert->execute();
        return $insert;
    }



    //devuelve el usuario logueado si existe
    function SelectUser($nombre, $password)
    {
        $consulta = "SELECT * FROM usuarios WHERE nombre=:nombre AND password=:password";

        $select = $this->conexion->prepare($consulta);
        $select->bindParam(':nombre', $nombre);
        $select->bindParam(':password', $password);
        $select->execute();
        $registro = $select->fetch();
        return $registro;
    }
}
