$(document).ready(function () {

  /* var current_fs, next_fs, previous_fs; //fieldsets
   var opacity;
   var current = 1;
   var steps = $("fieldset").length;*/




  
  $("#btn_reload_advisers").click(function(){
    listar();
  });
  

  var listar = function () {
    var param;
 
    param =  "asesores";


    var table = $('#advisers_table').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/confeExp_c.php",
        "data": {
          "param": param,
          "idUser": `${uid}`
        }
      },
      "columns": [

        { "data": "nombre_conf" },
        { "data": "hora_inicio" },
        { "data": "hora_cierre" },
        { "data": "fecha_inicio" },
        {
          "data": "tipoConferencia",
          render: function (data, type, row) {
            var content;

            if (data == "enVivo") {
              content = "En vivo";

            } else if (data == "preGrabada") {

              content = "Video";

            }
            return content;
          }

        },
        {"data":"controlador",
        render: function (data, type, row) {
          var content;

          if (true) {
            content =  data.substring(0,  data.length -1);

          }
          return content;
        }      
        },
        {
          "data": "ubicacionArchivo",
          render: function (data, type, row) {
            var content;

            if (data == null) {
              content = "Sin vista previa";

            } else{

              content = "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary ponerVideoBtn' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalVistaPrevia '><i class='fa fa-eye' aria-hidden='true'></i></button> </div>";

            }
            return content;
          }

        },



      ]

    });

    ponerVideo("#advisers_table tbody", table);

  }






  var ponerVideo = function(tbody, table){
    $(tbody).on("click", "button.ponerVideoBtn",function(){
      var data = table.row( $(this).parents("tr") ).data();
      var archivo = data["ubicacionArchivo"];
      var controlador = data["controlador"];
      var nombre_conf = data["nombre_conf"];
        
        if(controlador.substr(-1) == '1'){
          document.getElementById("iframeIdVideo").src = archivo;
          $("#subirArchivo").attr("hidden","");
          $("#borrarArchivo").removeAttr("hidden");
        }else{
          document.getElementById("iframeIdVideo").src = "../imagenes_diseño/no_image3.png";
          $("#borrarArchivo").attr("hidden","");
          $("#subirArchivo").removeAttr("hidden");
        }

        document.getElementById("ubicacion_archivo").value = archivo;
        document.getElementById("nombre_conf").value = nombre_conf;


    })
  };




  $("input[name='videoConfe2']").on("change", function () {
    var formData = new FormData($("#formularioVideo")[0]);
    var ruta = "../php/subidaVideoAuditorio.php";
    $.ajax({
      xhr: function () {
        var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
            const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

            //console.log(decimal_percentLoad);
            uploadbar.setAttribute('aria-valuenow', decimal_percentLoad);
            uploadbar.style.width = decimal_percentLoad + "%";
            uploadbar.textContent = decimal_percentLoad + "%";
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
        $("#respuesta_video").html(datos);

      }

    });
  });




  listar();




})

