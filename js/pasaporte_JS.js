$(document).ready(function () {

    var listar = function () {
      var table = $('#users_table').DataTable({
        language: {
          url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
        },
        "destroy": true,
        "ajax": {
          "method": "POST",
          "url": "../php/pasaporte_c.php",
          "data": {
            "param": "visitors",
          }
        },
        "columns": [
          { "data": "id_user" },
          { "data": "first_name" },
          { "data": "last_name" },
          {
            "data": "name",
            render: function (data, type, row) {
              var content;
              content = data;
              return content;
            }
          },
          { "data": "cellphone" },
          { "data": "email"  ,
          render: function (data, type, row) {
            var content;
            let partesCorreo = data.split('@');
            content = `<div>${partesCorreo[0]}@<br>${partesCorreo[1]}</div>`;
            
            return content;
          }
        
        },
          {
            "data": "id_rol2",
            render: function (data, type, row) {
              var content;
              if (data == "5") {
                content = `<div class="badge_status bg-info d-flex justify-content-center">Estudiante</div>`;
              } else if (data == "6") {
                content = `<div class="badge_status bg-white-50 d-flex justify-content-center">Acudiente</div>`;
              } else if (data == "9") {
                content = `<div class="badge_status bg-blue d-flex justify-content-center">Profesional</div>`;
              }
              return content;
            }
          },

          
          { "data": "escuela" },
          { "data": "total" },
          { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary irPuntaje editar' style='margin:2px'><i class='far fa-edit' aria-='true'></i></button> </div>" }

  
        ]
  
      });
  
      ir_total("#users_table tbody", table);
    }
  
    var ir_total = function(tbody, table){
      $(tbody).on("click", "button.irPuntaje",function(){

        var data = table.row($(this).parents("tr")).data();
        var idUser = data["id_user"];

        $('#page_content').load(`totalPasaporte.php?idUser=${idUser}`); 


      })
    };


    listar();
  
  })