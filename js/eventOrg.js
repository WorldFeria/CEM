
$(document).ready(function () {

  function cards() {
    $.ajax({
      url: '../php/ajax/eventOrg.php',
      success: function (data) {
        $(".outer_div").html(data);
      }
    })
  }

  $("input[name='imagen_logo']").on("change", function () {
    var formData = new FormData($("#form_cambiar_logo_id")[0]);
    var ruta = "../php/cambiar_logo.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

            //console.log(decimal_percentLoad);
            img_uploadbar.setAttribute('aria-valuenow', decimal_percentLoad);
            img_uploadbar.style.width = decimal_percentLoad + "%";
            img_uploadbar.textContent = decimal_percentLoad + "%";
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
        $("#respuesta_logo").html(datos);
        $('#page_content').load(`eventOrg.php`);
        $(".modal_cambiar_logo").modal("hide");
      }
    });
  });

  $("#crear_nuevo_evento").on("submit", function (event) {
    event.preventDefault();

    var fechainicial = document.getElementById("fecha_inicio").value;
    var fechafinal = document.getElementById("fecha_cierre").value;

    if (fechainicial <= fechafinal) {
      $.ajax({
        type: 'POST',
        url: "../php/crear_evento.php",
        data: $(this).serialize(),

        success: function (data) {
          Swal.fire({
            title: '¡HECHO!',
            text: 'El evento se ha creado con éxito.',
            icon: 'success',
            confirmButtonText: 'Regresar'
          })
          $(".bd-example-modal-lg").modal("hide");
          $('#page_content').load(`eventAdmin.php`);
        },
        error: function () {
          Swal.fire({
            title: '¡ERROR!',
            text: 'Ocurrio un error al momento de crear el evento',
            icon: 'error',
            confirmButtonText: 'Regresar'
          })
        }
      })
    } else {
      Swal.fire({
        title: '¡ALERTA!',
        text: 'Las fechas del evento no son las adecuadas.',
        icon: 'error',
        confirmButtonText: 'Regresar'
      })
    }

  });

  $("#editar_evento").on("submit", function (event) {
    event.preventDefault();
    
    $.ajax({
      type: 'POST',
      url: "../php/editar_descri.php",
      data: $(this).serialize() + ("&param=editar_event"),

      success: function (data) {
        Swal.fire({
          title: '¡HECHO!',
          text: 'El evento se ha editado con éxito.',
          icon: 'success',
          confirmButtonText: 'Regresar'
        })
        $(".bd-example-modal-lg-edit").modal("hide");
        $('#page_content').load(`eventOrg.php`);
      },
      error: function () {

        Swal.fire({
          title: '¡ERROR!',
          text: 'Ocurrio un error al momento de editar el evento',
          icon: 'error',
          confirmButtonText: 'Regresar'
        })
      }

    })
  });

  cards();
  datos_tabla_evento();
})