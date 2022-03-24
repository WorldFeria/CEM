<?php


?>


<script src="../js/notyf/notyf.min.js"></script>

<link rel="stylesheet" href="../css/notyf/notyf.min.css">
</link>
<link rel="stylesheet" href="../css/lead_styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

<script src="../js/standsExh.js"></script>


<!--Tabla Stand-->

<div class="main_container">

    <!-- <div style="float: left;">
        <button type="button" class="btn btn-primary boton-regreso-evento">Eventos</button>
     
    </div>
    <br> -->
    <div style="text-align: center; ">
        <h2 style="margin: 20px">Stands</h2>
    </div>

    <div class="card" style="padding: 18px;">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless " id="tabla_stand_exh" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Comercial</th>
                        <!-- <th scope="col">Estatus</th> -->
                        <th scope="col">Tipo</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Email Expositor</th>
                        <th scope="col">Personalizar Stand</th>
                        <th scope="col">Administrar Contenidos</th>
                        <th scope="col">Administrar Asesores</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>


<!--Modal para editar stand-->

<div id="modal-edit-central" class="modal fade edit-stand-btn-central" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <!--<form action="../php/stands/editar_info_stand.php" method="POST" name=""  target="_blank">-->
                <form id="editar_info_stand_central">
                    <div class=" was-validated">

                        <div class="row align-items-start">


                            <div class="col-6">
                                <label for="validationServer01">Nombre del Stand</label>
                                <input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*[0-9]*" name="nombre_stand" type="text" minlength="1" class="form-control " id="validationServer01" placeholder="Escriba aquí! " value="" required>

                                <div class="invalid-feedback">
                                    Escriba un nombre valido
                                </div>
                            </div>
                            <div class="col-6">

                                <label for="exampleFormControlTextarea1">Descripción del Stand</label>
                                <input type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*[0-9]*" name="descripcion_stand" class="form-control" id="exampleFormControlTextarea1" placeholder="Escriba aquí! " required>

                            </div>


                            <div class="col-6">

                                <label for="tipo_piso">Selector de tipo de piso</label>
                                <select name="tipo_piso" id="tipo_piso_central" class="form-control custom-select" required>
                                    <option value="" selected>Click aquí !</option>
                                    <option value="madera"> Piso estilo madera </option>
                                    <option value="alfombra"> Piso estilo alfombra </option>
                                    <option value="laminado"> Piso estilo laminado </option>
                                </select>


                            </div>

                            <div class="col-6">
                                <label for="tipo_piso">Selector de color del stand</label><br>

                                <input type="color" value="#000000" name="color_stand" id="color_stand_central">
                                <span id="span_color_pared_central" style="font-size: 24px;">#ffffff</span>
                            </div>
                        </div>

                        <br>

                        <div>Vista previa</div>

                        <hr>

                        <div id="stand_preview_container" class="col-12" style="position: relative; min-height:450px">

                            <img id="stand_body_preview_central" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;" src="../assets/stands/central/Paredes/Paredes_Fondo.png" alt="">

                            <img id="stand_floor_preview_central" style="width: 100%; position: absolute; z-index: 6; top: 0px; left: 0px;" src="../assets/stands/central/Pisos/Piso_Central_Madera.png" alt="">

                            <img id="stand_objects_preview_central" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/central/Objetos/Objetos_Central.png" alt="">

                        </div>


                        <hr>

                        <!-- <div id="tstContainer" style="display: inline-block;background-color: #000;width: 50px; height: 50px;"> </div> -->

                        <br>

                        <div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancelar</button>
                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary" style="float: right;">Guardar cambios
                            </button>


                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>




