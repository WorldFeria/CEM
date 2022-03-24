<?php
$fecha_de_hoy = substr(date('c'), 0, 10);
?>

<script src="../js/notyf/notyf.min.js"></script>
<link rel="stylesheet" href="../css/notyf/notyf.min.css"></link>
<link rel="stylesheet" href="../css/lead_styles.css">
<script src="../js/eventAdmin.js"></script>

<script type="text/javascript">
    var funcion_limitados = function() {
        var value = document.getElementById("cantidad_registros").value;
        if (value == '0') {
            $("#label_n_registros").removeAttr("hidden");
            $("#n_registros").removeAttr("hidden");
            $("#n_registros").attr("required", "");
        } else {
            $("#label_n_registros").attr("hidden", "");
            $("#n_registros").attr("hidden", "");
            $("#n_registros").attr("value", "");
            $("#n_registros").removeAttr("required");
        }
    }
    var funcion_lobby = function() {
        var valor_lobby = document.getElementById("crear_loby").value;
        if (valor_lobby == '0') {
            $("#crear_loby").attr("value", "1");
        } else {
            $("#crear_loby").attr("value", "0");
        }
    }
    var funcion_landing = function() {
        var valor_landing = document.getElementById("landing_check").value;
        if (valor_landing == '0') {
            $("#landing_check").attr("value", "1");
        } else {
            $("#landing_check").attr("value", "0");
        }
    }
</script>

<!-- Agregar Evento -->
<div class=" modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="  modal-dialog modal-xl">
        <div class=" modal-content">
            <div class="modal-header">

                <form id="crear_nuevo_evento">
                    <div class=" was-validated">

                        <table id="table_formulario" width="1100" cellspacing="4" cellpadding="5">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>
                            <thead>
                                <h4> Agregar un Nuevo Evento</h4>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label for="nombre_evento">Nombre del Evento</label>
                                        <input required name="nombre_evento" type="text" minlength="3" class="form-control " id="nombre_evento" value="">
                                    </td>
                                    <td>
                                        <label for="clase_evento">Clase de evento</label>
                                        <select required name="clase_evento" id="clase_evento" class="form-control custom-select">
                                            <option value="" selected>Click aquí !</option>
                                            <option value="Virtual"> Virtual </option>
                                            <option value="Presencial"> Presencial </option>
                                            <option value="Hibrido"> Hibrido </option>

                                        </select>
                                    </td>
                                    <td>
                                        <label for="tipo_evento">Tipo de Evento</label>
                                        <select required name="tipo_evento" id="tipo_evento" class="form-control custom-select">
                                            <option value="" selected>Click aquí !</option>
                                            <option value="Festival"> Festival </option>
                                            <option value="Expo"> Expo </option>
                                            <option value="Feria"> Feria </option>
                                            <option value="Feria"> Webinar </option>
                                            <option value="Feria"> Conferencia </option>
                                        </select>
                                    </td>
                                    <td>
                                        <label for="link_evento">Link del Evento</label>
                                        <input type="link" pattern=".+\.com" name="link_evento" class="form-control " id="link_evento">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="link_evento">Link de Realidad Virtual</label>
                                        <input type="link" pattern=".+\.com" name="link_vr" class="form-control " id="link_evento">
                                    </td>
                                    <td>
                                        <label for="n_pabellones">Número de pabellones</label>
                                        <input required name="cantidad_pabellones" type="number" min="0" class="form-control" id="n_pabellones">
                                    </td>
                                    <td>
                                        <label for="n_auditorios">Número de Auditorios</label>
                                        <input required name="cantidad_auditorios" type="number" min="0" class="form-control" id="n_auditorios">
                                    </td>
                                    <td>
                                        <label for="cantidad_registros">Cantidad de Registros</label>
                                        <select required onchange="funcion_limitados()" name="cantidad_registros" id="cantidad_registros" class="form-control custom-select">
                                            <option value="" selected>Click aquí !</option>
                                            <option value="0"> Limitados </option>
                                            <option value="1"> Ilimitados </option>
                                        </select>
                                    </td>
                                    <td>
                                        <label hidden id="label_n_registros" for="n_registros">Número de Registros</label>
                                        <input hidden value="" name="n_registros" type="number" min="0" class="form-control" id="n_registros">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input onchange="funcion_lobby()" value="0" name="lobby" type="checkbox" id="crear_loby">
                                            <label class="custom-control-label" for="crear_loby">Lobby</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input onchange="funcion_landing()" value="0" name="landing_page" type="checkbox" id="landing_check">
                                            <label class="custom-control-label" for="landing_check">Landing Page</label>
                                        </div>
                                    </td>
                                    <td>
                                        <label for="exampleFormControlTextarea1">Descripción del Evento</label>
                                        <textarea minlength="0" maxlength="250" class="form-control " name="descripcion_evento" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Fecha de Inicio</label><br>
                                        <input class="form-control" required name="fecha_inicio" type="date" id="fecha_inicio" value="" min="<?php echo $fecha_de_hoy ?>">

                                    </td>
                                    <td>
                                        <label>Fecha de Cierre</label><br>
                                        <input class="form-control" required name="fecha_cierre" type="date" id="fecha_cierre" value="" min="<?php echo $fecha_de_hoy ?>">
                                    </td>
                                    <td>
                                        <label>Hora de Inicio</label><br>
                                        <input class="form-control" required onchange="funcion_hora()" name="hora_inicio" type="time" id="hora_inicio">

                                    </td>
                                    <td>
                                        <label>Hora de Cierre</label><br>
                                        <input class="form-control" required onchange="funcion_hora()" name="hora_ciere" type="time" id="hora_ciere">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar </button>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary boton-guardar-info" style="float: right;"> Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Editar Evento -->
