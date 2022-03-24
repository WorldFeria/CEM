<?php
//error_reporting(0);
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

$id_stand_padre = $_GET['cod_stand']; //PICC1
//corta el id en 2 pegalos en ese string y si el fichero está vacio muestra la imagen preder


$codigo_where_pabellon = substr($id_stand_padre, 0, 2);

$query = "SELECT id_pabellon from stand_evento where id_stand = '$id_stand_padre';";

$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {

    //$array['data'][] = array_map("utf8_encode", $data);
    $array["data"][] = $data;
}

$id_pabellon = $array["data"][0]["id_pabellon"];


$query = "SELECT id_evento from pabellon where id_pabellon = '$id_pabellon';";

$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {

    //$array['data'][] = array_map("utf8_encode", $data);
    $array["data"][] = $data;
}

$id_evento = $array["data"][1]["id_evento"];

$query = "SELECT nombre_evento from evento where id_evento = '$id_evento';";

$rest = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($rest)) {

    //$array['data'][] = array_map("utf8_encode", $data);
    $array["data"][] = $data;
}

$nombre_evento = $array["data"][2]["nombre_evento"];

//echo json_encode($array);



$query = "SELECT codigo_stand from stand_evento where  id_stand = '$id_stand_padre';";

$rest = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($rest)) {

    //$array['data'][] = array_map("utf8_encode", $data);
    $array["data"][] = $data;
}


$codigo_del_stand = $array["data"][3]["codigo_stand"];



$nombre_evento = str_replace(" ", "_", $nombre_evento); //check

$direccion_guardado = "../imagenes_diseño/$nombre_evento/" . substr($codigo_del_stand, 0, 2) . "/STANDS/" . $codigo_del_stand . "/";



$query ="SELECT subido from contenidos_stand where codigo_stand = (select codigo_stand from stand_evento where id_stand = '$id_stand_padre');";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $arrayVerde["data"][] = $data;
}




$colorlogo_unid1 = barraVerde($arrayVerde["data"][0]['subido']);
$colorClaselogo_unid1 = claseBarraVerde($colorlogo_unid1);
$etiquetalogo_unid1 = etiquetaSubido($colorlogo_unid1,'etiquetalogo_unid1');

$colorlogo_unid2 = barraVerde($arrayVerde["data"][1]['subido']);
$colorClaselogo_unid2 = claseBarraVerde($colorlogo_unid2);
$etiquetalogo_unid2 = etiquetaSubido($colorlogo_unid2,'etiquetalogo_unid2');

$colorlogo_unid3 = barraVerde($arrayVerde["data"][2]['subido']);
$colorClaselogo_unid3 = claseBarraVerde($colorlogo_unid3);
$etiquetalogo_unid3 = etiquetaSubido($colorlogo_unid3,'etiquetalogo_unid3');

$colorlogo_unid4 = barraVerde($arrayVerde["data"][3]['subido']);
$colorClaselogo_unid4 = claseBarraVerde($colorlogo_unid4);
$etiquetalogo_unid4 = etiquetaSubido($colorlogo_unid4,'etiquetalogo_unid4');

$colorbanner1_unid1 = barraVerde($arrayVerde["data"][4]['subido']);
$colorClasebanner1_unid1 = claseBarraVerde($colorbanner1_unid1);
$etiquetabanner1_unid1 = etiquetaSubido($colorbanner1_unid1,'etiquetabanner1_unid1');

$colorbanner1_unid2 = barraVerde($arrayVerde["data"][5]['subido']);
$colorClasebanner1_unid2 = claseBarraVerde($colorbanner1_unid2);
$etiquetabanner1_unid2 = etiquetaSubido($colorbanner1_unid2,'etiquetabanner1_unid2');

$colorbanner2_unid1 = barraVerde($arrayVerde["data"][6]['subido']);
$colorClasebanner2_unid1 = claseBarraVerde($colorbanner2_unid1);
$etiquetabanner2_unid1 = etiquetaSubido($colorbanner2_unid1,'etiquetabanner2_unid1');

$colorbanner2_unid2 = barraVerde($arrayVerde["data"][7]['subido']);
$colorClasebanner2_unid2 = claseBarraVerde($colorbanner2_unid2);
$etiquetabanner2_unid2 = etiquetaSubido($colorbanner2_unid2,'etiquetabanner2_unid2');

$colorvideoPantalla1 = barraVerde($arrayVerde["data"][8]['subido']);
$colorClasevideoPantalla1 = claseBarraVerde($colorvideoPantalla1);
$etiquetavideoPantalla1 = etiquetaSubido($colorvideoPantalla1,'etiquetavideoPantalla1');

$colorvideoPantalla2 = barraVerde($arrayVerde["data"][9]['subido']);
$colorClasevideoPantalla2 = claseBarraVerde($colorvideoPantalla2);
$etiquetavideoPantalla2 = etiquetaSubido($colorvideoPantalla2,'etiquetavideoPantalla2');

$colorfolleto1 = barraVerde($arrayVerde["data"][10]['subido']);
$colorClasefolleto1 = claseBarraVerde($colorfolleto1);
$etiquetafolleto1 = etiquetaSubido($colorfolleto1,'etiquetafolleto1');

$colorfolleto2 = barraVerde($arrayVerde["data"][11]['subido']);
$colorClasefolleto2 = claseBarraVerde($colorfolleto2);
$etiquetafolleto2 = etiquetaSubido($colorfolleto2,'etiquetafolleto2');

