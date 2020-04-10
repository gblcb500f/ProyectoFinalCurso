<?php ob_start() ?>
<div class="row">
    <div class="mt-5 col">
        <h1 class="text-center ">Pagina principal de Operaciones de Marcas </h1>
        <div class="container mt-5 " id="OpModMarcas">
            <div class="row mt-5 text-center">
                <div class="col col-8">
                    <?php

                    switch ($seccion) {
                        case "MostrarMarcas":
                            echo "<div id='CM'> </div>";
                            break;
                        case "CrearMarcas":
                            echo "<div id='MM'> </div>";
                            break;
                        case "ModMarcas":
                            echo "<div id='VM'> </div>";
                            break;
                        case "ElmMarcas":
                            echo "<div id='EM'>  </div>";
                            break;
                    }
                    ?>
                </div>
                <div class="col col-4">
                    <div class="row" >
                        <div class="col col-12 contenedorInfo" id="MostrarMarcas">
                            <h4 class="mt-3 ">Mostrar marcas</h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="CrearMarcas">
                            <h4 class="mt-3">Crear marcas </h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="ModMarcas">
                            <h4 class="mt-3">Modificar marcas</h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="ElmMarcas">
                            <h4 class="mt-3 ">Eliminar marcas</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>