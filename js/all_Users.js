$(document).ready(function () {

  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;

  var listar = function () {
    var table = $('#users_table').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/allUsers_c.php",
        "data": {
          "param": "allUsers",
        }
      },
      "columns": [

        /*{
          data: "name_status",
          render: function (data, type, row) {
            return `<div class="card_name_leads ${data} d-flex justify-content-center">${data}</div>`;
          }
        },*/
        { "data": "first_name" },
        { "data": "last_name" },
        { "data": "cellphone" },
        { "data": "email" },
        //{ "data": "rol_name" },
        {
          "data": "rol_name",
          render: function (data, type, row) {
            var content;

            if (data == 'admin') {
              content = `<div class="badge_status FROZEN d-flex justify-content-center">ADMINISTRADOR</div>`;
            } 
            else if (data == 'organizer'){
              content = `<div class="badge_status WARM d-flex justify-content-center">ORGANIZADOR</div>`;
            } 
            else if (data == 'exhibitor'){
              content = `<div class="badge_status PURPLE d-flex justify-content-center">EXPOSITOR</div>`;
            } 
            else if (data == 'adviser'){
              content = `<div class="badge_status DANGER d-flex justify-content-center">ASESOR</div>`;
            } 
            else if (data == 'visitor_student'){
              content = `<div class="badge_status SUCCESS d-flex text-center">VISITANTE ESTUDIANTE</div>`;
            }
            else if (data == 'visitor_carer'){
              content = `<div class="badge_status SUCCESS d-flex text-center">VISITANTE CUIDADOR</div>`;
            }
            else if (data == 'visitor_demo'){
              content = `<div class="badge_status SUCCESS d-flex text-center">VISITANTE DEMO</div>`;
            }
            else if (data == 'seller'){
              content = `<div class="badge_status INFO d-flex justify-content-center">VENDEDOR</div>`;
            }

            return content;
          }
        },
        
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary editarContraseña' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalEditarContraseña'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary editarUser' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalEditarUser'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-danger borrarUser' style='margin:2px'><i class='fa fa-trash-o' aria-hidden='true'></i></button> </div>" }
      ]

    });

    obtain_lead_data("#users_table tbody", table);
    botonEditarUser("#users_table tbody", table);
    botonBorrarUser("#users_table tbody", table);
    obtenerEmailContra("#users_table tbody", table);
  }


var obtenerEmailContra = function(tbody, table){
  $(tbody).on("click", "button.editarContraseña",function(){

    var data = table.row( $(this).parents("tr") ).data();

    var email = data["email"];


    document.getElementById("emailContraseña").value = email ;



  })
};


  var botonEditarUser = function(tbody, table){
    $(tbody).on("click", "button.editarUser",function(){

      var data = table.row( $(this).parents("tr") ).data();
      var nombre_expo = data["first_name"];
      var apellido_expo = data["last_name"];

      var email = data["email"];


      document.getElementById("nombreUser").value = nombre_expo ;
      document.getElementById("apellidoUser").value = apellido_expo ;
      document.getElementById("email").value = email ;



    })
  };



  var botonBorrarUser = function(tbody, table){
    $(tbody).on("click", "button.borrarUser",function(){

      var data = table.row( $(this).parents("tr") ).data();
      var email = data["email"];


      funcionBorrarUsuario(email);
                          
      
      
    })
  };





    var funcionBorrarUsuario = function(email2){
    $.ajax({
      type: 'POST',
      url: "../php/allUsers_c.php",
      data: {
                  "param": "borrarUser",
                  "email": email2

              },


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Se ha borrado al usuario',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $('#page_content').load(`allUsers.php`);

        //funcionCalendario();
      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de borrar al usuario',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })
 };


 
 $("#formEditarContraseña").on("submit", function (event) {


  event.preventDefault();


  $.ajax({
    type: 'POST',
    url: "../php/allUsers_c.php",
    data: $(this).serialize() + ("&param=cambiarConteraseña"),


    success: function (data) {

      Swal.fire({
        title: 'Misión Cumplida!',
        text: 'Se han editado los datos del usuario',
        icon: 'success',
        confirmButtonText: 'Ok'
      })

      $(".modalEditarContraseña").modal("hide");
      $('#page_content').load(`allUsers.php`);

    },
    error: function () {
      Swal.fire({
        title: 'Error!',
        text: 'Ocurrio un error al momento editar los datos del usuario',
        icon: 'error',
        confirmButtonText: 'Ok'
      })

    }
  })


});

  $("#formEditarUser").on("submit", function (event) {


    event.preventDefault();


    $.ajax({
      type: 'POST',
      url: "../php/allUsers_c.php",
      data: $(this).serialize() + ("&param=editarUser"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Se han editado los datos del usuario',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".modalEditarUser").modal("hide");

        $('#page_content').load(`allUsers.php`);

      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento editar los datos del usuario',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })


  });






  var obtain_lead_data = function (tbody, table) {
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

  $('#btn_reload_all_users').click(function () {
    //alert("adsad")
    listar();
  })

})