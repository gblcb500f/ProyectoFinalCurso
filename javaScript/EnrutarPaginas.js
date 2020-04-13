$(document).ready(function () {
    EnrutarPaginas();
});

function EnrutarPaginas() {
    $("#OpModMarcas div").on('click', function (event) {
        switch ($(this).attr('id')) {
            case "MostrarMarcas":
                CambiarComportamientoDeLaPagina('MostrarMarcas', 'marca'); break;
            case "CrearMarcas":
                CambiarComportamientoDeLaPagina('CrearMarcas', 'marca'); break;
            case "ModMarcas":
                CambiarComportamientoDeLaPagina('ModMarcas', 'marca'); break;
            case "ElmMarcas":
                CambiarComportamientoDeLaPagina('ElmMarcas', 'marca'); break;
        }

    });
    $("#OpModUser div").on('click', function (event) {
        switch ($(this).attr('id')) {
            case "ModUsuarios":
                CambiarComportamientoDeLaPagina('ModUsuarios', 'usuario'); break;
            case "ModPermisos":
                CambiarComportamientoDeLaPagina('ModPermisos', 'usuario'); break;
            case "ModValores":
                CambiarComportamientoDeLaPagina('ModValores', 'usuario'); break;
            case "ElmUsuario":
                CambiarComportamientoDeLaPagina('ElmUsuario', 'usuario'); break;
        }

    });
    $("#OpModProductos div").on('click', function (event) {
        switch ($(this).attr('id')) {
            case "MostrarProductos":
                CambiarComportamientoDeLaPagina('MostrarProductos', 'producto'); break;
            case "CrearProductos":
                CambiarComportamientoDeLaPagina('CrearProductos', 'producto'); break;
            case "ModProducto":
                CambiarComportamientoDeLaPagina('ModProducto', 'producto'); break;
            case "ElmProducto":
                CambiarComportamientoDeLaPagina('ElmProducto', 'producto'); break;
        }

    });
}

function CambiarComportamientoDeLaPagina($seccion, $apartado) {

    if ($apartado == "marca") {
        $("#CambioPaginaModMarcas ").empty();
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "CambioPaginaModMarcas", seccion: $seccion }, success: function ($respuesta) {
                $("#CambioPaginaModMarcas ").html($respuesta);
                EnrutarPaginas();
                MostrarContenidoDeModificaciones();
            }
        });
    } else if ($apartado == "usuario") {
        $("#CambioPaginaModUser").empty();
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "CambioPaginaModUser", seccion: $seccion }, success: function ($respuesta) {
                $("#CambioPaginaModUser").html($respuesta);
                EnrutarPaginas();
                MostrarContenidoDeModificaciones();
            }
        });
    }else if($apartado=="producto"){
        $("#CambioPaginaModProductos").empty();
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "CambioPaginaModProductos", seccion: $seccion }, success: function ($respuesta) {
                $("#CambioPaginaModProductos").html($respuesta);
                EnrutarPaginas();
                MostrarContenidoDeModificaciones();
            }
        });
    }
}
function MostrarContenidoDeModificaciones() {


    if ($("#CM")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarMarcas" }, success: function ($respuesta) {
                $("#CM").html($respuesta);
            }
        });

    } else if ($("#MM")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "CrearMarcas" }, success: function ($respuesta) {
                $("#MM").html($respuesta);
                CrearMarcas();
            }
        });
    } else if ($("#VM")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarMarcas", alerta: 1 }, success: function ($respuesta) {
                $("#VM").html($respuesta);
                CerrarAviso();
                ModificarMarcas();
            }
        });
    } else if ($("#EM")[0]) {

        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarMarcas", alerta: 2 }, success: function ($respuesta) {
                $("#EM").html($respuesta);
                CerrarAviso();
                EliminarMarcas();
            }
        });
        /* ------------------------------------------------------------------------Marcas---------------------------------------------------------------- */
    } else if ($("#MU")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarUsuarios", alerta: 1 }, success: function ($respuesta) {
                $("#MU").html($respuesta);
                CerrarAviso();
                MostrarPersona();
            }
        });

    } else if ($("#MP")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaModificarPermisos" }, success: function ($respuesta) {
                $("#MP").empty();
                $("#MP").html($respuesta);
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
    } else if ($("#MV")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarUsuarios", alerta: 2 }, success: function ($respuesta) {
                $("#MV").html($respuesta);
                CerrarAviso();
                ModificarUsuarios();
            }
        });
    } else if ($("#EU")[0]) {

        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarUsuarios", alerta: 3 }, success: function ($respuesta) {
                $("#EU").html($respuesta);
                CerrarAviso();
                EliminarPersona();
            }
        });
        /* -----------------------------------------------Usuarios-------------------------------------------------------------- */
    } else if ($("#VP")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarProductos", alerta: 1 }, success: function ($respuesta) {
                $("#VP").html($respuesta);
                CerrarAviso();
                MostrarProductos();
            }
        });

    } else if ($("#CP")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaCrearProductos" }, success: function ($respuesta) {
                $("#CP").empty();
                $("#CP").html($respuesta);
            }
        });
    } else if ($("#ModP")[0]) {
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaModificarProductos", alerta: 2 }, success: function ($respuesta) {
                $("#ModP").html($respuesta);
                CerrarAviso();
                ModificarProductos();
            }
        });
    } else if ($("#EP")[0]) {

        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarUsuarios", alerta: 3 }, success: function ($respuesta) {
                $("#EP").html($respuesta);
                CerrarAviso();
                EliminarProductos();
            }
        });
    }
}