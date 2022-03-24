<?php
include "../config/config.php";

function barraVerde($n){


    if($n == '1'){

        return 100.00;
    }else{

        return 0;
    }

}

function claseBarraVerde($n){
    if($n == 100){

        return 'bg-success';
    }else{

        return 'sinColor';
    }
}

function etiquetaSubido($n,$id){
    if($n == 100){

        return "<div  id='$id' class='bg-success text-white' style='margin-bottom: 3%;'> Archivo Subido </div>";
    }else{

        return "<div  id='$id' class='bg-warning text-white' style='margin-bottom: 3%;'> Archivo Faltante </div>";
    }
}

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
$nombre_evento = str_replace(" ", "_", $nombre_evento); //check
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

//PI8x4
$query_PI8X4 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PI8X4%';";
$res_PI8X4 = mysqli_query($con, $query_PI8X4);
while ($data_PI8X4 = mysqli_fetch_assoc($res_PI8X4)) {
    $array_PI8X4["data"][] = $data_PI8X4;
}
$num_archivos_subidos_PI8X4 = $array_PI8X4["data"][0]["num_archivos_subidos"];
$boton_PI8X4 = decidir_boton($num_archivos_subidos_PI8X4, 2);

//PI6x3
$query_PI6X3 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PI6X3%';";
$res_PI6X3 = mysqli_query($con, $query_PI6X3);
while ($data_PI6X3 = mysqli_fetch_assoc($res_PI6X3)) {
    $array_PI6X3["data"][] = $data_PI6X3;
}
$num_archivos_subidos_PI6X3 = $array_PI6X3["data"][0]["num_archivos_subidos"];
$boton_PI6X3 = decidir_boton($num_archivos_subidos_PI6X3, 5);

//PI3x6
$query_PI3X6 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PI3X6%';";
$res_PI3X6 = mysqli_query($con, $query_PI3X6);
while ($data_PI3X6 = mysqli_fetch_assoc($res_PI3X6)) {
    $array_PI3X6["data"][] = $data_PI3X6;
}
$num_archivos_subidos_PI3X6 = $array_PI3X6["data"][0]["num_archivos_subidos"];
$boton_PI3X6 = decidir_boton($num_archivos_subidos_PI3X6, 2);

//PI2.5X3
$query_PI25X3 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PI2.5X3%';";
$res_PI25X3 = mysqli_query($con, $query_PI25X3);
while ($data_PI25X3 = mysqli_fetch_assoc($res_PI25X3)) {
    $array_PI25X3["data"][] = $data_PI25X3;
}
$num_archivos_subidos_PI25X3 = $array_PI25X3["data"][0]["num_archivos_subidos"];
$boton_PI25X3 = decidir_boton($num_archivos_subidos_PI25X3, 4);

//Cajas de Luz
$query_PICL = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PICL%';";
$res_PICL = mysqli_query($con, $query_PICL);
while ($data_PICL = mysqli_fetch_assoc($res_PICL)) {
    $array_PICL["data"][] = $data_PICL;
}
$num_archivos_subidos_PICL = $array_PICL["data"][0]["num_archivos_subidos"];
$boton_PICL = decidir_boton($num_archivos_subidos_PICL, 2);

//Plumas
$query_PIPL = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'PIPL%';";
$res_PIPL = mysqli_query($con, $query_PIPL);
while ($data_PIPL = mysqli_fetch_assoc($res_PIPL)) {
    $array_PIPL["data"][] = $data_PIPL;
}
$num_archivos_subidos_PIPL = $array_PIPL["data"][0]["num_archivos_subidos"];
$boton_PIPL = decidir_boton($num_archivos_subidos_PIPL, 12);




$query="SELECT subido from publicidad_espacio where id_padre = '$id_pabellon_padre';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $arrayVerde["data"][] = $data;
}


$colorPI3X6_1 = barraVerde($arrayVerde["data"][0]['subido']);
$colorClasePI3X6_1 = claseBarraVerde($colorPI3X6_1);
$etiquetaPI3X6_1 = etiquetaSubido($colorPI3X6_1,'etiquetaPI3X6_1');



