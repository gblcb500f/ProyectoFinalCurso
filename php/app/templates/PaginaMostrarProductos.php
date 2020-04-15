<?php ob_start() ?>
<?php if (empty($datos)) { ?>
<p class="text-danger">Lo sentimos no se encuentra disponible ningun producto de la marca</p>
<?php } else { ?>

    <div id="eventos">
        <table class="table table-dark mt-5">
            <thead>
                <tr class="text-danger">
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cilindrada</th>
                    <th scope="col">CV</th>
                    <th scope="col">Tipo Carnet</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Gama</th>
                </tr>
            </thead>
            <tbody id="MostrarProducto">

                <?php for ($i = 0; $i < count($datos); $i++) { ?>
                    <tr producto="<?php echo $datos[$i][0];?>">
                        <td><?php echo $datos[$i][0]; ?></td>
                        <td><?php echo $datos[$i][1]; ?></td>
                        <td><?php echo $datos[$i][2]; ?></td>
                        <td><?php echo $datos[$i][3]; ?></td>
                        <td><?php echo $datos[$i][4]; ?></td>
                        <td><?php echo $datos[$i][5]; ?></td>
                        <td><?php echo $datos[$i][6]; ?></td>
                        <td><?php echo $datos[$i][7]; ?></td>
                        <td><?php echo $datos[$i][8]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>

<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>