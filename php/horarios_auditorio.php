<?php 
error_reporting(E_ERROR | E_PARSE);


$opc = $_POST['param'];


switch ($opc) {
    
    case 'query_horario':
        getHorarios();
        break;
    case 'subir_horario':
    	subir_horario();
    	break;
    case 'obtener_horarios':
        obtener_horarios();
        break;
    case 'editar_conferencia':
        editar_conferencia();
        break;
    case 'crearConferencista':
        crearConferencista();
        break;
    case 'borrarVideo':
        borrarVideo();
        break;


}

function crearConferencista(){
    //Aquí se agrega a la base de datos y además se le envía un correo
    include("../config/config.php");
    
    
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $cellphone = $_POST["cellphone"];
    $email = $_POST["email"];
    $eventoId = $_POST["eventoId"];
    //verificar que no exista el usuario
    $query = "INSERT INTO user(id_rol2, email,cellphone,first_name,last_name,is_validated) values(3,'$email','$cellphone','$firstname','$lastname',1);";
    $res = mysqli_query($con, $query);


    $query = "SELECT id_user from user where email = '$email' ;";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $id_user = $array["data"][0]["id_user"];
    
    $query = "INSERT INTO user_event(id_user3,id_event3) values('$id_user','$eventoId');";

    if (mysqli_query($con, $query)) {
        //Aquí le enviamos el correo al nuevo expositor
        

        mysqli_free_result($res);
        mysqli_close($con);
    
        $respuesta = array(0=>$id_user,1=>$firstname. " " .$lastname. " : " .$email);
        echo json_encode($respuesta);


    }





    
}


function revisar_horarioEditar($hora_inicio,$hora_cierre,$id_auditorio,$dia_evento,$id_horario){

    include("../config/config.php");

    $query = "SELECT count(*)-1 as n_horarios from horarios_auditorio where id_auditorio = '$id_auditorio' and fecha_inicio = '$dia_evento';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_horarios = $array["data"][0]["n_horarios"];
    if ($n_horarios == 0) {
        return true;
    }
    $array = null;


    $query = "SELECT hora_inicio,hora_cierre from horarios_auditorio where id_auditorio = '$id_auditorio' and id_horario != '$id_horario' ;";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    mysqli_free_result($res);
    mysqli_close($con);

    $horaHorainicio = intval(substr($hora_inicio, 0, 2));
    $MinutosHorainicio = intval(substr($hora_inicio, 3, 2));
    $horaHoraCierre = intval(substr($hora_cierre, 0, 2));
    $MinutosHoraCierre = intval(substr($hora_cierre, 3, 2));


    $horaHorainicio = strtotime( $horaHorainicio.":".$MinutosHorainicio );
    $horaHoraCierre = strtotime( $horaHoraCierre.":".$MinutosHoraCierre );


    $contador = 0;


        for ($i=0; $i < $n_horarios; $i++) { 

            $horaHorainicioConfe = intval(substr($array["data"][$i]["hora_inicio"], 0, 2));
            $MinutosHorainicioConfe = intval(substr($array["data"][$i]["hora_inicio"], 3, 2));
            $horaHoraCierreConfe = intval(substr($array["data"][$i]["hora_cierre"], 0, 2));
            $MinutosHoraCierreConfe = intval(substr($array["data"][$i]["hora_cierre"], 3, 2));


            $horaHorainicioConfe = strtotime( $horaHorainicioConfe.":".$MinutosHorainicioConfe );
            $horaHoraCierreConfe = strtotime( $horaHoraCierreConfe.":".$MinutosHoraCierreConfe );

            if ($horaHorainicio <= $horaHorainicioConfe) {
                if ($horaHoraCierre <= $horaHorainicioConfe) {
                    $contador += 1;
                }

            }else if ($horaHorainicio >= $horaHoraCierreConfe) {
                if ($horaHoraCierre >= $horaHoraCierreConfe) {
                    $contador += 1;

                }
            }

        }

    if ($contador == $n_horarios) {
        return true;
    }else{
        return false;
    }


}
function revisar_horario($hora_inicio,$hora_cierre,$id_auditorio,$dia_evento){

    include("../config/config.php");

    $query = "SELECT count(*) as n_horarios from horarios_auditorio where id_auditorio = '$id_auditorio' and fecha_inicio = '$dia_evento';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $n_horarios = $array["data"][0]["n_horarios"];
    if ($n_horarios == 0) {
        return true;
    }
    $array = null;


    $query = "SELECT hora_inicio,hora_cierre from horarios_auditorio where id_auditorio = '$id_auditorio';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    mysqli_free_result($res);
    mysqli_close($con);

    $horaHorainicio = intval(substr($hora_inicio, 0, 2));
    $MinutosHorainicio = intval(substr($hora_inicio, 3, 2));
    $horaHoraCierre = intval(substr($hora_cierre, 0, 2));
    $MinutosHoraCierre = intval(substr($hora_cierre, 3, 2));


    $horaHorainicio = strtotime( $horaHorainicio.":".$MinutosHorainicio );
    $horaHoraCierre = strtotime( $horaHoraCierre.":".$MinutosHoraCierre );


    $contador = 0;


        for ($i=0; $i < $n_horarios; $i++) { 

            $horaHorainicioConfe = intval(substr($array["data"][$i]["hora_inicio"], 0, 2));
            $MinutosHorainicioConfe = intval(substr($array["data"][$i]["hora_inicio"], 3, 2));
            $horaHoraCierreConfe = intval(substr($array["data"][$i]["hora_cierre"], 0, 2));
            $MinutosHoraCierreConfe = intval(substr($array["data"][$i]["hora_cierre"], 3, 2));


            $horaHorainicioConfe = strtotime( $horaHorainicioConfe.":".$MinutosHorainicioConfe );
            $horaHoraCierreConfe = strtotime( $horaHoraCierreConfe.":".$MinutosHoraCierreConfe );

            if ($horaHorainicio <= $horaHorainicioConfe) {
                if ($horaHoraCierre <= $horaHorainicioConfe) {
                    $contador += 1;
                }

            }else if ($horaHorainicio >= $horaHoraCierreConfe) {
                if ($horaHoraCierre >= $horaHoraCierreConfe) {
                    $contador += 1;

                }
            }

        }

    if ($contador == $n_horarios) {
        return true;
    }else{
        return false;
    }


}

