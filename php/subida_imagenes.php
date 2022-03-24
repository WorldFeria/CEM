<?php
error_reporting(E_ERROR | E_PARSE);


define('MB', 1048576);

function validacion_video($file,$alturaMax,$anchuraMax,$size){
    $type = $file["type"];

    $tamaño_real = getimagesize($file);
    $ancho_real = $tamaño_real[0];//Ancho
    $alto_real = $tamaño_real[1];//Alto

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

        
    }else if ( $alto_real > $alturaMax || $ancho_real > $anchuraMax){
        return '3';
        ?>
        <script>
            notyf.open({
                type: 'warning',
                message: '<b>¡AVISO!</b> Las dimensiones de la imagen son demasiado grandes. El tamaño máximo es <?php echo $alturaMax; ?> por <?php echo $anchuraMax; ?> píxeles. La imagen cargada es <?php echo $alto_real; ?> por <?php echo $ancho_real; ?> píxeles.'
            });
        </script>
        <?php  
    }else{
        return '0';
    }    
}

function validacion_pdf($file,$size){

    $type = $file["type"];

    if ($type != 'application/pdf'){
        return '1';
        ?>
        <script>
            notyf.open({
                type: 'warning',
                message: '<b>¡AVISO!</b> El archivo no es compatible o no es una Imagen.'
            });
        </script>
        <?php

    }else if ($size > 30*MB){
        return '2';
        ?>
        <script>
            notyf.open({
                type: 'warning',
                message: '<b>¡AVISO!</b> El peso del archivo es demasiado grande. El tamaño máximo es de 30 MB. y el archivo cargado es de <?php echo $size; ?> MB.'
            });
        </script>
        <?php           
    }else{
        return '0';
    }

}

function validacion($file,$alturaMax,$anchuraMax){

    $type = $file["type"];

    $tamaño_real = getimagesize($file);
    $ancho_real = $tamaño_real[0];//Ancho
    $alto_real = $tamaño_real[1];//Alto

    if ($type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png'){
        return '1';
        ?>
        <script>
            notyf.open({
                type: 'warning',
                message: '<b>¡AVISO!</b> El archivo no es compatible o no es una Imagen.'
            });
        </script>
        <?php
    }else if ( $alto_real > $alturaMax || $ancho_real > $anchuraMax){
        return '2';
        ?>
        <script>
            notyf.open({
                type: 'warning',
                message: '<b>¡AVISO!</b> Las dimensiones de la imagen son demasiado grandes. El tamaño máximo es <?php echo $alturaMax; ?> por <?php echo $anchuraMax; ?> píxeles. La imagen cargada es <?php echo $alto_real; ?> por <?php echo $ancho_real; ?> píxeles.'
            });
        </script>
        <?php        
    }else{
        return '0';
    }

}
function query_archivo_subido($codigo_del_stand,$nombre_archivo){

	include "../config/config.php";

    $query = "SELECT id_contenido from contenidos_stand where codigo_stand = '$codigo_del_stand' AND nombre_archivo =  '$nombre_archivo';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
	$id_contenido = $array["data"][0]["id_contenido"];


    $insertarDatos = "UPDATE contenidos_stand set subido = 1 where id_contenido = '$id_contenido';";
	$ejecutarInsertar = mysqli_query($con, $insertarDatos);

	mysqli_free_result($res);
	mysqli_close($con);


}

