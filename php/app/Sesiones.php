<?php


class Sesion extends PDO
{
    

    public function __construct()
    {
        session_start();
    } 

    public function IniciarSesion($nombre,$valor){
        $_SESSION[$nombre]=$valor;
    }
    
  /*   public function MostrarDatos($nombre){
        return $_SESSION[$nombre];
    } */

    public function CerrarSesion(){
        session_destroy();
        session_unset();
    }
}