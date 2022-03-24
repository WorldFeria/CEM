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


$id_auditorio_padre = $_GET['IDAUDI'];

$query = "SELECT  id_evento from auditorio where id_auditorio = '$id_auditorio_padre';";
$rest = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($rest)) {

    //$array['data'][] = array_map("utf8_encode", $data);
    $array["data"][] = $data;
}

$id_evento = $array["data"][0]["id_evento"];


$array = null;
$query = "SELECT direccion_padre from auditorio where id_auditorio = '$id_auditorio_padre';";
$rest = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($rest)) {

    //$array['data'][] = array_map("utf8_encode", $data);
    $array["data"][] = $data;
}

$direccion_padre = $array["data"][0]["direccion_padre"];
$query = "SELECT codigo_auditorio from auditorio where id_auditorio = '$id_auditorio_padre';";
$rest = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($rest)) {

    //$array['data'][] = array_map("utf8_encode", $data);
    $array["data"][] = $data;
}

$codigo_auditorio = $array["data"][1]["codigo_auditorio"];
$direccion_guardado = "$direccion_padre/$codigo_auditorio/";




$query="SELECT subido from publicidad_espacio where id_padre = '$id_auditorio_padre';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $arrayVerde["data"][] = $data;
}



$colorAA3X6_1 = barraVerde($arrayVerde["data"][0]['subido']);
$colorClaseAA3X6_1 = claseBarraVerde($colorAA3X6_1);
$etiquetaAA3X6_1 = etiquetaSubido($colorAA3X6_1,'etiquetaAA3X6_1');

$colorAA3X6_2 = barraVerde($arrayVerde["data"][1]['subido']);
$colorClaseAA3X6_2 = claseBarraVerde($colorAA3X6_2);
$etiquetaAA3X6_2 = etiquetaSubido($colorAA3X6_2,'etiquetaAA3X6_2');

$colorAA3X6_3 = barraVerde($arrayVerde["data"][2]['subido']);
$colorClaseAA3X6_3 = claseBarraVerde($colorAA3X6_3);
$etiquetaAA3X6_3 = etiquetaSubido($colorAA3X6_3,'etiquetaAA3X6_3');

$colorAA3X6_4 = barraVerde($arrayVerde["data"][3]['subido']);
$colorClaseAA3X6_4 = claseBarraVerde($colorAA3X6_4);
$etiquetaAA3X6_4 = etiquetaSubido($colorAA3X6_4,'etiquetaAA3X6_4');

$colorAA2_5X3_1 = barraVerde($arrayVerde["data"][4]['subido']);
$colorClaseAA2_5X3_1 = claseBarraVerde($colorAA2_5X3_1);
$etiquetaAA2_5X3_1 = etiquetaSubido($colorAA2_5X3_1,'etiquetaAA2_5X3_1');

$colorAA2_5X3_2 = barraVerde($arrayVerde["data"][5]['subido']);
$colorClaseAA2_5X3_2 = claseBarraVerde($colorAA2_5X3_2);
$etiquetaAA2_5X3_2 = etiquetaSubido($colorAA2_5X3_2,'etiquetaAA2_5X3_2');

$colorAA2_5X3_3 = barraVerde($arrayVerde["data"][6]['subido']);
$colorClaseAA2_5X3_3 = claseBarraVerde($colorAA2_5X3_3);
$etiquetaAA2_5X3_3 = etiquetaSubido($colorAA2_5X3_3,'etiquetaAA2_5X3_3');

$colorAA2_5X3_4 = barraVerde($arrayVerde["data"][7]['subido']);
$colorClaseAA2_5X3_4 = claseBarraVerde($colorAA2_5X3_4);
$etiquetaAA2_5X3_4 = etiquetaSubido($colorAA2_5X3_4,'etiquetaAA2_5X3_4');

$colorAA2_5X3_5 = barraVerde($arrayVerde["data"][8]['subido']);
$colorClaseAA2_5X3_5 = claseBarraVerde($colorAA2_5X3_5);
$etiquetaAA2_5X3_5 = etiquetaSubido($colorAA2_5X3_5,'etiquetaAA2_5X3_5');

$colorAA2_5X3_6 = barraVerde($arrayVerde["data"][9]['subido']);
$colorClaseAA2_5X3_6 = claseBarraVerde($colorAA2_5X3_6);
$etiquetaAA2_5X3_6 = etiquetaSubido($colorAA2_5X3_6,'etiquetaAA2_5X3_6');

