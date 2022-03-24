<?php
session_start();
$iduser = $_SESSION['user-id'];
$email = $_SESSION['user-email'];
$cellphone = $_SESSION['user-cellphone'];
$name = $_SESSION['user-name'];
$lastname = $_SESSION['user-lastname'];
$profilepic = $_SESSION['user-profilepic'];
?>

<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<script src="../js/notyf/notyf.min.js"></script>
<script src="eventEdit.js"></script>

<div class="main_container">

    <div data-aos="zoom-in-down">
        <h2 class="text-center">Configuración</h2>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4" data-aos="fade-down-right">

        <div class="col-md-7 col-sm-7 col-xs-7">
            <div class="card border-primary text-center shadow p-3 mb-4 cards">
                <div class="card-header bg-transparent text-primary">
                    <h5>Información</h5>
                </div>
                <div class="card-body">
                    <div id="respuesta_info"></div>
                    <form id="form_update_information">

                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-5 form-group">
                                <label for="mod_names" class="col-form-label">Nombre(s)</label>
                                <i class="fas fa-signature"></i>
                                <input name="mod_names" id="mod_names" type="text" class="form-control" value="<?php echo $name; ?>">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 form-group">
                                <label for="mod_lastnames" class="col-form-label">Apellidos</label>
                                <i class="fas fa-signature"></i>
                                <input name="mod_lastnames" id="mod_lastnames" type="text" class="form-control" value="<?php echo $lastname; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                <label for="email" class="col-form-label">Correo</label>
                                <i class="fas fa-at"></i>
                                <input name="email" id="email" type="email" class="form-control" value="<?php echo $email; ?>" readonly>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                                <label for="phonenmbr" class="col-form-label">Numero Teléfonico</label>
                                <i class="fas fa-phone"></i>
                                <input name="phonenmbr" id="phonenmbr" type="number" min="0" pattern="^[0-9]+" class="form-control" value="<?php echo $cellphone; ?>" readonly>
                                <i>
                                    <p id="confighelp_message"></p>
                                </i>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 text-center"><br>
                            <button type="submit" name="updinfo" class="btn btn-primary">
                                <i class="fas fa-cloud-upload-alt"></i>
                                Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="card border-primary text-center shadow p-3 mb-4 cards">
                <div class="card-header bg-transparent text-primary">
                    <h5>Imagen de Perfil</h5>
                </div>
                <div class="card-body">
                    <div id="respuesta_img"></div>
                    <form id="file_img" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12" id="profile_picture">
                                <div class="text-center">
                                    <?php if ($profilepic == 'organizer.jpg') { ?>
                                        <img src="../assets/img/profiles/default/<?php echo $profilepic; ?>" class=" rounded-circle img-responsive mt-2" width="228" height="228" alt="Imagen de perfil" title="Imagen de perfil">
                                    <?php } else { ?>
                                        <img src="../assets/img/profiles/users/<?php echo $iduser; ?>/<?php echo $profilepic; ?>" class=" rounded-circle img-responsive mt-2" width="228" height="228" alt="Imagen de perfil" title="Imagen de perfil">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label class="col-form-label w-100">Cambiar imagen de perfil</label>
                                <input type="file" name="fileimg" id="fileimg" accept="image/png, image/jpeg">
                                <div class="progress" style="height: 12px; margin:5px 0;">
                                    <div id="img_uploadbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <small>La imagen debe tener un tamaño menor a 4MB y tipo .jpg, .jpeg o .png</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
            <div class="card border-primary text-center shadow p-3 mb-4 cards">
                <div class="card-header bg-transparent text-primary">
                    <h5>Contraseña</h5>
                </div>
                <div class="card-body">
                    <div id="respuesta_pswrd"></div>
                    <form id="upd_password">
                        <div class="form-group">
                            <label for="inputPasswordNew" class="col-form-label">Nueva Contraseña</label>
                            <i class="fas fa-check"></i>
                            <input type="password" class="form-control" name="pswrdNew" id="pswrdNew" placeholder="*********">
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordNew2" class="col-form-label">Confirmar Nueva Contraseña</label>
                            <i class="fas fa-check-double"></i>
                            <input type="password" class="form-control" name="pswrdNew2" id="pswrdNew2" placeholder="*********">
                        </div><br>

                        <div class="form-group text-center">
                            <input type="radio" class="btn-check" name="options-outlined" id="primary-outlined" onclick="showPasswords()" autocomplete="off">
                            <label class="btn btn-outline-primary" for="primary-outlined">Mostrar Contraseñas</label>
                        </div><br>

                        <small class="text-muted">
                            1° La contraseña debe tener entre 8 y 20 caracteres, debe contener números, caracteres especiales, y no debe contener espacios o emojis.<br>
                            2° WORLD FERIAS <strong>no almacena o administra contraseñas de ningun tipo.</strong>
                        </small>

                        <div class="form-group text-center"><br>
                            <button type="submit" name="updpswrd" class="btn btn-primary">
                                <i class="fas fa-cloud-upload-alt"></i>
                                Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="../js/pwstrength-bootstrap/i18next.js"></script>
<script src="../js/pwstrength-bootstrap/pwstrength.js"></script>
<script src="../js/system/settings.js"></script>

<script>
    AOS.init();
</script>