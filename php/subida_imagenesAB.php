<?php 
error_reporting(E_ERROR | E_PARSE);

function validacion($file,$alturaMax,$anchuraMax) {
    
    $type = $file["type"];

    $tamaño_real = getimagesize($file);
    $ancho_real = $tamaño_real[0];//Ancho
    $alto_real = $tamaño_real[1];//Alto

    if ($type!='image/jpg' && $type!='image/jpeg' && $type!='image/png'){
        return '1';
        ?>
        <script>
            notyf.open({
                type: 'warning',
                message: '<b>¡AVISO!</b> El archivo no es compatible o no es una Imagen.'
            });
        </script>
        <?php
    }else if ($alto_real>$alturaMax || $ancho_real>$anchuraMax){
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
function query_archivo_subido($codigo_pabellon,$nombre_archivo){

    include "../config/config.php";

    $query = "SELECT id_publicidad from publicidad_espacio where id_padre = '$codigo_pabellon' AND nombre_publicidad =  '$nombre_archivo';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $id_publicidad = $array["data"][0]["id_publicidad"];


    $insertarDatos = "UPDATE publicidad_espacio set subido = 1 where id_publicidad = '$id_publicidad';";
    $ejecutarInsertar = mysqli_query($con, $insertarDatos);

    mysqli_free_result($res);
    mysqli_close($con);


}
//banner3x6
if (isset($_FILES["banner3X6_1File"])) {
    $file = $_FILES["banner3X6_1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner3x6'];
    $nombre_archivo = $_REQUEST['banner3X6_1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];


    $alturaMax = 2400;
    $anchuraMax = 1200;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner3X6_2File"])) {
    $file = $_FILES["banner3X6_2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner3x6'];
    $nombre_archivo = $_REQUEST['banner3X6_2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2400;
    $anchuraMax = 1200;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner3X6_3File"])) {
    $file = $_FILES["banner3X6_3File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner3x6'];
    $nombre_archivo = $_REQUEST['banner3X6_3'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2400;
    $anchuraMax = 1200;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner3X6_4File"])) {
    $file = $_FILES["banner3X6_4File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner3x6'];
    $nombre_archivo = $_REQUEST['banner3X6_4'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2400;
    $anchuraMax = 1200;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
//BANNER 25X3
if (isset($_FILES["banner25x3_1File"])) {
    $file = $_FILES["banner25x3_1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_2File"])) {
    $file = $_FILES["banner25x3_2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_3File"])) {
    $file = $_FILES["banner25x3_3File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_3'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_4File"])) {
    $file = $_FILES["banner25x3_4File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_4'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_5File"])) {
    $file = $_FILES["banner25x3_5File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_5'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_6File"])) {
    $file = $_FILES["banner25x3_6File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_6'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_7File"])) {
    $file = $_FILES["banner25x3_7File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_7'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_8File"])) {
    $file = $_FILES["banner25x3_8File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_8'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_9File"])) {
    $file = $_FILES["banner25x3_9File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_9'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_10File"])) {
    $file = $_FILES["banner25x3_10File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_10'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_11File"])) {
    $file = $_FILES["banner25x3_11File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_11'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner25x3_12File"])) {
    $file = $_FILES["banner25x3_12File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner25x3'];
    $nombre_archivo = $_REQUEST['banner25x3_12'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1500;
    $anchuraMax = 1250;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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




//-------
if (isset($_FILES["banner8x4_1File"])) {
    $file = $_FILES["banner8x4_1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner8x4'];
    $nombre_archivo = $_REQUEST['banner8x4_1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1300;
    $anchuraMax = 2600;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner8x4_2File"])) {
    $file = $_FILES["banner8x4_2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner8x4'];
    $nombre_archivo = $_REQUEST['banner8x4_2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1300;
    $anchuraMax = 2600;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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

  

//-------




if (isset($_FILES["banner6x3_1File"])) {
    $file = $_FILES["banner6x3_1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner6x3'];
    $nombre_archivo = $_REQUEST['banner6x3_1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1200;
    $anchuraMax = 2400;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner6x3_2File"])) {
    $file = $_FILES["banner6x3_2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner6x3'];
    $nombre_archivo = $_REQUEST['banner6x3_2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1200;
    $anchuraMax = 2400;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner6x3_3File"])) {
    $file = $_FILES["banner6x3_3File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner6x3'];
    $nombre_archivo = $_REQUEST['banner6x3_3'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1200;
    $anchuraMax = 2400;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["banner6x3_4File"])) {
    $file = $_FILES["banner6x3_4File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_banner6x3'];
    $nombre_archivo = $_REQUEST['banner6x3_4'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1200;
    $anchuraMax = 2400;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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

//Cajas de Luz
if (isset($_FILES["cajaluz_1File"])) {
    $file = $_FILES["cajaluz_1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_cajaluz'];
    $nombre_archivo = $_REQUEST['cajaluz_1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1000;
    $anchuraMax = 2000;

    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["cajaluz_2File"])) {
    $file = $_FILES["cajaluz_2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_cajaluz'];
    $nombre_archivo = $_REQUEST['cajaluz_2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1000;
    $anchuraMax = 2000;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["cajaluz_3File"])) {
    $file = $_FILES["cajaluz_3File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_cajaluz'];
    $nombre_archivo = $_REQUEST['cajaluz_3'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 1000;
    $anchuraMax = 2000;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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

//Plumas
if (isset($_FILES["pluma_1File"])) {
    $file = $_FILES["pluma_1File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_1'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_2File"])) {
    $file = $_FILES["pluma_2File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_2'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_3File"])) {
    $file = $_FILES["pluma_3File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_3'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_4File"])) {
    $file = $_FILES["pluma_4File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_4'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_5File"])) {
    $file = $_FILES["pluma_5File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_5'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_6File"])) {
    $file = $_FILES["pluma_6File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_6'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_7File"])) {
    $file = $_FILES["pluma_7File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_7'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_8File"])) {
    $file = $_FILES["pluma_8File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_8'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_9File"])) {
    $file = $_FILES["pluma_9File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_9'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_10File"])) {
    $file = $_FILES["pluma_10File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_10'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_11File"])) {
    $file = $_FILES["pluma_11File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_11'];

    $src = $ubicacion.$nombre_archivo.".jpg";
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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
if (isset($_FILES["pluma_12File"])) {
    $file = $_FILES["pluma_12File"];
    $ubicacion = $_REQUEST['ubicacion_archivo_plumas'];
    $nombre_archivo = $_REQUEST['pluma_12'];

    $src = $ubicacion.$nombre_archivo.".jpg";    
    $tmp_n = $file["tmp_name"];

    $alturaMax = 2575;
    $anchuraMax = 540;
    
    switch (validacion($file,$alturaMax,$anchuraMax)) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '0':
            @move_uploaded_file($tmp_n, $src);
            $codigo_pabellon = $_REQUEST['id_auditorio_padre'];
            query_archivo_subido($codigo_pabellon,$nombre_archivo);
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