<?php
	$target_path = "carpeta_img/"; //carpeta 
	$peso_archivo = $_FILES['uploadedfile']['size']; //peso archivo subido
	$ruta_temp = $_FILES['uploadedfile']['tmp_name'];

	$id_stand = $_POST['id_stand'];

	//ancho y largo maximo
	$largo_ancho_requerido = $_POST['id_size'];
	//ancho y largo de la imagen cargada
	list($base_img, $altura_img, $tipo, $atributo) = getimagesize("$ruta_temp");
	$largo_ancho = explode("x", $largo_ancho_requerido);
	$base_re = $largo_ancho[0];
	$altura_re = $largo_ancho[1];

	$archivo_re = $_POST['tipo_archivo'];//Tipos de archivo permitido
	$tipo_archivo_img = $_FILES['uploadedfile']['type'];//tipo archivo subido


echo "-------------";
echo $archivo_re;
echo "-------------";
echo $tipo_archivo_img;
echo "-------------";

/*
image/jpeg
image/png
*/


	/*if ($peso_archivo > 14497) {
		echo "El archivo sobrepasa el peso permitido de :";
	}else{*/


	if ($base_img > $base_re OR $altura_img > $altura_re ) {//comparamos que sea del tamaño adecuado
		echo "El tamaño no es el adecuado";
	}else{
		if (strpos($archivo_re, $tipo_archivo_img) != false) {
			$target_path = $target_path.basename( $_FILES['uploadedfile']['name']);
		}else{
			echo "Archivo de tipo no admitivo";
		}
	}

	//confirmamos que sea el formato adeacuado




	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)){
	    echo "El archivo ".  basename( $_FILES['uploadedfile']['name'])." ha sido subido";
	} else{
	    echo "Ha ocurrido un error, trate de nuevo!";
	}
?>

