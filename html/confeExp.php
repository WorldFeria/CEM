<link rel="stylesheet" href="../css/notyf/notyf.min.css"></link>
<link rel="stylesheet" href="../css/lead_styles.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/confe__Exp.js"></script>

<div class="main_container">

    <div data-aos="zoom-in-down">
        <h2 class="text-center">Mis conferencias</h2>
    </div>

    <div class="d-flex justify-content-center" data-aos="zoom-in">


        <button id="btn_reload_advisers" class="btn btn-success" style="margin: 2px;">
            Recargar
            <i class='fa fa-refresh align-middle'></i>
        </button>

        <script>
            if(idRol != 3){
            
              $('#btn_modal_new_adviser').hide();

            }else{
              
                
            }
        </script>
        
    </div>
    
    <br>

    <div class="card" style="padding: 18px;" data-aos="zoom-out-down">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless " id="advisers_table" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">Nombre<br>Conferencia</th>
                        <th scope="col">Hora de inicio</th>
                        <th scope="col">Hora de cierre</th>
                        <th scope="col">Día</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Vista<br>Previa</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


 

</div>




<div class=" modal fade modalVistaPrevia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog "role="document">
    <div class="modal-content"> 

        <div class="row modal-header " >
                <h5 class="modal-title col-9">Vista previa</h5>
                <button type="button" class="col-3 btn-close" data-bs-dismiss="modal" style="float: right;"></button>


                <div class="col-12  embed-responsive embed-responsive-21by9">
                    <iframe id="iframeIdVideo" class="embed-responsive-item" src=""   width="100%" height="100%" ></iframe>
                </div>

                <div>
                            <button onclick="botonBorrarVideo()" type="button" id="borrarArchivo" class="btn btn-danger borrarArchivo" >
                                Borrar <i class='fa fa-trash-o' aria-='true'></i>

                            </button>
                            <button hidden onclick="asdasdas()" id="subirArchivo" type='button' class='btn btn-primary subirArchivoClass' style='margin:2px; float:right;' data-bs-toggle='modal' data-bs-target='.modalSubirVideo'>
                                Subir <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

        </div>
    </div>
  </div>
</div>


<script>


var botonBorrarVideo = function(){
    funcionBorrarVideo(document.getElementById("nombre_conf").value);
                          
};

var funcionBorrarVideo = function(confe){
    $.ajax({
      type: 'POST',
      url: "../php/horarios_auditorio.php",
      data: {
                  "param": "borrarVideo",
                  "nombre_conf": confe

              },


      success: function (data) {

        Swal.fire({
          title: 'Misión Cumplida!',
          text: 'Se ha borrado el video',
          icon: 'success',
          confirmButtonText: 'Ok'
        })

        
        $('.modalVistaPrevia').modal('hide');
        //funcionCalendario();
        $('#page_content').load(`confeExp.php`);
      },
      error: function () {
        Swal.fire({
          title: 'Error!',
          text: 'Ocurrio un error al momento de borrar el video',
          icon: 'error',
          confirmButtonText: 'Ok'
        })

      }
    })
 };
</script>


<div class="modal fade modalSubirVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir archivo </h5>
                    </div>
                    <div>
                        <div id="respuesta_video"></div>
                        <form id="formularioVideo" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
  
                
                                    <input hidden type="text" name="ubicacion_archivo"  class="form-control " id="ubicacion_archivo" value="" >   
                                    <input hidden type="text" name="nombre_conf"  class="form-control " id="nombre_conf" value="" >   
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Video</label>
                                                <input type="file" name="videoConfe2" id="videoConfe2" accept="video/mp4">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="uploadbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El video debe ser del tipo .mp4 y no pesar más de 100 MB</small>
                                        </div>
                                    </td>
                                   
                                </tr>

                            </table>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




<script>
    AOS.init();
</script>