$colorPI3X6_2 = barraVerde($arrayVerde["data"][1]['subido']);
$colorClasePI3X6_2 = claseBarraVerde($colorPI3X6_2);
$etiquetaPI3X6_2 = etiquetaSubido($colorPI3X6_2,'etiquetaPI3X6_2');

$colorPI2_5X3_1 = barraVerde($arrayVerde["data"][2]['subido']);
$colorClasePI2_5X3_1 = claseBarraVerde($colorPI2_5X3_1);
$etiquetaPI2_5X3_1 = etiquetaSubido($colorPI2_5X3_1,'etiquetaPI2_5X3_1');

$colorPI2_5X3_2 = barraVerde($arrayVerde["data"][3]['subido']);
$colorClasePI2_5X3_2 = claseBarraVerde($colorPI2_5X3_2);
$etiquetaPI2_5X3_2 = etiquetaSubido($colorPI2_5X3_2,'etiquetaPI2_5X3_2');

$colorPI2_5X3_3 = barraVerde($arrayVerde["data"][4]['subido']);
$colorClasePI2_5X3_3 = claseBarraVerde($colorPI2_5X3_3);
$etiquetaPI2_5X3_3 = etiquetaSubido($colorPI2_5X3_3,'etiquetaPI2_5X3_3');

$colorPI2_5X3_4 = barraVerde($arrayVerde["data"][5]['subido']);
$colorClasePI2_5X3_4 = claseBarraVerde($colorPI2_5X3_4);
$etiquetaPI2_5X3_4 = etiquetaSubido($colorPI2_5X3_4,'etiquetaPI2_5X3_4');

$colorPI8X4_1 = barraVerde($arrayVerde["data"][6]['subido']);
$colorClasePI8X4_1 = claseBarraVerde($colorPI8X4_1);
$etiquetaPI8X4_1 = etiquetaSubido($colorPI8X4_1,'etiquetaPI8X4_1');

$colorPI8X4_2 = barraVerde($arrayVerde["data"][7]['subido']);
$colorClasePI8X4_2 = claseBarraVerde($colorPI8X4_2);
$etiquetaPI8X4_2 = etiquetaSubido($colorPI8X4_2,'etiquetaPI8X4_2');

$colorPI6X3_1 = barraVerde($arrayVerde["data"][8]['subido']);
$colorClasePI6X3_1 = claseBarraVerde($colorPI6X3_1);
$etiquetaPI6X3_1 = etiquetaSubido($colorPI6X3_1,'etiquetaPI6X3_1');

$colorPI6X3_2 = barraVerde($arrayVerde["data"][9]['subido']);
$colorClasePI6X3_2 = claseBarraVerde($colorPI6X3_2);
$etiquetaPI6X3_2 = etiquetaSubido($colorPI6X3_2,'etiquetaPI6X3_2');

$colorPI6X3_3 = barraVerde($arrayVerde["data"][10]['subido']);
$colorClasePI6X3_3 = claseBarraVerde($colorPI6X3_3);
$etiquetaPI6X3_3 = etiquetaSubido($colorPI6X3_3,'etiquetaPI6X3_3');

$colorPI6X3_4 = barraVerde($arrayVerde["data"][11]['subido']);
$colorClasePI6X3_4 = claseBarraVerde($colorPI6X3_4);
$etiquetaPI6X3_4 = etiquetaSubido($colorPI6X3_4,'etiquetaPI6X3_4');

$colorPI6X3_5 = barraVerde($arrayVerde["data"][12]['subido']);
$colorClasePI6X3_5 = claseBarraVerde($colorPI6X3_5);
$etiquetaPI6X3_5 = etiquetaSubido($colorPI6X3_5,'etiquetaPI6X3_5');

$colorPICL1 = barraVerde($arrayVerde["data"][13]['subido']);
$colorClasePICL1 = claseBarraVerde($colorPICL1);
$etiquetaPICL1 = etiquetaSubido($colorPICL1,'etiquetaPICL1');

$colorPICL2 = barraVerde($arrayVerde["data"][14]['subido']);
$colorClasePICL2 = claseBarraVerde($colorPICL2);
$etiquetaPICL2 = etiquetaSubido($colorPICL2,'etiquetaPICL2');

