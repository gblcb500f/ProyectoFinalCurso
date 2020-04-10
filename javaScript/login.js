$(document).ready(function () {
    if ($("#InicioSesion")[0]) {
        ValidarCampos();
    }
});

function ValidarCampos() {
  
    $("#InicioSesion").bind("submit", function (event) {
        event.preventDefault();
        $("#Error").remove();
        let usuario = $("#usuario").val();
        let pass1 = $("#pass1").val();

        let ValidarUsuario = /^[a-z0-9_]{5,50}$/i;
        let ValidarPass = /^[a-z0-9_]{8,50}$/i;

        if (usuario != "") {
            if (!ValidarUsuario.test(usuario)) {
                ErrorValidacion("usuario", "una longitud de 5 a 50 caracteres tanto letras nuemros y _");
            } else {
                if (pass1 != "") {
                    if (!ValidarPass.test(pass1)) {
                        ErrorValidacion("contraseña", "una longitud de 8 a 50 caracteres tanto letras numeros y _");
                    } else {
                         if ($('input[name=conditions]').is(':checked')) {
                            $.ajax({
                                url: "../web/index.php", type: "POST", data: { operacion: "FormIniarSesion", usuario: usuario, pass: pass1, remember: true }, success: function ($respuesta) {
                                    mensaje($respuesta);
                                }
                            });
                        }
                        else {
                            $.ajax({
                                url: "../web/index.php", type: "POST", data: { operacion: "FormIniarSesion", usuario: usuario, pass: pass1, remember: false }, success: function ($respuesta) {
                                    mensaje($respuesta);
                                }
                            });
                        } 
                    }
                } else {
                    campoVacio("contraseña");
                }
            }
        } else {
            campoVacio("usuario");
        }

    });

    function mensaje(MensajesServidor) {
        if (Number(MensajesServidor) == 0) {
           window.location.href = "index.php?operacion=home";
        }else if(Number(MensajesServidor) == 1){
            window.location.href = "index.php?operacion=homeAdmin";
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