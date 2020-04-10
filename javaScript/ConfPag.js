
$(document).ready(function () {
    ConfAltoPagina();
    SesionAbierta();
    MostrarConcesionario();
    PonerActiveAlMenu();
    RutaOperacionesAdmin();
    CerrarAviso();
    
});

//Esta funcion la utilize al principio para poner un heigth fijo calculando el alto de la pantalla 
function ConfAltoPagina() {
    if ($('#ConfAltoPagina')[0]) {
        var height = $(window).height();
        $('main').height(height - 150);
    }

}
//Esta funcion la utilizo para comprobar si existe una session de usuario en php si es asi modifico contenido htlm y redirecciono a las paginas
function SesionAbierta() {
    $.ajax({
        url: "../web/index.php", type: "POST", data: { operacion: "ComprobarSesion" }, success: function ($respuesta) {
            if ($respuesta == 1) {
                $("#inicio").text("Iniciar Sesion");
            } else {
                $("#inicio").text("Cerrar Sesion");
            }
        }
    });
    $("#inicio").bind("click", function () {

        if ($("#inicio").text() == "Cerrar Sesion") {
            $.ajax({
                url: "../web/index.php", type: "POST", data: { operacion: "CerrarSesion" }, success: function ($respuesta) {
                    window.location.href = "index.php?operacion=home";
                }
            });
        } else if ($("#inicio").text() == "Iniciar Sesion") {
            $("#inicio").attr('href', 'index.php?operacion=iniciarSesion');
        }
    });
}
//Esta funcion  sirve para mostrar el mapa de localizacion en la pagina contactos
function MostrarConcesionario() {
    $("#MostarConcesionario").bind("click", function () {
        if ($("#CA")[0]) {
            $("#concesionario").empty();
        } else {
            $("#concesionario").html('<div class="col-2" id="CA"></div><div class="col-8"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1540.0131601307462!2d-0.3987187873238644!3d39.46873409757977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f6b8c4e48e5%3A0xb5053ab7dfdb897f!2sAv.%20del%20Cid%2C%2062D%2C%2046018%20Valencia!5e0!3m2!1ses!2ses!4v1585226027802!5m2!1ses!2ses" width="900" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div><div class="col-2"></div>');
        }

    });

}
//Esta funcion enruta a la operacion que elija el usuario
function RutaOperacionesAdmin() {

    $("#OperacionesAdmin div").on('click', function (event) {
        switch ($(this).attr('id')) {
            case "OpUsuarios":
                window.location.href = "index.php?operacion=OpUsuarios";
                break;
            case "OpProductos":
                window.location.href = "index.php?operacion=OpProductos";
                break;
            case "Opfechas":
                window.location.href = "index.php?operacion=Opfechas";
                break;
        }
    });
}
//Esta funcion sirve para poder eliminar los alerts de bootstrap 
function CerrarAviso() {
    $("#CerrarAviso").bind('click', function () {
        $("#MensajeAviso").remove();
    });
}


function PonerActiveAlMenu() {

    $("#Activar li").bind("click", function (event) {
        if ($('#Activar li').hasClass('active')) {
            $('#Activar li').removeClass('active');
            $(this).addClass("active");
        } else {
            $(this).addClass("active");
        }

    });




}