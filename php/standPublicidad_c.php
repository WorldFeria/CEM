<?php

$opc = $_POST['param'];

switch ($opc) {
    
    case 'contenido_stand':
        getStandP();
        break;
   
}
function getStandP(){
        
    include("../config/config.php");


        $query = "SELECT codigo_stand , tipo_contenido ,peso_max,  dimensiones_max , formato from contenidos_stand  ; ";//WHERE codigo_stand = '$codigo'
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