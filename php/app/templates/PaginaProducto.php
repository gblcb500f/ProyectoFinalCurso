<?php ob_start() ?>
<div class="content"  >
   <div id="CambioPaginaModProductos">
      <div class="row" >
         <div class="mt-5 col">
            <h1 class="text-center ">Pagina principal de Operaciones de productos </h1>
            <div class="container mt-5 " id="OpModProductos">
               <div class="row mt-5 text-center">
                  <div class="col col-5 contenedorInfo" id="MostrarProductos">
                        <h4 class="mt-3 mt-4">Mostrar productos </h4>
                        <p>En este apartado podras ver todas los productos que estan disponibles en nuestras marcas </p>
                  </div>
                  <div class="col col-2"></div>
                  <div class="col col-5 contenedorInfo" id="CrearProductos">
                  <h4 class="mt-3 mt-4">Crear productos</h4>
                  <p>En este apartado podras crear los productos de cada marca</p>
                  </div>
               </div>
               <div class="row mt-5 text-center">
                  <div class="col col-5 contenedorInfo" id="ModProducto">
                  <h4 class="mt- mt-4">Modificar productos</h4>
                  <p>En este apartado podras modificar los datos de los productos </p>
                  </div>
                  <div class="col col-2"></div>
                  <div class="col col-5 contenedorInfo" id="ElmProducto">
                  <h4 class="mt-3 mt-4">Eliminar productos</h4>
                  <p>En este apartado podras eliminar los productos, ten cuidado una vez eliminado ya no se puede recuperar y se eliminara todo producto hacerca de el</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layoutAdmin.php'; ?>