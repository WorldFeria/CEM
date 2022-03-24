
function comprobar100(id,etiqueta){

    let barra = document.getElementById(id);
    if(barra.ariaValueNow == "100.00"){
        barra.className += " bg-success";
        let label = document.getElementById(etiqueta); //cambiamos la clase y el texto
        $('#'+etiqueta).removeClass("bg-warning").addClass("bg-success");
        label.innerHTML = "Archivo Subido";
    } 


    
}
$("#formulario_borrar_archivo").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: "../php/borrado_imagenes.php",
        data: $(this).serialize() + ("&param=borrar_imagen_espacio"),

        success: function (data) {
            Swal.fire({
                title: '¡HECHO!',
                text: 'La imagen se ha eliminado con exito!.',
                icon: 'success',
                confirmButtonText: 'Regresar'
            })
            $("#borrar_imagen").modal("hide");
        },
        error: function () {
            Swal.fire({
                title: '¡ERROR!',
                text: 'Ocurrio un error al momento de eliminar la imagen.',
                icon: 'error',
                confirmButtonText: 'Regresar'
            })
        }
    })
});





//3x6
$('.btn-borrar_banner3x6_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI3X6_1.jpg";
    $('#nombre_archivo_borrar').val('PI3X6_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_banner3x6_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI3X6_2.jpg";
    $('#nombre_archivo_borrar').val('PI3X6_2.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn_vista_banner3x6_1').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner 3X6 (PI3X6_1) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI3X6_1.jpg";
});
$('.btn_vista_banner3x6_2').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner 3X6 (PI3X6_2) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI3X6_2.jpg";
});

//2.5x3
$('.btn-borrar_vertical25x3_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI2.5X3_1.jpg";
    $('#nombre_archivo_borrar').val('PI2.5X3_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical25x3_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI2.5X3_2.jpg";
    $('#nombre_archivo_borrar').val('PI2.5X3_2.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical25x3_3').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI2.5X3_3.jpg";
    $('#nombre_archivo_borrar').val('PI2.5X3_3.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical25x3_4').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI2.5X3_4.jpg";
    $('#nombre_archivo_borrar').val('PI2.5X3_4.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn_vista_vertical25x3_1').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_1 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI2.5X3_1.jpg";
});
$('.btn_vista_vertical25x3_2').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_2 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI2.5X3_2.jpg";
});
$('.btn_vista_vertical25x3_3').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_1 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI2.5X3_3.jpg";
});
$('.btn_vista_vertical25x3_4').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_2 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI2.5X3_4.jpg";
});

//8x4
$('.btn-borrar_horizontal8x4_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI8X4_1.jpg";
    $('#nombre_archivo_borrar').val('PI8X4_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal8x4_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI8X4_2.jpg";
    $('#nombre_archivo_borrar').val('PI8X4_2.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn_vista_horizontal8x4_1').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_1 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI8X4_1.jpg";
});
$('.btn_vista_horizontal8x4_2').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_2 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI8X4_2.jpg";
});

