$(document).ready(function(){
CrearEnlaceMarcas();

});  

function CrearEnlaceMarcas() {

    $.ajax({
        url: "../web/index.php", type: "POST", data: { operacion: "ObtenerMarcas"}, success: function ($respuesta) {
           var marcas = JSON.parse($respuesta);
         for(let i=0;i<marcas.length;i++){
             $("#marcas").before(`<a class="dropdown-item" href="index.php?operacion=MostrarMarca" id="${marcas[i]}">${marcas[i]}</a> `);
         }
        }
    });

  }
  function EnrutarDivMarca(){
    let marca;
    $("#divMarcas div").on('click',function(event){
      marca= $(this).attr('marcas');

      $.ajax({
        url: "../web/index.php", type: "POST", data: { operacion: "PaginaMarca",nombre:marca}, success: function ($respuesta) {
       $("#contenido").html($respuesta);
        }
    });

    });
  }EnrutarDivMarca();