$colorAA2_5X3_7 = barraVerde($arrayVerde["data"][10]['subido']);
$colorClaseAA2_5X3_7 = claseBarraVerde($colorAA2_5X3_7);
$etiquetaAA2_5X3_7 = etiquetaSubido($colorAA2_5X3_7,'etiquetaAA2_5X3_7');

$colorAA2_5X3_8 = barraVerde($arrayVerde["data"][11]['subido']);
$colorClaseAA2_5X3_8 = claseBarraVerde($colorAA2_5X3_8);
$etiquetaAA2_5X3_8 = etiquetaSubido($colorAA2_5X3_8,'etiquetaAA2_5X3_8');

$colorAA2_5X3_9 = barraVerde($arrayVerde["data"][12]['subido']);
$colorClaseAA2_5X3_9 = claseBarraVerde($colorAA2_5X3_9);
$etiquetaAA2_5X3_9 = etiquetaSubido($colorAA2_5X3_9,'etiquetaAA2_5X3_9');

$colorAA2_5X3_10 = barraVerde($arrayVerde["data"][13]['subido']);
$colorClaseAA2_5X3_10 = claseBarraVerde($colorAA2_5X3_10);
$etiquetaAA2_5X3_10 = etiquetaSubido($colorAA2_5X3_10,'etiquetaAA2_5X3_10');

$colorAA2_5X3_11 = barraVerde($arrayVerde["data"][14]['subido']);
$colorClaseAA2_5X3_11 = claseBarraVerde($colorAA2_5X3_11);
$etiquetaAA2_5X3_11 = etiquetaSubido($colorAA2_5X3_11,'etiquetaAA2_5X3_11');

$colorAA2_5X3_12 = barraVerde($arrayVerde["data"][15]['subido']);
$colorClaseAA2_5X3_12 = claseBarraVerde($colorAA2_5X3_12);
$etiquetaAA2_5X3_12 = etiquetaSubido($colorAA2_5X3_12,'etiquetaAA2_5X3_12');

$colorAA8X4_1 = barraVerde($arrayVerde["data"][16]['subido']);
$colorClaseAA8X4_1 = claseBarraVerde($colorAA8X4_1);
$etiquetaAA8X4_1 = etiquetaSubido($colorAA8X4_1,'etiquetaAA8X4_1');

$colorAA8X4_2 = barraVerde($arrayVerde["data"][17]['subido']);
$colorClaseAA8X4_2 = claseBarraVerde($colorAA8X4_2);
$etiquetaAA8X4_2 = etiquetaSubido($colorAA8X4_2,'etiquetaAA8X4_2');

$colorAA6X3_1 = barraVerde($arrayVerde["data"][18]['subido']);
$colorClaseAA6X3_1 = claseBarraVerde($colorAA6X3_1);
$etiquetaAA6X3_1 = etiquetaSubido($colorAA6X3_1,'etiquetaAA6X3_1');

$colorAA6X3_2 = barraVerde($arrayVerde["data"][19]['subido']);
$colorClaseAA6X3_2 = claseBarraVerde($colorAA6X3_2);
$etiquetaAA6X3_2 = etiquetaSubido($colorAA6X3_2,'etiquetaAA6X3_2');

$colorAA6X3_3 = barraVerde($arrayVerde["data"][20]['subido']);
$colorClaseAA6X3_3 = claseBarraVerde($colorAA6X3_3);
$etiquetaAA6X3_3 = etiquetaSubido($colorAA6X3_3,'etiquetaAA6X3_3');

$colorAA6X3_4 = barraVerde($arrayVerde["data"][21]['subido']);
$colorClaseAA6X3_4 = claseBarraVerde($colorAA6X3_4);
$etiquetaAA6X3_4 = etiquetaSubido($colorAA6X3_4,'etiquetaAA6X3_4');

$colorAACL1 = barraVerde($arrayVerde["data"][22]['subido']);
$colorClaseAACL1 = claseBarraVerde($colorAACL1);
$etiquetaAACL1 = etiquetaSubido($colorAACL1,'etiquetaAACL1');

$colorAACL2 = barraVerde($arrayVerde["data"][23]['subido']);
$colorClaseAACL2 = claseBarraVerde($colorAACL2);
$etiquetaAACL2 = etiquetaSubido($colorAACL2,'etiquetaAACL2');

$colorAACL3 = barraVerde($arrayVerde["data"][24]['subido']);
$colorClaseAACL3 = claseBarraVerde($colorAACL3);
$etiquetaAACL3 = etiquetaSubido($colorAACL3,'etiquetaAACL3');