//6x3
$('.btn-borrar_horizontal6x3_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI6X3_1.jpg";
    $('#nombre_archivo_borrar').val('PI6X3_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI6X3_2.jpg";
    $('#nombre_archivo_borrar').val('PI6X3_2.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_3').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI6X3_3.jpg";
    $('#nombre_archivo_borrar').val('PI6X3_3.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_4').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI6X3_4.jpg";
    $('#nombre_archivo_borrar').val('PI6X3_4.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_5').click(function () {
    $("#titulo_texto_eli").text("Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PI6X3_5.jpg";
    $('#nombre_archivo_borrar').val('PI6X3_5.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn_vista_horizontal6x3_1').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_1 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI6X3_1.jpg";
});
$('.btn_vista_horizontal6x3_2').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_2 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI6X3_2.jpg";
});
$('.btn_vista_horizontal6x3_3').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_1 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI6X3_3.jpg";
});
$('.btn_vista_horizontal6x3_4').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_2 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI6X3_4.jpg";
});
$('.btn_vista_horizontal6x3_5').click(function () {
    $("#titulo_texto_prev").text("Vista del btn_vista_vertical25x3_2 ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PI6X3_5.jpg";
});

//Caja de Luz
$('.btn-borrar_cajaluz_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PICL1.jpg";
    $('#nombre_archivo_borrar').val('PICL1.jpg');
});
$('.btn_vista_cajaluz_1').click(function () {
    $("#titulo_texto_prev").text("Vista Caja de Luz (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PICL1.jpg";
});
$('.btn-borrar_cajaluz_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz (2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PICL2.jpg";
    $('#nombre_archivo_borrar').val('PICL2.jpg');
});
$('.btn_vista_cajaluz_2').click(function () {
    $("#titulo_texto_prev").text("Vista Caja de Luz (2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PICL2.jpg";
});

//Plumas
$('.btn-borrar_pluma_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL1.jpg";
    $('#nombre_archivo_borrar').val('PIPL1.jpg');
});
$('.btn_vista_pluma_1').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL1.jpg";
});
$('.btn-borrar_pluma_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL2.jpg";
    $('#nombre_archivo_borrar').val('PIPL2.jpg');
});
$('.btn_vista_pluma_2').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma(2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL2.jpg";
});
$('.btn-borrar_pluma_3').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL3.jpg";
    $('#nombre_archivo_borrar').val('PIPL3.jpg');
});
$('.btn_vista_pluma_3').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL3.jpg";
});
$('.btn-borrar_pluma_4').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL4.jpg";
    $('#nombre_archivo_borrar').val('PIPL4.jpg');
});
$('.btn_vista_pluma_4').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL4.jpg";
});
$('.btn-borrar_pluma_5').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL5.jpg";
    $('#nombre_archivo_borrar').val('PIPL5.jpg');
});
$('.btn_vista_pluma_5').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL5.jpg";
});
$('.btn-borrar_pluma_6').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL6.jpg";
    $('#nombre_archivo_borrar').val('PIPL6.jpg');
});
$('.btn_vista_pluma_6').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL6.jpg";
});
$('.btn-borrar_pluma_7').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL7.jpg";
    $('#nombre_archivo_borrar').val('PIPL7.jpg');
});
$('.btn_vista_pluma_7').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL7.jpg";
});
$('.btn-borrar_pluma_8').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL8.jpg";
    $('#nombre_archivo_borrar').val('PIPL8.jpg');
});
$('.btn_vista_pluma_8').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL8.jpg";
});
$('.btn-borrar_pluma_9').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL9.jpg";
    $('#nombre_archivo_borrar').val('PIPL9.jpg');
});
$('.btn_vista_pluma_9').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL9.jpg";
});
$('.btn-borrar_pluma_10').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL10.jpg";
    $('#nombre_archivo_borrar').val('PIPL10.jpg');
});
$('.btn_vista_pluma_10').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL10.jpg";
});
$('.btn-borrar_pluma_11').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (11)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL11.jpg";
    $('#nombre_archivo_borrar').val('PIPL11.jpg');
});
$('.btn_vista_pluma_11').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (11)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL11.jpg";
});
$('.btn-borrar_pluma_12').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (12)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PIPL12.jpg";
    $('#nombre_archivo_borrar').val('PIPL12.jpg');
});
$('.btn_vista_pluma_12').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (12)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PIPL12.jpg";
});

