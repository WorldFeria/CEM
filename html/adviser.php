<link rel="stylesheet" href="../css/notyf/notyf.min.css"></link>
<link rel="stylesheet" href="../css/lead_styles.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/notyf/notyf.min.js"></script>

<div class="main_container">

    <div data-aos="zoom-in-down">
        <h2 class="text-center">Asesores</h2>
    </div>

    <div class="d-flex justify-content-center" data-aos="zoom-in">

        <button id="btn_modal_new_adviser" class="btn btn-primary" style="margin: 2px;" data-bs-toggle="modal" data-bs-target="#new_adv_modal">
            Crear Asesor <i class='fa fa-plus-circle align-middle'></i>
        </button>
        <button id="btn_reload_advisers" class="btn btn-success" style="margin: 2px;">
            Recargar
            <i class='fa fa-refresh align-middle'></i>
        </button>

        <script>
            if(idRol != 3){
            
              $('#btn_modal_new_adviser').hide();

            }else{
              
                
            }
        </script>
        
    </div>
    
    <br>

    <div class="card" style="padding: 18px;" data-aos="zoom-out-down">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless " id="advisers_Table" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Estatus de validación</th>
                        <!--<th scope="col">Country</th>-->
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="new_adv_modal" tabindex="-1" aria-labelledby="new_adv_modal" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Asesor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form id="form_new_adviser">

                        <div class="mb-3">
                            <label  class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="in_new_adv_firstname" name="firstname" placeholder="Nombre" pattern="^[a-zA-Z]{3,}" required>
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="in_new_adv_lastname" name="lastname" placeholder="Apellido" pattern="^[a-zA-Z]{3,}" required>
                            
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="in_new_adv_cellphone" name="cellphone" placeholder="5712345678" pattern="^[0-9]{10}" required>
                            
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Dirección email</label>
                            <input type="email"  class="form-control" id="in_new_adv_email" name="email" placeholder="example@example.com" required>
                            
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button submit" class="btn btn-primary">Crear Asesor</button>
                        </div>
                        
                    </form>


                </div>

            </div>
        </div>
    </div>

</div>

<script>
    AOS.init();
</script>

<script src="../js/adviser___JS.js"></script>
