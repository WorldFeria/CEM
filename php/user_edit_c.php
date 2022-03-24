
<?php
error_reporting(E_ERROR | E_PARSE);


$opc = $_POST['param'];



switch ($opc) {
    
    case 'organizador':
        getOrganizadores();
        break;
    case 'vendedor':
        getVendedor();
        break;
    case 'expositor':
        getExpositor();
        break;
    case 'asesor':
        getAsesor();
        break;
    case 'visitante':
        get_visitante();
        break;
    case 'visitantesClassEducation_Canada':
        get_visitantesClassEducation_Canada();
        break;    
        
    case 'visitantesClassEducation_Italia':
        get_visitantesClassEducation_Italia();
        break; 


    case 'agregar_exp':
        agregar_exp();
        break;
    case 'agregar_asesor':
        agregar_asesor();
        break;
    case 'agregar_org':
        agregar_org();
        break;
    case 'agregarVendedor':
        agregarVendedor();
        break;


    case 'editarUser':
        editarUser();
        break;
    case 'borrarUser':
        borrarUser();
        break;


}

function borrarUser(){

    include("../config/config.php");

    $id_user = $_POST["id_user"];
    $id_evento = $_POST["id_evento"];

    $tipo_user = $_POST["tipo_user"];
    $stand = $_POST["id_stand"];

    if ($tipo_user == 2) {

        $query = "DELETE from user_event where id_user3 = '$id_user' and id_event3 = '$id_evento';";
        $res = mysqli_query($con, $query);
    }

    if ($tipo_user == 3) {
       
        $query = "SELECT id_stand from stand_evento where codigo_stand = '$stand';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $id_stand = $array["data"][0]['id_stand'];

        $query = "UPDATE stand_evento set status = 'Sin Asignar', correo_expositor = '' , nombre_expo = '' , apellido_expo = '' where id_stand = '$id_stand' ;";

        $res = mysqli_query($con, $query);




    }if ($tipo_user == 4) {
        $query = "DELETE from adviser where id_adviser = '$id_user' and stand_confirmed = '$stand';";
        $res = mysqli_query($con, $query);

    }
    if ($tipo_user > 4 and $tipo_user < 8 ) {
        $query = "DELETE from user_event where id_user3 = '$id_user' and id_event3 = '$id_evento';";
        $res = mysqli_query($con, $query);
    }
    if ($tipo_user == 8) {


        $query = "SELECT id_stand from stand_evento where codigo_stand = '$stand';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $id_stand = $array["data"][0]['id_stand'];


        $query = "UPDATE stand_evento set correo_vendedor = null where id_stand = '$id_stand' ;";

        $res = mysqli_query($con, $query);

        
    }

        mysqli_free_result($res);
        mysqli_close($con);
}

function editarUser(){
    include("../config/config.php");

    $tipo_user = $_POST["tipo_user"];
    $status = $_POST["status"];

    $stand = $_POST["stand"];


    $id_user = $_POST["id_user"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];


    if ($tipo_user == 2) {//organizadores

        $query = "UPDATE user set first_name =  '$nombre' ,last_name = '$apellido'  where id_user = '$id_user' ;";
        $res = mysqli_query($con, $query);

    }else if ($tipo_user == 3) {//expositores

        //obtenemos el id del stand mediante su codigo

        $query = "SELECT id_stand from stand_evento where codigo_stand = '$stand';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $id_stand = $array["data"][0]['id_stand'];


        $query = "UPDATE stand_evento set nombre_expo = '$nombre' , apellido_expo = '$apellido' where id_stand = '$id_stand';";
        $res = mysqli_query($con, $query);
        $query = "UPDATE user set first_name = '$nombre' , last_name = '$apellido' where id_user = '$id_user';";
        $res = mysqli_query($con, $query);



    }else if ($tipo_user == 4) {//asesores


        $query = "UPDATE user set first_name = '$nombre' , last_name = '$apellido' where id_user = '$id_user';";
        $res = mysqli_query($con, $query);



    }else if ($tipo_user >= 5) {//visitantes

        $query = "UPDATE user set first_name = '$nombre' , last_name = '$apellido' where id_user = '$id_user';";
        $res = mysqli_query($con, $query);

    }
    mysqli_free_result($res);
    mysqli_close($con);
}