$colorfolleto3 = barraVerde($arrayVerde["data"][12]['subido']);
$colorClasefolleto3 = claseBarraVerde($colorfolleto3);
$etiquetafolleto3 = etiquetaSubido($colorfolleto3,'etiquetafolleto3');

$colorpdf_1 = barraVerde($arrayVerde["data"][13]['subido']);
$colorClasepdf_1 = claseBarraVerde($colorpdf_1);
$etiquetapdf_1 = etiquetaSubido($colorpdf_1,'etiquetapdf_1');

$colorpdf_2 = barraVerde($arrayVerde["data"][14]['subido']);
$colorClasepdf_2 = claseBarraVerde($colorpdf_2);
$etiquetapdf_2 = etiquetaSubido($colorpdf_2,'etiquetapdf_2');

$colorpdf_3 = barraVerde($arrayVerde["data"][15]['subido']);
$colorClasepdf_3 = claseBarraVerde($colorpdf_3);
$etiquetapdf_3 = etiquetaSubido($colorpdf_3,'etiquetapdf_3');

$colorportadaGaleria_cara1 = barraVerde($arrayVerde["data"][16]['subido']);
$colorClaseportadaGaleria_cara1 = claseBarraVerde($colorportadaGaleria_cara1);
$etiquetaportadaGaleria_cara1 = etiquetaSubido($colorportadaGaleria_cara1,'etiquetaportadaGaleria_cara1');

$colorportadaGaleria_cara2 = barraVerde($arrayVerde["data"][17]['subido']);
$colorClaseportadaGaleria_cara2 = claseBarraVerde($colorportadaGaleria_cara2);
$etiquetaportadaGaleria_cara2 = etiquetaSubido($colorportadaGaleria_cara2,'etiquetaportadaGaleria_cara2');

$colorimgGaleria1 = barraVerde($arrayVerde["data"][18]['subido']);
$colorClaseimgGaleria1 = claseBarraVerde($colorimgGaleria1);
$etiquetaimgGaleria1 = etiquetaSubido($colorimgGaleria1,'etiquetaimgGaleria1');

$colorimgGaleria2 = barraVerde($arrayVerde["data"][19]['subido']);
$colorClaseimgGaleria2 = claseBarraVerde($colorimgGaleria2);
$etiquetaimgGaleria2 = etiquetaSubido($colorimgGaleria2,'etiquetaimgGaleria2');

$colorimgGaleria3 = barraVerde($arrayVerde["data"][20]['subido']);
$colorClaseimgGaleria3 = claseBarraVerde($colorimgGaleria3);
$etiquetaimgGaleria3 = etiquetaSubido($colorimgGaleria3,'etiquetaimgGaleria3');

$colorimgGaleria4 = barraVerde($arrayVerde["data"][21]['subido']);
$colorClaseimgGaleria4 = claseBarraVerde($colorimgGaleria4);
$etiquetaimgGaleria4 = etiquetaSubido($colorimgGaleria4,'etiquetaimgGaleria4');

$colorimgGaleria5 = barraVerde($arrayVerde["data"][22]['subido']);
$colorClaseimgGaleria5 = claseBarraVerde($colorimgGaleria5);
$etiquetaimgGaleria5 = etiquetaSubido($colorimgGaleria5,'etiquetaimgGaleria5');

$colorimgGaleria6 = barraVerde($arrayVerde["data"][23]['subido']);
$colorClaseimgGaleria6 = claseBarraVerde($colorimgGaleria6);
$etiquetaimgGaleria6 = etiquetaSubido($colorimgGaleria6,'etiquetaimgGaleria6');

$colorimgGaleria7 = barraVerde($arrayVerde["data"][24]['subido']);
$colorClaseimgGaleria7 = claseBarraVerde($colorimgGaleria7);
$etiquetaimgGaleria7 = etiquetaSubido($colorimgGaleria7,'etiquetaimgGaleria7');

$colorimgGaleria8 = barraVerde($arrayVerde["data"][25]['subido']);
$colorClaseimgGaleria8 = claseBarraVerde($colorimgGaleria8);
$etiquetaimgGaleria8 = etiquetaSubido($colorimgGaleria8,'etiquetaimgGaleria8');

$colorimgGaleria9 = barraVerde($arrayVerde["data"][26]['subido']);
$colorClaseimgGaleria9 = claseBarraVerde($colorimgGaleria9);
$etiquetaimgGaleria9 = etiquetaSubido($colorimgGaleria9,'etiquetaimgGaleria9');

$colorimgGaleria10 = barraVerde($arrayVerde["data"][27]['subido']);
$colorClaseimgGaleria10 = claseBarraVerde($colorimgGaleria10);
$etiquetaimgGaleria10 = etiquetaSubido($colorimgGaleria10,'etiquetaimgGaleria10');

$colorimgGaleria11 = barraVerde($arrayVerde["data"][28]['subido']);
$colorClaseimgGaleria11 = claseBarraVerde($colorimgGaleria11);
$etiquetaimgGaleria11 = etiquetaSubido($colorimgGaleria11,'etiquetaimgGaleria11');

$colorimgGaleria12 = barraVerde($arrayVerde["data"][29]['subido']);
$colorClaseimgGaleria12 = claseBarraVerde($colorimgGaleria12);
$etiquetaimgGaleria12 = etiquetaSubido($colorimgGaleria12,'etiquetaimgGaleria12');

