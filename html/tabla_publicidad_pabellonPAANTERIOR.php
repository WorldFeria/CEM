<?php
include "../config/config.php";

$id_pabellon_padre = $_GET['cod_pabellon'];

$query = "SELECT codigo_pabellon from pabellon where id_pabellon = $id_pabellon_padre;";
$rest = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($rest)) {
    $array["data"][] = $data;
}

$codigo_pabellon = $array["data"][0]["codigo_pabellon"];
$query = "SELECT id_evento from pabellon where id_pabellon = $id_pabellon_padre;";
$rest = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($rest)) {
    $array["data"][] = $data;
}

$id_evento = $array["data"][1]["id_evento"];
$query = "SELECT nombre_evento from evento where id_evento = '$id_evento';";
$rest = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($rest)) {
    $array["data"][] = $data;
}

$nombre_evento = $array["data"][2]["nombre_evento"];
$nombre_evento = str_replace(" ", "_", $nombre_evento);
$direccion_guardado = "../imagenes_diseño/$nombre_evento/$codigo_pabellon/PIEZAS_PUBLICITARIAS/";

//Status Button
function decidir_boton($n_archivos_subidos, $totales)
{
    if ($n_archivos_subidos == 0) {
        return "badge_status btn-danger";
    } else if ($n_archivos_subidos > 0 and $n_archivos_subidos < $totales) {
        return "badge_status btn-warning";
    } else if ($n_archivos_subidos == $totales) {
        return "badge_status SUCCESS";
    }
}

//PA8x4
$query_PA8X4 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PA8X4%';";
$res_PA8X4 = mysqli_query($con, $query_PA8X4);
while ($data_PA8X4 = mysqli_fetch_assoc($res_PA8X4)) {
    $array_PA8X4["data"][] = $data_PA8X4;
}
$num_archivos_subidos_PA8X4 = $array_PA8X4["data"][0]["num_archivos_subidos"];
$boton_PA8X4 = decidir_boton($num_archivos_subidos_PA8X4, 6);

//PA6x3
$query_PA6X3 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PA6X3%';";
$res_PA6X3 = mysqli_query($con, $query_PA6X3);
while ($data_PA6X3 = mysqli_fetch_assoc($res_PA6X3)) {
    $array_PA6X3["data"][] = $data_PA6X3;
}
$num_archivos_subidos_PA6X3 = $array_PA6X3["data"][0]["num_archivos_subidos"];
$boton_PA6X3 = decidir_boton($num_archivos_subidos_PA6X3, 5);

//PA3x6
$query_PA3X6 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PA3X6%';";
$res_PA3X6 = mysqli_query($con, $query_PA3X6);
while ($data_PA3X6 = mysqli_fetch_assoc($res_PA3X6)) {
    $array_PA3X6["data"][] = $data_PA3X6;
}
$num_archivos_subidos_PA3X6 = $array_PA3X6["data"][0]["num_archivos_subidos"];
$boton_PA3X6 = decidir_boton($num_archivos_subidos_PA3X6, 2);

//PA2.5X3
$query_PA25X3 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PA2.5X3%';";
$res_PA25X3 = mysqli_query($con, $query_PA25X3);
while ($data_PA25X3 = mysqli_fetch_assoc($res_PA25X3)) {
    $array_PA25X3["data"][] = $data_PA25X3;
}
$num_archivos_subidos_PA25X3 = $array_PA25X3["data"][0]["num_archivos_subidos"];
$boton_PA25X3 = decidir_boton($num_archivos_subidos_PA25X3, 2);

//Cajas de Luz
$query_PACL = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PACL%';";
$res_PACL = mysqli_query($con, $query_PACL);
while ($data_PACL = mysqli_fetch_assoc($res_PACL)) {
    $array_PACL["data"][] = $data_PACL;
}
$num_archivos_subidos_PACL = $array_PACL["data"][0]["num_archivos_subidos"];
$boton_PACL = decidir_boton($num_archivos_subidos_PACL, 8);

