<?php
//error_reporting(0);
include "../config/config.php";

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


?>



<script src="../js/notyf/notyf.min.js"></script>

<link rel="stylesheet" href="../css/notyf/notyf.min.css">
</link>
<link rel="stylesheet" href="../css/lead_styles.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">


<div class="obtener_id_evento" id="<?php echo $id_evento ?>"></div>
<div class="obtener_id_pabellon" id="<?php echo $id_pabellon ?>"></div>

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


<div class="modal fade modal_agregar_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagen: </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_general"></div>
                        <form id="formulario_general" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden id="dimensiones_max" name="dimensiones_max" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden id="formato" name="formato" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden id="nombre_archivo" name="nombre_archivo" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?>" name="codigo_del_stand" type="text" class="form-control">
                                        </td>


                                        <img hidden class="img-fluid" id="imagen_mostrada_real" src="" onerror="this.src='../imagenes_diseño/no_image.png';" />



                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">



                                <div>
                                    <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir archivo</label>
                                    <input type="file" name="fileimg_general" id="fileimg_general" accept="image/png, .jpeg, .jpg">
                                    <div class="progress" style="height: 12px; margin:5px 0;">
                                        <div id="img_uploadbar_general" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <small id="texto_abajo">La imagen debe tener un tamaño menor a 4MB y debe ser del tipo .jpg, .jpeg o .png</small>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




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
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden value="1920x1080" name="dimensiones_max_video" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="video/mp4" name="formato_video" type="text" class="form-control">
                                        </td>
                                        <td>

                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="videoPantalla" name="nombre_archivo_video" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?>" name="codigo_del_stand" type="text" class="form-control">
                                        </td>





                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div>
                                    <label class="col-form-label w-100">Cambiar o subir archivo</label>
                                    <input type="file" name="videoPantallaFile" id="videoPantallaFile" accept="video/mp4">
                                    <div class="progress" style="height: 12px; margin:5px 0;">
                                        <div id="img_uploadbar_videoP" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <small>El video debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .mp4</small>
                            </div>
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
                                            <input hidden value="folleto1" name="nombre_caratula1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="folleto2" name="nombre_caratula2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?>" name="codigo_del_stand" type="text" class="form-control">
                                        </td>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div>
                                    <label class="col-form-label w-100">Caratula 1</label>
                                    <input type="file" name="folleto_visual_1" id="folleto_visual_1" accept="image/png, .jpeg, .jpg">
                                    <div class="progress" style="height: 12px; margin:5px 0;">
                                        <div id="img_uploadbar_visual_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <small>El documento debe tener un tamaño menor o igual a los 1400x920px y ser del tipo jpg o png</small>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="col-form-label w-100">Caratula 2</label>
                                    <input type="file" name="folleto_visual_2" id="folleto_visual_2" accept="image/png, .jpeg, .jpg">
                                    <div class="progress" style="height: 12px; margin:5px 0;">
                                        <div id="img_uploadbar_visual_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <small>El documento debe tener un tamaño menor o igual a los 1400x920px y ser del tipo jpg o png</small>
                            </div>
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
                        <h5 id="titulo_texto">Subir PDF descargable (2 unidades) </h5>
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
                                            <input hidden value="<?php echo $codigo_del_stand; ?>" name="codigo_del_stand" type="text" class="form-control">
                                        </td>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div>
                                    <label class="col-form-label w-100">PDF 1</label>
                                    <input type="file" name="pdf_1" id="pdf_1" accept="application/pdf">
                                    <div class="progress" style="height: 12px; margin:5px 0;">
                                        <div id="pdf_uploadbar_visual_1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <small>El documento debe tener un tamaño maximo de 30 MB y ser del tipo PDF</small>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="col-form-label w-100">PDF 2</label>
                                    <input type="file" name="pdf_2" id="pdf_2" accept="application/pdf">
                                    <div class="progress" style="height: 12px; margin:5px 0;">
                                        <div id="pdf_uploadbar_visual_2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <small>El documento debe tener un tamaño maximo de 30 MB y ser del tipo PDF</small>
                            </div>
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

                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo PDF (1)</label>
                                            <button type='button' class='btn btn-primary btn_vista_pdf_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa_pdf1'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_pdf_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.borrar_pdf'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo PDF (2)</label>
                                            <button type='button' class='btn btn-primary btn_vista_pdf_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa_pdf2'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_pdf_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.borrar_pdf'>
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

                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo de la caratula (1)</label>
                                            <button type='button' class='btn btn-primary btn_vista_folleto_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_folleto_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                <i class='fa fa-trash-o' aria-='true'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                            <label class="col-form-label w-100">Ver o borar archivo de la caratula (2)</label>
                                            <button type='button' class='btn btn-primary btn_vista_folleto_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                <i class='fa fa-eye' aria-='true'></i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn_borrar_folleto_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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









