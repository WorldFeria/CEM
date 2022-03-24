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

$colorAB3X6_1 = barraVerde($arrayVerde["data"][0]['subido']);
$colorClaseAB3X6_1 = claseBarraVerde($colorAB3X6_1);
$etiquetABA3X6_1 = etiquetaSubido($colorAB3X6_1,'etiquetABA3X6_1');



$colorAB3X6_2 = barraVerde($arrayVerde["data"][1]['subido']);
$colorClaseAB3X6_2 = claseBarraVerde($colorAB3X6_2);
$etiquetABA3X6_2 = etiquetaSubido($colorAB3X6_2,'etiquetABA3X6_2');

$colorAB3X6_3 = barraVerde($arrayVerde["data"][2]['subido']);
$colorClaseAB3X6_3 = claseBarraVerde($colorAB3X6_3);
$etiquetABA3X6_3 = etiquetaSubido($colorAB3X6_3,'etiquetABA3X6_3');

$colorAB3X6_4 = barraVerde($arrayVerde["data"][3]['subido']);
$colorClaseAB3X6_4 = claseBarraVerde($colorAB3X6_4);
$etiquetABA3X6_4 = etiquetaSubido($colorAB3X6_4,'etiquetABA3X6_4');

$colorAB2_5X3_1 = barraVerde($arrayVerde["data"][4]['subido']);
$colorClaseAB2_5X3_1 = claseBarraVerde($colorAB2_5X3_1);
$etiquetABA2_5X3_1 = etiquetaSubido($colorAB2_5X3_1,'etiquetABA2_5X3_1');

$colorAB2_5X3_2 = barraVerde($arrayVerde["data"][5]['subido']);
$colorClaseAB2_5X3_2 = claseBarraVerde($colorAB2_5X3_2);
$etiquetABA2_5X3_2 = etiquetaSubido($colorAB2_5X3_2,'etiquetABA2_5X3_2');

$colorAB2_5X3_3 = barraVerde($arrayVerde["data"][6]['subido']);
$colorClaseAB2_5X3_3 = claseBarraVerde($colorAB2_5X3_3);
$etiquetABA2_5X3_3 = etiquetaSubido($colorAB2_5X3_3,'etiquetABA2_5X3_3');

$colorAB2_5X3_4 = barraVerde($arrayVerde["data"][7]['subido']);
$colorClaseAB2_5X3_4 = claseBarraVerde($colorAB2_5X3_4);
$etiquetABA2_5X3_4 = etiquetaSubido($colorAB2_5X3_4,'etiquetABA2_5X3_4');

$colorAB2_5X3_5 = barraVerde($arrayVerde["data"][8]['subido']);
$colorClaseAB2_5X3_5 = claseBarraVerde($colorAB2_5X3_5);
$etiquetABA2_5X3_5 = etiquetaSubido($colorAB2_5X3_5,'etiquetABA2_5X3_5');

$colorAB2_5X3_6 = barraVerde($arrayVerde["data"][9]['subido']);
$colorClaseAB2_5X3_6 = claseBarraVerde($colorAB2_5X3_6);
$etiquetABA2_5X3_6 = etiquetaSubido($colorAB2_5X3_6,'etiquetABA2_5X3_6');

$colorAB2_5X3_7 = barraVerde($arrayVerde["data"][10]['subido']);
$colorClaseAB2_5X3_7 = claseBarraVerde($colorAB2_5X3_7);
$etiquetABA2_5X3_7 = etiquetaSubido($colorAB2_5X3_7,'etiquetABA2_5X3_7');

$colorAB2_5X3_8 = barraVerde($arrayVerde["data"][11]['subido']);
$colorClaseAB2_5X3_8 = claseBarraVerde($colorAB2_5X3_8);
$etiquetABA2_5X3_8 = etiquetaSubido($colorAB2_5X3_8,'etiquetABA2_5X3_8');

$colorAB2_5X3_9 = barraVerde($arrayVerde["data"][12]['subido']);
$colorClaseAB2_5X3_9 = claseBarraVerde($colorAB2_5X3_9);
$etiquetABA2_5X3_9 = etiquetaSubido($colorAB2_5X3_9,'etiquetABA2_5X3_9');

