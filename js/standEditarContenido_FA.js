$(document).ready(function () {



$("#formulario_borrar_folleto").on("submit", function (event) {

  event.preventDefault();

  $.ajax({
    type: 'POST',
    url: "../php/borrado_imagenes.php",
    data: $(this).serialize() + ("&param=borrar_pdf"),


    success: function (data) {

      Swal.fire({
        title: 'Misión Cumplida!',
        text: 'La imagen se ha eliminado con exito!.',
        icon: 'success',
        confirmButtonText: 'Ok'
      })

      $(".borrar_folleto").modal("hide");

    },
    error: function () {
      Swal.fire({
        title: 'Misión Fallida!',
        text: 'Ocurrio un error al momento de eliminar la imagen.',
        icon: 'error',
        confirmButtonText: 'Ok'
      })

    }
  })

});



$("#formulario_borrar_pdf").on("submit", function (event) {

  event.preventDefault();

  $.ajax({
    type: 'POST',
    url: "../php/borrado_imagenes.php",
    data: $(this).serialize() + ("&param=borrar_pdf"),


    success: function (data) {

      Swal.fire({
        title: 'Misión Cumplida!',
        text: 'La imagen se ha eliminado con exito!.',
        icon: 'success',
        confirmButtonText: 'Ok'
      })

      $(".borrar_pdf").modal("hide");

    },
    error: function () {
      Swal.fire({
        title: 'Misión Fallida!',
        text: 'Ocurrio un error al momento de eliminar la imagen.',
        icon: 'error',
        confirmButtonText: 'Ok'
      })

    }
  })

});





  $("#formulario_borrar_archivo").on("submit", function (event) { 

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/borrado_imagenes.php",
      data: $(this).serialize() + ("&param=borrar_imagen"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'La imagen se ha eliminado con exito!.',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $("#borrar_imagen").modal("hide");

      },
      error: function () {
        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Ocurrio un error al momento de eliminar la imagen.',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  });

  $("#formulario_borrar_video").on("submit", function (event) { 

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/borrado_imagenes.php",
      data: $(this).serialize() + ("&param=borrar_video"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'La imagen se ha eliminado con exito!.',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $("#borrar_video").modal("hide");

      },
      error: function () {
        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Ocurrio un error al momento de eliminar la imagen.',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  });
  $("#formulario_borrar_video2").on("submit", function (event) { 

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/borrado_imagenes.php",
      data: $(this).serialize() + ("&param=borrar_video"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'La imagen se ha eliminado con exito!.',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $("#borrar_video").modal("hide");

      },
      error: function () {
        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Ocurrio un error al momento de eliminar la imagen.',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  });

  $('#reload').click(function(){
    var codigo_stand = $('.obtener_id_stand').attr('id');//obtenemos la dirección de la imagen
    $('#page_content').load(`tabla_stand_pub_FA.php?cod_stand=${codigo_stand}`);

  });



  $('.btn_borrar_ipad').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "imgIpad.jpg";
    $('#nombre_archivo_borrar').val('imgIpad.jpg');//SE ENVÍA AL FORMULARIO

  });




$('.btn_vista_ipad').click(function(){


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "imgIpad.jpg";

  });


$('.btn_vista_folleto_1').click(function(){


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "folleto1.jpg";

  });

$('.btn_vista_folleto_2').click(function(){


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "folleto2.jpg";

  });

$('.btn_vista_folleto_3').click(function(){


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "folleto3.jpg";

  });









  $('.btn_borrar_folleto_1').click(function(){

    $("titulo_texto_eli").text(" Eliminar folleto n. 1");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "folleto1.jpg";
    $('#nombre_archivo_borrar').val('folleto1.jpg');//SE ENVÍA AL FORMULARIO

  });

  $('.btn_borrar_folleto_2').click(function(){

    $("titulo_texto_eli").text(" Eliminar folleto n. 2");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "folleto2.jpg";
    $('#nombre_archivo_borrar').val('folleto2.jpg');//SE ENVÍA AL FORMULARIO

  });

  $('.btn_borrar_folleto_3').click(function(){

    $("titulo_texto_eli").text(" Eliminar folleto n. 3");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "folleto3.jpg";
    $('#nombre_archivo_borrar').val('folleto3.jpg');//SE ENVÍA AL FORMULARIO

  });










  $('.btn_borrar_pdf_1').click(function(){

    $('#nombre_archivo_pdf').val('pdf_1.pdf');//SE ENVÍA AL FORMULARIO

  });

  $('.btn_borrar_pdf_2').click(function(){

    $('#nombre_archivo_pdf').val('pdf_2.pdf');//SE ENVÍA AL FORMULARIO

  });

  $('.btn_borrar_pdf_3').click(function(){

    $('#nombre_archivo_pdf').val('pdf_3.pdf');//SE ENVÍA AL FORMULARIO

  });






  $('.btn-borrar_logo_1').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 1");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "logo_unid1.jpg";
    $('#nombre_archivo_borrar').val('logo_unid1.jpg');//SE ENVÍA AL FORMULARIO

  });


  $('.btn-borrar_logo_2').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 2");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "logo_unid2.jpg";
    $('#nombre_archivo_borrar').val('logo_unid2.jpg');//SE ENVÍA AL FORMULARIO

  });


  $('.btn-borrar_logo_3').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 3");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "logo_unid3.jpg";
    $('#nombre_archivo_borrar').val('logo_unid3.jpg');//SE ENVÍA AL FORMULARIO

  });

  $('.btn-borrar_logo_4').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 4");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "logo_unid4.jpg";
    $('#nombre_archivo_borrar').val('logo_unid4.jpg');//SE ENVÍA AL FORMULARIO

  });

  $('.btn-borrar_banner_1').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 4");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "banner1_unid1.jpg";
    $('#nombre_archivo_borrar').val('banner1_unid1.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_banner_2').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 4");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "banner1_unid2.jpg";
    $('#nombre_archivo_borrar').val('banner1_unid2.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_banner2_1').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 4");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "banner2_unid1.jpg";
    $('#nombre_archivo_borrar').val('banner2_unid1.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_banner2_2').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 4");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "banner2_unid2.jpg";
    $('#nombre_archivo_borrar').val('banner2_unid2.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_portada_1').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 4");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "portadaGaleria_cara1.jpg";
    $('#nombre_archivo_borrar').val('portadaGaleria_cara1.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_portada_2').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen del Logo n. 4");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "portadaGaleria_cara2.jpg";
    $('#nombre_archivo_borrar').val('portadaGaleria_cara2.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_1').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 1 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img1Galeria.jpg";
    $('#nombre_archivo_borrar').val('img1Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_2').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 2 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img2Galeria.jpg";
    $('#nombre_archivo_borrar').val('img2Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_3').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 3 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img3Galeria.jpg";
    $('#nombre_archivo_borrar').val('img3Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_4').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 4 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img4Galeria.jpg";
    $('#nombre_archivo_borrar').val('img4Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_5').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 5 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img5Galeria.jpg";
    $('#nombre_archivo_borrar').val('img5Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_6').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 6 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img6Galeria.jpg";
    $('#nombre_archivo_borrar').val('img6Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_7').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 7 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img7Galeria.jpg";
    $('#nombre_archivo_borrar').val('img7Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_8').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 8 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img8Galeria.jpg";
    $('#nombre_archivo_borrar').val('img8Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_9').click(function(){

    $("titulo_texto_eli").text("Eliminar imagen n. 9 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img9Galeria.jpg";
    $('#nombre_archivo_borrar').val('img9Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_10').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 10 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img10Galeria.jpg";
    $('#nombre_archivo_borrar').val('img10Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_11').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 11 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img11Galeria.jpg";
    $('#nombre_archivo_borrar').val('img11Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });
  $('.btn-borrar_imgG_12').click(function(){

    $("titulo_texto_eli").text(" Eliminar imagen n. 12 de la galería");


    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "img12Galeria.jpg";
    $('#nombre_archivo_borrar').val('img12Galeria.jpg');//SE ENVÍA AL FORMULARIO

  });



  $('.btn-borrar_video').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("video_mostrada_eli1").src= direccion_archivo + "videoPantalla1.mp4";
    $('#nombre_video_borrar1').val('videoPantalla1.mp4');//SE ENVÍA AL FORMULARIO

  });

  $('.btn-borrar_video_2').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    document.getElementById("video_mostrada_eli2").src= direccion_archivo + "videoPantalla2.mp4";
    $('#nombre_video_borrar2').val('videoPantalla2.mp4');//SE ENVÍA AL FORMULARIO

  });




$('.btn-vista_videoP_1').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("video_mostrada_real_vista1").src= direccion_archivo + "videoPantalla1.mp4";

  });


