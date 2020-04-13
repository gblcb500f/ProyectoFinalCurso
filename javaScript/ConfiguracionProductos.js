$(document).ready(function () {
    EnrutarPaginasMarcas();
});
/* ---------------------Marcas--------------------------------- */
function EnrutarPaginasMarcas() {
    $("#EnrutarPaginas div").on('click', function () {
        switch ($(this).attr('id')) {
            case "OperacionesMarcas": window.location.href = "index.php?operacion=PaginaMarcas";
                break;
            case "OperacionesProductos": window.location.href = "index.php?operacion=PaginaProducto";
                break;
        }
    });
}

function CrearMarcas() {
    $("#FormMarcas").bind("submit", function (event) {
        
        event.preventDefault();
        $("#Error").remove();
        let nombre = $("#Marca").val();
        let id_marca=$("#id_marca").val();
        let file = $("#idFiles").val();
        let data = getFiles();
        data = getFormData("FormMarcas", data);

        let ValidarTexto = /^[a-z]{3,100}$/i;
        let ValidarID = /^[0-9]{3,100}$/;

        if (nombre != "") {
            if (!ValidarTexto.test(nombre)) {
                ErrorValidacion("nombre", " una longitud de tres a cien letras de la A a la Z");
            } else {
                if(id_marca!=""){
                    if(!ValidarID.test(id_marca)){
                        ErrorValidacion("id", " una longitud de tres a cien numeros");
                    }else{
                 
                if (file != "") {
                    $.ajax({
                        url: "../web/index.php?operacion=SubirImgMarca", type: "POST", data: data, contentType: false, processData: false, success: function (img) {
                            if (!img) {
                                $("#textError").append("<p id='Error'>Lo sentimos la imagen no se pudo subir</p>");
                                $("#Error").css("color", "red");
                            } else {
                                $.ajax({
                                    url: "../web/index.php", type: "POST", data: { operacion: "formCrearMarcas", nombre: nombre, img: img,id:id_marca }, success: function ($respuesta) {
                                        mensajeCrear($respuesta);
                                    }
                                });
                            }
                        }
                    });
                } else {
                    campoVacio("imagen");
                }
                       
            }
        }else{
            campoVacio("ID marca");
        }
            }

        } else {
            campoVacio("nombre");
        }
    });
}
function mensajeCrear(MensajesServidor) {
   
    if (Number(MensajesServidor) == 0) {
       alert("Fantastico se creo la marca :)");
    } else {
        $("#textError").append(`<p id='Error'>${MensajesServidor}</p>`);
        $("#Error").css("color", "red");
    } 
}

function ModificarMarcas(){

    let marca;
    $("#MostrarMarca tr").on('click', function (event) {
        marca = $(this).attr('marca');
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaModificarMarca", marca: marca }, success: function ($respuesta) {
                $("#VM").empty();
                $("#VM").html($respuesta);
                ActualizarDatosMarca();
                
            }
        });
    });
}

function ActualizarDatosMarca(){
    let identificador=$('#FormModificarMarcas').attr('marca');
    $("#FormModificarMarcas").bind("submit", function (event) {
        
        event.preventDefault();
        $("#Error").remove();
        let nombre = $("#Marca").val();
        let id_marca=$("#id_marca").val();
        let file = $("#idFiles").val();
        let data = getFiles();
        data = getFormData("FormModificarMarcas", data);

        let ValidarTexto = /^[a-z]{3,100}$/i;
        let ValidarID = /^[0-9]{3,100}$/;

        if (nombre != "") {
            if (!ValidarTexto.test(nombre)) {
                ErrorValidacion("nombre", " una longitud de tres a cien letras de la A a la Z");
            } else {
                if(id_marca!=""){
                    if(!ValidarID.test(id_marca)){
                        ErrorValidacion("id", " una longitud de tres a cien numeros");
                    }else{
                 
                if (file != "") {
                    $.ajax({
                        url: "../web/index.php?operacion=SubirImgMarca", type: "POST", data: data, contentType: false, processData: false, success: function (img) {
                            if (!img) {
                                $("#textError").append("<p id='Error'>Lo sentimos la imagen no se pudo subir</p>");
                                $("#Error").css("color", "red");
                            } else {
                                $.ajax({
                                    url: "../web/index.php", type: "POST", data: { operacion: "ActualizarMarcas",identificador:identificador, nombre: nombre, img: img,id:id_marca }, success: function ($respuesta) {
                                        mensajeActualizar($respuesta);
                                        $.ajax({
                                            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarMarcas", alerta: 1 }, success: function ($respuesta) {
                                                $("#VM").html($respuesta);
                                                CerrarAviso();
                                                ModificarMarcas();
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    });
                } else {
                    campoVacio("imagen");
                }
                       
            }
        }else{
            campoVacio("ID marca");
        }
            }

        } else {
            campoVacio("nombre");
        }
    });
}

function mensajeActualizar(MensajesServidor) {
     if (Number(MensajesServidor) == 0) {
       alert("Fantastico se creo ha modificado la marca :)");
    } else {
        $("#textError").append(`<p id='Error'>${MensajesServidor}</p>`);
        $("#Error").css("color", "red");
    }  
}
function  EliminarMarcas(){
    let marca;
    $("#MostrarMarca tr").on('click', function (event) {
        marca = $(this).attr('marca');
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "EliminarMarca", id: marca }, success: function ($respuesta) {
                alert($respuesta);
                $.ajax({
                    url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarMarcas", alerta: 2 }, success: function ($respuesta) {
                        $("#EM").html($respuesta);
                        CerrarAviso();
                        EliminarMarcas();
                    }
                });
            }
        });
    });
}
/* ----------------Productos--------------------------------- */