$colorimgIpad = barraVerde($arrayVerde["data"][30]['subido']);
$colorClaseimgIpad = claseBarraVerde($colorimgIpad);
$etiquetaimgIpad = etiquetaSubido($colorimgIpad,'etiquetaimgIpad');




?>
<div class="obtener_id_evento" id="<?php echo $id_evento ?>"></div>
<div class="obtener_id_pabellon" id="<?php echo $id_pabellon ?>"></div>

<script src="../js/notyf/notyf.min.js"></script>

<link rel="stylesheet" href="../css/notyf/notyf.min.css">
</link>
<link rel="stylesheet" href="../css/lead_styles.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

<script>
    var id_evento = $('.obtener_id_evento').attr('id');
    var id_pabellon = $('.obtener_id_pabellon').attr('id');
    if (idRol == 1) {
        document.getElementById("btn-evento-user-3").style.display = "none";
        document.getElementById("btn-stand-user-3").style.display = "none";
        $('.boton-regreso-evento').click(function() {
            $('#page_content').load(`eventAdmin.php`);

        });
        $('.boton-regreso-espacios').click(function() {
            $('#page_content').load(`event_editAdmin.php?idevent=${id_evento}`);
        });
        $('.boton-regreso-stand').click(function() {
            $('#page_content').load(`stand_edit.php?PABE=${id_pabellon}`);
        });
    } else if (idRol == 2) {
        document.getElementById("btn-evento-user-3").style.display = "none";
        document.getElementById("btn-stand-user-3").style.display = "none";
        $('.boton-regreso-evento').click(function() {
            $('#page_content').load(`eventOrg.php`);
        });
        $('.boton-regreso-espacios').click(function() {
            $('#page_content').load(`event_editOrg.php?idevent=${id_evento}`);
        });
        $('.boton-regreso-stand').click(function() {
            $('#page_content').load(`event_editOrg.php?PABE=${id_pabellon}`);
        });
    } else if (idRol == 3) {
        document.getElementById("btn-evento").style.display = "none";
        document.getElementById("btn-espacio").style.display = "none";
        document.getElementById("btn-stand").style.display = "none";
        $('.regresar-stand-user-3').click(function() {
            $('#page_content').load(`../html/standsExh.php`);
        });
        $('.regresar-evento-user-3').click(function() {
            $('#page_content').load(`../php/ajax/eventExh.php`);
        });
    }
</script>









<div id="<?php echo $direccion_guardado ?>" class="obtener_url"></div>
<div id="<?php echo $id_stand_padre ?>" class="obtener_id_stand"></div>

<!---------------------------------logo 1,2,3,4-------------->



<div class="modal fade modal_agregar_imagen_logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el Logo (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_logo"></div>
                        <form id="formulario_envio_logo" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden id="dimensiones_max_banner1_logo" name="dimensiones_max_banner1_logo" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden id="formato_banner1_logo" name="formato_banner1_logo" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner1_logo" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="logo_unid1" name="nombre_logo1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="logo_unid2" name="nombre_logo2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="logo_unid3" name="nombre_logo3" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="logo_unid4" name="nombre_logo4" type="text" class="form-control">
                                        </td>

                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>



                                    </div>
                                </div>
                            </div>
                            <br>
                            <table >
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Logo 1</label>
                                                <?php echo $etiquetalogo_unid1; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="logo1File" id="logo1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_logo1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Logo 2</label>
                                                <?php echo $etiquetalogo_unid2; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="logo2File" id="logo2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_logo2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Logo 3</label>
                                                <?php echo $etiquetalogo_unid3; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="logo3File" id="logo3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_logo3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1980x900 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el Logo 4</label>
                                                <?php echo $etiquetalogo_unid4; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="logo4File" id="logo4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_logo4" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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

<!------------------------------------------------------------banner1 uni1 y unid 2-->

<div class="modal fade modal_agregar_imagen_banner1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el primer Banner (2 unidades): </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner1"></div>
                        <form id="formulario_envio_banner1" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden id="dimensiones_max_banner1" name="dimensiones_max_banner1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden id="formato_banner1" name="formato_banner1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner1" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="banner1_unid1" name="nombre_banner1Unid1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="banner1_unid2" name="nombre_banner1Unid2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden name="codigo_del_stand" value="<?php echo $codigo_del_stand; ?> " type="text" class="form-control">
                                        </td>



                                    </div>
                                </div>
                            </div>
                            <br>

                            <table>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir archivo para el banner 1 (1)</label>
                                                <?php echo $etiquetabanner1_unid1; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="banner1Unid1File" id="banner1Unid1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1700x2000 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el banner 1 (2)</label>
                                                <?php echo $etiquetabanner1_unid2; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="banner1Unid2File" id="banner1Unid2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner1_unid2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual a 1700x2000 px y debe ser del tipo .jpg, .jpeg o .png</small>
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


<!--------------------------------------------banner 2-->

