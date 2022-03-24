
<?php


$opc = $_POST['param'];



switch ($opc) {
    
    case 'pabellon':
        getPabellon();
        break;
    case 'editar_datos_pabellon':
        editar_datosPB();
        break;
    case 'editarDatosLobby':
        editar_datosLobby();
        break;
    case 'editarDatosAuditorio':
        editar_datosAuditorio();
        break;
    case 'lobby':
        getLobby();
        break;
    case 'auditorio':
        getAuditorio();
        break;
    case 'datos':
        rellenarDatos();
        break;
    case 'soloEditarLobby':
        soloEditarLobby();
        break;
    case 'soloEditarAuditorio':
        soloEditarAuditorio();
        break;

}

function getPabellon(){
    $id_evento_padre = $_POST['id_current_event'];
    include("../config/config.php");

    $query = "SELECT id_pabellon,nombre_pabellon,codigo_pabellon, descripcion_pabellon, cantidad_stands from pabellon where id_evento = $id_evento_padre;";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);

}



function getLobby(){
    $id_evento_padre = $_POST['id_current_event'];
    include("../config/config.php");

    $query = "SELECT id_lobby,nombre_lobby,codigo_lobby, descripcion_lobby from lobby where id_evento = $id_evento_padre;";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);

}

function getAuditorio(){

    $id_evento_padre = $_POST['id_current_event'];
    
    include("../config/config.php");

    $query = "SELECT id_auditorio,nombre_auditorio,codigo_auditorio,descripcion_auditorio from auditorio where id_evento = $id_evento_padre;";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);

}