function get_visitante(){
    include("../config/config.php");

    $id_evento_padre = $_POST['id_current_event'];

/*
create view vistaVisitantes as
SELECT id_user, first_name, last_name,email,cellphone , id_rol2, 
CASE id_rol WHEN 5 THEN concat(id_rol,'_student') 
WHEN 6 THEN concat(visitorAns5.id_ans5,'_carer') 
WHEN 9 THEN concat(visitorAns6.id_ans6,'_professional') 
END AS 'kind', visitorAns1.ans_text as escuela ,name as country 
FROM rolUser, user, country, visitor, visitorAns5, visitorAns6,visitorAns1 
WHERE id_rol=id_rol2 AND country=id AND id_user=id_user3 
AND visitor.id_ans5=visitorAns5.id_ans5 
AND visitor.id_ans6=visitorAns6.id_ans6 AND visitorAns1.id_ans1 = visitor.id_ans1
 AND (id_rol='5' OR id_rol='6' OR id_rol='9') 
ORDER BY id_user DESC;
*/


    $query = "SELECT * from vistaVisitantes;";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);

}

function get_visitantesClassEducation_Canada(){
    include("../config/config.php");

    $query = "SELECT * FROM visitorsCanadaClassEducation;";

    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}

function get_visitantesClassEducation_Italia(){
    include("../config/config.php");

    $query = "SELECT * FROM visitorsItaliaClassEducation;";

    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}

function getOrganizadores(){
    include("../config/config.php");

    $id_evento_padre = $_POST['id_current_event'];
    $query = "SELECT id_user,first_name,last_name,email,cellphone from user, user_event where id_user = id_user3 and id_rol2 = 2 and id_event3 = '$id_evento_padre';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);

}

function getVendedor(){
    include("../config/config.php");

    $id_evento_padre = $_POST['id_current_event'];


    $query = "SELECT id_user, first_name, last_name, email, cellphone, codigo_stand from user, user_event, stand_evento where id_user3 = id_user and id_event3 = 167 and id_rol2 = 8 and correo_vendedor = email;";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array2["data"][] = $data;
    }

    echo json_encode($array2);

    mysqli_free_result($res);
    mysqli_close($con);

}


function getExpositor(){
    include("../config/config.php");

    $id_evento_padre = $_POST['id_current_event'];


    $query = "SELECT  id_user,nombre_expo,apellido_expo,correo_expositor,cellphone,codigo_stand,status from stand_evento,user,user_event where status in ('En espera','Confirmado') and correo_expositor = email and id_user3 = id_user and id_event3 = '$id_evento_padre';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array2["data"][] = $data;
    }

    echo json_encode($array2);

    mysqli_free_result($res);
    mysqli_close($con);

}
function getAsesor(){
    include("../config/config.php");

    $id_evento_padre = $_POST['id_current_event'];


    $query = "SELECT  id_user,first_name,last_name, email,cellphone,stand_confirmed,confirm from user,adviser,user_event where id_adviser = id_user and id_adviser = id_user3 and id_event3 = '$id_evento_padre';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);

}


function agregar_org(){
    include("../config/config.php");

    $nameEvent = $_POST["nameEvent"];
    $elegirOrg = $_POST["elegirOrg"];
    $agregar_nuevoOrg = $_POST["agregar_nuevoOrg"];

    if ($elegirOrg != 'S' ) {

        $query = "SELECT count(*) as cantidadEventoUser from user_event where id_user3 = '$elegirOrg';";
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $cantidadEventoUser = $array["data"][0]['cantidadEventoUser'];
        $array = null;



        if ($cantidadEventoUser == 0) {
            $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$elegirOrg','$nameEvent');";
            $res = mysqli_query($con, $query);
        }

    }else{
        //se le envía correo
    }

}