<div class="modal fade modal_agregar_imagen_banner2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes para el segundo Banner (2 unidades): </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner2"></div>
                        <form id="formulario_envio_banner2" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden id="dimensiones_max_banner1_banner2" name="dimensiones_max_banner1_banner2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden id="formato_banner1_banner2" name="formato_banner1_banner2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_banner1_banner2" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="banner2_unid1" name="nombre_banner2_1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="banner2_unid2" name="nombre_banner2_2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>



                                    </div>
                                </div>
                            </div>
                            <br>
                            <table>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el banner 2 (1)</label>
                                                <?php echo $etiquetabanner2_unid1; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="banner2Unid1File" id="banner2Unid1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual a 1700x2000 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para el banner 2 (2)</label>
                                                <?php echo $etiquetabanner2_unid2; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="banner2Unid2File" id="banner2Unid2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_banner2_unid2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual a 1700x2000 px y debe ser del tipo .jpg, .jpeg o .png</small>
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


<!--portada-->



<div class="modal fade modal_agregar_imagen_portada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5>Subir imagenes para la portada de la galería (2 unidades): </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_portada"></div>
                        <form id="formulario_envio_portada" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden id="dimensiones_max_portada" name="dimensiones_max_portada" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden id="formato_portada" name="formato_portada" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_portada" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="portadaGaleria_cara1" name="nombre_portada1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="portadaGaleria_cara2" name="nombre_portada2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>



                                    </div>
                                </div>
                            </div>
                            <br>
                            <table>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Subir archivo para la portada (cara 1)</label>
                                                <?php echo $etiquetaportadaGaleria_cara1; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="portadaCara1File" id="portadaCara1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_portada1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1500x1800 px y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo para la portada (cara 2)</label>
                                                <?php echo $etiquetaportadaGaleria_cara2; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="portadaCara2File" id="portadaCara2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_portada2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a 1500x1700 px y debe ser del tipo .jpg, .jpeg o .png</small>
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

<!--Galería  12 imagenes -->


<div class="modal fade modal_agregar_imagen_galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagenes de la galería (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_12_galeria"></div>
                        <form id="formulario_envio_12_galeria" enctype="multipart/form-data">
                            <div>
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden id="dimensiones_max_imgs_g" name="dimensiones_max_imgs_g" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden id="formato_imgs_g" name="formato_imgs_g" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_imgs_g" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="img1Galeria" name="nombre_archivoimg1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img2Galeria" name="nombre_archivoimg2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img3Galeria" name="nombre_archivoimg3" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img4Galeria" name="nombre_archivoimg4" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img5Galeria" name="nombre_archivoimg5" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img6Galeria" name="nombre_archivoimg6" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img7Galeria" name="nombre_archivoimg7" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img8Galeria" name="nombre_archivoimg8" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img9Galeria" name="nombre_archivoimg9" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img10Galeria" name="nombre_archivoimg10" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img11Galeria" name="nombre_archivoimg11" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="img12Galeria" name="nombre_archivoimg12" type="text" class="form-control">
                                        </td>

                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>


                                    </div>
                                </div>
                            </div>
                            <br>



                            <table >
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 1 de la galería</label>
                                                <?php echo $etiquetaimgGaleria1; ?>
                                                <input style="color: transparent; margin-left:30%;" type="file" name="nombre_archivoimg1File" id="nombre_archivoimg1File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress">
                                                    <div id="img_uploadbar_img1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">

                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 2 de la galería</label>
                                                <?php echo $etiquetaimgGaleria2; ?>
                                                <input style="color: transparent; margin-left:30%;"  id="tipo_archivo_aceptado" type="file" name="nombre_archivoimg2File" id="nombre_archivoimg2File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 3 de la galería</label>
                                                <?php echo $etiquetaimgGaleria3; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg3File" id="nombre_archivoimg3File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">

                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 4 de la galería</label>
                                                <?php echo $etiquetaimgGaleria4; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg4File" id="nombre_archivoimg4File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img4" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 5 de la galería</label>
                                                <?php echo $etiquetaimgGaleria5; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg5File" id="nombre_archivoimg5File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img5" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">

                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 6 de la galería</label>
                                                <?php echo $etiquetaimgGaleria6; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg6File" id="nombre_archivoimg6File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img6" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 7 de la galería</label>
                                                <?php echo $etiquetaimgGaleria7; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg7File" id="nombre_archivoimg7File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img7" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 8 de la galería</label>
                                                <?php echo $etiquetaimgGaleria8; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg8File" id="nombre_archivoimg8File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img8" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 9 de la galería</label>
                                                <?php echo $etiquetaimgGaleria9; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg9File" id="nombre_archivoimg9File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img9" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 10 de la galería</label>
                                                <?php echo $etiquetaimgGaleria10; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg10File" id="nombre_archivoimg10File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img10" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class ="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 11 de la galería</label>
                                                <?php echo $etiquetaimgGaleria11; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg11File" id="nombre_archivoimg11File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img11" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir imagen 12 de la galería</label>
                                                <?php echo $etiquetaimgGaleria12; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="nombre_archivoimg12File" id="nombre_archivoimg12File" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbar_img12" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
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



<!------------------------VIDEO  PANTALLA-->