$colorAAPL1 = barraVerde($arrayVerde["data"][25]['subido']);
$colorClaseAAPL1 = claseBarraVerde($colorAAPL1);
$etiquetaAAPL1 = etiquetaSubido($colorAAPL1,'etiquetaAAPL1');

$colorAAPL2 = barraVerde($arrayVerde["data"][26]['subido']);
$colorClaseAAPL2 = claseBarraVerde($colorAAPL2);
$etiquetaAAPL2 = etiquetaSubido($colorAAPL2,'etiquetaAAPL2');

$colorAAPL3 = barraVerde($arrayVerde["data"][27]['subido']);
$colorClaseAAPL3 = claseBarraVerde($colorAAPL3);
$etiquetaAAPL3 = etiquetaSubido($colorAAPL3,'etiquetaAAPL3');

$colorAAPL4 = barraVerde($arrayVerde["data"][28]['subido']);
$colorClaseAAPL4 = claseBarraVerde($colorAAPL4);
$etiquetaAAPL4 = etiquetaSubido($colorAAPL4,'etiquetaAAPL4');

$colorAAPL5 = barraVerde($arrayVerde["data"][29]['subido']);
$colorClaseAAPL5 = claseBarraVerde($colorAAPL5);
$etiquetaAAPL5 = etiquetaSubido($colorAAPL5,'etiquetaAAPL5');

$colorAAPL6 = barraVerde($arrayVerde["data"][30]['subido']);
$colorClaseAAPL6 = claseBarraVerde($colorAAPL6);
$etiquetaAAPL6 = etiquetaSubido($colorAAPL6,'etiquetaAAPL6');

$colorAAPL7 = barraVerde($arrayVerde["data"][31]['subido']);
$colorClaseAAPL7 = claseBarraVerde($colorAAPL7);
$etiquetaAAPL7 = etiquetaSubido($colorAAPL7,'etiquetaAAPL7');

$colorAAPL8 = barraVerde($arrayVerde["data"][32]['subido']);
$colorClaseAAPL8 = claseBarraVerde($colorAAPL8);
$etiquetaAAPL8 = etiquetaSubido($colorAAPL8,'etiquetaAAPL8');

$colorAAPL9 = barraVerde($arrayVerde["data"][33]['subido']);
$colorClaseAAPL9 = claseBarraVerde($colorAAPL9);
$etiquetaAAPL9 = etiquetaSubido($colorAAPL9,'etiquetaAAPL9');

$colorAAPL10 = barraVerde($arrayVerde["data"][34]['subido']);
$colorClaseAAPL10 = claseBarraVerde($colorAAPL10);
$etiquetaAAPL10 = etiquetaSubido($colorAAPL10,'etiquetaAAPL10');

$colorAAPL11 = barraVerde($arrayVerde["data"][35]['subido']);
$colorClaseAAPL11 = claseBarraVerde($colorAAPL11);
$etiquetaAAPL11 = etiquetaSubido($colorAAPL11,'etiquetaAAPL11');

$colorAAPL12 = barraVerde($arrayVerde["data"][36]['subido']);
$colorClaseAAPL12 = claseBarraVerde($colorAAPL12);
$etiquetaAAPL12 = etiquetaSubido($colorAAPL12,'etiquetaAAPL12');





?>

<script src="../js/notyf/notyf.min.js"></script>
<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

<!--Script para regresar a la pagina anterior-->
<div class="obtener_id_evento" id="<?php echo $id_evento ?>"></div>
<div class="obtener_id_auditorio_padre" id="<?php echo $id_auditorio_padre; ?>"></div>

<script>
    var id_evento = $('.obtener_id_evento').attr('id');
    var id_auditorio_padre = $('.obtener_id_auditorio_padre').attr('id');
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
        $('#page_content').load(`tabla_publicidad_auditorioAA.php?IDAUDI=${id_auditorio_padre}`);
    });
</script>





<div class="obtener_url" id="<?php echo $direccion_guardado; ?>"></div>