$('.btn-vista_videoP_2').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("video_mostrada_real_vista2").src= direccion_archivo + "videoPantalla2.mp4";

  });




$('.btn-vista_logo_1').click(function(){

    $("#titulo_texto_prev").text("Vista del logo número 1");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "logo_unid1.jpg";

  });
$('.btn-vista_logo_2').click(function(){

    $("#titulo_texto_prev").text("Vista del logo número 2");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "logo_unid2.jpg";

  });
$('.btn-vista_logo_3').click(function(){

    $("#titulo_texto_prev").text("Vista del logo número 3");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "logo_unid3.jpg";

  });
$('.btn-vista_logo_4').click(function(){

    $("#titulo_texto_prev").text("Vista del logo número 4");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "logo_unid4.jpg";

  });
$('.btn-vista_banner_1').click(function(){

    $("#titulo_texto_prev").text("Vista del banner 1 (1)");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "banner1_unid1.jpg";

  });
$('.btn-vista_banner_2').click(function(){

    $("#titulo_texto_prev").text("Vista del banner 1 (2)");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "banner1_unid2.jpg";

  });

$('.btn-vista_banner2_1').click(function(){

    $("#titulo_texto_prev").text("Vista del banner 2 (1)");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "banner2_unid1.jpg";

  });
$('.btn-vista_banner2_2').click(function(){

    $("#titulo_texto_prev").text("Vista del banner 2 (2)");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "banner2_unid2.jpg";

  });
