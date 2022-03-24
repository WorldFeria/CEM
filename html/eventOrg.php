<script src="../js/notyf/notyf.min.js"></script>
<link rel="stylesheet" href="../css/notyf/notyf.min.css"></link>
<link rel="stylesheet" href="../css/lead_styles.css">
<script src="../js/eventOrg.js"></script>

<div class=" modal fade bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content"> 
        <div class="modal-header" >

            <form id="editar_evento">
              <div class=" was-validated">
                    <table  width = "450" cellspacing = "4" cellpadding = "5">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>
                        <thead >
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
                                    <textarea required minlength="10" name="descripcion_evento" id="descripcion_evento_id" class="form-control" rows="5" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="tipo_evento_id">Tipo de Evento</label>
                                    <select  name="tipo_evento" id="tipo_evento_id" class="form-control custom-select" required>
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
                                    <input required type="link" pattern=".+\.com.*" name="link_evento" id="link_event_id" class="form-control"  placeholder="Escriba aquí! " value="" >
                                </td>                            	
                            </tr>
                            <tr>
                                <td>
                                    <label for="link_event_id">Link de Realidad Virtual</label>
                                    <input required type="link" pattern=".+\.com.*" name="link_vr" id="link_vr_id" class="form-control" placeholder="Escriba aquí! " value="" >
                                </td>                            	
                            </tr>
                        </tbody>    
                    </table>
                    <br>
                    <div>
                        <button type="button" class="btn  btn-danger" data-bs-dismiss="modal" >Cancelar</button>
                        <button name="agregar_datos_btn"type="submit"class="btn btn-primary boton-guardar-info" style="float: right;">    Guardar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
  </div>
</div>

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

    <!-- Ajax Cards -->
    <div class='outer_div'></div>
    <!-- /Ajax Cards -->
</div>

<script>
    AOS.init();
</script>