function agregar_exp(){
    include("../config/config.php");

 
    //PARA CUANDO EL EXPOSITOR YA EXISTE EN LA BASE DE DATOS


    $id_evento = $_POST["nameEvent"];//167
    $id_expositor = $_POST["elegir_exp"];//20
    $correo_nuevo_expositor = $_POST["agregar_nuevoExp"]; //
    $id_pabellon = $_POST["elegir_pabe_exp"];//PA
    $id_stand = $_POST["elegir_stand_expo"];//1027

    if ($id_expositor != 'S' ) {
        //PRIMERO CON EL ID DEL EXPOSITOR OBTENEMOS SU CORREO, SU NOMBRE Y SU APELLIDO

        $query = "SELECT email,first_name,last_name from user where id_user = '$id_expositor';";

        $res = mysqli_query($con, $query);

        $array = null;
        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $correo_expositor = $array["data"][0]["email"];
        $nombre_expo = $array["data"][0]["first_name"];
        $apellido_expo = $array["data"][0]["last_name"];
        $array = null;
        //LUEGO PONEMOS EL STAND EN ESPERA CON TODO LO QUE CONLLEVA

        $query = "UPDATE stand_evento set status = 'En espera', correo_expositor = '$correo_expositor', nombre_expo = '$nombre_expo' , apellido_expo = '$apellido_expo' where id_stand = '$id_stand';";

        $res = mysqli_query($con, $query);
//------------------UNA VEZ QUE HALLA CONFIRMADO AGREGAMOS AL EXPOSITOR AL RESPECTIVO EVENTO :

        //PERO ANTES CONFIRMAMOS QUE NO EXISTA ESE USUARIO EN ESE VENTO


        $query = "SELECT count(*) as cantidadEventoUser from user_event where id_user3 = '$id_expositor';";
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $cantidadEventoUser = $array["data"][0]['cantidadEventoUser'];
        $array = null;



        if ($cantidadEventoUser == 0) {
            $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$id_expositor','$id_evento');";
            $res = mysqli_query($con, $query);
        }


        //AQUÍ PASAMOS POR AJAX UN PARAM : confirm_stand_exh ,email :  id_stand : al archivo confirmationEmail
        //El resto es historia

        echo(12345);



    }else{
        $countryExpositor = $_POST["countryExpositor"];
        $telefonoExpositor = $_POST["telefonoExpositor"];


        $array = null;

        $query = "SELECT count(*) as n_correos from user ;";
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $n_correos = $array["data"][0]['n_correos'];  

        $array = null;

        //verificamos que el correo no exista ya en la base
        $query = "SELECT email,cellphone from user ;";
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $noExiste = true;
        $TelNuevo = true;

        for ($i=0; $i < $n_correos ; $i++) { 
            $correoX = $array["data"][$i]['email'];
            $numeroX = $array["data"][$i]['cellphone'];
            if ($correo_nuevo_expositor == $correoX) {
                echo(666);
                $noExiste = false;
                break;
                return null;
            }
            else if ($telefonoExpositor == $numeroX) {
                echo(777);
                $TelNuevo = false;
                break;
                return null;
            }  
        }

        $array = null;



        if ($noExiste && $TelNuevo) {

            # code...

            //PARA CUANDO SE LE MANDA CON UN CORREO NUEVO
         
            // Primero le creamos la cuenta con el ajax del otro archivo
            //luego hacemos el update con los datos que metió

            $nombreExpositor = $_POST["nombreExpositor"];
            $apellidoExpositor = $_POST["apellidoExpositor"];
            
            $query = "INSERT INTO user( id_rol2, email, country, cellphone, first_name, last_name) VALUES (3, '$correo_nuevo_expositor', '$countryExpositor', '$telefonoExpositor', '$nombreExpositor', '$apellidoExpositor');";

            $res = mysqli_query($con, $query);


            $query = "UPDATE stand_evento set status = 'En espera', correo_expositor = '$correo_nuevo_expositor' , nombre_expo = '$nombreExpositor' , apellido_expo = '$apellidoExpositor' where id_stand = '$id_stand';";

            $res = mysqli_query($con, $query);

            //Obtenemos el id del usuario
            $array = null;




            $query = "SELECT id_user from user where email = '$correo_nuevo_expositor';";
            $res = mysqli_query($con, $query);

            while ($data = mysqli_fetch_assoc($res)) {

                //$array['data'][] = array_map("utf8_encode", $data);
                $array["data"][] = $data;
            }

            $id_expositor = $array["data"][0]['id_user'];




            $array = null;

            $query = "SELECT count(*) as cantidadEventoUser from user_event where id_user3 = '$id_expositor';";
            $res = mysqli_query($con, $query);

            while ($data = mysqli_fetch_assoc($res)) {

                //$array['data'][] = array_map("utf8_encode", $data);
                $array["data"][] = $data;
            }

            $cantidadEventoUser = $array["data"][0]['cantidadEventoUser'];
            $array = null;



            if ($cantidadEventoUser == 0) {
                $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$id_expositor','$id_evento');";
                $res = mysqli_query($con, $query);
            }




    //---------Ya cuando confirme se hace todo lo demás
            //si confirma el mensaje entonces también se confirma el stand

            echo(54321);


        }

    }




    mysqli_free_result($res);
    mysqli_close($con);


}

