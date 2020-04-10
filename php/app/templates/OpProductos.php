<?php ob_start() ?>
<!-- Esta pagina se la devolvemos al cliente que contendra toda la informacion de las aulas con la informacion que queremos inplementar en el html -->

<div class="content">

   <div class="row">
      <div class="col col-2"></div>
      <div class="col col-8  mt-5 ">
         <h1 class="text-center">Pagina principal de Operaciones de Productos</h1>
         <p class="mt-5">En este apartado tiene dos secciones una para la seccion de las marcas y la otra para los productos</p>

         <div class="row mt-5">
            <div class="col col-4">
               <h5>Operaciones con marcas</h5>
               <ul class=" mt-5">
                  <li>Crear marcas</li>
                  <li>Mostrar las diferentes marcas</li>
                  <li>Modificar marcas</li>
                  <li>Eliminar marcas</li>

               </ul>
            </div>
            <div class="col col-2"></div>
            <div class="col col-4">
               <h5>Operaciones con los productos</h5>
               <ul class=" mt-5">
                  <li>Mostrar los productos</li>
                  <li>Eliminar productos</li>
                  <li>Modificar valores</li>
                  <li>Crear productos</li>
               </ul>
            </div>

            <h3>Elige una de las operaciones :</h3>
                    <div class="row mt-5 text-center d-flex  justify-content-center" id="EnrutarPaginas">
                        <div class="col-5 contacto" id="OperacionesMarcas">
                            <h4 class="mt-3">Operaciones con marcas </h4>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5 contacto" id="OperacionesProductos">
                            <h4 class="mt-3">Operaciones con productos</h4>
                        </div>
                    </div>

         </div>
         <div class="col col-2"></div>
      </div>

   </div>
   <?php $contenido = ob_get_clean() ?>

   <?php include 'layoutAdmin.php'; ?>