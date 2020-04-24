<?php ob_start() ?>

<div>
    <div class="container justify-content-around ">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 mt-5">
                <div class="row">
                    <div class="col-3">
                        <hr class=" bg-danger">
                    </div>
                </div>
                <h2 class="text-danger">CENTRO DE ATENCIÓN AL CLIENTE MOTOS CART</h2>
                <hr class=" bg-danger">
            </div>
            <div class="2"></div>
        </div>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8">
                <h4>Te invitamos a que compartas tus dudas, comentarios, consultas e inquietudes con Motos Card</h4>
                <p class="mt-4">Queremos que sientas que recibes el mejor servicio de atención al cliente posible y trabajamos día a día para que así sea. Si tienes cualquier duda sobre nuestros productos o servicios, ¡no dudes en preguntarnos!</p>
            </div>
            <div class="col-2"></div>
        </div>
        <div class=" row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Lunes</th>
                        <th scope="col">A</th>
                        <th scope="col">Viernes</th>
                        <th scope="col">Sabado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Mañanas</td>
                        <td></td>
                        <td></td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>09:00h</td>
                        <td> A</td>
                        <td>13:00h</td>
                        <td>09:00h -- 13:00h </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Tardes</td>
                        <td></td>
                        <td></td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>16:00h</td>
                        <td> A</td>
                        <td>21:00h</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col-2"></div>
            <div class="col-3 contacto">
                <h4 class="mt-4"><i class="fas fa-phone-square-alt"></i> 902 026 100</h4>
            </div>
            <div class="col-1"></div>
            <div class="col-4 contacto" id="MostarConcesionario">
                <h4 class="mt-4"><i class="fas fa-mouse-pointer"></i> Concesionario Motos Cart</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-3">
                <p> Llamando a nuestro Servicio de Atención al cliente </p>
            </div>
            <div class="col-1"></div>
            <div class="col-4">
                <p> Directamente en nuestro Concesionario <br> Clika encima de Concesionarios para mostrartelos</p>

            </div>
            <div class="row mt-4" id="concesionario">

            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-1 "></div>
            <div class="col-9">
                <form class="needs-validation " id="Contactanos">
                    <h5 class="text-center">Contacta traves de nuestro Formulario On-line</h5>
                    <div class="form-row mt-5">
                        <div class="col-md-2 mb-2"></div>
                        <div class="col-md-5 mb-2">
                            <label for="Nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="Nombre" pattern="[A-Za-z]{3,50}$" title="Solo caracteres de 3 a 50" tabindex="1" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="Apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellido" id="Apellidos" pattern="[A-Za-z]{3,50}$" title="Solo caracteres de 3 a 50" tabindex="1" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2 mb-2"></div>
                        <div class="col-md-5 mb-2">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" pattern="^[6][0-9]{8}$" title="Empieza por 6 seguido de 8 numeros" tabindex="1" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="Email">Email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                </div>
                                <input type="email" class="form-control" name="email" id="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Tu E-Mail correcto" tabindex="2" required>
                                <div class=" valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2 mb-2"></div>
                        <div class="col-md-5 mb-2">
                            <label>Escriba la duda que tenga:</label>
                            <textarea name="texto" rows="6" cols="95" id="texto"></textarea>
                        </div>
                        <div class="col-md-5 mb-2"></div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2 mb-2"></div>
                        <div class="col-md-5 mb-2">
                            <input class="btn btn-danger mt-5" type="submit" name="duda" value="Enviar">
                        </div>
                        <div class="col-md-5 mb-2"></div>

                    </div>
                </form>
                <div id="textError" class="mt-5">
                    <?php if (isset($errores)) {
                        echo "<p> $errores </p>";
                    } ?>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8">
                <h4>Tambien pueden vernos en las redes sociales</h4><br>
                <p><i class="fab fa-instagram"></i><a href="https://www.instagram.com/?hl=es" class="text-danger"> Instagram</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-facebook-square icono"></i> <a href="https://www.facebook.com/" class="text-danger">Facebook</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-twitter icono"></i> <a href="https://twitter.com/explore" class="text-danger">Twitter</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-youtube"></i> <a href="https://www.youtube.com/" class="text-danger">Youtube</a></p>




            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>










<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php'; ?>