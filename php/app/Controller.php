<?php
include('libs/utils.php');

class Controller
{

    public function home()
    {
        require __DIR__ . '/templates/home.php';
    }
    public function homeAdmin()
    {
        if (isset($_SESSION['usuario'])) {
            require __DIR__ . '/templates/homeAdmin.php';
        } else {
            require __DIR__ . '/templates/home.php';
        }
    }
    public function iniciarSesion()
    {
        require __DIR__ . '/templates/iniciarSesion.php';
    }
    public function FormIniarSesion()
    {
        try {
            $m = new Model();
            $val = new Validacion();
            $usuario = recoge("usuario");
            $pass = recoge("pass");
            $remember = recoge("remember");
            $valor['usuario'] = $usuario;
            $valor['pass'] = $pass;
            $datos = $valor;
            $regla = array(
                array(
                    'name' => 'usuario',
                    'regla' => 'no-empty,ValidarUsuario'
                ),
                array(
                    'name' => 'pass',
                    'regla' => 'no-empty,ValidarPasswd'
                )
            );
            $resultado = $val->rules($regla, $datos);
            if ($resultado === true) {
                $resultadoBD = $m->BuscarUsuario($usuario);
                if (!empty($resultadoBD)) {
                    $passwordBD = $resultadoBD[0][1];
                    $password = crypt($pass, $passwordBD);
                    if ($passwordBD == $password) {
                        Sesion::iniciarSesion("recordarUsuario", $remember);
                        Sesion::iniciarSesion("usuario", $resultadoBD[0][0]);
                        Sesion::iniciarSesion("nivel", $resultadoBD[0][2]);
                        $params = $_SESSION['nivel'];
                    } else {
                        $params = "Lo sentimos la contraseña no es correcta revisala";
                    }
                } else {
                    $params = "Lo sentimos no se ha encontrado a ningun usuario con ese nombre";
                }
            } else {
                $params = "Lo sentimos los datos introducidos no son correctos revisalos";
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?operacion=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?operacion=error');
        }

        require __DIR__ . '/templates/json.php';
    }
    public function SubirImgPersona()
    {
     
        if ($_FILES) {
            foreach ($_FILES as $file) {
                if ($file["error"] == UPLOAD_ERR_OK) {
                    // movemos el archivo a la carpeta donde se encuentra este archivo  
                    move_uploaded_file($file["tmp_name"], Config::$dir_persona.'/'.$file["name"]);
                   $valor=Config::$dir_persona.'/'.$file["name"];

                }
            }
            
        } else {

            $valor=false;

            $ok = 0;
        }
        # devolvemos un json con la información
        echo $valor;
    } 
    public function SubirImgMarca()
    {
     
        if ($_FILES) {
            foreach ($_FILES as $file) {
                if ($file["error"] == UPLOAD_ERR_OK) {
                    // movemos el archivo a la carpeta donde se encuentra este archivo  
                    move_uploaded_file($file["tmp_name"], Config::$dir_marca.'/'.$file["name"]);
                   $valor=Config::$dir_marca.'/'.$file["name"];

                }
            }
            
        } else {

            $valor=false;

            $ok = 0;
        }
        # devolvemos un json con la información
        echo $valor;
    } 
    public function SubirImgProducto()
    {
     
        if ($_FILES) {
            foreach ($_FILES as $file) {
                if ($file["error"] == UPLOAD_ERR_OK) {
                    // movemos el archivo a la carpeta donde se encuentra este archivo  
                    move_uploaded_file($file["tmp_name"], Config::$dir_producto.'/'.$file["name"]);
                   $valor=Config::$dir_producto.'/'.$file["name"];

                }
            }
            
        } else {

            $valor=false;

            $ok = 0;
        }
        # devolvemos un json con la información
        echo $valor;
    } 
    public function MostrarformAlt()
    {
        require __DIR__ . '/templates/formAlt.php';
    }
    public function formAlt()
    {

        try {
            $m = new Model();
            $val = new Validacion();
            $nombre = recoge("nombre");
            $apellido = recoge("apellidos");
            $dni = recoge("dni");
            $edad = recoge("edad");
            $telefono = recoge("telefono");
            $email = recoge("email");
            $cp = recoge("cp");
            $direccion = recoge("direccion");
            $provincia = recoge("provincia");
            $img = recoge("img");
            $usuario = recoge("usuario");
            $pass = recoge("pass");

            $valor['nombre'] = $nombre;
            $valor['apellido'] = $apellido;
            $valor['dni'] = $dni;
            $valor['edad'] = $edad;
            $valor['telefono'] = $telefono;
            $valor['email'] = $email;
            $valor['cp'] = $cp;
            $valor['direccion'] = $direccion;
            $valor['provincia'] = $provincia;
            /* $valor['img'] = $img; */
            $valor['usuario'] = $usuario;
            $valor['pass'] = $pass;
            $datos = $valor;

            $regla = array(
                array(
                    'name' => 'usuario',
                    'regla' => 'no-empty,ValidarUsuario'
                ),
                array(
                    'name' => 'pass',
                    'regla' => 'no-empty,ValidarPasswd'
                ),
                array(
                    'name' => 'email',
                    'regla' => 'no-empty,email'
                ),
                array(
                    'name' => 'nombre',
                    'regla' => 'no-empty,ValidarTexto'
                ),
                array(
                    'name' => 'apellido',
                    'regla' => 'no-empty,ValidarTexto'
                ),
                array(
                    'name' => 'provincia',
                    'regla' => 'no-empty'
                ),
                array(
                    'name' => 'dni',
                    'regla' => 'no-empty,ValidarDni'
                ),
                array(
                    'name' => 'telefono',
                    'regla' => 'no-empty,ValidarTelefono'
                ),
                array(
                    'name' => 'cp',
                    'regla' => 'no-empty,ValidarCP'
                ),
                array(
                    'name' => 'direccion',
                    'regla' => 'no-empty,ValidarDireccion'
                ),
                array(
                    'name' => 'edad',
                    'regla' => 'no-empty,ValidarEdad'
                )/* ,
                    array(
                        'name' => 'img',
                        'regla' => 'no-empty,ValidarImg'
                    ) */

            );
            $resultado = $val->rules($regla, $datos);
            if ($resultado === true) {
                $BDPersona = $m->BuscarPersona();
                if (empty($BDPersona)) {
                    $cont = $this->crypt_blowfish($pass);
                    if ($m->InsertarPersona($nombre, $apellido, $dni, $edad, $telefono, $email, $cp, $direccion, $provincia, $img, $usuario) && $m->InsertarUsuario($usuario, $cont)) {
                        $params = 0;
                    } else {
                        $params = "Lo sentimos no se pudo subir los datos en la base de datos";
                    }
                } else {
                    if ($BDPersona[0][0] != $dni) {
                        if ($BDPersona[0][3] != $usuario) {
                            $cont = $this->crypt_blowfish($pass);
                            if ($m->InsertarPersona($nombre, $apellido, $dni, $edad, $telefono, $email, $cp, $direccion, $provincia, $img, $usuario, $cont) && $m->InsertarUsuario($usuario, $cont)) {
                                $params = 0;
                            } else {
                                $params = "Lo sentimos no se pudo subir los datos en la base de datos";
                            }
                        } else {
                            $params = "Lo sentimos el usuario ya existe, tiene que tener uno distinto a los demas";
                        }
                    } else {
                        $params = "Lo sentimos usted ya esta registrado en la base de datos";
                    }
                }
            } else {

                foreach ($resultado as $valor => $k) {
                    foreach ($k as $v => $s) {
                        $params = $s[1];
                    }
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?operacion=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?operacion=error');
        }

        require __DIR__ . '/templates/json.php';
    }
    //La funcion crypt_blowfish(), se le pasa una variable con el valor de la contraseña , se encarga de encriptarla con la cadena de $salt
    public function crypt_blowfish($password)
    {
        $salt = '$2a$07$usesomesillystringforsalt$';
        $pass = crypt($password, $salt);
        return $pass;
    }

    public function ComprobarSesion()
    {
        if (isset($_SESSION['usuario'])) {
            $params = $_SESSION['usuario'];
        } else {
            $params = 1;
        }
        require __DIR__ . '/templates/json.php';
    }
    public function CerrarSesion()
    {
        Sesion::CerrarSesion();
        $params = 0;
        require __DIR__ . '/templates/json.php';
    }
    public function contacto()
    {
        require __DIR__ . '/templates/contacto.php';
    }
    public function contactanos()
    {
        try {
            $val = new Validacion();
            $nombre = recoge("nombre");
            $apellido = recoge("apellidos");
            $telefono = recoge("telefono");
            $email = recoge("email");
            $texto = recoge("texto");
            $valor['nombre'] = $nombre;
            $valor['apellido'] = $apellido;
            $valor['telefono'] = $telefono;
            $valor['email'] = $email;
            $datos = $valor;
            $regla = array(

                array(
                    'name' => 'nombre',
                    'regla' => 'no-empty,ValidarTexto'
                ),
                array(
                    'name' => 'apellido',
                    'regla' => 'no-empty,ValidarTexto'
                ),
                array(
                    'name' => 'email',
                    'regla' => 'no-empty,email'
                ),
                array(
                    'name' => 'telefono',
                    'regla' => 'no-empty,ValidarTelefono'
                )
            );
            $resultado = $val->rules($regla, $datos);
            if ($resultado === true) {
                $cuerpo = "Buenas $nombre  $apellido
                No contestar a este correo se genera automaticamente, en breves momentos uno de nuestros empleados se pondra en contacto
                con usted para aclararle :
                $texto
                En caso de que no recibamos ninguna respuesta con el email de la solucion al cabo de 1 dia le llamaremos";
                $to = "terectico2017@gmail.com";
                $subject = "accessed the webpage";
                $message = $cuerpo;
                $headers = "From:" . $email;
                if (mail($to, $subject, $message, $headers)) {
                    $params = 0;
                } else {
                    $params = 'Sorry, the email could not be sent';
                }
            } else {

                foreach ($resultado as $valor => $k) {
                    foreach ($k as $v => $s) {
                        $params = $s[1];
                    }
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?operacion=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?operacion=error');
        }

        require __DIR__ . '/templates/json.php';
    }

    public function OpUsuarios()
    {
        require __DIR__ . '/templates/OpUsuarios.php';
    }
    public function OpProductos()
    {
        require __DIR__ . '/templates/OpProductos.php';
    }
    public function Opfechas()
    {
        require __DIR__ . '/templates/Opfechas.php';
    }
    public function CambioPaginaModUser()
    {
        $seccion = recoge('seccion');
        require __DIR__ . '/templates/CambioPaginaModUser.php';
    }

    public function PaginaMostrarUsuarios()
    {
        $alerta = recoge('alerta');
        $m = new Model();
        $usuarios = $m->MostrarUsuarios();
        require __DIR__ . '/templates/PaginaMostrarUsuarios.php';
    }
    public function PaginaModificarPermisos()
    {
        $m = new Model();
        $usuarios = $m->MostrarUsuarios();
        require __DIR__ . '/templates/PaginaModificarPermisos.php';
    }
    public function PaginaModificarValores()
    {
        $m = new Model();
        $usuario = recoge("usuario");
        $persona = $m->MostrarPersona($usuario);
        require __DIR__ . '/templates/PaginaModificarValores.php';
    }
    public function PaginaEliminarUsuaio()
    {
        require __DIR__ . '/templates/PaginaEliminarUsuaio.php';
    }

    public function MostrarPersona()
    {
        $m = new Model();
        $persona = recoge('user');
        $datos = $m->MostrarPersona($persona);
        require __DIR__ . '/templates/MostrarPersona.php';
    }

    public function ModificarPermisos()
    {
        $m = new Model();

        $usuario = recoge("usuario");
        $valor = recoge("valor");
        if ($m->ModificarPermisos($usuario, $valor)) {
            $params = true;
        } else {

            $params = false;
        }
        require __DIR__ . '/templates/json.php';
    }

    public function ActualizarPersona()
    {

        try {
            $m = new Model();
            $val = new Validacion();
            $nombre = recoge("nombre");
            $apellido = recoge("apellidos");
            $dni = recoge("dni");
            $edad = recoge("edad");
            $telefono = recoge("telefono");
            $email = recoge("email");
            $cp = recoge("cp");
            $direccion = recoge("direccion");
            $provincia = recoge("provincia");
            $img = recoge("img");


            if($provincia!="" && $img!=""){

            $usuario = recoge("usuario");
            $valor['nombre'] = $nombre;
            $valor['apellido'] = $apellido;
            $valor['dni'] = $dni;
            $valor['edad'] = $edad;
            $valor['telefono'] = $telefono;
            $valor['email'] = $email;
            $valor['cp'] = $cp;
            $valor['direccion'] = $direccion;
            $valor['provincia'] = $provincia;
            $valor['usuario'] = $usuario;
            $datos = $valor;

            $regla = array(
                array(
                    'name' => 'usuario',
                    'regla' => 'no-empty,ValidarUsuario'
                ),
                array(
                    'name' => 'email',
                    'regla' => 'no-empty,email'
                ),
                array(
                    'name' => 'nombre',
                    'regla' => 'no-empty,ValidarTexto'
                ),
                array(
                    'name' => 'apellido',
                    'regla' => 'no-empty,ValidarTexto'
                ),
                array(
                    'name' => 'provincia',
                    'regla' => 'no-empty'
                ),
                array(
                    'name' => 'dni',
                    'regla' => 'no-empty,ValidarDni'
                ),
                array(
                    'name' => 'telefono',
                    'regla' => 'no-empty,ValidarTelefono'
                ),
                array(
                    'name' => 'cp',
                    'regla' => 'no-empty,ValidarCP'
                ),
                array(
                    'name' => 'direccion',
                    'regla' => 'no-empty,ValidarDireccion'
                ),
                array(
                    'name' => 'edad',
                    'regla' => 'no-empty,ValidarEdad'
                )
            );
        }else{
            $usuario = recoge("usuario");
            $valor['nombre'] = $nombre;
            $valor['apellido'] = $apellido;
            $valor['dni'] = $dni;
            $valor['edad'] = $edad;
            $valor['telefono'] = $telefono;
            $valor['email'] = $email;
            $valor['cp'] = $cp;
            $valor['direccion'] = $direccion;
            $valor['usuario'] = $usuario;
            $datos = $valor;

            $regla = array(
                array(
                    'name' => 'usuario',
                    'regla' => 'no-empty,ValidarUsuario'
                ),
                array(
                    'name' => 'email',
                    'regla' => 'no-empty,email'
                ),
                array(
                    'name' => 'nombre',
                    'regla' => 'no-empty,ValidarTexto'
                ),
                array(
                    'name' => 'apellido',
                    'regla' => 'no-empty,ValidarTexto'
                ),
                array(
                    'name' => 'dni',
                    'regla' => 'no-empty,ValidarDni'
                ),
                array(
                    'name' => 'telefono',
                    'regla' => 'no-empty,ValidarTelefono'
                ),
                array(
                    'name' => 'cp',
                    'regla' => 'no-empty,ValidarCP'
                ),
                array(
                    'name' => 'direccion',
                    'regla' => 'no-empty,ValidarDireccion'
                ),
                array(
                    'name' => 'edad',
                    'regla' => 'no-empty,ValidarEdad'
                )
            );
        }
            $resultado = $val->rules($regla, $datos);
            if ($resultado === true) {
                if ($m->ActualizarPersona($nombre, $apellido, $dni, $edad, $telefono, $email, $cp, $direccion, $provincia, $img, $usuario) && $m->InsertarUsuario($usuario, $cont)) {
                    $params = 0;
                } else {
                    $params = "Lo sentimos no se pudo actualizar los datos en la base de datos";
                }
            } else {
                foreach ($resultado as $valor => $k) {
                    foreach ($k as $v => $s) {
                        $params = $s[1];
                    }
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?operacion=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?operacion=error');
        }

        require __DIR__ . '/templates/json.php';
    }
    public function EliminarPersona()
    {
        $m = new Model();
        $usuario = recoge('user');
        if ($m->EliminarUsuario($usuario) && $m->EliminarPersona($usuario)) {
            $params = "La eliminacion se hizo satisfactoriamente";
        } else {
            $params = "Lo sentimos huvo un error vuelve a probarlo";
        }
        require __DIR__ . '/templates/json.php';
    }
    public function PaginaMarcas()
    {
        require __DIR__ . '/templates/PaginaMarcas.php';
    }
    public function PaginaProducto()
    {
        require __DIR__ . '/templates/PaginaProducto.php';
    }
    public function  CambioPaginaModMarcas()
    {
        $seccion = recoge('seccion');
        require __DIR__ . '/templates/CambioPaginaModMarcas.php';
    }
    public function PaginaMostrarMarcas(){
        $m = new Model();
        $alerta = recoge('alerta');
        $datos = $m->MostrarMarcas();
        require __DIR__ . '/templates/PaginaMostrarMarcas.php';

    }

   
}
