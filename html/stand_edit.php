<?php
error_reporting(0);
$id_pabe = $_GET['PABE'];


include("../config/config.php");


$query = "SELECT id_evento from pabellon where id_pabellon = '$id_pabe';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}

$id_evento = $array["data"][0]["id_evento"];


$array = null;
$query = "SELECT * from user where id_rol2 = 3 AND `is_validated` = true;";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$query = "SELECT nombre_pabellon from pabellon where id_pabellon = '$id_pabe';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array1["data"][] = $data;
}
$nombre_pabellon = $array1["data"][0]["nombre_pabellon"];




$query = "SELECT * from user where id_rol2 = 8;";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array3["data"][] = $data;
}

?>


<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/notyf/notyf.min.js"></script>

<div class="obtener_id_evento" id="<?php echo $id_evento ?>"></div>

<div class=""></div>

<script type="text/javascript">

$("#nuevoExpositorForm").on("submit", function (event) {
    event.preventDefault();

    
    let nombre =  document.getElementById("in_new_adv_firstname").value;
    let apellido = document.getElementById("in_new_adv_lastname").value;
    let cell =  document.getElementById("in_new_adv_cellphone").value;
    let email = document.getElementById("in_new_adv_email").value;   

    document.getElementById("nombreNuevoExpositor").value = nombre;
    document.getElementById("apellidoNuevoExpositor").value = apellido;
    document.getElementById("telefonoNuevoExpositor").value = cell;
    document.getElementById("correoNuevoExpositor").value = email;    

    $('#nuevoExpoModal').modal('hide'); // abrir
    
});    





function verificarFormulario(){

    let expositor = document.getElementById("correoExpositor").value;
    let vendedor = document.getElementById("correoVendedor").value;

    if (expositor != "0" && vendedor != "0" ) {

        $("#agregarBtn").removeAttr("hidden");

    }else{

        $("#agregarBtn").attr("hidden","");
    }

    if(expositor == 'S'){
        $('#nuevoExpoModal').modal('show'); // abrir
        
    }

}












    var idFatherPabe = <?php echo $id_pabe ?>;

    var id_evento = $('.obtener_id_evento').attr('id');

    if (idRol == 1) {

        $('.boton-regreso-evento').click(function () {
            $('#page_content').load(`eventAdmin.php`);

        });       
        $('.boton-regreso-espacios').click(function () {
            $('#page_content').load(`event_editAdmin.php?idevent=${id_evento}`);

        });






    }else{
        $('.boton-regreso-evento').click(function() {
            $('#page_content').load(`event.php`);
        });
        $('.boton-regreso-espacios').click(function() {
            $('#page_content').load(`event_edit.php?idevent=${id_evento}`);

        });
        
    }

</script>

