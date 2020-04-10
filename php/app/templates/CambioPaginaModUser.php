<?php ob_start() ?>
<div class="row">
    <div class="mt-5 col">
        <h1 class="text-center ">Pagina principal de Operaciones de usuario </h1>
        <div class="container mt-5 " id="OpModUser">
            <div class="row mt-5 text-center">
                <div class="col col-8">
                    <?php
                     
                    switch($seccion){
                        case "ModUsuarios":
                          echo "<div id='MU'> </div>";
                            break;
                        case "ModPermisos":
                            echo "<div id='MP'> </div>";
                        break;
                        case "ModValores":
                            echo "<div id='MV'> </div>";
                        break;
                        case "ElmUsuario":
                            echo "<div id='EU'>  </div>";
                        break;
                    }
                    ?>
                </div>
                <div class="col col-4">
                    <div class="row">
                        <div class="col col-12 contenedorInfo" id="ModUsuarios">
                            <h4 class="mt-3">Mostrar usuarios </h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="ModPermisos">
                            <h4 class="mt-3">Dar/Quitar permisos</h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="ModValores">
                            <h4 class="mt-3 ">Modificar Valores</h4>
                        </div>
                        <div class="col col-12"> &nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col col-12 contenedorInfo" id="ElmUsuario">
                            <h4 class="mt-3 ">Eliminar Usuario</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>