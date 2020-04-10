$(document).ready(function () {
    
    if ($("#formulario")[0]) {
        ValidarFormulario();
        
    }
});

function ValidarFormulario() {

    $("#formulario").bind("submit", function (event) {
        event.preventDefault();
        $("#Error").remove();
        let nombre = $("#Nombre").val();
        let apellidos = $("#Apellidos").val();
        let dni = $("#DNI").val();
        let edad = $("#edad").val();
        let telefono = $("#telefono").val();
        let email = $("#Email").val();
        let cp = $("#cp").val();
        let direccion = $("#direccion").val();
        let provincia = $("#provincia").val();
        let usuario = $("#usuario").val();
        let pass1 = $("#pass1").val();
        let pass2 = $("#pass2").val();
        let file = $("#idFiles").val();
        let data = getFiles();
        data = getFormData("formulario", data);

        let ValidarTexto = /^[a-z]{3,100}$/i;
        let ValidarDni = /^[0-9]{7,8}[A-Z]$/;
        let ValidarFecha = /^\d{4}([\-/.])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/;
        let validarTelefono = /^[6][0-9]{8}$/;
        let ValidarCP = /^[0-9]{5}$/;
        let ValidarDireccion = /^(c|calle|p|paseo|av|avenida)[a-z0-9]{3,50}/i;
        let ValidarUsuario = /^[a-z0-9_]{5,50}$/i;
        let ValidarEmail = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
        let ValidarPass = /^[a-z0-9_]{8,50}$/i;



        if (nombre != "") {
            if (!ValidarTexto.test(nombre)) {
                ErrorValidacion("nombre", " una longitud de tres a cien letras de la A a la Z");
            } else {
                if (apellidos != "") {
                    if (!ValidarTexto.test(apellidos)) {
                        ErrorValidacion("apellidos", " una longitud de tres a cien letras de la A a la Z");
                    } else {
                        if (dni != "") {
                            if (!ValidarDni.test(dni)) {
                                ErrorValidacion("dni", " de 7 a 8 numeros acabando con una letra en mayuscula");
                            } else {
                                if (edad != "") {
                                    if (!ValidarFecha.test(edad)) {
                                        ErrorValidacion("edad", `el formato dd/mm/aaaa`);
                                    } else {
                                        if (telefono != "") {
                                            if (!validarTelefono.test(telefono)) {
                                                ErrorValidacion("telefono", " el formato dd/mm/aaaa");
                                            } else {
                                                if (email != "") {
                                                    if (!ValidarEmail.test(email)) {
                                                        ErrorValidacion("email", ` ${email}el formato numeros,letras seguido de un @ seguido de texto un punto y texto`);
                                                    } else {
                                                        if (cp != "") {
                                                            if (!ValidarCP.test(cp)) {
                                                                ErrorValidacion("Codigo Postal", " una longitud de 5 numeros");
                                                            } else {
                                                                if (direccion != "") {
                                                                    if (!ValidarDireccion.test(direccion)) {
                                                                        ErrorValidacion("direccion", " un comienzo con las siguientes palabras calle,paseo,avenida o la forma corta c,av,p seguido de letras y numeros con una longitud de 3 a 200");
                                                                    } else {
                                                                        if (provincia != "") {
                                                                            if (usuario != "") {
                                                                                if (!ValidarUsuario.test(usuario)) {
                                                                                    ErrorValidacion("usuario", " una longitud de 5 a 50 tanto letras como numeros y _");
                                                                                } else {
                                                                                    if (pass1 != "") {
                                                                                        if (pass2 != "") {
                                                                                            if (!ValidarPass.test(pass1)) {
                                                                                                ErrorValidacion("contraseña", " una longitud de 8 a 50 tanto letras como numeros y _");
                                                                                            } else {
                                                                                                if (pass1 == pass2) {
                                                                                                    if (file != "") {
                                                                                                        $.ajax({
                                                                                                            url: "../web/index.php?operacion=SubirImgPersona", type: "POST", data:data, contentType: false, processData: false, success: function (img) {
                                                                                                                if (!img) {
                                                                                                                    $("#textError").append("<p id='Error'>Lo sentimos la imagen no se pudo subir</p>");
                                                                                                                    $("#Error").css("color", "red");
                                                                                                                } else {
                                                                                                                    $.ajax({
                                                                                                                        url: "../web/index.php", type: "POST", data: { operacion: "formAlt", nombre: nombre, apellidos: apellidos, dni: dni, edad: edad, telefono: telefono, email: email, cp: cp, direccion: direccion, provincia: provincia, img: img, usuario: usuario, pass: pass2 }, success: function ($respuesta) {
                                                                                                                            mensaje($respuesta);
                                                                                                                        }
                                                                                                                    });
                                                                                                                }
                                                                                                            }
                                                                                                        });
                                                                                                    } else {
                                                                                                        campoVacio("imagen")
                                                                                                    }
                                                                                                } else {
                                                                                                    $("#textError").append("<p id='Error'>Lo sentimos las contraseñas no son iguales </p>");
                                                                                                    $("#Error").css("color", "red");
                                                                                                }
                                                                                            }
                                                                                        } else {
                                                                                            campoVacio("segundo campo de contraseña");
                                                                                        }
                                                                                    } else {
                                                                                        campoVacio("primer campo de contraseña");
                                                                                    }
                                                                                }
                                                                            } else {
                                                                                campoVacio("usuario");
                                                                            }
                                                                        } else {
                                                                            campoVacio("provincias");
                                                                        }
                                                                    }
                                                                } else {
                                                                    campoVacio("direccion");
                                                                }
                                                            }
                                                        } else {
                                                            campoVacio("Codigo Postal");
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
                                    campoVacio("edad");
                                }
                            }
                        } else {
                            campoVacio("nombre");
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
}
function mensaje(MensajesServidor) {

    if (Number(MensajesServidor) == 0) {
        window.location.href = "index.php?operacion=iniciarSesion";
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

function getFiles() {

    var idFiles = document.getElementById("idFiles");

    // Obtenemos el listado de archivos en un array

    var archivos = idFiles.files;

    // Creamos un objeto FormData, que nos permitira enviar un formulario

    // Este objeto, ya tiene la propiedad multipart/form-data

    var data = new FormData();

    // Recorremos todo el array de archivos y lo vamos añadiendo all

    // objeto data

    for (var i = 0; i < archivos.length; i++) {
        // Al objeto data, le pasamos clave,valor

        data.append("archivo" + i, archivos[i]);
    }
    return data;

}


/**

 * Función que recorre todo el formulario para apadir en el FormData los valores del formulario

 * @param string id hace referencia al id del formulario

 * @param FormData data hace referencia al FormData

 * @return FormData

 */

function getFormData(id, data) {
    $("#" + id).find("input,select").each(function (i, v) {
        if (v.type !== "file") {
            if (v.type === "checkbox" && v.checked === true) {
                data.append(v.name, "on");
            } else {
                data.append(v.name, v.value);
            }
        }
    });
    return data;
}