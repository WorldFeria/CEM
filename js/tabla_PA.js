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
$('.btn-borrar_vertical3x6_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA3X6_1.jpg";
    $('#nombre_archivo_borrar').val('PA3X6_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical3x6_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA3X6_2.jpg";
    $('#nombre_archivo_borrar').val('PA3X6_2.jpg');//SE ENVÍA AL FORMULARIO
});

$('.btn-borrar_vertical25x3_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA2.5X3_1.jpg";
    $('#nombre_archivo_borrar').val('PA2.5X3_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical25x3_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (2)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA2.5X3_2.jpg";
    $('#nombre_archivo_borrar').val('PA2.5X3_2.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical25x3_3').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (3)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA2.5X3_3.jpg";
    $('#nombre_archivo_borrar').val('PA2.5X3_3.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical25x3_4').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (4)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA2.5X3_4.jpg";
    $('#nombre_archivo_borrar').val('PA2.5X3_4.jpg');//SE ENVÍA AL FORMULARIO
});



//8x4
$('.btn-borrar_horizontal8x4_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA8X4_1.jpg";
    $('#nombre_archivo_borrar').val('PA8X4_1.jpg');//SE ENVÍA AL FORMULARIO
});

$('.btn-borrar_horizontal8x4_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA8X4_2.jpg";
    $('#nombre_archivo_borrar').val('PA8X4_2.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_horizontal8x4_3').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA8X4_3.jpg";
    $('#nombre_archivo_borrar').val('PA8X4_3.jpg');//SE ENVÍA AL FORMULARIO
});

$('.btn-borrar_horizontal8x4_4').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA8X4_4.jpg";
    $('#nombre_archivo_borrar').val('PA8X4_4.jpg');//SE ENVÍA AL FORMULARIO
});


//6x3
$('.btn-borrar_horizontal6x3_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_1.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_2.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_2.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_3').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_3.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_3.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_4').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_4.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_4.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_5').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_5.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_5.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_6').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (6)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_6.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_6.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_7').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (7)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_7.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_7.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_8').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (8)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_8.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_8.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_9').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (9)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_9.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_9.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_10').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (10)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_10.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_10.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_11').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (11)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PA6X3_11.jpg";
    $('#nombre_archivo_borrar').val('PA6X3_11.jpg');//SE ENVÍA AL FORMULARIO
});
//3x6
$('.btn-vista_vertical3x6_1').click(function () {
    $("#titulo_texto_prev").text("Vista de los Banners Verticales 3X6 (PA3X6_1) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA3X6_1.jpg";
});
$('.btn-vista_vertical3x6_2').click(function () {
    $("#titulo_texto_prev").text("Vista de los Banners Verticales 3X6 (PA3X6_2) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA3X6_2.jpg";
});

//2.5x3
$('.btn-vista_vertical25x3_1').click(function () {
    $("#titulo_texto_prev").text("Vista de los BannerS Verticales 2.5X3 (PA2.5X3_1)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA2.5X3_1.jpg";
});
$('.btn-vista_vertical25x3_2').click(function () {
    $("#titulo_texto_prev").text("Vista de los BannerS Verticales 2.5X3 (PA2.5X3_2)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA2.5X3_2.jpg";
});
$('.btn-vista_vertical25x3_3').click(function () {
    $("#titulo_texto_prev").text("Vista de los BannerS Verticales 2.5X3 (PA2.5X3_3)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA2.5X3_3.jpg";
});
$('.btn-vista_vertical25x3_4').click(function () {
    $("#titulo_texto_prev").text("Vista de los BannerS Verticales 2.5X3 (PA2.5X3_4)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA2.5X3_4.jpg";
});
//8x4
$('.btn-vista_horizontal8x4_1').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PA8X4_1)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA8X4_1.jpg";
});
$('.btn-vista_horizontal8x4_2').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PA8X4_2)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA8X4_2.jpg";
});
$('.btn-vista_horizontal8x4_3').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PA8X4_3)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA8X4_3.jpg";
});
$('.btn-vista_horizontal8x4_4').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PA8X4_4)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA8X4_4.jpg";
});


//6x3
$('.btn-vista_horizontal6x3_1').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_1) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_1.jpg";
});
$('.btn-vista_horizontal6x3_2').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_2)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_2.jpg";
});
$('.btn-vista_horizontal6x3_3').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_3) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_3.jpg";
});
$('.btn-vista_horizontal6x3_4').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_4)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_4.jpg";
});

