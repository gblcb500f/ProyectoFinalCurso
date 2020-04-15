<?php ob_start() ?>
<div class="row">
    <div class="mt-5 col">
        <h1 class="text-center ">Pagina principal de Operaciones de productos </h1>
        <div class="container mt-5 " id="OpModProductos">
            <div class="row mt-5 text-center">
                <div class="col col-8">
                    <?php

                    switch ($seccion) {
                        case "MostrarProductos":
                            echo "<div id='VP'> </div>";
                            break;
                        case "CrearProductos":
                            echo "<div id='CP'> </div>";
                            break;
                        case "ModProducto":
                            echo "<div id='ModP'> </div>";
                            break;
                        case "ElmProducto":
                            echo "<div id='EP'>  </div>";
                            break;
                    }
                    ?>
                </div>
                <div class="col col-4">
                    <div class="row" >
                        <div class="col col-12 contenedorInfo" id="MostrarProductos">
                            <h4 class="mt-3 ">Mostrar productos</h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="CrearProductos">
                            <h4 class="mt-3">Crear productos </h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="ModProducto">
                            <h4 class="mt-3">Modificar productos</h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="ElmProducto">
                            <h4 class="mt-3 ">Eliminar productos</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>