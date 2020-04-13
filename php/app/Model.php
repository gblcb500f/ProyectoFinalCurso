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

    public function BuscarPersona(){
        $consulta="select * from persona";
        $respuesta=$this->conexion->prepare($consulta);
        $respuesta->execute();
        return $respuesta->fetchAll(PDO::FETCH_NUM);
    }
    public function InsertarUsuario($usuario,$pass,$nivel=0){
        $consulta = "insert into usuario (usuario,passwd,tipoUsuario) values (?,?,?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $usuario);
        $result->bindParam(2, $pass);
        $result->bindParam(3, $nivel);
        $result->execute();
        return $result;
    }
    public function InsertarPersona($nombre,$apellido,$dni,$edad,$telefono,$email,$cp,$direccion,$provincia,$img,$usuario){
        $consulta = "insert into persona (dni, nombre, apellido, usuario,edad,email,telefono,provincia,codigoPostal,direccion,img) values (?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $dni);
        $result->bindParam(2, $nombre);
        $result->bindParam(3, $apellido);
        $result->bindParam(4, $usuario);
        $result->bindParam(5, $edad);
        $result->bindParam(6, $email);
        $result->bindParam(7, $telefono);
        $result->bindParam(8, $provincia);
        $result->bindParam(9, $cp);
        $result->bindParam(10, $direccion);
        $result->bindParam(11, $img);
        $result->execute();
        return $result;
    }
    public function BuscarUsuario($usuario){
        $consulta = "select * from usuario where usuario=:usuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':usuario', $usuario);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function MostrarUsuarios(){
        $consulta = "select * from usuario";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function MostrarPersona($persona){
        $consulta = "select * from persona where usuario=:persona";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':persona', $persona);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function ModificarPermisos($usuario, $permiso)
    {
        $consulta = "UPDATE usuario SET tipoUsuario=:permiso WHERE usuario=:usuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':permiso', $permiso);
        $result->bindParam(':usuario', $usuario);
        $result->execute();
        return $result;
    }
    public function ActualizarPersona($nombre,$apellido,$dni,$edad,$telefono,$email,$cp,$direccion,$provincia,$img,$usuario){
        $consulta = "UPDATE persona SET nombre=:nombre,apellido=:apellido,dni=:dni,edad=:edad,telefono=:telefono,email=:email,codigoPostal=:cp,direccion=:direccion,provincia=:provincia,img=:img WHERE usuario=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":dni", $dni);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":apellido", $apellido);
        $result->bindParam(":edad", $edad);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":provincia", $provincia);
        $result->bindParam(":cp", $cp);
        $result->bindParam(":direccion", $direccion);
        $result->bindParam(":img", $img);
        $result->bindParam(":id", $usuario);
        $result->execute();
        return $result;
    }
    public function EliminarPersona($usuario){
        $consulta = "delete from persona where usuario=:nombre";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":nombre", $usuario);
        $result->execute();
        return $result;
    }
    public function EliminarUsuario($usuario){
        $consulta = "delete from usuario where usuario=:nombre";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":nombre", $usuario);
        $result->execute();
        return $result;
    }
/*--------------------------------------------------- Operaciones de marcas ------------------------------------------------------------------------------------------------------------------------- */

    public function MostrarMarcas(){
        $consulta = "select * from marcas";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function CrearMarca($id,$nombre,$img){
        $consulta = "insert into marcas (id,marca,img) values (?,?,?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $id);
        $result->bindParam(2, $nombre);
        $result->bindParam(3, $img);
        $result->execute();
        return $result;
    }
    public function InfoMarcas($marca){
        $consulta = "select * from marcas where id=:marca";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':marca', $marca);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }

    public function ActualizarMarca($id,$nombre,$img,$identificador){
        $consulta = "UPDATE marcas SET id=:id,marca=:marca,img=:img WHERE id=:identificador";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $id);
        $result->bindParam(':marca', $nombre);
        $result->bindParam(':img', $img);
        $result->bindParam(':identificador', $identificador);
        $result->execute();
        return $result;
    }

    public function EliminarMarca($id){
        $consulta = "delete from marcas where id=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result;
    }
    public function EliminarProductosMarca($id){
        $consulta = "delete from moto where id_moto=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result;
    }
}
