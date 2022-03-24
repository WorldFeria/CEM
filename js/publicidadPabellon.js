$(document).ready(function () {

  var datos_tabla_contenidos_pabellon = function () {
    var table = $('#users_table3').DataTable({
      "destroy": true,
      "ajax": {
        "method": "POST",
        "url": "../php/publicidadPabellon_c.php",
        "data": {
          "param": "contenido_pabellon",
          "llave_id_pabellonx" : var_id_pabellon_padre
        }
      },
      "columns": [
        { "data": "id_padre" },
        { "data": "tipo_publicidad" },
        { "data": "peso_max" },
        { "data": "dimensiones_max" },
        { "data": "formato",
          render: function (data, type, row) {
            var content;
   
            if (data == "image/jpg.image/png.image/jpeg") {
              content = `<div class="badge_status SUCCESS d-flex justify-content-center">.JPG .PNG</div>`;

            }else{
              content = `<div class="badge_status  d-flex justify-content-center">-----</div>`;

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

datos_tabla_contenidos_pabellon(); 



})