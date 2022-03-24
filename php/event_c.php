
<?php

$opc = $_POST['param'];

switch ($opc) {
    
    case 'event':
        getEvent();
        break;

}
function getEvent(){
    
    include("../config/config.php");

    $query = "SELECT id_evento,loby,nombre_evento, tipo_evento, cantidad_pabellones, cantidad_auditorios, landing_page,fecha_inicio, fecha_cierre from evento;";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);


    mysqli_free_result($res);
    mysqli_close($con);

}





?>