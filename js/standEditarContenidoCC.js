$(document).ready(function () {

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


  $('#reload').click(function(){
    var codigo_stand = $('.obtener_id_stand').attr('id');//obtenemos la dirección de la imagen
    
    $('#page_content').load(`tabla_stand_pub_CC.php?cod_stand=${codigo_stand}`);

  });

$('.btn-vista_videoP').click(function () {
  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("video_mostrada_real_vista").src = direccion_archivo + "videoPantalla.mp4";

});



$('.btn-vista_logo').click(function () {


  $("#titulo_texto_prev").text("Vista del Logo");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "logo.jpg";

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
  $('.btn_borrar_pdf_1').click(function(){
    $('#nombre_archivo_pdf').val('pdf_1.pdf');//SE ENVÍA AL FORMULARIO
  });
  $('.btn_borrar_pdf_2').click(function(){
    $('#nombre_archivo_pdf').val('pdf_2.pdf');//SE ENVÍA AL FORMULARIO
  });
  $('.btn_borrar_pdf_3').click(function(){
    $('#nombre_archivo_pdf').val('pdf_3.pdf');//SE ENVÍA AL FORMULARIO
  });


$('.btn_vista_folleto_1').click(function(){
    $("#titulo_texto_prev").text("Vista del folleto 1");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "folleto1.jpg";
  });


  $('.btn_borrar_folleto_1').click(function(){
    $("titulo_texto_eli").text(" Eliminar folleto n. 1");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "folleto1.jpg";
    $('#nombre_archivo_borrar').val('folleto1.jpg');//SE ENVÍA AL FORMULARIO
  });

$('.btn_vista_folleto_2').click(function(){
    $("#titulo_texto_prev").text("Vista del folleto 2");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "folleto2.jpg";
  });


  $('.btn_borrar_folleto_2').click(function(){
    $("titulo_texto_eli").text(" Eliminar folleto n. 2");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "folleto2.jpg";
    $('#nombre_archivo_borrar').val('folleto2.jpg');//SE ENVÍA AL FORMULARIO
  });


$('.btn_vista_folleto_3').click(function(){
    $("#titulo_texto_prev").text("Vista del folleto 3");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_vista").src= direccion_archivo + "folleto3.jpg";
  });


  $('.btn_borrar_folleto_3').click(function(){
    $("titulo_texto_eli").text(" Eliminar folleto n. 3");
    var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen
    document.getElementById("imagen_mostrada_real_eli").src= direccion_archivo + "folleto3.jpg";
    $('#nombre_archivo_borrar').val('folleto3.jpg');//SE ENVÍA AL FORMULARIO
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













$('.btn-borrar_gimg_1').click(function () {
  $("titulo_texto_eli").text(" Eliminar imagen n. 1 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria1.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria1.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_gimg_2').click(function () {
  $("titulo_texto_eli").text(" Eliminar imagen n. 2 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria2.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria2.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_gimg_3').click(function () {

  $("titulo_texto_eli").text(" Eliminar imagen n. 3 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria3.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria3.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_gimg_4').click(function () {

  $("titulo_texto_eli").text(" Eliminar imagen n. 4 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria4.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria4.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_gimg_5').click(function () {

  $("titulo_texto_eli").text(" Eliminar imagen n. 5 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria5.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria5.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_gimg_6').click(function () {
  $("titulo_texto_eli").text(" Eliminar imagen n. 6 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria6.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria6.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_gimg_7').click(function () {

  $("titulo_texto_eli").text(" Eliminar imagen n. 7 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria7.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria7.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_gimg_8').click(function () {

  $("titulo_texto_eli").text(" Eliminar imagen n. 8 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria8.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria8.jpg');//SE ENVÍA AL FORMULARIO

});
$('.btn-borrar_gimg_9').click(function () {
  $("titulo_texto_eli").text(" Eliminar imagen n.9 de la galería");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgGaleria9.jpg";
  $('#nombre_archivo_borrar').val('imgGaleria9.jpg');//SE ENVÍA AL FORMULARIO

});

















$('.btn-gimg_1').click(function () {

  $("#titulo_texto_prev").text("Primera imagen de la galería ");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria1.jpg";

});
$('.btn-gimg_2').click(function () {

  $("#titulo_texto_prev").text("Segunda imagen de la galería ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria2.jpg";

});
$('.btn-gimg_3').click(function () {

  $("#titulo_texto_prev").text("Tercera imagen de la galeria");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria3.jpg";

});
$('.btn-gimg_4').click(function () {

  $("#titulo_texto_prev").text("Cuarta imagen de la galeria ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria4.jpg";

});
$('.btn-gimg_5').click(function () {

  $("#titulo_texto_prev").text("Quinta imagen de la galeria ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria5.jpg";

});
$('.btn-gimg_6').click(function () {

  $("#titulo_texto_prev").text("Sexta imagen de la galeria ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria6.jpg";

});
$('.btn-gimg_7').click(function () {

  $("#titulo_texto_prev").text("Septima imagen de la galeria ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria7.jpg";

});
$('.btn-gimg_8').click(function () {

  $("#titulo_texto_prev").text("Octava imagen de la galeria");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria8.jpg";

});
$('.btn-gimg_9').click(function () {

  $("#titulo_texto_prev").text("Novena imagen de la galeria");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen


  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgGaleria9.jpg";

});











//folleto

    $("input[name='folleto_visual_1']").on("change", function(){
        var formData = new FormData($("#formulario_envio_folleto")[0]);
        var ruta = "../php/subida_imagenes_CC.php";
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
        var ruta = "../php/subida_imagenes_CC.php";
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
        var ruta = "../php/subida_imagenes_CC.php";
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
    //pdf1

    $("input[name='pdf_1']").on("change", function(){
        var formData = new FormData($("#formulario_envio_pdf")[0]);
        var ruta = "../php/subida_imagenes_CC.php";
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
    //pdf1

    $("input[name='pdf_2']").on("change", function(){
        var formData = new FormData($("#formulario_envio_pdf")[0]);
        var ruta = "../php/subida_imagenes_CC.php";
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
    //pdf1

    $("input[name='pdf_3']").on("change", function(){
        var formData = new FormData($("#formulario_envio_pdf")[0]);
        var ruta = "../php/subida_imagenes_CC.php";
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




  //img 11
  $("input[name='videoPantallaFile']").on("change", function () {
    var formData = new FormData($("#formulario_envio_video")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbar_videoP.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbar_videoP.style.width = decimal_percentLoad + "%";
            img_uploadbar_videoP.textContent = decimal_percentLoad + "%";
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

  //Logo general 
  $("input[name='fileimg_general']").on("change", function () {
    var formData = new FormData($("#formulario_general")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

            //console.log(decimal_percentLoad);
            img_uploadbar_general.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbar_general.style.width = decimal_percentLoad + "%";
            img_uploadbar_general.textContent = decimal_percentLoad + "%";
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
        $("#respuesta_img_general").html(datos);

      }

    });
  });
  //img 1
  $("input[name='imgGaleria1']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria1.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria1.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria1.textContent = decimal_percentLoad + "%";
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
  //img 2
  $("input[name='imgGaleria2']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria2.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria2.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria2.textContent = decimal_percentLoad + "%";
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
  //img 3
  $("input[name='imgGaleria3']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria3.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria3.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria3.textContent = decimal_percentLoad + "%";
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
  //img 4
  $("input[name='imgGaleria4']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria4.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria4.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria4.textContent = decimal_percentLoad + "%";
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
  //img 5
  $("input[name='imgGaleria5']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria5.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria5.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria5.textContent = decimal_percentLoad + "%";
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
  //img 6
  $("input[name='imgGaleria6']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria6.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria6.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria6.textContent = decimal_percentLoad + "%";
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
  //img 7
  $("input[name='imgGaleria7']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria7.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria7.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria7.textContent = decimal_percentLoad + "%";
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
  //img 8
  $("input[name='imgGaleria8']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria8.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria8.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria8.textContent = decimal_percentLoad + "%";
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
  //img 9
  $("input[name='imgGaleria9']").on("change", function () {
    var formData = new FormData($("#formulario_12_galeria")[0]);
    var ruta = "../php/subida_imagenes_CC.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal


            //console.log(decimal_percentLoad);
            img_uploadbarimgGaleria9.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbarimgGaleria9.style.width = decimal_percentLoad + "%";
            img_uploadbarimgGaleria9.textContent = decimal_percentLoad + "%";
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








$('.btn-vista_banner1').click(function () {

  $("#titulo_texto_prev").text("Vista del Banner ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "banner1.jpg";

});



$('.btn-vista_banner2').click(function () {

  $("#titulo_texto_eli").text("Vista del segundo Banner ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "banner2.jpg";

});


$('.btn-vista_videoP').click(function () {

  $("#titulo_texto_prev").text("Vista del video para la pantalla ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "videoPantalla.mp4";

});


$('.btn-vista_imgIp').click(function () {


  $("#titulo_texto_prev").text("Vista de la imagen para el Ipad ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "imgIpad.jpg";

});




$('.btn-vista_portg').click(function () {

  $("#titulo_texto_prev").text("Vista de la portada de la galería ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_vista").src = direccion_archivo + "portadaGaleria.jpg";

});

//--------------------------------------------BORRAR IMAGEN

$('.btn-borrar_logo').click(function () {

  $("titulo_texto_eli").text(" Eliminar imagen del Logo");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "logo.jpg";
  $('#nombre_archivo_borrar').val('logo.jpg');//SE ENVÍA AL FORMULARIO

});



$('.btn-borrar_banner1').click(function () {

  $("titulo_texto_eli").text("Eliminar imagen del Banner");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "banner1.jpg";
  $('#nombre_archivo_borrar').val('banner1.jpg');//SE ENVÍA AL FORMULARIO

});



$('.btn-borrar_banner2').click(function () {

  $("#titulo_texto_eli").text("Eliminar imagen del segundo Banner");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "banner2.jpg";
  $('#nombre_archivo_borrar').val('banner2.jpg');//SE ENVÍA AL FORMULARIO

});


$('.btn-borrar_videoP').click(function () {

  $("#titulo_texto_eli").text("Eliminar video de la pantalla");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("video_mostrada_eli").src = direccion_archivo + "videoPantalla.mp4";
  $('#nombre_archivo_borrar').val('videoPantalla.mp4');//SE ENVÍA AL FORMULARIO

});


$('.btn-borrar_imgIp').click(function () {


  $("#titulo_texto_eli").text("Eliminar imagen del Ipad");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "imgIpad.jpg";
  $('#nombre_archivo_borrar').val('imgIpad.jpg');//SE ENVÍA AL FORMULARIO

});




$('.btn-borrar_portg').click(function () {

  $("#titulo_texto_eli").text("Eliminar portada de la galería");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  document.getElementById("imagen_mostrada_real_eli").src = direccion_archivo + "portadaGaleria.jpg";
  $('#nombre_archivo_borrar').val('portadaGaleria.jpg');//SE ENVÍA AL FORMULARIO

});


//-------------------------------------------------

$('.btn_subir_logo').click(function () {

  $("#titulo_texto").text("Subir imagen para el logo ");


  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  $("#cambiar_subir").text("Cambiar Archivo");

  //$("#cambiar_subir").text("Subir Archivo");


  $("#tipo_archivo_aceptado").attr("accept", "image/png, .jpeg, .jpg");

  var texto_abajo = "La imagen debe tener un tamaño menor o igual 1980x900 pixeles y debe ser del tipo .jpg, .jpeg o .png";
  $("#texto_abajo").text(texto_abajo);

  $('#dimensiones_max').val('1980x900');//SE ENVÍA AL FORMULARIO
  $('#formato').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO



  $('#ubicacion_archivo').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
  $('#nombre_archivo').val('logo');//SE ENVÍA AL FORMULARIO

});



$('.btn_subir_banner1').click(function () {
  $("#titulo_texto").text("Subir imagen para el primer Banner ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  $("#cambiar_subir").text("Cambiar Archivo");

  //$("#cambiar_subir").text("Subir Archivo");


  $("#tipo_archivo_aceptado").attr("accept", "image/png, .jpeg, .jpg");

  var texto_abajo = "La imagen debe tener un tamaño menor o igual 1900x2000 pixeles y debe ser del tipo .jpg, .jpeg o .png";
  $("#texto_abajo").text(texto_abajo);

  $('#dimensiones_max').val('1900x2000');//SE ENVÍA AL FORMULARIO
  $('#formato').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
  $('#ubicacion_archivo').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
  $('#nombre_archivo').val('banner1');//SE ENVÍA AL FORMULARIO

});



$('.btn_subir_banner2').click(function () {
  $("#titulo_texto").text("Subir imagen para el segundo Banner ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  $("#cambiar_subir").text("Cambiar Archivo");

  //$("#cambiar_subir").text("Subir Archivo");


  $("#tipo_archivo_aceptado").attr("accept", "image/png, .jpeg, .jpg");

  var texto_abajo = "La imagen debe tener un tamaño menor o igual 950x2000 pixeles y debe ser del tipo .jpg, .jpeg o .png";
  $("#texto_abajo").text(texto_abajo);

  $('#dimensiones_max').val('950x2000');//SE ENVÍA AL FORMULARIO
  $('#formato').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
  $('#ubicacion_archivo').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
  $('#nombre_archivo').val('banner2');//SE ENVÍA AL FORMULARIO

});


$('.btn_subir_videoP').click(function () {
  $("#titulo_texto").text("Subir video para la pantalla ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  $("#cambiar_subir").text("Cambiar Archivo");

  //$("#cambiar_subir").text("Subir Archivo");


  $("#tipo_archivo_aceptado").attr("accept", "video/mp4");

  var texto_abajo = "La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .mp4";
  $("#texto_abajo").text(texto_abajo);

  $('#dimensiones_max').val('1920x1080');//SE ENVÍA AL FORMULARIO
  $('#formato').val('video/mp4');//SE ENVÍA AL FORMULARIO
  $('#ubicacion_archivo').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
  $('#nombre_archivo').val('videoPantalla');//SE ENVÍA AL FORMULARIO

});


$('.btn_subir_imgIp').click(function () {
  $("#titulo_texto").text("Subir imagen para el Ipad ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  $("#cambiar_subir").text("Cambiar Archivo");

  //$("#cambiar_subir").text("Subir Archivo");


  $("#tipo_archivo_aceptado").attr("accept", "image/png, .jpeg, .jpg");

  var texto_abajo = "La imagen debe tener un tamaño menor o igual 1390x1854 pixeles y debe ser del tipo .jpg, .jpeg o .png";
  $("#texto_abajo").text(texto_abajo);

  $('#dimensiones_max').val('1390x1854');//SE ENVÍA AL FORMULARIO
  $('#formato').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
  $('#ubicacion_archivo').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
  $('#nombre_archivo').val('imgIpad');//SE ENVÍA AL FORMULARIO

});




$('.btn_subir_portg').click(function () {
  $("#titulo_texto").text("Subir imagen para la portada de la galería ");

  var direccion_archivo = $('.obtener_url').attr('id');//obtenemos la dirección de la imagen

  $("#cambiar_subir").text("Cambiar Archivo");

  //$("#cambiar_subir").text("Subir Archivo");


  $("#tipo_archivo_aceptado").attr("accept", "image/png, .jpeg, .jpg");

  var texto_abajo = "La imagen debe tener un tamaño menor o igual 1700x1800 pixeles y debe ser del tipo .jpg, .jpeg o .png";
  $("#texto_abajo").text(texto_abajo);

  $('#dimensiones_max').val('1700x1800');//SE ENVÍA AL FORMULARIO
  $('#formato').val('image/jpg.image/png.image/jpeg');//SE ENVÍA AL FORMULARIO
  $('#ubicacion_archivo').val(direccion_archivo);//SE ENVÍA AL FORMULARIO
  $('#nombre_archivo').val('portadaGaleria');//SE ENVÍA AL FORMULARIO

});

$('.btn_subir_imgG').click(function () {

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
});