<!--MODAL PARA 12 IMAGENES GALERÍA -->

<div class="modal fade modal_agregar_imagen_galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagen: </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_12_galeria"></div>
                        <form id="formulario_12_galeria" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">


                                        <td>
                                            <input hidden value="1920x1080" name="dimensiones_max_img" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="image/jpg.image/png.image/jpeg" name="formato_img" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="<?php echo $direccion_guardado; ?>" name="ubicacion_archivo_img" type="text" class="form-controlx">
                                        </td>
                                        <td>
                                            <input hidden value="imgGaleria1" name="nombre_archivoimg1" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="imgGaleria2" name="nombre_archivoimg2" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="imgGaleria3" name="nombre_archivoimg3" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="imgGaleria4" name="nombre_archivoimg4" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="imgGaleria5" name="nombre_archivoimg5" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="imgGaleria6" name="nombre_archivoimg6" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input hidden value="imgGaleria7" name="nombre_archivoimg7" type="text" class="form-control">
                                        </td>


                                        <td>
                                            <input hidden value="<?php echo $codigo_del_stand; ?> " name="codigo_del_stand" type="text" class="form-control">
                                        </td>


                                    </div>
                                </div>
                            </div>
                            <br>
                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 1 de la galería</label>
                                                <input id="imgGaleria1" type="file" name="imgGaleria1" accept="image/png, .jpeg, .jpg">
                                                <div class="progress">


                                                    <div id="img_uploadbarimgGaleria1" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td>

                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 2 de la galería</label>
                                                <input id="imgGaleria2" type="file" name="imgGaleria2" id="fileimg" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbarimgGaleria2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 3 de la galería</label>
                                                <input id="imgGaleria3" type="file" name="imgGaleria3" id="fileimg" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbarimgGaleria3" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td>

                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 4 de la galería</label>
                                                <input id="imgGaleria4" type="file" name="imgGaleria4" id="fileimg" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbarimgGaleria4" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 5 de la galería</label>
                                                <input id="imgGaleria5" type="file" name="imgGaleria5" id="fileimg" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbarimgGaleria5" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                    <td>

                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 6 de la galería</label>
                                                <input id="imgGaleria6" type="file" name="imgGaleria6" id="fileimg" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbarimgGaleria6" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 7 de la galería</label>
                                                <input id="imgGaleria7" type="file" name="imgGaleria7" id="fileimg" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 6px; margin:5px 0;">
                                                    <div id="img_uploadbarimgGaleria7" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small id="texto_abajo">La imagen debe tener un tamaño menor o igual 1920x1080 pixeles y debe ser del tipo .jpg, .jpeg o .png</small>
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










<div class="modal fade modal_edit_imagen_galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card  text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent  text-primary">
                        <h5 id="titulo_texto">Subir imagen: </h5>
                    </div>
                    <div>
                        <div id="respuesta_img_12_galeria"></div>
                        <form id="formulario_12_galeria" enctype="multipart/form-data">

                            <table cellspacing="4" cellpadding="5">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 1 de la galería</label>
                                                <button type='button' class='btn btn-primary btn-gimg_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gimg_1' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td>

                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 2 de la galería</label>
                                                <button type='button' class='btn btn-primary btn-gimg_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gimg_2' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 3 de la galería</label>
                                                <button type='button' class='btn btn-primary btn-gimg_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gimg_3' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td>

                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 4 de la galería</label>
                                                <button type='button' class='btn btn-primary btn-gimg_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gimg_4' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 5 de la galería</label>
                                                <button type='button' class='btn btn-primary btn-gimg_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gimg_5' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                    <td>

                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 6 de la galería</label>
                                                <button type='button' class='btn btn-primary btn-gimg_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gimg_6' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
                                                    <i class='fa fa-trash-o' aria-='true'></i>
                                                </button>
                                            </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div>
                                                <label id="cambiar_subir" class="col-form-label w-100">Cambiar o subir imagen 7 de la galería</label>
                                                <button type='button' class='btn btn-primary btn-gimg_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                                    <i class='fa fa-eye' aria-='true'></i>
                                                </button>
                                                <button type='button' class='btn btn-danger btn-borrar_gimg_7' style='margin:2px' data-bs-toggle='modal' data-bs-target='#borrar_imagen'>
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
        <h2>Contenido del <b>Stand Corner : </b> <?php echo $name_stand; ?></h2>
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
$boton_logos = decidir_boton($n_archivos_subidos, 1);

$array = null;


$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'banner1%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_banner1 = decidir_boton($n_archivos_subidos, 1);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'banner2%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_banner2 = decidir_boton($n_archivos_subidos, 1);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'video%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_video = decidir_boton($n_archivos_subidos, 1);

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
$boton_pdf = decidir_boton($n_archivos_subidos, 2);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'folleto%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_folletos = decidir_boton($n_archivos_subidos, 2);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'portada%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_portada = decidir_boton($n_archivos_subidos, 1);

