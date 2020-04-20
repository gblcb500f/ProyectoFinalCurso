<?php
// web/index.php
// carga del modelo y los controladores
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';
require_once __DIR__ . '/../app/Sesiones.php';
require_once __DIR__ . '/../app/libs/Validar.php';
// enrutamiento  En el array $map tendremos la informacion del nombre de la funcion que se encuentra el controlador y el acceso que tiene cada usuario
$map = array(
    'home' => array('controller' =>'Controller', 'action' =>'home', 'acceso'=>0),   
    'FormIniarSesion' => array('controller' =>'Controller', 'action' =>'FormIniarSesion', 'acceso'=>0),
    'iniciarSesion' => array('controller' =>'Controller', 'action' =>'iniciarSesion', 'acceso'=>0),
    'SubirImgPersona' => array('controller' =>'Controller', 'action' =>'SubirImgPersona', 'acceso'=>0),
    'MostrarformAlt'=>array('controller'=>'Controller','action'=>'MostrarformAlt','acceso'=>0),
    'formAlt'=>array('controller'=>'Controller','action'=>'formAlt','acceso'=>0),
    'ComprobarSesion'=>array('controller'=>'Controller','action'=>'ComprobarSesion','acceso'=>0),
    'CerrarSesion'=>array('controller'=>'Controller','action'=>'CerrarSesion','acceso'=>0),
    'contacto'=>array('controller'=>'Controller','action'=>'contacto','acceso'=>0),
    'contactanos'=>array('controller'=>'Controller','action'=>'contactanos','acceso'=>0),
    'homeAdmin' => array('controller' =>'Controller', 'action' =>'homeAdmin', 'acceso'=>1),
    'OpUsuarios' => array('controller' =>'Controller', 'action' =>'OpUsuarios', 'acceso'=>1),
    'OpProductos' => array('controller' =>'Controller', 'action' =>'OpProductos', 'acceso'=>1),
    'Opfechas' => array('controller' =>'Controller', 'action' =>'Opfechas', 'acceso'=>1),
    'CambioPaginaModUser' => array('controller' =>'Controller', 'action' =>'CambioPaginaModUser', 'acceso'=>1),
    'PaginaMostrarUsuarios' => array('controller' =>'Controller', 'action' =>'PaginaMostrarUsuarios', 'acceso'=>1),
    'PaginaModificarPermisos' => array('controller' =>'Controller', 'action' =>'PaginaModificarPermisos', 'acceso'=>1),
    'PaginaModificarValores' => array('controller' =>'Controller', 'action' =>'PaginaModificarValores', 'acceso'=>1),
    'PaginaEliminarUsuaio' => array('controller' =>'Controller', 'action' =>'PaginaEliminarUsuaio', 'acceso'=>1),
    'MostrarPersona' => array('controller' =>'Controller', 'action' =>'MostrarPersona', 'acceso'=>1),
    'ModificarPermisos' => array('controller' =>'Controller', 'action' =>'ModificarPermisos', 'acceso'=>1),
    'ActualizarPersona' => array('controller' =>'Controller', 'action' =>'ActualizarPersona', 'acceso'=>1),
    'EliminarPersona' => array('controller' =>'Controller', 'action' =>'EliminarPersona', 'acceso'=>1),
    'PaginaMarcas' => array('controller' =>'Controller', 'action' =>'PaginaMarcas', 'acceso'=>1),
    'PaginaProducto' => array('controller' =>'Controller', 'action' =>'PaginaProducto', 'acceso'=>1),
    'SubirImgMarca' => array('controller' =>'Controller', 'action' =>'SubirImgMarca', 'acceso'=>1),
    'SubirImgProducto' => array('controller' =>'Controller', 'action' =>'SubirImgProducto', 'acceso'=>1),
    'CambioPaginaModMarcas' => array('controller' =>'Controller', 'action' =>'CambioPaginaModMarcas', 'acceso'=>1),
    'PaginaMostrarMarcas' => array('controller' =>'Controller', 'action' =>'PaginaMostrarMarcas', 'acceso'=>1),
    'CrearMarcas' => array('controller' =>'Controller', 'action' =>'CrearMarcas', 'acceso'=>1),
    'formCrearMarcas' => array('controller' =>'Controller', 'action' =>'formCrearMarcas', 'acceso'=>1),
    'PaginaModificarMarca' => array('controller' =>'Controller', 'action' =>'PaginaModificarMarca', 'acceso'=>1),
    'ActualizarMarcas' => array('controller' =>'Controller', 'action' =>'ActualizarMarcas', 'acceso'=>1),
    'EliminarMarca' => array('controller' =>'Controller', 'action' =>'EliminarMarca', 'acceso'=>1),
    'CambioPaginaModProductos' => array('controller' =>'Controller', 'action' =>'CambioPaginaModProductos', 'acceso'=>1),
    'PaginaCrearProductos' => array('controller' =>'Controller', 'action' =>'PaginaCrearProductos', 'acceso'=>1),
    'PaginaMostrarProductos' => array('controller' =>'Controller', 'action' =>'PaginaMostrarProductos', 'acceso'=>1),
    'OPProducto' => array('controller' =>'Controller', 'action' =>'OPProducto', 'acceso'=>1),
    'EliminarProducto' => array('controller' =>'Controller', 'action' =>'EliminarProducto', 'acceso'=>1),
    'ModificarProducto' => array('controller' =>'Controller', 'action' =>'ModificarProducto', 'acceso'=>1),
    'GetDia' => array('controller' =>'Controller', 'action' =>'GetDia', 'acceso'=>1),
    'IntFestivo' => array('controller' =>'Controller', 'action' =>'IntFestivo', 'acceso'=>1),
    'EliminarDiaFestivo' => array('controller' =>'Controller', 'action' =>'EliminarDiaFestivo', 'acceso'=>1),
    'ObtenerMarcas' => array('controller' =>'Controller', 'action' =>'ObtenerMarcas', 'acceso'=>0),
    'PaginaMarca' => array('controller' =>'Controller', 'action' =>'PaginaMarca', 'acceso'=>0),



    
    
    

    



);    
// Parseo de la ruta    SubirImg
   
$sesion= new Sesion();   //creamos una sesion de nivel con nivel 0 por defecto 
if(!isset($_SESSION['nivel'])){
    $_SESSION['nivel']=0;
}

if (isset($_REQUEST['operacion'])) {  //comprovamos que existe la variable operacion y el valor este en el array $map
    if (isset($map[$_REQUEST['operacion']])) {
        $ruta = $_REQUEST['operacion'];
    } else {
      
       echo $_REQUEST['operacion']." ---  Lo sentimos la ruta especificada no existe :(";
    }
} else {
    $ruta = 'home';
}

$controlador = $map[$ruta];

// Ejecución del controlador asociado a la ruta y comprovamos el nivel del usuario si puede acceder o no a la ruta
if (method_exists($controlador['controller'], $controlador['action']) && ($controlador['acceso']==0 || $controlador['acceso']<=$_SESSION['nivel'])) {
    call_user_func(array(
        new $controlador['controller'],
        $controlador['action']
    ));
} else {
    if(!($controlador['acceso']==0 || $controlador['acceso']<=$_SESSION['nivel'])){
        echo "Lo sentimos no tiene permisos para acceder a este sitio";
    }else{
        echo " Lo sentimos la ejecucion espefificada no existe :(";
}
}