$colorPIPL1 = barraVerde($arrayVerde["data"][15]['subido']);
$colorClasePIPL1 = claseBarraVerde($colorPIPL1);
$etiquetaPIPL1 = etiquetaSubido($colorPIPL1,'etiquetaPIPL1');

$colorPIPL2 = barraVerde($arrayVerde["data"][16]['subido']);
$colorClasePIPL2 = claseBarraVerde($colorPIPL2);
$etiquetaPIPL2 = etiquetaSubido($colorPIPL2,'etiquetaPIPL2');

$colorPIPL3 = barraVerde($arrayVerde["data"][17]['subido']);
$colorClasePIPL3 = claseBarraVerde($colorPIPL3);
$etiquetaPIPL3 = etiquetaSubido($colorPIPL3,'etiquetaPIPL3');

$colorPIPL4 = barraVerde($arrayVerde["data"][18]['subido']);
$colorClasePIPL4 = claseBarraVerde($colorPIPL4);
$etiquetaPIPL4 = etiquetaSubido($colorPIPL4,'etiquetaPIPL4');

$colorPIPL5 = barraVerde($arrayVerde["data"][19]['subido']);
$colorClasePIPL5 = claseBarraVerde($colorPIPL5);
$etiquetaPIPL5 = etiquetaSubido($colorPIPL5,'etiquetaPIPL5');

$colorPIPL6 = barraVerde($arrayVerde["data"][20]['subido']);
$colorClasePIPL6 = claseBarraVerde($colorPIPL6);
$etiquetaPIPL6 = etiquetaSubido($colorPIPL6,'etiquetaPIPL6');

$colorPIPL7 = barraVerde($arrayVerde["data"][21]['subido']);
$colorClasePIPL7 = claseBarraVerde($colorPIPL7);
$etiquetaPIPL7 = etiquetaSubido($colorPIPL7,'etiquetaPIPL7');

$colorPIPL8 = barraVerde($arrayVerde["data"][22]['subido']);
$colorClasePIPL8 = claseBarraVerde($colorPIPL8);
$etiquetaPIPL8 = etiquetaSubido($colorPIPL8,'etiquetaPIPL8');

$colorPIPL9 = barraVerde($arrayVerde["data"][23]['subido']);
$colorClasePIPL9 = claseBarraVerde($colorPIPL9);
$etiquetaPIPL9 = etiquetaSubido($colorPIPL9,'etiquetaPIPL9');

$colorPIPL10 = barraVerde($arrayVerde["data"][24]['subido']);
$colorClasePIPL10 = claseBarraVerde($colorPIPL10);
$etiquetaPIPL10 = etiquetaSubido($colorPIPL10,'etiquetaPIPL10');

$colorPIPL11 = barraVerde($arrayVerde["data"][25]['subido']);
$colorClasePIPL11 = claseBarraVerde($colorPIPL11);
$etiquetaPIPL11 = etiquetaSubido($colorPIPL11,'etiquetaPIPL11');

$colorPIPL12 = barraVerde($arrayVerde["data"][26]['subido']);
$colorClasePIPL12 = claseBarraVerde($colorPIPL12);
$etiquetaPIPL12 = etiquetaSubido($colorPIPL12,'etiquetaPIPL12');





?>
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/tabla_PI.js"></script>



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
        $('#page_content').load(`tabla_publicidad_pabellonPI.php?cod_pabellon=${codigo_pabellon}`);
    });
</script>

<div id="<?php echo $direccion_guardado; ?>" class="obtener_url"> </div>
<div id="<?php echo $id_pabellon_padre ?>" class="obtener_id_pabellon"></div>