$('.btn-vista_portada_1').click(function(){

    $("#titulo_texto_prev").text("Vista de la portada (cara 1)");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "portadaGaleria_cara1.jpg";

  });
$('.btn-vista_portada_2').click(function(){

    $("#titulo_texto_prev").text("Vista de la portada (cara 2)");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "portadaGaleria_cara2.jpg";

  });

$('.btn-vista_imgG_1').click(function(){

    $("#titulo_texto_prev").text("Primera imagen de la galería ");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img1Galeria.jpg";

  });
$('.btn-vista_imgG_2').click(function(){

    $("#titulo_texto_prev").text("Segunda imagen de la galería ");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img2Galeria.jpg";

  });
$('.btn-vista_imgG_3').click(function(){

    $("#titulo_texto_prev").text("Tercera imagen de la galeria");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img3Galeria.jpg";

  });
$('.btn-vista_imgG_4').click(function(){

    $("#titulo_texto_prev").text("Cuarta imagen de la galeria  ");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img4Galeria.jpg";

  });
$('.btn-vista_imgG_5').click(function(){

    $("#titulo_texto_prev").text("Quinta imagen de la galeria");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img5Galeria.jpg";

  });
$('.btn-vista_imgG_6').click(function(){

    $("#titulo_texto_prev").text("Sexta imagen de la galeria ");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img6Galeria.jpg";

  });
$('.btn-vista_imgG_7').click(function(){

    $("#titulo_texto_prev").text("Septima imagen de la galeria");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img7Galeria.jpg";

  });
$('.btn-vista_imgG_8').click(function(){

    $("#titulo_texto_prev").text("Octava imagen de la galeria");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img8Galeria.jpg";

  });
$('.btn-vista_imgG_9').click(function(){

    $("#titulo_texto_prev").text("Novena imagen de la galeria");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img9Galeria.jpg";

  });
$('.btn-vista_imgG_10').click(function(){

    $("#titulo_texto_prev").text("Decima imagen de la galeria");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img10Galeria.jpg";

  });
$('.btn-vista_imgG_11').click(function(){

    $("#titulo_texto_prev").text("Onceava imagen de la galeria");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img11Galeria.jpg";

  });
$('.btn-vista_imgG_12').click(function(){

    $("#titulo_texto_prev").text("Doceava imagen de la galeria");
    
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "img12Galeria.jpg";

  });