//Logo 1
if (isset($_FILES["logo1File"])) {
    $file = $_FILES["logo1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner1_logo'];

    $nombre_archivo = $_REQUEST['nombre_logo1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 900;
    $anchuraMax = 1980;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':

            break;
        case '2':

            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}


//Logo 2
if (isset($_FILES["logo2File"])) {
    $file = $_FILES["logo2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner1_logo'];

    $nombre_archivo = $_REQUEST['nombre_logo2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 900;
    $anchuraMax = 1980;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//Logo 3
if (isset($_FILES["logo3File"])) {
    $file = $_FILES["logo3File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner1_logo'];

    $nombre_archivo = $_REQUEST['nombre_logo3'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 900;
    $anchuraMax = 1980;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//Logo 4
if (isset($_FILES["logo4File"])) {
    $file = $_FILES["logo4File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner1_logo'];

    $nombre_archivo = $_REQUEST['nombre_logo4'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 900;
    $anchuraMax = 1980;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}

//Banner 1 unid 1
if (isset($_FILES["banner1Unid1File"])) {
    $file = $_FILES["banner1Unid1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner1'];

    $nombre_archivo = $_REQUEST['nombre_banner1Unid1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2000;
    $anchuraMax = 1700;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}

//Banner 1 unid 2
if (isset($_FILES["banner1Unid2File"])) {
    $file = $_FILES["banner1Unid2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner1'];

    $nombre_archivo = $_REQUEST['nombre_banner1Unid2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2000;
    $anchuraMax = 1700;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}



//Banner 2 unid 1
if (isset($_FILES["banner2Unid1File"])) {
    $file = $_FILES["banner2Unid1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner1_banner2'];

    $nombre_archivo = $_REQUEST['nombre_banner2_1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2000;
    $anchuraMax = 1700;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//Banner 2 unid 2

if (isset($_FILES["banner2Unid2File"])) {
    $file = $_FILES["banner2Unid2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner1_banner2'];

    $nombre_archivo = $_REQUEST['nombre_banner2_2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2000;
    $anchuraMax = 1700;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}

//portada1

if (isset($_FILES["portadaCara1File"])) {
    $file = $_FILES["portadaCara1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_portada'];

    $nombre_archivo = $_REQUEST['nombre_portada1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1800;
    $anchuraMax = 1500;


    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}


//portada2
if (isset($_FILES["portadaCara2File"])) {
    $file = $_FILES["portadaCara2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_portada'];

    $nombre_archivo = $_REQUEST['nombre_portada2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1800;
    $anchuraMax = 1500;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//video
if (isset($_FILES["videoPantallaFile1"])) {
    $file = $_FILES["videoPantallaFile1"];
    $ubicacion = $_REQUEST['videoPantallavideoPantalla'];

    $nombre_archivo = $_REQUEST['nombre_archivo_video1'];

    $src = $ubicacion.$nombre_archivo.".mp4";
    $tmp_n = $file["tmp_name"];


    $alturaMax = 1080;
    $anchuraMax = 1920;

    $size = $file["size"];

    switch (validacion_video($file,$alturaMax,$anchuraMax,$size)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '3':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//video
if (isset($_FILES["videoPantallaFile2"])) {
    $file = $_FILES["videoPantallaFile2"];
    $ubicacion = $_REQUEST['videoPantallavideoPantalla'];

    $nombre_archivo = $_REQUEST['nombre_archivo_video2'];

    $src = $ubicacion.$nombre_archivo.".mp4";
    $tmp_n = $file["tmp_name"];


    $alturaMax = 1080;
    $anchuraMax = 1920;

    $size = $file["size"];

    switch (validacion_video($file,$alturaMax,$anchuraMax,$size)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '3':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}

//IPAD
if (isset($_FILES["imgIpadFile"])) {
    $file = $_FILES["imgIpadFile"];
    $ubicacion = $_REQUEST['ubicacion_archivo_Ipad'];

    $nombre_archivo = $_REQUEST['nombre_archivo_Ipad'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 900;
    $anchuraMax = 1980;//pueden ser volveados

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//FOLLETO 1

if (isset($_FILES["folleto_visual_1"])) {
    $file = $_FILES["folleto_visual_1"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];

    $nombre_archivo = $_REQUEST['nombre_folleto1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1400;
    $anchuraMax = 920;//pueden ser volveados


    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//FOLLETO 2

if (isset($_FILES["folleto_visual_2"])) {
    $file = $_FILES["folleto_visual_2"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];

    $nombre_archivo = $_REQUEST['nombre_folleto2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1400;//pueden ser volveados
    $anchuraMax = 920;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//FOLLETO 3

if (isset($_FILES["folleto_visual_3"])) {
    $file = $_FILES["folleto_visual_3"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];

    $nombre_archivo = $_REQUEST['nombre_folleto3'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1400;
    $anchuraMax = 920;//pueden ser volveados

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//PDF

if (isset($_FILES["pdf_1"])) {
    $file = $_FILES["pdf_1"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];

    $nombre_archivo = $_REQUEST['nombre_pdf_1'];

    $src = $ubicacion.$nombre_archivo.".pdf";
    $tmp_n = $file["tmp_name"];

    $size = $file["size"];

    switch (validacion_pdf($file,$size)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
if (isset($_FILES["pdf_2"])) {
    $file = $_FILES["pdf_2"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];

    $nombre_archivo = $_REQUEST['nombre_pdf_2'];

    $src = $ubicacion.$nombre_archivo.".pdf";
    $tmp_n = $file["tmp_name"];

    $size = $file["size"];

    switch (validacion_pdf($file,$size)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
if (isset($_FILES["pdf_3"])) {
    $file = $_FILES["pdf_3"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];

    $nombre_archivo = $_REQUEST['nombre_pdf_3'];

    $src = $ubicacion.$nombre_archivo.".pdf";
    $tmp_n = $file["tmp_name"];

    $size = $file["size"];

    switch (validacion_pdf($file,$size)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//12 IMAGENES
//IMGEN1
if (isset($_FILES["nombre_archivoimg1File"])) {
    $file = $_FILES["nombre_archivoimg1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN2
if (isset($_FILES["nombre_archivoimg2File"])) {
    $file = $_FILES["nombre_archivoimg2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN3
if (isset($_FILES["nombre_archivoimg3File"])) {
    $file = $_FILES["nombre_archivoimg3File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg3'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN4
if (isset($_FILES["nombre_archivoimg4File"])) {
    $file = $_FILES["nombre_archivoimg4File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg4'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN5
if (isset($_FILES["nombre_archivoimg5File"])) {
    $file = $_FILES["nombre_archivoimg5File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg5'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN6
if (isset($_FILES["nombre_archivoimg6File"])) {
    $file = $_FILES["nombre_archivoimg6File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg6'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN7
if (isset($_FILES["nombre_archivoimg7File"])) {
    $file = $_FILES["nombre_archivoimg7File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg7'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN8
if (isset($_FILES["nombre_archivoimg8File"])) {
    $file = $_FILES["nombre_archivoimg8File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg8'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN9
if (isset($_FILES["nombre_archivoimg9File"])) {
    $file = $_FILES["nombre_archivoimg9File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg9'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN10
if (isset($_FILES["nombre_archivoimg10File"])) {
    $file = $_FILES["nombre_archivoimg10File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg10'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN11
if (isset($_FILES["nombre_archivoimg11File"])) {
    $file = $_FILES["nombre_archivoimg11File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg11'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php
            break;
    }
}
//IMGEN12
if (isset($_FILES["nombre_archivoimg12File"])) {
    $file = $_FILES["nombre_archivoimg12File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_imgs_g'];

    $nombre_archivo = $_REQUEST['nombre_archivoimg12'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1920;
    $anchuraMax = 1080;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
    		$codigo_del_stand = $_REQUEST['codigo_del_stand'];
            query_archivo_subido($codigo_del_stand,$nombre_archivo);
            ?>
            <script>
                notyf.open({
                    type: 'success',
                    message: '<b>¡HECHO!</b> <?php echo $nombre_archivo; ?> subido exitosamente.'
                });
            </script>
            <?php            
            break;
    }
}


?>