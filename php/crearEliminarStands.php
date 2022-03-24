<?php


$opc = $_POST['param'];



switch ($opc) {
    
    case 'crearStand':
        crearStand();
        break;
    case 'cambiarTotal':
        cambiarTotal();

}
function cambiarTotal(){
    include("../config/config.php");

    $totales = $_POST["total"];
    $idPabellon = $_POST["idPabellon"];

    $query = "UPDATE pabellon set cantidad_stands = '$totales' where id_pabellon = '$idPabellon' ;";
    $res = mysqli_query($con, $query);

    mysqli_free_result($res);
    mysqli_close($con);
}

function crearStand(){
    include("../config/config.php");

    $nuevos = $_POST["numero"];
    $idPabellon = $_POST["idPabellon"];
    $tipoStand = $_POST["tipoStand"];

    $query ="SELECT count(*) as existentes from stand_evento where type_stand = '$tipoStand' and id_pabellon = '$idPabellon';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    $existentes = $array["data"][0]["existentes"];
    $array = null;
    
    $query ="SELECT codigo_pabellon,id_evento,direccion_padre FROM pabellon where id_pabellon = '$idPabellon';";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    $codigo_pabellon = $array["data"][0]["codigo_pabellon"];
    $idDelEvento = $array["data"][0]["id_evento"];
    $direccion_padre = $array["data"][0]["direccion_padre"];


    if($tipoStand == 'Full Access'){
        crearFullAccess($nuevos,$existentes,$idPabellon,$codigo_pabellon,$idDelEvento,$direccion_padre);
    }elseif($tipoStand == 'Central'){
        crearCentral($nuevos,$existentes,$idPabellon,$codigo_pabellon,$idDelEvento,$direccion_padre);
    }elseif ($tipoStand == 'Corner M') {
        crearCorner($nuevos,$existentes,$idPabellon,$codigo_pabellon,$idDelEvento,$direccion_padre);
    }
    mysqli_free_result($res);
    mysqli_close($con);
}