<!--Editar Stands-->
<!--Centralr-->
<div id="modal-edit-central" class="modal fade edit-stand-btn-central" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <form id="editar_info_stand_central">
                    <div class=" was-validated">

                        <div class="row align-items-start">
                            <div class="col-6">
                                <label for="validationServer01">Nombre del Stand</label>
                                <input pattern="^[a-zA-Z0-9_ ]{1,}" name="nombre_stand" type="text" minlength="1" class="form-control " id="validationServer01" placeholder="Escriba aquí! " value="" required>

                                <div class="invalid-feedback">
                                    Escriba un nombre valido
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlTextarea1">Descripción del Stand</label>
                                <input type="text" pattern="^[a-zA-Z0-9_ ]{1,}" name="descripcion_stand" class="form-control" id="exampleFormControlTextarea1" required>
                            </div>
                            <div class="col-6">
                                <label for="tipo_piso">Selector de tipo de piso</label>
                                <select name="tipo_piso" id="tipo_piso_central" class="form-control custom-select" required>
                                    <option value="" selected>Click aquí !</option>
                                    <option value="madera"> Piso estilo madera </option>
                                    <option value="alfombra"> Piso estilo alfombra </option>
                                    <option value="laminado"> Piso estilo laminado </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="tipo_piso">Selector de color del stand</label><br>

                                <input type="color" value="#000000" name="color_stand" id="color_stand_central">
                                <span id="span_color_pared_central" style="font-size: 24px;">#ffffff</span>
                            </div>
                        </div>
                        <br>

                        <div>Vista Previa</div>

                        <hr>
                        <div class="text-center">Vista Frontal</div>
                        <div id="stand_preview_container" class="col-12" style="position: relative; min-height:450px">
                            <img id="stand_body_preview_central" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;" src="../assets/stands/central/Paredes/Paredes_Fondo.png" alt="">
                            <img id="stand_floor_preview_central" style="width: 100%; position: absolute; z-index: 6; top: 0px; left: 0px;" src="../assets/stands/central/Pisos/Piso_Central_Madera.png" alt="">
                            <img id="stand_objects_preview_central" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/central/Objetos/Objetos_Central.png" alt="">
                        </div>
                        <hr>

                        <!-- <div id="tstContainer" style="display: inline-block;background-color: #000;width: 50px; height: 50px;"> </div> -->

                        <br>
                        <div>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <button type="button" class="btn  btn-danger" data-bs-dismiss="modal" style="float: right;">Cancelar</button>                          
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--Corner-->
<div id="modal-edit-corner" class="modal fade edit-stand-btn-corner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <form id="editar_info_stand_corner">
                    <div class=" was-validated">

                        <div class="row align-items-start">

                            <div class="col-6">
                                <label for="validationServer01">Nombre del Stand</label>
                                <input pattern="^[a-zA-Z0-9_ ]{1,}" name="nombre_stand" type="text" minlength="1" class="form-control " id="validationServer01" placeholder="Escriba aquí! " value="" required>

                                <div class="invalid-feedback">
                                    Escriba un nombre valido
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlTextarea1">Descripción del Stand</label>
                                <input type="text" pattern="^[a-zA-Z0-9_ ]{1,}" name="descripcion_stand" class="form-control" id="exampleFormControlTextarea1" required>
                            </div>

                            <div class="col-6">
                                <label for="tipo_piso">Selector de tipo de piso</label>
                                <select name="tipo_piso" id="tipo_piso_corner" class="form-control custom-select" required>
                                    <option value="" selected>Click aquí !</option>
                                    <option value="madera"> Piso estilo madera </option>
                                    <option value="alfombra"> Piso estilo alfombra </option>
                                    <option value="laminado"> Piso estilo laminado </option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="tipo_piso">Selector de color del stand</label><br>

                                <input type="color" name="color_stand" id="color_stand_corner">
                                <span id="span_color_pared_corner" style="font-size: 24px;">#ffffff</span>
                            </div>
                        </div>
                        <br>

                        <div>Vista Previa</div>

                        <hr>
                        <div class="text-center">Vista Frontal</div>
                        <div id="" class="col-12" style="position: relative; min-height:450px">
                            <img id="stand_body_preview_corner" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;" src="../assets/stands/corner/Paredes/Paredes_Fondo.png" alt="">
                            <img id="stand_floor_preview_corner" style="width: 100%; position: absolute; z-index: 6; top: 0px; left: 0px;" src="../assets/stands/corner/Piso/Piso_CornerMz_Madera.png" alt="">
                            <img id="stand_objects_preview_corner" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/corner/Objetos/Objetos_CornerMz.png" alt="">
                        </div>
                        <hr>

                        <!-- <div id="tstContainer" style="display: inline-block;background-color: #000;width: 50px; height: 50px;"> </div> -->

                        <br>
                        <div>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="float: right;">Cancelar</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--Full Access-->
