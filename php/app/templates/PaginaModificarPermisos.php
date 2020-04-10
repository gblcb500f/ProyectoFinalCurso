<?php ob_start() ?>
<!-- Esta pagina se la devolvemos al cliente que contendra toda la informacion de los profesores con la informacion que queremos inplementar en el html -->
<div class="content">

    <?php if (!empty($usuarios)) : ?>
        <div id="eventos" class="mt-3">
        <table class="table table-dark ">
            <tr class="text-danger">
                <th>Usuario</th>
                <th>Nivel</th>
            </tr>
            <?php for ($i = 0; $i < (count($usuarios)); $i++) { ?>
                <tr>
                    <td><?php echo $usuarios[$i][0] ?></td>
                    <td id="nivel"><?php echo $usuarios[$i][2] ?></td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="pulsar" class="custom-control-input" id="<?php echo $usuarios[$i][0] ?>" value="<?php echo $profesores[$i][2] ?>">
                            <label class="custom-control-label " for="<?php echo $usuarios[$i][0] ?>">Modificar permiso</label>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
        </div>
    <?php else : ?>
        <p>Lo sentimos no hemos encontrado usuarios</p>
    <?php endif; ?>
</div>

<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>