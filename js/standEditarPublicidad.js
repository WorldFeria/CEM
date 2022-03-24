$(document).ready(function () {

  var datos_tabla_contenidos_stand = function () {
    var table = $('#users_table3').DataTable({
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/standPublicidad_c.php",
        "data": {
          "param": "contenido_stand",
          "codd_stand": idFatherStand2
        }
      },
      "columns": [
        { "data": "codigo_stand" },
        { "data": "tipo_contenido" },
        { "data": "peso_max" },
        { "data": "dimensiones_max" },
        { "data": "formato",
          render: function (data, type, row) {
            var content;
   
            if (data == "image/jpg.image/png.image/jpeg") {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">.JPG .PNG</div>`;

            }else if(data == "video/mp4") {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">.MP4</div>`;

            }
            else if (data == "application/pdf"){
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">.PDF</div>`;
              
            }
            return content;
          }        

        },

        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary btn_subir' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal-edit-pabellon-btn-edit'><i class='fa fa-cloud-upload' aria-hidden='true'></i></button> </div>" },
        { "defaultContent": "<div class='d-flex justify-content-center'><button type='button' class='btn btn-primary btn-vista' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal-ver_imagen' ><i class='fa fa-eye' aria-hidden='true'></i></button> </div>" }

      ]

    });

    btn_popup_archivo("#users_table3 tbody", table);
  }

  $("#recepcion").on("submit", function (event) { 

    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: "../php/recepcion.php",
      data: $(this).serialize() + ("&param=subir_imagen"),


      success: function (data) {

        Swal.fire({
          title: 'Success!',
          text: 'La imagen se ha subido con exito.',
          icon: 'success',
          confirmButtonText: 'Cool'
        })

        datos_tabla_contenidos_stand();

      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de subir la imagen ',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })

  });


  var btn_popup_archivo = function(tbody, table){

    $(tbody).on("click", "button.btn_subir",function(){
      var data = table.row( $(this).parents("tr") ).data();
      var id_customer_stand = data["codigo_stand"];
      var dimensiones_max = data["dimensiones_max"];
      var formato = data["formato"];
      $('#id_stand').val(id_customer_stand);
      $('#id_size').val(dimensiones_max);
      $('#tipo_archivo').val(formato);


    })

};

datos_tabla_contenidos_stand(); 



})