<div class="modal fade modal_agregar_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir video </h5>
                    </div>
                    <div>
                        <div id="respuesta_video_pantalla"></div>
                        <form id="formulario_envio_video" enctype="multipart/form-data">
                            <div>
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden value="1920x1080" name="dimensiones_max_video" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="video/mp4" name="formato_video" type="text" class="form-control">
                                        </td>
                                        <td>

                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="videoPantallavideoPantalla" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="videoPantalla1" name="nombre_archivo_video1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="videoPantalla2" name="nombre_archivo_video2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>

                                    </div>
                                </div>
                            </div>
                            <br>


                            <table >
                                <tr class ="row">
                                    <td class = "col">

                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo</label>
                                                <?php echo $etiquetavideoPantalla1; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="videoPantallaFile1" id="videoPantallaFile1" accept="video/mp4">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_videoP1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El video debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .mp4</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo</label>
                                                <?php echo $etiquetavideoPantalla2; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="videoPantallaFile2" id="videoPantallaFile2" accept="video/mp4">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_videoP2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El video debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .mp4</small>
                                        </div>
                                    <td>
                                </tr>
                            </table >
                    

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--------------------ipad-->

<div class="modal fade modal_Ipad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagen para el Ipad </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_Ipad"></div>
                        <form id="formulario_envio_Ipad" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden value="1390x1854" name="dimensiones_max_Ipad" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="image/jpg.image/png.image/jpeg" name="formato_Ipad" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_Ipad" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="imgIpad" name="nombre_archivo_Ipad" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>


                                    </div>
                                </div>
                            </div>
                            <br>
                            <table>
                                <tr class="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Cambiar o subir archivo</label>
                                                <?php echo $etiquetaimgIpad; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="imgIpadFile" id="imgIpadFile" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_ipad" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual 1390x1854 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
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



<!--------------------Folleto visual-->


<div class="modal fade modal_agregar_folleto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir Caratulas para los PDF's </h5>
                    </div>
                    <div>
                        <div id="respuesta_folleto"></div>
                        <form id="formulario_envio_folleto" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden value="1400x920" name="dimensiones_max_pdf" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="image/jpg.image/png.image/jpeg" name="formato" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="folleto1" name="nombre_folleto1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="folleto2" name="nombre_folleto2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="folleto3" name="nombre_folleto3" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <table>
                                <tr class="row">
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caratula 1</label>
                                                <?php echo $etiquetafolleto1; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="folleto_visual_1" id="folleto_visual_1" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_visual_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El documento debe tener un tamaño menor o igual a los 1400x920px y ser del tipo jpg o png</small>
                                        </div>
                                    </td>
                                    <td class = "col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caratula 2</label>
                                                <?php echo $etiquetafolleto2; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="folleto_visual_2" id="folleto_visual_2" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_visual_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El documento debe tener un tamaño menor o igual a los 1400x920px y ser del tipo jpg o png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">

                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Caratula 3</label>
                                                <?php echo $etiquetafolleto3; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="folleto_visual_3" id="folleto_visual_3" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar_visual_3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El documento debe tener un tamaño menor o igual a los 1400x920px y ser del tipo jpg o png</small>
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


<!--------------------PDF descargable 3 unidades-->


<div class="modal fade modal_agregar_pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir PDF descargable (3 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_pdf"></div>
                        <form id="formulario_envio_pdf" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">

                                        <td>
                                            <input hidden value="application/pdf" name="formato" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="pdf_1" name="nombre_pdf_1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="pdf_2" name="nombre_pdf_2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="pdf_3" name="nombre_pdf_3" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>

                                    </div>
                                </div>
                            </div>
                            <br>

                            <table>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">PDF 1</label>
                                                <?php echo $etiquetapdf_1; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="pdf_1" id="pdf_1" accept="application/pdf">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="pdf_uploadbar_visual_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El documento debe tener un tamaño maximo de 30 MB y ser del tipo PDF</small>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">PDF 2</label>
                                                <?php echo $etiquetapdf_2; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="pdf_2" id="pdf_2" accept="application/pdf">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="pdf_uploadbar_visual_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El documento debe tener un tamaño maximo de 30 MB y ser del tipo PDF</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">PDF 3</label>
                                                <?php echo $etiquetapdf_3; ?>
                                                <input style="color: transparent; margin-left:30%;"  type="file" name="pdf_3" id="pdf_3" accept="application/pdf">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="pdf_uploadbar_visual_3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>El documento debe tener un tamaño maximo de 30 MB y ser del tipo PDF</small>
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








<!--vista PDF'S-->

<div class="modal fade modal_vista_pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">PDF's (3 unidades) </h5>
                    </div>
                    <div>
                        <form>

                            <table >
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo PDF (1)</label>
                                            <?php echo $etiquetapdf_1; ?>
                                            <button type='button' class='btn btn-primary btn_vista_pdf_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa_pdf1'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_pdf_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.borrar_pdf'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo PDF (2)</label>
                                            <?php echo $etiquetapdf_2; ?>
                                            <button type='button' class='btn btn-primary btn_vista_pdf_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa_pdf2'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_pdf_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.borrar_pdf'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo PDF (3)</label>
                                            <?php echo $etiquetapdf_3; ?>
                                            <button type='button' class='btn btn-primary btn_vista_pdf_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa_pdf3'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_pdf_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.borrar_pdf'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
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



<!--vista folleto-->

<div class="modal fade modal_vista_folleto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Caratulas PDF's (3 unidades) </h5>
                    </div>
                    <div>
                        <form>

                            <table >
                            <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo de la Caratula (1)</label>
                                            <?php echo $etiquetafolleto1; ?>
                                            <button type='button' class='btn btn-primary btn_vista_folleto_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_folleto_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo de la Caratula (2)</label>
                                            <?php echo $etiquetafolleto2; ?>
                                            <button type='button' class='btn btn-primary btn_vista_folleto_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_folleto_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo de la Caratula (3)</label>
                                            <?php echo $etiquetafolleto3; ?>
                                            <button type='button' class='btn btn-primary btn_vista_folleto_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_folleto_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
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






