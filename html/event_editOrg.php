<?php
error_reporting(0);
$id_event = $_GET['idevent'];
//$name_event = $_GET['nameevent'];

include("../config/config.php");
$query = "SELECT cantidad_pabellones , cantidad_auditorios , loby FROM evento WHERE id_evento = '$id_event';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array1["data"][] = $data;
}
$cantidad_pabellones_var = $array1["data"][0]["cantidad_pabellones"];
$cantidad_auditorios_var = $array1["data"][0]["cantidad_auditorios"];
$loby_var = $array1["data"][0]["loby"];
?>

<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/eventEditOrgJS.js"></script>

<script type="text/javascript">
    var idFatherEvent = <?php echo $id_event ?>;
    $('.boton-regreso-evento').click(function() {
        $('#page_content').load(`eventOrg.php`);
    });
</script>

<div id="<?php echo $id_event; ?>" class="obtener_id_evento"> </div>


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


<?php 

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
                                        <!--<th scope="col">Opciones</th>-->

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



<?php 

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
                                        <!--<th scope="col">Opciones</th>-->

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