$('.btn-vista_horizontal6x3_5').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_5)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_5.jpg";
});
$('.btn-vista_horizontal6x3_6').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_6)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_6.jpg";
});
$('.btn-vista_horizontal6x3_7').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_7) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_7.jpg";
});
$('.btn-vista_horizontal6x3_8').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_8)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_8.jpg";
});
$('.btn-vista_horizontal6x3_9').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_9) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_9.jpg";
});
$('.btn-vista_horizontal6x3_10').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_10)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_10.jpg";
});

$('.btn-vista_horizontal6x3_11').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PA6X3_11)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PA6X3_11.jpg";
});

//Caja de Luz
$('.btn-borrar_cajaluz_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL1.jpg";
    $('#nombre_archivo_borrar').val(' PACL1.jpg');
});
$('.btn_vista_cajaluz_1').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL1.jpg";
});
$('.btn-borrar_cajaluz_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL2.jpg";
    $('#nombre_archivo_borrar').val(' PACL2.jpg');
});
$('.btn_vista_cajaluz_2').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma(2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL2.jpg";
});
$('.btn-borrar_cajaluz_3').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL3.jpg";
    $('#nombre_archivo_borrar').val(' PACL3.jpg');
});
$('.btn_vista_cajaluz_3').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL3.jpg";
});
$('.btn-borrar_cajaluz_4').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL4.jpg";
    $('#nombre_archivo_borrar').val(' PACL4.jpg');
});
$('.btn_vista_cajaluz_4').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL4.jpg";
});
$('.btn-borrar_cajaluz_5').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL5.jpg";
    $('#nombre_archivo_borrar').val(' PACL5.jpg');
});
$('.btn_vista_cajaluz_5').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL5.jpg";
});
$('.btn-borrar_cajaluz_6').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL6.jpg";
    $('#nombre_archivo_borrar').val(' PACL6.jpg');
});
$('.btn_vista_cajaluz_6').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL6.jpg";
});
$('.btn-borrar_cajaluz_7').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL7.jpg";
    $('#nombre_archivo_borrar').val(' PACL7.jpg');
});
$('.btn_vista_cajaluz_7').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL7.jpg";
});
$('.btn-borrar_cajaluz_8').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL8.jpg";
    $('#nombre_archivo_borrar').val(' PACL8.jpg');
});
$('.btn_vista_cajaluz_8').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL8.jpg";
});
$('.btn-borrar_cajaluz_9').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL9.jpg";
    $('#nombre_archivo_borrar').val(' PACL9.jpg');
});
$('.btn_vista_cajaluz_9').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL9.jpg";
});
$('.btn-borrar_cajaluz_10').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PACL10.jpg";
    $('#nombre_archivo_borrar').val(' PACL10.jpg');
});
$('.btn_vista_cajaluz_10').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PACL10.jpg";
});



