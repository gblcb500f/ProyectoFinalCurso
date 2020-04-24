<?php ob_start()?>


<div class="container"  >
  <div class="row">
  <div class="col col-12 mt-5"> 
  <?php echo $tipo;if(empty($BDatos[0][0])){?>
        <h3 class="mt-5">Lo sentimos no se encontro ninguna moto</h3>
  <?php  }else{ ?>
            <h4 class="text-danger"><?php echo $BDatos[0][4];?></h4>
            </div>
        <div class="mt-2 sub bg-danger"></div>
    </div>
    <div class="row ">
   <?php for($i=0;$i<count($BDatos);$i++){?>
        
            <div class="col col-4 mt-5">
          <?php  $ruta = $BDatos[$i][2];
                $palabra = explode('/', $ruta);
                $p = end($palabra);
         ?>
          <img class="imgMotoGama" src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
           <h3 class="mt-3"><?php echo $BDatos[$i][1];?></h3>
           <p class="small">PVP : <?php echo $BDatos[$i][3];?>€</p>
            <p class="mt-2 lead font-weight-bold text-success">PVT : <?php $n=rand(100,500); $p= $BDatos[$i][3]-$n; echo $p ;?>€ </p>    
            <button class="col-12 bg-success font-weight-bold modelo " modelo="<?php echo $BDatos[$i][0];?>">Mostrar mas informacion</button>
        </div>
            <div class="col col-2"></div>
       
    <?php }} ?>
  </div>
  </div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php'; ?>