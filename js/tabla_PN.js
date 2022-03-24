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
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN3X6_1.jpg";
    $('#nombre_archivo_borrar').val('PN3X6_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical3x6_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN3X6_2.jpg";
    $('#nombre_archivo_borrar').val('PN3X6_2.jpg');//SE ENVÍA AL FORMULARIO
});

$('.btn-borrar_vertical25x3_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN2.5X3_1.jpg";
    $('#nombre_archivo_borrar').val('PN2.5X3_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical25x3_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN2.5X3_2.jpg";
    $('#nombre_archivo_borrar').val('PN2.5X3_2.jpg');//SE ENVÍA AL FORMULARIO
});

//8x4
$('.btn-borrar_horizontal8x4_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN8X4_1.jpg";
    $('#nombre_archivo_borrar').val('PN8X4_1.jpg');//SE ENVÍA AL FORMULARIO
});

$('.btn-borrar_horizontal8x4_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN8X4_2.jpg";
    $('#nombre_archivo_borrar').val('PN8X4_2.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_horizontal8x4_3').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN8X4_3.jpg";
    $('#nombre_archivo_borrar').val('PN8X4_3.jpg');//SE ENVÍA AL FORMULARIO
});

$('.btn-borrar_horizontal8x4_4').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN8X4_4.jpg";
    $('#nombre_archivo_borrar').val('PN8X4_4.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal8x4_5').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN8X4_5.jpg";
    $('#nombre_archivo_borrar').val('PN8X4_5.jpg');//SE ENVÍA AL FORMULARIO
});

$('.btn-borrar_horizontal8x4_6').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN8X4_6.jpg";
    $('#nombre_archivo_borrar').val('PN8X4_6.jpg');//SE ENVÍA AL FORMULARIO
});

//6x3
$('.btn-borrar_horizontal6x3_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN6X3_1.jpg";
    $('#nombre_archivo_borrar').val('PN6X3_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN6X3_2.jpg";
    $('#nombre_archivo_borrar').val('PN6X3_2.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_3').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN6X3_3.jpg";
    $('#nombre_archivo_borrar').val('PN6X3_3.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_4').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN6X3_4.jpg";
    $('#nombre_archivo_borrar').val('PN6X3_4.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal6x3_5').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PN6X3_5.jpg";
    $('#nombre_archivo_borrar').val('PN6X3_5.jpg');//SE ENVÍA AL FORMULARIO
});

//3x6
$('.btn-vista_vertical3x6_1').click(function () {
    $("#titulo_texto_prev").text("Vista de los Banners Verticales 3X6 (PN3X6_1) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN3X6_1.jpg";
});
$('.btn-vista_vertical3x6_2').click(function () {
    $("#titulo_texto_prev").text("Vista de los Banners Verticales 3X6 (PN3X6_2) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN3X6_2.jpg";
});

//2.5x3
$('.btn-vista_vertical25x3_1').click(function () {
    $("#titulo_texto_prev").text("Vista de los BannerS Verticales 2.5X3 (PN2.5X3_1)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN2.5X3_1.jpg";
});
$('.btn-vista_vertical25x3_2').click(function () {
    $("#titulo_texto_prev").text("Vista de los BannerS Verticales 2.5X3 (PN2.5X3_2)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN2.5X3_2.jpg";
});

//8x4
$('.btn-vista_horizontal8x4_1').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PN8X4_1)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN8X4_1.jpg";
});
$('.btn-vista_horizontal8x4_2').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PN8X4_2)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN8X4_2.jpg";
});
$('.btn-vista_horizontal8x4_3').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PN8X4_3)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN8X4_3.jpg";
});
$('.btn-vista_horizontal8x4_4').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PN8X4_4)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN8X4_4.jpg";
});
$('.btn-vista_horizontal8x4_5').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PN8X4_5)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN8X4_5.jpg";
});
$('.btn-vista_horizontal8x4_6').click(function () {
    $("#titulo_texto_prev").text("Banner horizontal 8X4 (PN8X4_6)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN8X4_6.jpg";
});

//6x3
$('.btn-vista_horizontal6x3_1').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PN6X3_1) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN6X3_1.jpg";
});
$('.btn-vista_horizontal6x3_2').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PN6X3_2)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN6X3_2.jpg";
});
$('.btn-vista_horizontal6x3_3').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PN6X3_3) ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN6X3_3.jpg";
});
$('.btn-vista_horizontal6x3_4').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PN6X3_4)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN6X3_4.jpg";
});

$('.btn-vista_horizontal6x3_5').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PN6X3_5)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN6X3_5.jpg";
});
$('.btn-vista_horizontal6x3_6').click(function () {
    $("#titulo_texto_prev").text("Banner Horizontal 6X3 (PN6X3_6)  ");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PN6X3_6.jpg";
});

