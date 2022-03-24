
<?php

$opc = $_REQUEST['param'];

switch ($opc) {

    case 'stand':
        getStand();
        break;
    case 'editarDatosStand':
        editStandInfo();
        break;
    case 'editarExpositor':
        cambioExpositor();
        break;
    case 'cambiar_nom_ap':
        cambiarStatusReser();
        break;
    case 'cambiar_status_Sin':
        cambiarStatusSin();
        break;
    case 'get_stand_data':
        getStandDataById();
        break;

    case 'set_stand_data':
        setStandDataById();
        break;

    case 'stands_exh':
        getStandByExhMail();
        break;

    case 'add_adv':
        addStandAdv();
        break;

    case 'remove_adv':
        removeStandAdv();
        break;
}


function removeStandAdv(){

    include("../config/config.php");

    $adv_email = $_REQUEST['email'];
    $id_stand = $_REQUEST['id_stand'];

    $query = "UPDATE `adviser` SET `id_stand2` = '-1' WHERE (`email2` = '$adv_email') AND `id_stand2` = '$id_stand' ;";

    if (mysqli_query($con, $query)) {

        echo 'success';
    } else {
        echo 'error';
    }

    mysqli_close($con);

}

function addStandAdv()
{

    include("../config/config.php");

    $adv_email = $_REQUEST['email'];
    $id_stand = $_REQUEST['id_stand'];

    $query = "UPDATE `adviser` SET `id_stand2` = '$id_stand' WHERE (`email2` = '$adv_email') ;";

    //$query = "SELECT * from stand_evento WHERE id_stand = $idStand;"; //W

    //$res = mysqli_query($con, $query);

    if (mysqli_query($con, $query)) {

        echo 'success';
    } else {
        echo 'error';
    }

    //mysqli_free_result($res);
    mysqli_close($con);
}


function getStandByExhMail()
{

    $emailExh = $_REQUEST['emailExh'];

    include("../config/config.php");


    $query = "SELECT * from stand_evento WHERE correo_expositor = '$emailExh' AND status = 'Confirmado';"; //W
    //$query = "SELECT * from stand_evento ;"; //W

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }
    //echo $array;

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}

function getStand()
{
    $idFatherPabe = $_REQUEST['id_current_pabe'];


    include("../config/config.php");


    $query = "SELECT * from stand_evento 
    WHERE id_pabellon = $idFatherPabe
    ;"; //W

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}


function getStandDataById()
{
    //$idFatherPabe = $_REQUEST['id_current_pabe'];
    $idStand = $_REQUEST['id_stand'];


    include("../config/config.php");


    $query = "SELECT * from stand_evento WHERE id_stand = $idStand;"; //W

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}

function setStandDataById()
{
    //$idFatherPabe = $_REQUEST['id_current_pabe'];
    $idStand = $_REQUEST['id_stand'];

    $name = $_REQUEST['nombre_stand'];
    $floor = $_REQUEST['tipo_piso'];
    $body = $_REQUEST['color_stand'];
    $roof = $_REQUEST['color_stand_roof'];
    $description = $_REQUEST['descripcion_stand'];

    include("../config/config.php");

    $query = "UPDATE `stand_evento` 
    SET `name_stand` = '$name', `descripcion` = '$description', `kind_floor` = '$floor', `wall_color` = '$body', `roof_color` = '$roof' 
    WHERE (`id_stand` = $idStand);";

    //$query = "SELECT * from stand_evento WHERE id_stand = $idStand;"; //W

    //$res = mysqli_query($con, $query);

    if (mysqli_query($con, $query)) {

        echo 'success';
    } else {
        echo 'error';
    }

    //mysqli_free_result($res);
    mysqli_close($con);
}

function editStandInfo()
{

    include("../config/config.php");


    echo ("Entrando");

    $id_stand = $_REQUEST["id_stand"];

    $nombre_stand = $_REQUEST["nombre_stand"];
    $descripcion_stand = $_REQUEST["descripcion_stand"];


    $insertarDatos = "UPDATE stand_evento set name_stand = '$nombre_stand', descripcion  =  '$descripcion_stand' where id_stand = '$id_stand';";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);



    if (!$ejecutarInsertar) {
        echo ("Error En la linea de sql");
    }

    mysqli_free_result($ejecutarInsertar);
    mysqli_close($con);
}
function cambioExpositor()
{

    include("../config/config.php");


    $id_stand = $_REQUEST["id_stand"];
    $correo_expositor = $_REQUEST["correo_expositor"];
    $correoVendedor = $_REQUEST["correoVendedor"];

    if ($correo_expositor == "00") {

        $insertarDatos = "UPDATE stand_evento set correo_expositor = null, status = 'Sin Asignar',nombre_expo = null, apellido_expo = null where id_stand = '$id_stand';";
    } else {



        $query = "SELECT first_name,last_name from user where id_rol2 = 3 and email = '$correo_expositor';"; //W

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }
        

        $nombre = $array["data"][0]["first_name"];//PUEDE QUE AQUÍ HAYA UN ERROR, AÚN NO SE HA REVISAO PUES NO HAY EXPOSITORES 
        $apellido = $array["data"][0]["last_name"];

        $insertarDatos = "UPDATE stand_evento set correo_expositor = '$correo_expositor', status = 'En espera',nombre_expo = '$nombre', apellido_expo = '$apellido' where id_stand = '$id_stand';";

    }
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);





    if ($correoVendedor == "00") {

        $insertarDatos = "UPDATE stand_evento set correo_vendedor = null where id_stand = '$id_stand';";
    } else {


        $insertarDatos = "UPDATE stand_evento set correo_vendedor = '$correoVendedor'where id_stand = '$id_stand';";

    }
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);







    if (!$ejecutarInsertar) {
        echo ("Error En la linea de sql");
    }

    mysqli_free_result($ejecutarInsertar);
    mysqli_close($con);
}



function cambiarStatusReser()
{//aquí van los cambios
    include("../config/config.php");
    $id_stand = $_REQUEST["id_stand"];

    $nombre = $_REQUEST["primer_nombre"];
    $apellido = $_REQUEST["apellido_paterno"];


    $insertarDatos = "UPDATE stand_evento set status = 'En reserva',nombre_expo = '$nombre' , apellido_expo = '$apellido' where id_stand = '$id_stand';";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);

    if (!$ejecutarInsertar) {
        echo ("Error En la linea de sql");
    }

    mysqli_free_result($ejecutarInsertar);
    mysqli_close($con);
}

function cambiarStatusSin()
{
    include("../config/config.php");
    $id_stand = $_REQUEST["id_a_cambiar"];

    $insertarDatos = "UPDATE stand_evento set status = 'Sin Asignar',nombre_expo = null , apellido_expo = null where id_stand = '$id_stand';";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);

    if (!$ejecutarInsertar) {
        echo ("Error En la linea de sql");
    }

    mysqli_free_result($ejecutarInsertar);
    mysqli_close($con);
}

?>