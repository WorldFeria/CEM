<?php

$opc = $_POST['param'];

switch ($opc) {
    
    case 'contenido_pabellon':
        getStandP();
        break;        
}
    function getStandP(){

        //$idFatherPabe = $_POST['llave_id_pabellonx'];
        
        include("../config/config.php");


        $query = "SELECT id_padre , tipo_publicidad ,peso_max,  dimensiones_max , formato from publicidad_espacio ;";

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