$(function() {
    //8X4
    $("input[name='banner8x4_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner8x4_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner8x4_1.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner8x4_1.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner8x4_1",'etiquetaPI8X4_1');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner8x4").html(datos);

            }

        });
    });
    $("input[name='banner8x4_2File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner8x4_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner8x4_2.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner8x4_2.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner8x4_2",'etiquetaPI8X4_2');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner8x4").html(datos);

            }

        });
    });

    //6x3
    $("input[name='banner6x3_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_1.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_1.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner6x3_1",'etiquetaPI6X3_1');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner6x3").html(datos);

            }

        });
    });
    $("input[name='banner6x3_2File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_2.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_2.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner6x3_2",'etiquetaPI6X3_2');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner6x3").html(datos);

            }

        });
    });
    $("input[name='banner6x3_3File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_3.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_3.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner6x3_3",'etiquetaPI6X3_3');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner6x3").html(datos);

            }

        });
    });
    $("input[name='banner6x3_4File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_4.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_4.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_4.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner6x3_4",'etiquetaPI6X3_4');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner6x3").html(datos);

            }

        });
    });
    $("input[name='banner6x3_5File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_5.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_5.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_5.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner6x3_5",'etiquetaPI6X3_5');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner6x3").html(datos);
            }
        });
    });

    //3x6
    $("input[name='banner3X6_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner3x6")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner3X6_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner3X6_1.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner3X6_1.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner3X6_1",'etiquetaPI3X6_1');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner25x3").html(datos);
            }
        });
    });
    $("input[name='banner3X6_2File']").on("change", function () {
        var formData = new FormData($("#formulario_banner3x6")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner3X6_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner3X6_2.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner3X6_2.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner3X6_2",'etiquetaPI3X6_2');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner25x3").html(datos);
            }
        });
    });

    //2.5x3
    $("input[name='banner25x3_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner25x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner25x3_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner25x3_1.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner25x3_1.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner25x3_1",'etiquetaPI2_5X3_1');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner25x3").html(datos);
            }
        });
    });
    $("input[name='banner25x3_2File']").on("change", function () {
        var formData = new FormData($("#formulario_banner25x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner25x3_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner25x3_2.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner25x3_2.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner25x3_2",'etiquetaPI2_5X3_2');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner25x3").html(datos);
            }
        });
    });
    $("input[name='banner25x3_3File']").on("change", function () {
        var formData = new FormData($("#formulario_banner25x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner25x3_3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner25x3_3.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner25x3_3.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner25x3_3",'etiquetaPI2_5X3_3');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner25x3").html(datos);

            }

        });
    });
    $("input[name='banner25x3_4File']").on("change", function () {
        var formData = new FormData($("#formulario_banner25x3")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner25x3_4.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner25x3_4.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner25x3_4.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_banner25x3_4",'etiquetaPI2_5X3_4');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner25x3").html(datos);

            }

        });
    });

    //Cajas de Luz
    $("input[name='cajaluz_1File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_1.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_1.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_cajaluz_1",'etiquetaPICL1');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_cajaluz").html(datos);
            }
        });
    });
    $("input[name='cajaluz_2File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_2.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_2.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_cajaluz_2",'etiquetaPICL2');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_cajaluz").html(datos);
            }
        });
    });

    //Plumas
    $("input[name='pluma_1File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_1.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_1.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_1",'etiquetaPIPL1');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_2File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_2.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_2.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_2",'etiquetaPIPL2');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_3File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_3.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_3.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_3",'etiquetaPIPL3');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_4File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_4.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_4.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_4.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_4",'etiquetaPIPL4');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_5File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_5.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_5.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_5.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_5",'etiquetaPIPL5');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_6File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_6.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_6.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_6.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_6",'etiquetaPIPL6');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_7File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_7.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_7.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_7.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_7",'etiquetaPIPL7');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_8File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_8.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_8.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_8.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_8",'etiquetaPIPL8');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_9File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_9.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_9.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_9.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_9",'etiquetaPIPL9');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_10File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_10.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_10.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_10.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_10",'etiquetaPIPL10');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_11File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_11.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_11.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_11.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_11",'etiquetaPIPL11');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
    $("input[name='pluma_12File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPI.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_12.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_12.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_12.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_12",'etiquetaPIPL12');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_plumas").html(datos);
            }
        });
    });
});