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


$query = "SELECT id_evento from lobby where id_lobby = '$id_pabellon_padre';";
$rest = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($rest)) {
    $array["data"][] = $data;
}

$var_id_evento = $array["data"][0]["id_evento"];

$array = null;
$query = "SELECT direccion_padre from lobby where id_lobby = '$id_pabellon_padre';";
$rest = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($rest)) {
    $array["data"][] = $data;
}

$direccion_padre = $array["data"][0]["direccion_padre"];
$query = "SELECT codigo_lobby from lobby where id_lobby = '$id_pabellon_padre';";
$rest = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($rest)) {
    $array["data"][] = $data;
}

$codigo_lobby = $array["data"][1]["codigo_lobby"];
$direccion_guardado = "$direccion_padre/$codigo_lobby/";

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

//LB18x10
$query_LB18X10 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'LB18X10%';";
$res_LB18X10 = mysqli_query($con, $query_LB18X10);
while ($data_LB18X10 = mysqli_fetch_assoc($res_LB18X10)) {
    $array_LB18X10["data"][] = $data_LB18X10;
}
$num_archivos_subidos_LB18X10 = $array_LB18X10["data"][0]["num_archivos_subidos"];
$boton_LB18X10 = decidir_boton($num_archivos_subidos_LB18X10, 2);

//LB8x4
$query_LB8X4 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'LB8X4%';";
$res_LB8X4 = mysqli_query($con, $query_LB8X4);
while ($data_LB8X4 = mysqli_fetch_assoc($res_LB8X4)) {
    $array_LB8X4["data"][] = $data_LB8X4;
}
$num_archivos_subidos_LB8X4 = $array_LB8X4["data"][0]["num_archivos_subidos"];
$boton_LB8X4 = decidir_boton($num_archivos_subidos_LB8X4, 4);

//LB3x6
$query_LB3X6 = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'LB3X6%';";
$res_LB3X6 = mysqli_query($con, $query_LB3X6);
while ($data_LB3X6 = mysqli_fetch_assoc($res_LB3X6)) {
    $array_LB3X6["data"][] = $data_LB3X6;
}
$num_archivos_subidos_LB3X6 = $array_LB3X6["data"][0]["num_archivos_subidos"];
$boton_LB3X6 = decidir_boton($num_archivos_subidos_LB3X6, 2);

//Plumas
$query_LBPL = "SELECT sum(subido) as num_archivos_subidos FROM publicidad_espacio WHERE id_padre='$id_pabellon_padre' AND nombre_publicidad LIKE 'LBPL%';";
$res_LBPL = mysqli_query($con, $query_LBPL);
while ($data_LBPL = mysqli_fetch_assoc($res_LBPL)) {
    $array_LBPL["data"][] = $data_LBPL;
}
$num_archivos_subidos_LBPL = $array_LBPL["data"][0]["num_archivos_subidos"];
$boton_LBPL = decidir_boton($num_archivos_subidos_LBPL, 34);

//---------------------------


$query="SELECT subido from publicidad_espacio where id_padre = '$id_pabellon_padre';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $arrayVerde["data"][] = $data;
}

