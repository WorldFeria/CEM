$(document).ready(function () {

  /*---------------Pabellón----------------*/
  var datos_tabla_pabellon = function () {
    var table = $('#tabla_pabellon').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/event_edit_c.php",
        "data": {
          "param": "pabellon",
          "id_current_event": idFatherEvent
        }
      },
      "columns": [
        { "data": "id_pabellon", 
          render: function (data, type, row) {
            var content;
   
            if (true) {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">ID</div>`;

            }
            return content;
          }

      },
        { "data": "nombre_pabellon" },
        { "data": "codigo_pabellon" },
        { "data": "descripcion_pabellon" },
        { "data": "cantidad_stands" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary btn_publicidad' style='margin:2px'><i class='bx bx-paint-roll nav_logo-icon'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary edit-lean' style='margin:2px'><i class='bx bx-store-alt nav_logo-icon'></i></button> </div>" }
      
      ]

    });

    /*---------------botones pabellón----------------*/
    ir_stands("#tabla_pabellon tbody", table);
    btn_editar_pabe("#tabla_pabellon tbody", table);
    ir_publicidad_pabellon("#tabla_pabellon tbody", table);

  }
  
  $("#editar_datos_pabellon").on("submit", function (event) { 

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/event_edit_c.php",
      data: $(this).serialize() + ("&param=editar_datos_pabellon"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Los datos del pabellón se han editado con éxito!.',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".modal-edit-pabellon-btn-edit").modal("hide");

        $('#page_content').load(`event_edit.php`);

      },
      error: function () {
        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Ocurrio un error al momento de editar el pabelon',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  });


  var ir_publicidad_pabellon = function(tbody, table){
    $(tbody).on("click", "button.btn_publicidad",function(){
      var data = table.row( $(this).parents("tr") ).data();
      var tipo = data["codigo_pabellon"];
      var id_customer = data["id_pabellon"];

      if (tipo == "PI") {
        $('#page_content').load(`tabla_publicidad_pabellonPI.php?cod_pabellon=${id_customer}`);

      }else if (tipo == "PN") {
        $('#page_content').load(`tabla_publicidad_pabellonPN.php?cod_pabellon=${id_customer}`);

      }else if (tipo == "PA") {
        $('#page_content').load(`tabla_publicidad_pabellonPA.php?cod_pabellon=${id_customer}`);

      }else{
         notyf.open({
          type: 'warning',
            message: '<b>¡ATENCIÓN!</b> No puede administrar la publicidad sin antes crear el pabellón.'
        });  
      }


    })
  };

  var ir_stands = function(tbody, table){
    $(tbody).on("click", "button.edit-lean",function(){

      var data = table.row( $(this).parents("tr") ).data();
      var n_stands = data["cantidad_stands"];
      var id_pabe = data["id_pabellon"];

      if (n_stands > 0) {
        $('#page_content').load(`stand_edit.php?PABE=${id_pabe}`);
      }else{
          //Si no tiene ningún stand no puede ir a la pagina de stands
         notyf.open({
          type: 'warning',
            message: '<b>¡ATENCIÓN!</b> No puede administrar los stands sin antes crear el pabellón.'
        });                 
      }
      var n_stands = null;
      var id_pabe = null;

    })
  };

  var btn_editar_pabe = function(tbody, table){
    $(tbody).on("click", "button.editar_pabellon",function(){
      var data = table.row( $(this).parents("tr") ).data();
      var id_customer = data["id_pabellon"];
      $('#id_pabellon2').val(id_customer);
      var id_customer = null;

    })
  };

    /*---------------Auditorio----------------*/  
  var datos_tabla_auditorio = function () {
    var table = $('#tabla_auditorio').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/event_edit_c.php",
        "data": {
          "param": "auditorio",
          "id_current_event": idFatherEvent
        }
      },

      "columns": [
        { "data": "id_auditorio" },
        { "data": "nombre_auditorio" },
        { "data": "codigo_auditorio" },
        { "data": "descripcion_auditorio" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary edit-lean' style='margin:2px'><i class='bx bx-paint-roll nav_logo-icon'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary edit-horarios' style='margin:2px'><i class='fa fa-calendar-plus-o' aria-hidden='true'></i></button> </div>" }
      
      ]
    });


    /*---------------botones auditorio----------------*/
    ir_publicidad_auditorio("#tabla_auditorio tbody", table);
    btn_editar_audi("#tabla_auditorio tbody", table);
    edit_horarios("#tabla_auditorio tbody", table);
  }
  

  $("#editar_datos_auditorio").on("submit", function (event) { 

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/event_edit_c.php",
      data: $(this).serialize() + ("&param=editarDatosAuditorio"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Los datos del auditorio se han editado con éxito!.',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".modal-edit-auditorio-btn-edit").modal("hide");
        $('#page_content').load(`event_edit.php`);

      },
      error: function () {
        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Ocurrio un error al momento de editar la información del autorio.',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  });




  var ir_publicidad_auditorio = function(tbody, table){
    $(tbody).on("click", "button.edit-lean",function(){
      var data = table.row( $(this).parents("tr") ).data();
      var id_customer = data["id_auditorio"];
      var tipo = data["codigo_auditorio"];


      if (tipo == "AA") {
        $('#page_content').load(`tabla_publicidad_auditorioAA.php?IDAUDI=${id_customer}`);

      }else if (tipo == "AB") {
        $('#page_content').load(`tabla_publicidad_auditorioAB.php?IDAUDI=${id_customer}`);


      }else{
         notyf.open({
          type: 'warning',
            message: '<b>¡ATENCIÓN!</b> No puede administrar la publicidad sin antes editar el auditorio.'
        });       
      }


    })
  };

  var btn_editar_audi = function(tbody, table){
    $(tbody).on("click", "button.editar_auditorio",function(){
      var data = table.row( $(this).parents("tr") ).data();
      var id_customer = data["id_auditorio"];
      //alert(id_customer);
      $('#id_auditorio2').val(id_customer);
      var id_customer = null;

    })
  };

  var edit_horarios = function(tbody, table){
    $(tbody).on("click", "button.edit-horarios",function(){
      var id_evento = $('.obtener_id_evento').attr('id');
      var data = table.row( $(this).parents("tr") ).data();
      var tipo = data["codigo_auditorio"];
      
      $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipo}`);
    })
  };

  /*---------------Lobby----------------*/

  var datos_tabla_lobby = function () {
    var table = $('#tabla_lobby').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/event_edit_c.php",
        "data": {
          "param": "lobby",
          "id_current_event": idFatherEvent
        }
      },
      "columns": [
        { "data": "id_lobby" },
        { "data": "nombre_lobby" },
        { "data": "codigo_lobby" },
        { "data": "descripcion_lobby" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary edit-lean' style='margin:2px'><i class='bx bx-paint-roll nav_logo-icon'></i></button> </div>" }
      
      ]

    });

     /*---------------botones lobby----------------*/
    ir_publicidad_lobby("#tabla_lobby tbody", table);
    btn_editar_lobby("#tabla_lobby tbody", table);

  }
  

  $("#editar_datos_lobby").on("submit", function (event) { 

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/event_edit_c.php",
      data: $(this).serialize() + ("&param=editarDatosLobby"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'La información del Lobby se ha editado con éxito!',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".modal-edit-lobby-btn-edit").modal("hide");
        $('#page_content').load(`event_edit.php`);

      },
      error: function () {
        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Ocurrio un error al momento de editar la información del Lobby',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  });




  var ir_publicidad_lobby = function(tbody, table){
    $(tbody).on("click", "button.edit-lean",function(){

      var data = table.row( $(this).parents("tr") ).data();
      var id_customer = data["id_lobby"];
      var codigo_lobby = data["codigo_lobby"];
      if ( codigo_lobby == "LB" ) {
        $('#page_content').load(`tabla_publicidad_lobby.php?cod_pabellon=${id_customer}`);
      }else{

        notyf.open({
          type: 'warning',
            message: '<b>¡ATENCIÓN!</b> No puede administrar la publicidad sin antes editar el lobby.'
        });      
      }

    })
  };

  var btn_editar_lobby = function(tbody, table){
    $(tbody).on("click", "button.editar_lobby",function(){
      var data = table.row( $(this).parents("tr") ).data();
      var id_customer = data["id_lobby"];
      //alert(id_customer);
      $('#id_lobby2').val(id_customer);
      var id_customer = null;

    })
  };


  datos_tabla_pabellon();
  datos_tabla_lobby();
  datos_tabla_auditorio();
  
})
/*


*/