<!--8X4-->
<div class="modal fade modal_banner_horizontal8x4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes Banner Horizontal 8x4 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner8x4" class="form-controlx">
                                            <input hidden value="PI8X4_1" name="banner8x4_1" class="form-control">
                                            <input hidden value="PI8X4_2" name="banner8x4_2" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 8X4 (PI8X4_1)</label>
                                                <?php echo $etiquetaPI8X4_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner8x4_1File" id="banner8x4_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI8X4_1; ?>" role="progressbar" style ="width:<?php echo $colorPI8X4_1; ?>%" aria-valuenow="<?php echo $colorPI8X4_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 8X4 (PI8X4_2)</label>
                                                <?php echo $etiquetaPI8X4_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner8x4_2File" id="banner8x4_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI8X4_2; ?>" role="progressbar" style ="width:<?php echo $colorPI8X4_2; ?>%" aria-valuenow="<?php echo $colorPI8X4_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Banner Horizontal 8x4 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">
                            <table >
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 8X4 (PI8X4_1)</label>
                                                <?php echo $etiquetaPI8X4_1; ?>
                                                <button type='button' class='btn btn-primary btn_vista_horizontal8x4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 8X4 (PI8X4_2)</label>
                                                <?php echo $etiquetaPI8X4_2; ?>
                                                <button type='button' class='btn btn-primary btn_vista_horizontal8x4_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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

<!--6x3-->
<div class="modal fade modal_banner_horizontal6x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes Banner horizontal 6X3 (5 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner6x3"></div>
                        <form id="formulario_banner6x3" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner6x3" class="form-controlx">
                                            <input hidden value="PI6X3_1" name="banner6x3_1" class="form-control">
                                            <input hidden value="PI6X3_2" name="banner6x3_2" class="form-control">
                                            <input hidden value="PI6X3_3" name="banner6x3_3" class="form-control">
                                            <input hidden value="PI6X3_4" name="banner6x3_4" class="form-control">
                                            <input hidden value="PI6X3_5" name="banner6x3_5" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 6X3 (PI6X3_1)</label>
                                                <?php echo $etiquetaPI6X3_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner6x3_1File" id="banner6x3_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI6X3_1; ?>" role="progressbar" style ="width:<?php echo $colorPI6X3_1; ?>%" aria-valuenow="<?php echo $colorPI6X3_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 6X3 (PI6X3_2)</label>
                                                <?php echo $etiquetaPI6X3_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner6x3_2File" id="banner6x3_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI6X3_2; ?>" role="progressbar" style ="width:<?php echo $colorPI6X3_2; ?>%" aria-valuenow="<?php echo $colorPI6X3_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 6X3 (PI6X3_3)</label>
                                                <?php echo $etiquetaPI6X3_3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner6x3_3File" id="banner6x3_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI6X3_3; ?>" role="progressbar" style ="width:<?php echo $colorPI6X3_3; ?>%" aria-valuenow="<?php echo $colorPI6X3_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 6X3 (PI6X3_4)</label>
                                                <?php echo $etiquetaPI6X3_4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner6x3_4File" id="banner6x3_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI6X3_4; ?>" role="progressbar" style ="width:<?php echo $colorPI6X3_4; ?>%" aria-valuenow="<?php echo $colorPI6X3_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 6X3 (PI6X3_5)</label>
                                                <?php echo $etiquetaPI6X3_5; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner6x3_5File" id="banner6x3_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_5" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI6X3_5; ?>" role="progressbar" style ="width:<?php echo $colorPI6X3_5; ?>%" aria-valuenow="<?php echo $colorPI6X3_5; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Banner Horizontal 6X3 (5 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner6x3"></div>
                        <form id="formulario_banner6x3" enctype="multipart/form-data">

                            <br>
                            <table>
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <label class="col-form-label w-100">Banner 6X3 (PI6X3_1)</label>
                                            <?php echo $etiquetaPI6X3_1; ?>
                                            <button type='button' class='btn btn-primary btn_vista_horizontal6x3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-hidden='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-hidden='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <label class="col-form-label w-100">Banner 6X3 (PI6X3_2)</label>
                                                <?php echo $etiquetaPI6X3_2; ?>
                                            <button type='button' class='btn btn-primary btn_vista_horizontal6x3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-hidden='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-hidden='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <label class="col-form-label w-100">Banner 6X3 (PI6X3_3)</label>
                                            <?php echo $etiquetaPI6X3_3; ?>
                                            <button type='button' class='btn btn-primary btn_vista_horizontal6x3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-hidden='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-hidden='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <label class="col-form-label w-100">Banner 6X3 (PI6X3_4)</label>
                                            <?php echo $etiquetaPI6X3_4; ?>
                                            <button type='button' class='btn btn-primary btn_vista_horizontal6x3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-hidden='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-hidden='true'></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <label class="col-form-label w-100">Banner 6X3 (PI6X3_5)</label>
                                            <?php echo $etiquetaPI6X3_5; ?>
                                            <button type='button' class='btn btn-primary btn_vista_horizontal6x3_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-hidden='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_horizontal6x3_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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