//Plumas
$query_PAPL = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PAPL%';";
$res_PAPL = mysqli_query($con, $query_PAPL);
while ($data_PAPL = mysqli_fetch_assoc($res_PAPL)) {
    $array_PAPL["data"][] = $data_PAPL;
}
$num_archivos_subidos_PAPL = $array_PAPL["data"][0]["num_archivos_subidos"];
$boton_PAPL = decidir_boton($num_archivos_subidos_PAPL, 12);
?>

<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/tablaPA.js"></script>

<div class="obtener_id_evento" id="<?php echo $id_evento ?>"></div>


<script>
    var id_evento = $('.obtener_id_evento').attr('id');
    if (idRol == 1) {
        $('.regreso-evento').click(function() {
            $('#page_content').load(`eventAdmin.php`);
        });
        $('.regreso-espacios').click(function() {
            $('#page_content').load(`event_editAdmin.php?idevent=${id_evento}`);
        });
    } else if (idRol == 2) {
        $('.regreso-evento').click(function() {
            $('#page_content').load(`eventOrg.php`);
        });
        $('.regreso-espacios').click(function() {
            $('#page_content').load(`event_editOrg.php`);
        });
    }
    $('#reload').click(function() {
        var codigo_pabellon = $('.obtener_id_pabellon').attr('id');
        $('#page_content').load(`tabla_publicidad_pabellonPA.php?cod_pabellon=${codigo_pabellon}`);
    });
</script>





<div id="<?php echo $direccion_guardado; ?>" class="obtener_url"> </div>
<div id="<?php echo $id_pabellon_padre; ?>" class="obtener_id_pabellon"></div>

<!-- 8X4 -->
<div class="modal fade modal_banner_horizontal8x4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner horizontal 8X4 (6 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner8x4" class="form-controlx">
                                            <input hidden value="PA8X4_1" name="banner8x4_1" class="form-control">
                                            <input hidden value="PA8X4_2" name="banner8x4_2" class="form-control">
                                            <input hidden value="PA8X4_3" name="banner8x4_3" class="form-control">
                                            <input hidden value="PA8X4_4" name="banner8x4_4" class="form-control">
                                            <input hidden value="PA8X4_5" name="banner8x4_5" class="form-control">
                                            <input hidden value="PA8X4_6" name="banner8x4_6" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?>" name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner horizontal 8X4 (PA8X4_1)</label>
                                                <input type="file" name="banner8x4_1File" id="banner8x4_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner horizontal 8X4 (PA8X4_2)</label>
                                                <input type="file" name="banner8x4_2File" id="banner8x4_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner horizontal 8X4 (PA8X4_3)</label>
                                                <input type="file" name="banner8x4_3File" id="banner8x4_13File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner horizontal 8X4 (PA8X4_4)</label>
                                                <input type="file" name="banner8x4_4File" id="banner8x4_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_4" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner horizontal 8X4 (PA8X4_5)</label>
                                                <input type="file" name="banner8x4_5File" id="banner8x4_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_5" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner horizontal 8X4 (PA8X4_6)</label>
                                                <input type="file" name="banner8x4_6File" id="banner8x4_6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_6" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
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
<div class="modal fade modal_editar_horizontal8x4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Editar Banner horizontal 8X4 (6 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (PA8X4_1)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (PA8X4_2)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (PA8X4_3)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (PA8X4_4)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (PA8X4_5)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (PA8X4_6)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
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

