$(document).ready(function () {
    if ($("#Contactanos")[0]) {
      
        ContactanosEmail();
    }
});

function ContactanosEmail() {
    
    $("#Contactanos").bind("submit", function (event) {
        event.preventDefault();
        $("#Error").remove();
        let nombre = $("#Nombre").val();
        let apellidos = $("#Apellidos").val();
        let telefono = $("#telefono").val();
        let email = $("#Email").val();
        let texto = $("#texto").val();
        let ValidarTexto = /^[a-z]{3,100}$/i;
        let validarTelefono = /^[6][0-9]{8}$/;
        let ValidarEmail = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;


        if (nombre != "") {
            if (!ValidarTexto.test(nombre)) {
                ErrorValidacion("nombre", " una longitud de tres a cien letras de la A a la Z");
            } else {
                if (apellidos != "") {
                    if (!ValidarTexto.test(apellidos)) {
                        ErrorValidacion("apellidos", " una longitud de tres a cien letras de la A a la Z");
                    } else {
                        if (telefono != "") {
                            if (!validarTelefono.test(telefono)) {
                                ErrorValidacion("telefono", " el formato dd/mm/aaaa");
                            } else {
                                if (email != "") {
                                    if (!ValidarEmail.test(email)) {
                                        ErrorValidacion("email", ` ${email}el formato numeros,letras seguido de un @ seguido de texto un punto y texto`);
                                    } else {
                                        if (texto != "") {
                                             $.ajax({
                                                url: "../web/index.php", type: "POST", data: { operacion: "contactanos", nombre: nombre, apellidos: apellidos, telefono: telefono, email: email }, success: function ($respuesta) {
                                                    mensaje($respuesta);
                                                }
                                            }); 
                                        } else {
                                            campoVacio("texto");
                                        }
                                    }
                                } else {
                                    campoVacio("email");
                                }
                            }
                        } else {
                            campoVacio("telefono");
                        }
                    }
                } else {
                    campoVacio("apellidos");
                }
            }
        } else {
            campoVacio("nombre");
        }
    });

    function mensaje(MensajesServidor) {

        if (Number(MensajesServidor) == 0) {
            alert("En unos instantes nos pondremos en contacto con usted");
        } else {
            $("#textError").append(`<p id='Error'>${MensajesServidor}</p>`);
            $("#Error").css("color", "red");
        }
    }

    function campoVacio(campo) {
        $("#textError").append(`<p id='Error'>Lo sentimos el campo ${campo} esta vacio, se debe rellenar</p>`);
        $("#Error").css("color", "red");
    }
    function ErrorValidacion(campo, validacion) {
        $("#textError").append(`<p id='Error'>Lo sentimos el campo ${campo} no es corecto tiene que tener: <br> ${validacion}</p>`);
        $("#Error").css("color", "red");
    }
}