<!---------------------------------logo 1,2,3,4-------------->



<div class="modal fade modal_vista_imagen_logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Imagenes del Logo (4 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_logo"></div>
                        <form id="formulario_envio_logo" enctype="multipart/form-data">

                            <table >
                            <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo del Logo (1)</label>
                                            <?php echo $etiquetalogo_unid1; ?>
                                            <button type='button' class='btn btn-primary btn-vista_logo_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_logo_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo del Logo (2)</label>
                                            <?php echo $etiquetalogo_unid2; ?>
                                            <button type='button' class='btn btn-primary btn-vista_logo_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_logo_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo del Logo (3)</label>
                                            <?php echo $etiquetalogo_unid3; ?>
                                            <button type='button' class='btn btn-primary btn-vista_logo_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_logo_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo del Logo (4)</label>
                                            <?php echo $etiquetalogo_unid4; ?>
                                            <button type='button' class='btn btn-primary btn-vista_logo_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_logo_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
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

<!------------------------------------------------------------banner1 uni1 y unid 2-->

<div class="modal fade modal_vista_imagen_banner1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Ver o borrar imagenes para el primer Banner (2 unidades): </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner1"></div>
                        <form id="formulario_envio_banner1" enctype="multipart/form-data">


                            <table>
                            <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label id="cambiar_subir" class="col-form-label w-100">Ver o borar archivo del banner 1 (1)</label>
                                            <?php echo $etiquetabanner1_unid1; ?>
                                            <button type='button' class='btn btn-primary btn-vista_banner_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_banner_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo del banner 1 (2)</label>
                                            <?php echo $etiquetabanner1_unid2; ?>
                                            <button type='button' class='btn btn-primary btn-vista_banner_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_banner_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
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


<!--------------------------------------------banner 2-->

<div class="modal fade modal_vista_imagen_banner2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Ver o borrar imagenes para el segundo Banner (2 unidades): </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_banner2"></div>
                        <form id="formulario_envio_banner2" enctype="multipart/form-data">

                            <table>
                            <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo del banner 2 (1)</label>
                                            <?php echo $etiquetabanner2_unid1; ?>
                                            <button type='button' class='btn btn-primary btn-vista_banner2_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_banner2_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo del banner 2 (2)</label>
                                            <?php echo $etiquetabanner2_unid2; ?>
                                            <button type='button' class='btn btn-primary btn-vista_banner2_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_banner2_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
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


<!--portada-->



<div class="modal fade modal_vista_imagen_portada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5>Ver o borrar imagenes para la portada de la galería (2 unidades): </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_portada"></div>
                        <form id="formulario_envio_portada" enctype="multipart/form-data">

                            <table>
                            <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo de la portada (cara 1)</label>
                                            <?php echo $etiquetaportadaGaleria_cara1; ?>
                                            <button type='button' class='btn btn-primary btn-vista_portada_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_portada_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo de la portada (cara 2)</label>
                                            <?php echo $etiquetaportadaGaleria_cara2; ?>
                                            <button type='button' class='btn btn-primary btn-vista_portada_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_portada_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
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

<!--Galería  12 imagenes -->


<div class="modal fade modal_vista_imagen_galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Ver o borrar imagenes de la galería (12 unidades) </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_12_galeria"></div>
                        <form id="formulario_envio_12_galeria" enctype="multipart/form-data">




                            <table >
                            <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 1</label>
                                            <?php echo $etiquetaimgGaleria1; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">

                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 2</label>
                                            <?php echo $etiquetaimgGaleria2; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 3</label>
                                            <?php echo $etiquetaimgGaleria3; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">

                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 4</label>
                                            <?php echo $etiquetaimgGaleria4; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 5</label>
                                            <?php echo $etiquetaimgGaleria5; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">

                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 6</label>
                                            <?php echo $etiquetaimgGaleria6; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 7</label>
                                            <?php echo $etiquetaimgGaleria7; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 8</label>
                                            <?php echo $etiquetaimgGaleria8; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_8' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 9</label>
                                            <?php echo $etiquetaimgGaleria9; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_9' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 10</label>
                                                <?php echo $etiquetaimgGaleria10; ?>
                                                <button type='button' class='btn btn-primary btn-vista_imgG_10' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_imgG_10' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                </tr>
                                <tr class="row">
                                    <td class="col">
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 11</label>
                                            <?php echo $etiquetaimgGaleria11; ?>
                                            <button type='button' class='btn btn-primary btn-vista_imgG_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-borrar_imgG_11' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="col">
                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Ver o borrar imagen de la galería n. 12</label>
                                                <?php echo $etiquetaimgGaleria12; ?>
                                                <button type='button' class='btn btn-primary btn-vista_imgG_12' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_imgG_12' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
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


<!------------------------VIDEO  PANTALLA-->