<!-- Banner Vertical 3x6 -->
<div class="modal fade modal_banner_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Vertical 3X6 (4 unidades)</h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden value="1900x2000" name="dimensiones_max_banner3x6" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="image/jpg.image/png.image/jpeg" name="formato_banner3x6" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner3x6" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden  value="AA3X6_1" name="banner3X6_1" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA3X6_2" name="banner3X6_2" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA3X6_3" name="banner3X6_3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA3X6_4" name="banner3X6_4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
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
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AA3X6_1)</label>
                                                <?php echo $etiquetaAA3X6_1; ?>
                                                <input  style="color: transparent; margin-left:27%;" type="file" name="banner3X6_1File" id="banner3X6_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA3X6_1; ?>" role="progressbar" style ="width:<?php echo $colorAA3X6_1; ?>%" aria-valuenow="<?php echo $colorAA3X6_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AA3X6_2)</label>
                                                <?php echo $etiquetaAA3X6_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner3X6_2File" id="banner3X6_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA3X6_2; ?>" role="progressbar" style ="width:<?php echo $colorAA3X6_2; ?>%" aria-valuenow="<?php echo $colorAA3X6_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AA3X6_3)</label>
                                                <?php echo $etiquetaAA3X6_3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner3X6_3File" id="banner3X6_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA3X6_3; ?>" role="progressbar" style ="width:<?php echo $colorAA3X6_3; ?>%" aria-valuenow="<?php echo $colorAA3X6_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AA3X6_4)</label>
                                                <?php echo $etiquetaAA3X6_4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner3X6_4File" id="banner3X6_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA3X6_4; ?>" role="progressbar" style ="width:<?php echo $colorAA3X6_4; ?>%" aria-valuenow="<?php echo $colorAA3X6_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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




<!-- Banner vertical 2.5x3 -->
<div class="modal fade modal_banner_vertical25x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Vertical 2.5X3 (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden  value="1900x2000" name="dimensiones_max_banner25x3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="image/jpg.image/png.image/jpeg" name="formato_banner25x3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner25x3" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_1" name="banner25x3_1" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_2" name="banner25x3_2" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_3" name="banner25x3_3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_4" name="banner25x3_4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_5" name="banner25x3_5" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_6" name="banner25x3_6" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_7" name="banner25x3_7" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_8" name="banner25x3_8" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_9" name="banner25x3_9" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_10" name="banner25x3_10" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_11" name="banner25x3_11" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA2.5X3_12" name="banner25x3_12" class="form-control ">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
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
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_1)</label>
                                                <?php echo $etiquetaAA2_5X3_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_1File" id="banner25x3_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_1; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_1; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_2)</label>
                                                <?php echo $etiquetaAA2_5X3_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_2File" id="banner25x3_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_2; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_2; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AA2.5X3_3)</label>
                                                <?php echo $etiquetaAA2_5X3_3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_3File" id="banner25x3_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_3; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_3; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_4)</label>
                                                <?php echo $etiquetaAA2_5X3_4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_4File" id="banner25x3_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_4; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_4; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_5)</label>
                                                <?php echo $etiquetaAA2_5X3_5; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_5File" id="banner25x3_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_5" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_5; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_5; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_5; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_6)</label>
                                                <?php echo $etiquetaAA2_5X3_6; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_6File" id="banner25x3_6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_6" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_6; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_6; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_6; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_7)</label>
                                                <?php echo $etiquetaAA2_5X3_7; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_7File" id="banner25x3_7File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_7" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_7; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_7; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_7; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_8)</label>
                                                <?php echo $etiquetaAA2_5X3_8; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_8File" id="banner25x3_8File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_8" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_8; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_8; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_8; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_9)</label>
                                                <?php echo $etiquetaAA2_5X3_9; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_9File" id="banner25x3_9File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_9" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_9; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_9; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_9; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_10)</label>
                                                <?php echo $etiquetaAA2_5X3_10; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_10File" id="banner25x3_10File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_10" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_10; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_10; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_10; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_11)</label>
                                                <?php echo $etiquetaAA2_5X3_11; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_11File" id="banner25x3_11File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_11" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_11; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_11; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_11; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AA2.5X3_12)</label>
                                                <?php echo $etiquetaAA2_5X3_12; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_12File" id="banner25x3_12File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_12" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA2_5X3_12; ?>" role="progressbar" style ="width:<?php echo $colorAA2_5X3_12; ?>%" aria-valuenow="<?php echo $colorAA2_5X3_12; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
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


