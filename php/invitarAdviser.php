<?php

    include("../config/config.php");

    $uid = $_POST['uid'];
    //$id_adv = 0;

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $emailExh = $_POST['email_exh'];
    $cellphone = $_POST['cellphone'];
    $event  = 1;

    
    $query = "INSERT INTO user( id_rol2, email, cellphone, first_name, last_name, id_event) VALUES(4, '$email', '$cellphone', '$firstName', '$lastName', '$event');";


    if (mysqli_query($con, $query)) {
        $query = "SELECT id_user from user where email = '$email';" //otro con el id del adviser
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {
    
            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $idAdviser = $array["data"][0]['id_user'];
        $array = null;


        $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$idAdviser',167);";
        $res = mysqli_query($con, $query);

        $query = "SELECT  codigo_stand,id_stand from stand_evento where correo_expositor = '$emailExh';" //uno con el id dedl stand y el codigo en la tabla stand evento
        $res = mysqli_query($con, $query);


        while ($data = mysqli_fetch_assoc($res)) {
    
            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $codigoStand = $array["data"][0]['codigo_stand'];
        $id_stand = $array["data"][0]['id_stand'];



        $query3 = "INSERT INTO adviser(id_adviser , id_exhibitor2 , id_stand2 , stand_confirmed , email2 , email_exhibitor , confirm) VALUES ('$idAdviser','$uid','$id_stand','$codigoStand','$email','$emailExh',0) ;";
        
        if (mysqli_query($con, $query3)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: ";
        }
        

    } else {
        echo "Error updating record: ";
    }
    
    
    //mysqli_free_result($res);
    mysqli_close($con);
?>

