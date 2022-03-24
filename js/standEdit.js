$(document).ready(function () {

  var curr_stand = "";
  var table;
  var datos_tabla_stand = function () {
      table = $('#tabla_stand').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
      },
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/stand_c.php",
        "data": {
          "param": "stand",
          "id_current_pabe": idFatherPabe
        }
      },
      "columns": [
        { "data": "id_stand" },
        { "data": "name_stand" },
        {
          "data": "status",
          render: function (data, type, row) {
            var content;

            if (data == "En espera") {
              content = `<div class="badge_status bg-warning d-flex justify-content-center">En espera</div>`;

            } else if (data == "Sin Asignar") {

              content = `<div class='d-flex justify-content-center'><button type='button' class='btn bg-success SinAsignar' data-bs-toggle='modal' data-bs-target='.edit-expo_nombre-btn' style='margin:2px''>Sin asignar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </div>`;

            }
            else if (data == "En reserva") {
              content = `<div class='d-flex justify-content-center'><button type='button' class='btn btn-purple btnReservado'  style='margin:2px''>Apartado <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </div>`;

            }
            else if (data == "Confirmado") {
              content = `<div class="badge_status bg-danger d-flex justify-content-center">Confirmado</div>`;

            }
            return content;
          }

        },
        { "data": "type_stand", },
        { "data": "codigo_stand" },
        { "data": "correo_expositor" ,
        render: function (data, type, row) {
          var content;
          let partesCorreo = data.split('@');
          content = `<div>${partesCorreo[0]}@<br>${partesCorreo[1]}</div>`;
          
          return content;
        }
      
      },
        { "data": "nombre_expo" },
        { "data": "apellido_expo" },
        //{ "data": "first_name"},
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar_expositor' style='margin:2px' data-bs-toggle='modal' data-bs-target='.edit-expo-btn '><i class='bx bx-user-check nav_logo-icon'></i></button> </div>" },
        //{ "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar' style='margin:2px' data-bs-toggle='modal' data-bs-target='.edit-stand-btn-central'><i class='bx bx-pencil nav_logo-icon'></i></button> </div>" }
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar' style='margin:2px'><i class='far fa-edit' aria-='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary publi-stand' style='margin:2px'><i class='bx bx-images nav_logo-icon'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button class='btn btn-primary publi-stand' style='margin:2px'><i class='bx bx-images nav_logo-icon'></i></button> </div>" }
        /*{
          "data": "type_stand",
          render: function (data, type, row) {
            var content;

            if (data == "Central") {
              content = "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar' style='margin:2px' data-bs-toggle='modal' data-bs-target='.edit-stand-btn-central'><i class='bx bx-pencil nav_logo-icon'></i></button> </div>"
            }

            else if (data == "Corner M") {
              content = "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar' style='margin:2px' data-bs-toggle='modal' data-bs-target='.edit-stand-btn-corner'><i class='bx bx-pencil nav_logo-icon'></i></button> </div>"
            }

            else if (data == "Full View") {
              content = "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary editar' style='margin:2px' data-bs-toggle='modal' data-bs-target='.edit-stand-btn-full'><i class='bx bx-pencil nav_logo-icon'></i></button> </div>"
            }


            return content;

          }
        }*/
      ]

    });
    ir_stands_publi("#tabla_stand tbody", table);
    botones_editar("#tabla_stand tbody", table);

  }


  $("#poner_nombre_apellido").on("submit", function (event) {

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/stand_c.php",
      data: $(this).serialize() + ("&param=cambiar_nom_ap"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'La información del stand se ha editado con exito!',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        $(".edit-expo_nombre-btn").modal("hide");
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

  $("#editar_info_stand").on("submit", function (event) {

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/stand_c.php",
      data: $(this).serialize() + ("&param=editarDatosStand"),


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'La información del stand se ha editado con exito!',
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
    //si es S en valor del select hace otro ajax 
    let nuevoExposito = document.getElementById("correoExpositor").value;
    if(nuevoExposito == 'S'){

      

      let idStand = document.getElementById("id_stand2").value;
      var elegir_expS = 'S';


      $.ajax({
        type: 'POST',
        url: "../php/user_edit_c.php",
        data: $(this).serialize() + `&elegir_stand_expo=${idStand}&elegir_exp=${elegir_expS}` + ("&param=agregar_exp"),
  
  
        success: function (data) {
          //console.log(data);

          if (data == 54321) {

            alert("Entrando a 54321");

            var emailExp = document.getElementById("correoNuevoExpositor").value;
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
  
                //$(".modal_agregarExp").modal("hide");
                //$('#page_content').load(`user_edit.php?idevent=${idFatherEvent}`);
  
  
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












      $(".edit-expo-btn").modal("hide");
      $('#page_content').load(`stand_edit.php`);

    }else{

  
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
    }


  });

  sendConfirmationEmail = (async (email) => {
    //console.log("expositor");

    $.ajax({
      type: 'POST',
      url: "../email/confirmationEmail.php",
      data: `email=${email}` + "&param=confirm_stand_exh" + (`&id_stand=${curr_stand}`),


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
      }else{
         notyf.open({
          type: 'warning',
            message: '<b>¡ATENCIÓN!</b> Antes de hacer cambios en el stand un expositor debe estar confirmado.'
        });  

      }

    })
   
    $(tbody).on("click", "button.SinAsignar", function () {
      var data = table.row($(this).parents("tr")).data();
      var codigo_stand = data["id_stand"];

      $('#id_stand3').val(codigo_stand);

      

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


    

  var botones_editar = function (tbody, table) {
    $(tbody).on("click", "button.editar_expositor", function () {
      var data = table.row($(this).parents("tr")).data();
      var id_customer_stand = data["id_stand"];
      curr_stand = data["id_stand"];
      $('#id_stand2').val(id_customer_stand);

    })


    $(tbody).on("click", "button.editar", function () {
      var data = table.row($(this).parents("tr")).data();
      var id_customer_stand = data["id_stand"];

      curr_stand = data["id_stand"];

      $('#id_stand').val(id_customer_stand);

      console.log(data['type_stand']);

      var status_actual = data["status"];
      if (status_actual == "Confirmado") {


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

      }else{
         notyf.open({
          type: 'warning',
            message: '<b>¡ATENCIÓN!</b> Antes de hacer cambios en el stand un expositor debe estar confirmado.'
        });  
        
      }

    })


  };

  datos_tabla_stand();

  //$(this).val()
  $('#color_stand_central').on('input',
    function () {
      setCentralStandColor($(this).val());
      $('#span_color_pared_central').text($(this).val());
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
      $('#span_color_pared_corner').text($(this).val());
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
      $('#span_color_pared_full').text($(this).val());
    }
  );


  $('#color_stand_roof_full').on('input',
    function () {
      setStandFullRoofColor($(this).val());
      $('#span_color_techo').text($(this).val());
    }
  );


  $('#tipo_piso_full').on('input',
    function () {
      setFullStandFloor($(this).val());

    }
  );

  /* $('button.execute').click(() => {
     const rgb = hexToRgb($('input.target').val());
     if (rgb.length !== 3) {
       alert('Invalid format!');
       return;
     }
 
     const color = new Color(rgb[0], rgb[1], rgb[2]);
     const solver = new Solver(color);
     const result = solver.solve();
 
     let lossMsg;
     if (result.loss < 1) {
       lossMsg = 'This is a perfect result.';
     } else if (result.loss < 5) {
       lossMsg = 'The is close enough.';
     } else if (result.loss < 15) {
       lossMsg = 'The color is somewhat off. Consider running it again.';
     } else {
       lossMsg = 'The color is extremely off. Run it again!';
     }
 
     $('.realPixel').css('background-color', color.toString());
     $('.filterPixel').attr('style', result.filter);
     $('.filterDetail').text(result.filter);
     $('.lossDetail').html(`Loss: ${result.loss.toFixed(1)}. <b>${lossMsg}</b>`);
   });
   */


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

          //console.log(response);

          $('input[name$="nombre_stand"]').val(response.data[0]['name_stand']);
          $('input[name$="descripcion_stand"]').val(response.data[0]['descripcion']);
          $('#tipo_piso_full').val(response.data[0]['kind_floor']);
          $('#color_stand_full').val(response.data[0]['wall_color']);
          $('#color_stand_roof_full').val(response.data[0]['roof_color']);

          $('#span_color_pared_full').text(response.data[0]['wall_color']);
          $('#span_color_techo').text(response.data[0]['roof_color']);

          setFullStandFloor(response.data[0]['kind_floor']);
          setStandFullColor(response.data[0]['wall_color']);
          setStandFullRoofColor(response.data[0]['roof_color']);

        }

        else if (response.data[0]['type_stand'] == "Central") {

          $('input[name$="nombre_stand"]').val(response.data[0]['name_stand']);
          $('input[name$="descripcion_stand"]').val(response.data[0]['descripcion']);
          $('#tipo_piso_central').val(response.data[0]['kind_floor']);
          $('#color_stand_central').val(response.data[0]['wall_color']);

          $('#span_color_pared_central').text(response.data[0]['wall_color']);

          setCentralStandFloor(response.data[0]['kind_floor']);
          setCentralStandColor(response.data[0]['wall_color']);

        }

        else if (response.data[0]['type_stand'] == "Corner M") {
          //console.log("corner2");

          $('input[name$="nombre_stand"]').val(response.data[0]['name_stand']);
          $('input[name$="descripcion_stand"]').val(response.data[0]['descripcion']);
          $('#tipo_piso_corner').val(response.data[0]['kind_floor']);
          $('#color_stand_corner').val(response.data[0]['wall_color']);

          $('#span_color_pared_corner').text(response.data[0]['wall_color']);

          setCornerStandFloor(response.data[0]['kind_floor']);
          setStandCornerColor(response.data[0]['wall_color']);

        }
      }

    });


  });


  $("#editar_info_stand_full").on("submit", function (event) {

    event.preventDefault();
    //console.log($(this).serialize());
    validateStandEditForm(this);
    $('#modal-edit-full').modal('hide');

  });

  $("#editar_info_stand_central").on("submit", function (event) {

    event.preventDefault();
    //console.log($(this).serialize());
    validateStandEditForm(this);
    $('#modal-edit-central').modal('hide');


  });

  $("#editar_info_stand_corner").on("submit", function (event) {

    event.preventDefault();
    //console.log($(this).serialize());
    validateStandEditForm(this);
    $('#modal-edit-corner').modal('hide');


  });

  validateStandEditForm = (function (form) {

    $.ajax({
      type: 'POST',
      url: "../php/stand_c.php",
      data: $(form).serialize() + ("&param=set_stand_data") + (`&id_stand=${curr_stand}`),

      success: function (data) {

        if (data.toString != 'error') {

          Swal.fire({
            title: 'Misión Cumplida!',
            text: 'Se han actualizado los datos del stand de manera correcta!',
            icon: 'success',
            confirmButtonText: 'Ok'
          })

        } else {

          Swal.fire({
            title: 'Misión Fallida!',
            text: 'Ocurrio un error al momento de actualizar el stand, revisa tus datos.',
            icon: 'error',
            confirmButtonText: 'Ok'
          })


        }
      },
      error: function () {
        Swal.fire({
          title: 'Misión Fallida!',
          text: 'Ocurrio un error al momento de actualizar el stand, contacta con soporte.',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  })

  $('#btn_reload_stands_edit').click( function(){
    table.ajax.reload();
  });

});

//nombre_stand_full=STAND&descripcion_stand_full=dfgdfg&tipo_piso=madera&color_stand=%23ffffff&color_stand_roof=%23e33535









