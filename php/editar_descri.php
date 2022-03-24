<?php
include("../config/config.php");

$id_evento = $_POST["id_evento"];
$tipo_evento = $_POST["tipo_evento"];
$descripcion_evento = $_POST["descripcion_evento"];
$link_evento = $_POST["link_evento"];
$link_vr = $_POST["link_vr"];

$insertarDatos = "UPDATE evento SET tipo_evento='$tipo_evento', descripcion_evento='$descripcion_evento', link_evento='$link_evento', link_vr='$link_vr' WHERE id_evento='$id_evento';";
$ejecutarInsertar = mysqli_query($con, $insertarDatos);

mysqli_free_result($ejecutarInsertar);
mysqli_close($con);