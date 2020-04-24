<?php ob_start() ?>


   <div class="row">
      <div class="col col-12" id="modelos">
         <h1 class=" model text-center">DESCUBRE TODAS NUESTRAS NOVEDADES </h1>
      </div>
   </div>
   <div class=" mt-5">
      <div class="row">
         <div class="col col-2"></div>
         <div class="col col-8">
            
      <h6>Todas las marcas lideres estan disponibles en nuestra tienda con los ultimos modelos del mercado y el mejor precio , no dejes escapar la oportunidad</h6>
      <h3 class="mt-3">ELIGE , PREPARA Y LANZATE A LA AVENTURA A QUE ESPERAS</h3>
   
         </div>
         <div class="col col-2"></div>
      </div>
   </div>
   <div class="mt-5 row d-flex justify-content-center fondo" id="divMarcas">
      <?php for ($i = 0; $i < count($marcas); $i++) { ?>
         <div class="col col-4 mt-5 " marcas="<?php echo $marcas[$i][0]; ?>">
            <img src="<?php echo '/proyectoFinal/imagenes/marca/' . $p[$i]; ?>" class="marcas" alt="">
         </div>
         <div class="col col-4"></div>
         <div class="col col-4 mt-5" marcas="<?php $i++;  echo $marcas[$i][0]; ?>">
            <img src="<?php echo '/proyectoFinal/imagenes/marca/' . $p[$i]; ?>" class="marcas" alt="">
         </div>
      <?php } ?>
   </div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php'; ?>