function editar_conferencia(){

    include("../config/config.php");

    //AQUÍ IRÍA EL NOMBRE ANTIGUO
    $nombre_confAntigua = $_POST["nombre_confAntigua"];
    $nombre_conf = $_POST["nombre_conf"];
    $dia_evento = $_POST["dia_evento"];
    $id_expositor = $_POST["id_expositor"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_cierre = $_POST["hora_cierre"];

    $borrar_conf = $_POST["borrar_conf"];

    $id_auditorio = $_POST["id_auditorio"];

    $id_horario = $_POST["id_horario"];

    $ubicacion = $_POST["ubicacion_archivo"];

    if ($borrar_conf == 1 or $borrar_conf == '1' or $borrar_conf == "1") {

        $query = "DELETE from horarios_auditorio where id_horario = '$id_horario';";
        $res = mysqli_query($con, $query);
        mysqli_free_result($res);
        mysqli_close($con);


        $ubicacionVideoViejo = $ubicacion.$nombre_confAntigua.$id_auditorio."Video.mp4";
        If (unlink($ubicacionVideoViejo)) {
          // file was successfully deleted
        } else {
          // there was a problem deleting the file
        }
        

    }else{

        //Revisar el nombre, si pasa entonces cambias también el archivo

        if(revisarNombreRepetidoEditar($id_auditorio,$nombre_conf,$id_horario) == false){

            echo(777);

        }else if(revisar_horarioEditar($hora_inicio,$hora_cierre,$id_auditorio,$dia_evento,$id_horario)) {

            $query = "UPDATE horarios_auditorio set hora_inicio = '$hora_inicio', hora_cierre = '$hora_cierre', id_expositor = '$id_expositor', nombre_conf = '$nombre_conf' ,fecha_inicio = '$dia_evento' ,fecha_cierre = '$dia_evento'  where  id_horario = '$id_horario';";      
            $res = mysqli_query($con, $query);
            mysqli_free_result($res);
            mysqli_close($con);

            //aquí cambiamos de nombre

            $nombreNuevo = $ubicacion.$nombre_conf.$id_auditorio.'Video.mp4';

            $ubicacionVideoViejo = $ubicacion.$nombre_confAntigua.$id_auditorio."Video.mp4";

            rename($ubicacionVideoViejo, $nombreNuevo);




            //además tenemos que cambiar el nombre del archivo
            echo(999);  

        }else{

            echo(666);

        }



    }


    mysqli_free_result($res);
    mysqli_close($con);

}

function obtener_horarios(){
    include("../config/config.php");

    $auditorio_id = $_POST["auditorio_id"];

    
    $query = "SELECT count(*) as numero from horarios_auditorio as h , user as u where h.id_expositor = u.id_user and id_auditorio = '$auditorio_id' ;";
    $res = mysqli_query($con, $query);


    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }


    $cantidad = $array["data"][0]["numero"];

    $array = null;
    $query = "SELECT  h.id_horario ,h.fecha_inicio ,h.fecha_cierre  ,h.hora_inicio , h.hora_cierre, u.email, u.first_name , u.last_name, h.nombre_conf, u.id_user  from horarios_auditorio as h , user as u where h.id_expositor = u.id_user  and id_auditorio = '$auditorio_id' ;";
    $res = mysqli_query($con, $query);


    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }


    $horariosArray['success'] = true;

    
    for ($i = 0; $i < $cantidad; $i++){ 
        $id_horario = $array["data"][$i]["id_horario"];
        $fecha_inicio = $array["data"][$i]["fecha_inicio"];
        $fecha_cierre = $array["data"][$i]["fecha_cierre"];
        $hora_inicio = $array["data"][$i]["hora_inicio"];
        $hora_cierre = $array["data"][$i]["hora_cierre"];
        $first_name = $array["data"][$i]["first_name"];
        $last_name = $array["data"][$i]["last_name"];
        $id_user = $array["data"][$i]["id_user"];
        $nombre_conf = $array["data"][$i]["nombre_conf"];


        $horariosArray['data'][$i] =  array('groupId' => $id_horario,'title' => $nombre_conf,  'start'  => $fecha_inicio.'T'.$hora_inicio, 'end' => $fecha_cierre.'T'.$hora_cierre, 'description' => $id_user );

    }
    




    echo json_encode($horariosArray);

    //mysqli_free_result($res);
    //mysqli_close($con);

}
function revisarNombreRepetidoEditar($id_auditorio,$nombre,$id_horario){
    include("../config/config.php");

    $query = "SELECT nombre_conf from horarios_auditorio where id_auditorio = '$id_auditorio' and id_horario != '$id_horario';";
    $res = mysqli_query($con, $query);


    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    mysqli_free_result($res);
    mysqli_close($con);  

    $nombres = $array["data"];

    for ($i=0; $i < count($nombres); $i++) { 
        if($nombres[$i]['nombre_conf'] == $nombre ){
            
            return false;
        }
    }

    return true;

}


