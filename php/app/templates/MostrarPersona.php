<?php ob_start() ?>

<table class="table table-dark mt-5">
    <thead>
        <tr class="text-danger">
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Usuarios</th>
            <th scope="col">Edad</th>
        </tr>
    </thead>
    <tbody id="MostrarPersona">

        <?php for ($i = 0; $i < count($datos); $i++) { ?>
            <tr>

                <td><?php echo $datos[$i][0]; ?></td>
                <td><?php echo $datos[$i][1]; ?></td>
                <td><?php echo $datos[$i][2]; ?></td>
                <td><?php echo $datos[$i][3]; ?></td>
                <td><?php echo $datos[$i][4]; ?></td>
            </tr>
        
            <tr class="text-danger mt-5">
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Provincia</th>
            <th scope="col">Codigo Postal</th>
            <th scope="col">Direccion</th>
        </tr>
            <tr>
                <td><?php echo $datos[$i][5]; ?></td>
                <td><?php echo $datos[$i][6]; ?></td>
                <td><?php echo $datos[$i][7]; ?></td>
                <td><?php echo $datos[$i][8]; ?></td>
                <td><?php echo $datos[$i][9]; ?></td>

            </tr>
        <?php } ?>


    </tbody>
</table>


<?php $params = ob_get_clean() ?>

<?php include 'json.php'; ?>