<div id="modal-edit-full" class="modal fade edit-stand-btn-full" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <form id="editar_info_stand_full">
                    <div class=" was-validated">

                        <div class="row align-items-start">

                            <div class="col-6">
                                <label for="validationServer01">Nombre del Stand Full Access</label>
                                <input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*[0-9]*" name="nombre_stand" type="text" minlength="1" class="form-control " id="validationServer01" placeholder="Escriba aquí! " value="" required>

                                <div class="invalid-feedback">
                                    Escriba un nombre valido
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlTextarea1">Descripción del Stand</label>
                                <input type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*[0-9]*" name="descripcion_stand" class="form-control" id="exampleFormControlTextarea1" placeholder="Escriba aquí! " required>
                            </div>

                            <div class="col-6">
                                <label for="tipo_piso">Selector de tipo de piso</label>
                                <select name="tipo_piso" id="tipo_piso_full" class="form-control custom-select" required>
                                    <option value="" selected>Click aquí !</option>
                                    <option value="madera"> Piso estilo madera </option>
                                    <option value="alfombra"> Piso estilo alfombra </option>
                                    <option value="laminado"> Piso estilo laminado </option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="tipo_piso">Color de pared</label><br>
                                <input type="color" value="#000000" name="color_stand" id="color_stand_full">
                                <span id="span_color_pared_full" style="font-size: 24px;">#ffffff</span>
                            </div>

                            <div class="col-3">
                                <label for="tipo_piso">Color de techo</label><br>
                                <input type="color" value="#000000" name="color_stand_roof" id="color_stand_roof_full">
                                <span id="span_color_techo" style="font-size: 24px;">#ffffff</span>
                            </div>
                        </div>

                        <br>
                        <div>Vista Previa</div>
                        <hr>

                        <div class="text-center">Vista Frontal</div>
                        <div id="stand_preview_container" class="col-12" style="position: relative; min-height:450px">
                            <img id="stand_body_preview_full" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_1/Paredes/Paredes_Fondo.png" alt="">
                            <img id="stand_floor_preview_full" style="width: 100%; position: absolute; z-index: 6; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_1/Piso/Piso_FA_V1_Madera.png" alt="">
                            <img id="stand_objects_preview_full" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_1/Objetos/Objetos_FA_V1.png" alt="">
                            <img id="stand_roof_preview_full" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_1/Techo/Techo_Fondo.png" alt="">
                        </div>

                        <div class="text-center">Vista Trasera</div>
                        <div id="" class="col-12" style="position: relative; min-height:450px">
                            <img id="stand_body_preview_full_2" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_2/Paredes/Paredes_Fondo.png" alt="">
                            <img id="stand_floor_preview_full_2" style="width: 100%; position: absolute; z-index: 6; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_2/Piso/Piso_FA_V2_Madera.png" alt="">
                            <img id="stand_objects_preview_full_2" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_2/Objetos/Objetos_FA_V2.png" alt="">
                            <img id="stand_roof_preview_full_2" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_2/Techo/Techo_Fondo.png" alt="">
                        </div>

                        <hr>
                        <br>
                        <div>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <button type="button" class="btn  btn-danger" data-bs-dismiss="modal" style="float: right;">Cancelar</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal para Asignar expositor-->
<div class="modal fade edit-expo-btn" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModalToggle">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">


                <!--<form action="../php/stands/cambiar_expositor.php" method="POST" name="" target="_blank">-->
                <form id="cambiar_expositor">
                    <div class=" was-validated">

                        <table >
                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>

                            <thead>
                                <h4> Seleccionar Expositor: </h4>
                            </thead>

                            <tbody>
                                <tr class=" row">
                                    <td class="col-6">
                                        <input  hidden id="correoNuevoExpositor" name="agregar_nuevoExp" type="text">
                                        <input  hidden id="nombreNuevoExpositor" name="nombreExpositor" type="text">
                                        <input  hidden id="apellidoNuevoExpositor" name="apellidoExpositor" type="text">
                                        <input  hidden id="telefonoNuevoExpositor" name="telefonoExpositor" type="text">
                                        <input hidden id="id_stand2" name="id_stand" type="text" >
                                        <input  hidden  id="idDelEvento" name="nameEvent" type="text" value="<?php echo $id_evento ?>" >
                                    </td>
                                </tr >
                                <tr class=" row">

                                    <td class="col-12">
                                        <label for="correoExpositor">Expositores validados:</label>
                                        <select onchange="verificarFormulario()" name="correo_expositor" id="correoExpositor" class="form-control custom-select" required>
                                            <option  value="0" selected>--Click aquí--</option>
                                            <option  value="00" selected>Dejar sin expositor</option>
                                            <option  value="S" >Nuevo expositor</option>
                                            <!-- <option value="00" >Sin expositor</option> -->

                                            <?php
                                            for ($i = 0; $i < sizeof($array["data"]); $i++) {

                                            ?>

                                                <option value="<?php echo ($array["data"][$i]["email"]); ?>">
                                                    <?php echo ($array["data"][$i]["first_name"] . " " . $array["data"][$i]["last_name"] . " -> " . $array["data"][$i]["email"]); ?>

                                                </option>

                                            <?php
                                            }
                                            mysqli_free_result($res);
                                            mysqli_close($con);
                                            ?>

                                        </select>

                                        <label for="correoVendedor">Vendedor:</label>
                                        <select onchange="verificarFormulario()" name="correoVendedor" id="correoVendedor" class="form-control custom-select" required>
                                            <option value="0" selected>--Click aquí--</option>
                                            <option value="00" selected>Dejar sin Vendedor</option>
                                            <?php


                                            for ($i = 0; $i < sizeof($array3["data"]); $i++) {

                                            ?>

                                                <option value="<?php echo ($array3["data"][$i]["email"]); ?>">
                                                    <?php echo ($array3["data"][$i]["first_name"] . " " . $array3["data"][$i]["last_name"] . " -> " . $array3["data"][$i]["email"]); ?>

                                                </option>

                                            <?php
                                            }
                                            mysqli_free_result($res);
                                            mysqli_close($con);
                                            ?>
                                            
                                        </select>


                                        <div class="invalid-feedback">Elija un expositor por favor</div>
                                    </td>
                                </tr >
                            </tbody>
                        </table>
                        <br>
                        <div>
                            <button type="button" class="btn  btn-danger" data-bs-dismiss="modal" >Cancelar
                            <button hidden id="agregarBtn" name="agregar_datos_btn" type="submit" class="btn btn-primary" style="float: right;">Guardar cambios</button>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal para ponernombre y apellido del expositor-->