$color3X6_1 = barraVerde($arrayVerde["data"][0]['subido']);
$color3X6_2 = barraVerde($arrayVerde["data"][1]['subido']);
$color8X4_1 = barraVerde($arrayVerde["data"][2]['subido']);
$color8X4_2 = barraVerde($arrayVerde["data"][3]['subido']);
$color8X4_3 = barraVerde($arrayVerde["data"][4]['subido']);
$color8X4_4 = barraVerde($arrayVerde["data"][5]['subido']);
$color18X10_1 = barraVerde($arrayVerde["data"][6]['subido']);
$color18X10_2 = barraVerde($arrayVerde["data"][7]['subido']);
$colorLBPL1 = barraVerde($arrayVerde["data"][8]['subido']);
$colorLBPL2 = barraVerde($arrayVerde["data"][9]['subido']);
$colorLBPL3 = barraVerde($arrayVerde["data"][10]['subido']);
$colorLBPL4 = barraVerde($arrayVerde["data"][11]['subido']);
$colorLBPL5 = barraVerde($arrayVerde["data"][12]['subido']);
$colorLBPL6 = barraVerde($arrayVerde["data"][13]['subido']);
$colorLBPL7 = barraVerde($arrayVerde["data"][14]['subido']);
$colorLBPL8 = barraVerde($arrayVerde["data"][15]['subido']);
$colorLBPL9 = barraVerde($arrayVerde["data"][16]['subido']);
$colorLBPL10 = barraVerde($arrayVerde["data"][17]['subido']);
$colorLBPL11 = barraVerde($arrayVerde["data"][18]['subido']);
$colorLBPL12 = barraVerde($arrayVerde["data"][19]['subido']);
$colorLBPL13 = barraVerde($arrayVerde["data"][20]['subido']);
$colorLBPL14 = barraVerde($arrayVerde["data"][21]['subido']);
$colorLBPL15 = barraVerde($arrayVerde["data"][22]['subido']);
$colorLBPL16 = barraVerde($arrayVerde["data"][23]['subido']);
$colorLBPL17 = barraVerde($arrayVerde["data"][24]['subido']);
$colorLBPL18 = barraVerde($arrayVerde["data"][25]['subido']);
$colorLBPL19 = barraVerde($arrayVerde["data"][26]['subido']);
$colorLBPL20 = barraVerde($arrayVerde["data"][27]['subido']);
$colorLBPL21 = barraVerde($arrayVerde["data"][28]['subido']);
$colorLBPL22 = barraVerde($arrayVerde["data"][29]['subido']);
$colorLBPL23 = barraVerde($arrayVerde["data"][30]['subido']);
$colorLBPL24 = barraVerde($arrayVerde["data"][31]['subido']);
$colorLBPL25 = barraVerde($arrayVerde["data"][32]['subido']);
$colorLBPL26 = barraVerde($arrayVerde["data"][33]['subido']);
$colorLBPL27 = barraVerde($arrayVerde["data"][34]['subido']);
$colorLBPL28 = barraVerde($arrayVerde["data"][35]['subido']);
$colorLBPL29 = barraVerde($arrayVerde["data"][36]['subido']);
$colorLBPL30 = barraVerde($arrayVerde["data"][37]['subido']);
$colorLBPL31 = barraVerde($arrayVerde["data"][38]['subido']);
$colorLBPL32 = barraVerde($arrayVerde["data"][39]['subido']);
$colorLBPL33 = barraVerde($arrayVerde["data"][40]['subido']);
$colorLBPL34 = barraVerde($arrayVerde["data"][41]['subido']);

$colorClase3X6_1 = claseBarraVerde($color3X6_1);
$colorClase3X6_2 = claseBarraVerde($color3X6_2);
$colorClase8X4_1 = claseBarraVerde($color8X4_1);
$colorClase8X4_2 = claseBarraVerde($color8X4_2);
$colorClase8X4_3 = claseBarraVerde($color8X4_3);
$colorClase8X4_4 = claseBarraVerde($color8X4_4);
$colorClase18X10_1 = claseBarraVerde($color18X10_1);
$colorClase18X10_2 = claseBarraVerde($color18X10_2);
$colorClaseLBPL1 = claseBarraVerde($colorLBPL1);
$colorClaseLBPL2 = claseBarraVerde($colorLBPL2);
$colorClaseLBPL3 = claseBarraVerde($colorLBPL3);
$colorClaseLBPL4 = claseBarraVerde($colorLBPL4);
$colorClaseLBPL5 = claseBarraVerde($colorLBPL5);
$colorClaseLBPL6 = claseBarraVerde($colorLBPL6);
$colorClaseLBPL7 = claseBarraVerde($colorLBPL7);
$colorClaseLBPL8 = claseBarraVerde($colorLBPL8);
$colorClaseLBPL9 = claseBarraVerde($colorLBPL9);
$colorClaseLBPL10 = claseBarraVerde($colorLBPL10);
$colorClaseLBPL11 = claseBarraVerde($colorLBPL11);
$colorClaseLBPL12 = claseBarraVerde($colorLBPL12);
$colorClaseLBPL13 = claseBarraVerde($colorLBPL13);
$colorClaseLBPL14 = claseBarraVerde($colorLBPL14);
$colorClaseLBPL15 = claseBarraVerde($colorLBPL15);
$colorClaseLBPL16 = claseBarraVerde($colorLBPL16);
$colorClaseLBPL17 = claseBarraVerde($colorLBPL17);
$colorClaseLBPL18 = claseBarraVerde($colorLBPL18);
$colorClaseLBPL19 = claseBarraVerde($colorLBPL19);
$colorClaseLBPL20 = claseBarraVerde($colorLBPL20);
$colorClaseLBPL21 = claseBarraVerde($colorLBPL21);
$colorClaseLBPL22 = claseBarraVerde($colorLBPL22);
$colorClaseLBPL23 = claseBarraVerde($colorLBPL23);
$colorClaseLBPL24 = claseBarraVerde($colorLBPL24);
$colorClaseLBPL25 = claseBarraVerde($colorLBPL25);
$colorClaseLBPL26 = claseBarraVerde($colorLBPL26);
$colorClaseLBPL27 = claseBarraVerde($colorLBPL27);
$colorClaseLBPL28 = claseBarraVerde($colorLBPL28);
$colorClaseLBPL29 = claseBarraVerde($colorLBPL29);
$colorClaseLBPL30 = claseBarraVerde($colorLBPL30);
$colorClaseLBPL31 = claseBarraVerde($colorLBPL31);
$colorClaseLBPL32 = claseBarraVerde($colorLBPL32);
$colorClaseLBPL33 = claseBarraVerde($colorLBPL33);
$colorClaseLBPL34 = claseBarraVerde($colorLBPL34);

