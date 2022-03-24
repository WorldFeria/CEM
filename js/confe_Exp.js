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
        {"data":"controlador"},
        {
          "data": "ubicacionArchivo",
          render: function (data, type, row) {
            var content;

            if (data == null) {
              content = "Sin vista previa";

            } else{

              content = "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar_pabellon' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalVistaPrevia '><i class='fa fa-eye' aria-hidden='true'></i></button> </div>";

            }
            return content;
          }

        },


      ]

    });


  }

  listar();


})