function agregarVendedor(){
    include("../config/config.php");

    $nameEvent = $_POST["nameEvent"];

    $nameEvent = $_POST["nameEvent"];
    $elegirVendedor = $_POST["elegirVendedor"];//19
    $elegir_pabe_vendedor = $_POST["elegir_pabe_vendedor"];//PA
    $elegir_stand_vendedor = $_POST["elegir_stand_vendedor"]; //1028   
    //para cuando es nuevo y para cuando ya existe

    if ($elegirVendedor != 'Z'){


        $query =  "SELECT email from user where id_user = '$elegirVendedor';";

        $res = mysqli_query($con, $query);
        
        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

    $email = $array["data"][0]['email'];


        $query = "UPDATE stand_evento set correo_vendedor = '$email' where id_stand = '$elegir_stand_vendedor'; ";
        $res = mysqli_query($con, $query);


            $array = null;

            $query = "SELECT count(*) as cantidadEventoUser from user_event where id_user3 = '$elegirVendedor';";
            $res = mysqli_query($con, $query);

            while ($data = mysqli_fetch_assoc($res)) {

                //$array['data'][] = array_map("utf8_encode", $data);
                $array["data"][] = $data;
            }

            $cantidadEventoUser = $array["data"][0]['cantidadEventoUser'];
            $array = null;



            if ($cantidadEventoUser == 0) {
                $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$elegirVendedor','$nameEvent');";
                $res = mysqli_query($con, $query);
            }


    }else{//Es nuevo asesor

    $agregar_nuevoVendedor = $_POST["agregar_nuevoVendedor"];//correo nuevo
    $nombreVendedor = $_POST["nombreVendedor"];
    $apellidoVendedor = $_POST["apellidoVendedor"];
    $countryVendedor = $_POST["countryVendedor"];
    $telefonoVendedor = $_POST["telefonoVendedor"];

        $query = "INSERT into user(id_rol2,email,country,cellphone,first_name,last_name) values(8,'$agregar_nuevoVendedor','$countryVendedor','$telefonoVendedor','$nombreVendedor','$apellidoVendedor') ;";
        $res = mysqli_query($con, $query);

        $query = "UPDATE stand_evento set correo_vendedor = '$agregar_nuevoVendedor' where id_stand = '$elegir_stand_vendedor'; ";
        $res = mysqli_query($con, $query);



        $query =  "SELECT id_user from user where email = '$agregar_nuevoVendedor';";

        $res = mysqli_query($con, $query);
        
        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $id_user = $array["data"][0]['id_user'];



            $array = null;

            $query = "SELECT count(*) as cantidadEventoUser from user_event where id_user3 = '$id_user';";
            $res = mysqli_query($con, $query);

            while ($data = mysqli_fetch_assoc($res)) {

                //$array['data'][] = array_map("utf8_encode", $data);
                $array["data"][] = $data;
            }

            $cantidadEventoUser = $array["data"][0]['cantidadEventoUser'];
            $array = null;



            if ($cantidadEventoUser == 0) {
                $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$id_user','$nameEvent');";
                $res = mysqli_query($con, $query);
            }



    }





    mysqli_free_result($res);
    mysqli_close($con);  



}