//Plumas
$('.btn-borrar_pluma_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL1.jpg";
    $('#nombre_archivo_borrar').val('PAPL1.jpg');
});
$('.btn_vista_pluma_1').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL1.jpg";
});
$('.btn-borrar_pluma_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL2.jpg";
    $('#nombre_archivo_borrar').val('PAPL2.jpg');
});
$('.btn_vista_pluma_2').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma(2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL2.jpg";
});
$('.btn-borrar_pluma_3').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL3.jpg";
    $('#nombre_archivo_borrar').val('PAPL3.jpg');
});
$('.btn_vista_pluma_3').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL3.jpg";
});
$('.btn-borrar_pluma_4').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL4.jpg";
    $('#nombre_archivo_borrar').val('PAPL4.jpg');
});
$('.btn_vista_pluma_4').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL4.jpg";
});
$('.btn-borrar_pluma_5').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL5.jpg";
    $('#nombre_archivo_borrar').val('PAPL5.jpg');
});
$('.btn_vista_pluma_5').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL5.jpg";
});
$('.btn-borrar_pluma_6').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL6.jpg";
    $('#nombre_archivo_borrar').val('PAPL6.jpg');
});
$('.btn_vista_pluma_6').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL6.jpg";
});
$('.btn-borrar_pluma_7').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL7.jpg";
    $('#nombre_archivo_borrar').val('PAPL7.jpg');
});
$('.btn_vista_pluma_7').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL7.jpg";
});
$('.btn-borrar_pluma_8').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL8.jpg";
    $('#nombre_archivo_borrar').val('PAPL8.jpg');
});
$('.btn_vista_pluma_8').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL8.jpg";
});
$('.btn-borrar_pluma_9').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL9.jpg";
    $('#nombre_archivo_borrar').val('PAPL9.jpg');
});
$('.btn_vista_pluma_9').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL9.jpg";
});
$('.btn-borrar_pluma_10').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL10.jpg";
    $('#nombre_archivo_borrar').val('PAPL10.jpg');
});
$('.btn_vista_pluma_10').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL10.jpg";
});
$('.btn-borrar_pluma_11').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (11)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL11.jpg";
    $('#nombre_archivo_borrar').val('PAPL11.jpg');
});
$('.btn_vista_pluma_11').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (11)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL11.jpg";
});
$('.btn-borrar_pluma_12').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (12)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL12.jpg";
    $('#nombre_archivo_borrar').val('PAPL12.jpg');
});
$('.btn_vista_pluma_12').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (12)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL12.jpg";
});
$('.btn-borrar_pluma_13').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (13)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL13.jpg";
    $('#nombre_archivo_borrar').val('PAPL13.jpg');
});
$('.btn_vista_pluma_13').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (13)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL13.jpg";
});
$('.btn-borrar_pluma_14').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (14)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL14.jpg";
    $('#nombre_archivo_borrar').val('PAPL14.jpg');
});
$('.btn_vista_pluma_14').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma(14)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL14.jpg";
});
$('.btn-borrar_pluma_15').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (15)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL15.jpg";
    $('#nombre_archivo_borrar').val('PAPL15.jpg');
});
$('.btn_vista_pluma_15').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (15)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL15.jpg";
});
$('.btn-borrar_pluma_16').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (16)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL16.jpg";
    $('#nombre_archivo_borrar').val('PAPL16.jpg');
});
$('.btn_vista_pluma_16').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (16)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL16.jpg";
});
$('.btn-borrar_pluma_17').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (17)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL17.jpg";
    $('#nombre_archivo_borrar').val('PAPL17.jpg');
});
$('.btn_vista_pluma_17').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (17)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL17.jpg";
});
$('.btn-borrar_pluma_18').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (18)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL18.jpg";
    $('#nombre_archivo_borrar').val('PAPL18.jpg');
});
$('.btn_vista_pluma_18').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (18)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL18.jpg";
});

$('.btn-borrar_pluma_19').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (19)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL19.jpg";
    $('#nombre_archivo_borrar').val('PAPL19.jpg');
});
$('.btn_vista_pluma_19').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (19)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL19.jpg";
});
$('.btn-borrar_pluma_20').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (20)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL20.jpg";
    $('#nombre_archivo_borrar').val('PAPL20.jpg');
});
$('.btn_vista_pluma_20').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (20)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL20.jpg";
});
$('.btn-borrar_pluma_21').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (21)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL21.jpg";
    $('#nombre_archivo_borrar').val('PAPL21.jpg');
});
$('.btn_vista_pluma_21').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (21)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL21.jpg";
});
$('.btn-borrar_pluma_22').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (22)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL22.jpg";
    $('#nombre_archivo_borrar').val('PAPL22.jpg');
});
$('.btn_vista_pluma_22').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (22)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL22.jpg";
});
$('.btn-borrar_pluma_23').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (23)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL23.jpg";
    $('#nombre_archivo_borrar').val('PAPL23.jpg');
});
$('.btn_vista_pluma_23').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (23)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL23.jpg";
});
$('.btn-borrar_pluma_24').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (24)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL24.jpg";
    $('#nombre_archivo_borrar').val('PAPL24.jpg');
});
$('.btn_vista_pluma_24').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (24)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL24.jpg";
});
$('.btn-borrar_pluma_25').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (25)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL25.jpg";
    $('#nombre_archivo_borrar').val('PAPL25.jpg');
});
$('.btn_vista_pluma_25').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (25)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL25.jpg";
});
$('.btn-borrar_pluma_26').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (26)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL26.jpg";
    $('#nombre_archivo_borrar').val('PAPL26.jpg');
});
$('.btn_vista_pluma_26').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (26)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL26.jpg";
});
$('.btn-borrar_pluma_27').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (27)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL27.jpg";
    $('#nombre_archivo_borrar').val('PAPL27.jpg');
});
$('.btn_vista_pluma_27').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (27)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL27.jpg";
});
$('.btn-borrar_pluma_28').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (28)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PAPL28.jpg";
    $('#nombre_archivo_borrar').val('PAPL28.jpg');
});
$('.btn_vista_pluma_28').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (28)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PAPL28.jpg";
});