$colorAB2_5X3_10 = barraVerde($arrayVerde["data"][13]['subido']);
$colorClaseAB2_5X3_10 = claseBarraVerde($colorAB2_5X3_10);
$etiquetABA2_5X3_10 = etiquetaSubido($colorAB2_5X3_10,'etiquetABA2_5X3_10');

$colorAB2_5X3_11 = barraVerde($arrayVerde["data"][14]['subido']);
$colorClaseAB2_5X3_11 = claseBarraVerde($colorAB2_5X3_11);
$etiquetABA2_5X3_11 = etiquetaSubido($colorAB2_5X3_11,'etiquetABA2_5X3_11');

$colorAB2_5X3_12 = barraVerde($arrayVerde["data"][15]['subido']);
$colorClaseAB2_5X3_12 = claseBarraVerde($colorAB2_5X3_12);
$etiquetABA2_5X3_12 = etiquetaSubido($colorAB2_5X3_12,'etiquetABA2_5X3_12');

$colorAB8X4_1 = barraVerde($arrayVerde["data"][16]['subido']);
$colorClaseAB8X4_1 = claseBarraVerde($colorAB8X4_1);
$etiquetABA8X4_1 = etiquetaSubido($colorAB8X4_1,'etiquetABA8X4_1');

$colorAB8X4_2 = barraVerde($arrayVerde["data"][17]['subido']);
$colorClaseAB8X4_2 = claseBarraVerde($colorAB8X4_2);
$etiquetABA8X4_2 = etiquetaSubido($colorAB8X4_2,'etiquetABA8X4_2');

$colorAB6X3_1 = barraVerde($arrayVerde["data"][18]['subido']);
$colorClaseAB6X3_1 = claseBarraVerde($colorAB6X3_1);
$etiquetABA6X3_1 = etiquetaSubido($colorAB6X3_1,'etiquetABA6X3_1');

$colorAB6X3_2 = barraVerde($arrayVerde["data"][19]['subido']);
$colorClaseAB6X3_2 = claseBarraVerde($colorAB6X3_2);
$etiquetABA6X3_2 = etiquetaSubido($colorAB6X3_2,'etiquetABA6X3_2');

$colorAB6X3_3 = barraVerde($arrayVerde["data"][20]['subido']);
$colorClaseAB6X3_3 = claseBarraVerde($colorAB6X3_3);
$etiquetABA6X3_3 = etiquetaSubido($colorAB6X3_3,'etiquetABA6X3_3');

$colorAB6X3_4 = barraVerde($arrayVerde["data"][21]['subido']);
$colorClaseAB6X3_4 = claseBarraVerde($colorAB6X3_4);
$etiquetABA6X3_4 = etiquetaSubido($colorAB6X3_4,'etiquetABA6X3_4');

$colorABCL1 = barraVerde($arrayVerde["data"][22]['subido']);
$colorClaseABCL1 = claseBarraVerde($colorABCL1);
$etiquetABACL1 = etiquetaSubido($colorABCL1,'etiquetABACL1');

$colorABCL2 = barraVerde($arrayVerde["data"][23]['subido']);
$colorClaseABCL2 = claseBarraVerde($colorABCL2);
$etiquetABACL2 = etiquetaSubido($colorABCL2,'etiquetABACL2');

$colorABCL3 = barraVerde($arrayVerde["data"][24]['subido']);
$colorClaseABCL3 = claseBarraVerde($colorABCL3);
$etiquetABACL3 = etiquetaSubido($colorABCL3,'etiquetABACL3');

$colorABPL1 = barraVerde($arrayVerde["data"][25]['subido']);
$colorClaseABPL1 = claseBarraVerde($colorABPL1);
$etiquetABAPL1 = etiquetaSubido($colorABPL1,'etiquetABAPL1');

$colorABPL2 = barraVerde($arrayVerde["data"][26]['subido']);
$colorClaseABPL2 = claseBarraVerde($colorABPL2);
$etiquetABAPL2 = etiquetaSubido($colorABPL2,'etiquetABAPL2');

$colorABPL3 = barraVerde($arrayVerde["data"][27]['subido']);
$colorClaseABPL3 = claseBarraVerde($colorABPL3);
$etiquetABAPL3 = etiquetaSubido($colorABPL3,'etiquetABAPL3');

