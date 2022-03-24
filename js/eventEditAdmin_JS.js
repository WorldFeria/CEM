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
        { "data": "codigo_pabellon", 
        render: function (data, type, row) {
          var content;
 
          if (data == 'PI') {
            content = 'PB' ;

          }else{
            content = data;
          }
          return content;
        } },
        { "data": "descripcion_pabellon" },
        { "data": "cantidad_stands" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary btn_publicidad' style='margin:2px'><i class='bx bx-paint-roll nav_logo-icon'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary edit-lean' style='margin:2px'><i class='bx bx-store-alt nav_logo-icon'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar_pabellon' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal-edit-pabellon-btn-edit '><i class='bx bx-pencil nav_logo-icon'></i></button> </div>" }
      
      ]

    });

    /*---------------botones pabellón----------------*/
    ir_stands("#tabla_pabellon tbody", table);
    btn_editar_pabe("#tabla_pabellon tbody", table);
    ir_publicidad_pabellon("#tabla_pabellon tbody", table);
  }
  
  //6 funciones , 3 para eliminar, 3 para aumentar 

  function eliminarFullAccess(n){

  }
  function eliminarCentral(n){
    
  }
  function eliminarCorner(n){
    
  }

  function crearStand(n,pabellon,tipoStand){
    $.ajax({
      type: 'POST',
      url: "../php/crearEliminarStands.php",
      data: `numero=${n}&idPabellon=${pabellon}&tipoStand=${tipoStand}` + ("&param=crearStand"),

    })
  }

  function cambiarTotalStands(total,pabellon){
    $.ajax({
      type: 'POST',
      url: "../php/crearEliminarStands.php",
      data: `total=${total}&idPabellon=${pabellon}` + ("&param=cambiarTotal"),

    })
  }

  $("#editar_datos_pabellon").on("submit", function (event) { 

    event.preventDefault();
    //aquí se habrén dos brechas, si ya tiene al menos algún stand y si no

    let codigo = document.getElementById("codigoPabellon").value ;

    if(codigo == "Sin codigo"){

        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Debe escoger un codigo para el pabellon',
          icon: 'error',
          confirmButtonText: 'Ok'
        })



    }else{

      let nuevo = document.getElementById("comprobarNuevo").value ;

      if(nuevo != "Sin codigo"){ // o sea que ya es la segunda u otra vez que se edita

        let respaldoFA= document.getElementById("respaldoFA").value;
        let respaldoCC= document.getElementById("respaldoCC").value;
        let respaldoCM= document.getElementById("respaldoCM").value;

        let nStandsFA= document.getElementById("nStandsFA").value;
        let nStandsCC= document.getElementById("nStandsCC").value;        
        let nStandsCM= document.getElementById("nStandsCM").value;

        respaldoFA = parseInt(respaldoFA, 10) ;
        respaldoCC = parseInt(respaldoCC, 10) ;
        respaldoCM = parseInt(respaldoCM, 10) ;
        nStandsFA = parseInt(nStandsFA, 10) ;
        nStandsCC = parseInt(nStandsCC, 10) ;
        nStandsCM  = parseInt(nStandsCM, 10) ;

              



        if(respaldoFA == nStandsFA && respaldoCC == nStandsCC &&  respaldoCM == nStandsCM){//o sea que no cambió nada
            
          $(".modal-edit-pabellon-btn-edit").modal("hide");

        }else if(respaldoFA > nStandsFA || respaldoCC > nStandsCC ||  respaldoCM > nStandsCM){

          Swal.fire({
            title: "Está eliminando  stands!",
            text: "Está seguro de ello?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, estoy seguro!'
          }).then((result) => {

            //aquí sería eliminación de los stands

            if (result.isConfirmed) {

              //eliminarFullAccess(n);
              //eliminarCentral(n);
              //eliminarCorner(n);

              Swal.fire(
                'Los stands han sido borrados!',
                'Los stands han sido borrados con exito.',
                'success'
              )
              //$(".modal-edit-pabellon-btn-edit").modal("hide");
              //$('#page_content').load(`event_editAdmin.php?idevent=${idFatherEvent}`); 

            }else{
              
              Swal.fire({
                title: 'Acción cancelada',
                icon: 'warning',
              })
  
            }
          })
        }else if(respaldoFA < nStandsFA || respaldoCC < nStandsCC ||  respaldoCM < nStandsCM){


          Swal.fire({
            title: "Está creando stands!",
            text: "Está seguro de ello?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, estoy seguro!'
          }).then((result) => {

            if (result.isConfirmed) {

              let idPabellon = document.getElementById("id_pabellon2").value;

              if(respaldoFA < nStandsFA){
                crearStand(nStandsFA - respaldoFA , idPabellon , 'Full Access');

                
              }if(respaldoCC < nStandsCC){  
                crearStand(nStandsCC - respaldoCC , idPabellon , 'Central');
                

              }if(respaldoCM < nStandsCM){
                crearStand(nStandsCM - respaldoCM , idPabellon , 'Corner M');
                
              }
              let total = parseInt(nStandsFA, 10)  + parseInt(nStandsCC, 10)  + parseInt(nStandsCM, 10);
              cambiarTotalStands(total,idPabellon);
          
              Swal.fire(
                'Los stands han sido creados!',
                'Los stands han sido creados con exito.',
                'success'
              )
              $(".modal-edit-pabellon-btn-edit").modal("hide");
              $('#page_content').load(`event_editAdmin.php?idevent=${idFatherEvent}`); 

            }else{
              
              Swal.fire({
                title: 'Acción cancelada',
                icon: 'warning',
              })
  
            }
          })





        }


      }else{


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

            $('#page_content').load(`event_editAdmin.php?idevent=${idFatherEvent}`); 

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
      }
    }

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
      let nombrePabe = data["nombre_pabellon"];
      let codigo_pabellon = data["codigo_pabellon"];
      let descripcion_pabellon = data["descripcion_pabellon"];

      
      $('#nombre_pabellon').val(nombrePabe);
      $('#descripcion_pabellon').val(descripcion_pabellon);
      $('#codigoPabellon').val(codigo_pabellon);
      $('#comprobarNuevo').val(codigo_pabellon);
      disabledCode();


      $.ajax({
        type: 'POST',
        url: "../php/event_edit_c.php",
        data: $(this).serialize() + `&idPabellon=${id_customer}` + ("&param=datos"),
  
  
        success: function (data) {
          data = data.replace("[","");
          data = data.replace("]","");
          let split = data.split('"') // (1) [ 'bearer', 'token' ]

          let fullAccess = split[1] // (2) token
          let central = split[3] // (2) token
          let cornerM = split[5] // (2) token
          
          document.getElementById("nStandsFA").value = fullAccess;
          document.getElementById("respaldoFA").value = fullAccess;
          document.getElementById("nStandsCC").value = central;
          document.getElementById("respaldoCC").value = central;
          document.getElementById("nStandsCM").value = cornerM;
          document.getElementById("respaldoCM").value = cornerM;

        }
      })



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
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary edit-horarios' style='margin:2px'><i class='fa fa-calendar-plus-o' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar_auditorio' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal-edit-auditorio-btn-edit'><i class='bx bx-pencil nav_logo-icon'></i></button> </div>" }
      
      ]
    });


    /*---------------botones auditorio----------------*/
    ir_publicidad_auditorio("#tabla_auditorio tbody", table);
    btn_editar_audi("#tabla_auditorio tbody", table);
    edit_horarios("#tabla_auditorio tbody", table);
  }
  

  $("#editar_datos_auditorio").on("submit", function (event) { 

    event.preventDefault();
  
    let codigo = document.getElementById("codigo_auditorio").value ;
    let codigoAnterior = document.getElementById("codigoAuditorioAnterior").value ;

    
    if(codigo == "Sin codigo"){

      Swal.fire({
        title: 'Misión Fallida!',
        text: 'Debe escoger un codigo para el Auditorio',
        icon: 'error',
        confirmButtonText: 'Ok'
      })

    }else if(codigoAnterior == "Sin codigo" ){

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
          $('#page_content').load(`event_editAdmin.php?idevent=${idFatherEvent}`); 

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
    }else if(codigoAnterior != "Sin codigo" ){
      $.ajax({
        type: 'POST',
        url: "../php/event_edit_c.php",
        data: $(this).serialize() + ("&param=soloEditarAuditorio"),


        success: function (data) {

          Swal.fire({
            title: 'Misión Cumplida!',
            text: 'Los datos del auditorio se han editado con éxito!.',
            icon: 'success',
            confirmButtonText: 'Ok'
          })

          $(".modal-edit-auditorio-btn-edit").modal("hide");
          $('#page_content').load(`event_editAdmin.php?idevent=${idFatherEvent}`); 

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
    }

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
      let data = table.row( $(this).parents("tr") ).data();
      let id_customer = data["id_auditorio"];
      let nombre_auditorio = data["nombre_auditorio"];
      let codigo_auditorio = data["codigo_auditorio"];
      let descripcion_auditorio = data["descripcion_auditorio"];

      $('#id_auditorio2').val(id_customer);

      $('#nombre_auditorio').val(nombre_auditorio);

      if(codigo_auditorio == 'Sin codigo'){
        $('#codigo_auditorio').val('');
      }else{
        $('#codigo_auditorio').val(codigo_auditorio);
        $("#codigo_auditorio").attr("disabled", "true");

      }
      
    
      $('#codigoAuditorioAnterior').val(codigo_auditorio);
      $('#descripcion_auditorio').val(descripcion_auditorio);

    })
  };

  var edit_horarios = function(tbody, table){
    $(tbody).on("click", "button.edit-horarios",function(){

      var data = table.row( $(this).parents("tr") ).data();
      var tipo = data["codigo_auditorio"];

      var id_evento = $('.obtener_id_evento').attr('id');
      $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipo}&n_refresh=${1}`);
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
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary edit-lean' style='margin:2px'><i class='bx bx-paint-roll nav_logo-icon'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar_lobby' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal-edit-lobby-btn-edit'><i class='bx bx-pencil nav_logo-icon'></i></button>  </div>" }
      
      ]

    });

     /*---------------botones lobby----------------*/
    ir_publicidad_lobby("#tabla_lobby tbody", table);
    btn_editar_lobby("#tabla_lobby tbody", table);

  }
  

  $("#editar_datos_lobby").on("submit", function (event) { 

    event.preventDefault();

    let codigo = document.getElementById("codigo_lobby").value ;
    let codigoAnterior = document.getElementById("codigoLobbyAnterior").value ;

    if(codigo == "Sin codigo"){

      Swal.fire({
        title: 'Misión Fallida!',
        text: 'Debe escoger un codigo para el lobby',
        icon: 'error',
        confirmButtonText: 'Ok'
      })

    }else if(codigoAnterior == "Sin codigo" ){
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
          $('#page_content').load(`event_editAdmin.php?idevent=${idFatherEvent}`); 
  
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
    }else if(codigoAnterior != "Sin codigo" ){
      $.ajax({
        type: 'POST',
        url: "../php/event_edit_c.php",
        data: $(this).serialize() + ("&param=soloEditarLobby"),
  
  
        success: function (data) {
  
          Swal.fire({
            title: 'Misión Cumplida!',
            text: 'La información del Lobby se ha editado con éxito!',
            icon: 'success',
            confirmButtonText: 'Ok'
          })
  
          $(".modal-edit-lobby-btn-edit").modal("hide");
          $('#page_content').load(`event_editAdmin.php?idevent=${idFatherEvent}`); 
  
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
    }





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
      let data = table.row( $(this).parents("tr") ).data();

      let id_customer = data["id_lobby"];
      let nombre_lobby = data["nombre_lobby"];
      let codigo_lobby = data["codigo_lobby"];
      let descripcion_lobby = data["descripcion_lobby"];
      //alert(id_customer);
      $('#id_lobby2').val(id_customer);
      $('#nombre_lobby').val(nombre_lobby);

      if(codigo_lobby == 'Sin codigo'){
        $('#codigo_lobby').val('');
      }else{
        $('#codigo_lobby').val(codigo_lobby);
        $("#codigo_lobby").attr("disabled", "true");

      }

      $('#codigoLobbyAnterior').val(codigo_lobby);
      $('#descripcion_lobby').val(descripcion_lobby);

    })
  };

  function disabledCode(){
    if($("#comprobarNuevo").val() == 'Sin codigo'){
      $("#codigoPabellon").removeAttr("disabled");
  }else{
      $("#codigoPabellon").attr("disabled", "true");
  }

}


  datos_tabla_pabellon();
  datos_tabla_lobby();
  datos_tabla_auditorio();
  



 




})
/*


*/