function agregar_asesor(){
    include("../config/config.php");

    $nameEvent = $_POST["nameEvent"];
    $elegir_asesor = $_POST["elegir_asesor"];//19
    $elegir_pabe_asesor = $_POST["elegir_pabe_asesor"];//PA
    $elegir_stand_asesor = $_POST["elegir_stand_asesor"];//1028
    if ($elegir_asesor != 'Z') {
        # code...
    
        //Primero obtenemos el correo y el id del expositor que está en ese stand, luego el codigo del stand 

        $query =  "SELECT correo_expositor,codigo_stand from stand_evento where id_stand = '$elegir_stand_asesor';";

        $res = mysqli_query($con, $query);
        
        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

    $correo_expositor = $array["data"][0]['correo_expositor'];
    $codigo_stand = $array["data"][0]['codigo_stand'];
        $array = null;

        $query =  "SELECT id_user from user where email = '$correo_expositor';";

        $res = mysqli_query($con, $query);
        
        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

    $id_user = $array["data"][0]['id_user'];
        $array = null;

        $query =  "SELECT email FROM user where id_user = '$elegir_asesor';";

        $res = mysqli_query($con, $query);
        
        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

    $email = $array["data"][0]['email'];
        $array = null;

        $query =  "INSERT into adviser(id_adviser,id_exhibitor2,id_stand2,stand_confirmed,email2,email_exhibitor,confirm) values('$elegir_asesor','$id_user','$elegir_stand_asesor','$codigo_stand','$email','$correo_expositor',1);";

        $res = mysqli_query($con, $query);



            $array = null;
        //por ultimo nos agregamos en la tabla user_event


            $query = "SELECT count(*) as cantidadEventoUser from user_event where id_user3 = '$elegir_asesor';";
            $res = mysqli_query($con, $query);

            while ($data = mysqli_fetch_assoc($res)) {

                //$array['data'][] = array_map("utf8_encode", $data);
                $array["data"][] = $data;
            }

            $cantidadEventoUser = $array["data"][0]['cantidadEventoUser'];
            $array = null;



            if ($cantidadEventoUser == 0) {
                $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$elegir_asesor','$nameEvent');";
                $res = mysqli_query($con, $query);
            }


        echo(12345);



    }else{//ES NUEVO EL ASESOR

        $countryAsesor = $_POST["countryAsesor"];
        $telefonoAsesor = $_POST["telefonoAsesor"];
        $correNAsesor = $_POST["agregar_nuevoAsesor"];

        $array = null;

        $query = "SELECT count(*) as n_correos from user ;";
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $n_correos = $array["data"][0]['n_correos'];  

        $array = null;

        //verificamos que el correo no exista ya en la base
        $query = "SELECT email,cellphone from user ;";
        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $noExiste = true;
        $TelNuevo = true;

        for ($i=0; $i < $n_correos ; $i++) { 
            $correoX = $array["data"][$i]['email'];
            $numeroX = $array["data"][$i]['cellphone'];
            if ($correNAsesor == $correoX) {
                echo(666);
                $noExiste = false;
                break;
                return null;
            }
            else if ($telefonoAsesor == $numeroX) {
                echo(777);
                $TelNuevo = false;
                break;
                return null;
            }  
        }

        $array = null;



        if ($noExiste && $TelNuevo) {

        
            $nombreAsesor = $_POST["nombreAsesor"];
            $apellidoAsesor = $_POST["apellidoAsesor"];

            $query = "INSERT INTO user( id_rol2, email, country, cellphone, first_name, last_name) VALUES(4, '$correNAsesor', '$countryAsesor', '$telefonoAsesor', '$nombreAsesor', '$apellidoAsesor');";

            $res = mysqli_query($con, $query);

            //obtenemos el id del asesor
            $array = null;

            $query =  "SELECT id_user from user where email = '$correNAsesor';";

            $res = mysqli_query($con, $query);
            
            while ($data = mysqli_fetch_assoc($res)) {

                //$array['data'][] = array_map("utf8_encode", $data);
                $array["data"][] = $data;
            }

        $idAsesor = $array["data"][0]['id_user'];
            $array = null;


            $query =  "SELECT correo_expositor,codigo_stand from stand_evento where id_stand = '$elegir_stand_asesor';";

            $res = mysqli_query($con, $query);
            
            while ($data = mysqli_fetch_assoc($res)) {

                //$array['data'][] = array_map("utf8_encode", $data);
                $array["data"][] = $data;
            }

        $correo_expositor = $array["data"][0]['correo_expositor'];
        $codigo_stand = $array["data"][0]['codigo_stand'];
            $array = null;            
            $query =  "SELECT id_user from user where email = '$correo_expositor';";

            $res = mysqli_query($con, $query);
            
            while ($data = mysqli_fetch_assoc($res)) {

                //$array['data'][] = array_map("utf8_encode", $data);
                $array["data"][] = $data;
            }

        $id_user = $array["data"][0]['id_user'];
            $array = null;





            $query =  "INSERT into adviser(id_adviser,id_exhibitor2,id_stand2,stand_confirmed,email2,email_exhibitor,confirm) values('$idAsesor','$id_user','$elegir_stand_asesor','$codigo_stand','$correNAsesor','$correo_expositor',0);";

            $res = mysqli_query($con, $query);






                $array = null;
            //por ultimo nos agregamos en la tabla user_event


                $query = "SELECT count(*) as cantidadEventoUser from user_event where id_user3 = '$idAsesor';";
                $res = mysqli_query($con, $query);

                while ($data = mysqli_fetch_assoc($res)) {

                    //$array['data'][] = array_map("utf8_encode", $data);
                    $array["data"][] = $data;
                }

                $cantidadEventoUser = $array["data"][0]['cantidadEventoUser'];
                $array = null;



                if ($cantidadEventoUser == 0) {
                    $query = "INSERT INTO user_event(id_user3,id_event3) VALUES('$idAsesor','$nameEvent');";
                    $res = mysqli_query($con, $query);
                }



            echo(54321);

        }

    }



    mysqli_free_result($res);
    mysqli_close($con);   
}







?>