<div id="modal-edit-corner" class="modal fade edit-stand-btn-corner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <!--<form action="../php/stands/editar_info_stand.php" method="POST" name=""  target="_blank">-->
                <form id="editar_info_stand_corner">
                    <div class=" was-validated">

                        <div class="row align-items-start">


                            <div class="col-6">
                                <label for="validationServer01">Nombre del Stand</label>
                                <input pattern="^[a-zA-Z0-9_ ]{1,}" name="nombre_stand" type="text" minlength="1" class="form-control " id="validationServer01" placeholder="Escriba aquí! " value="" required>

                                <div class="invalid-feedback">
                                    Escriba un nombre valido
                                </div>
                            </div>
                            <div class="col-6">

                                <label for="exampleFormControlTextarea1">Descripción del Stand</label>
                                <input type="text" pattern="^[a-zA-Z0-9_ ]{1,}" name="descripcion_stand" class="form-control" id="exampleFormControlTextarea1" required>

                            </div>


                            <div class="col-6">

                                <label for="tipo_piso">Selector de tipo de piso</label>
                                <select name="tipo_piso" id="tipo_piso_corner" class="form-control custom-select" required>
                                    <option value="" selected>Click aquí !</option>
                                    <option value="madera"> Piso estilo madera </option>
                                    <option value="alfombra"> Piso estilo alfombra </option>
                                    <option value="laminado"> Piso estilo laminado </option>
                                </select>


                            </div>

                            <div class="col-6">
                                <label for="tipo_piso">Selector de color del stand</label><br>

                                <input type="color" name="color_stand" id="color_stand_corner">
                                <span id="span_color_pared_corner" style="font-size: 24px;">#ffffff</span>
                            </div>
                        </div>

                        <br>

                        <div>Vista previa</div>

                        <hr>

                        <div id="" class="col-12" style="position: relative; min-height:450px">

                            <img id="stand_body_preview_corner" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;" src="../assets/stands/corner/Paredes/Paredes_Fondo.png" alt="">

                            <img id="stand_floor_preview_corner" style="width: 100%; position: absolute; z-index: 6; top: 0px; left: 0px;" src="../assets/stands/corner/Piso/Piso_CornerMz_Madera.png" alt="">

                            <img id="stand_objects_preview_corner" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/corner/Objetos/Objetos_CornerMz.png" alt="">

                        </div>


                        <hr>

                        <!-- <div id="tstContainer" style="display: inline-block;background-color: #000;width: 50px; height: 50px;"> </div> -->

                        <br>

                        <div>
                            <button type="button" class="btn  btn-danger" data-bs-dismiss="modal" >Cancelar</button>

                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary" style="float: right;">Guardar cambios
                            </button>


                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<div id="modal-edit-full" class="modal fade edit-stand-btn-full" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <!--<form action="../php/stands/editar_info_stand.php" method="POST" name=""  target="_blank">-->
                <form id="editar_info_stand_full">
                    <div class=" was-validated">

                        <div class="row align-items-start">


                            <div class="col-6">
                                <label for="validationServer01">Nombre del Stand Full Access</label>
                                <input pattern="^[a-zA-Z0-9_ ]{1,}" name="nombre_stand" type="text" minlength="1" class="form-control " id="validationServer01" placeholder="Escriba aquí! " value="" required>

                                <div class="invalid-feedback">
                                    Escriba un nombre valido
                                </div>
                            </div>
                            <div class="col-6">

                                <label for="exampleFormControlTextarea1">Descripción del Stand</label>
                                <input type="text" pattern="^[a-zA-Z0-9_ ]{1,}" name="descripcion_stand" class="form-control" id="exampleFormControlTextarea1" required>

                            </div>


                            <div class="col-6">

                                <label for="tipo_piso">Selector de tipo de piso</label>
                                <select name="tipo_piso" id="tipo_piso_full" class="form-control custom-select" required>
                                    <option value="" selected>Click aquí !</option>
                                    <option value="madera"> Piso estilo madera </option>
                                    <option value="alfombra"> Piso estilo alfombra </option>
                                    <option value="laminado"> Piso estilo laminado </option>
                                </select>


                            </div>

                            <div class="col-3">
                                <label for="tipo_piso">Color de pared</label><br>

                                <input type="color" value="#000000" name="color_stand" id="color_stand_full">
                                <span id="span_color_pared_full" style="font-size: 24px;">#ffffff</span>
                            </div>

                            <div class="col-3">
                                <label for="tipo_piso">Color de techo</label><br>

                                <input type="color" value="#000000" name="color_stand_roof" id="color_stand_roof_full">
                                <span id="span_color_techo" style="font-size: 24px;">#ffffff</span>
                            </div>
                        </div>

                        <br>

                        <div>Vista previa</div>

                        <hr>

                        <div id="stand_preview_container" class="col-12" style="position: relative; min-height:450px">

                            <img id="stand_body_preview_full" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_1/Paredes/Paredes_Fondo.png" alt="">
                            <!--<img id="stand_body_preview_full" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;  opacity: 0.5;" src="../assets/stands/fullaccess/Vista_1/Paredes/Paredes_FA_V1.png" alt=""> -->

                            <img id="stand_floor_preview_full" style="width: 100%; position: absolute; z-index: 6; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_1/Piso/Piso_FA_V1_Madera.png" alt="">

                            <img id="stand_objects_preview_full" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_1/Objetos/Objetos_FA_V1.png" alt="">

                            <img id="stand_roof_preview_full" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_1/Techo/Techo_Fondo.png" alt="">

                        </div>


                        <div id="" class="col-12" style="position: relative; min-height:450px">

                            <img id="stand_body_preview_full_2" style="width: 100%; position: absolute; z-index: 5; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_2/Paredes/Paredes_Fondo.png" alt="">

                            <img id="stand_floor_preview_full_2" style="width: 100%; position: absolute; z-index: 6; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_2/Piso/Piso_FA_V2_Madera.png" alt="">

                            <img id="stand_objects_preview_full_2" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_2/Objetos/Objetos_FA_V2.png" alt="">

                            <img id="stand_roof_preview_full_2" style="width: 100%; position: absolute; z-index: 7; top: 0px; left: 0px;" src="../assets/stands/fullaccess/Vista_2/Techo/Techo_Fondo.png" alt="">

                        </div>


                        <hr>

                        <!-- <div id="tstContainer" style="display: inline-block;background-color: #000;width: 50px; height: 50px;"> </div> -->

                        <br>

                        <div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancelar</button>

                            <button name="agregar_datos_btn" type="submit" class="btn btn-primary" style="float: right;">Guardar cambios
                            </button>


                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal para Asignar o agregar expositor-->