<!--3x6-->
<div class="modal fade modal_banner_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes Banner Vertical 3X6 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner3x6" class="form-controlx">
                                            <input hidden value="PI3X6_1" name="banner3X6_1" class="form-control">
                                            <input hidden value="PI3X6_2" name="banner3X6_2" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 3X6 (PI3X6_1)</label>
                                                <?php echo $etiquetaPI3X6_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner3X6_1File" id="banner3X6_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI3X6_1; ?>" role="progressbar" style ="width:<?php echo $colorPI3X6_1; ?>%" aria-valuenow="<?php echo $colorPI3X6_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 3X6 (PI3X6_2)</label>
                                                <?php echo $etiquetaPI3X6_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner3X6_2File" id="banner3X6_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI3X6_2; ?>" role="progressbar" style ="width:<?php echo $colorPI3X6_2; ?>%" aria-valuenow="<?php echo $colorPI3X6_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
<div class="modal fade modal_ver_borrar_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Banner Vertical 3X6 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">

                                    </div>
                                </div>
                            </div>
                            <br>
                            <table>
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (PI3X6_1)</label>
                                                <?php echo $etiquetaPI3X6_1; ?>
                                                <button type='button' class='btn btn-primary btn_vista_banner3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (PI3X6_2)</label>
                                                <?php echo $etiquetaPI3X6_2; ?>
                                                <button type='button' class='btn btn-primary btn_vista_banner3x6_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner3x6_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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

