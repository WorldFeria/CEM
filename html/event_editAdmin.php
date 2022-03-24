<?php
error_reporting(0);
$id_event = $_GET['idevent'];

include("../config/config.php");
$query = "SELECT cantidad_pabellones , cantidad_auditorios , loby FROM evento WHERE id_evento = '$id_event';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array1["data"][] = $data;
}
$cantidad_pabellones_var = $array1["data"][0]["cantidad_pabellones"];
$cantidad_auditorios_var = $array1["data"][0]["cantidad_auditorios"];
$loby_var = $array1["data"][0]["loby"];









/*
nStandsFA
nStandsCC
nStandsCM
*/






?>

<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/eventEditAdmin_JS.js"></script>




<script type="text/javascript">

    var idFatherEvent = <?php echo $id_event ?>;
    $('.boton-regreso-evento').click(function() {
        $('#page_content').load(`eventAdmin.php`);
    });
</script>





<div id="<?php echo $id_event; ?>" class="obtener_id_evento"> </div>

<!-- Editar Pabellón -->
<div class="modal fade modal-edit-pabellon-btn-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">

                <form id="editar_datos_pabellon">
                    <div class=" was-validated">

                        <table class="table">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>

                            <thead>
                                <h4> Editar Pabellón: </h4>
                            </thead>

                            <tbody >
                                <tr>
                                        <input hidden name = "idDelEvento" value="<?php echo $id_event ?>">
                                    <td>
                                        <input hidden id="id_pabellon2" name="id_pabellon" type="text" class="form-control">
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-4">
                                        <label for="validationServer01 ">Nombre del Pabellón</label>
                                        <input name="nombre_pabellon" type="text" minlength="5" class="form-control " id="nombre_pabellon"  value="" required>


                                    </td>

                                    <input hidden type="text" id="comprobarNuevo"  >

                                    <td class="col-4">
                                        <label for="inputState ">Codigo del Pabellón</label>
                                        <select name="codigo_pabellon" id="codigoPabellon" class="form-control custom-select" required>
                                            <option value="Sin codigo" selected>Click aquí !</option>
                                            <option value="PI"> PI </option>
                                            <option value="PN"> PN </option>
                                            <option value="PA"> PA </option>
                                        </select>

                                    </td>
                                    <td  class="col-4">

                                        <label for="exampleFormControlTextarea1">Descripción del Pabellón</label>
                                        <textarea name="descripcion_pabellon" class="form-control" id="descripcion_pabellon"  required></textarea>
                                    </td>
                                </tr>

                                <input hidden type="text" id="respaldoFA" >
                                <input hidden type="text" id="respaldoCC" >
                                <input hidden type="text" id="respaldoCM" >

                                <tr class ="row">
                                    <td class="col-4">
                                        <label for="nStandsFA ">Número de : Stand Full Access</label>
                                        <input name="stand_SFA" type="number" min="0" class="form-control" id="nStandsFA"   required>

                                    </td>
                                    <td class="col-4">
                                        <label for="nStandsCC ">Número de : Stand Central</label>
                                        <input name="stand_SC" type="number" min="0" class="form-control" id="nStandsCC" required>

                                    </td>
                                    <td class="col-4">
                                        <label for="nStandsCM ">Número de : Stands Corner M</label>
                                        <input name="stand_SCM" type="number" min="0" class="form-control" id="nStandsCM"   required>

                                    </td>

                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <div>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary" style="float: right;">Guardar
                            </button>


                            <button type="button" class="btn  btn-primary" data-bs-dismiss="modal" >Cancelar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Editar Lobby -->
<div class="modal fade modal-edit-lobby-btn-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">


                <!--<form action="../php/editar_datos_lobby.php" method="POST" name="" target="_blank">-->
                <form id="editar_datos_lobby">
                    <div class=" was-validated">

                        <table  class="table">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>

                            <thead>
                                <h4> Editar Lobby: </h4>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>
                                        <input hidden id="id_lobby2" name="id_lobby" type="text" class="form-control">
                                        <input hidden type="text" id="codigoLobbyAnterior">
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-6">
                                        <label for="validationServer01">Nombre del Lobby</label>
                                        <input name="nombre_lobby" type="text" minlength="5" class="form-control " id="nombre_lobby"  value="" required>


                                    </td>

                                    <td class="col-6">
                                        <label for="inputState">Codigo del Lobby</label>
                                        <select name="codigo_lobby" id="codigo_lobby" class="form-control custom-select" >
                                            <option value="" selected>Click aquí !</option>
                                            <option value="LB"> LB </option>
                                        </select>

                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col-12">

                                        <label for="exampleFormControlTextarea1">Descripción del Lobby</label>
                                        <textarea name="descripcion_lobby" class="form-control" id="descripcion_lobby"  required></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary" style="float: right;">Guardar</button>


                            <button type="button" class="btn  btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Editar Auditorio -->
