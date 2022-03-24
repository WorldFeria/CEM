<link rel="stylesheet" href="../css/notyf/notyf.min.css"></link>
<link rel="stylesheet" href="../css/lead_styles.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/all_Users.js"></script>

<div class="main_container">

    <div data-aos="zoom-in-down">
        <h2 class="text-center">Todos los Usuarios</h2>
    </div>

    <div class="d-flex justify-content-center" data-aos="zoom-in">
        <button id="btn_reload_all_users" class="btn btn-success" style="margin: 2px;">
            Recargar
            <i class='fa fa-refresh align-middle'></i>
        </button>
    </div><br>

    <div class="card" style="padding: 18px;" data-aos="zoom-out-down">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless " id="users_table" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>              
                        <th scope="col">Cambiar<br>Contraseña</th>              
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>



<div class=" modal fade modalEditarUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content"> 

        <div class="modal-header" >

            <form id="formEditarUser" class="row g-3 needs-validation" novalidate>
                <h5 class="modal-title">Editar datos del usuario</h5>

                <input hidden type="text" readonly="" name="email" id="email">

                <div class="col-md-6">
                    <label for="nombreUser" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombreUser">
                </div>
                <div class="col-md-6">
                    <label for="apellidoUser" class="form-label">Apellido:</label>
                    <input type="text" name="apellido" id="apellidoUser">
                </div>

              <div class="col-6">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancelar

              </div>

              <div class="col-6">
                <button id="botonGuardarCambios" style="float: right;" class="btn btn-primary" type="submit">Guardar</button>
                </div>

            </form>            
        </div>
    </div>
  </div>
</div>



<div class=" modal fade modalEditarContraseña" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content"> 

        <div class="modal-header" >

            <form id="formEditarContraseña" class="row g-3">
                <h5 class="modal-title">Nueva contraseña del usuario</h5>

                <input hidden type="text" readonly="" name="email" id="emailContraseña">



                <div class=" col-8">
                    <label  >Nueva contraseña:</label>
                    <input placeholder="*********" minlength="3" type="text" class="form-control" id="inputNuevaContraseña" name="password" required>
                            
                </div>

            <div class="col-6">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancelar

            </div>
            <div class="col-6">
                <button id="botonGuardarCambios" style="float: right;" class="btn btn-primary" type="submit">Guardar</button>
            </div>

            </form>            
        </div>
    </div>
  </div>
</div>



<script>
    AOS.init();
</script>