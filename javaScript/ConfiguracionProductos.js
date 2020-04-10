$(document).ready(function () {
    EnrutarPaginas();
    EnrutarPagMarcas();
});

function EnrutarPaginas() {

    $("#EnrutarPaginas div").on('click', function () {
        switch ($(this).attr('id')) {
            case "OperacionesMarcas": window.location.href = "index.php?operacion=PaginaMarcas";
                break;
            case "OperacionesProductos": window.location.href = "index.php?operacion=PaginaProducto";
                break;
        }
    });

}

function EnrutarPagMarcas() {
    $("#OpModMarcas div").on('click', function (event) {
        switch ($(this).attr('id')) {
            case "MostrarMarcas":                
                CambiarComportamientoDeLaPaginaModMarcas('MostrarMarcas'); break;
            case "CrearMarcas":                
                CambiarComportamientoDeLaPaginaModMarcas('CrearMarcas'); break;
            case "ModMarcas":
                CambiarComportamientoDeLaPaginaModMarcas('ModMarcas'); break;
            case "ElmMarcas":
                CambiarComportamientoDeLaPaginaModMarcas('ElmMarcas'); break;
        }

    });
}

function CambiarComportamientoDeLaPaginaModMarcas($seccion) {
    $("#CambioPaginaModMarcas ").empty();
    $.ajax({
        url: "../web/index.php", type: "POST", data: { operacion: "CambioPaginaModMarcas", seccion: $seccion }, success: function ($respuesta) {
            $("#CambioPaginaModMarcas ").html($respuesta);
            EnrutarPagMarcas();
            MostrarContenidoDeModificacionMarcas();
        }
    });
}
function MostrarContenidoDeModificacionMarcas() {

    
    if ($("#CM")[0]) {     
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarMarcas" }, success: function ($respuesta) {
                $("#CM").html($respuesta);    
            }
        });

    } else if ($("#MM")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaModificarPermisos" }, success: function ($respuesta) {
                $("#MM").empty();
                $("#MM").html($respuesta);
                for (let i = 0; i < $("tr #nivel").length; i++) {
                    if ($("tr #nivel").eq(i).text() == 1) {
                        $('input[name=pulsar]').eq(i).attr("checked", true);
                    }
                }
                DarQuitarPermisos();
            }, error: function (params) {
                console.log(params);
            }


        });
    } else if ($("#VM")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarUsuarios", alerta: 2 }, success: function ($respuesta) {
                $("#VM").html($respuesta);
                CerrarAviso();
                ModificarUsuarios();
            }
        });
    } else if ($("#EM")[0]) {

        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarUsuarios", alerta: 3 }, success: function ($respuesta) {
                $("#EM").html($respuesta);
                CerrarAviso();
                EliminarPersona();
            }
        });
    }

}