<!-- 6X3 -->
<div class="modal fade modal_banner_horizontal6x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Horizontal 6X3 (5 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner6x3"></div>
                        <form id="formulario_banner6x3" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner6x3" class="form-controlx">
                                            <input hidden value="PA6X3_1" name="banner6x3_1" class="form-control">
                                            <input hidden value="PA6X3_2" name="banner6x3_2" class="form-control">
                                            <input hidden value="PA6X3_3" name="banner6x3_3" class="form-control">
                                            <input hidden value="PA6X3_4" name="banner6x3_4" class="form-control">
                                            <input hidden value="PA6X3_5" name="banner6x3_5" class="form-control">
                                            <input hidden id="id_auditorio_padre" value="<?php echo $id_auditorio_padre; ?>" name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Horizontal 6X3 (PA6X3_1)</label>
                                                <input type="file" name="banner6x3_1File" id="banner6x3_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Horizontal 6X3 (PA6X3_2)</label>
                                                <input type="file" name="banner6x3_2File" id="banner6x3_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Horizontal 6X3 (PA6X3_3)</label>
                                                <input type="file" name="banner6x3_3File" id="banner6x3_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Horizontal 6X3 (PA6X3_4)</label>
                                                <input type="file" name="banner6x3_4File" id="banner6x3_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_4" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Horizontal 6X3 (PA6X3_5)</label>
                                                <input type="file" name="banner6x3_5File" id="banner6x3_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_5" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
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
<div class="modal fade modal_editar_horizontal6x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Editar Banner Horizontal 6X3 (5 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner6x3"></div>
                        <form id="formulario_banner6x3" enctype="multipart/form-data">
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 6X3 (PA6X3_1)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal6x3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 6X3 (PA6X3_2)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal6x3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 6X3 (PA6X3_3)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal6x3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 6X3 (PA6X3_4)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal6x3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 6X3 (PA6X3_5)</label>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal6x3_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
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

<!-- 3x6-->
<div class="modal fade modal_banner_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Vertical 3X6 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner3x6" class="form-controlx">
                                            <input hidden value="PA3X6_1" name="banner3X6_1" class="form-control">
                                            <input hidden value="PA3X6_2" name="banner3X6_2" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?>" name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (PA3X6_1)</label>
                                                <input type="file" name="banner3X6_1File" id="banner3X6_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (PA3X6_2)</label>
                                                <input type="file" name="banner3X6_2File" id="banner3X6_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
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
<div class="modal fade modal_editar_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Editar Banner Vertical 3X6 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (PA3X6_1)</label>
                                                <button type='button' class='btn btn-primary btn-vista_vertical3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>

                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (PA3X6_2)</label>
                                                <button type='button' class='btn btn-primary btn-vista_vertical3x6_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical3x6_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
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

<!-- 2.5x3 -->
<div class="modal fade modal_banner_vertical25x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Vertical 2.5X3 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner25x3" class="form-controlx">
                                            <input hidden value="PA2.5X3_1" name="banner25x3_1" class="form-control">
                                            <input hidden value="PA2.5X3_2" name="banner25x3_2" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?>" name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (PA2.5X3_1)</label>
                                                <input type="file" name="banner25x3_1File" id="banner25x3_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (PA2.5X3_2)</label>
                                                <input type="file" name="banner25x3_2File" id="banner25x3_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
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
<div class="modal fade modal_editar_vertical25x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Editar Banner Vertical 2.5X3 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (PA2.5X3_1)</label>
                                                <button type='button' class='btn btn-primary btn-vista_vertical25x3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical25x3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (PA2.5X3_2)</label>
                                                <button type='button' class='btn btn-primary btn-vista_vertical25x3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical25x3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
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

