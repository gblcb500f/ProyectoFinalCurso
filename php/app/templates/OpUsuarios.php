<?php ob_start() ?>
<!-- Esta pagina se la devolvemos al cliente que contendra toda la informacion de las aulas con la informacion que queremos inplementar en el html -->



<div class="content"  >
   <div id="CambioPaginaModUser">
      <div class="row" >
         <div class="mt-5 col">
            <h1 class="text-center ">Pagina principal de Operaciones de usuario </h1>
            <div class="container mt-5 " id="OpModUser">
               <div class="row mt-5 text-center">
                  <div class="col col-5 contenedorInfo" id="ModUsuarios">
                        <h4 class="mt-3 mt-4">Mostrar usuarios </h4>
                        <p>En este apartado podras ver todos los usuarios que estan disponibles en nuestra pagina </p>
                  </div>
                  <div class="col col-2"></div>
                  <div class="col col-5 contenedorInfo" id="ModPermisos">
                  <h4 class="mt-3 mt-4">Dar/Quitar permisos</h4>
                  <p>En este apartado podras modificar los permisos de usuario, ten cuidado a quien se lo das o a quien se lo quitas</p>
                  </div>
               </div>
               <div class="row mt-5 text-center">
                  <div class="col col-5 contenedorInfo" id="ModValores">
                  <h4 class="mt- mt-4">Modificar Valores</h4>
                  <p>En este apartado podras modificar los datos de usuario si fuese necesario </p>
                  </div>
                  <div class="col col-2"></div>
                  <div class="col col-5 contenedorInfo" id="ElmUsuario">
                  <h4 class="mt-3 mt-4">Eliminar Usuario</h4>
                  <p>En este apartado podras eliminar a los usuarios , ten cuidado una vez eliminado ya no se puede recuperar</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layoutAdmin.php'; ?>