$etiqueta3X6_1 = etiquetaSubido($color3X6_1,'etiqueta3X6_1');
$etiqueta3X6_2 = etiquetaSubido($color3X6_2,'etiqueta3X6_2');
$etiqueta8X4_1 = etiquetaSubido($color8X4_1,'etiqueta8X4_1');
$etiqueta8X4_2 = etiquetaSubido($color8X4_2,'etiqueta8X4_2');
$etiqueta8X4_3 = etiquetaSubido($color8X4_3,'etiqueta8X4_3');
$etiqueta8X4_4 = etiquetaSubido($color8X4_4,'etiqueta8X4_4');
$etiqueta18X10_1 = etiquetaSubido($color18X10_1,'etiqueta18X10_1');
$etiqueta18X10_2 = etiquetaSubido($color18X10_2,'etiqueta18X10_2');
$etiquetaLBPL1 = etiquetaSubido($colorLBPL1,'colorLBPL1');
$etiquetaLBPL2 = etiquetaSubido($colorLBPL2,'colorLBPL2');
$etiquetaLBPL3 = etiquetaSubido($colorLBPL3,'colorLBPL3');
$etiquetaLBPL4 = etiquetaSubido($colorLBPL4,'colorLBPL4');
$etiquetaLBPL5 = etiquetaSubido($colorLBPL5,'colorLBPL5');
$etiquetaLBPL6 = etiquetaSubido($colorLBPL6,'colorLBPL6');
$etiquetaLBPL7 = etiquetaSubido($colorLBPL7,'colorLBPL7');
$etiquetaLBPL8 = etiquetaSubido($colorLBPL8,'colorLBPL8');
$etiquetaLBPL9 = etiquetaSubido($colorLBPL9,'colorLBPL9');
$etiquetaLBPL10 = etiquetaSubido($colorLBPL10,'colorLBPL10');
$etiquetaLBPL11 = etiquetaSubido($colorLBPL11,'colorLBPL11');
$etiquetaLBPL12 = etiquetaSubido($colorLBPL12,'colorLBPL12');
$etiquetaLBPL13 = etiquetaSubido($colorLBPL13,'colorLBPL13');
$etiquetaLBPL14 = etiquetaSubido($colorLBPL14,'colorLBPL14');
$etiquetaLBPL15 = etiquetaSubido($colorLBPL15,'colorLBPL15');
$etiquetaLBPL16 = etiquetaSubido($colorLBPL16,'colorLBPL16');
$etiquetaLBPL17 = etiquetaSubido($colorLBPL17,'colorLBPL17');
$etiquetaLBPL18 = etiquetaSubido($colorLBPL18,'colorLBPL18');
$etiquetaLBPL19 = etiquetaSubido($colorLBPL19,'colorLBPL19');
$etiquetaLBPL20 = etiquetaSubido($colorLBPL20,'colorLBPL20');
$etiquetaLBPL21 = etiquetaSubido($colorLBPL21,'colorLBPL21');
$etiquetaLBPL22 = etiquetaSubido($colorLBPL22,'colorLBPL22');
$etiquetaLBPL23 = etiquetaSubido($colorLBPL23,'colorLBPL23');
$etiquetaLBPL24 = etiquetaSubido($colorLBPL24,'colorLBPL24');
$etiquetaLBPL25 = etiquetaSubido($colorLBPL25,'colorLBPL25');
$etiquetaLBPL26 = etiquetaSubido($colorLBPL26,'colorLBPL26');
$etiquetaLBPL27 = etiquetaSubido($colorLBPL27,'colorLBPL27');
$etiquetaLBPL28 = etiquetaSubido($colorLBPL28,'colorLBPL28');
$etiquetaLBPL29 = etiquetaSubido($colorLBPL29,'colorLBPL29');
$etiquetaLBPL30 = etiquetaSubido($colorLBPL30,'colorLBPL30');
$etiquetaLBPL31 = etiquetaSubido($colorLBPL31,'colorLBPL31');
$etiquetaLBPL32 = etiquetaSubido($colorLBPL32,'colorLBPL32');
$etiquetaLBPL33 = etiquetaSubido($colorLBPL33,'colorLBPL33');
$etiquetaLBPL34 = etiquetaSubido($colorLBPL34,'colorLBPL34');