<div class="modal fade modal-edit-auditorio-btn-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">

                <form id="editar_datos_auditorio">
                    <div class=" was-validated">

                        <table >
                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>

                            <thead>
                                <h4> Editar Auditorio: </h4>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <input hidden id="id_auditorio2" name="id_auditorio" type="text" class="form-control">
                                        <input hidden type="text" id="codigoAuditorioAnterior">
                                    </td>
                                </tr>

                                <tr class="row">
                                    <td class="col">
                                        <label for="validationServer01">Nombre del Auditorio</label>
                                        <input name="nombre_auditorio" type="text" minlength="5" class="form-control " id="nombre_auditorio"  value="" required>


                                    </td>

                                    <td class="col">
                                        <label for="inputState">Codigo del Auditorio</label>
                                        <select name="codigo_auditorio" id="codigo_auditorio" class="form-control custom-select" >
                                            <option value="" selected>Click aquí !</option>
                                            <option value="AA"> AA </option>
                                            <option value="AB"> AB </option>
                                        </select>

                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">

                                        <label for="exampleFormControlTextarea1">Descripción del Auditorio</label>
                                        <textarea name="descripcion_auditorio" class="form-control" id="descripcion_auditorio"  required></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary" style="float: right;">Guardar</button>


                            <button type="button" class="btn  btn-primary" data-bs-dismiss="modal" >Cancelar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<br><div class="text-left">
    <button type="button" class="btn btn-outline-primary btn-sm boton-regreso-evento">Eventos</button> /
    <button type="button" class="btn btn-outline-primary btn-sm disabled">Actual</button>
</div><br>

<div class="accordion" id="accordionExample">

<?php 
    if ($cantidad_pabellones_var >= 1) {
?>    
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="font-size: .9em">
                Pabellones
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <div class="main_container" style="margin-top: 0">

                    <div class="card" style="padding: 18px;">
                        <div class=" col-12 table-responsive">
                            <table class="table table-striped table-borderless " id="tabla_pabellon" style="width:100%">
                                <thead>
                                    <tr class="t-header">
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre del Pabellón</th>
                                        <th scope="col">Espacio </th>
                                        <th scope="col">Descripción </th>
                                        <th scope="col">Número<br>de Stands</th>

                                        <th scope="col">Administrar<br>Publicidad</th>
                                        <th scope="col">Administrar<br>Stands</th>
                                        <th scope="col">Opciones</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


<?php 
    }
    if ($loby_var >= 1) {
?>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: .9em">
                Lobbys
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <div class="main_container" style="margin-top: 0">
                    <div class="card" style="padding: 18px;">
                        <div class=" col-12 table-responsive">
                            <table class="table table-striped table-borderless " id="tabla_lobby" style="width:100%">
                                <thead>
                                    <tr class="t-header">
                                        <th scope="col">id lobby</th>
                                        <th scope="col">Nombre del Lobby</th>
                                        <th scope="col">Espacio</th>
                                        <th scope="col">Descripción </th>
                                        <th scope="col">Administrar<br>Publicidad</th>
                                        <th scope="col">Opciones</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
    }
    if ($cantidad_auditorios_var >= 1) {
?>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size: .9em">
                Auditorios
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <div class="main_container" style="margin-top: 0">

                    <div class="card" style="padding: 18px;">
                        <div class=" col-12 table-responsive">
                            <table class="table table-striped table-borderless " id="tabla_auditorio" style="width:100%">
                                <thead>
                                    <tr class="t-header">
                                        <th scope="col">id auditorio</th>
                                        <th scope="col">Nombre del Auditorio</th>
                                        <th scope="col">Espacio</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Administrar<br>Publicidad</th>
                                        <th scope="col">Administrar<br>Horarios</th>
                                        <th scope="col">Opciones</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

<?php 
    }
?>
</div>