//Caja de Luz
$('.btn-borrar_cajaluz_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PNCL1.jpg";
    $('#nombre_archivo_borrar').val(' PNCL1.jpg');
});
$('.btn_vista_cajaluz_1').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PNCL1.jpg";
});
$('.btn-borrar_cajaluz_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PNCL2.jpg";
    $('#nombre_archivo_borrar').val(' PNCL2.jpg');
});
$('.btn_vista_cajaluz_2').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma(2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PNCL2.jpg";
});
$('.btn-borrar_cajaluz_3').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PNCL3.jpg";
    $('#nombre_archivo_borrar').val(' PNCL3.jpg');
});
$('.btn_vista_cajaluz_3').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PNCL3.jpg";
});
$('.btn-borrar_cajaluz_4').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PNCL4.jpg";
    $('#nombre_archivo_borrar').val(' PNCL4.jpg');
});
$('.btn_vista_cajaluz_4').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PNCL4.jpg";
});
$('.btn-borrar_cajaluz_5').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PNCL5.jpg";
    $('#nombre_archivo_borrar').val(' PNCL5.jpg');
});
$('.btn_vista_cajaluz_5').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PNCL5.jpg";
});
$('.btn-borrar_cajaluz_6').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PNCL6.jpg";
    $('#nombre_archivo_borrar').val(' PNCL6.jpg');
});
$('.btn_vista_cajaluz_6').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PNCL6.jpg";
});
$('.btn-borrar_cajaluz_7').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PNCL7.jpg";
    $('#nombre_archivo_borrar').val(' PNCL7.jpg');
});
$('.btn_vista_cajaluz_7').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PNCL7.jpg";
});
$('.btn-borrar_cajaluz_8').click(function () {
    $("#titulo_texto_eli").text("Eliminar Caja de Luz(8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + " PNCL8.jpg";
    $('#nombre_archivo_borrar').val(' PNCL8.jpg');
});
$('.btn_vista_cajaluz_8').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + " PNCL8.jpg";
});

//Plumas
$('.btn-borrar_pluma_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL1.jpg";
    $('#nombre_archivo_borrar').val('PNPL1.jpg');
});
$('.btn_vista_pluma_1').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL1.jpg";
});
$('.btn-borrar_pluma_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL2.jpg";
    $('#nombre_archivo_borrar').val('PNPL2.jpg');
});
$('.btn_vista_pluma_2').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma(2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL2.jpg";
});
$('.btn-borrar_pluma_3').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL3.jpg";
    $('#nombre_archivo_borrar').val('PNPL3.jpg');
});
$('.btn_vista_pluma_3').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL3.jpg";
});
$('.btn-borrar_pluma_4').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL4.jpg";
    $('#nombre_archivo_borrar').val('PNPL4.jpg');
});
$('.btn_vista_pluma_4').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL4.jpg";
});
$('.btn-borrar_pluma_5').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL5.jpg";
    $('#nombre_archivo_borrar').val('PNPL5.jpg');
});
$('.btn_vista_pluma_5').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL5.jpg";
});
$('.btn-borrar_pluma_6').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL6.jpg";
    $('#nombre_archivo_borrar').val('PNPL6.jpg');
});
$('.btn_vista_pluma_6').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL6.jpg";
});
$('.btn-borrar_pluma_7').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL7.jpg";
    $('#nombre_archivo_borrar').val('PNPL7.jpg');
});
$('.btn_vista_pluma_7').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL7.jpg";
});
$('.btn-borrar_pluma_8').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL8.jpg";
    $('#nombre_archivo_borrar').val('PNPL8.jpg');
});
$('.btn_vista_pluma_8').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL8.jpg";
});
$('.btn-borrar_pluma_9').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL9.jpg";
    $('#nombre_archivo_borrar').val('PNPL9.jpg');
});
$('.btn_vista_pluma_9').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL9.jpg";
});
$('.btn-borrar_pluma_10').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL10.jpg";
    $('#nombre_archivo_borrar').val('PNPL10.jpg');
});
$('.btn_vista_pluma_10').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL10.jpg";
});
$('.btn-borrar_pluma_11').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (11)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL11.jpg";
    $('#nombre_archivo_borrar').val('PNPL11.jpg');
});
$('.btn_vista_pluma_11').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (11)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL11.jpg";
});
$('.btn-borrar_pluma_12').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (12)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "PNPL12.jpg";
    $('#nombre_archivo_borrar').val('PNPL12.jpg');
});
$('.btn_vista_pluma_12').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (12)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "PNPL12.jpg";
});

$(function () {
    //3x6
    $("input[name='banner3X6_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner3x6")[0]);
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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

    //MODAL PARA BANNER HORIZONTAL 8X4






    $("input[name='banner8x4_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
    $("input[name='banner8x4_5File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenesPN.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner8x4_5.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner8x4_5.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner8x4_5.textContent = decimal_percentLoad + "%";
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
    $("input[name='banner8x4_6File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenesPN.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner8x4_6.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner8x4_6.style.width = decimal_percentLoad + "%";
                        img_uploadbar_banner8x4_6.textContent = decimal_percentLoad + "%";
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

    //6x3
    $("input[name='banner6x3_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner6x3")[0]);
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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

    //Cajas de Luz
    $("input[name='cajaluz_1File']").on("change", function () {
        var formData = new FormData($("#formulario_cajaluz")[0]);
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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

    //Plumas
    $("input[name='pluma_1File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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
        var ruta = "../php/subida_imagenesPN.php";
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

});