?>

<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/standEditarContenidoLobby.js"></script>




<div class="obtener_id_evento" id="<?php echo $var_id_evento ?>"></div>


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
        $('#page_content').load(`tabla_publicidad_lobby.php?cod_pabellon=${codigo_pabellon}`);
    });
</script>





<div id="<?php echo $direccion_guardado; ?>" class="obtener_url"></div>
<div id="<?php echo $id_pabellon_padre; ?>" class="obtener_id_pabellon"></div>

<!-- 3x6 -->
<div class="modal fade modal_banner_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">

                <div class="card text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Vertical 3x6 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner3x6" class="form-controlx">
                                            <input hidden value="LB3X6_1" name="banner3X6_1" class="form-control">
                                            <input hidden value="LB3X6_2" name="banner3X6_2" class="form-control">

                                            <input hidden value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 3X6 (LB3X6_1)</label>
                                                <?php echo $etiqueta3X6_1; ?>
                                                <input  style="color: transparent; margin-left:27%;" type="file" name="banner3X6_1File" id="banner3X6_1File" accept="image/png, .jpeg, .jpg" >
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClase3X6_1; ?>" role="progressbar" style ="width:<?php echo $color3X6_1; ?>%" aria-valuenow="<?php echo $color3X6_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 3X6 (LB3X6_2)</label>
                                                <?php echo $etiqueta3X6_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner3X6_2File" id="banner3X6_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClase3X6_2; ?>" role="progressbar" style ="width:<?php echo $color3X6_2; ?>%" aria-valuenow="<?php echo $color3X6_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

<!-- 8X4 -->
<div class="modal fade modal_banner_horizontal8x4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Horizontal 8X4 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner8x4" class="form-controlx">
                                            <input hidden value="LB8X4_1" name="banner8x4_1" class="form-control">
                                            <input hidden value="LB8X4_2" name="banner8x4_2" class="form-control">
                                            <input hidden value="LB8X4_3" name="banner8x4_3" class="form-control">
                                            <input hidden value="LB8X4_4" name="banner8x4_4" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 8X4 (LB8X4_1)</label>
                                                <?php echo $etiqueta8X4_1; ?>
                                                <input style="color: transparent; margin-left:27%;" type="file" name="banner8x4_1File" id="banner8x4_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_1" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClase8X4_1; ?>" role="progressbar" style ="width:<?php echo $color8X4_1; ?>%" aria-valuenow="<?php echo $color8X4_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 8X4 (LB8X4_2)</label>
                                                <?php echo $etiqueta8X4_2; ?>
                                                <input style="color: transparent; margin-left:27%;" type="file" name="banner8x4_2File" id="banner8x4_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClase8X4_2; ?>" role="progressbar" style ="width:<?php echo $color8X4_2; ?>%" aria-valuenow="<?php echo $color8X4_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 8X4 (LB8X4_3)</label>
                                                <?php echo $etiqueta8X4_3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner8x4_3File" id="banner8x4_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClase8X4_3; ?>" role="progressbar" style ="width:<?php echo $color8X4_3; ?>%" aria-valuenow="<?php echo $color8X4_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner 8X4 (LB8X4_4)</label>
                                                <?php echo $etiqueta8X4_4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner8x4_4File" id="banner8x4_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClase8X4_4; ?>" role="progressbar" style ="width:<?php echo $color8X4_4; ?>%" aria-valuenow="<?php echo $color8X4_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

<!-- 18x10 -->
<div class="modal fade modal_gran_formato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Gran Formato (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_granFormato"></div>
                        <form id="formulario_granFormato" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_granFormato" class="form-controlx">
                                            <input hidden value="LB18X10_1" name="granFormato_1" class="form-control">
                                            <input hidden value="LB18X10_2" name="granFormato_2" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner Gran Formato 18X10 (LB18X10_1)</label>
                                                <?php echo $etiqueta18X10_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="granFormato_1File" id="granFormato_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_granFormato_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClase18X10_1; ?>" role="progressbar" style ="width:<?php echo $color18X10_1; ?>%" aria-valuenow="<?php echo $color18X10_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td  class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para el Banner Gran Formato 18X10 (LB18X10_2)</label>
                                                <?php echo $etiqueta18X10_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="granFormato_2File" id="granFormato_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_granFormato_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClase18X10_2; ?>" role="progressbar" style ="width:<?php echo $color18X10_2; ?>%" aria-valuenow="<?php echo $color18X10_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

