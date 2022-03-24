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


//FOLLETO 1

if (isset($_FILES["folleto_visual_1"])) {
    $file = $_FILES["folleto_visual_1"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];

    
    $nombre_archivo = $_REQUEST['nombre_caratula1'];

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

    
    $nombre_archivo = $_REQUEST['nombre_caratula2'];

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


if (isset($_FILES["videoPantallaFile"])) {
    $file = $_FILES["videoPantallaFile"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];

    $nombre_archivo = $_REQUEST['nombre_archivo_video'];

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


//general
if (isset($_FILES["fileimg_general"])) {
    $file = $_FILES["fileimg_general"];
    $ubicacion = $_REQUEST['ubicacion_archivo'];
    $nombre_archivo = $_REQUEST['nombre_archivo'];
    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $dimensiones_max_var = $_REQUEST['dimensiones_max'];

    $porciones = explode("x", $dimensiones_max_var);

    $alturaMax = $porciones[0];
    $anchuraMax = $porciones[1];

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
//Galeria img 1
if (isset($_FILES["imgGaleria1"])) {
    $file = $_FILES["imgGaleria1"];
    $ubicacion = $_REQUEST['ubicacion_archivo_img'];


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
//Galeria img 2
if (isset($_FILES["imgGaleria2"])) {
    $file = $_FILES["imgGaleria2"];
    $ubicacion = $_REQUEST['ubicacion_archivo_img'];

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
//Galeria img 3
if (isset($_FILES["imgGaleria3"])) {
    $file = $_FILES["imgGaleria3"];
    $ubicacion = $_REQUEST['ubicacion_archivo_img'];

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
//Galeria img 4
if (isset($_FILES["imgGaleria4"])) {
    $file = $_FILES["imgGaleria4"];
    $ubicacion = $_REQUEST['ubicacion_archivo_img'];

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
//Galeria img 5
if (isset($_FILES["imgGaleria5"])) {
    $file = $_FILES["imgGaleria5"];
    $ubicacion = $_REQUEST['ubicacion_archivo_img'];

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
//Galeria img 6
if (isset($_FILES["imgGaleria6"])) {
    $file = $_FILES["imgGaleria6"];
    $ubicacion = $_REQUEST['ubicacion_archivo_img'];

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
//Galeria img 7
if (isset($_FILES["imgGaleria7"])) {
    $file = $_FILES["imgGaleria7"];
    $ubicacion = $_REQUEST['ubicacion_archivo_img'];

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



?>