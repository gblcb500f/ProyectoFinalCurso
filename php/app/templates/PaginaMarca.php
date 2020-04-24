<?php ob_start() ?>
<div class="container ">
    <div class=" row d-flex justify-content-center">
        <div <div class="alert bg-secondary col col-12 mt-5" role="alert" id="MensajeAviso">
            <h5 >En este apartado se mostrara las diferentes gamas disponibles en la tienda con los modelos de la marca seleccionada. <br>
                Solo se mostrara tres motos por gama, para ver mejor los modelos de una gama clika encima del nombre y te llevara a una pagina con todos los modelos de la gama seleccionada. <br>
                Tambien puedes seleccionar el modelo que te guste y te enviara a la pagina del modelo seleccionado con todas las explicaciones acerca de ella </h5>
            <div class="d-flex justify-content-end" id="CerrarAviso">
                <button class="btn btn-dark">Cerrar</button>
            </div>
        </div>
    </div>

    <br>

    <div class="row ">
        <div class="col col-12" id="Naked" marca="<?php echo $BDMarca[0][5];?>"> 
            <h4 class="text-danger">Naked</h4>
        </div>
        <div class="mt-2 sub bg-danger"></div>
    </div>
    <div class="mt-5 row">
        <?php $n = 0;
        for ($i = 0; $i < count($BDMarca); $i++) { ?>
            <?php if ($BDMarca[$i][8] == "Naked") {
                $ruta = $BDMarca[$i][6];
                $palabra = explode('/', $ruta);
                $p = end($palabra);
                if ($n < 3) {  ?>
                <div class="col col-3 modelo" modelo="<?php echo $BDMarca[$i][0];?>">
                        <img class="imgMoto" src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                        <p class="mt-3"><?php echo $BDMarca[$i][1]; ?></p>
                    </div>
                    <div class="col col-1"></div>

            <?php
                }
                $n++;
            }
        }
        if ($n == 0) { ?>
            <h3>Lo sentimos la marca no dispone de ningun modelo de moto de la gama Naked</h3>
            <p>Puede mirar en otra marca si le interesa </p>
        <?php } ?>
    </div>



    <div class="row d-flex justify-content-start">
        <div class="col col-12" id="SuperSport" marca="<?php echo $BDMarca[0][5];?>">
            <h4 class="text-danger">Super Sport</h4>
        </div>
        <div class="mt-2 sub bg-danger"></div>
    </div>
    <div class="mt-5 row ">
        <?php $n = 0;
        for ($i = 0; $i < count($BDMarca); $i++) { ?>
            <?php if ($BDMarca[$i][8] == "SuperSport") {
                $ruta = $BDMarca[$i][6];
                $palabra = explode('/', $ruta);
                $p = end($palabra);
                if ($n < 3) {  ?>
                     <div class="col col-3 modelo" modelo="<?php echo $BDMarca[$i][0];?>">
                        <img class="imgMoto" src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                        <p class="mt-3"><?php echo $BDMarca[$i][1]; ?></p>
                    </div>
                    <div class="col col-1"></div>

            <?php
                }
                $n++;
            }
        }
        if ($n == 0) { ?>
            <h3>Lo sentimos la marca no dispone de ningun modelo de moto de la gama Super Sport</h3>
            <p>Puede mirar en otra marca si le interesa </p>
        <?php } ?>
    </div>


    <div class="row d-flex justify-content-start">
        <div class="col col-12" id="Adventure" marca="<?php echo $BDMarca[0][5];?>">
            <h4 class="text-danger">Adventure</h4>
        </div>
        <div class="mt-2 sub bg-danger"></div>
    </div>
    <div class="mt-5 row ">
        <?php $n = 0;
        for ($i = 0; $i < count($BDMarca); $i++) { ?>
            <?php if ($BDMarca[$i][8] == "Adventure") {
                $ruta = $BDMarca[$i][6];
                $palabra = explode('/', $ruta);
                $p = end($palabra);
                if ($n < 3) {  ?>
             <div class="col col-3 modelo" modelo="<?php echo $BDMarca[$i][0];?>">
                        <img class="imgMoto" src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                        <p class="mt-3"><?php echo $BDMarca[$i][1]; ?></p>
                    </div>
                    <div class="col col-1"></div>

            <?php
                }
                $n++;
            }
        }
        if ($n == 0) { ?>
            <h3>Lo sentimos la marca no dispone de ningun modelo de moto de la gama Adventure</h3>
            <p>Puede mirar en otra marca si le interesa </p>
        <?php } ?>
    </div>


    <div class="row d-flex justify-content-start">
        <div class="col col-12" id="Touring" marca="<?php echo $BDMarca[0][5];?>">
            <h4 class="text-danger">Touring</h4>
        </div>
        <div class="mt-2 sub bg-danger"></div>
    </div>
    <div class="mt-5 row ">
        <?php $n = 0;
        for ($i = 0; $i < count($BDMarca); $i++) { ?>
            <?php if ($BDMarca[$i][8] == "Touring") {
                $ruta = $BDMarca[$i][6];
                $palabra = explode('/', $ruta);
                $p = end($palabra);
                if ($n < 3) {  ?>
                     <div class="col col-3 modelo" modelo="<?php echo $BDMarca[$i][0];?>">
                        <img class="imgMoto" src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                        <p class="mt-3"><?php echo $BDMarca[$i][1]; ?></p>
                    </div>
                    <div class="col col-1"></div>

            <?php
                }
                $n++;
            }
        }
        if ($n == 0) { ?>
            <h3>Lo sentimos la marca no dispone de ningun modelo de moto de la gama Touring</h3>
            <p>Puede mirar en otra marca si le interesa </p>
        <?php } ?>
    </div>


    <div class="row d-flex justify-content-start">
        <div class="col col-12" id="Custom" marca="<?php echo $BDMarca[0][5];?>">
            <h4 class="text-danger">Custom</h4>
        </div>
        <div class="mt-2 sub bg-danger"></div>
    </div>
    <div class="mt-5 row ">
        <?php $n = 0;
        for ($i = 0; $i < count($BDMarca); $i++) { ?>
            <?php if ($BDMarca[$i][8] == "Custom") {
                $ruta = $BDMarca[$i][6];
                $palabra = explode('/', $ruta);
                $p = end($palabra);
                if ($n < 3) {  ?>
                    <div class="col col-3 modelo" modelo="<?php echo $BDMarca[$i][0];?>>
                        <img class="imgMoto" src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                        <p class="mt-3"><?php echo $BDMarca[$i][1]; ?></p>
                    </div>
                    <div class="col col-1"></div>

            <?php
                }
                $n++;
            }
        }
        if ($n == 0) { ?>
            <h3>Lo sentimos la marca no dispone de ningun modelo de moto de la gama Custom</h3>
            <p>Puede mirar en otra marca si le interesa </p>
        <?php } ?>
    </div>


</div>


<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>