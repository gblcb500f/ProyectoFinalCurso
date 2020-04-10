<?php ob_start() ?>

<?php if ($alerta == 1) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark"></p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php } else if ($alerta == 2) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark"></p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php } else if ($alerta == 3) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark"></p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php }
if (empty($datos)) { ?>
    <div id="eventos">
        <div id="eventos">
            <table class="table table-dark">
                <thead>
                    <tr class="text-danger">
                        <th scope="col">ID</th>
                        <th scope="col">Marca</th>
                    </tr>
                </thead>
            </table>
            <h4>Lo sentimos no se encontro ninguna marca a mostrar</h4>

        </div>


    <?php } else { ?>
        <div id="eventos">
            <table class="table table-dark">
                <thead>
                    <tr class="text-danger">
                        <th scope="col">Marca</th>
                        <th scope="col">Nivel</th>
                    </tr>
                </thead>
                <tbody id="MostrarPersona">

                    <?php for ($i = 0; $i < count($datos); $i++) {
                        $n = 1; ?>
                        <tr usuario="<?php echo $datos[$i][0]; ?>">

                            <td><?php echo $datos[$i][0]; ?></td>
                            <td><?php echo $datos[$i][2]; ?></td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    <?php } ?>
    <?php $params = ob_get_clean() ?>

    <?php include 'json.php'; ?>