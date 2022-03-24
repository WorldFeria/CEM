<?php
include("../config/config.php");

$nombre_evento = $_POST["nombre_evento"];
$tipo_evento = $_POST["tipo_evento"];
$cantidad_pabellones = $_POST["cantidad_pabellones"];
$lobby = $_POST["lobby"];
$cantidad_auditorios = $_POST["cantidad_auditorios"];
$landing_page = $_POST["landing_page"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_cierre = $_POST["fecha_cierre"];
$descripcion_evento = $_POST["descripcion_evento"];
$cantidad_registros = $_POST["cantidad_registros"];
$link_evento = $_POST["link_evento"];
$link_vr = $_POST["link_vr"];

$clase_evento = $_POST["clase_evento"];
$n_registros = $_POST["n_registros"];

$hora_inicio = $_POST["hora_inicio"];
$hora_ciere = $_POST["hora_ciere"];

$insertarDatos = "INSERT INTO evento(nombre_evento,tipo_evento,descripcion_evento,cantidad_pabellones,loby,landing_page,fecha_inicio,fecha_cierre,cantidad_auditorios,cantidad_registros,link_evento,link_vr,nombre_logo,is_available,n_registros,clase_evento,horario_inicio,horario_cierre) VALUES('$nombre_evento','$tipo_evento','$descripcion_evento','$cantidad_pabellones','$lobby','$landing_page','$fecha_inicio','$fecha_cierre', '$cantidad_auditorios', '$cantidad_registros', '$link_evento', '$link_vr','logo1','0','$n_registros','$clase_evento','$hora_inicio','$hora_ciere');";
$ejecutarInsertar = mysqli_query($con, $insertarDatos);

//Obtener ID
$query = "SELECT id_evento from evento where nombre_evento = '$nombre_evento' ;";
$insertarDatos = mysqli_query($con, $query);
while ($data = mysqli_fetch_assoc($insertarDatos)) {
    $array["data"][] = $data;
}
$id_evento = $array["data"][0]["id_evento"];

//Carpetas
$nombre_carpeta_evento = str_replace(" ", "_", $nombre_evento);
$folder = "../imagenes_diseño/$nombre_carpeta_evento";
mkdir("$folder", 0777);

for ($i = intval($cantidad_pabellones); $i > 0; $i--) {
    $insertarDatos = "INSERT INTO pabellon(id_evento , nombre_pabellon , codigo_pabellon , descripcion_pabellon ,cantidad_stands,direccion_padre,controlador) VALUES('$id_evento','Sin nombre','Sin codigo','Sin descripción',0,'../imagenes_diseño/$nombre_carpeta_evento','$nombre_evento');";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);
}
for ($i = intval($cantidad_auditorios); $i > 0; $i--) {
    $insertarDatos = "INSERT INTO auditorio(id_evento , nombre_auditorio , codigo_auditorio , descripcion_auditorio,direccion_padre,controlador) VALUES('$id_evento','Sin nombre','Sin codigo','Sin descripción','../imagenes_diseño/$nombre_carpeta_evento','$nombre_evento');";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);
}
if (intval($lobby) == 1) {
    $controlador = $nombre_evento . 'LO' . $i;
    $insertarDatos = "INSERT INTO lobby(id_evento , nombre_lobby , codigo_lobby, descripcion_lobby,direccion_padre,controlador) VALUES('$id_evento','Sin nombre','Sin codigo','Sin descripción','../imagenes_diseño/$nombre_carpeta_evento','$nombre_evento');";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);
}
if (!$ejecutarInsertar) {
    echo ("Error En la linea de sql");
}

mysqli_free_result($ejecutarInsertar);
mysqli_close($con);