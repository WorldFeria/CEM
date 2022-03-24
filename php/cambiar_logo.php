<?php  



if (isset($_FILES["imagen_logo"])) {

include("../config/config.php");
	
	$id_evento = $_REQUEST['id_evento'];

    $file = $_FILES["imagen_logo"];
    $tmp_n = $file["tmp_name"];

    $ubicacion = $_REQUEST['direccion_logo'];
    $nombre_logo = $_REQUEST['nombre_logo'];



	if (file_exists($ubicacion)) {
		if (unlink($ubicacion.$nombre_logo.".png")) {
			
			$numero_logo = substr($nombre_logo, 4);
			$numero_logo += 1;

			$name_img = "logo".$numero_logo;

			//obtenemnos el número le aumentamos uno y lo creamos, luego cambios el nombre en la base

   			@move_uploaded_file($tmp_n, $ubicacion.$name_img.".png");

    		$insertarDatos = "UPDATE evento set nombre_logo = '$name_img' where id_evento = '$id_evento';";

    		$ejecutarInsertar = mysqli_query($con, $insertarDatos);

   		}
   	}else{
   		//primera_vez o eliminaron el archivo

   		@move_uploaded_file($tmp_n, $ubicacion."logo1.png");

    		$insertarDatos = "UPDATE evento set nombre_logo = 'logo1' where id_evento = '$id_evento';";

    		$ejecutarInsertar = mysqli_query($con, $insertarDatos);

   	}

}

?>