<div class=" modal fade bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">

                <form id="editar_evento">
                    <div class=" was-validated">

                        <table width="450" cellspacing="4" cellpadding="5">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>
                            <thead>
                                <h4> Editar evento: </h4>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input hidden type="text" name="id_evento" id="nombre_evento_edit">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="descripcion_evento_id">Descripción del Evento</label>
                                        <textarea minlength="10" name="descripcion_evento" id="descripcion_evento_id" class="form-control" rows="5"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="tipo_evento_id">Tipo de Evento</label>
                                        <select name="tipo_evento" id="tipo_evento_id" class="form-control custom-select">
                                            <option value="" selected>Click aquí !</option>
                                            <option value="Festival"> Festival </option>
                                            <option value="Expo"> Expo </option>
                                            <option value="Feria"> Feria </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <label for="link_event_id">Link del Evento</label>
                                        <input type="link" pattern=".+\.com.*" name="link_evento" id="link_event_id" class="form-control" placeholder="Escriba aquí! " value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <label for="link_event_id">Link de Realidad Virtual</label>
                                        <input type="link" pattern=".+\.com.*" name="link_vr" id="link_vr_id" class="form-control" placeholder="Escriba aquí! " value="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div>
                            <button type="button" class="btn  btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary boton-guardar-info" style="float: right;">Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Cambio de Imagen -->
<div class="modal fade modal_cambiar_logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="card border-primary text-center shadow p-3 mb-4 rounded">
                    <div class="card-header bg-transparent border-primary text-primary">
                        <h5 id="titulo_texto">Subir Logo </h5>
                    </div>
                    <div>
                        <div id="respuesta_logo"></div>
                        <form id="form_cambiar_logo_id" enctype="multipart/form-data">
                            <div class="row">
                                <div>
                                    <div class="text-center">
                                        <input hidden value="" type="text" name="id_evento" id="id_evento_img">
                                        <input hidden value="" type="text" name="nombre_logo" id="nombre_logo">
                                        <input hidden value="" type="text" name="direccion_logo" id="direccion_logo">
                                        <td>
                                            <input hidden value="1900x2000" name="dimensiones_max_logo" type="text" class="form-control">
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
                                                <label class="col-form-label w-100">Cambiar o subir Logo</label>
                                                <input type="file" name="imagen_logo" id="imagen_logo" accept="image/png, .jpeg, .jpg">
                                                <div class="progress" style="height: 12px; margin:5px 0;">
                                                    <div id="img_uploadbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <small>La imagen debe tener un tamaño menor o igual a ------ px y debe ser del tipo .jpg, .jpeg o .png</small>
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

<div class="main_container">
    <div data-aos="zoom-in-down">
        <h2 class="text-center">Eventos</h2>
    </div>
    <div class="d-flex justify-content-center ">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
            Agregar evento <i class='fa fa-plus-circle align-middle'></i>
        </button>
    </div><br>

    <!-- Ajax Cards -->
    <div class='outer_div'></div>
    <!-- /Ajax Cards -->
</div>

<script>
    AOS.init();
</script>