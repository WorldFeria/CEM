<?php
$opc = $_POST['param'];

switch ($opc) {
    case 'borrar_imagen':
        borrar_imagen();
    break;
    case 'borrar_video':
    	borrar_video();
    break;
    case 'borrar_pdf':
        borrar_pdf();
    break;
    case 'borrar_imagen_espacio':
        borrar_imagen_espacio();
    break;
}

function query_archivo_borrado($direccion_guardado,$nombre_archivo){
    include "../config/config.php";

    $porciones = explode("/", $direccion_guardado);
    $codigo_del_stand = $porciones[sizeof($porciones)-2]; // porción1
    $nombre_archivo =  substr($nombre_archivo, 0, -4);

    $query = "SELECT id_contenido from contenidos_stand WHERE codigo_stand='$codigo_del_stand' AND nombre_archivo='$nombre_archivo';";
    $res = mysqli_query($con, $query);
    $array = null;
    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    $id_contenido = $array["data"][0]["id_contenido"];

    $insertarDatos = "UPDATE contenidos_stand set subido=0 WHERE id_contenido='$id_contenido';";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);

    mysqli_free_result($res);
    mysqli_close($con);
}

function query_archivo_borrado_espacio($nombre_archivo){
    include "../config/config.php";

    $nombre_archivo =  substr($nombre_archivo, 0, -4);

    $query = "SELECT id_publicidad FROM publicidad_espacio WHERE nombre_publicidad='$nombre_archivo';";
    $res = mysqli_query($con, $query);
    $array = null;
    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $id_publicidad = $array["data"][0]["id_publicidad"];

    $insertarDatos = "UPDATE publicidad_espacio set subido=0 WHERE id_publicidad='$id_publicidad';";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);

    mysqli_free_result($res);
    mysqli_close($con);
}

function borrar_imagen_espacio(){
    $direccion_guardado = $_POST["direccion_guardado"];
    $nombre_archivo = $_POST["nombre_archivo"];

    if (unlink($direccion_guardado.$nombre_archivo)) {
        query_archivo_borrado_espacio($nombre_archivo);
    } else {

    }
}

function borrar_imagen(){
    $direccion_guardado = $_POST["direccion_guardado"];
    $nombre_archivo = $_POST["nombre_archivo"];

    if (unlink($direccion_guardado.$nombre_archivo)) {
        query_archivo_borrado($direccion_guardado,$nombre_archivo);
    } else {

    }
}

function borrar_pdf(){
    $direccion_guardado = $_POST["direccion_guardado"];
    $nombre_archivo = $_POST["nombre_archivo"];

    if (unlink($direccion_guardado.$nombre_archivo)) {
        query_archivo_borrado($direccion_guardado,$nombre_archivo);
    } else {

    }
}

function borrar_video(){
    $direccion_guardado = $_POST["direccion_guardado"];
    $nombre_archivo = $_POST["nombre_archivo"];

    if (unlink($direccion_guardado.$nombre_archivo)) {
        query_archivo_borrado($direccion_guardado,$nombre_archivo);
    } else {

    }
}
