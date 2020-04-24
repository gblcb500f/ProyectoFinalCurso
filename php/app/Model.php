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
    public function MostrarProductos($marca){
        $consulta = "select * from moto where id_moto=:marca";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':marca', $marca);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function CrearProducto($nombre, $cilindrada, $caballos, $tipoCarnet,$precio,$img,$id_marca,$gama){
        $consulta = "insert into moto (nombre, cilindrada, cv,tipoCarnet,id_moto,imagen,precio,gama) values (?,?,?,?,?,?,?,?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $cilindrada);
        $result->bindParam(3, $caballos);
        $result->bindParam(4, $tipoCarnet);
        $result->bindParam(5, $id_marca);
        $result->bindParam(6, $img);
        $result->bindParam(7, $precio);
        $result->bindParam(8, $gama);
        $result->execute();
        return $result;
    }
    public function EliminarProducto($id){
        $consulta = "delete from moto where id=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result;
    }
    public function ObtenerProducto($id){
        $consulta = "select * from moto where id=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function ActualizarProducto($nombre, $cilindrada, $caballos, $tipoCarnet,$precio,$img,$gama,$id_marca){
        $consulta = "UPDATE moto SET nombre=:nombre,cilindrada=:cilindrada,cv=:caballos,tipocarnet=:tipoCarnet,imagen=:img,precio=:precio,gama=:gama WHERE id=:identificador";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':cilindrada', $cilindrada);
        $result->bindParam(':caballos', $caballos);
        $result->bindParam(':tipoCarnet', $tipoCarnet);
        $result->bindParam(':img', $img);
        $result->bindParam(':precio', $precio);
        $result->bindParam(':gama', $gama);
        $result->bindParam(':identificador', $id_marca);
        $result->execute();
        return $result;
    }
    public function ComprobarFestivo($fecha){
        $consulta="select * from diasfestivos where fecha=:fecha ";
        $result=$this->conexion->prepare($consulta);
        $result->bindParam(":fecha",$fecha);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }

    
    public function ReservarFestivo($fecha,$dia){
        
        $consulta="insert into diasfestivos (fecha,DiasFestivos) values(?,?) ";
        $result=$this->conexion->prepare($consulta);
        $result->bindParam(1,$fecha);
        $result->bindParam(2,$dia);
        $result->execute();
        return $result;
    }

    public function EliminarDiaFestivo($fecha){
        $consulta = "delete from diasfestivos where fecha=:fecha ";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':fecha', $fecha);
        $result->execute();
        return $result;
    }


    public function   BuscarMarca(){
        $consulta="select * from marcas ";
        $result=$this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
  
    public function   OptenerMarca(){
        $consulta="select id,marca from marcas ";
        $result=$this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }

    public function RecogerGama($id,$nombre){
        $consulta="select * from moto where id_moto=:id and gama=:nombre ";
        $result=$this->conexion->prepare($consulta);
        $result->bindParam(":id",$id);
        $result->bindParam(":nombre",$nombre);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }

    public function RecogerModelo($id){
        $consulta="select * from moto where id=:id";
        $result=$this->conexion->prepare($consulta);
        $result->bindParam(":id",$id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function RecogerMotosGama($tipo){
        $consulta="select id,nombre,imagen,precio,gama from moto where gama=:nombre";
        $result=$this->conexion->prepare($consulta);
        $result->bindParam(":nombre",$tipo);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function ComprobarFecha($fecha, $usuario)
    {
        $consulta = "select * from reserva where fecha=:fecha AND usuario=:usuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":fecha", $fecha);
        $result->bindParam(":usuario", $usuario);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }
    public function ComprobarReservas($fecha, $hora,$usuario) //poner aula
    {
        $consulta = "select * from reserva where fecha=:fecha AND hora=:hora AND usuario=:usuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":fecha", $fecha);
        $result->bindParam(":hora", $hora);
        $result->bindParam(":usuario",$usuario);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }

    /*La funcion ReservarAulas crea  una nueva  reserva con  los datos que se les pasa  */

    public function ReservarReservas($fecha,  $hora, $usuario)
    {
        $consulta = "insert into reserva (fecha,hora,usuario) values(?,?,?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $fecha);
        $result->bindParam(2, $hora);
        $result->bindParam(3, $usuario);
        $result->execute();
        return $result;
    }

    
    public function EliminarReseva($fecha, $hora, $usuario)
    {
        $consulta = "delete from reserva where fecha=:fecha  AND hora=:hora AND usuario=:usuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':fecha', $fecha);
        $result->bindParam(":hora", $hora);
        $result->bindParam(":usuario", $usuario);
        $result->execute();
        return $result;
    }

}