$array = null;

$query = "SELECT sum(subido) as n_archivos_subidos from contenidos_stand where codigo_stand = '$codigo_del_stand' and nombre_archivo like 'imgGaleria%';";
$res = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$n_archivos_subidos = $array["data"][0]["n_archivos_subidos"];
$boton_galeria = decidir_boton($n_archivos_subidos, 7);

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
                    <th scope="col">Eliminar<br>Archivo</th>
                </tr>
                <tr>
                    <td>Logo</td>
                    <td>1980x900</td>
                    <td>
                        <div class="<?php echo $boton_logos ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-danger btn-borrar_logo' style='margin:2px' data-bs-toggle='modal' data-bs-target="#borrar_imagen">
                                <i class='fa fa-trash-o' aria-='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Banner 1</td>
                    <td>1900x2000</td>
                    <td>
                        <div class="<?php echo $boton_banner1 ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-danger btn-borrar_banner1' style='margin:2px' data-bs-toggle='modal' data-bs-target="#borrar_imagen">
                                <i class='fa fa-trash-o' aria-='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Banner 2</td>
                    <td>950x2000</td>
                    <td>
                        <div class="<?php echo $boton_banner2 ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-danger btn-borrar_banner2' style='margin:2px' data-bs-toggle='modal' data-bs-target="#borrar_imagen">
                                <i class='fa fa-trash-o' aria-='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Video en Pantalla</td>
                    <td>1920x1080</td>
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
                            <button type='button' class='btn btn-primary btn-vista_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa_video'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-danger btn-borrar_videoP' style='margin:2px' data-bs-toggle='modal' data-bs-target="#borrar_video">
                                <i class='fa fa-trash-o' aria-='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Imagen Ipad</td>
                    <td>1390x1854</td>
                    <td>
                        <div class="<?php echo $boton_ipad ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_imgIp' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_imgIp' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-danger btn-borrar_imgIp' style='margin:2px' data-bs-toggle='modal' data-bs-target="#borrar_imagen">
                                <i class='fa fa-trash-o' aria-='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>PDF descargable (2 unidades)</td>
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
                                <i class='far fa-edit' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>
                <tr>
                    <td>Caratula PDF (2 unidades)</td>
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
                                <i class='far fa-edit' aria-='true'></i>
                            </button>
                        </div>


                    </td>

                </tr>

                <tr>
                    <td>Portada Galería</td>
                    <td>1700x1800</td>
                    <td>
                        <div class="<?php echo $boton_portada ?>">
                            .JPG .PNG
                        </div>
                    </td>
                    <td>

                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn_subir_portg' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_agregar_imagen'>
                                <i class='fa fa-cloud-upload' aria-='true'></i>
                            </button>
                        </div>

                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-primary btn-vista_portg' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_vista_previa'>
                                <i class='fa fa-eye' aria-='true'></i>
                            </button>
                        </div>


                    </td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <button type='button' class='btn btn-danger btn-borrar_portg' style='margin:2px' data-bs-toggle='modal' data-bs-target="#borrar_imagen">
                                <i class='fa fa-trash-o' aria-='true'></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Imagenes Galería (7 Unidades)</td>
                    <td>1920x1080 C/U</td>
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
                            <button type='button' class='btn btn-primary btn-vista_imgG' style='margin:2px' data-bs-toggle='modal' data-bs-target='.modal_edit_imagen_galeria'>
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




<!--VISTA PREVIA PDF1-->
<div class="modal fade modal_vista_previa_pdf1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title " id="titulo_texto_prev">Vista previa del PDF 1</h5>
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

                <h5 class="modal-title " id="titulo_texto_prev">Vista previa del PDF 2</h5>
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

                <h5 class="modal-title " id="titulo_texto_prev">Vista previa del PDF 3</h5>
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


<!--Modal para eliminar archivo-->
<div class="modal fade" id="borrar_imagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="titulo_texto_eli">¿Está seguro que desea eliminar el archivo?</h5>
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
                    <button type="submit" class="btn btn-primary">Borrar archivo</button>

                </div>
            </form>


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

                <video autoplay controls loop muted id="video_mostrada_real_vista" src="../imagenes_diseño/video.mp4" width="640" height="480">
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

                <video autoplay controls loop muted id="video_mostrada_eli" src="../imagenes_diseño/video.mp4" width="640" height="480">
                </video>

            </div>


            <form id="formulario_borrar_video">
                <input hidden value="<?php echo $direccion_guardado; ?>" type="text" name="direccion_guardado">
                <input hidden value="videoPantalla.mp4" type="text" name="nombre_archivo" id="nombre_video_borrar">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Borrar Video</button>

                </div>
            </form>


        </div>
    </div>


    <script src="../js/standEditarContenido_CM.js"></script>