<!-- 3x6 -->
<div class="modal fade modal_edit_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Banner Vertical 3x6 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <table >
                                <tr class="row" >
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (LB3X6_1)</label>
                                                <?php echo $etiqueta3X6_1; ?>
                                                <button type='button' class='btn btn-primary btn-vista_vertical3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_vertical3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (LB3X6_2)</label>
                                                <?php echo $etiqueta3X6_2; ?>
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

<!-- 8X4 -->
<div class="modal fade modal_edit_horizontal8x4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Banner Horizontal 8X4 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">

                            <br>
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (LB8X4_1)</label>
                                                <?php echo $etiqueta8X4_1; ?>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (LB8X4_2)</label>
                                                <?php echo $etiqueta8X4_2; ?>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (LB8X4_3)</label>
                                                <?php echo $etiqueta8X4_3; ?>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Horizontal 8X4 (LB8X4_4)</label>
                                                <?php echo $etiqueta8X4_4; ?>
                                                <button type='button' class='btn btn-primary btn-vista_horizontal8x4_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_horizontal8x4_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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

<div class="modal fade edit_modal_gran_formato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Banner Gran Formato (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_granFormato"></div>
                        <form id="formulario_granFormato" enctype="multipart/form-data">

                            <br>

                            <table >
                                <tr class="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Gran Formato 18X10 (LB18X10_1)</label>
                                                <?php echo $etiqueta18X10_1; ?>
                                                <button type='button' class='btn btn-primary btn-vista_gran_formato_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gran_formato_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Gran Formato 18X10 (LB18X10_2)</label>
                                                <?php echo $etiqueta18X10_2; ?>
                                                <button type='button' class='btn btn-primary btn-vista_gran_formato_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gran_formato_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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

