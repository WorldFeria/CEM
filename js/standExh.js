$(document).ready(function () {

  var curr_stand = "";

  var datos_tabla_stand_exh = function () {
    //alert("-> " + email);
    var table = $('#tabla_stand_exh').DataTable({
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/stand_c.php",
        "data": {
          "param": 'stands_exh',
          "emailExh": `${email}`
        }
      },
      "columns": [
        { "data": "id_stand" },
        { "data": "name_stand" },

        { "data": "type_stand", },
        { "data": "codigo_stand" },
        { "data": "correo_expositor" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar_asesores' style='margin:2px' data-bs-toggle='modal' data-bs-target='.edit-adv-btn '><i class='fa fa-eye nav_logo-icon'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary publi-stand' style='margin:2px'><i class='bx bx-columns nav_logo-icon'></i></button> </div>" },
        //{ "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar' style='margin:2px' data-bs-toggle='modal' data-bs-target='.edit-stand-btn-central'><i class='bx bx-pencil nav_logo-icon'></i></button> </div>" }
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar' style='margin:2px'><i class='bx bx-pencil nav_logo-icon'></i></button> </div>" }

      ]

    });
    ir_stands_publi("#tabla_stand_exh tbody", table);
    botones_editar("#tabla_stand_exh tbody", table);
    botones_editar_adv("#tabla_stand_exh tbody", table);

  }


  getUnsetAdv = async () => {

    $('#select_stand_adv') //EMPY SELECT OPTIONS
    .find('option')
    .remove()
    .end();

    $('#select_stand_adv').append($("<option />").val( 'default' ).text( "--SELECCIONAR--" ));

    $.ajax({
      type: 'POST',
      url: "../php/adviser_c.php",
      dataType: 'json',
      data: $(this).serialize() + "&param=getMyUnsetAdv" + `&email=${email}`,

      success: function (response) {

        for(i in response.data){
          console.log( response.data[i]['first_name'] );
          $('#select_stand_adv').append($("<option />").val( response.data[i]['email2'] ).text( response.data[i]['first_name'] + " " + response.data[i]['last_name'] + " | " + response.data[i]['email2'] ));
        }

      },

      error: function (response) {
        console.log(response.data);
      }
    })

  }


  var datos_tabla_asign_adv = function (id_stand) {
    //alert("-> " + id_stand);
    var table = $('#tabla_stand_asigned_adv').DataTable({
      paging: false,
      destroy: true,
      searching: false,
      info: false,
      ajax: {
        "method": "POST",
        "url": "../php/adviser_c.php",
        "data": {
          "param": 'asesoresFromStand',
          "email": `${email}`,
          "id_stand": `${id_stand}`
        }
      },
      "columns": [
        //{ "data": "id_user" },
        { "data": "first_name" },
        { "data": "last_name" },
        { "data": "email2" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-danger unasign_adv' style='margin:2px'><i class='bx bx-pencil nav_logo-icon'></i></button> </div>" }

      ]

    });

    botones_borrar_adv("#tabla_stand_asigned_adv", table);

  }



  $("#form_agregar_expositor").on("submit", function (event) {

    event.preventDefault();
    var email_adv = $('#select_stand_adv').val();

    if (email_adv == 'default') {

      Swal.fire({
        title: 'Ups!',
        text: 'Por favor seleccione un asesor válido.',
        icon: 'warning',
        confirmButtonText: 'Ok'
      })


    } else {
      //console.log(email_adv + ' | ' + curr_stand);

      $.ajax({
        type: 'POST',
        url: "../php/stand_c.php",
        data: $(this).serialize() + "&param=add_adv" + `&email=${email_adv}` + `&id_stand=${curr_stand}`,

        success: function (data) {

          if (data != 'error') {

            Swal.fire({
              title: 'Misión Cumplida!',
              text: 'El asesor ha sido asignado a este stand con éxito!',
              icon: 'success',
              confirmButtonText: 'Ok'
            })

            $("#modalAddAdv").modal("hide");
            $('#page_content').load(`standsExh.php`);

          } else {

            Swal.fire({
              title: 'Error!',
              text: 'Este asesor no pudo ser asignado: ' + data,
              icon: 'error',
              confirmButtonText: 'Ok'
            })

          }

        },

        error: function (data) {
          Swal.fire({
            title: 'Error!',
            text: 'Ocurrio un error al momento de asignar al asesor: ' + data,
            icon: 'error',
            confirmButtonText: 'Ok'
          })

        }
      })

    }


  });



  $("#editar_info_stand").on("submit", function (event) {

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/stand_c.php",
      data: $(this).serialize() + ("&param=editarDatosStand"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'La información del stand se ha editado con éxito!',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".edit-stand-btn").modal("hide");
        $('#page_content').load(`stand_edit.php`);

      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de editar la información del stand',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  });


  $("#cambiar_expositor").on("submit", function (event) {

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/stand_c.php",
      data: $(this).serialize() + ("&param=editarExpositor"),


      success: function (data) {

        sendConfirmationEmail($('#inputState').val());

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Se ha asignado a un expositor para este stand, se le enviará un correo de confirmación al expositor seleccionado!.',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".edit-expo-btn").modal("hide");
        $('#page_content').load(`stand_edit.php`);
      },
      error: function () {
        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Ocurrio un error al momento cambiar al expositor.',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })


  });

  sendConfirmationEmail = (async (email) => {

    $.ajax({
      type: 'POST',
      url: "../email/confirmationEmail.php",
      data: `email=${email}` + "&param=confirm_stand_exh",


      success: function (data) {
        //console.log(data);
        if (data == "Email has NOT been sended") {
          Swal.fire({
            title: 'Error!',
            text: "No se ha concretado el envío del correo, por favor contacte con soporte " + data,
            icon: 'error',
            confirmButtonText: 'Entendido'
          })
        }

      },
      error: function (data) {

        Swal.fire({
          title: 'Error!',
          text: data,
          icon: 'error',
          confirmButtonText: 'Entendido'
        })

      }
    })


  });



  var ir_stands_publi = function (tbody, table) {
    $(tbody).on("click", "button.publi-stand", function () {
      var data = table.row($(this).parents("tr")).data();

      var status_actual = data["status"];
      var ID_STANDX = data["id_stand"];
      if (status_actual == "Confirmado") {

        var codigo_stand = data["codigo_stand"];
        if (codigo_stand.includes("CC") == true) {

          $('#page_content').load(`tabla_stand_pub_CC.php?cod_stand=${ID_STANDX}`);

        }
        else if (codigo_stand.includes("CM") == true) {

          $('#page_content').load(`tabla_stand_pub_CM.php?cod_stand=${ID_STANDX}`);

        }
        else if (codigo_stand.includes("FA") == true) {

          $('#page_content').load(`tabla_stand_pub_FA.php?cod_stand=${ID_STANDX}`);

        }
      }

    })
    $(tbody).on("click", "button.SinAsignar", function () {
      var data = table.row($(this).parents("tr")).data();
      var codigo_stand = data["id_stand"];


      $.ajax({
        type: 'POST',
        url: "../php/stand_c.php",
        data: (`id_a_cambiar=${codigo_stand}`) + (`&param=cambiar_status_reservado`)
      })
      $('#page_content').load(`stand_edit.php`);

    });




    $(tbody).on("click", "button.btnReservado", function () {
      var data = table.row($(this).parents("tr")).data();
      var codigo_stand = data["id_stand"];

      $.ajax({
        type: 'POST',
        url: "../php/stand_c.php",
        data: (`id_a_cambiar=${codigo_stand}`) + ("&param=cambiar_status_Sin")
      })

      $('#page_content').load(`stand_edit.php`);
    });


  };


  var botones_borrar_adv = function (tbody, table) {

    $(tbody).on("click", "button.unasign_adv", function () {

      var data = table.row($(this).parents("tr")).data();
      var emaiAdv = data["email2"];

      chooseWindow('Remover asesor', 'Esta seguro de que desea remover a este asesor del stand?', removeAdv, emaiAdv);

    })

  }

  var removeAdv = function (emailAdv) {

    $.ajax({
      type: 'POST',
      url: "../php/stand_c.php",
      data: $(this).serialize() + "&param=remove_adv" + `&email=${emailAdv}` + `&id_stand=${curr_stand}`,

      success: function (data) {

        if (data != 'error') {

          Swal.fire({
            title: 'Misión Cumplida!',
            text: 'El asesor ha sido desvinculado este stand con éxito!',
            icon: 'success',
            confirmButtonText: 'Ok'
          })

          $("#modalAddAdv").modal("hide");
          $('#page_content').load(`standsExh.php`);

        } else {

          Swal.fire({
            title: 'Error!',
            text: 'Este asesor no pudo ser desvinculado: ' + data,
            icon: 'error',
            confirmButtonText: 'Ok'
          })

        }

      },

      error: function (data) {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de asignar al asesor: ' + data,
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  }

  var chooseWindow = async (title, text, fun, arg) => {

    Swal.fire({
      title: title,
      text: text,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2ECC71',
      cancelButtonColor: '#EC7063',
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar'

    }).then((result) => {
      if (result.isConfirmed) {
        /*Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )*/

        fun(arg);

      } else {

      }
    })



  }


  var botones_editar_adv = function (tbody, table) {

    $(tbody).on("click", "button.editar_asesores", function () {

      var data = table.row($(this).parents("tr")).data();
      var stand_name = data["name_stand"];

      curr_stand = data["id_stand"];

      $('#lbl_stand_name').text(stand_name);
      datos_tabla_asign_adv(data["id_stand"]);
      getUnsetAdv();
    })
  }


  var botones_editar = function (tbody, table) {


    $(tbody).on("click", "button.editar", function () {
      var data = table.row($(this).parents("tr")).data();
      var id_customer_stand = data["id_stand"];

      curr_stand = data["id_stand"];

      $('#id_stand').val(id_customer_stand);

      console.log(data['type_stand']);

      if (data['type_stand'] == "Central") {
        console.log("central");
        $('#modal-edit-central').modal('show');
      }

      else if (data['type_stand'] == "Corner M") {
        console.log("corner");
        $('#modal-edit-corner').modal('show');
      }

      else if (data['type_stand'] == "Full View" || data['type_stand'] == "Full Access") {
        console.log("full");
        $('#modal-edit-full').modal('show');
      }

      getStandData(id_customer_stand);

    })


  };

  datos_tabla_stand_exh();



  //$(this).val()
  $('#color_stand_central').on('input',
    function () {
      setStandCentralColor($(this).val());
    }
  );


  $('#tipo_piso_central').on('input',
    function () {
      setCentralStandFloor($(this).val());
    }
  );



  $('#color_stand_corner').on('input',
    function () {
      setStandCornerColor($(this).val());
    }
  );


  $('#tipo_piso_corner').on('input',
    function () {
      setCornerStandFloor($(this).val());

    }
  );



  $('#color_stand_full').on('input',
    function () {
      setStandFullColor($(this).val());
    }
  );


  $('#color_stand_roof_full').on('input',
    function () {
      setStandFullRoofColor($(this).val());
    }
  );


  $('#tipo_piso_full').on('input',
    function () {
      setFullStandFloor($(this).val());

    }
  );


});


setStandFullColor = (function (hex) {

  const rgb = hexToRgb(hex);
  if (rgb.length !== 3) {
    alert('Invalid format!');
    return;
  }

  const color = new Color(rgb[0], rgb[1], rgb[2]);
  const solver = new Solver(color);
  const result = solver.solve();


  var filterVal = solver.custom_solve();

  document.getElementById("stand_body_preview_full").style.filter = (filterVal);
  document.getElementById("stand_body_preview_full_2").style.filter = (filterVal);

})


setStandFullRoofColor = (function (hex) {

  const rgb = hexToRgb(hex);
  if (rgb.length !== 3) {
    alert('Invalid format!');
    return;
  }

  const color = new Color(rgb[0], rgb[1], rgb[2]);
  const solver = new Solver(color);
  const result = solver.solve();


  var filterVal = solver.custom_solve();

  document.getElementById("stand_roof_preview_full").style.filter = (filterVal);
  document.getElementById("stand_roof_preview_full_2").style.filter = (filterVal);
})


setStandCornerColor = (function (hex) {

  const rgb = hexToRgb(hex);
  if (rgb.length !== 3) {
    alert('Invalid format!');
    return;
  }

  const color = new Color(rgb[0], rgb[1], rgb[2]);
  const solver = new Solver(color);
  const result = solver.solve();


  var filterVal = solver.custom_solve();

  document.getElementById("stand_body_preview_corner").style.filter = (filterVal);

})


setCentralStandColor = (function (hex) {

  const rgb = hexToRgb(hex);
  if (rgb.length !== 3) {
    alert('Invalid format!');
    return;
  }

  const color = new Color(rgb[0], rgb[1], rgb[2]);
  const solver = new Solver(color);
  const result = solver.solve();


  var filterVal = solver.custom_solve();

  document.getElementById("stand_body_preview_central").style.filter = (filterVal);

})

setCentralStandFloor = (function (floor) {

  switch (floor) {
    case "madera":
      $("#stand_floor_preview_central").attr("src", "../assets/stands/central/Pisos/Piso_Central_Madera.png");
      break;

    case "alfombra":
      $("#stand_floor_preview_central").attr("src", "../assets/stands/central/Pisos/Piso_Central_Alfombra.png");
      break;

    case "laminado":
      $("#stand_floor_preview_central").attr("src", "../assets/stands/central/Pisos/Piso_Central_Laminado.png");
      break;
  }

})

setFullStandFloor = (function (floor) {
  switch (floor) {
    case "madera":
      $("#stand_floor_preview_full").attr("src", "../assets/stands/fullaccess/Vista_1/Piso/Piso_FA_V1_Madera.png");
      $("#stand_floor_preview_full_2").attr("src", "../assets/stands/fullaccess/Vista_2/Piso/Piso_FA_V2_Madera.png");
      break;

    case "alfombra":
      $("#stand_floor_preview_full").attr("src", "../assets/stands/fullaccess/Vista_1/Piso/Piso_FA_V1_Alfombra.png");
      $("#stand_floor_preview_full_2").attr("src", "../assets/stands/fullaccess/Vista_2/Piso/Piso_FA_V2_Alfombra.png");
      break;

    case "laminado":
      $("#stand_floor_preview_full").attr("src", "../assets/stands/fullaccess/Vista_1/Piso/Piso_FA_V1_Laminado.png");
      $("#stand_floor_preview_full_2").attr("src", "../assets/stands/fullaccess/Vista_2/Piso/Piso_FA_V2_Laminado.png");
      break;
  }
})

setCornerStandFloor = (function (floor) {
  switch (floor) {
    case "madera":
      $("#stand_floor_preview_corner").attr("src", "../assets/stands/corner/Piso/Piso_CornerMz_Madera.png");
      break;

    case "alfombra":
      $("#stand_floor_preview_corner").attr("src", "../assets/stands/corner/Piso/Piso_CornerMz_Alfombra.png");
      break;

    case "laminado":
      $("#stand_floor_preview_corner").attr("src", "../assets/stands/corner/Piso/Piso_CornerMz_Laminado.png");
      break;
  }
})


getStandData = (async (standId) => {

  await $.ajax({    //create an ajax request to chart.php

    type: "POST",
    url: "../php/stand_c.php",
    data: {
      "param": "get_stand_data",
      "id_stand": standId,
    },
    dataType: "json",   //expect html to be returned                
    success: function (response) {


      if (response.data[0]['type_stand'] == "Full Access" || response.data[0]['type_stand'] == "Full View") {

        console.log(response);

        $('input[name$="nombre_stand_full"]').val(response.data[0]['name_stand']);
        $('input[name$="descripcion_stand_full"]').val(response.data[0]['descripcion']);
        $('#tipo_piso_full').val(response.data[0]['kind_floor']);
        $('#color_stand_full').val(response.data[0]['wall_color']);
        $('#color_stand_roof_full').val(response.data[0]['roof_color']);

        setFullStandFloor(response.data[0]['kind_floor']);
        setStandFullColor(response.data[0]['wall_color']);
        setStandFullRoofColor(response.data[0]['roof_color']);

      }

      else if (response.data[0]['type_stand'] == "Central") {

        $('input[name$="nombre_stand_central"]').val(response.data[0]['name_stand']);
        $('input[name$="descripcion_stand_central"]').val(response.data[0]['descripcion']);
        $('#tipo_piso_central').val(response.data[0]['kind_floor']).change();
        $('#color_stand_central').val(response.data[0]['wall_color']);

        setCentralStandFloor(response.data[0]['kind_floor']);
        setStandCentralColor(response.data[0]['wall_color']);

      }

      else if (response.data['type_stand'] == "Corner M") {

        $('input[name$="nombre_stand_corner"]').val(response.data[0]['name_stand']);
        $('input[name$="descripcion_stand_corner"]').val(response.data[0]['descripcion']);
        $('#tipo_piso_corner').val(response.data[0]['kind_floor']).change();
        $('#color_stand_corner').val(response.data[0]['wall_color']);

        setCornerStandFloor(response.data[0]['kind_floor']);
        setStandCornerColor(response.data[0]['wall_color']);

      }
    }

  });


});


$("#editar_info_stand_central").on("submit", function (event) {

  event.preventDefault();
  console.log($(this).serialize());

  $.ajax({
    type: 'POST',
    url: "../php/stand_c.php",
    data: $(this).serialize() + ("&param=set_stand_data") + (`&id_stand=${curr_stand}`),

    success: function (data) {

      sendConfirmationEmail($('#inputState').val());

      Swal.fire({
        title: 'Misión Cumplida!',
        text: 'Se han actualizado los datos del stand de manera correcta!',
        icon: 'success',
        confirmButtonText: 'Ok'
      })

      //$(".edit-expo-btn").modal("hide");
      //$('#page_content').load(`stand_edit.php`);
    },
    error: function () {
      Swal.fire({
        title: 'Misión Fallida!',
        text: 'Ocurrio un error al momento cambiar al expositor.',
        icon: 'error',
        confirmButtonText: 'Ok'
      })

    }
  })


});