$(function () {
    //3x6
    $("input[name='banner3X6_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner3x6")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner3X6_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner3X6_1.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner3X6_1.textContent = decimal_percentLoad + "%";
                    }
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner3x6").html(datos);

            }

        });
    });
    $("input[name='banner3X6_2File']").on("change", function () {
        var formData = new FormData($("#formulario_banner3x6")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner3X6_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner3X6_2.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner3X6_2.textContent = decimal_percentLoad + "%";
                    }
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_banner3x6").html(datos);

            }

        });
    });

    //2.5x3
    $("input[name='banner25x3_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner25x3")[0]);
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        img_uploadbar_banner25x3_3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner25x3_3.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner25x3_3.textContent = decimal_percentLoad + "%";
                    }
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
        var ruta = "../php/subida_imagenesPA.php";
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
    //MODAL PARA BANNER HORIZONTAL 8X4






    $("input[name='banner8x4_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
    $("input[name='banner8x4_3File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner8x4_3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner8x4_3.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner8x4_3.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='banner8x4_4File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner8x4_4.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner8x4_4.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner8x4_4.textContent = decimal_percentLoad + "%";
                    }
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

    
    //MODAL PARA BANNER HORIZONTAL 6x3


    $("input[name='banner6x3_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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

    $("input[name='banner6x3_6File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        img_uploadbar_banner6x3_6.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_6.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_6.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='banner6x3_7File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_7.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_7.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_7.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='banner6x3_8File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_8.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_8.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_8.textContent = decimal_percentLoad + "%";
                    }
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

    $("input[name='banner6x3_9File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_9.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_9.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_9.textContent = decimal_percentLoad + "%";
                    }
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

    $("input[name='banner6x3_10File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_10.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_10.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_10.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='banner6x3_11File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner6x3_11.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner6x3_11.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner6x3_11.textContent = decimal_percentLoad + "%";
                    }
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
    //Cajas de Luz
    $("input[name='cajaluz_1File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
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
    $("input[name='cajaluz_2File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
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
    $("input[name='cajaluz_3File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_3.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_3.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='cajaluz_4File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_4.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_4.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_4.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='cajaluz_5File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_5.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_5.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_5.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='cajaluz_6File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_6.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_6.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_6.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='cajaluz_7File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_7.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_7.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_7.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='cajaluz_8File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_8.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_8.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_8.textContent = decimal_percentLoad + "%";
                    }
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

    $("input[name='cajaluz_9File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_9.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_9.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_9.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='cajaluz_10File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_cajaluz_10.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_cajaluz_10.style.width = decimal_percentLoad + "%";
                        img_uploadbar_cajaluz_10.textContent = decimal_percentLoad + "%";
                    }
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


    //Plumas
    $("input[name='pluma_1File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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
        var ruta = "../php/subida_imagenesPA.php";
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



    $("input[name='pluma_20File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_20.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_20.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_20.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_21File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_21.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_21.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_21.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_22File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_22.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_22.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_22.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_13File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_13.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_13.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_13.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_14File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_14.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_14.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_14.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_15File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_15.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_15.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_15.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_16File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_16.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_16.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_16.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_17File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_17.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_17.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_17.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_18File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_18.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_18.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_18.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_19File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_19.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_19.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_19.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_23File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_23.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_23.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_23.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_24File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_24.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_24.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_24.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_25File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_25.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_25.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_25.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_26File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_26.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_26.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_26.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_27File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_27.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_27.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_27.textContent = decimal_percentLoad + "%";
                    }
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
    $("input[name='pluma_28File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPA.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
    
                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
    
                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_28.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_28.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_28.textContent = decimal_percentLoad + "%";
                    }
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