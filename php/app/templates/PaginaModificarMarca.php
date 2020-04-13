<?php ob_start() ?>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="justify-content-center" id="fr">
            <form class="needs-validation text-light" id="FormModificarMarcas" enctype="multipart/form-data" marca="<?php if(isset($BDMarca)){echo $BDMarca[0][0];}?>">
                <h1 class="text-center">Formulario</h1>
                <div class="form-row mt-5">
                <div class="col-md-12 mb-2">
                        <label for="Marca">Identificador de marca</label>
                        <input type="text" class="form-control" name="id" id="id_marca" pattern="[0-9]{3,50}$" title="Solo caracteres de 3 a 50" tabindex="1" required value="<?php if(isset($BDMarca)){echo $BDMarca[0][0];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="Marca">Marca</label>
                        <input type="text" class="form-control" name="marca" id="Marca" pattern="[A-Za-z]{3,50}$" title="Solo caracteres de 3 a 50" tabindex="1" required value="<?php if(isset($BDMarca)){echo $BDMarca[0][1];}?>">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                   
                    <div class="col-md-12 mb-2">
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
                            <input class="btn btn-success mt-5" type="submit" name="guardar" value="Guardar" >
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