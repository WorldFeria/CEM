
<?php

$opc = $_POST['param'];

switch ($opc) {
    
    case 'allUsers':
        getAllUsers();
        break;
    case 'borrarUser':
        borrarUser();
        break;
    case 'editarUser':
        editarUser();
        break;
    case 'cambiarConteraseña':
        cambiarContraseña();
        break;
    case 'asesores':
        getMyAdvisers();
        break;
    case 'crearAsesor':
        crearAsesor();
        break;
}

function crearAsesor(){
    
    include("../config/config.php");

    $uid = $_POST['uid'];
    $emailExh = $_POST['email_exh'];
    //$id_adv = 0;

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $cellphone = $_POST['cellphone'];
    $event  = 1;

    
    $query = "INSERT INTO user( id_rol2, email, cellphone, first_name, last_name) VALUES(4, '$email', '$cellphone', '$firstName', '$lastName');";
    $res = mysqli_query($con, $query);


   
    $query = "SELECT id_user from user where email = '$email';"; //otro con el id del adviser
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    $idAdviser = $array["data"][0]['id_user'];
    $array = null;


    $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$idAdviser',167);";
    $res = mysqli_query($con, $query);

    $query = "SELECT  codigo_stand,id_stand from stand_evento where correo_expositor = '$emailExh';"; //uno con el id dedl stand y el codigo en la tabla stand evento
    $res = mysqli_query($con, $query);


    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    $codigoStand = $array["data"][0]['codigo_stand'];
    $id_stand = $array["data"][0]['id_stand'];


 
    $query3 = "INSERT INTO adviser(id_adviser , id_exhibitor2 , id_stand2 , stand_confirmed , email2 , email_exhibitor , confirm) VALUES ('$idAdviser','$uid','$id_stand','$codigoStand','$email','$emailExh',0) ;";
    
    if (mysqli_query($con, $query3)) {
        echo 777;
    } else {
        echo 666;
    }
    
    
    //mysqli_free_result($res);
    mysqli_close($con);

}

function getMyAdvisers(){
    include("../config/config.php");
    $email = $_POST['email'];


    $query = "SELECT first_name,last_name,cellphone,email2,creation_date,is_validated from adviser, user WHERE email = email2 AND email_exhibitor = '$email' ;";


    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);

}

function cambiarContraseña(){
    include("../config/config.php");

    $new_password = $_POST["password"];
    $email = $_POST["email"];

    $password_cifr = password_hash($new_password, PASSWORD_DEFAULT, array("cost" => 15));
    //Encriptacion de password con metodo Hash(), array aumenta el costo o fuerza de encriptado	
    $query = "UPDATE user set password=\"$password_cifr\" where email = '$email'";

    $res = mysqli_query($con, $query);
}

function editarUser(){
    include("../config/config.php");

    $email = $_POST["email"];
    $nombreUser = $_POST["nombre"];
    $apellidoUser = $_POST["apellido"];

    $query = "SELECT id_user from user where email = '$email';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    $id_user = $array["data"][0]["id_user"];

    $array = null;


        $query = "SELECT id_rol2 from user where email = '$email';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $tipo_user = $array["data"][0]['id_rol2'];


    $array = null;



    if ($tipo_user == 3) {



        $query = "SELECT id_stand from stand_evento where correo_expositor = '$email';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $id_stand = $array["data"][0]['id_stand'];




        $query = "UPDATE stand_evento set nombre_expo = '$nombre' , apellido_expo = '$apellido' where id_stand = '$id_stand';";
        $res = mysqli_query($con, $query);

    }

    $query = "UPDATE user set first_name = '$nombreUser' , last_name = '$apellidoUser'  where id_user = '$id_user' ;";
    $res = mysqli_query($con, $query);        
    



}

function getAllUsers(){
    
    include("../config/config.php");


    $query = "SELECT * FROM user, rolUser  where id_rol = id_rol2 and id_rol > 1
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


function borrarUser(){

    include("../config/config.php");

    $email = $_REQUEST["email"];
    //obtenemos el id del usuario mediante su correo


    $query = "SELECT id_user from user where email = '$email';";
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {
            $array["data"][] = $data;
        }
        $id_user = $array["data"][0]['id_user'];
        $array = null;


    //y luego su tipo

    $query = "SELECT id_rol2 from user where id_user = '$id_user';";
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {
            $array["data"][] = $data;
        }
        $tipo_user = $array["data"][0]['id_rol2'];
        $array = null;




    if ($tipo_user == 2) {

    }else if ($tipo_user == 3) {
        $query = "SELECT id_stand from stand_evento where correo_expositor = '$email';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {
            $array["data"][] = $data;
        }

        $id_stand = $array["data"][0]['id_stand'];


        $query = "UPDATE stand_evento set status = 'Sin Asignar', correo_expositor = '' , nombre_expo = '' , apellido_expo = '' where id_stand = '$id_stand' ;";

        $res = mysqli_query($con, $query);


    }else if ($tipo_user == 4) {

        $query = " SELECT id_stand from stand_evento where correo_expositor = '$email';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {
            $array["data"][] = $data;
        }

        $id_stand = $array["data"][0]['id_stand'];

        $query = "DELETE from adviser where id_adviser = '$id_user' and stand_confirmed = '$id_stand';";
        $res = mysqli_query($con, $query);

    }else if ($tipo_user > 4) {
        // luego de visitante 
        
    }
        $array = null;

    //con el id_user conseguimos el id en la tabla user_event
        $query = "SELECT id_user_event from user_event where id_user3 = '$id_user';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {
            $array["data"][] = $data;
        }

        $id_user_event = $array["data"][0]['id_user_event'];
        $array = null;




    $query = "DELETE from user_event where id_user_event = '$id_user_event';";
    $res = mysqli_query($con, $query);

    $query = "DELETE from user where id_user = '$id_user';";
    $res = mysqli_query($con, $query);



}


?>