<div class="modal fade edit-expo_nombre-btn" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModalToggle">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">


                <!--<form action="../php/stands/cambiar_expositor.php" method="POST" name="" target="_blank">-->
                <form id="poner_nombre_apellido">
                    <div class=" was-validated">

                        <table width="750" cellspacing="4" cellpadding="5">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>

                            <thead>
                                <h4> Escriba los datos del expositor: </h4>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <input hidden id="id_stand3" name="id_stand" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="primer_nombre">Nombre del expositor:</label>
                                        <input type="text" name="primer_nombre" id="primer_nombre">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="apellido_paterno">Apellido del expositor:</label>
                                        <input type="text" name="apellido_paterno" id="apellido_paterno">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div>
                            <button type="button" class="btn  btn-danger" data-bs-dismiss="modal">Cancelar
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary">Guardar cambios</button>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--Tabla Stand-->

<div class="main_container">

    <div class="text-center">
        <h2><?php echo $nombre_pabellon; ?><br><b>Stands</b></h2>
    </div>
    <svi class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5 text-left">
                <button type="button" class="btn btn-outline-primary btn-sm boton-regreso-evento">Eventos</button> /
                <button type="button" class="btn btn-outline-primary btn-sm boton-regreso-espacios">Espacios</button> /
                <button type="button" class="btn btn-outline-primary btn-sm disabled"><b>Actual</b></button>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 text-center">
                <button id="btn_reload_stands_edit" class="btn btn-success">
                    Recargar
                    <i class='fa fa-refresh'></i>
                </button>
            </div>
        </div>
    </div>

    <div class="card" style="padding: 18px;">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless text-center" id="tabla_stand" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Comercial</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">E-mail<br>Expositor</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Asignar<br>Expositor</th>
                        <th scope="col">Personalizar<br>Stand</th>
                        <th scope="col">Adm.<br>Cont.</th>
                        <th scope="col">Eliminar</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

<div class="modal fade" id="nuevoExpoModal" tabindex="-1" aria-labelledby="new_adv_modal" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Expositor</h5>
                    <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form id="nuevoExpositorForm">

                        <input  hidden  type = "text" name="eventoId" value="<?php echo $id_evento ?>" >

                        <div class="mb-3">
                            <label  class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="in_new_adv_firstname" name="firstname" placeholder="Nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" required>
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="in_new_adv_lastname" name="lastname" placeholder="Apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" required>
                            
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="in_new_adv_cellphone" name="cellphone" placeholder="5712345678" pattern="^[0-9]{10}" required>
                            
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Dirección email</label>
                            <input type="email"  class="form-control" id="in_new_adv_email" name="email" placeholder="example@example.com" required>
                            
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button submit" class="btn btn-primary">Invitar Expositor</button>
                        </div>
                        
                    </form>


                </div>

            </div>
        </div>
    </div>


<script src="../js/stand_Edit.js"></script>
