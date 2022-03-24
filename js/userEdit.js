$(document).ready(function () {

  var funcionBorrarUsuario = function (id_user = null, tipo_user, id_stand = 'Z') {
    $.ajax({
      type: 'POST',
      url: "../php/user_edit_c.php",
      data: {
        "param": "borrarUser",
        "id_user": id_user,
        "id_evento": idFatherEvent,
        "id_stand": id_stand,
        "tipo_user": tipo_user

      },


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Se ha desasignado al usuario',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);

        //funcionCalendario();
      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de desasignado al usuario',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })
  };

  $.ajax({
    type: 'POST',
    url: "../php/exhibitor_c.php",
    data: $(this).serialize() + ("&param=country"),
    success: function (data) {
      $("#countryExpositor").html(data);
      $("#countryAsesor").html(data);
      $("#countryVendedor").html(data);
    },
    error: function (data) {
      notyf.open({
        type: 'danger',
        message: '<b>¡UPS!</b> No podemos acceder a los datos de País, intentelo denuevo porfavor.'
      });
    }
  });

  /*---------------Organizador----------------*/
  var datos_tabla_organizador = function () {
    var table = $('#tabla_organizador').DataTable({

      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/user_edit_c.php",
        "data": {
          "param": "organizador",
          "id_current_event": idFatherEvent
        }
      },
      "columns": [

        {
          "data": "id_user",
          render: function (data, type, row) {
            var content;

            if (true) {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">ID</div>`;

            }
            return content;
          }

        },
        { "data": "first_name" },
        { "data": "last_name" },
        { "data": "email" },
        { "data": "cellphone" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary editarOrg' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalEditarExpAse'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-warning borrarOrg' style='margin:2px'><i class='fa fa-window-close' aria-hidden='true'></i></button> </div>" }


      ]



    });

    botonEditarOrg("#tabla_organizador tbody", table);
    botonBorrarOrg("#tabla_organizador tbody", table);

  }





  var botonEditarOrg = function (tbody, table) {
    $(tbody).on("click", "button.editarOrg", function () {

      var data = table.row($(this).parents("tr")).data();
      var nombre_expo = data["first_name"];
      var apellido_expo = data["last_name"];

      var id_user = data["id_user"];
      var tipo_user = 2;


      var status = 1;
      document.getElementById("status").value = status;

      document.getElementById("id_user").value = id_user;
      document.getElementById("tipo_user").value = tipo_user;

      document.getElementById("nombreUser").value = nombre_expo;
      document.getElementById("apellidoUser").value = apellido_expo;


    })
  };



  var botonBorrarOrg = function (tbody, table) {
    $(tbody).on("click", "button.borrarOrg", function () {

      var data = table.row($(this).parents("tr")).data();
      var id_user = data["id_user"];

      funcionBorrarUsuario(id_user, 2);



    })
  };




  var datosTablaVendedor = function () {
    var table = $('#tablaVendedor').DataTable({


      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/user_edit_c.php",
        "data": {
          "param": "vendedor",
          "id_current_event": idFatherEvent
        }
      },
      "columns": [

        {
          "data": "id_user",
          render: function (data, type, row) {
            var content;

            if (true) {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">ID</div>`;

            }
            return content;
          }

        },
        { "data": "first_name", },
        { "data": "last_name" },
        { "data": "email" },
        { "data": "cellphone" },
        { "data": "codigo_stand" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary editarVendedor' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalEditarExpAse'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-warning borrarVendedor' style='margin:2px' ><i class='fa fa-window-close' aria-hidden='true'></i></button> </div>" }



      ]


    });
    botonEditarVendedor("#tablaVendedor tbody", table);
    botonBorrarVendedor("#tablaVendedor tbody", table);
  }

  //cem_vocafestival

  //cem 


  var botonBorrarVendedor = function (tbody, table) {
    $(tbody).on("click", "button.borrarVendedor", function () {

      var data = table.row($(this).parents("tr")).data();

      var codigo_stand = data["codigo_stand"];
      var id_user = data["id_user"];

      funcionBorrarUsuario(id_user, 8, codigo_stand);

    })
  };


  var botonEditarVendedor = function (tbody, table) {
    $(tbody).on("click", "button.editarVendedor", function () {

      var data = table.row($(this).parents("tr")).data();
      var nombre_expo = data["first_name"];
      var apellido_expo = data["last_name"];

      document.getElementById("nombreUser").value = nombre_expo;
      document.getElementById("apellidoUser").value = apellido_expo;


      var id_user = data["id_user"];
      var tipo_user = 8;

      document.getElementById("id_user").value = id_user;
      document.getElementById("tipo_user").value = tipo_user;




    })
  };




  var datos_tabla_expositor = function () {
    var table = $('#tabla_expositor').DataTable({


      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/user_edit_c.php",
        "data": {
          "param": "expositor",
          "id_current_event": idFatherEvent
        }
      },
      "columns": [

        {
          "data": "id_user",
          render: function (data, type, row) {
            var content;

            if (true) {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">ID</div>`;

            }
            return content;
          }

        },
        { "data": "nombre_expo" },
        { "data": "apellido_expo" },
        { "data": "correo_expositor" },
        { "data": "cellphone" },
        { "data": "codigo_stand" },
        {
          "data": "status",
          render: function (data, type, row) {
            var content;

            if (data == "Confirmado") {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">Asignado</div>`;

            } else if (data == "En espera") {
              content = `<div class="badge_status bg-warning d-flex justify-content-center">En espera</div>`;

            }
            return content;
          }
        },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary editar_exp' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalEditarExpAse'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-warning borrar_exp' style='margin:2px' ><i class='fa fa-window-close' aria-hidden='true'></i></button> </div>" }


      ]



    });

    botonEditarExpositor("#tabla_expositor tbody", table);
    botonBorrarExpositor("#tabla_expositor tbody", table);

  }








  var botonEditarExpositor = function (tbody, table) {
    $(tbody).on("click", "button.editar_exp", function () {

      var data = table.row($(this).parents("tr")).data();
      var nombre_expo = data["nombre_expo"];
      var apellido_expo = data["apellido_expo"];

      var status = data["status"];
      document.getElementById("status").value = status;

      var codigo_stand = data["codigo_stand"];
      document.getElementById("stand").value = codigo_stand;



      document.getElementById("nombreUser").value = nombre_expo;
      document.getElementById("apellidoUser").value = apellido_expo;


      var id_user = data["id_user"];
      var tipo_user = 3;

      document.getElementById("id_user").value = id_user;
      document.getElementById("tipo_user").value = tipo_user;


    })
  };


  var botonBorrarExpositor = function (tbody, table) {
    $(tbody).on("click", "button.borrar_exp", function () {

      var data = table.row($(this).parents("tr")).data();

      var codigo_stand = data["codigo_stand"];

      funcionBorrarUsuario(null, 3, codigo_stand);

    })
  };






  var datos_tabla_asesor = function () {
    var table = $('#tabla_asesor').DataTable({


      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/user_edit_c.php",
        "data": {
          "param": "asesor",
          "id_current_event": idFatherEvent
        }
      },
      "columns": [

        {
          "data": "id_user",
          render: function (data, type, row) {
            var content;

            if (true) {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">ID</div>`;

            }
            return content;
          }

        },
        { "data": "first_name" },
        { "data": "last_name" },
        { "data": "email" },
        { "data": "cellphone" },
        { "data": "stand_confirmed" },
        {
          "data": "confirm",
          render: function (data, type, row) {
            var content;

            if (data == '1' || data == 1) {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">Asignado</div>`;

            } else {
              content = `<div class="badge_status bg-warning d-flex justify-content-center">En espera</div>`;

            }
            return content;
          }
        },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary editar_asesor' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalEditarExpAse'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-warning borrar_asesor' style='margin:2px' ><i class='fa fa-window-close' aria-hidden='true'></i></button> </div>" }


      ]



    });
    //sdasdasdasd
    botonEditarAsesor("#tabla_asesor tbody", table);
    botonBorrarAsesor("#tabla_asesor tbody", table);

  }





  var botonEditarAsesor = function (tbody, table) {
    $(tbody).on("click", "button.editar_asesor", function () {

      var data = table.row($(this).parents("tr")).data();
      var nombre_expo = data["first_name"];
      var apellido_expo = data["last_name"];

      document.getElementById("nombreUser").value = nombre_expo;
      document.getElementById("apellidoUser").value = apellido_expo;

      var codigo_stand = data["stand_confirmed"];
      document.getElementById("stand").value = codigo_stand;

      var status = data["is_validated"];
      document.getElementById("status").value = status;

      var id_user = data["id_user"];
      var tipo_user = 4;

      document.getElementById("id_user").value = id_user;
      document.getElementById("tipo_user").value = tipo_user;




    })
  };



  var botonBorrarAsesor = function (tbody, table) {
    $(tbody).on("click", "button.borrar_asesor", function () {

      var data = table.row($(this).parents("tr")).data();
      var id_user = data["id_user"];

      var codigo_stand = data["stand_confirmed"];
      funcionBorrarUsuario(id_user, 4, codigo_stand);


    })
  };

  var datos_tabla_visitante = function () {
    var table = $('#tabla_visitante').DataTable({


      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/user_edit_c.php",
        "data": {
          "param": "visitante",
          "id_current_event": idFatherEvent
        }
      },
      "columns": [

        {
          "data": "id_user",
          render: function (data, type, row) {
            var content;

            if (true) {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">ID</div>`;

            }
            return content;
          }

        },
        { "data": "first_name" },
        { "data": "last_name" },
        {
          "data": "email",
          render: function (data, type, row) {
            var content;
            let partesCorreo = data.split('@');
            content = `<div>${partesCorreo[0]}@<br>${partesCorreo[1]}</div>`;

            return content;
          }

        },
        { "data": "cellphone" },
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
          "data": "kind",
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
            }
            return content;
          }
        },
        {
          "data": "escuela",
          render: function (data, type, row) {
            var content;
            if (data == 'Empty') {
              content = "--";
            } else {
              content = data;
            }
            return content;
          }

        },
        { "data": "country" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary editar_visitante' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modalEditarExpAse'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-warning borrar_visitante' style='margin:2px' ><i class='fa fa-window-close' aria-hidden='true'></i></button> </div>" }


      ]



    });
    //sdasdasdasd
    botonEditarVisitante("#tabla_visitante tbody", table);
    botonBorrarVisitante("#tabla_visitante tbody", table);

  }

  var datos_tabla_visitantesClassEducation_Canada = function () {
    var table = $('#tabla_visitantesClassEducation_Canada').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      responsive: true,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'print'
      ],
      "order": [[13, 'desc']],
      "pageLength": 25,
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/user_edit_c.php",
        "data": {
          "param": "visitantesClassEducation_Canada"
        }
      },
      "columns": [
        { "data": "program" },
        { "data": "firstName" },
        { "data": "lastName" },
        { "data": "age" },
        { "data": "countryOrigin" },
        { "data": "city" },
        {
          "data": "email",
          render: function (data, type, row) {
            var content;
            let partesCorreo = data.split('@');
            content = `<div>${partesCorreo[0]}@<br>${partesCorreo[1]}</div>`;
            return content;
          }
        },
        { "data": "phone" },
        { "data": "countryDestiny" },
        { "data": "dateStart" },
        { "data": "paymentMethod" },
        { "data": "investmentAmount" },
        { "data": "leadpriority" },
        { "data": "dateTime" }
      ]

    });
  }

  var datos_tabla_visitantesClassEducation_Italia = function () {
    var table = $('#tabla_visitantesClassEducation_Italia').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      responsive: true,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'print'
      ],
      "order": [[11, 'desc']],
      "pageLength": 25,
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/user_edit_c.php",
        "data": {
          "param": "visitantesClassEducation_Italia"
        }
      },
      "columns": [
        { "data": "program" },
        { "data": "firstName" },
        { "data": "lastName" },
        { "data": "age" },
        { "data": "countryOrigin" },
        { "data": "city" },
        {
          "data": "email",
          render: function (data, type, row) {
            var content;
            let partesCorreo = data.split('@');
            content = `<div>${partesCorreo[0]}@<br>${partesCorreo[1]}</div>`;
            return content;
          }
        },
        { "data": "phone" },
        { "data": "dateStart" },
        { "data": "paymentMethod" },
        { "data": "leadpriority" },
        { "data": "dateTime" }
      ]

    });
  }

  var botonEditarVisitante = function (tbody, table) {
    $(tbody).on("click", "button.editar_visitante", function () {

      var data = table.row($(this).parents("tr")).data();
      var nombre_expo = data["first_name"];
      var apellido_expo = data["last_name"];

      document.getElementById("nombreUser").value = nombre_expo;
      document.getElementById("apellidoUser").value = apellido_expo;

      var status = data["is_validated"];
      document.getElementById("status").value = status;

      var id_user = data["id_user"];
      var tipo_user = 5;

      document.getElementById("id_user").value = id_user;
      document.getElementById("tipo_user").value = tipo_user;

    })
  };



  var botonBorrarVisitante = function (tbody, table) {
    $(tbody).on("click", "button.borrar_visitante", function () {

      var data = table.row($(this).parents("tr")).data();
      var id_user = data["id_user"];


      funcionBorrarUsuario(id_user, 5);

    })
  };








  datos_tabla_visitante();
  datos_tabla_visitantesClassEducation_Canada();
  datos_tabla_visitantesClassEducation_Italia();
  datos_tabla_asesor();
  datos_tabla_expositor();
  datos_tabla_organizador();
  datosTablaVendedor();





  $("#formAgregarOrg").on("submit", function (event) {



    event.preventDefault();



    $.ajax({
      type: 'POST',
      url: "../php/user_edit_c.php",
      data: $(this).serialize() + ("&param=agregar_org"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Se le ha enviado un correo al organizador',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".modalAgregarOrg").modal("hide");

        $('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);


        //funcionCalendario();
      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de enviar el correo',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })


  });




  $("#formAgregarExp").on("submit", function (event) {



    event.preventDefault();


    $.ajax({
      type: 'POST',
      url: "../php/user_edit_c.php",
      data: $(this).serialize() + ("&param=agregar_exp"),


      success: function (data) {


        if (data == 12345) {//Puse números porque no me estaba tomando en cuenta los arrays

          valorSelect = document.getElementById("elegir_exp").value;

          emailExp = document.getElementById(valorSelect).title;

          id_stand = document.getElementById("elegir_stand_expo").value;


          $.ajax({
            type: 'POST',
            url: "../email/confirmationEmail.php",
            data: `email=${emailExp}&id_stand=${id_stand}` + "&param=confirm_stand_exh",


            success: function (data) {
              Swal.fire({
                title: 'Misión Cumplida!',
                text: "Se le ha enviado un correo al expositor, espere su confirmación",
                icon: 'success',
                confirmButtonText: 'Ok'
              })

              $(".modal_agregarExp").modal("hide");
              $('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);

            },
            error: function (data) {
              Swal.fire({
                title: 'Error!',
                text: 'Ha ocurrido un error al momento de enviar el correo al expositor',
                icon: 'error',
                confirmButtonText: 'Entendido'
              })

            }
          })


        } else if (data == 54321) {

          emailExp = document.getElementById("agregar_nuevoExp").value;

          $.ajax({
            type: 'POST',
            url: "../email/confirmationEmail.php",
            data: `email=${emailExp}` + "&param=create_exh",


            success: function (data) {

              Swal.fire({
                title: 'Misión Cumplida!',
                text: "Se le ha enviado un correo al nuevo expositor, espere su confirmación",
                icon: 'success',
                confirmButtonText: 'Ok'
              })

              $(".modal_agregarExp").modal("hide");
              $('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);


            },
            error: function () {

              Swal.fire({
                title: 'Error!',
                text: 'Ocurrio un error al momento de enviar el correo',
                icon: 'error',
                confirmButtonText: 'Entendido'
              })

            }
          })

        } else if (data == 666) {

          Swal.fire({
            title: 'Error!',
            text: 'El correo usado ya existe en la base de datos',
            icon: 'error',
            confirmButtonText: 'Ok'
          })


        } else if (data == 777) {
          Swal.fire({
            title: 'Error!',
            text: 'El número telefonico usado ya existe en la base de datos',
            icon: 'error',
            confirmButtonText: 'Ok'
          })
        }


      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de enviar el correo',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })


  });

  $("#formAgregarAsesor").on("submit", function (event) {

    event.preventDefault();


    $.ajax({
      type: 'POST',
      url: "../php/user_edit_c.php",
      data: $(this).serialize() + ("&param=agregar_asesor"),


      success: function (data) {
        if (data == 12345) {

          //se supone que aquí iría un ajax para enviarle un correo al asesor avisandole que fue asignado a un stand
          Swal.fire({
            title: 'Misión Cumplida!',
            text: 'Se han registrado al nuevo asesor con exito',
            icon: 'success',
            confirmButtonText: 'Ok'
          })
          $(".modal_agregarAsesor").modal("hide");
          $('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);

        } else if (data == 54321) {

          emailAse = document.getElementById("agregar_nuevoAsesor").value;

          $.ajax({
            type: 'POST',
            url: "../email/confirmationEmail.php",
            data: `email=${emailAse}` + "&param=create_adv",


            success: function (data) {

              Swal.fire({
                title: 'Misión Cumplida!',
                text: 'Se han enviado un correo al nuevo asesor, espere su confirmación',
                icon: 'success',
                confirmButtonText: 'Ok'
              })

              $(".modal_agregarAsesor").modal("hide");
              $('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);

            },
            error: function () {
              Swal.fire({
                title: 'Error!',
                text: 'Ocurrio un error al momento de enviar el correo',
                icon: 'error',
                confirmButtonText: 'Ok'
              })

            }

          })

        } else if (data == 666) {

          Swal.fire({
            title: 'Error!',
            text: 'El correo usado ya existe en la base de datos',
            icon: 'error',
            confirmButtonText: 'Ok'
          })


        } else if (data == 777) {
          Swal.fire({
            title: 'Error!',
            text: 'El número telefonico usado ya existe en la base de datos',
            icon: 'error',
            confirmButtonText: 'Ok'
          })
        }

      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de enviar el correo',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })


  });




  $("#formAgregarVendedor").on("submit", function (event) {

    event.preventDefault();


    $.ajax({
      type: 'POST',
      url: "../php/user_edit_c.php",
      data: $(this).serialize() + ("&param=agregarVendedor"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Se han registrado al vendedor con exito',
          icon: 'success',
          confirmButtonText: 'Ok'
        })
        $(".modal_agregarVendedor").modal("hide");
        $('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);

      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de registrar el vendedor',
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
      url: "../php/user_edit_c.php",
      data: $(this).serialize() + ("&param=editarUser"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Se han editado los datos del usuario',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".modalEditarExpAse").modal("hide");

        $('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);

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



})