function editar_datosPB(){
    
    include("../config/config.php");

        $id_exhibitor3 = 0;
        
        $id_pabellon = $_POST["id_pabellon"];

        $nombre_pabellon = $_POST["nombre_pabellon"];
        $codigo_pabellon = $_POST["codigo_pabellon"];
        $descripcion_pabellon = $_POST["descripcion_pabellon"];
        $stand_SFA = $_POST["stand_SFA"];
        $stand_SC = $_POST["stand_SC"];
        $stand_SCM = $_POST["stand_SCM"];
        //$stand_SS = $_POST["stand_SS"];
        $cantidad_stands = $stand_SFA + $stand_SC + $stand_SCM ;
        $idDelEvento = $_POST["idDelEvento"];


        $insertarDatos = "UPDATE pabellon set nombre_pabellon = '$nombre_pabellon',codigo_pabellon = '$codigo_pabellon', descripcion_pabellon = '$descripcion_pabellon', cantidad_stands = '$cantidad_stands' where id_pabellon = '$id_pabellon';";
        $ejecutarInsertar = mysqli_query($con, $insertarDatos);


        //OBTENEMOS LA DIRECCIÓN DEL EVENTO PARA CREAR LA CARPETA CORRESPONDIENTE
    
        $query = "SELECT direccion_padre from pabellon where id_pabellon = '$id_pabellon';";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {

            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $direccion_padre = $array["data"][0]["direccion_padre"];

        //creamos la carpeta
        $folder = "$direccion_padre/$codigo_pabellon";
        mkdir("$folder", 0777);
        $folder = "$direccion_padre/$codigo_pabellon/PIEZAS_PUBLICITARIAS";
        mkdir("$folder", 0777);
        $folder = "$direccion_padre/$codigo_pabellon/STANDS";
        mkdir("$folder", 0777);


//-----------------------PUBLICIDADA BABELLÓN PERCÉ


        if ($codigo_pabellon == 'PI') {

            $direccion_guardar = "$direccion_padre/PI/PIEZAS_PUBLICITARIAS/";


            for ($i=1; $i < 3; $i++) { 

            
                $nombre_publicidad = "PI3X6_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER VERTICAL 3X6','1700x2000','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }

            for ($i=1; $i < 5; $i++) { 

            
                $nombre_publicidad = "PI2.5X3_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER VERTICAL 2.5X3','1920x1080','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }


            for ($i=1; $i < 3; $i++) { 

                $nombre_publicidad = "PI8X4_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER HORIZONTAL 8x4','1390x1854','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 6; $i++) { 

                $nombre_publicidad = "PI6X3_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER HORIZONTAL 6X3','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);

            }
            for ($i=1; $i < 3; $i++) { 

                $nombre_publicidad = "PICL".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato ,nombre_publicidad, direccion_guardar) VALUES('$id_pabellon','CAJA DE LUZ','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 13; $i++) { 

                $nombre_publicidad = "PIPL".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato , nombre_publicidad, direccion_guardar) VALUES('$id_pabellon','PLUMAS','1400x920', 'image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }



        }if($codigo_pabellon == 'PN'){

            $direccion_guardar = "$direccion_padre/PN/PIEZAS_PUBLICITARIAS/";

            for ($i=1; $i < 3; $i++) { 

            
                $nombre_publicidad = "PN3X6_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER VERTICAL 3X6','1700x2000','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }

            for ($i=1; $i < 3; $i++) { 

            
                $nombre_publicidad = "PN2.5X3_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER VERTICAL 2.5X3','1920x1080','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }


            for ($i=1; $i < 7; $i++) { 

                $nombre_publicidad = "PN8X4_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER HORIZONTAL 8x4','1390x1854','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 6; $i++) { 

                $nombre_publicidad = "PN6X3_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER HORIZONTAL 6X3','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);

            }
            for ($i=1; $i < 9; $i++) { 

                $nombre_publicidad = "PNCL".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato ,nombre_publicidad, direccion_guardar) VALUES('$id_pabellon','CAJA DE LUZ','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 13; $i++) { 

                $nombre_publicidad = "PNPL".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato , nombre_publicidad, direccion_guardar) VALUES('$id_pabellon','PLUMAS','1400x920', 'image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
        }if($codigo_pabellon == 'PA'){

            $direccion_guardar = "$direccion_padre/PA/PIEZAS_PUBLICITARIAS/";


            for ($i=1; $i < 3; $i++) { 

            
                $nombre_publicidad = "PA3X6_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER VERTICAL 3X6','1700x2000','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }

            for ($i=1; $i < 3; $i++) { 

            
                $nombre_publicidad = "PA2.5X3_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER VERTICAL 2.5X3','1920x1080','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }


            for ($i=1; $i < 7; $i++) { 

                $nombre_publicidad = "PA8X4_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER HORIZONTAL 8x4','1390x1854','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 6; $i++) { 

                $nombre_publicidad = "PA6X3_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_pabellon','BANNER HORIZONTAL 6X3','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);

            }
            for ($i=1; $i < 9; $i++) { 

                $nombre_publicidad = "PACL".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato ,nombre_publicidad, direccion_guardar) VALUES('$id_pabellon','CAJA DE LUZ','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 13; $i++) { 

                $nombre_publicidad = "PAPL".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato , nombre_publicidad, direccion_guardar) VALUES('$id_pabellon','PLUMAS','1400x920', 'image/jpg.image/png.image/jpeg','$nombre_publicidad','$direccion_guardar');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }

        }



//-----------------------STANDS

        /*
        if
        $folder = "$direccion_padre/$codigo_pabellon/STANDS";
        */

       

        for ($i = 1 ; $i < intval($stand_SFA)+1 ; $i++) {
            

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

        for ($i = 1 ; $i < intval($stand_SC)+1 ; $i++) {

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

        for ($i = 1 ; $i < intval($stand_SCM)+1 ; $i++) {

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

        /*STAN SHOCK (FUERA DE USO)
        for ($i = intval($stand_SS) ; $i > 0 ; $i--) {  

            $codigo_stand = $codigo_pabellon."SH".$i;

            $insertarDatos = "INSERT INTO stand_evento(id_exhibitor3 , type_stand , status , name_stand , codigo_stand, id_pabellon) VALUES('$id_exhibitor3','Shock','Sin Asignar','Sin nombre asignado','$codigo_stand','$id_pabellon');";

        
            $ejecutarInsertar = mysqli_query($con, $insertarDatos);  
            if(!$ejecutarInsertar){
                echo("Error En la linea de sql".$codigo_stand);
            }

        }*/

        if(!$ejecutarInsertar){
            echo("Error En la lineaaaaaaaaa de sql");
        }

}

    
function editar_datosLobby(){

    include("../config/config.php");


        echo("Entrando");
        
        $id_lobby = $_POST["id_lobby"];

        $nombre_lobby = $_POST["nombre_lobby"];
        $codigo_lobby = $_POST["codigo_lobby"];
        $descripcion_lobby = $_POST["descripcion_lobby"];
        

        $insertarDatos = "UPDATE lobby set nombre_lobby = '$nombre_lobby',codigo_lobby = '$codigo_lobby', descripcion_lobby = '$descripcion_lobby' where id_lobby = '$id_lobby';";

        $ejecutarInsertar = mysqli_query($con, $insertarDatos);

        if(!$ejecutarInsertar){
            echo("Error En la linea de sql");
        }



        /*Obtener la dirección padre*/
        $query = "SELECT direccion_padre from lobby where id_lobby = '$id_lobby';";
        $insertarDatos = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($insertarDatos)) {
            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $direccion_padre = $array["data"][0]["direccion_padre"];


        //creamos la carpeta
        $folder = "$direccion_padre".'/'."$codigo_lobby";
        mkdir("$folder", 0777);
        $folder = $folder.'/';

        if ($codigo_lobby == "LB") {

            for ($i=1; $i < 7; $i++) { 
                # code...
            
                $nombre_publicidad = "LB3X6_".$i;
                
                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_lobby','BANNER VERTICAL 3X6','1700x2000','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 5; $i++) { 

                $nombre_publicidad = "LB8X4_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_lobby','BANNER HORIZONTAL 8x4','1390x1854','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 3; $i++) { 

                $nombre_publicidad = "LB18X10_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato ,nombre_publicidad, direccion_guardar) VALUES('$id_lobby','GRAN FORMATO','2700X1500','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }            
            for ($i=1; $i < 35; $i++) { 

                $nombre_publicidad = "LBPL".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato , nombre_publicidad, direccion_guardar) VALUES('$id_lobby','PLUMAS','1400x920', 'image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
        }



        mysqli_free_result($ejecutarInsertar);
        mysqli_close($con);

}

function editar_datosAuditorio(){
    include("../config/config.php");

        echo("Entrando");
        
        $id_auditorio = $_POST["id_auditorio"];

        $nombre_auditorio = $_POST["nombre_auditorio"];
        $codigo_auditorio = $_POST["codigo_auditorio"];
        $descripcion_auditorio = $_POST["descripcion_auditorio"];
        

        $insertarDatos = "UPDATE auditorio set nombre_auditorio = '$nombre_auditorio',codigo_auditorio = '$codigo_auditorio', descripcion_auditorio = '$descripcion_auditorio' where id_auditorio = '$id_auditorio';";

        $ejecutarInsertar = mysqli_query($con, $insertarDatos);

        if(!$ejecutarInsertar){
            echo("Error En la linea de sql");
        }



        /*Obtener la dirección padre*/
        $query = "SELECT direccion_padre from auditorio where id_auditorio = '$id_auditorio';";
        $insertarDatos = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($insertarDatos)) {
            //$array['data'][] = array_map("utf8_encode", $data);
            $array["data"][] = $data;
        }

        $direccion_padre = $array["data"][0]["direccion_padre"];

        //creamos la carpeta
        $folder = $direccion_padre.'/'.$codigo_auditorio;
        mkdir("$folder", 0777);
        $folder = $folder.'/';

        $carpetaVideos = $folder.'Conferencias/';
        mkdir("$carpetaVideos", 0777);



        if(!$ejecutarInsertar){
            echo("Error En la linea de sql");
        }    

        if ($codigo_auditorio == "AA") {

            for ($i=1; $i < 5; $i++) { 

            
                $nombre_publicidad = "AA3X6_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_auditorio','BANNER VERTICAL 3X6','1700x2000','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }

            for ($i=1; $i < 13; $i++) { 

            
                $nombre_publicidad = "AA2.5X3_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_auditorio','BANNER VERTICAL 2.5X3','1920x1080','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }


            for ($i=1; $i < 5; $i++) { 

                $nombre_publicidad = "AA8X4_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_auditorio','BANNER HORIZONTAL 8x4','1390x1854','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 5; $i++) { 

                $nombre_publicidad = "AA6X3_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_auditorio','BANNER HORIZONTAL 6X3','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);

            }
            for ($i=1; $i < 4; $i++) { 

                $nombre_publicidad = "AACL".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato ,nombre_publicidad, direccion_guardar) VALUES('$id_auditorio','CAJA DE LUZ','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 13; $i++) { 

                $nombre_publicidad = "AAPL".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato , nombre_publicidad, direccion_guardar) VALUES('$id_auditorio','PLUMAS','1400x920', 'image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }


        }else if ($codigo_auditorio == "AB") {


            for ($i=1; $i < 5; $i++) { 

            
                $nombre_publicidad = "AB3X6_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_auditorio','BANNER VERTICAL 3X6','1700x2000','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }

            for ($i=1; $i < 13; $i++) { 

            
                $nombre_publicidad = "AB2.5X3_".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_auditorio','BANNER VERTICAL 2.5X3','1920x1080','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }


            for ($i=1; $i < 5; $i++) { 

                $nombre_publicidad = "AB8X4_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_auditorio','BANNER HORIZONTAL 8x4','1390x1854','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 5; $i++) { 

                $nombre_publicidad = "AB6X3_".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad, dimensiones_max , formato,nombre_publicidad,direccion_guardar) VALUES('$id_auditorio','BANNER HORIZONTAL 6X3','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);

            }
            for ($i=1; $i < 4; $i++) { 

                $nombre_publicidad = "ABCL".$i;

                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato ,nombre_publicidad, direccion_guardar) VALUES('$id_auditorio','CAJA DE LUZ','1400x920','image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }
            for ($i=1; $i < 13; $i++) { 

                $nombre_publicidad = "ABPL".$i;


                $insertarDatos = "INSERT INTO publicidad_espacio(id_padre, tipo_publicidad,dimensiones_max , formato , nombre_publicidad, direccion_guardar) VALUES('$id_auditorio','PLUMAS','1400x920', 'image/jpg.image/png.image/jpeg','$nombre_publicidad','$folder');";

                $ejecutarInsertar = mysqli_query($con, $insertarDatos);
            }


        }




        mysqli_free_result($ejecutarInsertar);
        mysqli_close($con);

}

function rellenarDatos(){
    include("../config/config.php");

    $idPabellon = $_POST["idPabellon"];

    $query = "SELECT count(*) as numero from stand_evento where type_stand = 'Full Access' and id_pabellon = '$idPabellon';";
    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $array2["data"][] = $data;
    }
    
    $nFullAcess = $array2["data"][0]["numero"];
    $array2 = null;
    
    
    $query = "SELECT count(*) as numero from stand_evento where type_stand = 'Central' and id_pabellon = '$idPabellon';";
    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $array2["data"][] = $data;
    }
    
    $nCentral = $array2["data"][0]["numero"];
    $array2 = null;
    
    $query = "SELECT count(*) as numero from stand_evento where type_stand = 'Corner M' and id_pabellon = '$idPabellon';";
    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $array2["data"][] = $data;
    }
    
    $nCornerM = $array2["data"][0]["numero"];
    $array2 = null;

    
    $arrayFinal = array( '0' => $nFullAcess, '1' => $nCentral, '2' => $nCornerM);

    echo json_encode($arrayFinal);

}

function soloEditarLobby(){
    include("../config/config.php");

    $id_lobby = $_POST["id_lobby"];

    $nombre_lobby = $_POST["nombre_lobby"];
    $descripcion_lobby = $_POST["descripcion_lobby"];
    

    $query = "UPDATE lobby set nombre_lobby = '$nombre_lobby', descripcion_lobby = '$descripcion_lobby' where id_lobby = '$id_lobby';";
    $res = mysqli_query($con, $query);


}

function soloEditarAuditorio(){
    include("../config/config.php");

    $id_auditorio = $_POST["id_auditorio"];

    $nombre_auditorio = $_POST["nombre_auditorio"];
    $descripcion_auditorio = $_POST["descripcion_auditorio"];
    

    $insertarDatos = "UPDATE auditorio set nombre_auditorio = '$nombre_auditorio', descripcion_auditorio = '$descripcion_auditorio' where id_auditorio = '$id_auditorio';";

    $ejecutarInsertar = mysqli_query($con, $insertarDatos);

}

?>