<?php
class Validacion
{

    protected $_atributos;

    protected $_error;

    public $mensaje;

    /**
     * Metodo para indicar la regla de validacion
     * El método retorna un valor verdadero si la validación es correcta, de lo contrario retorna el objeto
     * actual, permitiendo acceder al atributo Validacion::$mensaje ya que es publico
     */
    public function rules($rule = array(), $data)
    {

        if (!is_array($rule)) {
            $this->mensaje = "las reglas deben de estar en formato de arreglo";
            return $this;
        }
        foreach ($rule as $key => $rules) {
            $reglas = explode(',', $rules['regla']);
            if (array_key_exists($rules['name'], $data)) {
                foreach ($data as $indice => $valor) {
                    if ($indice === $rules['name']) {
                        foreach ($reglas as $clave => $valores) {
                            $validator = $this->_getInflectedName($valores);
                            if (!is_callable(array(
                                $this,
                                $validator
                            ))) {
                                throw new BadMethodCallException("No se encontro el metodo $valores");
                            }
                            $respuesta = $this->$validator($rules['name'], $valor);
                        }
                        break;
                    }
                }
            } else {

                $this->mensaje[$rules['name']] = "el campo {$rules['name']} no esta dentro de la regla de validación o en el formulario";
            }
        }
        if (!empty($this->mensaje)) {
            return $this;
        } else {
            return true;
        }
    }

    /**
     * Metodo inflector de la clase
     * por medio de este metodo llamamos a las reglas de validacion que se generen
     */
    private function _getInflectedName($text)
    {
        $validator = "";
        $_validator = preg_replace('/[^A-Za-z0-9]+/', ' ', $text);
        $arrayValidator = explode(' ', $_validator);
        if (count($arrayValidator) > 1) {
            foreach ($arrayValidator as $key => $value) {
                if ($key == 0) {
                    $validator .= "_" . $value;
                } else {
                    $validator .= ucwords($value);
                }
            }
        } else {
            $validator = "_" . $_validator;
        }

        return $validator;
    }

    /**
     * Metodo de verificacion de que el dato no este vacio o NULL
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _noEmpty($campo, $valor)
    {
        if (isset($valor) && !empty($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe de estar lleno";
            return false;
        }
    }

    /**
     * Metodo de verificacion de tipo numerico
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _numeric($campo, $valor)
    {
        if (is_numeric($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe de ser numerico";
            return false;
        }
    }
    /**
     * Metodo de ValidarUsuario 
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _ValidarUsuario($campo, $valor)
    {

        if (preg_match("/^[a-z0-9_]{5,50}$/iu", $valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "Lo sentimos el $campo no esta bien introducido , tiene que tener de 5 a 50 caracteres o _";
            return false;
        }
    }

    /**
     * Metodo de ValidarPasswd 
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _ValidarPasswd($campo, $valor)
    {
        if (preg_match("/^[a-z0-9_]{8,50}$/iu", $valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "Lo sentimos el $campo no esta bien introducido, tiene que tener de 8 a 50 caracteres o _";
            return false;
        }
    }

    /**
     * Metodo de email 
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _email($campo, $valor)
    {
        if (filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo de estar en el formato de email usuario@servidor.com";
            return false;
        }
    }
    /**
     * Metodo de ValidarTexto
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _ValidarTexto($campo, $valor)
    {
        if (preg_match("/^[a-z]{3,100}$/iu", $valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "Lo sentimos el $campo no esta bien introducido, tiene que tener de 3 a 100 caracteres o _";
            return false;
        }
    }
    /**
     * Metodo de ValidarDni
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _ValidarDni($campo, $valor)
    {
        if (preg_match("/^[0-9]{7,8}[A-Z]$/", $valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "Lo sentimos el $campo no esta bien introducido, tiene que tener de 8 a 50 caracteres o _";
            return false;
        }
    }
    /**
     * Metodo de ValidarTelefono
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _ValidarTelefono($campo, $valor)
    {
        if (preg_match("/^[6][0-9]{8}$/", $valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "Lo sentimos el $campo no esta bien introducido, tiene que tener de 8 a 50 caracteres o _";
            return false;
        }
    }
    /**
     * Metodo de ValidarCP 
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _ValidarCP($campo, $valor)
    {
        if (preg_match("/^[0-9]{5}$/", $valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "Lo sentimos el $campo no esta bien introducido, tiene que tener de 8 a 50 caracteres o _";
            return false;
        }
    }
    /**
     * Metodo de ValidarDireccion 
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _ValidarDireccion($campo, $valor)
    {
        if (preg_match("/^(c|calle|p|paseo|av|avenida)[a-z0-9]{3,50}/iu", $valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "Lo sentimos el $campo no esta bien introducido, tiene que tener de 8 a 50 caracteres o _";
            return false;
        }
    }
     /**
     * Metodo de ValidarEdad
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */

    protected function _ValidarEdad($campo, $valor)
    {
        $format="Y-m-d";
        if(date($format, strtotime($valor)) == date($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "Lo sentimos el $campo no esta bien introducido, tiene que tener de 8 a 50 caracteres o _";
            return false;
        }
    }
    function _ValidarImg($nombre, $dir, $extensionesValidas)
    {
        if ($_FILES[$nombre]['error'] != 0) {
            switch ($_FILES[$nombre]['error']) {
                case 1:
                    $errores[$nombre] = "Fichero demasiado grande";
                    break;
                case 2:
                    $errores[$nombre] = 'El fichero es demasiado grande';
                    break;
                case 3:
                    $errores[$nombre] = 'El fichero no se ha podido subir entero';
                    break;
                case 4:
                    $errores[$nombre] = 'No se ha podido subir el fichero';
                    break;
                case 6:
                    $errores[$nombre] = "Falta carpeta temporal";
                    break;
                case 7:
                    $errores[$nombre] = "No se ha podido escribir en el disco";
                    break;
                default:
                    $errores[$nombre] = 'Error indeterminado.';
            }
            return 0;
        } else {

            $nombreArchivo = $_FILES[$nombre]['name'];
            $directorioTemp = $_FILES[$nombre]['tmp_name'];
            $extension = $_FILES['archivo']['type'];
            if (!in_array($extension, $extensionesValidas)) {
                $errores[$nombre] = "La extensión del archivo no es válida o no se ha subido ningún archivo <br>";
                return 0;
            }



            if (is_dir($dir))
                if (move_uploaded_file("./img/" . $directorioTemp, $nombreArchivo)) {
                    return $nombreArchivo;
                } else {
                    $errores[$nombre] = "Error: No se puede mover el fichero a su destino";
                    return 0;
                } else
                $errores[] = "Error: No se puede mover el fichero a su destino";
        }
    }
}
