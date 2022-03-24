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
 
    if( idRol == 1 || idRol == 2){
      param = "allAdvisers";
    }else{
      param =  "asesores";
    }
    //alert	(param);

    var table = $('#advisers_table').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/adviser_c.php",
        "data": {
          "param": param,
          "email": `${email}`
        }
      },
      "columns": [

        { "data": "first_name" },
        { "data": "last_name" },
        { "data": "cellphone" },
        { "data": "email" },
        { "data": "creation_date" },
        //{ "data": "is_validated" },
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
        //{"data":"country"},
        //{ "defaultContent": "<div class='d-flex justify-content-center'> <!--<button class='btn btn-success excel-lean' style='margin:2px' ><i class='bx bx-columns nav_logo-icon'></i></button> -->  <button class='btn btn-danger' style='margin:2px'><i class='bx bx-trash-alt nav_logo-icon'></i></button> </div>" }

      ]

    });

    obtain_adviser_data("#advisers_table tbody", table);

  }


  var obtain_adviser_data = function (tbody, table) {
    $(tbody).on("click", "button.edit-lean", function () {
      var data = table.row($(this).parents("tr")).data();
      //console.log(data);
      var id_customer = data["id_customer"];
      var programinterest = data["program_interest"];
      var id_source = data["source"];
      console.log(id_customer);
      $('#page_content').load(`lead_details.php?customer=${id_customer}&idprogram=${programinterest}&source=${id_source}`);
    })
  };

  listar();


  $("#form_new_adviser").on("submit", function (event) {

    event.preventDefault();
    console.log($(this).serialize())
    //alert(email);

    $.ajax({
      type: 'POST',
      url: "../php/adviser_c.php",
      data: $(this).serialize() + ("&param=create_adviser" + `&uid=${uid}` + `&email_exh=${email}`),


      success: function (data) {
        //console.log("----" + data);

        sendConfirmationEmail($('#in_new_adv_email').val());

        if (data == "Record updated successfully") {

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

})