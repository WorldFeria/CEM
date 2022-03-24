<?php


    $opc = $_POST['param'];

    switch ($opc) {

        case 'asesores':
            getMyAdvisers();
            break;

        break;

    }



    function getMyAdvisers(){
    
        include("../config/config.php");

        $idUser = $_POST['idUser'];
    
        $query = "SELECT nombre_conf,hora_inicio, hora_cierre, fecha_inicio,tipoConferencia, concat( auditorio.controlador,subido) as controlador  , ubicacionArchivo  from horarios_auditorio ,auditorio
        where horarios_auditorio.id_auditorio = auditorio.id_auditorio and id_expositor = '$idUser';";
    
    
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