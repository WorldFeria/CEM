
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
$('.btn-borrar_vertical3x6_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LB3X6_1.jpg";
    $('#nombre_archivo_borrar').val('LB3X6_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_vertical3x6_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LB3X6_2.jpg";
    $('#nombre_archivo_borrar').val('LB3X6_2.jpg');//SE ENVÍA AL FORMULARIO
});


//8x4
$('.btn-borrar_horizontal8x4_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LB8X4_1.jpg";
    $('#nombre_archivo_borrar').val('LB8X4_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal8x4_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LB8X4_2.jpg";
    $('#nombre_archivo_borrar').val('LB8X4_2.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal8x4_3').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LB8X4_3.jpg";
    $('#nombre_archivo_borrar').val('LB8X4_3.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_horizontal8x4_4').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LB8X4_4.jpg";
    $('#nombre_archivo_borrar').val('LB8X4_4.jpg');//SE ENVÍA AL FORMULARIO
});

//18x10
$('.btn-borrar_gran_formato_1').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LB18X10_1.jpg";
    $('#nombre_archivo_borrar').val('LB18X10_1.jpg');//SE ENVÍA AL FORMULARIO
});
$('.btn-borrar_gran_formato_2').click(function () {
    $("#titulo_texto_eli").text(" Eliminar imagen del banner horizontal 6x3 (1)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LB18X10_2.jpg";
    $('#nombre_archivo_borrar').val('LB18X10_2.jpg');//SE ENVÍA AL FORMULARIO
});

//3x6
$('.btn-vista_vertical3x6_1').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner Vertical 3x6 (6 unidades)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LB3X6_1.jpg";
});
$('.btn-vista_vertical3x6_2').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner Vertical 3x6 (6 unidades)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LB3X6_2.jpg";
});



$('.btn-vista_horizontal8x4_1').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner horizontal 8X4 (4 unidades)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LB8X4_1.jpg";
});
$('.btn-vista_horizontal8x4_2').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner horizontal 8X4 (4 unidades)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LB8X4_2.jpg";
});
$('.btn-vista_horizontal8x4_3').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner horizontal 8X4 (4 unidades)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LB8X4_3.jpg";
});
$('.btn-vista_horizontal8x4_4').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner horizontal 8X4 (4 unidades)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LB8X4_4.jpg";
});

//18x10
$('.btn-vista_gran_formato_1').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner Gran Formato (2 unidades)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LB18X10_1.jpg";
});
$('.btn-vista_gran_formato_2').click(function () {
    $("#titulo_texto_prev").text("Vista del Banner Gran Formato (2 unidades)");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LB18X10_2.jpg";
});

