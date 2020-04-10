<?php
/*En la clase config se guarda los diferentes valores que luego lo utilizaremos en diferentes paginas son valores fijos que no cambian */
class Config
{
static public $mvc_bd_hostname = "localhost";
static public $mvc_bd_nombre = "proyectofinal";
static public $mvc_bd_usuario = "root";
static public $mvc_bd_clave = "";
static public $mvc_vis_css = "estilo.css";
static public $dir_persona="C:/xampp/htdocs/proyectoFinal/imagenes/usuario";
static public $dir_marca="C:/xampp/htdocs/proyectoFinal/imagenes/marca";
static public $dir_producto="C:/xampp/htdocs/proyectoFinal/imagenes/producto";
static public $extensionesValidas=["image/jpeg", "image/gif", "image/png"];
}
?>