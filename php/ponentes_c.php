
<?php

$opc = $_POST['param'];

switch ($opc) {
    
    case 'ponentes':
        getVisitors();
        break;
}

function getVisitors(){
    
    include("../config/config.php");

    $query = "SELECT * FROM smartdesk_vocafestival.user, smartdesk_vocafestival.rolUser where id_rol = id_rol2 and rol_name = 'exhibitor' 
        ORDER BY user.first_name DESC;";


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