function revisarNombreRepetido($id_auditorio,$nombre){
    include("../config/config.php");

    $query = "SELECT nombre_conf from horarios_auditorio where id_auditorio = '$id_auditorio';";
    $res = mysqli_query($con, $query);


    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    mysqli_free_result($res);
    mysqli_close($con);  

    $nombres = $array["data"];

    for ($i=0; $i < count($nombres); $i++) { 
        if($nombres[$i]['nombre_conf'] == $nombre ){
            
            return false;
        }
    }

    return true;

}


function subir_horario(){
    include("../config/config.php");

    //También debemos enviar un correo aquí, pero con la nueva imagen

    $id_auditorio = $_POST["id_auditorio"];
    $nombre_conf = $_POST["nombre_conf"];
    $dia_evento = $_POST["dia_evento"];
    $id_expositor = $_POST["id_expositor"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_cierre = $_POST["hora_cierre"];

    $tipoConferencia = $_POST["tipoConferencia"];

    $ubicacion = $_REQUEST['ubicacion_archivo'];
    $nombre_conf = str_replace(" ", "_", $nombre_conf);
    $nombre_archivo = $nombre_conf.'Video';

    $src = $ubicacion.$nombre_archivo.".mp4";

    if(file_exists($src)){
        $subido = 1;
    }else{
        $subido = 0;
    }


    //PRIMERO REVISAMOS QUE EL HORARIO NO ESTÉ OCUPADO

    if(revisar_horario($hora_inicio,$hora_cierre,$id_auditorio,$dia_evento)) {

        //aquí revisamos el nombre
        if(revisarNombreRepetido($id_auditorio,$nombre_conf)){

            if($tipoConferencia == 'preGrabada'){

                $query = "INSERT INTO horarios_auditorio(id_auditorio , hora_inicio , hora_cierre , id_expositor , nombre_conf , fecha_inicio , fecha_cierre,tipoConferencia,ubicacionArchivo,subido) 
                VALUES('$id_auditorio','$hora_inicio','$hora_cierre','$id_expositor','$nombre_conf', '$dia_evento', '$dia_evento','$tipoConferencia','$src','$subido') ;";

            }else{
                $query = "INSERT INTO horarios_auditorio(id_auditorio , hora_inicio , hora_cierre , id_expositor , nombre_conf , fecha_inicio , fecha_cierre,tipoConferencia,subido) 
                VALUES('$id_auditorio','$hora_inicio','$hora_cierre','$id_expositor','$nombre_conf', '$dia_evento', '$dia_evento','$tipoConferencia','$subido') ;";
                
            }



            $res = mysqli_query($con, $query);


            mysqli_free_result($res);
            mysqli_close($con);
            echo 999;
        }else{
            echo 777;
    
        }

    }else{
        
        echo "HORARIO_REPETIDO";

    }

}

function borrarVideo(){
    include("../config/config.php");
 
    $nombre_conf = $_POST["nombre_conf"];

    $query = "SELECT id_horario from horarios_auditorio where  nombre_conf = '$nombre_conf';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $id_horario = $array["data"][0]["id_horario"];
    $array = null;



    $query = "UPDATE horarios_auditorio set subido = 0 where id_horario = '$id_horario';";
    $res = mysqli_query($con, $query);  
    
    
    $query = "SELECT ubicacionArchivo from horarios_auditorio where nombre_conf = '$nombre_conf';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $ubicacionArchivo = $array["data"][0]["ubicacionArchivo"];

    if (unlink($ubicacionArchivo)) {
    }
}

?>