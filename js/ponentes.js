$(document).ready(function () {

  $("#btn_reload_exhibitors").click(function () {
    listar();
  });

  var listar = function () {
    var table = $('#exhibitors_table').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/exhibitor_c.php",
        "data": {
          "param": "ponentes",
        }
      },
      "columns": [
        { "data": "first_name" },
        { "data": "last_name" },
        {
          "data": "name",
          render: function (data, type, row) {
            var content;
            content = `<div class="badge_status btn-info d-flex justify-content-center">`+data+`</div>`;
            return content;
          }
        },
        { "data": "cellphone" },
        { "data": "email" },
        { "data": "creation_date" },
        {
          "data": "is_validated",
          render: function (data, type, row) {
            var content;
            if (data != true) {
              content = `<div class="badge_status WARM d-flex justify-content-center">NO VALIDADO</div>`;
            } else {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">VALIDADO</div>`;
            }
            return content;
          }
        }
      ]
    });
  }
  listar();

  $.ajax({
    type: 'POST',
    url: "../php/exhibitor_c.php",
    data: $(this).serialize() + ("&param=country"),
    success: function (data) {
      $("#in_new_exh_country").html(data);
    },
    error: function (data) {
      notyf.open({
        type: 'danger',
        message: '<b>¡UPS!</b> No podemos acceder a los datos de País, intentelo denuevo porfavor.'
      });
    }
  });

  var newexhcellphone = document.getElementById("in_new_exh_cellphone");
  $('#help_cellphone').text('El Número de Teléfonico debe ser igual a 10 dígitos.');
  $('#help_cellphone').addClass('text-dark');
  var max = 10;
  newexhcellphone.addEventListener('keyup', function () {
    var len = $(this).val().length;
    if (len >= max) {
      $('#help_cellphone').text('0 números restantes.');
      $('#help_cellphone').removeClass('text-dark');
      $('#help_cellphone').addClass('text-success');
    } else {
      var ch = max - len;
      $('#help_cellphone').text(ch + ' números restantes.');
      $('#help_cellphone').removeClass('text-success');
      $('#help_cellphone').addClass('text-dark');
    }
  });
  newexhcellphone.addEventListener('input', function () {
    var len = $(this).val().length;
    if (len >= max) {
      this.value = this.value.slice(0, max);
    }
  });

  $("#form_new_exhibitor").on("submit", function (event) {

    event.preventDefault();
    console.log($(this).serialize())

    $.ajax({
      type: 'POST',
      url: "../php/exhibitor_c.php",
      data: $(this).serialize() + ("&param=create_exhibitor"),

      success: function (data) {
        sendConfirmationEmail($('#in_new_exh_email').val());
        if (data == "Record updated successfully") {
          $(function () {
            $('#in_new_exh_firstname').val("");
            $('#in_new_exh_lastname').val("");
            $('#in_new_exh_country').val("");
            $('#in_new_exh_cellphone').val("");
            $('#in_new_exh_email').val("");
            $('#new_exh_modal').modal('hide');
          })
          Swal.fire({
            title: '¡Excelente!',
            text: 'Se ha enviará un email de validación al correo proporcionado.',
            icon: 'success',
            confirmButtonText: 'Entendido'
          })
        } else {
          Swal.fire({
            title: '¡Ups!',
            text: data,
            icon: 'error',
            confirmButtonText: 'Entendido'
          })
        }
        listar();
      },
      error: function (data) {
        Swal.fire({
          title: '¡Ups!',
          text: data,
          icon: 'error',
          confirmButtonText: 'Entendido'
        })
      }
    })
  });

  sendConfirmationEmail = (async (email) => {
    $.ajax({
      type: 'POST',
      url: "../email/confirmationEmail.php",
      data: `email=${email}` + "&param=create_exh",
      success: function (data) {
        if (data == "Email has NOT been sended") {
          Swal.fire({
            title: '¡Ups!',
            text: "No se ha concretado el envío del correo, por favor contacte con Soporte Técnico.",
            icon: 'error',
            confirmButtonText: 'Entendido'
          })
        }
      },
      error: function (data) {
        Swal.fire({
          title: '¡Ups!',
          text: data,
          icon: 'error',
          confirmButtonText: 'Entendido'
        })
      }
    })
  });

})