$colorABPL4 = barraVerde($arrayVerde["data"][28]['subido']);
$colorClaseABPL4 = claseBarraVerde($colorABPL4);
$etiquetABAPL4 = etiquetaSubido($colorABPL4,'etiquetABAPL4');

$colorABPL5 = barraVerde($arrayVerde["data"][29]['subido']);
$colorClaseABPL5 = claseBarraVerde($colorABPL5);
$etiquetABAPL5 = etiquetaSubido($colorABPL5,'etiquetABAPL5');

$colorABPL6 = barraVerde($arrayVerde["data"][30]['subido']);
$colorClaseABPL6 = claseBarraVerde($colorABPL6);
$etiquetABAPL6 = etiquetaSubido($colorABPL6,'etiquetABAPL6');

$colorABPL7 = barraVerde($arrayVerde["data"][31]['subido']);
$colorClaseABPL7 = claseBarraVerde($colorABPL7);
$etiquetABAPL7 = etiquetaSubido($colorABPL7,'etiquetABAPL7');

$colorABPL8 = barraVerde($arrayVerde["data"][32]['subido']);
$colorClaseABPL8 = claseBarraVerde($colorABPL8);
$etiquetABAPL8 = etiquetaSubido($colorABPL8,'etiquetABAPL8');

$colorABPL9 = barraVerde($arrayVerde["data"][33]['subido']);
$colorClaseABPL9 = claseBarraVerde($colorABPL9);
$etiquetABAPL9 = etiquetaSubido($colorABPL9,'etiquetABAPL9');

$colorABPL10 = barraVerde($arrayVerde["data"][34]['subido']);
$colorClaseABPL10 = claseBarraVerde($colorABPL10);
$etiquetABAPL10 = etiquetaSubido($colorABPL10,'etiquetABAPL10');

$colorABPL11 = barraVerde($arrayVerde["data"][35]['subido']);
$colorClaseABPL11 = claseBarraVerde($colorABPL11);
$etiquetABAPL11 = etiquetaSubido($colorABPL11,'etiquetABAPL11');

$colorABPL12 = barraVerde($arrayVerde["data"][36]['subido']);
$colorClaseABPL12 = claseBarraVerde($colorABPL12);
$etiquetABAPL12 = etiquetaSubido($colorABPL12,'etiquetABAPL12');





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
        $('#page_content').load(`tabla_publicidad_auditorioAB.php?IDAUDI=${id_auditorio_padre}`);
    });
</script>


<div class="obtener_url" id="<?php echo $direccion_guardado; ?>"></div>

