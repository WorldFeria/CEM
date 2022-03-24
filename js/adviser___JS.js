$(document).ready(function () {

  $("#btn_reload_advisers").click(function(){
    listar();
  });


  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;

  var listar = function () {
    var param;
 
    if( idRol == 1 || idRol == 2){
      param = "allAdvisers";
    }else{
      param =  "asesores";
    }

    var table = $('#advisers_Table').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/allUsers_c.php",
        "data": {
          "param": param,
          "email": email,

        }
      },
      "columns": [

        { "data": "first_name" },
        { "data": "last_name" },
        { "data": "cellphone" },
        { "data": "email2" },
        //{ "data": "rol_name" },
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
  $("#form_new_adviser").on("submit", function (event) {

    event.preventDefault();

    //alert(email);

    $.ajax({
      type: 'POST',
      url: "../php/allUsers_c.php",
      data: $(this).serialize() + "&param=crearAsesor" + (`&uid=${uid}` + `&email_exh=${email}`),

      success: function (data) {

        //console.log("----" + data);

        sendConfirmationEmail($('#in_new_adv_email').val());

        if (data == 777) {

          $(function(){
            $('#in_new_adv_firstname').val("");
            $('#in_new_adv_lastname').val("");
            $('#in_new_adv_cellphone').val("");
            $('#in_new_adv_email').val("");
  
            $('#new_adv_modal').modal('hide');
          })

          Swal.fire({
            title: 'Excelente!',
            text: 'Se ha enviará un email de validación al correo proporcionado.',
            icon: 'success',
            confirmButtonText: 'Entendido'
          })
         
        } else {

          Swal.fire({
            title: 'Error!',
            text: data,
            icon: 'error',
            confirmButtonText: 'Entendido'
          })

        }

        listar();

      },
      error: function (data) {
        alert(data);

        Swal.fire({
          title: 'Error!',
          text: data,
          icon: 'error',
          confirmButtonText: 'Entendido'
        })

      }
    })

  });

  sendConfirmationEmail = (async (email) => {
    console.log("asesor");
    $.ajax({
      type: 'POST',
      url: "../email/confirmationEmail.php",
      data: `email=${email}` + "&param=create_adv" ,


      success: function (data) {
        //console.log("----" + data);
        
        //console.log(data);
        if (data.toString == 'Email has NOT been sended') {
          Swal.fire({
            title: 'Error!',
            text: "No se ha concretado el envío del correo, por favor contacte con soporte: " + data,
            icon: 'error',
            confirmButtonText: 'Entendido'
          })
        }

      },
      error: function (data) {
        console.log("----" + data);

        Swal.fire({
          title: 'Error!',
          text: data,
          icon: 'error',
          confirmButtonText: 'Entendido'
        })

      }
    })


  });

  listar();



})


