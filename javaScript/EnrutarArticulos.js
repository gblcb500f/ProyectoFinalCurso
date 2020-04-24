$(document).ready(function () {
  CrearEnlaceMarcas();
  EnrutarModelo(); 
});

function CrearEnlaceMarcas() {

  $.ajax({
    url: "../web/index.php", type: "POST", data: { operacion: "ObtenerMarcas" }, success: function ($respuesta) {
      var marcas = JSON.parse($respuesta);
      for (let i = 0; i < marcas.length; i++) {
        $("#marcas").after(`<li class="enlazarMarca dropdown-item" id="${marcas[i][0]}">${marcas[i][1]}</li> `);
      }
      EnrutarDivMarca();
    }
  });

}
function EnrutarDivMarca() {
  let marca;
  $("#divMarcas div").on('click', function (event) {
    marca = $(this).attr('marcas');

    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "PaginaMarca", nombre: marca }, success: function ($respuesta) {
        $("#contenido").html($respuesta);
        CerrarAviso();
        EnrutarGama();
        EnrutarModelo();
      }
    });
  });
  $(".enlazarMarca ").bind('click', function (event) {
    marca = $(this).attr('id');

    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "PaginaMarca", nombre: marca }, success: function ($respuesta) {
        $("#contenido").html($respuesta);
        CerrarAviso();
        EnrutarGama();
        EnrutarModelo();
      }
    });

  });
}


function EnrutarGama() {
  let id_marca;

  $("#Naked").on("click", function (event) {
    id_marca = $(this).attr('marca');
    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "PaginaGama", id: id_marca, nombre: "Naked" }, success: function ($respuesta) {
        $("#contenido").html($respuesta);
        CerrarAviso();
        EnrutarModelo();
      }
    });
  });

  $("#SuperSport").on("click", function (event) {
    id_marca = $(this).attr('marca');
    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "PaginaGama", id: id_marca, nombre: "SuperSport" }, success: function ($respuesta) {
        $("#contenido").html($respuesta);
        CerrarAviso();
        EnrutarModelo();
      }
    });

  });

  $("#Adventure").on("click", function (event) {
    id_marca = $(this).attr('marca');
    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "PaginaGama", id: id_marca, nombre: "Adventure" }, success: function ($respuesta) {
        $("#contenido").html($respuesta);
        CerrarAviso();
        EnrutarModelo();
      }
    });

  });

  $("#Touring").on("click", function (event) {
    id_marca = $(this).attr('marca');
    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "PaginaGama", id: id_marca, nombre: "Touring" }, success: function ($respuesta) {
        $("#contenido").html($respuesta);
        CerrarAviso();
        EnrutarModelo();
      }
    });

  });


  $("#Custom").on("click", function (event) {
    id_marca = $(this).attr('marca');
    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "PaginaGama", id: id_marca, nombre: "Custom" }, success: function ($respuesta) {
        $("#contenido").html($respuesta);
        CerrarAviso();
        EnrutarModelo();
      }
    });

  });
}

function EnrutarModelo() {
  let modelo;
  $(".modelo").on("click", function (event) {
    modelo = $(this).attr("modelo");
    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "PaginaModelo", id: modelo }, success: function ($respuesta) {
        $("#contenido").html($respuesta);
        MostrarCalendario();
      }
    });
  });
}
function MostrarCalendario(){

  $("#btnReserva").bind('click',function(event){
    $.ajax({
      url: "../web/index.php", type: "POST", data: { operacion: "MostrarCalendarioUsuario"}, success: function ($respuesta) {
        $("#Reservar").empty();
        $("#Reservar").html($respuesta);
        InicioCalendar();
        CerrarCalendario();
      }
    });
  });
}

function CerrarCalendario(){
  $("#CerrarCalendario").on('click',function(){
    $("#Reservar").empty();
    $("#Reservar").html('<button id="btnReserva" class="mt-3 btn btn-long btn-success">A QUE ESPERAS, RESERVA YA TU CITA Y HAZTE CON ELLA</button>');
  });
}