<div class="modal fade modal_vista_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Editar videos</h5>
                    </div>
                    <div class="col-12">
                        <div id="respuesta_video_pantalla"></div>
                        <form id="formulario_envio_video" enctype="multipart/form-data">

                            <table>
                                <tr class="row">
                                    <td class="col">

                                        <div class="form-group">
                                            <div>

                                                <label class="col-form-label w-100">Video 1</label>
                                                <?php echo $etiquetavideoPantalla1; ?>
                                                <button type='button' class='btn btn-primary btn-vista_videoP_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa_video'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_video' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_video'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col">

                                        <div class="form-group">
                                            <div>
                                                <label class="col-form-label w-100">Video 2</label>
                                                <?php echo $etiquetavideoPantalla2; ?>
                                                <button type='button' class='btn btn-primary btn-vista_videoP_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa_video2'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_video_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_video2'>
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
<!--------------------ipad-->

<div class="modal fade modal_vista_Ipad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagen para el Ipad </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_Ipad"></div>
                        <form id="formulario_envio_Ipad" enctype="multipart/form-data">

                            <div class="form-group">

                                <label class="col-form-label w-100">Cambiar o subir archivo</label>
                                <?php echo $etiquetaimgIpad; ?>
                                <button type='button' class='btn btn-primary btn_vista_ipad' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                    <i class='fa fa-eye' aria-='true'></i>
                                </button>
                                <button type='button' class='btn btn-danger btn_borrar_ipad' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                    <i class='fa fa-trash-o' aria-='true'></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php

$query = "SELECT name_stand from stand_evento where id_stand = '$id_stand_padre';";

$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {

    //$array['data'][] = array_map("utf8_encode", $data);
    $arrayName["data"][] = $data;
}

$name_stand = $arrayName["data"][0]["name_stand"];

?>
<!--Tabla publicidad-->

<div class="main_container">

    <div class="text-center">
        <h2>Contenido del <b>Stand Full Access : </b> <?php echo $name_stand; ?></h2>
    </div>
    <svi class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5 text-left">
                <button type="button" id="btn-evento" class="btn btn-outline-primary btn-sm boton-regreso-evento">Eventos</button> /
                <button type="button" id="btn-espacio" class="btn btn-outline-primary btn-sm boton-regreso-espacios">Espacios</button> /
                <button type="button" id="btn-stand" class="btn btn-outline-primary btn-sm boton-regreso-stand">Stands</button> /
                <button type="button" id="btn-evento-user-3" class="btn btn-outline-primary btn-sm regresar-evento-user-3">Eventos</button>
                <button type="button" id="btn-stand-user-3" class="btn btn-outline-primary btn-sm regresar-stand-user-3">Stands</button>
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
$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'logo%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_logos = decidir_boton($n_archivos_subidos, 4);

$array = null;


$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'banner1%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_banner1 = decidir_boton($n_archivos_subidos, 2);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'banner2%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_banner2 = decidir_boton($n_archivos_subidos, 2);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'video%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_video = decidir_boton($n_archivos_subidos, 2);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'imgIpad%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_ipad = decidir_boton($n_archivos_subidos, 1);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'pdf%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_pdf = decidir_boton($n_archivos_subidos, 3);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'folleto%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_folletos = decidir_boton($n_archivos_subidos, 3);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'portada%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_portada = decidir_boton($n_archivos_subidos, 2);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'imgGaleria%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_galeria = decidir_boton($n_archivos_subidos, 12);

$array = null;


mysqli_free_result($res);
mysqli_close($con);
?>

<div class="card" style="padding: 18px;">
    <div class=" col-12 table-responsive">
        <table class="table table-striped table-borderless text-center" id="users_table" style="width:100%">
            <thead>
                <tr class="t-header">
                    <th scope="col">Tipo de Contenido</th>
                    <th scope="col">Dimensiones máximas</th>
                    <th scope="col">Formato</th>
                    <th scope="col">Subir<br>Archivo</th>
                    <th scope="col">Vista<br>Previa</th>
                </tr>
                <tr>
                    <td>Logo (4 Unidades)</td>
                    <td>1980x900px C/U</td>
                    <td>
                        <div class="<?php echo $boton_logos ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>


                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen_logo'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_imagen_logo'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>
                <tr>
                    <td>Banner 1 (2 Unidades)</td>
                    <td>1700x2000px C/U</td>
                    <td>
                        <div class="<?php echo $boton_banner1 ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>



                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen_banner1'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_imagen_banner1'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>
                <tr>
                    <td>Banner 2 (2 Unidades)</td>
                    <td>1700x2000px C/U</td>
                    <td>
                        <div class="<?php echo $boton_banner2 ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>



                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen_banner2'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_imagen_banner2'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>
                <tr>
                    <td>Video en Pantalla ( 2 unidades )</td>
                    <td>1920x1080px</td>
                    <td>
                        <div class="<?php echo $boton_video ?>">
                            .MP4
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_video'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_video'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>

                <tr>
                    <td>Imagen Ipad</td>
                    <td>1390x1854px</td>
                    <td>
                        <div class="<?php echo $boton_ipad ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_imgIp' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_Ipad'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_imgIp' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_Ipad'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>
                <tr>
                    <td>PDF descargable (3 unidades)</td>
                    <td>Max 30 MB</td>
                    <td>
                        <div class="<?php echo $boton_pdf ?>">
                            .PDF
                        </div>



                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_folleto' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_pdf'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary ' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_pdf'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>
                <tr>
                    <td>Caratula PDF (3 unidades)</td>
                    <td>1400x920px</td>
                    <td>
                        <div class="<?php echo $boton_folletos ?>">
                            .JPG .PNG
                        </div>



                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_docv' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_folleto'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary ' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_folleto'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>

                <tr>
                    <td>Portada Galería (2 caras)</td>
                    <td>1500x1800px C/U</td>
                    <td>
                        <div class="<?php echo $boton_portada ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>


                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_portg' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen_portada'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_portg' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_imagen_portada'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>
                <tr>
                    <td>Imagenes Galería (12 Unidades)</td>
                    <td>1920x1080px C/U</td>
                    <td>
                        <div class="<?php echo $boton_galeria ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_imgG' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen_galeria'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_imgG' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_imagen_galeria'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>

            </thead>
        </table>
    </div>