<!-- Banner Horizontal 8x4 -->
<div class="modal fade modal_banner_horizontal8x4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Horizontal 8X4 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden  value="1900x2000" name="dimensiones_max_banner8x4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="image/jpg.image/png.image/jpeg" name="formato_banner8x4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner8x4" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden  value="AA8X4_1" name="banner8x4_1" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA8X4_2" name="banner8x4_2" class="form-control">
                                        </td>

                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
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
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 8X4 (AA8X4_1)</label>
                                                <?php echo $etiquetaAA8X4_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner8x4_1File" id="banner8x4_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA8X4_1; ?>" role="progressbar" style ="width:<?php echo $colorAA8X4_1; ?>%" aria-valuenow="<?php echo $colorAA8X4_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 8X4 (AA8X4_2)</label>
                                                <?php echo $etiquetaAA8X4_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner8x4_2File" id="banner8x4_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA8X4_2; ?>" role="progressbar" style ="width:<?php echo $colorAA8X4_2; ?>%" aria-valuenow="<?php echo $colorAA8X4_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
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


<!-- Banner Horizontal 6x3 -->
<div class="modal fade modal_banner_horizontal6x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner horizontal 6X3 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner6x3"></div>
                        <form id="formulario_banner6x3" enctype="multipart/form-data">

                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden  value="1900x2000" name="dimensiones_max_banner6x3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="image/jpg.image/png.image/jpeg" name="formato_banner6x3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner6x3" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden  value="AA6X3_1" name="banner6x3_1" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA6X3_2" name="banner6x3_2" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA6X3_3" name="banner6x3_3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AA6X3_4" name="banner6x3_4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div><br>
                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 6X3 (AA6X3_1)</label>
                                                <?php echo $etiquetaAA6X3_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner6x3_1File" id="banner6x3_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA6X3_1; ?>" role="progressbar" style ="width:<?php echo $colorAA6X3_1; ?>%" aria-valuenow="<?php echo $colorAA6X3_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 6X3 (AA6X3_2)</label>
                                                <?php echo $etiquetaAA6X3_2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner6x3_2File" id="banner6x3_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA6X3_2; ?>" role="progressbar" style ="width:<?php echo $colorAA6X3_2; ?>%" aria-valuenow="<?php echo $colorAA6X3_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 6X3 (AA6X3_3)</label>
                                                <?php echo $etiquetaAA6X3_3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner6x3_3File" id="banner6x3_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA6X3_3; ?>" role="progressbar" style ="width:<?php echo $colorAA6X3_3; ?>%" aria-valuenow="<?php echo $colorAA6X3_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 6X3 (AA6X3_4)</label>
                                                <?php echo $etiquetaAA6X3_4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner6x3_4File" id="banner6x3_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAA6X3_4; ?>" role="progressbar" style ="width:<?php echo $colorAA6X3_4; ?>%" aria-valuenow="<?php echo $colorAA6X3_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
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





