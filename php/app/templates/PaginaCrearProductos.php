<?php ob_start() ?>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="justify-content-center" id="fr">
            <form class="needs-validation text-light" id="OPProducto" enctype="multipart/form-data" marca="<?php if(isset($marca)){echo $marca;}?>">
                <h1 class="text-center">Formulario</h1>
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="Nombre" pattern="[A-Za-z0-9]{3,50}$" title="Solo caracteres de 3 a 50" tabindex="1" required value="<?php if(isset($nombre)){echo $nombre;}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="Cilindrada">Cilindrada</label>
                        <input type="text" class="form-control" name="cilindrada" id="Cilindrada" pattern="[0-9]{3,5}$" title="Solo numeros de 3 a 5" tabindex="1" required value="<?php if(isset($cilindrada)){echo $cilindrada;}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                   
                </div>
                <div class="form-row">
                <div class="col-md-6 mb-2">
                        <label for="Caballos">Caballos</label>
                        <input type="text" class="form-control" name="caballos" id="Caballos" pattern="[0-9]{1,}$" title="Solo numeros como minimo 1" tabindex="1" required value="<?php if(isset($caballos)){echo $caballos;}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
              
                    <div class="col-md-6 mb-2">
                        <label for="edad">Tipo carnet</label>
                        <select class="col-12" name="tipoCarnet" id="tipoCarnet">
                            <option value=''> </option>
                            <option value='am'>AM</option>
                            <option value='a1'>A1</option>
                            <option value='a2'>A2</option>
                            <option value='a'>A</option>
                            <option value='b'>B</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                <div class="col-md-6 mb-2">
                        <label for="Precio">Precio</label>
                        <input type="text" class="form-control" name="precio" id="Precio" pattern="^[0-9]{1,}$" title="Como minimo tiene que terner un numero" tabindex="1" required value="<?php if(isset($numero)){echo $numero[0][6];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="edad">Gama</label>
                        <select class="col-12" name="Gama" id="Gama">
                            <option value=''> </option>
                            <option value='SuperSport'>Super Sport</option>
                            <option value='Touring'>Touring</option>
                            <option value='Adventure'>Adventure</option>
                            <option value='Naked'>Naked</option>
                            <option value='Custom'>Custom</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-2">
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
                            <input class="btn btn-success mt-5" type="submit" name="guardar" value="Guardar" id="OPProducto">
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