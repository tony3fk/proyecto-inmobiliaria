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
        $imagen = self::obtenerImagenDelInmueble($referencia);
        $consulta = "delete from inmuebles where referencia = :referencia";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':referencia', $referencia);
        $result->execute();
        return $imagen;
    }

    public function obtenerImagenDelInmueble($referencia)
    {
        $consulta = "SELECT imagen FROM inmuebles WHERE referencia=:referencia";
        $select = $this->conexion->prepare($consulta);
        $select->bindParam(':referencia', $referencia);
        $select->execute();
        $registro = $select->fetch();

        if ($registro['imagen'] == './app/images/default/default.jpg') {
            return null;
        } else {
            return $registro['imagen'];
        }
    }


    public function eliminarUsuario($id)
    {
        $avatar = self::obtenerAvatarDeUsuario($id);
        $consulta = "delete from usuarios where id = :id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $id);
        $result->execute();
        return $avatar;
    }

    public function obtenerAvatarDeUsuario($id)
    {

        $consulta = "SELECT avatar FROM usuarios WHERE id=:id";
        $select = $this->conexion->prepare($consulta);
        $select->bindParam(':id', $id);
        $select->execute();
        $registro = $select->fetch();
        return $registro['avatar'];
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

    public function insertarInmueble($tipo, $operacion, $provincia, $superficie, $precio_venta, $imagen = './app/images/default/default.jpg')
    {
        $consulta = "insert into inmuebles (fecha_alta, tipo, operacion, provincia, superficie, precio_venta, imagen) values (?, ?, ?, ?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, date('d/m/Y', time()));
        $result->bindParam(2, $tipo);
        $result->bindParam(3, $operacion);
        $result->bindParam(4, $provincia);
        $result->bindParam(5, $superficie);
        $result->bindParam(6, $precio_venta);
        $result->bindParam(7, $imagen);
        $result->execute();

        return $result;
    }

    public function updateInmueble($referencia, $tipo, $operacion, $provincia, $superficie, $precio_venta, $imagen = './app/images/default/default.jpg')
    {
        $consulta = "update inmuebles set tipo=:tipo, operacion=:operacion, provincia=:provincia, superficie=:superficie, precio_venta=:precio_venta, imagen=:imagen where referencia=:referencia";
        $update = $this->conexion->prepare($consulta);
        $update->bindParam(':referencia', $referencia);
        $update->bindParam(':tipo', $tipo);
        $update->bindParam(':operacion', $operacion);
        $update->bindParam(':provincia', $provincia);
        $update->bindParam(':superficie', $superficie);
        $update->bindParam(':precio_venta', $precio_venta);
        $update->bindParam(':imagen', $imagen);
        $update->execute();
        return $update;
    }

    //funcion para insertar nuevos usuarios
    function InsertUser(array $params)
    {

        $consulta = "INSERT INTO usuarios (nombre, email, password, tipo, ciudad, avatar) VALUES (:nombre,  :email, :password, :tipo, :ciudad, :avatar)";
        $insert = $this->conexion->prepare($consulta);
        $insert->bindParam(':nombre', $params['nombre']);
        $insert->bindParam(':email', $params['email']);
        $insert->bindParam(':password', $params['password']);
        $insert->bindParam(':tipo', $params['tipo']);
        $insert->bindParam(':ciudad', $params['ciudad']);
        $insert->bindParam(':avatar', $params['avatar']);

        $insert->execute();
        return $insert;
    }

    //devuelve el usuario logueado si existe
    function SelectUser($email, $password)
    {
        $consulta = "SELECT * FROM usuarios WHERE email=:email AND password=:password";

        $select = $this->conexion->prepare($consulta);
        $select->bindParam(':email', $email);
        $select->bindParam(':password', $password);
        $select->execute();
        $registro = $select->fetch();
        return $registro;
    }

    public function resetPassword($password, $email)
    {

        $sql = 'update usuarios set password="' . $password . '" WHERE email="' . $email . '"';
        // echo $sql;
        // die();
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$password, $email]);
        return $stmt->rowCount();
    }

    public function listarConParametros($operacion, $tipo, $provincia)
    {
        $consulta = "SELECT * FROM inmuebles WHERE operacion=:operacion AND tipo LIKE :tipo AND provincia LIKE :provincia";

        $select = $this->conexion->prepare($consulta);
        $select->bindParam(':operacion', $operacion);
        $select->bindParam(':tipo', $tipo);
        $select->bindParam(':provincia', $provincia);
        $select->execute();
        $registro = $select->fetchAll();


        return $registro;
    }
}