<div class="modal fade modaledit_banner_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Banner Vertical 3X6 (4 unidades)</h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AA3X6_1)</label>
                                                <?php echo $etiquetaAA3X6_1; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AA3X6_2)</label>
                                                <?php echo $etiquetaAA3X6_2; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner3x6_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner3x6_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AA3X6_3)</label>
                                                <?php echo $etiquetaAA3X6_3; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner3x6_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner3x6_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AA3X6_4)</label>
                                                <?php echo $etiquetaAA3X6_4; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner3x6_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner3x6_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
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
<div class="modal fade modaledit_banner_vertical25x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Banner Vertical 2.5X3 (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_1)</label>
                                                <?php echo $etiquetaAA2_5X3_1; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_2)</label>
                                                <?php echo $etiquetaAA2_5X3_2; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AA2.5X3_3)</label>
                                                <?php echo $etiquetaAA2_5X3_3; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_4)</label>
                                                <?php echo $etiquetaAA2_5X3_4; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_5)</label>
                                                <?php echo $etiquetaAA2_5X3_5; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_6)</label>
                                                <?php echo $etiquetaAA2_5X3_6; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_7)</label>
                                                <?php echo $etiquetaAA2_5X3_7; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_8)</label>
                                                <?php echo $etiquetaAA2_5X3_8; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_9)</label>
                                                <?php echo $etiquetaAA2_5X3_9; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_10)</label>
                                                <?php echo $etiquetaAA2_5X3_10; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_10' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_10' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_11)</label>
                                                <?php echo $etiquetaAA2_5X3_11; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AA2.5X3_12)</label>
                                                <?php echo $etiquetaAA2_5X3_12; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_12' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_12' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
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
<div class="modal fade modaledit_banner_horizontal8x4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Banner Horizontal 8X4 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">
                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 8X4 (AA8X4_1)</label>
                                                <?php echo $etiquetaAA8X4_1; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner8X4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner8X4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 8X4 (AA8X4_2)</label>
                                                <?php echo $etiquetaAA8X4_2; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner8X4_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner8X4_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
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
<div class="modal fade modaledit_banner_horizontal6x3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Banner Horizontal 6X3 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner6x3"></div>
                        <form id="formulario_banner6x3" enctype="multipart/form-data">

                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 6X3 (AA6X3_1)</label>
                                                <?php echo $etiquetaAA6X3_1; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner6X3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner6X3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 6X3 (AA6X3_2)</label>
                                                <?php echo $etiquetaAA6X3_2; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner6X3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner6X3_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 6X3 (AA6X3_3)</label>
                                                <?php echo $etiquetaAA6X3_3; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner6X3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner6X3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 6X3 (AA6X3_4)</label>
                                                <?php echo $etiquetaAA6X3_4; ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner6X3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner6X3_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
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
<div class="modal fade modal_cajaluz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir Cajas de Luz (3 unidades)</h5>
                    </div>

                    <div>
                        <div id="respuesta_img_cajaluz"></div>
                        <form id="formulario_cajaluz" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input hidden  value="1920x1080" name="dimensiones_max_cajaluz" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="image/jpg.image/png.image/jpeg" name="formato_cajaluz" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AACL1" name="cajaluz_1" class="form-control ">
                                        </td>
                                        <td>
                                            <input hidden  value="AACL2" name="cajaluz_2" class="form-control ">
                                        </td>
                                        <td>
                                            <input hidden  value="AACL3" name="cajaluz_3" class="form-control ">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_cajaluz" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
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
                                                <label class="col-form-label w-100">Subir Caja Luz 1 (AACL1)</label>
                                                <?php echo $etiquetaAACL1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="cajaluz_1File" id="cajaluz_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAACL1; ?>" role="progressbar" style ="width:<?php echo $colorAACL1; ?>%" aria-valuenow="<?php echo $colorAACL1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 2 (AACL2)</label>
                                                <?php echo $etiquetaAACL2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="cajaluz_2File" id="cajaluz_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAACL2; ?>" role="progressbar" style ="width:<?php echo $colorAACL2; ?>%" aria-valuenow="<?php echo $colorAACL2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 3 (AACL3)</label>
                                                <?php echo $etiquetaAACL3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="cajaluz_3File" id="cajaluz_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAACL3; ?>" role="progressbar" style ="width:<?php echo $colorAACL3; ?>%" aria-valuenow="<?php echo $colorAACL3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
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
<div class="modal fade modal_editar_cajaluz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar Cajas de Luz (3 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_editar_img_cajaluz"></div>
                        <form id="formulario_editar_cajaluz" enctype="multipart/form-data">
                            <table>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 1 (AACL1)</label>
                                                <?php echo $etiquetaAACL1; ?>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 2 (AACL2)</label>
                                                <?php echo $etiquetaAACL2; ?>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 3 (AACL3)</label>
                                                <?php echo $etiquetaAACL3; ?>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
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
<div class="modal fade modal_plumas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
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
                                            <input hidden  value="1920x1080" name="dimensiones_max_pluma" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="image/jpg.image/png.image/jpeg" name="formato_pluma" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_plumas" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL1" name="pluma_1" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL2" name="pluma_2" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL3" name="pluma_3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL4" name="pluma_4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL5" name="pluma_5" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL6" name="pluma_6" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="AAPL7" name="pluma_7" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL8" name="pluma_8" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL9" name="pluma_9" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL10" name="pluma_10" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AAPL11" name="pluma_11" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden value="AAPL12" name="pluma_12" class="form-control ">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
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
                                                <label class="col-form-label w-100">Subir Pluma 1 (AAPL1)</label>
                                                <?php echo $etiquetaAAPL1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_1File" id="pluma_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL1; ?>" role="progressbar" style ="width:<?php echo $colorAAPL1; ?>%" aria-valuenow="<?php echo $colorAAPL1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 2 (AAPL2)</label>
                                                <?php echo $etiquetaAAPL2; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_2File" id="pluma_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL2; ?>" role="progressbar" style ="width:<?php echo $colorAAPL2; ?>%" aria-valuenow="<?php echo $colorAAPL2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 3 (AAPL3)</label>
                                                <?php echo $etiquetaAAPL3; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_3File" id="pluma_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL3; ?>" role="progressbar" style ="width:<?php echo $colorAAPL3; ?>%" aria-valuenow="<?php echo $colorAAPL3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 4 (AAPL4)</label>
                                                <?php echo $etiquetaAAPL4; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_4File" id="pluma_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL4; ?>" role="progressbar" style ="width:<?php echo $colorAAPL4; ?>%" aria-valuenow="<?php echo $colorAAPL4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 5 (AAPL5)</label>
                                                <?php echo $etiquetaAAPL5; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_5File" id="pluma_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_5" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL5; ?>" role="progressbar" style ="width:<?php echo $colorAAPL5; ?>%" aria-valuenow="<?php echo $colorAAPL5; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 6 (AAPL6)</label>
                                                <?php echo $etiquetaAAPL6; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_6File" id="pluma_6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_6" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL6; ?>" role="progressbar" style ="width:<?php echo $colorAAPL6; ?>%" aria-valuenow="<?php echo $colorAAPL6; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 7 (AAPL7)</label>
                                                <?php echo $etiquetaAAPL7; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_7File" id="pluma_7File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_7" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL7; ?>" role="progressbar" style ="width:<?php echo $colorAAPL7; ?>%" aria-valuenow="<?php echo $colorAAPL7; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 8 (AAPL8)</label>
                                                <?php echo $etiquetaAAPL8; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_8File" id="pluma_8File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_8" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL8; ?>" role="progressbar" style ="width:<?php echo $colorAAPL8; ?>%" aria-valuenow="<?php echo $colorAAPL8; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 9 (AAPL9)</label>
                                                <?php echo $etiquetaAAPL9; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_9File" id="pluma_9File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_9" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL9; ?>" role="progressbar" style ="width:<?php echo $colorAAPL9; ?>%" aria-valuenow="<?php echo $colorAAPL9; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 10 (AAPL10)</label>
                                                <?php echo $etiquetaAAPL10; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_10File" id="pluma_10File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_10" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL10; ?>" role="progressbar" style ="width:<?php echo $colorAAPL10; ?>%" aria-valuenow="<?php echo $colorAAPL10; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 11 (AAPL11)</label>
                                                <?php echo $etiquetaAAPL11; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_11File" id="pluma_11File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_11" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL11; ?>" role="progressbar" style ="width:<?php echo $colorAAPL11; ?>%" aria-valuenow="<?php echo $colorAAPL11; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 12 (AAPL12)</label>
                                                <?php echo $etiquetaAAPL12; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_12File" id="pluma_12File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_12" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAAPL12; ?>" role="progressbar" style ="width:<?php echo $colorAAPL12; ?>%" aria-valuenow="<?php echo $colorAAPL12; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
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
<div class="modal fade modal_editar_plumas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-md">
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
                                                <label class="col-form-label w-100">Pluma 1 (AAPL1)</label>
                                                <?php echo $etiquetaAAPL1; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 2 (AAPL2)</label>
                                                <?php echo $etiquetaAAPL2; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 3 (AAPL3)</label>
                                                <?php echo $etiquetaAAPL3; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 4 (AAPL4)</label>
                                                <?php echo $etiquetaAAPL4; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 5 (AAPL5)</label>
                                                <?php echo $etiquetaAAPL5; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 6 (AAPL6)</label>
                                                <?php echo $etiquetaAAPL6; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 7 (AAPL7)</label>
                                                <?php echo $etiquetaAAPL7; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 8 (AAPL8)</label>
                                                <?php echo $etiquetaAAPL8; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 9 (AAPL9)</label>
                                                <?php echo $etiquetaAAPL9; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 10 (AAPL10)</label>
                                                <?php echo $etiquetaAAPL10; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_10' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_10' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class = "row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 11 (AAPL11)</label>
                                                <?php echo $etiquetaAAPL11; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 12 (AAPL12)</label>
                                                <?php echo $etiquetaAAPL12; ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_12' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_12' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
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
<div class="modal fade" id="borrar_imagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="titulo_texto_eli">¿Está seguro que desea eliminar la imagen?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" id="imagen_mostrada_real_eli" src="" onerror="this.src='../imagenes_diseño/no_image2.png';" />
            </div>

            <form id="formulario_borrar_archivo">
                <input value="<?php echo $direccion_guardado; ?>" name="direccion_guardado">
                <input value="" name="nombre_archivo" id="nombre_archivo_borrar">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Borrar imagen</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Vista Previa -->