//Plumas
$('.btn-borrar_pluma_1').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL1.jpg";
    $('#nombre_archivo_borrar').val('LBPL1.jpg');
});
$('.btn_vista_pluma_1').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (1)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL1.jpg";
});
$('.btn-borrar_pluma_2').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL2.jpg";
    $('#nombre_archivo_borrar').val('LBPL2.jpg');
});
$('.btn_vista_pluma_2').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma(2)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL2.jpg";
});
$('.btn-borrar_pluma_3').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL3.jpg";
    $('#nombre_archivo_borrar').val('LBPL3.jpg');
});
$('.btn_vista_pluma_3').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (3)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL3.jpg";
});
$('.btn-borrar_pluma_4').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL4.jpg";
    $('#nombre_archivo_borrar').val('LBPL4.jpg');
});
$('.btn_vista_pluma_4').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (4)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL4.jpg";
});
$('.btn-borrar_pluma_5').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL5.jpg";
    $('#nombre_archivo_borrar').val('LBPL5.jpg');
});
$('.btn_vista_pluma_5').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (5)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL5.jpg";
});
$('.btn-borrar_pluma_6').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL6.jpg";
    $('#nombre_archivo_borrar').val('LBPL6.jpg');
});
$('.btn_vista_pluma_6').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (6)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL6.jpg";
});
$('.btn-borrar_pluma_7').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL7.jpg";
    $('#nombre_archivo_borrar').val('LBPL7.jpg');
});
$('.btn_vista_pluma_7').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (7)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL7.jpg";
});
$('.btn-borrar_pluma_8').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL8.jpg";
    $('#nombre_archivo_borrar').val('LBPL8.jpg');
});
$('.btn_vista_pluma_8').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (8)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL8.jpg";
});
$('.btn-borrar_pluma_9').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL9.jpg";
    $('#nombre_archivo_borrar').val('LBPL9.jpg');
});
$('.btn_vista_pluma_9').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (9)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL9.jpg";
});
$('.btn-borrar_pluma_10').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL10.jpg";
    $('#nombre_archivo_borrar').val('LBPL10.jpg');
});
$('.btn_vista_pluma_10').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (10)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL10.jpg";
});
$('.btn-borrar_pluma_11').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (11)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL11.jpg";
    $('#nombre_archivo_borrar').val('LBPL11.jpg');
});
$('.btn_vista_pluma_11').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (11)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL11.jpg";
});
$('.btn-borrar_pluma_12').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (12)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL12.jpg";
    $('#nombre_archivo_borrar').val('LBPL12.jpg');
});
$('.btn_vista_pluma_12').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (12)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL12.jpg";
});
$('.btn-borrar_pluma_13').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (13)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL13.jpg";
    $('#nombre_archivo_borrar').val('LBPL13.jpg');
});
$('.btn_vista_pluma_13').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (13)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL13.jpg";
});
$('.btn-borrar_pluma_14').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (14)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL14.jpg";
    $('#nombre_archivo_borrar').val('LBPL14.jpg');
});
$('.btn_vista_pluma_14').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (14)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL14.jpg";
});
$('.btn-borrar_pluma_15').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (15)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL15.jpg";
    $('#nombre_archivo_borrar').val('LBPL15.jpg');
});
$('.btn_vista_pluma_15').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (15)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL15.jpg";
});
$('.btn-borrar_pluma_16').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (16)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL16.jpg";
    $('#nombre_archivo_borrar').val('LBPL16.jpg');
});
$('.btn_vista_pluma_16').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (16)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL16.jpg";
});
$('.btn-borrar_pluma_17').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (17)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL17.jpg";
    $('#nombre_archivo_borrar').val('LBPL17.jpg');
});
$('.btn_vista_pluma_17').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (17)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL17.jpg";
});
$('.btn-borrar_pluma_18').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (18)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL18.jpg";
    $('#nombre_archivo_borrar').val('LBPL18.jpg');
});
$('.btn_vista_pluma_18').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (18)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL18.jpg";
});
$('.btn-borrar_pluma_19').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (19)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL19.jpg";
    $('#nombre_archivo_borrar').val('LBPL19.jpg');
});
$('.btn_vista_pluma_19').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (19)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL19.jpg";
});
$('.btn-borrar_pluma_20').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (20)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL20.jpg";
    $('#nombre_archivo_borrar').val('LBPL20.jpg');
});
$('.btn_vista_pluma_20').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (20)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL20.jpg";
});
$('.btn-borrar_pluma_21').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (21)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL21.jpg";
    $('#nombre_archivo_borrar').val('LBPL21.jpg');
});
$('.btn_vista_pluma_21').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (21)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL21.jpg";
});
$('.btn-borrar_pluma_22').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (22)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL22.jpg";
    $('#nombre_archivo_borrar').val('LBPL22.jpg');
});
$('.btn_vista_pluma_22').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (22)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL22.jpg";
});
$('.btn-borrar_pluma_23').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (23)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL23.jpg";
    $('#nombre_archivo_borrar').val('LBPL23.jpg');
});
$('.btn_vista_pluma_23').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (23)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL23.jpg";
});
$('.btn-borrar_pluma_24').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (24)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL24.jpg";
    $('#nombre_archivo_borrar').val('LBPL24.jpg');
});
$('.btn_vista_pluma_24').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (24)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL24.jpg";
});
$('.btn-borrar_pluma_25').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (25)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL25.jpg";
    $('#nombre_archivo_borrar').val('LBPL25.jpg');
});
$('.btn_vista_pluma_25').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (25)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL25.jpg";
});
$('.btn-borrar_pluma_26').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (26)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL26.jpg";
    $('#nombre_archivo_borrar').val('LBPL26.jpg');
});
$('.btn_vista_pluma_26').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (26)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL26.jpg";
});
$('.btn-borrar_pluma_27').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (27)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL27.jpg";
    $('#nombre_archivo_borrar').val('LBPL27.jpg');
});
$('.btn_vista_pluma_27').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (27)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL27.jpg";
});
$('.btn-borrar_pluma_28').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (28)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL28.jpg";
    $('#nombre_archivo_borrar').val('LBPL28.jpg');
});
$('.btn_vista_pluma_28').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (28)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL28.jpg";
});
$('.btn-borrar_pluma_29').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (29)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL29.jpg";
    $('#nombre_archivo_borrar').val('LBPL29.jpg');
});
$('.btn_vista_pluma_29').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (29)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL29.jpg";
});
$('.btn-borrar_pluma_30').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (30)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL30.jpg";
    $('#nombre_archivo_borrar').val('LBPL30.jpg');
});
$('.btn_vista_pluma_30').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (30)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL30.jpg";
});
$('.btn-borrar_pluma_31').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (31)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL31.jpg";
    $('#nombre_archivo_borrar').val('LBPL31.jpg');
});
$('.btn_vista_pluma_31').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (31)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL31.jpg";
});
$('.btn-borrar_pluma_32').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (32)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL32.jpg";
    $('#nombre_archivo_borrar').val('LBPL32.jpg');
});
$('.btn_vista_pluma_32').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (32)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL32.jpg";
});
$('.btn-borrar_pluma_33').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (33)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL33.jpg";
    $('#nombre_archivo_borrar').val('LBPL33.jpg');
});
$('.btn_vista_pluma_33').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (33)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL33.jpg";
});
$('.btn-borrar_pluma_34').click(function () {
    $("#titulo_texto_eli").text("Eliminar Pluma (34)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "LBPL34.jpg";
    $('#nombre_archivo_borrar').val('LBPL34.jpg');
});
$('.btn_vista_pluma_34').click(function () {
    $("#titulo_texto_prev").text("Vista Pluma (34)");
    var direccion_archivo = $('.obtener_url').attr('id');
    document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "LBPL34.jpg";
});

$(function () {
    //vertical 3x6
    $("input[name='banner3X6_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner3x6")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
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
                $("#respuesta_img_banner3x6").html(datos);

            }

        });
    });
    $("input[name='banner3X6_2File']").on("change", function () {
        var formData = new FormData($("#formulario_banner3x6")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
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
                $("#respuesta_img_banner3x6").html(datos);

            }

        });
    });

    



    //banner 8x4 
    $("input[name='banner8x4_1File']").on("change", function () {
        var formData = new FormData($("#formulario_banner8x4")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_banner8x4_1",'etiqueta8X4_1');

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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_banner8x4_2",'etiqueta8X4_2');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_banner8x4_3",'etiqueta8X4_3');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_banner8x4_4",'etiqueta8X4_4');
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
    //gran formato


    $("input[name='granFormato_1File']").on("change", function () {
        var formData = new FormData($("#formulario_granFormato")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_granFormato_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_granFormato_1.style.width = decimal_percentLoad + "%";
                        img_uploadbar_granFormato_1.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_granFormato_1",'etiqueta18X10_1');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_granFormato").html(datos);

            }

        });
    });


    $("input[name='granFormato_2File']").on("change", function () {
        var formData = new FormData($("#formulario_granFormato")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_granFormato_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_granFormato_2.style.width = decimal_percentLoad + "%";
                        img_uploadbar_granFormato_2.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_granFormato_2",'etiqueta18X10_2');
                }, false);
                return xhr;
            },

            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                $("#respuesta_img_granFormato").html(datos);

            }

        });
    });

    //Plumas
    $("input[name='pluma_1File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_1",'etiquetaLBPL1');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_2",'etiquetaLBPL2');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_3",'etiquetaLBPL3');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_4",'etiquetaLBPL4');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_5",'etiquetaLBPL5');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_6",'etiquetaLBPL6');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_7",'etiquetaLBPL7');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_8",'etiquetaLBPL8');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_9",'etiquetaLBPL9');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_10",'etiquetaLBPL10');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_11",'etiquetaLBPL11');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_12",'etiquetaLBPL12');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_13",'etiquetaLBPL13');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_14",'etiquetaLBPL14');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_15",'etiquetaLBPL15');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_16",'etiquetaLBPL16');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_17",'etiquetaLBPL17');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_18",'etiquetaLBPL18');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_19",'etiquetaLBPL19');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_20",'etiquetaLBPL20');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_21",'etiquetaLBPL21');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_22",'etiquetaLBPL22');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_23",'etiquetaLBPL23');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_24",'etiquetaLBPL24');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_25",'etiquetaLBPL25');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_26",'etiquetaLBPL26');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_27",'etiquetaLBPL27');
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
        var ruta = "../php/subida_imagenes_lobby.php";
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
                    comprobar100("img_uploadbar_pluma_28",'etiquetaLBPL28');
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
    $("input[name='pluma_29File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_29.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_29.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_29.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_29",'etiquetaLBPL29');
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
    $("input[name='pluma_30File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_30.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_30.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_30.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_30",'etiquetaLBPL30');
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
    $("input[name='pluma_31File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_31.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_31.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_31.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_31",'etiquetaLBPL31');
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
    $("input[name='pluma_32File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_32.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_32.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_32.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_32",'etiquetaLBPL32');
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
    $("input[name='pluma_33File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_33.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_33.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_33.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_33",'etiquetaLBPL33');
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
    $("input[name='pluma_34File']").on("change", function () {
        var formData = new FormData($("#formulario_plumas")[0]);
        var ruta = "../php/subida_imagenes_lobby.php";
        $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

                        //console.log(decimal_percentLoad);
                        img_uploadbar_pluma_34.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_pluma_34.style.width = decimal_percentLoad + "%";
                        img_uploadbar_pluma_34.textContent = decimal_percentLoad + "%";
                    }
                    comprobar100("img_uploadbar_pluma_34",'etiquetaLBPL34');
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
