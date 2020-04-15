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
        let id_marca = $("#id_marca").val();
        let file = $("#idFiles").val();
        let data = getFiles();
        data = getFormData("FormMarcas", data);

        let ValidarTexto = /^[a-z]{3,100}$/i;
        let ValidarID = /^[0-9]{3,100}$/;

        if (nombre != "") {
            if (!ValidarTexto.test(nombre)) {
                ErrorValidacion("nombre", " una longitud de tres a cien letras de la A a la Z");
            } else {
                if (id_marca != "") {
                    if (!ValidarID.test(id_marca)) {
                        ErrorValidacion("id", " una longitud de tres a cien numeros");
                    } else {

                        if (file != "") {
                            $.ajax({
                                url: "../web/index.php?operacion=SubirImgMarca", type: "POST", data: data, contentType: false, processData: false, success: function (img) {
                                    if (!img) {
                                        $("#textError").append("<p id='Error'>Lo sentimos la imagen no se pudo subir</p>");
                                        $("#Error").css("color", "red");
                                    } else {
                                        $.ajax({
                                            url: "../web/index.php", type: "POST", data: { operacion: "formCrearMarcas", nombre: nombre, img: img, id: id_marca }, success: function ($respuesta) {
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
                } else {
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

function ModificarMarcas() {

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

function ActualizarDatosMarca() {
    let identificador = $('#FormModificarMarcas').attr('marca');
    $("#FormModificarMarcas").bind("submit", function (event) {

        event.preventDefault();
        $("#Error").remove();
        let nombre = $("#Marca").val();
        let id_marca = $("#id_marca").val();
        let file = $("#idFiles").val();
        let data = getFiles();
        data = getFormData("FormModificarMarcas", data);

        let ValidarTexto = /^[a-z]{3,100}$/i;
        let ValidarID = /^[0-9]{3,100}$/;

        if (nombre != "") {
            if (!ValidarTexto.test(nombre)) {
                ErrorValidacion("nombre", " una longitud de tres a cien letras de la A a la Z");
            } else {
                if (id_marca != "") {
                    if (!ValidarID.test(id_marca)) {
                        ErrorValidacion("id", " una longitud de tres a cien numeros");
                    } else {

                        if (file != "") {
                            $.ajax({
                                url: "../web/index.php?operacion=SubirImgMarca", type: "POST", data: data, contentType: false, processData: false, success: function (img) {
                                    if (!img) {
                                        $("#textError").append("<p id='Error'>Lo sentimos la imagen no se pudo subir</p>");
                                        $("#Error").css("color", "red");
                                    } else {
                                        $.ajax({
                                            url: "../web/index.php", type: "POST", data: { operacion: "ActualizarMarcas", identificador: identificador, nombre: nombre, img: img, id: id_marca }, success: function ($respuesta) {
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
                } else {
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
function EliminarMarcas() {
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
function MostrarProductos() {
    let marca;
    $("#MostrarMarca tr").on('click', function (event) {
        marca = $(this).attr('marca');
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarProductos", marca: marca }, success: function ($respuesta) {
                $("#VP").html($respuesta);
            }
        });
    });
}
function CrearProducto() {
    let marca;
    $("#MostrarMarca tr").on('click', function (event) {
        marca = $(this).attr('marca');
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaCrearProductos", marca: marca }, success: function ($respuesta) {
                $("#CP").html($respuesta);
                ValidarProductos("crear");
            }
        });
    });
}
function ValidarProductos($seccion) {
    let id_marca;
    if($seccion=="crear"){
        id_marca = $("#OPProducto").attr('marca');
    }else if($seccion=="modificar"){
        id_marca = $("#OPProducto").attr('marca');
    }
    
   
    $("#OPProducto").bind("submit", function (event) {
        event.preventDefault();
        $("#Error").remove();
        let nombre = $("#Nombre").val();
        let cilindrada = $("#Cilindrada").val();
        let caballos = $("#Caballos").val();
        let tipoCarnet = $("#tipoCarnet").val();
        let gama = $("#Gama").val();
        let precio = $("#Precio").val();
        let file = $("#idFiles").val();
        let data = getFiles();
        data = getFormData("CrearProducto", data);

        let ValidarTexto = /^[a-z0-9]{1,100}$/i;
        let ValidarNum = /^[0-9]{1,5}$/;
        let ValidarPrecio = /^[0-9]{1,}$/;
        if (nombre != "") {
            if (!ValidarTexto.test(nombre)) {
                ErrorValidacion("nombre", " una longitud de uno a cien letras de la A a la Z y numeros");
            } else {
                if (cilindrada != "") {
                    if (!ValidarNum.test(cilindrada)) {
                        ErrorValidacion("cilindrada", " una longitud de uno a cinco numeros");
                    } else {
                        if (caballos != "") {
                            if (!ValidarNum.test(caballos)) {
                                ErrorValidacion("caballos", "una longitud de uno a cinco numeros");
                            } else {
                                if (tipoCarnet != "") {
                                    if (!ValidarTexto.test(tipoCarnet)) {
                                        ErrorValidacion("tipo carnet", `una longitud de uno a cien letras de la A a la Z y numeros`);
                                    } else {
                                        if (precio != "") {
                                            if (!ValidarPrecio.test(precio)) {
                                                ErrorValidacion("precio", "debe tener como minimo un numero");
                                            } else {
                                                if (gama != "") {
                                                    if (!ValidarTexto.test(gama)) {
                                                        ErrorValidacion("gama", `una longitud de dos a cien letras de la A a la Z y numeros`);
                                                    } else {
                                                        if (file != "") {
                                                            if ($seccion == "crear") {
                                                                $.ajax({
                                                                    url: "../web/index.php?operacion=SubirImgProducto", type: "POST", data: data, contentType: false, processData: false, success: function (img) {
                                                                        if (!img) {
                                                                            $("#textError").append("<p id='Error'>Lo sentimos la imagen no se pudo subir</p>");
                                                                            $("#Error").css("color", "red");
                                                                        } else {
                                                                            $.ajax({
                                                                                url: "../web/index.php", type: "POST", data: { operacion: "OPProducto",tipo:"crear", nombre: nombre, cilindrada: cilindrada, caballos: caballos, tipoCarnet: tipoCarnet, precio: precio, file: img, id_marca: id_marca, gama: gama }, success: function ($respuesta) {
                                                                                    mensajeProductos($respuesta);
                                                                                }
                                                                            });
                                                                        }
                                                                    }
                                                                });
                                                            } else if ($seccion == "modificar") {
                                                                $.ajax({
                                                                    url: "../web/index.php?operacion=SubirImgProducto", type: "POST", data: data, contentType: false, processData: false, success: function (img) {
                                                                        if (!img) {
                                                                            $("#textError").append("<p id='Error'>Lo sentimos la imagen no se pudo subir</p>");
                                                                            $("#Error").css("color", "red");
                                                                        } else {
                                                                            $.ajax({
                                                                                url: "../web/index.php", type: "POST", data: { operacion: "OPProducto",tipo:"modificar", nombre: nombre, cilindrada: cilindrada, caballos: caballos, tipoCarnet: tipoCarnet, precio: precio, file: img, gama: gama ,id_marca:id_marca}, success: function ($respuesta) {
                                                                                    mensajeProductos($respuesta);
                                                                                }
                                                                            });
                                                                        }
                                                                    }
                                                                });
                                                            }
                                                        } else {
                                                            campoVacio("imagen");
                                                        }

                                                    }
                                                } else {
                                                    campoVacio('Gama');
                                                }

                                            }
                                        } else {
                                            campoVacio("precio");
                                        }
                                    }
                                } else {
                                    campoVacio("tipo carnet");
                                }
                            }
                        } else {
                            campoVacio("caballos");
                        }
                    }
                } else {
                    campoVacio("cilindrada");
                }
            }
        } else {
            campoVacio("nombre");
        }
    });
}

function mensajeProductos(MensajesServidor) {
    alert(MensajesServidor);
}
function EliminarProductos() {
    let marca;
    $("#MostrarMarca tr").on('click', function (event) {
        marca = $(this).attr('marca');
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarProductos", marca: marca }, success: function ($respuesta) {
                $("#EP").html($respuesta);
                ConfirmarEliminacion();
            }
        });
    });
}

function ConfirmarEliminacion() {
    let producto;
    $("#MostrarProducto tr").on('click', function (event) {
        producto = $(this).attr('producto');
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "EliminarProducto", producto: producto }, success: function ($respuesta) {
                alert($respuesta);
            }
        });
    });


}
function ModificarProductos() {
    let marca;
    $("#MostrarMarca tr").on('click', function (event) {
        marca = $(this).attr('marca');
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "PaginaMostrarProductos", marca: marca }, success: function ($respuesta) {
                $("#ModP").html($respuesta);
                SeleccionarProducto();
            }
        });
    });
}
function SeleccionarProducto() {
    let producto;
    $("#MostrarProducto tr").on('click', function (event) {
        producto = $(this).attr('producto');
        $.ajax({
            url: "../web/index.php", type: "POST", data: { operacion: "ModificarProducto", producto: producto }, success: function ($respuesta) {
                $("#ModP").html($respuesta);
                ValidarProductos("modificar");
            }
        });
    });
}





















