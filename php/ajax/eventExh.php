<?php
include "../../config/config.php";
session_start();
$id = $_SESSION['user-id'];

$sql = "SELECT id_event3 FROM user_event WHERE id_user3=$id;";
$query_event = mysqli_query($con, $sql);
while ($data_event = mysqli_fetch_assoc($query_event)) {
    $array_event["data"][] = $data_event;
}
$eventos = "";
for ($i = 0; $i < sizeof($array_event["data"]); $i++) {
    $eventos = $eventos.','.$array_event["data"][$i]["id_event3"];
}
$eventos = substr($eventos, 1);

$sql = "SELECT id_evento, nombre_evento, tipo_evento, descripcion_evento, cantidad_pabellones, loby, landing_page, fecha_inicio, fecha_cierre, cantidad_auditorios,link_evento,link_vr,nombre_logo,horario_inicio,horario_cierre FROM evento WHERE id_evento IN ($eventos) ORDER BY fecha_inicio DESC;";
$query = mysqli_query($con, $sql);

while ($r = mysqli_fetch_array($query)) {
    $idevento = $r['id_evento'];
    $nombreevento = $r['nombre_evento'];
    $descripcionevento = $r['descripcion_evento'];
    $fechainicio = $r['fecha_inicio'];
    $fechacierre = $r['fecha_cierre'];
    $link_evento = $r['link_evento'];
    $link_vr = $r['link_vr'];
    $nombre_logo = $r['nombre_logo'];
    $horario_inicio = $r['horario_inicio'];
    $horario_cierre = $r['horario_cierre'];
?>
    <div class="card mb-3 border-primary text-center h-100 shadow p-3 mb-4 cards" data-aos="zoom-in-down">
        <div class="row g-0">
            <div class="col-md-5">
                <?php
                $nombre_evento_edit = str_replace(" ", "_", $nombreevento);
                $direccion_imagen = "../imagenes_diseño/$nombre_evento_edit/";
                $direccion_imagen_temp = $direccion_imagen.$nombre_logo.".png";
                ?>
                <img class="card-img-top" src="<?php echo $direccion_imagen_temp ?>" alt="<?php echo $nombreevento ?>" title="<?php echo $nombreevento ?>" />
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h4 class="card-title text-primary">
                        <p><b><i><?php echo $nombreevento; ?></i></b></p>
                    </h4>
                    <p class="card-text"><?php echo $descripcionevento; ?></p>
                    <br>
                    <button type='button' class='btn btn-primary edit-lean' title='Administrar Stands' alt='Administrar Stands' onclick="get_stand_data()">
                        Administrar mis stands
                        <i class='bx bx-store-alt nav_logo-icon' style="vertical-align: middle"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-borderless table-striped">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col" class="text-center text-dark">Desde</th>
                                    <th scope="col" class="text-center text-dark">Hasta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="even pointer">
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($fechainicio)); ?></td>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($fechacierre)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-borderless table-striped">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col" class="text-center text-dark">De</th>
                                    <th scope="col" class="text-center text-dark">A</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="even pointer">
                                    <td class="text-center"><?php echo date('H:i:s', strtotime($horario_inicio)); ?></td>
                                    <td class="text-center"><?php echo date('H:i:s', strtotime($horario_cierre)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <a class="btn btn-blue btn-sm" href="<?php echo $link_evento; ?>" target="_blank">
                        WEB <i class="fa fa-share" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-purple btn-sm" href="<?php echo $link_vr; ?>" target="_blank">
                        VR <i class="fas fa-vr-cardboard"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>

<script>
    AOS.init();

    function get_stand_data() {
        var body = $("html, body");
        body.stop().animate({
            scrollTop: 0
        }, 250);
        $('#page_content').load(`standsExh.php?emailExh=${email}`);
    }
</script>