$(function(){
    //Logo 1 
    $("input[name='logo1File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_logo")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_logo1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_logo1.style.width = decimal_percentLoad+"%";
                        img_uploadbar_logo1.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_logo").html(datos);

            }

        });
    });
    //Logo 2 
    $("input[name='logo2File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_logo")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_logo2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_logo2.style.width = decimal_percentLoad+"%";
                        img_uploadbar_logo2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_logo").html(datos);

            }

        });
    });


    //logo 3
    $("input[name='logo3File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_logo")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_logo3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_logo3.style.width = decimal_percentLoad+"%";
                        img_uploadbar_logo3.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_logo").html(datos);

            }

        });
    });
    //logo 4
    $("input[name='logo4File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_logo")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_logo4.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_logo4.style.width = decimal_percentLoad+"%";
                        img_uploadbar_logo4.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_logo").html(datos);

            }

        });
    });

    // banner 1 unid 1   

    $("input[name='banner1Unid1File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_banner1")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner1.style.width = decimal_percentLoad+"%";
                        img_uploadbar_banner1.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_banner1").html(datos);

            }

        });
    });
    //banner 1 unidad 2
    $("input[name='banner1Unid2File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_banner1")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner1_unid2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner1_unid2.style.width = decimal_percentLoad+"%";
                        img_uploadbar_banner1_unid2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_banner1").html(datos);

            }

        });
    });

    //banner 2 unid 1
    $("input[name='banner2Unid1File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_banner2")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner2.style.width = decimal_percentLoad+"%";
                        img_uploadbar_banner2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_banner2").html(datos);

            }

        });
    });
    // banner 2 unid 2
    $("input[name='banner2Unid2File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_banner2")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_banner2_unid2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_banner2_unid2.style.width = decimal_percentLoad+"%";
                        img_uploadbar_banner2_unid2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_banner2").html(datos);

            }

        });
    });
    //Portada cara 1
    $("input[name='portadaCara1File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_portada")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_portada1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_portada1.style.width = decimal_percentLoad+"%";
                        img_uploadbar_portada1.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_portada").html(datos);

            }

        });
    });
    //Portada cara 2
    $("input[name='portadaCara2File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_portada")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_portada2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_portada2.style.width = decimal_percentLoad+"%";
                        img_uploadbar_portada2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_portada").html(datos);

            }

        });
    });



    //video pantalla
    $("input[name='videoPantallaFile1']").on("change", function(){
        var formData = new FormData($("#formulario_envio_video")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_videoP1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_videoP1.style.width = decimal_percentLoad+"%";
                        img_uploadbar_videoP1.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_video_pantalla").html(datos);

            }

        });
    });

    $("input[name='videoPantallaFile2']").on("change", function(){
        var formData = new FormData($("#formulario_envio_video")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_videoP2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_videoP2.style.width = decimal_percentLoad+"%";
                        img_uploadbar_videoP2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_video_pantalla").html(datos);

            }

        });
    });

    //ipad


    $("input[name='imgIpadFile']").on("change", function(){
        var formData = new FormData($("#formulario_envio_Ipad")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_ipad.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_ipad.style.width = decimal_percentLoad+"%";
                        img_uploadbar_ipad.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_Ipad").html(datos);

            }

        });
    });

//folleto


    $("input[name='folleto_visual_1']").on("change", function(){
        var formData = new FormData($("#formulario_envio_folleto")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_visual_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_visual_1.style.width = decimal_percentLoad+"%";
                        img_uploadbar_visual_1.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_folleto").html(datos);

            }

        });
    });
    $("input[name='folleto_visual_2']").on("change", function(){
        var formData = new FormData($("#formulario_envio_folleto")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_visual_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_visual_2.style.width = decimal_percentLoad+"%";
                        img_uploadbar_visual_2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_folleto").html(datos);

            }

        });
    });
    $("input[name='folleto_visual_3']").on("change", function(){
        var formData = new FormData($("#formulario_envio_folleto")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_visual_3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_visual_3.style.width = decimal_percentLoad+"%";
                        img_uploadbar_visual_3.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_folleto").html(datos);

            }

        });
    });    
    //Documentos visuales

    $("input[name='pdf_1']").on("change", function(){
        var formData = new FormData($("#formulario_envio_pdf")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        pdf_uploadbar_visual_1.setAttribute('aria-valuenow', decimal_percentLoad);
                        pdf_uploadbar_visual_1.style.width = decimal_percentLoad+"%";
                        pdf_uploadbar_visual_1.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_pdf").html(datos);

            }

        });
    });
    $("input[name='pdf_2']").on("change", function(){
        var formData = new FormData($("#formulario_envio_pdf")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        pdf_uploadbar_visual_2.setAttribute('aria-valuenow', decimal_percentLoad);
                        pdf_uploadbar_visual_2.style.width = decimal_percentLoad+"%";
                        pdf_uploadbar_visual_2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_pdf").html(datos);

            }

        });
    });
    $("input[name='pdf_3']").on("change", function(){
        var formData = new FormData($("#formulario_envio_pdf")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        pdf_uploadbar_visual_3.setAttribute('aria-valuenow', decimal_percentLoad);
                        pdf_uploadbar_visual_3.style.width = decimal_percentLoad+"%";
                        pdf_uploadbar_visual_3.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_pdf").html(datos);

            }

        });
    });    
