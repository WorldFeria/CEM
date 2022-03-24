$(document).ready(function () {

  $("#formNewConferencista").on("submit", function (event) {

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/horarios_auditorio.php",
      data: $(this).serialize() + ("&param=crearConferencista"),


      success: function (data) {
        let ejemplo = data.substring(1, data.length-1).split(',');

        let id = ejemplo[0];
        id = id.substring(1, id.length-1);

        let nombreTexto = ejemplo[1];
        nombreTexto = nombreTexto.substring(1, nombreTexto.length-1);

        document.getElementById("optNewConfer").value = id;
        $("#optNewConfer").text(nombreTexto);
        $("#optNewConfer").attr("id",id);

        //aqui enviamos el correo




        var emailExp = document.getElementById("emailConferencista").value;
        $.ajax({
          type: 'POST',
          url: "../email/confirmationEmail.php",
          data: `email=${emailExp}` + "&param=create_exh",


          success: function (data) {

            Swal.fire({
              title: 'Misión Cumplida!',
              text: 'Se le envió un correo al nuevo conferencista!',
              icon: 'success',
              confirmButtonText: 'Ok'
            })
            $('#new_adv_modal').modal('hide'); // cerrar

          },
          error: function () {

            Swal.fire({
              title: 'Error!',
              text: 'Ocurrio un error al momento de enviar el correo',
              icon: 'error',
              confirmButtonText: 'Entendido'
            })

          }
        })

      },
      error: function () {

        Swal.fire({
          title: 'Error!',
          text: data,
          icon: 'error',
          confirmButtonText: 'Entendido'
        })

      }
    })

  });







  $("input[name='videoConfe']").on("change", function(){

      //aquí revisamos que ya todos los demás campos estén llenos
    var formData = new FormData($("#crear_conferencia")[0]);
    var ruta = "../php/subidaVideoAuditorio.php";
    $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();

            // Upload progress
            xhr.upload.addEventListener("progress", function(evt){
                if (evt.lengthComputable) {
                    var percentLoad = Math.round((evt.loaded*100) / evt.total);//Calculate in percent
                    const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal
                    
                    //console.losg(decimal_percentLoad);
                    uploadbar.setAttribute('aria-valuenow', decimal_percentLoad);
                    uploadbar.style.width = decimal_percentLoad+"%";
                    uploadbar.textContent = decimal_percentLoad+"%";
                }
                empezandoASubir();
                archivoSubido();
            }, false);
            return xhr;
        },

        url: ruta,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
          mostrarSubida();

        }

    });
});










  $("#crear_conferencia").on("submit", function (event) {


    event.preventDefault();

      var hora_inicio = document.getElementById("hora_inicio").value;
      var hora_cierre = document.getElementById("hora_cierre").value;

      if (hora_inicio < hora_cierre) {
          $.ajax({
            type: 'POST',
            url: "../php/horarios_auditorio.php",
            data: $(this).serialize() + ("&param=subir_horario"),


            success: function (data) {


              if (data == "HORARIO_REPETIDO") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Al parecer ya existe una conferencia en ese horario',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                  })


              }if(data == 777){
                
                Swal.fire({
                  title: 'Error!',
                  text: 'Al parecer ya existe una conferencia en ese nombre',
                  icon: 'error',
                  confirmButtonText: 'Ok'
                })


              }if (data == 999) {
                Swal.fire({
                  title: 'Misión Cumplida!',
                  text: 'La conferencia  se ha guardado con éxito!',
                  icon: 'success',
                  confirmButtonText: 'Ok'
                })
              $(".modal_agregar_horario").modal("hide");
              $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipoAudiorio}&n_refresh=${1}`);
              }
              

            },
            error: function () {
              Swal.fire({
                title: 'Error!',
                text: 'Ocurrio un error al momento de guardar la conferencia',
                icon: 'error',
                confirmButtonText: 'Ok'
              })
              $(".modal_agregar_horario").modal("hide");
              $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipoAudiorio}&n_refresh=${1}`);
            }
          })
      }else{

              Swal.fire({
                title: 'Error!',
                text: 'La hora de la conferencia es erronea',
                icon: 'error',
                confirmButtonText: 'Ok'
              })
      }

  });

  $("#editar_conferencia").on("submit", function (event) {

    event.preventDefault();

      var hora_inicio = document.getElementById("hora_inicio_edit").value;
      var hora_cierre = document.getElementById("hora_cierre_edit").value;


    if (hora_inicio < hora_cierre) {
        $.ajax({
          type: 'POST',
          url: "../php/horarios_auditorio.php",
          data: $(this).serialize() + ("&param=editar_conferencia"),


          success: function (data) {
            if (data == 666 ) {
              Swal.fire({
                  title: 'Error!',
                  text: 'La hora de la conferencia ya está ocupada',
                  icon: 'error',
                  confirmButtonText: 'Ok'
                })


            }if(data == 777){

                Swal.fire({
                  title: 'Error!',
                  text: 'Ya existe una conferencia con ese nombre!',
                  icon: 'error',
                  confirmButtonText: 'Ok'
                })

            }if (data == 999){
              Swal.fire({
                title: 'Misión Cumplida!',
                text: 'La conferencia se ha editado con éxito!',
                icon: 'success',
                confirmButtonText: 'Ok'
              })
            $("#modal_editar_horario").modal("hide");
            $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipoAudiorio}&n_refresh=${2}`);
            }

          },
          error: function () {
            Swal.fire({
              title: 'Error!',
              text: 'Ocurrio un error al momento de guardar la conferencia',
              icon: 'error',
              confirmButtonText: 'Ok'
            })
            $("#modal_editar_horario").modal("hide");
            $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipoAudiorio}&n_refresh=${1}`);
          }
        })
    }else{

            Swal.fire({
              title: 'Error!',
              text: 'La hora de la conferencia es erronea',
              icon: 'error',
              confirmButtonText: 'Ok'
            })
    }

  });

    function funcionCalendario(){
      var localeSelectorEl = document.getElementById('locale-selector');
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
     
          locale: 'en',
          buttonIcons: false, // show the prev/next text
          weekNumbers: false,
          navLinks: true, // puede hacer clic en los nombres de los días / semanas para navegar por las vistas
          editable: false, //para que no se puedan editar 
          dayMaxEvents: true, // permitir el enlace "más" cuando hay demasiados eventos
          selectable: true,
          events: datos,
            eventClick:  function(event, jsEvent, view) {  // when some one click on any event

              value = event['el']['fcSeg']['eventRange']['def']['extendedProps']['description'];
              nombre_conferencia = event['el']['fcSeg']['eventRange']['def']['title'];
              id_conferencia = event['el']['fcSeg']['eventRange']['def']['groupId'];

              fecha_hora_inicio = JSON.stringify(event['el']['fcSeg']['eventRange']['instance']['range']['start']);
              fecha_hora_final = JSON.stringify(event['el']['fcSeg']['eventRange']['instance']['range']['end']);

              fecha_conferencia = fecha_hora_inicio.substring(1, 11);
              hora_inicio = fecha_hora_inicio.substring(12,17);
              hora_cierre = fecha_hora_final.substring(12,17);


              $('#modal_editar_horario').modal('show');
              /*
              
              
              
              
              */
              $("#nombre_conf_edit").attr("value",nombre_conferencia);
              $("#nombre_confAntigua").attr("value",nombre_conferencia);
              $("#dia_inicio_edit").attr("value",fecha_conferencia);

              document.getElementById('expositor_edit').value = value;

              $("#hora_inicio_edit").attr("value",hora_inicio);
              $("#hora_cierre_edit").attr("value",hora_cierre);



              $("#id_horario").attr("value",id_conferencia);

            },         
          
      });

      calendar.render();

      // build the locale selector's options
      calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
          var optionEl = document.createElement('option');
          optionEl.value = localeCode;
          optionEl.selected = localeCode == 'en';
          optionEl.innerText = localeCode;
          localeSelectorEl.appendChild(optionEl);
      });

      // when the selected option changes, dynamically change the calendar option
      localeSelectorEl.addEventListener('change', function() {
          if (this.value) {
              calendar.setOption('locale', this.value);
          }
      });


  }

funcionCalendario();

});

var datos;

  obtener_horarios = (async() => {

    await $.ajax({    //create an ajax request to ../php/charts.php
              type: "POST",
              url: "../php/horarios_auditorio.php",
              data: {
                  "param": "obtener_horarios",
                  "auditorio_id": id_auditorio

              },
              dataType: "json",   //expect html to be returned

              success: function (response) {

                  datos = response.data;

         

            
              }

          });
  });



obtener_horarios();
funcionCalendario();