</div>
</div>





<!--VISTA PREVIA PDF1-->
<div class="modal fade modal_vista_previa_pdf1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title ">Vista previa del PDF 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php

                if (file_exists($direccion_guardado . 'pdf_1.pdf')) {
                ?>
                    <iframe src="<?php echo $direccion_guardado . 'pdf_1.pdf' ?>" id="folleto_iframe" width="100%" height="680px"></iframe>


                <?php

                } else {
                ?>
                    <iframe src="../imagenes_diseño/no_pdf.pdf" id="folleto_iframe" width="100%" height="680px"></iframe>


                <?php
                }

                ?>

            </div>
        </div>
    </div>
</div>

<!--VISTA PREVIA PDF1-->
<div class="modal fade modal_vista_previa_pdf2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title ">Vista previa del PDF 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php

                if (file_exists($direccion_guardado . 'pdf_2.pdf')) {
                ?>
                    <iframe src="<?php echo $direccion_guardado . 'pdf_2.pdf' ?>" id="folleto_iframe" width="100%" height="680px"></iframe>


                <?php

                } else {
                ?>
                    <iframe src="../imagenes_diseño/no_pdf.pdf" id="folleto_iframe" width="100%" height="680px"></iframe>


                <?php
                }

                ?>

            </div>
        </div>
    </div>
</div>

<!--VISTA PREVIA PDF1-->
<div class="modal fade modal_vista_previa_pdf3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title ">Vista previa del PDF 3</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php

                if (file_exists($direccion_guardado . 'pdf_3.pdf')) {
                ?>
                    <iframe src="<?php echo $direccion_guardado . 'pdf_3.pdf' ?>" id="folleto_iframe" width="100%" height="680px"></iframe>


                <?php

                } else {
                ?>
                    <iframe src="../imagenes_diseño/no_pdf.pdf" id="folleto_iframe" width="100%" height="680px"></iframe>


                <?php
                }

                ?>

            </div>
        </div>
    </div>
</div>




<div class="modal borrar_pdf" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¿Está seguro que desea eliminar el PDF?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <form id="formulario_borrar_pdf">
                    <input hidden value="<?php echo $direccion_guardado; ?>" type="text" name="direccion_guardado">
                    <input hidden value="" type="text" name="nombre_archivo" id="nombre_archivo_pdf">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Borrar</button>

                    </div>
                </form>


            </div>
        </div>
    </div>
</div>




<!--VISTA PREVIA VIDEO-->
<div class="modal fade modal_vista_previa_video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title " id="titulo_texto_prev">Vista previa del vídeo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <video autoplay controls loop muted id="video_mostrada_real_vista1" src="../imagenes_diseño/video.mp4" width="640" height="480">
                </video>


            </div>
        </div>
    </div>
</div>


<!--borrar PREVIA VIDEO-->
<div class="modal fade" id="borrar_video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="titulo_texto_eli">¿Está seguro que desea eliminar el video?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <video autoplay controls loop muted id="video_mostrada_eli1" src="../imagenes_diseño/video.mp4" width="640" height="480">
                </video>

            </div>


            <form id="formulario_borrar_video">
                <input hidden value="<?php echo $direccion_guardado; ?>" type="text" name="direccion_guardado">
                <input hidden value="" type="text" name="nombre_archivo" id="nombre_video_borrar1">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Borrar imagen</button>

                </div>
            </form>


        </div>
    </div>
</div>





<!--VISTA PREVIA VIDEO-->
<div class="modal fade modal_vista_previa_video2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title " id="titulo_texto_prev">Vista previa del vídeo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <video autoplay controls loop muted id="video_mostrada_real_vista2" src="../imagenes_diseño/video.mp4" width="640" height="480">
                </video>


            </div>
        </div>
    </div>
</div>




<!--borrar PREVIA VIDEO-->
<div class="modal fade" id="borrar_video2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="titulo_texto_eli">¿Está seguro que desea eliminar el video?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <video autoplay controls loop muted id="video_mostrada_eli2" src="../imagenes_diseño/video.mp4" width="640" height="480">
                </video>

            </div>


            <form id="formulario_borrar_video2">
                <input hidden value="<?php echo $direccion_guardado; ?>" type="text" name="direccion_guardado">
                <input hidden value="" type="text" name="nombre_archivo" id="nombre_video_borrar2">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Borrar imagen</button>

                </div>
            </form>


        </div>
    </div>
</div>







<!--BORRAR Y EDITAR-->
<!--Modal para eliminar archivo-->
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
                <input hidden value="<?php echo $direccion_guardado; ?>" type="text" name="direccion_guardado">
                <input hidden value="" type="text" name="nombre_archivo" id="nombre_archivo_borrar">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Borrar imagen</button>

                </div>
            </form>


        </div>
    </div>
</div>


<!--VISTA PREVIA-->
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








<script src="../js/standEditarContenido_FA.js"></script>