//12 IMAGENES





    $("input[name='nombre_archivoimg1File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img1.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img1.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img1.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });

    $("input[name='nombre_archivoimg2File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img2.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img2.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img2.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg3File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img3.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img3.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img3.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg4File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img4.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img4.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img4.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg5File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img5.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img5.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img5.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg6File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img6.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img6.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img6.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg7File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img7.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img7.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img7.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg8File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img8.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img8.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img8.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg9File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img9.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img9.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img9.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg10File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img10.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img10.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img10.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg11File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img11.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img11.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img11.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });
    $("input[name='nombre_archivoimg12File']").on("change", function(){
        var formData = new FormData($("#formulario_envio_12_galeria")[0]);
        var ruta = "../php/subida_imagenes.php";
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                        const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                        
                        //console.log(decimal_percentLoad);
                        img_uploadbar_img12.setAttribute('aria-valuenow', decimal_percentLoad);
                        img_uploadbar_img12.style.width = decimal_percentLoad+"%";
                        img_uploadbar_img12.textContent = decimal_percentLoad+"%";
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
                $("#respuesta_img_12_galeria").html(datos);

            }

        });
    });


});

//BOTONES DE VISTA PREVIA



// BOTONES DE SUBIR








  $('.btn_subir_logo').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    $('#dimensiones_max_banner1_logo').val('1980x900');//SE ENVÍA AL FORMULARIO
    $('#formato_banner1_logo').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
    $('#ubicacion_archivo_banner1_logo').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
    $('#logo1').val('logo_unid1');//SE ENVÍA AL FORMULARIO
    $('#logo2').val('logo_unid2');//SE ENVÍA AL FORMULARIO
    $('#logo3').val('logo_unid3');//SE ENVÍA AL FORMULARIO
    $('#logo4').val('logo_unid4');//SE ENVÍA AL FORMULARIO

  });

  $('.btn_subir_banner1').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


    $('#dimensiones_max_banner1').val('1700x2000');//SE ENVÍA AL FORMULARIO
    $('#formato_banner1').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
    $('#ubicacion_archivo_banner1').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
    $('#banner1Unid1').val('banner1_unid1');//SE ENVÍA AL FORMULARIO
    $('#banner1Unid2').val('banner1_unid2');//SE ENVÍA AL FORMULARIO

  });

  $('.btn_subir_banner2').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    $('#dimensiones_max_banner1_banner2').val('1700x2000');//SE ENVÍA AL FORMULARIO
    $('#formato_banner1_banner2').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
    $('#ubicacion_archivo_banner1_banner2').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
    $('#banner2Unid1').val('banner2_unid1');//SE ENVÍA AL FORMULARIO
    $('#banner2Unid2').val('banner2_unid2');//SE ENVÍA AL FORMULARIO

  });

  $('.btn_subir_portg').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

    var texto_abajo = "La imagen debe tener un tamaño menor o igual 1700x1800 pixeles y debe ser del tipo .jpg, .jpeg o .png";
    $("#texto_abajo").text(texto_abajo);

    $('#dimensiones_max_portada').val('1500x1800');//SE ENVÍA AL FORMULARIO
    $('#formato_portada').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
    $('#ubicacion_archivo_portada').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
    $('#portadaCara1').val('portadaGaleria_cara1');//SE ENVÍA AL FORMULARIO
    $('#portadaCara2').val('portadaGaleria_cara2');//SE ENVÍA AL FORMULARIO

  });

  $('.btn_subir_imgG').click(function(){

    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen



    $('#dimensiones_max_imgs_g').val('1920x1080');//SE ENVÍA AL FORMULARIO
    $('#formato_imgs_g').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
    $('#ubicacion_archivo_imgs_g').val(direccion_archivo);//SE ENVÍA AL FORMULARIO

    $('#nombre_archivoimg1').val('imgGaleria1');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg2').val('imgGaleria2');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg3').val('imgGaleria3');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg4').val('imgGaleria4');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg5').val('imgGaleria5');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg6').val('imgGaleria6');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg7').val('imgGaleria7');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg8').val('imgGaleria8');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg9').val('imgGaleria9');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg10').val('imgGaleria10');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg11').val('imgGaleria11');//SE ENVÍA AL FORMULARIO
    $('#nombre_archivoimg12').val('imgGaleria12');//SE ENVÍA AL FORMULARIO

  }); 

    


})