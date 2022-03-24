<link rel="stylesheet" href="../css/lead_styles.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="../js/visitor.js"></script>

<div class="main_container">
    <div class="text-center" data-aos="zoom-in-down">
        <h2>Visitantes</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <button id="btn_reload_visitors" class="btn btn-success">
                    Recargar
                    <i class='fa fa-refresh'></i>
                </button>
            </div>
        </div>
    </div><br>

    <div class="card" style="padding: 18px;" data-aos="zoom-out-down">
        <div class="col-12 table-responsive">
            <table class="table table-striped table-borderless" id="visitors_table" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">País</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Escuela</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    AOS.init();
</script>