<!-- Plumas -->
<div class="modal fade modal_plumas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir Plumas (34 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_plumas"></div>
                        <form id="formulario_plumas" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_plumas" class="form-controlx">
                                            <input hidden value="LBPL1" name="pluma_1" class="form-control">
                                            <input hidden value="LBPL2" name="pluma_2" class="form-control">
                                            <input hidden value="LBPL3" name="pluma_3" class="form-control">
                                            <input hidden value="LBPL4" name="pluma_4" class="form-control">
                                            <input hidden value="LBPL5" name="pluma_5" class="form-control">
                                            <input hidden value="LBPL6" name="pluma_6" class="form-control">
                                            <input hidden value="LBPL7" name="pluma_7" class="form-control">
                                            <input hidden value="LBPL8" name="pluma_8" class="form-control">
                                            <input hidden value="LBPL9" name="pluma_9" class="form-control">
                                            <input hidden value="LBPL10" name="pluma_10" class="form-control">
                                            <input hidden value="LBPL11" name="pluma_11" class="form-control">
                                            <input hidden value="LBPL12" name="pluma_12" class="form-control">
                                            <input hidden value="LBPL13" name="pluma_13" class="form-control">
                                            <input hidden value="LBPL14" name="pluma_14" class="form-control">
                                            <input hidden value="LBPL15" name="pluma_15" class="form-control">
                                            <input hidden value="LBPL16" name="pluma_16" class="form-control">
                                            <input hidden value="LBPL17" name="pluma_17" class="form-control">
                                            <input hidden value="LBPL18" name="pluma_18" class="form-control">
                                            <input hidden value="LBPL19" name="pluma_19" class="form-control">
                                            <input hidden value="LBPL20" name="pluma_20" class="form-control">
                                            <input hidden value="LBPL21" name="pluma_21" class="form-control">
                                            <input hidden value="LBPL22" name="pluma_22" class="form-control">
                                            <input hidden value="LBPL23" name="pluma_23" class="form-control">
                                            <input hidden value="LBPL24" name="pluma_24" class="form-control">
                                            <input hidden value="LBPL25" name="pluma_25" class="form-control">
                                            <input hidden value="LBPL26" name="pluma_26" class="form-control">
                                            <input hidden value="LBPL27" name="pluma_27" class="form-control">
                                            <input hidden value="LBPL28" name="pluma_28" class="form-control">
                                            <input hidden value="LBPL29" name="pluma_29" class="form-control">
                                            <input hidden value="LBPL30" name="pluma_30" class="form-control">
                                            <input hidden value="LBPL31" name="pluma_31" class="form-control">
                                            <input hidden value="LBPL32" name="pluma_32" class="form-control">
                                            <input hidden value="LBPL33" name="pluma_33" class="form-control">
                                            <input hidden value="LBPL34" name="pluma_34" class="form-control">
                                            <input hidden value="<?php echo $id_pabellon_padre; ?> " name="codigo_pabellon_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <table >
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 1 (LBPL1)</label>
                                                <?php echo $etiquetaLBPL1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_1File" id="pluma_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_1" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL1; ?>" role="progressbar" style ="width:<?php echo $colorLBPL1; ?>%" aria-valuenow="<?php echo $colorLBPL1; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 2 (LBPL2)</label>
                                                <?php echo $etiquetaLBPL2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_2File" id="pluma_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_2" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL2; ?>" role="progressbar" style ="width:<?php echo $colorLBPL2; ?>%" aria-valuenow="<?php echo $colorLBPL2; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 3 (LBPL3)</label>
                                                <?php echo $etiquetaLBPL3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_3File" id="pluma_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_3" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL3; ?>" role="progressbar" style ="width:<?php echo $colorLBPL3; ?>%" aria-valuenow="<?php echo $colorLBPL3; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 4 (LBPL4)</label>
                                                <?php echo $etiquetaLBPL4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_4File" id="pluma_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_4" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL4; ?>" role="progressbar" style ="width:<?php echo $colorLBPL4; ?>%" aria-valuenow="<?php echo $colorLBPL4; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 5 (LBPL5)</label>
                                                <?php echo $etiquetaLBPL5; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_5File" id="pluma_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_5" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL5; ?>" role="progressbar" style ="width:<?php echo $colorLBPL5; ?>%" aria-valuenow="<?php echo $colorLBPL5; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 6 (LBPL6)</label>
                                                <?php echo $etiquetaLBPL6; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_6File" id="pluma_6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_6" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL6; ?>" role="progressbar" style ="width:<?php echo $colorLBPL6; ?>%" aria-valuenow="<?php echo $colorLBPL6; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 7 (LBPL7)</label>
                                                <?php echo $etiquetaLBPL7; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_7File" id="pluma_7File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_7" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL7; ?>" role="progressbar" style ="width:<?php echo $colorLBPL7; ?>%" aria-valuenow="<?php echo $colorLBPL7; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 8 (LBPL8)</label>
                                                <?php echo $etiquetaLBPL8; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_8File" id="pluma_8File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_8" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL8; ?>" role="progressbar" style ="width:<?php echo $colorLBPL8; ?>%" aria-valuenow="<?php echo $colorLBPL8; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 9 (LBPL9)</label>
                                                <?php echo $etiquetaLBPL9; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_9File" id="pluma_9File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_9" class="progress-bar progress-bar-striped progress-bar-animated"  <?php echo $colorClaseLBPL9; ?>" role="progressbar" style ="width:<?php echo $colorLBPL9; ?>%" aria-valuenow="<?php echo $colorLBPL9; ?>"aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 10 (LBPL10)</label>
                                                <?php echo $etiquetaLBPL10; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_10File" id="pluma_10File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_10" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL10; ?>" role="progressbar" style ="width:<?php echo $colorLBPL10; ?>%" aria-valuenow="<?php echo $colorLBPL10; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 11 (LBPL11)</label>
                                                <?php echo $etiquetaLBPL11; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_11File" id="pluma_11File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_11" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL11; ?>" role="progressbar" style ="width:<?php echo $colorLBPL11; ?>%" aria-valuenow="<?php echo $colorLBPL11; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 12 (LBPL12)</label>
                                                <?php echo $etiquetaLBPL12; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_12File" id="pluma_12File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_12" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL12; ?>" role="progressbar" style ="width:<?php echo $colorLBPL12; ?>%" aria-valuenow="<?php echo $colorLBPL12; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 13 (LBPL13)</label>
                                                <?php echo $etiquetaLBPL13; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_13File" id="pluma_13File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_13" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL13; ?>" role="progressbar" style ="width:<?php echo $colorLBPL13; ?>%" aria-valuenow="<?php echo $colorLBPL13; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 14 (LBPL14)</label>
                                                <?php echo $etiquetaLBPL14; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_14File" id="pluma_14File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_14" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL14; ?>" role="progressbar" style ="width:<?php echo $colorLBPL14; ?>%" aria-valuenow="<?php echo $colorLBPL14; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 15 (LBPL15)</label>
                                                <?php echo $etiquetaLBPL15; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_15File" id="pluma_15File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_15" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL15; ?>" role="progressbar" style ="width:<?php echo $colorLBPL15; ?>%" aria-valuenow="<?php echo $colorLBPL15; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 14 (LBPL16)</label>
                                                <?php echo $etiquetaLBPL16; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_16File" id="pluma_16File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_16" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL16; ?>" role="progressbar" style ="width:<?php echo $colorLBPL16; ?>%" aria-valuenow="<?php echo $colorLBPL16; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 17 (LBPL17)</label>
                                                <?php echo $etiquetaLBPL17; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_17File" id="pluma_17File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_17" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL17; ?>" role="progressbar" style ="width:<?php echo $colorLBPL17; ?>%" aria-valuenow="<?php echo $colorLBPL17; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 18 (LBPL18)</label>
                                                <?php echo $etiquetaLBPL18; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_18File" id="pluma_18File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_18" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL18; ?>" role="progressbar" style ="width:<?php echo $colorLBPL18; ?>%" aria-valuenow="<?php echo $colorLBPL18; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 19 (LBPL19)</label>
                                                <?php echo $etiquetaLBPL19; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_19File" id="pluma_19File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_19" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL19; ?>" role="progressbar" style ="width:<?php echo $colorLBPL19; ?>%" aria-valuenow="<?php echo $colorLBPL19; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 20 (LBPL20)</label>
                                                <?php echo $etiquetaLBPL20; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_20File" id="pluma_20File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_20" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL20; ?>" role="progressbar" style ="width:<?php echo $colorLBPL20; ?>%" aria-valuenow="<?php echo $colorLBPL20; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 21 (LBPL21)</label>
                                                <?php echo $etiquetaLBPL21; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_21File" id="pluma_21File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_21" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL21; ?>" role="progressbar" style ="width:<?php echo $colorLBPL21; ?>%" aria-valuenow="<?php echo $colorLBPL21; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 22 (LBPL22)</label>
                                                <?php echo $etiquetaLBPL22; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_22File" id="pluma_22File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_22" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL22; ?>" role="progressbar" style ="width:<?php echo $colorLBPL22; ?>%" aria-valuenow="<?php echo $colorLBPL22; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 23 (LBPL23)</label>
                                                <?php echo $etiquetaLBPL23; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_23File" id="pluma_23File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_23" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL23; ?>" role="progressbar" style ="width:<?php echo $colorLBPL23; ?>%" aria-valuenow="<?php echo $colorLBPL23; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 24 (LBPL24)</label>
                                                <?php echo $etiquetaLBPL24; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_24File" id="pluma_24File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_24" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL24; ?>" role="progressbar" style ="width:<?php echo $colorLBPL24; ?>%" aria-valuenow="<?php echo $colorLBPL24; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 25 (LBPL25)</label>
                                                <?php echo $etiquetaLBPL25; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_25File" id="pluma_25File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_25" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL25; ?>" role="progressbar" style ="width:<?php echo $colorLBPL25; ?>%" aria-valuenow="<?php echo $colorLBPL25; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 26 (LBPL26)</label>
                                                <?php echo $etiquetaLBPL26; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_26File" id="pluma_26File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_26" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL26; ?>" role="progressbar" style ="width:<?php echo $colorLBPL26; ?>%" aria-valuenow="<?php echo $colorLBPL26; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 27 (LBPL27)</label>
                                                <?php echo $etiquetaLBPL27; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_27File" id="pluma_27File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_27" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL27; ?>" role="progressbar" style ="width:<?php echo $colorLBPL27; ?>%" aria-valuenow="<?php echo $colorLBPL26; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 28 (LBPL28)</label>
                                                <?php echo $etiquetaLBPL28; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_28File" id="pluma_28File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_28" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL28; ?>" role="progressbar" style ="width:<?php echo $colorLBPL28; ?>%" aria-valuenow="<?php echo $colorLBPL28; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 29 (LBPL29)</label>
                                                <?php echo $etiquetaLBPL29; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_29File" id="pluma_29File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_29" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL29; ?>" role="progressbar" style ="width:<?php echo $colorLBPL29; ?>%" aria-valuenow="<?php echo $colorLBPL29; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 30 (LBPL30)</label>
                                                <?php echo $etiquetaLBPL30; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_30File" id="pluma_30File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_30" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL30; ?>" role="progressbar" style ="width:<?php echo $colorLBPL30; ?>%" aria-valuenow="<?php echo $colorLBPL30; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 31 (LBPL31)</label>
                                                <?php echo $etiquetaLBPL31; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_31File" id="pluma_31File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_31" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL31; ?>" role="progressbar" style ="width:<?php echo $colorLBPL31; ?>%" aria-valuenow="<?php echo $colorLBPL31; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 32 (LBPL32)</label>
                                                <?php echo $etiquetaLBPL32; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_32File" id="pluma_32File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_32" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL32; ?>" role="progressbar" style ="width:<?php echo $colorLBPL32; ?>%" aria-valuenow="<?php echo $colorLBPL32; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 33 (LBPL33)</label>
                                                <?php echo $etiquetaLBPL33; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_33File" id="pluma_33File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_33" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL33; ?>" role="progressbar" style ="width:<?php echo $colorLBPL33; ?>%" aria-valuenow="<?php echo $colorLBPL33; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 34 (LBPL34)</label>
                                                <?php echo $etiquetaLBPL34; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_34File" id="pluma_34File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_34" class="progress-bar progress-bar-striped progress-bar-animated  <?php echo $colorClaseLBPL34; ?>" role="progressbar" style ="width:<?php echo $colorLBPL34; ?>%" aria-valuenow="<?php echo $colorLBPL34; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Plumas (34 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 1 (LBPL1)</label>
                                                <?php echo $etiquetaLBPL1; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 2 (LBPL2)</label>
                                                <?php echo $etiquetaLBPL2; ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 3 (LBPL3)</label>
                                                <?php echo $etiquetaLBPL3; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 4 (LBPL4)</label>
                                                <?php echo $etiquetaLBPL4; ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 5 (LBPL5)</label>
                                                <?php echo $etiquetaLBPL5; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 6 (LBPL6)</label>
                                                <?php echo $etiquetaLBPL6; ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 7 (LBPL7)</label>
                                                <?php echo $etiquetaLBPL7; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 8 (LBPL8)</label>
                                                <?php echo $etiquetaLBPL8; ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 9 (LBPL9)</label>
                                                <?php echo $etiquetaLBPL9; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 10 (LBPL10)</label>
                                                <?php echo $etiquetaLBPL10; ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 11 (LBPL11)</label>
                                                <?php echo $etiquetaLBPL11; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 12 (LBPL12)</label>
                                                <?php echo $etiquetaLBPL12; ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 13 (LBPL13)</label>
                                                <?php echo $etiquetaLBPL13; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_13' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_13' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 14 (LBPL14)</label>
                                                <?php echo $etiquetaLBPL14; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_14' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_14' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 15 (LBPL15)</label>
                                                <?php echo $etiquetaLBPL15; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_15' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_15' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 16 (LBPL16)</label>
                                                <?php echo $etiquetaLBPL16; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_16' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_16' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 17 (LBPL17)</label>
                                                <?php echo $etiquetaLBPL17; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_17' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_17' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 18 (LBPL18)</label>
                                                <?php echo $etiquetaLBPL18; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_18' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_18' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 19 (LBPL19)</label>
                                                <?php echo $etiquetaLBPL19; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_19' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_19' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 20 (LBPL20)</label>
                                                <?php echo $etiquetaLBPL20; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_20' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_20' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 21 (LBPL21)</label>
                                                <?php echo $etiquetaLBPL21; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_21' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_21' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 22 (LBPL22)</label>
                                                <?php echo $etiquetaLBPL22; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_22' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_22' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 23 (LBPL23)</label>
                                                <?php echo $etiquetaLBPL23; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_23' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_23' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 24 (LBPL24)</label>
                                                <?php echo $etiquetaLBPL24; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_24' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_24' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 25 (LBPL25)</label>
                                                <?php echo $etiquetaLBPL25; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_25' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_25' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 26 (LBPL26)</label>
                                                <?php echo $etiquetaLBPL26; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_26' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_26' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 27 (LBPL27)</label>
                                                <?php echo $etiquetaLBPL27; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_27' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_27' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 28 (LBPL28)</label>
                                                <?php echo $etiquetaLBPL28; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_28' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_28' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 29 (LBPL29)</label>
                                                <?php echo $etiquetaLBPL29; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_29' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_29' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 30 (LBPL30)</label>
                                                <?php echo $etiquetaLBPL30; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_30' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_30' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 31 (LBPL31)</label>
                                                <?php echo $etiquetaLBPL31; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_31' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_31' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 32 (LBPL32)</label>
                                                <?php echo $etiquetaLBPL32; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_32' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_32' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 33 (LBPL33)</label>
                                                <?php echo $etiquetaLBPL33; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_33' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_33' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-hidden='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 34 (LBPL34)</label>
                                                <?php echo $etiquetaLBPL34; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_34' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-hidden='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_34' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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
        <h2>Piezas Publicitarias del <b>Lobby</b></h2>
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
                    <td>Banner Gran Formato 18x10</td>
                    <td>2</td>
                    <td>2700X1500</td>
                    <td>
                        <div class="<?php echo $boton_LB18X10; ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_gran_formato'>
                                <i class='fa fa-cloud-upload' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.edit_modal_gran_formato'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Banner Horizontal 8x4</td>
                    <td>4</td>
                    <td>2600X1300</td>
                    <td>
                        <div class="<?php echo $boton_LB8X4; ?>">
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
                            <button type='button' class='btn btn-primary btn-vista_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_edit_horizontal8x4'>
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
                        <div class="<?php echo $boton_LB3X6; ?>">
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
                            <button type='button' class='btn btn-primary btn-vista_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_edit_vertical3x6'>
                                <i class='far fa-edit' aria-hidden='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Plumas</td>
                    <td>34</td>
                    <td>540X2575</td>
                    <td>
                        <div class="<?php echo $boton_LBPL; ?>">
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