<?php
include("../config/config.php");

$idUser = $_GET['idUser'];


$query = "SELECT count(*) as visita from interactions where kind_interaction in ('stand_visit_hotspot','stand_visit_map') and id_user4 = '$idUser';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$visita = $array["data"][0]["visita"];
$array = null;

$query = "SELECT count(*) as viewed_banner from interactions where kind_interaction = 'viewed_banner' and id_user4 = '$idUser';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$viewed_banner = $array["data"][0]["viewed_banner"];
$array = null;

$query = "SELECT count(*) as viewed_gal from interactions where kind_interaction = 'viewed_gal' and id_user4 = '$idUser';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$viewed_gal = $array["data"][0]["viewed_gal"];
$array = null;

$query = "SELECT count(*) as viewed_doc from interactions where kind_interaction = 'viewed_doc' and id_user4 = '$idUser';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$viewed_doc = $array["data"][0]["viewed_doc"];
$array = null;

$query = "SELECT count(*) as chat_created from interactions where kind_interaction = 'chat_created' and id_user4 = '$idUser';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$chat_created = $array["data"][0]["chat_created"];
$array = null;

$query = "SELECT count(*) as viewed_web from interactions where kind_interaction = 'viewed_web' and id_user4 = '$idUser';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$viewed_web = $array["data"][0]["viewed_web"];
$array = null;

$query = "SELECT count(*) as viewed_auditorio from interactions where kind_interaction = 'viewed_auditorio' and id_user4 = '$idUser';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$viewed_auditorio = $array["data"][0]["viewed_auditorio"];
$array = null;

$query = "SELECT count(*) as viewed_tarima from interactions where kind_interaction = 'viewed_tarima' and id_user4 = '$idUser';";
$res = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($res)) {
    $array["data"][] = $data;
}
$viewed_tarima = $array["data"][0]["viewed_tarima"];
$array = null;






?>


<link rel="stylesheet" href="../css/lead_styles.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/notyf/notyf.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="../js/notyf/notyf.min.js"></script>

<div class="main_container">

    <div class="card" style="padding: 18px;" data-aos="zoom-out-down">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless" id="userPuntaje" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">Visita a<br>Stands</th>
                        <th scope="col">Banners</th>
                        <th scope="col">Galería</th>
                        <th scope="col">Descarga</th>
                        <th scope="col">Chat</th>
                        <th scope="col">Visita<br>Web</th>
                        <th scope="col">Conferencias</th>
                        <th scope="col">Presentación<br>tarima</th>
                    </tr>
                    <tr>
                        <td><?php echo $visita ?></td>
                        <td><?php echo $viewed_banner ?></td>
                        <td><?php echo $viewed_gal ?></td>
                        <td><?php echo $viewed_doc ?></td>
                        <td><?php echo $chat_created ?></td>
                        <td><?php echo $viewed_web ?></td>
                        <td><?php echo $viewed_auditorio ?></td>
                        <td><?php echo $viewed_tarima ?></td>
                    </tr>


                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    AOS.init();
</script>