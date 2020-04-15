<?php ob_start() ?>

<?php if ($alerta == 1) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras seleccionar el usuario que quieres modificar <br>
            si haces click encima de un usuario te mostrara el formulario a editar</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php } else if ($alerta == 2) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras seleccionar la marca que quieres eliminar <br>
        si haces click encima de una marca se eliminara TEN CUIDADO!!!!!!</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php } else if ($alerta == 3) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras ver los productos que existe en cada marca <br>
        si haces click encima de una te mostrara todos los productos disponibles</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php } else if ($alerta == 4) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras moficar los productos que existe en cada marca <br>
        si haces click encima de una te mostrara todos los productos a modificar</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php } else if ($alerta == 5) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras ver los productos que existe en cada marca <br>
        si haces click encima de una te mostrara todos los productos a eliminar <br>TEN CUIDADO UNA VEZ ELIMMINADO NO SE RECUPERA</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php }else if ($alerta == 6) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras crear productos en cada marca <br>
        si haces click encima de una marca te saldra un formulario a rellenar </p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
    <?php }
if (empty($datos)) { ?>

    <table class="table table-dark">
        <thead>
            <tr class="text-danger">
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
            </tr>
        </thead>
    </table>
    <h4>Lo sentimos no se encontro ninguna marca a mostrar</h4>

<?php } else { ?>
    <div id="eventos">
        <table class="table table-dark">
            <thead>
                <tr class="text-danger">
                    <th scope="col">Marca</th>
                    <th scope="col">Identificador</th>
                </tr>
            </thead>
            <tbody id="MostrarMarca">

                <?php for ($i = 0; $i < count($datos); $i++) {
                    $n = 1; ?>
                    <tr marca="<?php echo $datos[$i][0]; ?>">

                        <td><?php echo $datos[$i][1]; ?></td>
                        <td><?php echo $datos[$i][0]; ?></td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>
<?php } ?>
<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>