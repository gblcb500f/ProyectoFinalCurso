<?php ob_start() ?>


<div class="container">
  <div class="row">
    <div class="col col-12 mt-5">
      <?php if (empty($BDatos[0][0])) { ?>
        <h3 class="mt-5">Lo sentimos no se encontro ninguna moto</h3>
      <?php  } else { ?>
        <h2 class="text-danger"><?php echo $BDatos[0][1]; ?></h2>
    </div>
    <div class="mt-2 sub bg-danger"></div>
  </div>
  <div class="row ">
      <div class="col col-5 mt-5 text-center">
        <h4 class="text-success">PVP : <?php $n = rand(100, 500);
                                        $p = $BDatos[0][7] - $n;
                                        echo $p; ?>€ </h4>
        <p class="mt-2 lead font-weight-bold bordeCont">TE AHORRAS : <?php echo $n; ?>€</p>
        <p class="mt-2 lead font-weight-bold bordeCont">SEGURO GRATIS <br> <small>DURANTE EL 1ER AÑO</small></p>
        <p class="mt-2 lead font-weight-bold bordeCont">FACIL FINANCION <BR> DESDE 99€/MES</p>
        <P>ENTRADA 2716,2 €. 35 MENSUALIDADES DE 99 € <br> ÚLTIMA MENSUALIDAD: 4117,47 €</P>
        <p class="small">TIN: 3,99 %. TAE: 7,85%. FINANCIACIÓN CONCERTADA CON BANCO CETELEM, S.A. SOCIEDAD UNIPERSONAL A-78650348 Y SUJETA A LA APROBACIÓN DE DICHA ENTIDAD.</p>
        <p class="mt-2 lead font-weight-bold bordeCont">4AÑOS DE GARANTIA <br> GRATIS SI LA FINANCIAS</p>

      </div>
      <div class="col col-2"></div>
      <div class="col col-5 mt-5 ">
        <?php $ruta = $BDatos[0][6];
          $palabra = explode('/', $ruta);
          $p = end($palabra);
        ?>
        <img class="imgMotoModelo mt-5" src="/proyectoFinal/imagenes/producto/<?php echo $p; ?>" alt="">
      </div>
       <div class="col col-12">
      <div id="Reservar">
        <button id="btnReserva" class="mt-3 btn btn-long btn-success">A QUE ESPERAS, RESERVA YA TU CITA Y HAZTE CON ELLA</button>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col col-12">
      <h3 class="text-danger">DETALLES</h3>
    </div>
    <div class="mt-2 sub bg-danger"></div>
  </div>

  <div class="row mt-5">
    
    <div class="col col-12 bordeCont">
    <ul>
      <li class="mt-5">El nuevo modelo <?php echo $BDatos[0][1]?> no tiene nada que ver con su antecesora, una mejora en diseño y funcionamiento  </li>
      <li>Es una cilindrada de <?php echo $BDatos[0][2]?> centimetros cubicos,presta nada mas ni nada menos que <?php echo $BDatos[0][3]?> caballos</li>
      <li>La moto esta hecha para el carnet <?php echo $BDatos[0][4]?></li>
      </ul>
      <?php
      switch($BDatos[0][8]){
        case 'Naked':
          ?>
          <p class="mt-5"> Al tratarse de una moto Naked es ideal para el terreno urbano ya que su aerodinamica es comoda y facil de conducir. <br> 
           Las Naked te permite manejar la moto sin causarte dolores en el cuerpo , son las ultimas tendencias  </p>
          <?php
        break;
        case 'SuperSport':
          ?>
          <p class="mt-5"> Al tratarse de una moto  Super Sport esta pensada en meterse en circuito y poder ir a gran velocidad ya que la aerodimica que ofrece es ideal para ello  <br>
            A que esperas para tener una y salir de curvas </p>
          <?php
        break;
        case 'Adventure':
          ?>
          <p class="mt-5"> Al tratarse de una moto  Adventure es tu moto ideal si quieres recorer el mundo con la moto. <br> Es un tanque nada mas ni menos , te permite meterte por todos los terrenos y hacer miles de kilometros como si fuese solo 1 <br> A que esperas a comerte el mundo  con ella   </p>
          <?php
        break;
        case 'Touring':
          ?>
          <p class="mt-5"> Al tratarse de una moto  Touring  te permite una comodidad maxima con un moton de xuxes a que esperas para descubrirlo  </p>
          <?php
        break;
        case 'Custom':
          ?>
          <p class="mt-5"> Al tratarse de una moto  Custom y gustarte lo duro que mas ni menos que una custom esta hecha para gente dura y con mucha pasion <br> Es una moto para darse paseos con los amigos y romper corazones con su sonido caracteristico   </p>
          <?php
        break;
      }}
      ?>
    </div>
  </div>


</div>

<?php $params = ob_get_clean() ?>
<?php include 'json.php'; ?>