<!-- Banner Vertical 3x6 -->
<div class="modal fade modal_banner_vertical3x6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Banner Vertical 3X6 (4 unidades)</h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input  hidden value="1900x2000" name="dimensiones_max_banner3x6" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="image/jpg.image/png.image/jpeg" name="formato_banner3x6" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner3x6" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden  value="AB3X6_1" name="banner3X6_1" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB3X6_2" name="banner3X6_2" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB3X6_3" name="banner3X6_3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB3X6_4" name="banner3X6_4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AB3X6_1)</label>
                                                <?php echo $etiquetABB3X6_1; ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner3X6_1File" id="banner3X6_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB3X6_1; ?>" role="progressbar" style ="width:<?php echo $colorAB3X6_1; ?>%" aria-valuenow="<?php echo $colorAB3X6_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AB3X6_2)</label>
                                                <?php echo $etiquetABA3X6_2 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner3X6_2File" id="banner3X6_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB3X6_2; ?>" role="progressbar" style ="width:<?php echo $colorAB3X6_2; ?>%" aria-valuenow="<?php echo $colorAB3X6_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AB3X6_3)</label>
                                                <?php echo $etiquetABA3X6_3 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner3X6_3File" id="banner3X6_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB3X6_3; ?>" role="progressbar" style ="width:<?php echo $colorAB3X6_3; ?>%" aria-valuenow="<?php echo $colorAB3X6_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AB3X6_4)</label>
                                                <?php echo $etiquetABA3X6_4 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner3X6_4File" id="banner3X6_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner3X6_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB3X6_4; ?>" role="progressbar" style ="width:<?php echo $colorAB3X6_4; ?>%" aria-valuenow="<?php echo $colorAB3X6_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
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
                                            <input hidden  value="AB2.5X3_1" name="banner25x3_1" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden value="AB2.5X3_2" name="banner25x3_2" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB2.5X3_3" name="banner25x3_3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB2.5X3_4" name="banner25x3_4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB2.5X3_5" name="banner25x3_5" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB2.5X3_6" name="banner25x3_6" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden value="AB2.5X3_7" name="banner25x3_7" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB2.5X3_8" name="banner25x3_8" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden value="AB2.5X3_9" name="banner25x3_9" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB2.5X3_10" name="banner25x3_10" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB2.5X3_11" name="banner25x3_11" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB2.5X3_12" name="banner25x3_12" class="form-control ">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_1)</label>
                                                <?php echo $etiquetABA2_5X3_1 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_1File" id="banner25x3_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_1; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_1; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_2)</label>
                                                <?php echo $etiquetABA2_5X3_2 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_2File" id="banner25x3_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_2; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_2; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 3X6 (AB2.5X3_3)</label>
                                                <?php echo $etiquetABA2_5X3_3 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_3File" id="banner25x3_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_3; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_3; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_4)</label>
                                                <?php echo $etiquetABA2_5X3_4 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_4File" id="banner25x3_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_4; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_4; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_5)</label>
                                                <?php echo $etiquetABA2_5X3_5 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_5File" id="banner25x3_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_5" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_5; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_5; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_5; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_6)</label>
                                                <?php echo $etiquetABA2_5X3_6 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_6File" id="banner25x3_6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_6" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_6; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_6; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_6; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_7)</label>
                                                <?php echo $etiquetABA2_5X3_7 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_7File" id="banner25x3_7File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_7" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_7; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_7; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_7; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_8)</label>
                                                <?php echo $etiquetABA2_5X3_8 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_8File" id="banner25x3_8File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_8" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_8; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_8; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_8; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_9)</label>
                                                <?php echo $etiquetABA2_5X3_9 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_9File" id="banner25x3_9File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_9" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_9; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_9; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_9; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_10)</label>
                                                <?php echo $etiquetABA2_5X3_10 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_10File" id="banner25x3_10File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_10" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_10; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_10; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_10; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_11)</label>
                                                <?php echo $etiquetABA2_5X3_11 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_11File" id="banner25x3_11File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_11" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_11; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_11; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_11; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner Vertical 2.5X3 (AB2.5X3_12)</label>
                                                <?php echo $etiquetABA2_5X3_12 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner25x3_12File" id="banner25x3_12File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner25x3_12" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB2_5X3_12; ?>" role="progressbar" style ="width:<?php echo $colorAB2_5X3_12; ?>%" aria-valuenow="<?php echo $colorAB2_5X3_12; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
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
                                            <input hidden  value="AB8X4_1" name="banner8x4_1" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB8X4_2" name="banner8x4_2" class="form-control">
                                        </td>

                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 8X4 (AB8X4_1)</label>
                                                <?php echo $etiquetABA8X4_1 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner8x4_1File" id="banner8x4_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB8X4_1; ?>" role="progressbar" style ="width:<?php echo $colorAB8X4_1; ?>%" aria-valuenow="<?php echo $colorAB8X4_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 8X4 (AB8X4_2)</label>
                                                <?php echo $etiquetABA8X4_2 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner8x4_2File" id="banner8x4_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner8x4_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB8X4_2; ?>" role="progressbar" style ="width:<?php echo $colorAB8X4_2; ?>%" aria-valuenow="<?php echo $colorAB8X4_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
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
                                            <input  hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner6x3" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden  value="AB6X3_1" name="banner6x3_1" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB6X3_2" name="banner6x3_2" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB6X3_3" name="banner6x3_3" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="AB6X3_4" name="banner6x3_4" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div><br>
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 6X3 (AB6X3_1)</label>
                                                <?php echo $etiquetABA6X3_1 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner6x3_1File" id="banner6x3_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB6X3_1; ?>" role="progressbar" style ="width:<?php echo $colorAB6X3_1; ?>%" aria-valuenow="<?php echo $colorAB6X3_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 6X3 (AB6X3_2)</label>
                                                <?php echo $etiquetABA6X3_2 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner6x3_2File" id="banner6x3_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB6X3_2; ?>" role="progressbar" style ="width:<?php echo $colorAB6X3_2; ?>%" aria-valuenow="<?php echo $colorAB6X3_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 6X3 (AB6X3_3)</label>
                                                <?php echo $etiquetABA6X3_3 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner6x3_3File" id="banner6x3_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB6X3_3; ?>" role="progressbar" style ="width:<?php echo $colorAB6X3_3; ?>%" aria-valuenow="<?php echo $colorAB6X3_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Banner 6X3 (AB6X3_4)</label>
                                                <?php echo $etiquetABA6X3_4 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="banner6x3_4File" id="banner6x3_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner6x3_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseAB6X3_4; ?>" role="progressbar" style ="width:<?php echo $colorAB6X3_4; ?>%" aria-valuenow="<?php echo $colorAB6X3_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Banner Vertical 3X6 (4 unidades)</h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner3x6"></div>
                        <form id="formulario_banner3x6" enctype="multipart/form-data">
                            <table>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AB3X6_1)</label>
                                                <?php echo $etiquetABA3X6_1 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner3x6_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AB3X6_2)</label>
                                                <?php echo $etiquetABA3X6_2 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AB3X6_3)</label>
                                                <?php echo $etiquetABA3X6_3 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner3x6_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner3x6_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AB3X6_4)</label>
                                                <?php echo $etiquetABA3X6_4 ?>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Banner Vertical 2.5X3 (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_1)</label>
                                                <?php echo $etiquetABA2_5X3_1 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_2)</label>
                                                <?php echo $etiquetABA2_5X3_2 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 3X6 (AB2.5X3_3)</label>
                                                <?php echo $etiquetABA2_5X3_3 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_4)</label>
                                                <?php echo $etiquetABA2_5X3_4 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_5)</label>
                                                <?php echo $etiquetABA2_5X3_5 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_6)</label>
                                                <?php echo $etiquetABA2_5X3_6 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_7)</label>
                                                <?php echo $etiquetABA2_5X3_7 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_8)</label>
                                                <?php echo $etiquetABA2_5X3_8 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_9)</label>
                                                <?php echo $etiquetABA2_5X3_9 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_10)</label>
                                                <?php echo $etiquetABA2_5X3_10 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_11)</label>
                                                <?php echo $etiquetABA2_5X3_11 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner25X3_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner25X3_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner Vertical 2.5X3 (AB2.5X3_12)</label>
                                                <?php echo $etiquetABA2_5X3_12 ?>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Banner Horizontal 8X4 (2 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner8x4"></div>
                        <form id="formulario_banner8x4" enctype="multipart/form-data">
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 8X4 (AB8X4_1)</label>
                                                <?php echo $etiquetABA8X4_1 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner8X4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner8X4_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 8X4 (AB8X4_2)</label>
                                                <?php echo $etiquetABA8X4_2 ?>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Banner Horizontal 6X3 (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner6x3"></div>
                        <form id="formulario_banner6x3" enctype="multipart/form-data">

                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 6X3 (AB6X3_1)</label>
                                                <?php echo $etiquetABA6X3_1 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner6X3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner6X3_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 6X3 (AB6X3_2)</label>
                                                <?php echo $etiquetABA6X3_2 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 6X3 (AB6X3_3)</label>
                                                <?php echo $etiquetABA6X3_3 ?>
                                                <button type='button' class='btn btn-primary btn-vista_banner6X3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_banner6X3_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Banner 6X3 (AB6X3_4)</label>
                                                <?php echo $etiquetABA6X3_4 ?>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir Cajas de Luz (3 unidades)</h5>
                    </div>

                    <div>
                        <div id="respuesta_img_cajaluz"></div>
                        <form id="formulario_cajaluz" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input  hidden  value="1920x1080" name="dimensiones_max_cajaluz" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="image/jpg.image/png.image/jpeg" name="formato_cajaluz" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABCL1" name="cajaluz_1" class="form-control ">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABCL2" name="cajaluz_2" class="form-control ">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABCL3" name="cajaluz_3" class="form-control ">
                                        </td>
                                        <td>
                                            <input  hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_cajaluz" class="form-controlx">
                                        </td>
                                        <td>
                                            <input  hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 1 (ABCL1)</label>
                                                <?php echo $etiquetABACL1 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="cajaluz_1File" id="cajaluz_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABCL1; ?>" role="progressbar" style ="width:<?php echo $colorABCL1; ?>%" aria-valuenow="<?php echo $colorABCL1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 2 (ABCL2)</label>
                                                <?php echo $etiquetABACL2 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="cajaluz_2File" id="cajaluz_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABCL2; ?>" role="progressbar" style ="width:<?php echo $colorABCL2; ?>%" aria-valuenow="<?php echo $colorABCL2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Caja Luz 3 (ABCL3)</label>
                                                <?php echo $etiquetABACL3 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="cajaluz_3File" id="cajaluz_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_cajaluz_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABCL3; ?>" role="progressbar" style ="width:<?php echo $colorABCL3; ?>%" aria-valuenow="<?php echo $colorABCL3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Editar Cajas de Luz (3 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_editar_img_cajaluz"></div>
                        <form id="formulario_editar_cajaluz" enctype="multipart/form-data">
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 1 (ABCL1)</label>
                                                <?php echo $etiquetABACL1 ?>
                                                <button type='button' class='btn btn-primary btn_vista_cajaluz_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_cajaluz_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 2 (ABCL2)</label>
                                                <?php echo $etiquetABACL2 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caja Luz 3 (ABCL3)</label>
                                                <?php echo $etiquetABACL3 ?>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir Plumas (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_plumas"></div>
                        <form id="formulario_plumas" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <td>
                                            <input  hidden  value="1920x1080" name="dimensiones_max_pluma" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="image/jpg.image/png.image/jpeg" name="formato_pluma" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_plumas" class="form-controlx">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL1" name="pluma_1" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL2" name="pluma_2" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL3" name="pluma_3" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL4" name="pluma_4" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL5" name="pluma_5" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL6" name="pluma_6" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL7" name="pluma_7" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL8" name="pluma_8" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL9" name="pluma_9" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL10" name="pluma_10" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL11" name="pluma_11" class="form-control">
                                        </td>
                                        <td>
                                            <input  hidden  value="ABPL12" name="pluma_12" class="form-control ">
                                        </td>
                                        <td>
                                            <input hidden  value="<?php echo $id_auditorio_padre; ?> " name="id_auditorio_padre" class="form-control">
                                        </td>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 1 (ABPL1)</label>
                                                <?php echo $etiquetABAPL1 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_1File" id="pluma_1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_1" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL1; ?>" role="progressbar" style ="width:<?php echo $colorABPL1; ?>%" aria-valuenow="<?php echo $colorABPL1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 2 (ABPL2)</label>
                                                <?php echo $etiquetABAPL2 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_2File" id="pluma_2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_2" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL2; ?>" role="progressbar" style ="width:<?php echo $colorABPL2; ?>%" aria-valuenow="<?php echo $colorABPL2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 3 (ABPL3)</label>
                                                <?php echo $etiquetABAPL3 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_3File" id="pluma_3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_3" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL3; ?>" role="progressbar" style ="width:<?php echo $colorABPL3; ?>%" aria-valuenow="<?php echo $colorABPL3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 4 (ABPL4)</label>
                                                <?php echo $etiquetABAPL4 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_4File" id="pluma_4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_4" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL4; ?>" role="progressbar" style ="width:<?php echo $colorABPL4; ?>%" aria-valuenow="<?php echo $colorABPL4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 5 (ABPL5)</label>
                                                <?php echo $etiquetABAPL5 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_5File" id="pluma_5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_5" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL5; ?>" role="progressbar" style ="width:<?php echo $colorABPL5; ?>%" aria-valuenow="<?php echo $colorABPL5; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 6 (ABPL6)</label>
                                                <?php echo $etiquetABAPL6 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_6File" id="pluma_6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_6" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL6; ?>" role="progressbar" style ="width:<?php echo $colorABPL6; ?>%" aria-valuenow="<?php echo $colorABPL6; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 7 (ABPL7)</label>
                                                <?php echo $etiquetABAPL7 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_7File" id="pluma_7File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_7" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL7; ?>" role="progressbar" style ="width:<?php echo $colorABPL7; ?>%" aria-valuenow="<?php echo $colorABPL7; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 8 (ABPL8)</label>
                                                <?php echo $etiquetABAPL8 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_8File" id="pluma_8File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_8" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL8; ?>" role="progressbar" style ="width:<?php echo $colorABPL8; ?>%" aria-valuenow="<?php echo $colorABPL8; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 9 (ABPL9)</label>
                                                <?php echo $etiquetABAPL9 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_9File" id="pluma_9File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_9" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL9; ?>" role="progressbar" style ="width:<?php echo $colorABPL9; ?>%" aria-valuenow="<?php echo $colorABPL9; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 10 (ABPL10)</label>
                                                <?php echo $etiquetABAPL10 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_10File" id="pluma_10File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_10" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL10; ?>" role="progressbar" style ="width:<?php echo $colorABPL10; ?>%" aria-valuenow="<?php echo $colorABPL10; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 11 (ABPL11)</label>
                                                <?php echo $etiquetABAPL11 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_11File" id="pluma_11File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_11" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL11; ?>" role="progressbar" style ="width:<?php echo $colorABPL11; ?>%" aria-valuenow="<?php echo $colorABPL11; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir Pluma 12 (ABPL12)</label>
                                                <?php echo $etiquetABAPL12 ?>
                                                <input style="color: transparent; margin-left:27%;"  type="file" name="pluma_12File" id="pluma_12File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_pluma_12" class="progress-bar progress-bar-striped progress-bar-animated <?php echo $colorClaseABPL12; ?>" role="progressbar" style ="width:<?php echo $colorABPL12; ?>%" aria-valuenow="<?php echo $colorABPL12; ?>" aria-valuemin="0" aria-valuemax="100"></div>
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

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Editar Plumas (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner25x3"></div>
                        <form id="formulario_banner25x3" enctype="multipart/form-data">
                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 1 (ABPL1)</label>
                                                <?php echo $etiquetABAPL1 ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 2 (ABPL2)</label>
                                                <?php echo $etiquetABAPL2 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 3 (ABPL3)</label>
                                                <?php echo $etiquetABAPL3 ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 4 (ABPL4)</label>
                                                <?php echo $etiquetABAPL4 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 5 (ABPL5)</label>
                                                <?php echo $etiquetABAPL5 ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 6 (ABPL6)</label>
                                                <?php echo $etiquetABAPL6 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 7 (ABPL7)</label>
                                                <?php echo $etiquetABAPL7 ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 8 (ABPL8)</label>
                                                <?php echo $etiquetABAPL8 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 9 (ABPL9)</label>
                                                <?php echo $etiquetABAPL9 ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 10 (ABPL10)</label>
                                                <?php echo $etiquetABAPL10 ?>
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
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 11 (ABPL11)</label>
                                                <?php echo $etiquetABAPL11 ?>
                                                <button type='button' class='btn btn-primary btn_vista_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_pluma_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Pluma 12 (ABPL12)</label>
                                                <?php echo $etiquetABAPL12 ?>
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
        <h2>Publicidad del <b>Auditorio AB</b></h2>
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
    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AB3X6%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_3x6 = decidir_boton($n_archivos_subidos, 4);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AB2.5X3%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_25x3 = decidir_boton($n_archivos_subidos, 12);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AB8X4%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_8x4 = decidir_boton($n_archivos_subidos, 2);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'AB6X3%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_6x3 = decidir_boton($n_archivos_subidos, 4);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'ABCL%';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
    $boton_cl = decidir_boton($n_archivos_subidos, 3);

    $array = null;

    $query = "SELECT sum(subido) as n_archivos_subidos from publicidad_espacio where id_padre = '$id_auditorio_padre' and nombre_publicidad like 'ABPL%';";
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
                        <td>2000X1000</td>
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
                        <td>540X2575</td>
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

<script src="../js/tablaAB_.js"></script>