<?php ob_start() ?>
<div class="row" >
    <div class="col-2"></div>
    <div class="col-8 ">
        <form class="needs-validation text-light" id="InicioSesion">
            <h1 class="text-center">Inicio Sesion </h1>
            <div class="form-row mt-5">
                <div class="col-md-6 mb-2">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" pattern="[0-9A-za-z_]{3,50}?" title="El usuario permite letras como numeros y _ de 3 a 50 caracteres" tabindex="1" required value="<?php if (isset($usuario)) {
                                                                                                                                                                                                                                echo $usuario;
                                                                                                                                                                                                                            } ?>">
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="pass1">Contraseña</label>
                    <input type="password" class="form-control" name="pass" id="pass1" pattern="[A-Za-z0-9]{8,}" title="La contraseña tiene ser numeros y letras como minimo 8 caracteres" tabindex="3" required value="<?php if (isset($pass)) {
                                                                                                                                                                                                                            echo $pass;
                                                                                                                                                                                                                        } ?>">
                    <div class="invalid-tooltip">
                        Please provide a valid password.
                    </div>
                </div>
            </div>
            <div class="col-2 mt-2 text-light ">
                <input type="checkbox" class="form-check-input" id="Check" name="conditions">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="d-flex mt-5">
                <div class="col-6">
                    <input class="btn btn-danger" type="submit" name="iniciar" value="Entrar">
                </div>
                <div class=" col-6">
                    <a href="index.php?operacion=MostrarformAlt" class="btn btn-danger">Registrarse</a>
                </div>
            </div>
            <div id="textError" class="mt-5">
            <?php if(isset($errores)){ echo "<p> $errores </p>";} ?>
        </div>
        </form>
       
    </div>
    <div class="col-2"></div>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>