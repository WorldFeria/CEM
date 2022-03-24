<?php
session_start();
$id = $_SESSION['user-id'];
$idrol = $_SESSION['user-idrol'];

include "../../config/config.php";
$query_event = "SELECT id_event3 FROM user_event WHERE id_user3=$id;";
$res_event = mysqli_query($con, $query_event);
while ($data_event = mysqli_fetch_assoc($res_event)) {
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
    $tipoevento = $r['tipo_evento'];
    $descripcionevento = $r['descripcion_evento'];
    $cantidadpabellones = $r['cantidad_pabellones'];
    $loby = $r['loby'];
    $landingpage = $r['landing_page'];
    $fechainicio = $r['fecha_inicio'];
    $fechacierre = $r['fecha_cierre'];

    $horario_inicio = $r['horario_inicio'];
    $horario_cierre = $r['horario_cierre'];

    $cantidadauditorios = $r['cantidad_auditorios'];
    $link_evento = $r['link_evento'];
    $link_vr = $r['link_vr'];
    $nombre_logo = $r['nombre_logo'];
?>
    <div class="card mb-3 border-primary text-center h-100 shadow p-3 mb-4 cards" data-aos="zoom-in-down">
        <div class="row g-0">
            <div class="col-md-5">
                <a href="#">
                    <?php
                    $nombre_evento_edit = str_replace(" ", "_", $nombreevento);
                    $direccion_imagen = "../imagenes_diseño/$nombre_evento_edit/";
                    $direccion_imagen_temp = $direccion_imagen.$nombre_logo.".png";
                    ?>
                    <img onclick="cambio_img('<?php echo $direccion_imagen ?>','<?php echo $nombre_logo ?>','<?php echo $idevento ?>')" class=" img-fluid" src="<?php echo $direccion_imagen_temp ?>" onerror="this.src='../imagenes_diseño/no_image2.png';" data-bs-toggle='modal' data-bs-target='.modal_cambiar_logo' alt="<?php echo $nombreevento ?>" title="<?php echo $nombreevento ?>" height="380" width="630" />
                </a>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h4 class="card-title text-primary">
                        <p><b><i><?php echo $nombreevento; ?></i></b>
                            <span class="badge rounded-pill bg-primary"><?php echo $tipoevento; ?></span>
                        </p>
                    </h4>
                    <p class="card-text"><?php echo $descripcionevento; ?></p>
                </div>
                <div class="table-responsive px-3">
                    <table class="table table-sm table-hover table-borderless table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">Pabellones</th>
                                <th scope="col" class="text-center">Auditorios</th>
                                <th scope="col" class="text-center">LP</th>
                                <th scope="col" class="text-center">Loby</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="even pointer">
                                <td class="text-center"><?php echo $cantidadpabellones; ?></td>
                                <td class="text-center"><?php echo $cantidadauditorios; ?></td>
                                <td class="text-center"><?php if ($landingpage == 1) {
                                                            echo "<button type='button' class='btn btn-outline-success' disabled>Si</button>";
                                                        } else {
                                                            echo "<button type='button' class='btn btn-outline-danger' disabled>No</button>";
                                                        } ?></td>
                                <td class="text-center"><?php if ($loby == 1) {
                                                            echo "<button type='button' class='btn btn-outline-success' disabled>Si</button>";
                                                        } else {
                                                            echo "<button type='button' class='btn btn-outline-danger' disabled>No</button>";
                                                        } ?></td>
                            </tr>
                        </tbody>
                    </table>
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
                    <button onclick="get_nombre('<?php echo $idevento ?>','<?php echo $descripcionevento ?>','<?php echo $tipoevento ?>','<?php echo $link_evento ?>','<?php echo $link_vr ?>');" type='button' class='btn btn-primary editar_evento' title='Editar Evento' alt='Editar Evento' data-bs-toggle='modal' data-bs-target='.bd-example-modal-lg-edit'><i class='bx bx-edit nav_logo-icon'></i></button>
                    <button type='button' class='btn btn-primary edit-lean' title='Administrar Espacios' alt='Administrar Espacios' onclick="get_data('<?php echo $idevento ?>');"><i class='bx bx-columns nav_logo-icon'></i></button>
                    <button onclick="get_data_user('<?php echo $idevento ?>');" type='button' class='btn btn-primary edit-lean' title='Administrar Usuarios' alt='Administrar Usuarios'><i class="fa fa-user-o" aria-hidden="true"></i></button>
                </div>
                <div class="card-footer bg-transparent">
                    <a class="btn btn-blue btn-sm" href="<?php echo $link_evento; ?>" target="_blank">
                        WEB <i class="fa fa-share"></i>
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

    function get_data(idevento) {
        var idevent = idevento;
        var body = $("html, body");
        body.stop().animate({
            scrollTop: 0
        }, 250);
        $('#page_content').load(`event_editOrg.php?idevent=${idevent}`);
    }

    function get_nombre(idevento, descripcionevento, tipoevento, link_evento, link_vr) {
        $('#nombre_evento_edit').val(idevento);
        $('#descripcion_evento_id').val(descripcionevento);
        $('#tipo_evento_id').val(tipoevento);
        $('#link_event_id').val(link_evento);
        $('#link_vr_id').val(link_vr);
    }

    function cambio_img(direccion_imagen, nombre_logo, id) {
        $('#nombre_logo').val(nombre_logo);
        $('#direccion_logo').val(direccion_imagen);
        $('#id_evento_img').val(id);
    }

    function get_data_user(idevento) {
        var idevent = idevento;
        var body = $("html, body");
        body.stop().animate({
            scrollTop: 0
        }, 250);
        $('#page_content').load(`user_edit.php?idevent=${idevent}`);
    }
</script>