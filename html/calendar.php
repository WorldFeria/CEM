<?php

$id_evento = $_GET['id_evento'];
$tipoAudiorio = $_GET['tipoAudiorio'];
$n_refresh = $_GET['n_refresh']; 


include("../config/config.php");


$query = "SELECT id_auditorio from auditorio where id_evento = '$id_evento' and codigo_auditorio = '$tipoAudiorio';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}

$id_auditorio = $array["data"][0]["id_auditorio"];
$array = null;

$query = "SELECT direccion_padre from auditorio where codigo_auditorio = 'AA';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}

$ubicacion_archivo = $array["data"][0]["direccion_padre"];

$ubicacion_archivo = $ubicacion_archivo.'/'.$tipoAudiorio.'/'.'Conferencias/';


$array = null;


$query = "SELECT horario_inicio , horario_cierre , fecha_inicio , fecha_cierre from evento where id_evento = '$id_evento';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}

$horario_inicio = $array["data"][0]["horario_inicio"];
$horario_cierre = $array["data"][0]["horario_cierre"];
$fecha_inicio = $array["data"][0]["fecha_inicio"];
$fecha_cierre = $array["data"][0]["fecha_cierre"];



$array = null;
$query = "SELECT * from user where id_rol2 = 3 AND `is_validated` = true;";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}


?>


<link rel="stylesheet" href="../css/lead_styles.css">

<div class="obtener_id_evento" id="<?php echo $id_evento ?>"></div>
<div class="obtener_id_auditorio" id="<?php echo $id_auditorio ?>"></div>
<div class="obtener_tipo_auditorio" id="<?php echo $tipoAudiorio ?>"></div>
<div class="obtener_n_refresh" id="<?php echo $n_refresh ?>"></div>



<script type="text/javascript">

document.getElementById('nombre_conf').addEventListener('input', function() {
    campo = event.target;
    if(campo.value.length > 0){
               
        $("#videoConfe").removeAttr("disabled");

    }else{
        $("#videoConfe").attr("disabled", "true");

    }

});

function archivoSubido(){
    let barra = document.getElementById("uploadbar");
    if(barra.ariaValueNow == "100.00"){
        $("#botonGuardarConferencia").removeAttr("disabled");
    }  
}
function empezandoASubir(){
    $("#botonGuardarConferencia").attr("disabled", "true");
    $("#nombre_conf").attr("readonly", "");
}


function nuevoConfe(){
    let select = document.getElementById("idSelectConfe");
    if(select.value == 'new'){
        $('#new_adv_modal').modal('show'); // abrir

    }
}

function cancelarCreacionConferencista(){
    
    document.getElementById("idSelectConfe").value = "";

}



function mostrarSubida(){
    $("#divSubidaArchivos").removeAttr("hidden");
    $("#videoConfe").attr("required", "");

    let barra = document.getElementById("uploadbar");


    if(barra.ariaValueNow == "100.00"){

        $("#botonGuardarConferencia").removeAttr("disabled");
    }

    //btn-secondary


}
function ocultarSubida(){

    $("#divSubidaArchivos").attr("hidden", "");
    $("#videoConfe").removeAttr("required");
    $("#botonGuardarConferencia").removeAttr("disabled");

}



var funcion_eliminar = function () {

    Swal.fire({
                title: 'Misión Cumplida!',
                text: 'La conferencia se ha borrado con éxito!',
                icon: 'success',
                confirmButtonText: 'Ok'
              })
    $("#modal_editar_horario").modal("hide");
    $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipoAudiorio}&n_refresh=${2}`);
            


    $("#btn_borrar_conf").attr("value","1");
}




var id_auditorio = $('.obtener_id_auditorio').attr('id');

var id_evento = $('.obtener_id_evento').attr('id');


var tipoAudiorio = $('.obtener_tipo_auditorio').attr('id');

var n_refresh = $('.obtener_n_refresh').attr('id');

for (var i = 0; i < n_refresh; i++) {

    $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipoAudiorio}&n_refresh=${n_refresh-1}`);
    
}


if (idRol == 1) {
    $('.regreso-evento').click(function () {
        $('#page_content').load(`eventAdmin.php`);

    });       
    $('.regreso-espacios').click(function () {
        $('#page_content').load(`event_editAdmin.php?idevent=${id_evento}`);

    });

 

}else if (idRol == 2) {

    //Botones Back & Reload

    $('.regreso-espacios').click(function () {
        $('#page_content').load(`event_edit.php?idevent=${id_evento}`);

    });

    $('.regreso-evento').click(function () {
        $('#page_content').load(`event.php`);

    });    

}

    $('#reload').click(function () {
        $('#page_content').load(`calendar.php?id_evento=${id_evento}&tipoAudiorio=${tipoAudiorio}&n_refresh=${0}`);
    });

</script>






