$(document).ready(function () {

  var listar = function () {
    $.fn.dataTable.ext.errMode = 'none'; //Disable Warnings
    $('#visitors_table').on('error.dt', function (e, settings, techNote, message) {
      console.log('An error has been reported by DataTables:\n', message);
    });

    var table = $('#visitors_table').DataTable({
      "pageLength": 50,
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/visitors_c.php",
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
        { "data": "email" },
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
        {
          "data": "specific_kind",
          render: function (data, type, row) {
            var content;
            if (data == "5_student") {
              content = `<div class="badge_status bg-info d-flex justify-content-center">Estudiante</div>`;
            } else if (data == "1_carer") {
              content = `<div class="badge_status bg-white-50 d-flex justify-content-center">Padre</div>`;
            } else if (data == "2_carer") {
              content = `<div class="badge_status bg-white-50 d-flex justify-content-center">Madre</div>`;
            } else if (data == "3_carer") {
              content = `<div class="badge_status bg-white-50 d-flex justify-content-center">Familiar</div>`;
            } else if (data == "4_carer") {
              content = `<div class="badge_status bg-white-50 d-flex justify-content-center">Otro</div>`;
            } else if (data == "1_professional") {
              content = `<div class="badge_status bg-blue d-flex justify-content-center">Rector</div>`;
            } else if (data == "2_professional") {
              content = `<div class="badge_status bg-blue d-flex justify-content-center">Docente</div>`;
            } else if (data == "3_professional") {
              content = `<div class="badge_status bg-blue d-flex justify-content-center">Orientador Vocacional o Psicologo</div>`;
            } else if (data == "4_professional") {
              content = `<div class="badge_status bg-blue d-flex justify-content-center">Administrativo</div>`;
            } else if (data == "5_professional") {
              content = `<div class="badge_status bg-blue d-flex justify-content-center">Conferencista</div>`;
            } else if (data == "6_professional") {
              content = `<div class="badge_status bg-blue d-flex justify-content-center">Invitado Especial</div>`;
            }
            return content;
          }
        },
        {
          "data": "escuela",
          render: function (data, type, row) {
            if (data != "Empty") {
              return data;
            } else {
              return "";
            }
          }
        },
      ]
    });
  }

  listar();

  $('#btn_reload_visitors').click(function () {
    listar();
  })
})