function crearFullAccess($nuevos,$existentes,$id_pabellon,$codigo_pabellon,$idDelEvento,$direccion_padre){
    include("../config/config.php");

    $id_exhibitor3 = 0;

    for ($i = intval($existentes)+1 ; $i < intval($nuevos)+intval($existentes)+1 ; $i++) {
            

        $codigo_stand = $codigo_pabellon."FA".$i;

        $insertarDatos = "INSERT INTO stand_evento(id_exhibitor3 , type_stand , status , name_stand , codigo_stand, id_pabellon,id_evento) VALUES('$id_exhibitor3','Full Access','Sin Asignar','Sin nombre asignado','$codigo_stand','$id_pabellon','$idDelEvento');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    
        $folder = "$direccion_padre/$codigo_pabellon/STANDS/$codigo_stand";
        mkdir("$folder", 0777); 
    //-------------------------PUBLICIDAD STAND
        $ubicacion_archivo = "$direccion_padre/$codigo_pabellon/STANDS/$codigo_stand/";
        $subido = 0;
    
    //4 UNIDADES DE LOGOS
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Logo','1980x900','image/jpg.image/png.image/jpeg','$ubicacion_archivo','logo_unid1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Logo','1980x900','image/jpg.image/png.image/jpeg','$ubicacion_archivo','logo_unid2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Logo','1980x900','image/jpg.image/png.image/jpeg','$ubicacion_archivo','logo_unid3','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Logo','1980x900','image/jpg.image/png.image/jpeg','$ubicacion_archivo','logo_unid4','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    //2 UNIDADES DE BANNER 1
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Banner 1','1700x2000','image/jpg.image/png.image/jpeg','$ubicacion_archivo','banner1_unid1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Banner 1','1700x2000','image/jpg.image/png.image/jpeg','$ubicacion_archivo','banner1_unid2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    //2 UNIDADES DE BANNER 2
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Banner 2','1700x2000','image/jpg.image/png.image/jpeg','$ubicacion_archivo','banner2_unid1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Banner 2','1700x2000','image/jpg.image/png.image/jpeg','$ubicacion_archivo','banner2_unid2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    //videos en pantalla
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Video en Patalla','1920x1080','video/mp4','$ubicacion_archivo','videoPantalla1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Video en Patalla','1920x1080','video/mp4','$ubicacion_archivo','videoPantalla2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    //IMG IPAD
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Ipad','1390x1854','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgIpad','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    //folletos
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Folleto','920x1400-1400x920','image/jpg.image/png.image/jpeg','$ubicacion_archivo','folleto1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Folleto','920x1400-1400x920','image/jpg.image/png.image/jpeg','$ubicacion_archivo','folleto2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Folleto','920x1400-1400x920','image/jpg.image/png.image/jpeg','$ubicacion_archivo','folleto3','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    //pdf's
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido, formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Archivo PDF','application/pdf','$ubicacion_archivo','pdf_1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
       $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido, formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Archivo PDF','application/pdf','$ubicacion_archivo','pdf_2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
       $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido, formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Archivo PDF','application/pdf','$ubicacion_archivo','pdf_3','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    
    //2 caras PORTADA GALERÍA
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Portada Galería','1500x1800','image/jpg.image/png.image/jpeg','$ubicacion_archivo','portadaGaleria_cara1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Portada Galería','1500x1800','image/jpg.image/png.image/jpeg','$ubicacion_archivo','portadaGaleria_cara2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    //12 IMAGENES
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 1','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria1','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 2','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria2','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 3','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria3','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 4','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria4','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 5','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria5','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 6','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria6','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 7','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria7','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 8','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria8','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 9','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria9','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 10','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria10','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 11','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria11','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 12','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria12','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        if(!$ejecutarInsertar){
            echo("Error En la linea de sql".$codigo_stand);
        }       
    }



    mysqli_free_result($ejecutarInsertar);
    mysqli_close($con);
}
function crearCentral($nuevos,$existentes,$id_pabellon,$codigo_pabellon,$idDelEvento,$direccion_padre){
    include("../config/config.php");

    $id_exhibitor3 = 0;

    for ($i = intval($existentes)+1 ; $i < intval($nuevos)+intval($existentes)+1 ; $i++) {
                

        $codigo_stand = $codigo_pabellon."CC".$i;
    
        $insertarDatos = "INSERT INTO stand_evento(id_exhibitor3 , type_stand , status , name_stand , codigo_stand, id_pabellon,id_evento) VALUES('$id_exhibitor3' ,'Central' , 'Sin Asignar','Sin nombre asignado','$codigo_stand','$id_pabellon','$idDelEvento');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);  
    
        $folder = "$direccion_padre/$codigo_pabellon/STANDS/$codigo_stand";
        mkdir("$folder", 0777); 
    //-------------------------PUBLICIDAD STAND
        $ubicacion_archivo = "$direccion_padre/$codigo_pabellon/STANDS/$codigo_stand/";
        $subido = 0;
    
    
        // LOGO
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Logo','1980x900','image/jpg.image/png.image/jpeg','$ubicacion_archivo','logo','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
        //BANNER1
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Banner 1','1900x2000','image/jpg.image/png.image/jpeg','$ubicacion_archivo','banner1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    
        //BANNER2
    
    
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Banner 2','950x2000','image/jpg.image/png.image/jpeg','$ubicacion_archivo','banner2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        //Video
    
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Video en Patalla','1920x1080','video/mp4','$ubicacion_archivo','videoPantalla','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    //ipad
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Ipad','1390x1854','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgIpad','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    //folletos
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Folleto','920x1400-1400x920','image/jpg.image/png.image/jpeg','$ubicacion_archivo','folleto1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Folleto','920x1400-1400x920','image/jpg.image/png.image/jpeg','$ubicacion_archivo','folleto2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Folleto','920x1400-1400x920','image/jpg.image/png.image/jpeg','$ubicacion_archivo','folleto3','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    //pdf's
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido, formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Archivo PDF','application/pdf','$ubicacion_archivo','pdf_1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
       $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido, formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Archivo PDF','application/pdf','$ubicacion_archivo','pdf_2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
       $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido, formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Archivo PDF','application/pdf','$ubicacion_archivo','pdf_3','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
        //PORTADA GALERÍA
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Portada Galería','1700x1800','image/jpg.image/png.image/jpeg','$ubicacion_archivo','portadaGaleria','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
        //12 IMAGENES GALERÍA
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 1','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria1','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 2','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria2','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 3','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria3','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 4','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria4','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 5','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria5','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 6','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria6','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 7','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria7','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 8','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria8','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 9','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria9','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    
        if(!$ejecutarInsertar){
            echo("Error En la linea de sql".$codigo_stand);
        }
    
    }

    mysqli_free_result($ejecutarInsertar);
    mysqli_close($con);   
}
function crearCorner($nuevos,$existentes,$id_pabellon,$codigo_pabellon,$idDelEvento,$direccion_padre){
    include("../config/config.php");

    $id_exhibitor3 = 0;

    for ($i = intval($existentes)+1 ; $i < intval($nuevos)+intval($existentes)+1 ; $i++) {

        $codigo_stand = $codigo_pabellon."CM".$i;

        $insertarDatos = "INSERT INTO stand_evento(id_exhibitor3 , type_stand , status , name_stand , codigo_stand, id_pabellon,id_evento) VALUES('$id_exhibitor3','Corner M','Sin Asignar','Sin nombre asignado','$codigo_stand','$id_pabellon','$idDelEvento');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $folder = "$direccion_padre/$codigo_pabellon/STANDS/$codigo_stand";
        mkdir("$folder", 0777); 
    //-------------------------PUBLICIDAD STAND
        $ubicacion_archivo = "$direccion_padre/$codigo_pabellon/STANDS/$codigo_stand/";
        $subido = 0;
    
    //Logo
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Logo','1980x900','image/jpg.image/png.image/jpeg','$ubicacion_archivo','logo','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    //banner1
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Banner 1','1900x2000','image/jpg.image/png.image/jpeg','$ubicacion_archivo','banner1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    //banner 2
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Banner 2','1900x2000','image/jpg.image/png.image/jpeg','$ubicacion_archivo','banner2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    //video
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Video en Patalla','1920x1080','video/mp4','$ubicacion_archivo','videoPantalla','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    //ipad
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Ipad','1390x1854','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgIpad','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    //folletos
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Folleto','920x1400-1400x920','image/jpg.image/png.image/jpeg','$ubicacion_archivo','folleto1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Folleto','920x1400-1400x920','image/jpg.image/png.image/jpeg','$ubicacion_archivo','folleto2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    //pdf's
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido, formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Archivo PDF','application/pdf','$ubicacion_archivo','pdf_1','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
       $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido, formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Archivo PDF','application/pdf','$ubicacion_archivo','pdf_2','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    //portada
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Portada Galería','1700x1800','image/jpg.image/png.image/jpeg','$ubicacion_archivo','portadaGaleria','$subido');";
    
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    
        //12 IMAGENES GALERÍA
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 1','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria1','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 2','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria2','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 3','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria3','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 4','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria4','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 5','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria5','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 6','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria6','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 7','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria7','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 8','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria8','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
        $insertarDatos = "INSERT INTO contenidos_stand(codigo_stand , tipo_contenido , dimensiones_max , formato, ubicacion_archivo,nombre_archivo,subido) VALUES('$codigo_stand','Imagen Galeria 9','1920x1080','image/jpg.image/png.image/jpeg','$ubicacion_archivo','imgGaleria9','$subido');";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);
    
    
    
        if(!$ejecutarInsertar){
            echo("Error En la linea de sql".$codigo_stand);
        }   
    }
    
    mysqli_free_result($ejecutarInsertar);
    mysqli_close($con);
}

?>