<!-- Caja de Luz -->
<div class="modal fade modal_cajaluz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir imagenes para Cajas de Luz (8 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_cajaluz"></div>
                        <form id="formulario_cajaluz" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_cajasluz" class="form-controlx">
                                            <input hidden value="PACL1" name="cajaluz_1" class="form-control">
                                            <input hidden value="PACL2" name="cajaluz_2" class="form-control">
                                            <input hidden value="PACL3" name="cajaluz_3" class="form-control">
                                            <input hidden value="PACL4" name="cajaluz_4" class="form-control">
                                            <input hidden value="PACL5" name="cajaluz_5" class="form-control">
                                            <input hidden value="PACL6" name="cajaluz_6" class="form-control">
                                            <input hidden value="PACL7" name="cajaluz_7" class="form-control">
                                            <input hidden value="PACL8" name="cajaluz_8" class="form-control">
                                            <input hidden id="id_auditorio_padre" value="<?php echo $id_auditorio_padre; ?>" name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 1 (PACL1)</label>
                                                <input type="file" name="cajaluz_1File" id="cajaluz_1File" accept="image/PAg, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 2 (PACL2)</label>
                                                <input type="file" name="cajaluz_2File" id="cajaluz_2File" accept="image/PAg, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 3 (PACL3)</label>
                                                <input type="file" name="cajaluz_3File" id="cajaluz_3File" accept="image/PAg, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 4 (PACL4)</label>
                                                <input type="file" name="cajaluz_4File" id="cajaluz_4File" accept="image/PAg, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_4" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 5 (PACL5)</label>
                                                <input type="file" name="cajaluz_5File" id="cajaluz_5File" accept="image/PAg, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_5" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 6 (PACL6)</label>
                                                <input type="file" name="cajaluz_6File" id="cajaluz_6File" accept="image/PAg, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_6" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 7 (PACL7)</label>
                                                <input type="file" name="cajaluz_7File" id="cajaluz_7File" accept="image/PAg, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_7" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 8 (PACL8)</label>
                                                <input type="file" name="cajaluz_8File" id="cajaluz_8File" accept="image/PAg, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_8" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
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
<div class="modal fade modal_editar_cajaluz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Editar Cajas de Luz (8 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_cajaluz"></div>
                        <form id="formulario_cajaluz" enctype="multipart/form-data">
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 1 (PACL1)</label>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 2 (PACL2)</label>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 3 (PACL3)</label>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 4 (PACL4)</label>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 5 (PACL5)</label>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 6 (PACL6)</label>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 7 (PACL7)</label>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 8 (PACL8)</label>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
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

<!-- Plumas -->
<div class="modal fade modal_plumas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir imagenes para Plumas (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_plumas"></div>
                        <form id="formulario_plumas" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_plumas" class="form-controlx">
                                            <input hidden value="PAPL1" name="pluma_1" class="form-control">
                                            <input hidden value="PAPL2" name="pluma_2" class="form-control">
                                            <input hidden value="PAPL3" name="pluma_3" class="form-control">
                                            <input hidden value="PAPL4" name="pluma_4" class="form-control">
                                            <input hidden value="PAPL5" name="pluma_5" class="form-control">
                                            <input hidden value="PAPL6" name="pluma_6" class="form-control">
                                            <input hidden value="PAPL7" name="pluma_7" class="form-control">
                                            <input hidden value="PAPL8" name="pluma_8" class="form-control">
                                            <input hidden value="PAPL9" name="pluma_9" class="form-control">
                                            <input hidden value="PAPL10" name="pluma_10" class="form-control">
                                            <input hidden value="PAPL11" name="pluma_11" class="form-control">
                                            <input hidden value="PAPL12" name="pluma_12" class="form-control">
                                            <input hidden id="id_auditorio_padre" value="<?php echo $id_auditorio_padre; ?>" name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 1 (PAPL1)</label>
                                                <input type="file" name="pluma_1File" id="pluma_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 2 (PAPL2)</label>
                                                <input type="file" name="pluma_2File" id="pluma_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 3 (PAPL3)</label>
                                                <input type="file" name="pluma_3File" id="pluma_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 4 (PAPL4)</label>
                                                <input type="file" name="pluma_4File" id="pluma_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_4" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 5 (PAPL5)</label>
                                                <input type="file" name="pluma_5File" id="pluma_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_5" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 6 (PAPL6)</label>
                                                <input type="file" name="pluma_6File" id="pluma_6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_6" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 7 (PAPL7)</label>
                                                <input type="file" name="pluma_7File" id="pluma_7File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_7" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 8 (PAPL8)</label>
                                                <input type="file" name="pluma_8File" id="pluma_8File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_8" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 9 (PAPL9)</label>
                                                <input type="file" name="pluma_9File" id="pluma_9File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_9" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 10 (PAPL10)</label>
                                                <input type="file" name="pluma_10File" id="pluma_10File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_10" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 11 (PAPL11)</label>
                                                <input type="file" name="pluma_11File" id="pluma_11File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_11" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 12 (PAPL12)</label>
                                                <input type="file" name="pluma_12File" id="pluma_12File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_12" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
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
<div class="modal fade modal_editar_plumas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Editar Plumas (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 1 (PAPL1)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 2 (PAPL2)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 3 (PAPL3)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 4 (PAPL4)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 5 (PAPL5)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 6 (PAPL6)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 7 (PAPL7)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 8 (PAPL8)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 9 (PAPL9)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 10 (PAPL10)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_10' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_10' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 11 (PAPL11)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 12 (PAPL12)</label>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_12' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_12' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
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

