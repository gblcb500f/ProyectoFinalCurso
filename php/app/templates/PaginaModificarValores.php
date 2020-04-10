<?php ob_start() ?>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="justify-content-center" id="fr">
            <form class="needs-validation text-light" id="ActualizarDatosUsuario" enctype="multipart/form-data" usuario="<?php if(isset($persona)){echo $persona[0][3];}?>">
                <h1 class="text-center">Formulario</h1>
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="Nombre" pattern="[A-Za-z]{3,50}$" title="Solo caracteres de 3 a 50" tabindex="1" required value="<?php if(isset($persona)){echo $persona[0][1];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="Apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" id="Apellidos" pattern="[A-Za-z]{3,50}$" title="Solo caracteres de 3 a 50" tabindex="1" required value="<?php if(isset($persona)){echo $persona[0][2];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="DNI">DNI</label>
                        <input type="text" class="form-control" name="dni" id="DNI" pattern="[0-9]{7,8}[A-Z]$" title="Empieza por numeros de 7 a 8 segido de una letra en mayuscula" tabindex="1" required value="<?php if(isset($persona)){echo $persona[0][0];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <label for="edad">Edad</label>
                        <input type="date" class="form-control" name="edad" id="edad" pattern="[0-9]{1,3}$" title="Solo el formato fecha dd/mm/aaaa" tabindex="1" required value="<?php if(isset($persona)){echo $persona[0][4];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" pattern="^[6][0-9]{8}$" title="Empieza por 6 seguido de 8 numeros" tabindex="1" required value="<?php if(isset($persona)){echo $persona[0][6];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="Email">Email address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend3">@</span>
                            </div>
                            <input type="email" class="form-control" name="email" id="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Tu E-Mail correcto" tabindex="2" required value="<?php if(isset($persona)){echo $persona[0][5];}?>">
                            <div class=" valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <label for="cp">Codigo Postal</label>
                        <input type="text" class="form-control" name="cp" id="cp" pattern="^[0-9]{5}$" title="Tu Codigo Postal Correcto es de 5 digitos " tabindex="1" required value="<?php if(isset($persona)){echo $persona[0][8];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion"  title="La direccion de tu residencia" tabindex="1" required value="<?php if(isset($persona)){echo $persona[0][9];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-2 mt-2">
                        <label for="provincia">Provincia</label><br>
                        <select class="col-12" name="provincia" id="provincia" value="<?php if(isset($persona)){echo $persona[0][7];}?>">
                            <option value=''> </option>
                            <option value='alava'>Álava</option>
                            <option value='albacete'>Albacete</option>
                            <option value='alicante'>Alicante/Alacant</option>
                            <option value='almeria'>Almería</option>
                            <option value='asturias'>Asturias</option>
                            <option value='avila'>Ávila</option>
                            <option value='badajoz'>Badajoz</option>
                            <option value='barcelona'>Barcelona</option>
                            <option value='burgos'>Burgos</option>
                            <option value='caceres'>Cáceres</option>
                            <option value='cadiz'>Cádiz</option>
                            <option value='cantabria'>Cantabria</option>
                            <option value='castellon'>Castellón/Castelló</option>
                            <option value='ceuta'>Ceuta</option>
                            <option value='ciudadreal'>Ciudad Real</option>
                            <option value='cordoba'>Córdoba</option>
                            <option value='cuenca'>Cuenca</option>
                            <option value='girona'>Girona</option>
                            <option value='laspalmas'>Las Palmas</option>
                            <option value='granada'>Granada</option>
                            <option value='guadalajara'>Guadalajara</option>
                            <option value='guipuzcoa'>Guipúzcoa</option>
                            <option value='huelva'>Huelva</option>
                            <option value='huesca'>Huesca</option>
                            <option value='illesbalears'>Illes Balears</option>
                            <option value='jaen'>Jaén</option>
                            <option value='acoruña'>A Coruña</option>
                            <option value='larioja'>La Rioja</option>
                            <option value='leon'>León</option>
                            <option value='lleida'>Lleida</option>
                            <option value='lugo'>Lugo</option>
                            <option value='madrid'>Madrid</option>
                            <option value='malaga'>Málaga</option>
                            <option value='melilla'>Melilla</option>
                            <option value='murcia'>Murcia</option>
                            <option value='navarra'>Navarra</option>
                            <option value='ourense'>Ourense</option>
                            <option value='palencia'>Palencia</option>
                            <option value='pontevedra'>Pontevedra</option>
                            <option value='salamanca'>Salamanca</option>
                            <option value='segovia'>Segovia</option>
                            <option value='sevilla'>Sevilla</option>
                            <option value='soria'>Soria</option>
                            <option value='tarragona'>Tarragona</option>
                            <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                            <option value='teruel'>Teruel</option>
                            <option value='toledo'>Toledo</option>
                            <option value='valencia'>Valencia/Valéncia</option>
                            <option value='valladolid'>Valladolid</option>
                            <option value='vizcaya'>Vizcaya</option>
                            <option value='zamora'>Zamora</option>
                            <option value='zaragoza'>Zaragoza</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4">
                        <label for="imgU">Inserta una imagen tuya </label>
                        <input class="form-control" type="file" id="idFiles" name="file" >
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">
                        <div class="col-6">
                            <input class="btn btn-success mt-5" type="submit" name="rescribir" value="Rescribir" id="formUp">
                        </div>
                    </div>
                   
                </div>
            </form>
            <div id="textError" class="mt-5">
            <?php if(isset($errores)){ echo "<p> $errores </p>";} ?>
        </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>

<?php $params = ob_get_clean() ?>

<?php include 'json.php' ?>