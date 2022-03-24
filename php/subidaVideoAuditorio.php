<?php 

define('MB', 1048576);





function validacion_video($file,$size){
    $type = $file["type"];

    $tamaño_real = getimagesize($file);

    if ($type != 'video/mp4'){
        return '1';
        ?>
        <script>
            notyf.open({
                type: 'warning',
                message: '<b>¡AVISO!</b> El archivo no es compatible o no es un video.'
            });
        </script>
        <?php

    }else if ($size > 100*MB){
        return '2';
        ?>
        <script>
            notyf.open({
                type: 'warning',
                message: '<b>¡AVISO!</b> El peso del archivo es demasiado grande. El tamaño máximo es de 100 MB. y el archivo cargado es de <?php echo $size; ?> MB.'
            });
        </script>
        <?php  

        
    }else{
        return '0';
    }    
}

if (isset($_FILES["videoConfe2"])) {
    $file = $_FILES["videoConfe2"];

    $src = $_REQUEST['ubicacion_archivo'];
    $nombre_conf = $_POST["nombre_conf"];

    $tmp_n = $file["tmp_name"];
    include("../config/config.php");

    $query = "SELECT id_horario from horarios_auditorio where  nombre_conf = '$nombre_conf';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $id_horario = $array["data"][0]["id_horario"];



    $query = "UPDATE horarios_auditorio set subido = 1 where id_horario = '$id_horario';";
    $res = mysqli_query($con, $query);

    $size = $file["size"];

    switch (validacion_video($file,$size)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            break;
    }
}


if (isset($_FILES["videoConfe"])) {
    $file = $_FILES["videoConfe"];

    $ubicacion = $_REQUEST['ubicacion_archivo'];

    $id_auditorio = $_POST["id_auditorio"];
    $nombre_conf = $_POST["nombre_conf"];
    $dia_evento = $_POST["dia_evento"];
    $id_expositor = $_POST["id_expositor"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_cierre = $_POST["hora_cierre"];

    $tipoConferencia = $_POST["tipoConferencia"];
    $nombre_conf = str_replace(" ", "_", $nombre_conf);

    $nombre_archivo = $nombre_conf.$id_auditorio.'Video';

    $src = $ubicacion.$nombre_archivo.".mp4";
    $tmp_n = $file["tmp_name"];


    $size = $file["size"];

    switch (validacion_video($file,$size)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_del_stand = $_REQUEST['codigo_del_stand'];

            switch (subir_horario($id_auditorio,$hora_inicio,$hora_cierre,$id_expositor,$nombre_conf, $dia_evento,$tipoConferencia,$src) ){

                case '0':
                    echo 999;
                    break;
                case '1':
                    echo "HORARIO_REPETIDO";
                    break;                
            }  
            break;
    }
}else{
    
    $id_auditorio = $_POST["id_auditorio"];
    $nombre_conf = $_POST["nombre_conf"];
    $dia_evento = $_POST["dia_evento"];
    $id_expositor = $_POST["id_expositor"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_cierre = $_POST["hora_cierre"];
    $tipoConferencia = $_POST["tipoConferencia"];

    switch (subir_horario($id_auditorio,$hora_inicio,$hora_cierre,$id_expositor,$nombre_conf, $dia_evento,$tipoConferencia,null) ) {
        case '0':
            //Aquí debemos llamar a la función que mande el correo
            echo 999;
            break;
        case '1':
            echo "HORARIO_REPETIDO";
            break;                
    }  

}

function subir_horario($id_auditorio,$hora_inicio,$hora_cierre,$id_expositor,$nombre_conf, $dia_evento,$tipoConferencia,$archivoSubido){
    include("../config/config.php");


    //PRIMERO REVISAMOS QUE EL HORARIO NO ESTÉ OCUPADO

    if(revisar_horario($hora_inicio,$hora_cierre,$id_auditorio,$dia_evento)) {

        if($tipoConferencia == 'preGrabada'){

            $query = "INSERT INTO horarios_auditorio(id_auditorio , hora_inicio , hora_cierre , id_expositor , nombre_conf , fecha_inicio , fecha_cierre,tipoConferencia,ubicacionArchivo) 
            VALUES('$id_auditorio','$hora_inicio','$hora_cierre','$id_expositor','$nombre_conf', '$dia_evento', '$dia_evento','$tipoConferencia','$archivoSubido') ;";

        }else{
            $query = "INSERT INTO horarios_auditorio(id_auditorio , hora_inicio , hora_cierre , id_expositor , nombre_conf , fecha_inicio , fecha_cierre,tipoConferencia) 
            VALUES('$id_auditorio','$hora_inicio','$hora_cierre','$id_expositor','$nombre_conf', '$dia_evento', '$dia_evento','$tipoConferencia') ;";
            
        }

        $res = mysqli_query($con, $query);


        mysqli_free_result($res);
        mysqli_close($con);

        return '0';
    
    }else{

        return '1';
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







}