<!--25x3-->
<div class="modal fade modal_banner_vertical25x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes Banner Vertical 2.5X3 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner25x3" class="form-controlx">
                                            <input hidden value="PI2.5X3_1" name="banner25x3_1" class="form-control">
                                            <input hidden value="PI2.5X3_2" name="banner25x3_2" class="form-control">
                                            <input hidden value="PI2.5X3_3" name="banner25x3_3" class="form-control">
                                            <input hidden value="PI2.5X3_4" name="banner25x3_4" class="form-control">
                                            <input hidden id="id_pabellon_padre" value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table>

                            
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (PI2.5X3_1)</label>
                                                <?php echo $etiquetaPI2_5X3_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner25x3_1File" id="banner25x3_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI2_5X3_1; ?>" role="progressbar" style ="width:<?php echo $colorPI2_5X3_1; ?>%" aria-valuenow="<?php echo $colorPI2_5X3_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (PI2.5X3_2)</label>
                                                <?php echo $etiquetaPI2_5X3_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner25x3_2File" id="banner25x3_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI2_5X3_2; ?>" role="progressbar" style ="width:<?php echo $colorPI2_5X3_2; ?>%" aria-valuenow="<?php echo $colorPI2_5X3_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (PI2.5X3_3)</label>
                                                <?php echo $etiquetaPI2_5X3_3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner25x3_3File" id="banner25x3_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI2_5X3_3; ?>" role="progressbar" style ="width:<?php echo $colorPI2_5X3_3; ?>%" aria-valuenow="<?php echo $colorPI2_5X3_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (PI2.5X3_4)</label>
                                                <?php echo $etiquetaPI2_5X3_4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="banner25x3_4File" id="banner25x3_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePI2_5X3_4; ?>" role="progressbar" style ="width:<?php echo $colorPI2_5X3_4; ?>%" aria-valuenow="<?php echo $colorPI2_5X3_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Banner Vertical 2.5X3 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <table>
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (PI2.5X3_1)</label>
                                                <?php echo $etiquetaPI2_5X3_1; ?>
                                                <button type='button' class='btn btn-primary btn_vista_vertical25x3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical25x3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (PI2.5X3_2)</label>
                                                <?php echo $etiquetaPI2_5X3_2; ?>
                                                <button type='button' class='btn btn-primary btn_vista_vertical25x3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical25x3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (PI2.5X3_3)</label>
                                                <?php echo $etiquetaPI2_5X3_3; ?>
                                                <button type='button' class='btn btn-primary btn_vista_vertical25x3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical25x3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (PI2.5X3_4)</label>
                                                <?php echo $etiquetaPI2_5X3_4; ?>
                                                <button type='button' class='btn btn-primary btn_vista_vertical25x3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical25x3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir Cajas de Luz (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_cajaluz"></div>
                        <form id="formulario_cajaluz" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_cajasluz" class="form-controlx">
                                            <input hidden value="PICL1" name="cajaluz_1" class="form-control">
                                            <input hidden value="PICL2" name="cajaluz_2" class="form-control">
                                            <input hidden id="id_pabellon_padre" value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table>
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 1 (PICL1)</label>
                                                <?php echo $etiquetaPICL1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="cajaluz_1File" id="cajaluz_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePICL1; ?>" role="progressbar" style ="width:<?php echo $colorPICL1; ?>%" aria-valuenow="<?php echo $colorPICL1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 2 (PICL2)</label>
                                                <?php echo $etiquetaPICL2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="cajaluz_2File" id="cajaluz_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePICL2; ?>" role="progressbar" style ="width:<?php echo $colorPICL2; ?>%" aria-valuenow="<?php echo $colorPICL2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Cajas de Luz (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_cajaluz"></div>
                        <form id="formulario_cajaluz" enctype="multipart/form-data">
                            <table>
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 1 (PICL1)</label>
                                                <?php echo $etiquetaPICL1; ?>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100"> Caja Luz 2 (PICL2)</label>
                                                <?php echo $etiquetaPICL2; ?>
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
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir Plumas (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_plumas"></div>
                        <form id="formulario_plumas" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_plumas" class="form-controlx">
                                            <input hidden value="PIPL1" name="pluma_1" class="form-control">
                                            <input hidden value="PIPL2" name="pluma_2" class="form-control">
                                            <input hidden value="PIPL3" name="pluma_3" class="form-control">
                                            <input hidden value="PIPL4" name="pluma_4" class="form-control">
                                            <input hidden value="PIPL5" name="pluma_5" class="form-control">
                                            <input hidden value="PIPL6" name="pluma_6" class="form-control">
                                            <input hidden value="PIPL7" name="pluma_7" class="form-control">
                                            <input hidden value="PIPL8" name="pluma_8" class="form-control">
                                            <input hidden value="PIPL9" name="pluma_9" class="form-control">
                                            <input hidden value="PIPL10" name="pluma_10" class="form-control">
                                            <input hidden value="PIPL11" name="pluma_11" class="form-control">
                                            <input hidden value="PIPL12" name="pluma_12" class="form-control ">
                                            <input hidden id="id_auditorio_padre" value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table>
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 1 (PIPL1)</label>
                                                <?php echo $etiquetaPIPL1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_1File" id="pluma_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL1; ?>" role="progressbar" style ="width:<?php echo $colorPIPL1; ?>%" aria-valuenow="<?php echo $colorPIPL1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 2 (PIPL2)</label>
                                                <?php echo $etiquetaPIPL2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_2File" id="pluma_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL2; ?>" role="progressbar" style ="width:<?php echo $colorPIPL2; ?>%" aria-valuenow="<?php echo $colorPIPL2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 3 (PIPL3)</label>
                                                <?php echo $etiquetaPIPL3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_3File" id="pluma_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL3; ?>" role="progressbar" style ="width:<?php echo $colorPIPL3; ?>%" aria-valuenow="<?php echo $colorPIPL3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 4 (PIPL4)</label>
                                                <?php echo $etiquetaPIPL4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_4File" id="pluma_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL4; ?>" role="progressbar" style ="width:<?php echo $colorPIPL4; ?>%" aria-valuenow="<?php echo $colorPIPL4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 5 (PIPL5)</label>
                                                <?php echo $etiquetaPIPL5; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_5File" id="pluma_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_5" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL5; ?>" role="progressbar" style ="width:<?php echo $colorPIPL5; ?>%" aria-valuenow="<?php echo $colorPIPL5; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 6 (PIPL6)</label>
                                                <?php echo $etiquetaPIPL6; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_6File" id="pluma_6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_6" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL6; ?>" role="progressbar" style ="width:<?php echo $colorPIPL6; ?>%" aria-valuenow="<?php echo $colorPIPL6; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 7 (PIPL7)</label>
                                                <?php echo $etiquetaPIPL7; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_7File" id="pluma_7File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_7" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL7; ?>" role="progressbar" style ="width:<?php echo $colorPIPL7; ?>%" aria-valuenow="<?php echo $colorPIPL7; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 8 (PIPL8)</label>
                                                <?php echo $etiquetaPIPL8; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_8File" id="pluma_8File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_8" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL8; ?>" role="progressbar" style ="width:<?php echo $colorPIPL8; ?>%" aria-valuenow="<?php echo $colorPIPL8; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 9 (PIPL9)</label>
                                                <?php echo $etiquetaPIPL9; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_9File" id="pluma_9File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_9" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL9; ?>" role="progressbar" style ="width:<?php echo $colorPIPL9; ?>%" aria-valuenow="<?php echo $colorPIPL9; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 10 (PIPL10)</label>
                                                <?php echo $etiquetaPIPL10; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_10File" id="pluma_10File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_10" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL10; ?>" role="progressbar" style ="width:<?php echo $colorPIPL10; ?>%" aria-valuenow="<?php echo $colorPIPL10; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 11 (PIPL11)</label>
                                                <?php echo $etiquetaPIPL11; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_11File" id="pluma_11File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_11" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL11; ?>" role="progressbar" style ="width:<?php echo $colorPIPL11; ?>%" aria-valuenow="<?php echo $colorPIPL11; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 12 (PIPL12)</label>
                                                <?php echo $etiquetaPIPL12; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file"name="pluma_12File" id="pluma_12File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_12" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClasePIPL12; ?>" role="progressbar" style ="width:<?php echo $colorPIPL12; ?>%" aria-valuenow="<?php echo $colorPIPL12; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Plumas (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <table>
                            <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 1 (PIPL1)</label>
                                                <?php echo $etiquetaPIPL1; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td  class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 2 (PIPL2)</label>
                                                <?php echo $etiquetaPIPL2; ?>
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
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 3 (PIPL3)</label>
                                                <?php echo $etiquetaPIPL3; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 4 (PIPL4)</label>
                                                <?php echo $etiquetaPIPL4; ?>
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
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 5 (PIPL5)</label>
                                                <?php echo $etiquetaPIPL5; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 6 (PIPL6)</label>
                                                <?php echo $etiquetaPIPL6; ?>
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
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 7 (PIPL7)</label>
                                                <?php echo $etiquetaPIPL7; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 8 (PIPL8)</label>
                                                <?php echo $etiquetaPIPL8; ?>
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
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 9 (PIPL9)</label>
                                                <?php echo $etiquetaPIPL9; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 10 (PIPL10)</label>
                                                <?php echo $etiquetaPIPL10; ?>
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
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 11 (PIPL11)</label>
                                                <?php echo $etiquetaPIPL11; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 12 (PIPL12)</label>
                                                <?php echo $etiquetaPIPL12; ?>
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

<!-- Eliminar -->
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
                <input hidden name="nombre_archivo" id="nombre_archivo_borrar">

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

                <h5 class="modal-title " id="titulo_texto_prev">Vista Previa</h5>
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
        <h2>Piezas Publicitarias del <b>Pabellón Internacional</b></h2>
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
                    <td>2</td>
                    <td>2600X1300</td>
                    <td>
                        <div class="<?php echo $boton_PI8X4; ?>">
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
                        <div class="<?php echo $boton_PI6X3; ?>">
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
                        <div class="<?php echo $boton_PI3X6; ?>">
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
                            <button type='button' class='btn btn-primary btn-vista_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_ver_borrar_vertical3x6'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>


                    </td>
                </tr>
                <tr>
                    <td>Banner Vertical 2.5x3</td>
                    <td>4</td>
                    <td>1250X1500</td>
                    <td>
                        <div class="<?php echo $boton_PI25X3; ?>">
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
                    <td>Cajas de Luz</td>
                    <td>2</td>
                    <td>2000X1000</td>
                    <td>
                        <div class="<?php echo $boton_PICL; ?>">
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
                        <div class="<?php echo $boton_PIPL; ?>">
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
</div>