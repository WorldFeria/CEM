<link rel="stylesheet" href="../css/notyf/notyf.min.css">
<link rel="stylesheet" href="../css/lead_styles.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/ponentes.js"></script>

<div class="main_container">

    <div data-aos="zoom-in-down">
        <h2 class="text-center">Expositores</h2>
    </div>

    <div class="d-flex justify-content-center" data-aos="zoom-in">
        <button id="btn_modal_new_exhibitor" class="btn btn-primary" style="margin: 2px;" data-bs-toggle="modal" data-bs-target="#new_exh_modal">
            Crear Expositor <i class='fa fa-plus-circle align-middle'></i>
        </button>
        <button id="btn_reload_exhibitors" class="btn btn-success" style="margin: 2px;">
            <i class='fa fa-refresh align-middle'></i>
        </button>
    </div><br>

    <div class="card" style="padding: 18px;" data-aos="zoom-out-down">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless " id="exhibitors_table" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">País</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Estatus de validación</th>
                        <!--<th scope="col">Country</th>-->
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="new_exh_modal" tabindex="-1" aria-labelledby="new_exh_modal" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo expositor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_new_exhibitor">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="in_new_exh_firstname" name="firstname" placeholder="Nombre" pattern="^[a-zA-Z]{3,}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="in_new_exh_lastname" name="lastname" placeholder="Apellido" pattern="^[a-zA-Z]{3,}" required>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label class="form-label">País</label>
                                <select class="form-select" name="country" id="in_new_exh_country">
                                    
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="in_new_exh_cellphone" name="cellphone" placeholder="5512345678" pattern="^[0-9]{10}" required>
                                <h6><span id="help_cellphone" class="help-block badge bg-light mt-2"></span></h6>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dirección email</label>
                            <input type="email" class="form-control" id="in_new_exh_email" name="email" placeholder="example@example.com" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button submit" class="btn btn-primary">Crear expositor</button>
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