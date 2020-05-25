<?php ob_start() ?>
<!-- Esta pagina se la devolvemos al cliente que contendra toda la informacion de las aulas con la informacion que queremos inplementar en el html -->

<div class="content ">

    <div class="alert bg-warning col-12  " role="alert" id="MensajeAviso">
        <p class="text-dark">Muy buenas <?php echo ucfirst($_SESSION['usuario']); ?>.
            <br>Usted tiene unos ciertos permisos acerca de la pagina, que le permitira configurar el funcionamiento de ella.
            <br>Le pedimos porfavor que antes de realizar cualquier cambio detenidamente piense en ello ya que afecta no
            solo a la empresa si no a los usuarios</p>
        <div class="d-flex justify-content-end" id="CerrarAviso">
            <button class="btn btn-dark">Cerrar</button>
        </div>
    </div>
    <div>
        <div class="row ">
            <div class="mt-5 col-12 ">
                <h1 class="text-center ">Pagina principal del Administador </h1>
                <div class="container mt-5 ">
                    <h3>Las operaciones a relizar son estas:</h3>

                    <div class="row mt-5">
                        <div class="col col-4">
                            <h5>Operaciones con usuario</h5>
                            <ul class=" mt-5">
                                <li>Mostrar usuarios</li>
                                <li>Dar/quitar permisos</li>
                                <li>Modificar valores</li>
                                <li>Eliminar usuarios</li>

                            </ul>
                        </div>
                        <div class="col col-4">
                            <h5>Operaciones con los productos</h5>
                            <ul class=" mt-5">
                                <li>Mostrar marcas</li>
                                <li>Eliminar marcas</li>
                                <li>Modificar valores</li>
                                <li>Mostrar productos</li>
                                <li>Quitar productos</li>
                                <li>Modificar valores</li>
                            </ul>
                        </div>
                        <div class="col col-4">
                            <h5>Operaciones con fechas</h5>
                            <ul class=" mt-5">
                                <li>Mostrar Calendario</li>
                                <li>Desbloquear/Bloquear dias</li>
                            </ul>
                        </div>
                    </div>
                    <h3>Elige una de las operaciones :</h3>
                    <div class="row mt-5 text-center" id="OperacionesAdmin">
                        <div class="col-3 contacto" id="OpUsuarios">
                            <h4 class="mt-3">Operaciones con usuarios </h4>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 contacto" id="OpProductos">
                            <h4 class="mt-3">Operaciones con productos</h4>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 contacto" id="Opfechas">
                            <h4 class="mt-3">Operaciones con fechas</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <br><br><br>

    <?php $contenido = ob_get_clean() ?>

    <?php include 'layoutAdmin.php'; ?>