<div class="modal fade edit-adv-btn" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalAddAdv">
    <div class="modal-dialog ">
        <div class="modal-content" style="padding: 16px;">

            


                <!--<form action="../php/stands/cambiar_expositor.php" method="POST" name="" target="_blank">-->
                <form id="form_agregar_expositor">
                    <div class="">

                        <div>
                            <h4> Asesores de stand: <span id="lbl_stand_name"></span></h4>
                            <label for="inputState">Asesores asignados a este stand:</label>

                            <br>

                            <div class=" col-12 table-responsive">
                                <table class="table table-sm table-striped table-borderless table-hover" id="tabla_stand_asigned_adv" style="width:100%">
                                    <thead>
                                        <tr class="t-header">
                                            <!--<th scope="col">ID</th> -->
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Desvincular</th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <label for="inputState">Asignar nuevo asesor</label>

                            <select name="correo_asesor" id="select_stand_adv" class="form-control"  required>
                               
                            </select>


                            <div class="invalid-feedback">Elija un expositor por favor</div>

                        </div>

                        <br>

                        <div>

                            <button type="button" class="btn  btn-danger" data-bs-dismiss="modal">Cancelar</button>

                            <button name="agregar_datos_btn" type="submit" class="btn btn-success" style="float: right;">Guardar asesor</button>

                        </div>

                    </div>

                </form>
            
        </div>
    </div>
</div>