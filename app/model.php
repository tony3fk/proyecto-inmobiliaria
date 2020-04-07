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



    public function listarVenta($tipo, $provincia)

    {
        if (!empty($tipo) && !empty($provincia)) {
            $parametros = " and tipo='$tipo' and provincia='$provincia'";
        } else {
            $parametros = '';
        }

        $consulta = "select * from inmuebles where operacion = 'Venta'" . $parametros;
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }
    public function listarAlquiler($tipo, $provincia)
    {
        if (!empty($tipo) && !empty($provincia)) {
            $parametros = " and tipo='$tipo' and provincia='$provincia'";
        } else {
            $parametros = '';
        }

        $consulta = "select * from inmuebles where operacion = 'Alquiler'" . $parametros;
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }





    public function listarUsuarios($orderBy = " order by tipo desc")
    {

        $consulta = "select * from usuarios $orderBy";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    public function listarInmuebles($orderBy = " order by referencia desc")
    {

        $consulta = "select * from inmuebles $orderBy";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }



    public function eliminarInmuebles($referencia)
    {

        $consulta = "delete from inmuebles where referencia = :referencia";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':referencia', $referencia);
        $result->execute();


        return $referencia;
    }


    public function eliminarUsuario($id)
    {

        $consulta = "delete from usuarios where id = :id";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $id);
        $result->execute();


        return $id;
    }








    public function buscarPorOperacion($operacion)
    {

        $consulta = "select * from inmuebles where operacion like :operacion";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':operacion', $operacion);
        $result->execute();

        return $result->fetchAll();
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

        $consulta = "INSERT INTO usuarios (nombre, email, password, tipo, ciudad) VALUES (:nombre,  :email, :password, :tipo, :ciudad)";
        $insert = $this->conexion->prepare($consulta);
        $insert->bindParam(':nombre', $params['nombre']);
        $insert->bindParam(':email', $params['email']);
        $insert->bindParam(':password', $params['password']);
        $insert->bindParam(':tipo', $params['tipo']);
        $insert->bindParam(':ciudad', $params['ciudad']);
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
