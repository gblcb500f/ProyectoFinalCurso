<?php ob_start() ?>
<?php if (count($usuarios) > 3) {
    echo "<p type='hidden' id='QuitarAltura'></p>";
} ?>
<?php if ($alerta == 1) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras ver los usuarios que existe en la base de datos <br> si haces click
            encima de un usuario te mostrara toda la informacion de el</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php } else if ($alerta == 2) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras seleccionar el usuario que quieres modificar <br> si haces click
            encima de un usuario te mostrara el formulario a editar</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php } else if ($alerta == 3) { ?>
    <div class="alert bg-warning" role="alert" id="MensajeAviso">
        <p class="text-dark">En este apartado podras seleccionar el usuario que quieres eliminar <br> si haces click
            encima de un usuario se eliminara TEN CUIDADO!!!!!!</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
<?php }
if (empty($usuarios)) { ?>
 
        <table class="table table-dark">
            <thead>
                <tr class="text-danger">
                    <th scope="col">Usuario</th>
                    <th scope="col">Nivel</th>
                </tr>
            </thead>
        </table>
        <h4>Lo sentimos no se encontro ninguna marca a mostrar</h4>

 


<?php } else { ?>
    <div id="eventos">
        <table class="table table-dark">
            <thead>
                <tr class="text-danger">
                    <th scope="col">Usuario</th>
                    <th scope="col">Nivel</th>
                </tr>
            </thead>
            <tbody id="MostrarPersona">

                <?php for ($i = 0; $i < count($usuarios); $i++) {
                    $n = 1; ?>
                    <tr usuario="<?php echo $usuarios[$i][0]; ?>">

                        <td><?php echo $usuarios[$i][0]; ?></td>
                        <td><?php echo $usuarios[$i][2]; ?></td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>
<?php } ?>

<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>