<div class="modal fade modal_vista_previa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
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

<!-- Tabla Publicidad -->
<div class="main_container">

    <div class="text-center">
        <h2>Publicidad del <b>Auditorio AA</b></h2>
    </div><br>
    <div class="container">
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
    <br>

    <?php

    function decidir_boton($n_archivos_subidos, $totales)
    {

        if ($n_archivos_subidos == 0) {
            return "badge_status btn-danger d-flex justify-content-center";
        } else if ($n_archivos_subidos > 0 and $n_archivos_subidos < $totales) {
            return "badge_status btn-warning d-flex justify-content-center";
        } else if ($n_archivos_subidos == $totales) {
            return "badge_status SUCCESS d-flex justify-content-center";
        }
    }

    $array = null;
    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AA3X6%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_3x6 = decidir_boton($n_archivos_subidos, 4);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AA2.5X3%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_25x3 = decidir_boton($n_archivos_subidos, 12);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AA8X4%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_8x4 = decidir_boton($n_archivos_subidos, 2);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AA6X3%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_6x3 = decidir_boton($n_archivos_subidos, 4);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AACL%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_cl = decidir_boton($n_archivos_subidos, 3);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AAPL%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_pl = decidir_boton($n_archivos_subidos, 12);

    $array = null;




    ?>


    <div class="card" style="padding: 18px;">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless " id="users_table" style="width:100%">
                <thead>

                    <tr class="t-header">
                        <th scope="col" class="text-center">Tipo de Contenido</th>
                        <th scope="col" class="text-center">Cantidad</th>
                        <th scope="col" class="text-center">Dimensiones máximas</th>
                        <th scope="col" class="text-center">Formato</th>
                        <th scope="col" class="text-center">Subir</th>
                        <th scope="col" class="text-center">Editar</th>
                    </tr>

                    <tr class="text-center">
                        <td>Banner Horizontal 8x4</td>
                        <td>2</td>
                        <td>2600x1300</td>
                        <td>
                            <div class="<?php echo $boton_8x4 ?>">
                                .JPG .PNG
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn_subir_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_banner_horizontal8x4'>
                                    <i class='fa fa-cloud-upload' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn-vista_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modaledit_banner_horizontal8x4'>
                                    <i class='far fa-edit' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="text-center">
                        <td>Banner Horizontal 6x3</td>
                        <td>4</td>
                        <td>2400x1200</td>
                        <td>
                            <div class="<?php echo $boton_6x3 ?>">
                                .JPG .PNG
                            </div>
                        </td>
                        <td>

                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn_subir_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_banner_horizontal6x3'>
                                    <i class='fa fa-cloud-upload' aria-='true'></i>
                                </button>
                            </div>

                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modaledit_banner_horizontal6x3'>
                                    <i class='far fa-edit' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                    </tr>


                    <tr class="text-center">
                        <td>Banner Vertical 3x6</td>
                        <td>4</td>
                        <td>1200x2400</td>
                        <td>
                            <div class="<?php echo $boton_3x6 ?>">
                                .JPG .PNG
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn_subir_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_banner_vertical3x6'>
                                    <i class='fa fa-cloud-upload' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn-vista_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modaledit_banner_vertical3x6'>
                                    <i class='far fa-edit' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                    </tr>



                    <tr class="text-center">
                        <td>Banner vertical 2.5x3</td>
                        <td>12</td>
                        <td>1250x1500</td>
                        <td>
                            <div class="<?php echo $boton_25x3 ?>">
                                .JPG .PNG
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn_subir_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_banner_vertical25x3'>
                                    <i class='fa fa-cloud-upload' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn-vista_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modaledit_banner_vertical25x3'>
                                    <i class='far fa-edit' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="text-center">
                        <td>Caja de luz</td>
                        <td>3</td>
                        <td>2000x1000</td>
                        <td>
                            <div class="<?php echo $boton_cl ?>">
                                .JPG .PNG
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn_subir_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_cajaluz'>
                                    <i class='fa fa-cloud-upload' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_editar_cajaluz'>
                                    <i class='far fa-edit' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>Plumas</td>
                        <td>12</td>
                        <td>540x2575</td>
                        <td>
                            <div class="<?php echo $boton_pl ?>">
                                .JPG .PNG
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn_subir_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_plumas'>
                                    <i class='fa fa-cloud-upload' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_editar_plumas'>
                                    <i class='far fa-edit' aria-='true'></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </thead>
            </table>
        </div>
    </div>

</div>

<script src="../js/tabla_AA.js"></script>