<!-- Tabla Publicidad -->
<div class="main_container">

    <div style="text-align: center; ">
        <h2 style="margin: 20px">Conferencias del Auditorio <?php echo $tipoAudiorio;  ?> </h2>
    </div>

    <div class="d-flex justify-content-center ">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".modal_agregar_horario">
            Agregar Conferencia <i class='fa fa-plus-circle align-middle'></i>
        </button>
    </div><br>

    <div style="float: left;">
        <button type="button" class="btn btn-primary regreso-evento">Eventos</button>
        /
        <button type="button" class="btn btn-primary regreso-espacios">Espacios</button>

            <button id="reload" class="btn btn-success"  style="margin-left: 390px;  float: right;" >
                Refresh
                <i class='fa fa-refresh align-middle'></i>
            </button>

    </div>
    <br>
    <br>

    <div id="calendar" class="card"></div>

</div>





<div class=" modal fade modal_agregar_horario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content"> 

        <div class="modal-header" >

            <form id="crear_conferencia">
              <div class=" was-validated">
                
                    <table  width = "450" cellspacing = "4" cellpadding = "5">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>
                        
                        <thead >
                            <h4> Agregar Conferencia: </h4>
                        </thead>
                            

                                <input hidden type="text" name="ubicacion_archivo" value="<?php echo $ubicacion_archivo ?>">

                                <td >
                                    <input hidden type="text" name="id_auditorio" value="<?php echo $id_auditorio ?>" id="nombre_evento_edit">
                                </td>

                        <tbody>
                            <tr class=" row">
                                <td class="col-12">

                                    <label for="nombre_conf">Nombre de la Conferencia</label>
                                    <input required type="text" name="nombre_conf"  class="form-control " id="nombre_conf" value="" >

                                </td> 
                           
                            
                            </tr>
 


                            <tr class=" row">
                                <td class="col-6">


                                    <label for="dia_evento">Día de la conferencia: </label>
                                    <input max="<?php echo $fecha_cierre  ?>" min="<?php echo $fecha_inicio ?>" required value="" type="date" name="dia_evento" class="form-control" id="dia_inicio">
                                </td>
                                    <td class="col-6">
                                        <label for="inputState">Conferencista:</label>
                                        <select onchange = "nuevoConfe()" name="id_expositor" id="idSelectConfe" class="form-control custom-select" required>
                                            <option value="" selected>--Sin conferencista--</option>
                                            <option value="new" id="optNewConfer" >--Nuevo conferencista--</option>
                                            <!-- <option value="00" >Sin expositor</option> -->

                                            <?php
                                            for ($i = 0; $i < sizeof($array["data"]); $i++) {

                                            ?>

                                                <option id="<?php echo ($array["data"][$i]["id_user"]);?>" value="<?php echo ($array["data"][$i]["id_user"]);?>">
                                                    <?php echo ($array["data"][$i]["first_name"] . " " . $array["data"][$i]["last_name"] . " : " . $array["data"][$i]["email"]); ?>

                                                </option>

                                            <?php
                                            }
                                            mysqli_free_result($res);
                                            mysqli_close($con);
                                            ?>

                                        </select>
                                    </td>  
                            </tr>
                           
                            <tr class=" row">
                                <td class="col-6">
                                    <label for="hora_inicio">Hora de inicio:</label>
                                    <input max="<?php echo $horario_cierre ?>" min="<?php echo $horario_inicio ?>"  type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>

                                </td>
                                <td class="col-6">
                                    <label for="hora_inicio">Hora de Cierre:</label>
                                    <input max="<?php echo $horario_cierre ?>" min="<?php echo $horario_inicio ?>" type="time" name="hora_cierre" id="hora_cierre" class="form-control" required>

                                </td>
                            </tr> 

                            <tr class=" row">
                                <td class="col-4">
                                    
                                    <input  onclick = "mostrarSubida()" name="tipoConferencia" type="radio" value="preGrabada"  id = "preGrabado" checked="checked"/>
                                    <label class="custom-control-label" for="preGrabado">Pre-grabado</label>


                                </td>
                                <td class="col-6">

                                
                                
                               <!-- <input name = "archivoSubido" id="" type = "text" required>-->

                                <div id ="divSubidaArchivos">
                                    <input disabled="true" id="videoConfe" type="file" name="videoConfe"  accept="video/mp4" >
                                    <div class="progress" style="height: 6px; margin:5px 0;">
                                        <div  id="uploadbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                </td>
                            </tr>
                            <tr class=" row">
                                <td class="col-6">
                                    <input onclick = "ocultarSubida()" name="tipoConferencia" type="radio" value="enVivo" id = "live"  />
                                    <label class="custom-control-label" for="live"  >Live</label>
                                </td>
                            </tr>


                        </tbody>    
                    </table>
                    <br>
                    <div >
                        <button type="button" class="btn  btn-danger" data-bs-dismiss="modal" >Cancelar</button>
                        
                        <button id="botonGuardarConferencia" name="agregar_datos_btn"type="submit"   class="btn btn-primary  boton-guardar-info" style="float: right;">    Guardar Cambios
                        </button>
                        
                    </div>
                </div>
             
            </form>               
        </div>
    </div>
  </div>