<!-- Eliminar Archivo -->
<div class="modal fade" id="borrar_imagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="titulo_texto_eli">¿Está seguro que desea eliminar la Imagen?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" id="imagen_mostrada_real_eli" src="" onerror="this.src='../imagenes_diseño/no_image2.png';" />
            </div>
            <form id="formulario_borrar_archivo">
                <input hidden value="<?php echo $direccion_guardado; ?>" name="direccion_guardado">
                <input hidden value="" name="nombre_archivo" id="nombre_archivo_borrar">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Borrar Imagen</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Vista Previa -->
<div class="modal fade modal_vista_previa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title " id="titulo_texto_prev">Vista previa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" id="imagen_mostrada_real_vista" src="" onerror="this.src='../imagenes_diseño/no_image2.png';" />
            </div>
        </div>
    </div>
</div>

<!--Tabla publicidad-->
<div class="main_container">
    <div class="text-center">
        <h2>Piezas Publicitarias del <b>Pabellón Alternativo</b></h2>
    </div>
    <svi class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5 text-left">
                <button type="button" class="btn btn-outline-primary btn-sm regreso-evento">Eventos</button> /
                <button type="button" class="btn btn-outline-primary btn-sm regreso-espacios">Espacios</button> /
                <button type="button" class="btn btn-outline-primary btn-sm disabled"><b>Actual</b></button>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 text-center">
                <button id="reload" class="btn btn-success">
                    Recargar
                    <i class='fa fa-refresh'></i>
                </button>
            </div>
        </div>
</div>
</div>

<div class="card" style="padding: 18px;">
    <div class=" col-12 table-responsive">
        <table class="table table-striped table-borderless text-center" id="users_table" style="width:100%">
            <thead>
                <tr class="t-header">
                    <th scope="col">Tipo de Contenido</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Dimensiones máximas</th>
                    <th scope="col">Formato</th>
                    <th scope="col">Subir</th>
                    <th scope="col">Editar</th>
                </tr>


                <tr>
                    <td>Banner Horizontal 8x4</td>
                    <td>6</td>
                    <td>2600X1300</td>
                    <td>
                        <div class="<?php echo $boton_PA8X4; ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_banner_horizontal8x4'>
                                <i class='fa fa-cloud-upload' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_editar_horizontal8x4'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Banner Horizontal 6x3</td>
                    <td>5</td>
                    <td>2400X1200</td>
                    <td>
                        <div class="<?php echo $boton_PA6X3; ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_banner_horizontal6x3'>
                                <i class='fa fa-cloud-upload' aria-hidden='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_editar_horizontal6x3'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Banner Vertical 3x6</td>
                    <td>2</td>
                    <td>1200X2400</td>
                    <td>
                        <div class="<?php echo $boton_PA3X6; ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_banner_vertical3x6'>
                                <i class='fa fa-cloud-upload' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_editar_vertical3x6'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Banner vertical 2.5x3</td>
                    <td>2</td>
                    <td>1250X1500</td>
                    <td>
                        <div class="<?php echo $boton_PA25X3; ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_banner_vertical25x3'>
                                <i class='fa fa-cloud-upload' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_editar_vertical25x3'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Caja de luz</td>
                    <td>8</td>
                    <td>2000X1000</td>
                    <td>
                        <div class="<?php echo $boton_PACL; ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_cajaluz'>
                                <i class='fa fa-cloud-upload' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_editar_cajaluz'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Plumas</td>
                    <td>12</td>
                    <td>540X2575</td>
                    <td>
                        <div class="<?php echo $boton_PAPL; ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_plumas'>
                                <i class='fa fa-cloud-upload' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_editar_plumas'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>

            </thead>
        </table>
    </div>
</div>