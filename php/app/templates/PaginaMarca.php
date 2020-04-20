<?php ob_start() ?>
<div class="container ">
    <div class="row">
        <div class="row mt-5">
            <div class="col col-12">
                <h4 class="text-danger">Naked</h4>
            </div>
            <div class="mt-2 sub bg-danger"></div>
            <div class="mt-5 row">
                <?php for ($i = 0; $i < count($BDMarca); $i++) { ?>
                    <div class="col col-5">
                        <?php if ($BDMarca[$i][8] == "Naked") {
                            $ruta = $BDMarca[$i][6];
                            $palabra = explode('/', $ruta);
                            $p = end($palabra);
                        ?>
                            <img src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                            <p><?php echo $BDMarca[$i][1]; ?></p>
                        <?php } ?>
                    </div>
                    <div class="col col-2"></div>
                <?php } ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col col-12">
                <h4 class="text-danger">Super Sport</h4>
            </div>
            <div class="mt-2 sub bg-danger"></div>
            <div class="mt-5 row">
                <?php for ($i = 0; $i < count($BDMarca); $i++) { ?>
                    <div class="col col-2">
                        <?php if ($BDMarca[$i][8] == "SuperSport") {
                            $ruta = $BDMarca[$i][6];
                            $palabra = explode('/', $ruta);
                            $p = end($palabra);
                        ?>
                            <img src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                            <p><?php echo $BDMarca[$i][1]; ?></p>
                        <?php } ?>
                    </div>
                    <div class="col col-1"></div>
                <?php } ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col col-12">
                <h4 class="text-danger">Adventure</h4>
            </div>
            <div class="mt-2 sub bg-danger"></div>
            <div class="mt-5 row">
                <?php for ($i = 0; $i < count($BDMarca); $i++) { ?>
                    <div class="col col-2">
                        <?php if ($BDMarca[$i][8] == "Adventure") {
                            $ruta = $BDMarca[$i][6];
                            $palabra = explode('/', $ruta);
                            $p = end($palabra);
                        ?>
                            <img src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                            <p><?php echo $BDMarca[$i][1]; ?></p>
                        <?php } ?>
                    </div>
                    <div class="col col-1"></div>
                <?php } ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col col-12">
                <h4 class="text-danger">Touring</h4>
            </div>
            <div class="mt-2 sub bg-danger"></div>
            <div class="mt-5 row">
                <?php for ($i = 0; $i < count($BDMarca); $i++) { ?>
                    <div class="col col-2">
                        <?php if ($BDMarca[$i][8] == "Touring") {
                            $ruta = $BDMarca[$i][6];
                            $palabra = explode('/', $ruta);
                            $p = end($palabra);
                        ?>
                            <img src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                            <p><?php echo $BDMarca[$i][1]; ?></p>
                        <?php } ?>
                    </div>
                    <div class="col col-1"></div>
                <?php } ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col col-12">
                <h4 class="text-danger">Custom</h4>
            </div>
            <div class="mt-2 sub bg-danger"></div>
            <div class="mt-5 row">
                <?php for ($i = 0; $i < count($BDMarca); $i++) { ?>
                    <div class="col col-2">
                        <?php if ($BDMarca[$i][8] == "Custom") {
                            $ruta = $BDMarca[$i][6];
                            $palabra = explode('/', $ruta);
                            $p = end($palabra);
                        ?>
                            <img src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
                            <p><?php echo $BDMarca[$i][1]; ?></p>
                        <?php } ?>
                    </div>
                    <div class="col col-1"></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>