</div>

<div class=" modal fade " id="modal_editar_horario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content"> 

        <div class="modal-header" >

            <form id="editar_conferencia">
              <div class=" was-validated">
                
                    <table  width = "450" cellspacing = "4" cellpadding = "5">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>
                        
                        <thead >
                            <h4> Editar Conferencia: </h4>
                        </thead>

                                <td>
                                    <input hidden type="text" name="id_auditorio" value="<?php echo $id_auditorio ?>" id="nombre_evento_edit">
                                    <input hidden type="text" name="nombre_confAntigua" value="" id="nombre_confAntigua">
                                    <input hidden type="text" name="ubicacion_archivo" value="<?php echo $ubicacion_archivo ?>" id="ubicacion_archivo">
                                    

                                
                                </td>

                        <tbody>
                            <input hidden type="text"  name="id_horario" value="" id="id_horario" readonly>

                            <tr>
                                <td>

                                    <label for="nombre_conf">Nombre de la Conferencia</label>
                                    <input required type="text" name="nombre_conf"  class="form-control " id="nombre_conf_edit" value="" >

                                </td> 
                           
                            
                            </tr>
 


                            <tr>
                                <td>

                                    <label for="dia_evento">Día de la conferencia: </label>
                                    <input max="<?php echo $fecha_cierre  ?>" min="<?php echo $fecha_inicio ?>" required value="" type="date" name="dia_evento" class="form-control" id="dia_inicio_edit">
                                </td>
                                    <td>
                                        <label for="expositor_edit">Conferencista:</label>
                                        <select name="id_expositor" id="expositor_edit" class="form-control custom-select" required>
                                            <option value="" selected>--Sin conferencista--</option>
                                            <!-- <option value="00" >Sin expositor</option> -->

                                            <?php
                                            for ($i = 0; $i < sizeof($array["data"]); $i++) {

                                            ?>

                                                <option value="<?php echo ($array["data"][$i]["id_user"]); ?>">
                                                    <?php echo ($array["data"][$i]["first_name"] . " " . $array["data"][$i]["last_name"] . " : " . $array["data"][$i]["email"]); ?>

                                                </option>

                                            <?php
                                            }
                                            mysqli_free_result($res);
                                            mysqli_close($con);
                                            ?>

                                        </select>
                                    </td>  
                            </tr>
                           
                            <tr>
                                <td>
                                    <label for="hora_inicio">Hora de inicio:</label>
                                    <input max="<?php echo $horario_cierre ?>" min="<?php echo $horario_inicio ?>"  type="time" name="hora_inicio" id="hora_inicio_edit" class="form-control" required>

                                </td>
                                <td>
                                    <label for="hora_inicio">Hora de Cierre:</label>
                                    <input max="<?php echo $horario_cierre ?>" min="<?php echo $horario_inicio ?>" type="time" name="hora_cierre" id="hora_cierre_edit" class="form-control" required>

                                </td>
                            </tr> 


                        </tbody>    
                    </table>
                    <br>
                    <div >
                        <button type="button" class="btn  btn-danger" data-bs-dismiss="modal" >Cancelar</button>

                        <button name="agregar_datos_btn" type="submit"class="btn btn-primary boton-guardar-info" style="float: right; ">    Guardar Cambios
                        </button>


                        <input hidden type="text"  name="borrar_conf" value="0" id="btn_borrar_conf" readonly>

                        <button onclick="funcion_eliminar()"   type="submit" class="btn btn-danger " style="float: right; margin-right: 5px;">    Borrar
                        </button>

                        
                    </div>
                </div>
             
            </form>               
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="new_adv_modal" tabindex="-1" aria-labelledby="new_adv_modal" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Conferencista/Expositor</h5>
                    <button onclick="cancelarCreacionConferencista()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form id="formNewConferencista">

                        <input type = "text" name="eventoId" value="<?php echo $id_evento ?>" >

                        <div class="mb-3">
                            <label  class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="in_new_adv_firstname" name="firstname" placeholder="Nombre" pattern="^[a-zA-Z]{3,}" required>
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="in_new_adv_lastname" name="lastname" placeholder="Apellido" pattern="^[a-zA-Z]{3,}" required>
                            
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="in_new_adv_cellphone" name="cellphone" placeholder="5712345678" pattern="^[0-9]{10}" required>
                            
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Dirección email</label>
                            <input type="email"  class="form-control" id="emailConferencista" name="email" placeholder="example@example.com" required>
                            
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="cancelarCreacionConferencista()" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button submit" class="btn btn-primary">Invitar Conferencista</button>
                        </div>
                        
                    </form>


                </div>

            </div>
        </div>
    </div>

<script src="calendarJS.js"></script>
