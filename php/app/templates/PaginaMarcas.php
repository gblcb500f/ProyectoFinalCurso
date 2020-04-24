<?php ob_start() ?>
<div class="content"  >
   <div id="CambioPaginaModMarcas">
      <div class="row" >
         <div class="mt-5 col">
            <h1 class="text-center ">Pagina principal de Operaciones de marcas </h1>
            <div class="container mt-5 " id="OpModMarcas">
               <div class="row mt-5 text-center">
                  <div class="col col-5 contenedorInfo" id="MostrarMarcas">
                        <h4 class="mt-3 mt-4">Mostrar marcas </h4>
                        <p>En este apartado podras ver todas las marcas que estan disponibles en nuestra pagina </p>
                  </div>
                  <div class="col col-2"></div>
                  <div class="col col-5 contenedorInfo" id="CrearMarcas">
                  <h4 class="mt-3 mt-4">Crear marcas</h4>
                  <p>En este apartado podras crear las marcas con la que trabaja la tienda</p>
                  </div>
               </div>
               <div class="row mt-5 text-center">
                  <div class="col col-5 contenedorInfo" id="ModMarcas">
                  <h4 class="mt- mt-4">Modificar marcas</h4>
                  <p>En este apartado podras modificar los datos de las marcas</p>
                  </div>
                  <div class="col col-2"></div>
                  <div class="col col-5 contenedorInfo" id="ElmMarcas">
                  <h4 class="mt-3 mt-4">Eliminar marcas</h4>
                  <p>En este apartado podras eliminar las marcas, ten cuidado una vez eliminado ya no se puede recuperar y se eliminara todo producto hacerca de el</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layoutAdmin.php'; ?>
