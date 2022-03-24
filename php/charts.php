<?php

$chart_option = $_REQUEST['param'];
//$uid = $_POST['uid'];
//$ini_date = $_POST['ini_date'];
//$end_date = $_POST['end_date'];

//WHERE (  interaction_date BETWEEN "2021-05-10" and "2021-05-12" )


switch ($chart_option) {

    case 'update_online':
        updateOnline();
        break;

    case 'report_chats':
        reportChats();
        break;

        //SELECT id_interaction, interaction_date FROM `interactions` WHERE ( (kind_interaction = "stand_visit_hotspot") OR (kind_interaction = "stand_visit_map") ) AND (EXTRACT(HOUR FROM interaction_date)   = '11')
    case 'report_visits':
        reportVisits();
        break;

    case 'chats_created':
        /*$q = "SELECT id_stand, name_stand 
        FROM stand
        WHERE id_userexpo = $uid
        ";*/
        chatsCreated();
        break;


    case 'visitsperstand':
        visitsPerStand();
        break;

    case 'visitsevent':
        visitsEvent();
        break;

    case 'cards-info';
        cardsInfo();
        break;

    case 'visitsperchannel':
        visitsPerChanner();
        break;

    case 'interactionsperstand':
        interactionsPerStand();
        break;

    case 'userlist':
        userList();
        break;

    case 'visits_delimited':
        visitsDelimited();
        break;

    case 'standtypes':
        standTypes();
        break;

    case "online_tour":
        onlineTour();
        break;

    case "get_stands_list":
        getStandsList();
        break;
//------------
    case 'getExhibitorsReport':
        getExhibitorsReport();
        break;
    case 'getAdvisersReport':
        getAdvisersReport();
        break;
    case 'getOrganizersReport':
        getOrganizersReport();
        break;
    case 'getExpositorGrafica':
        getExpositorGrafica();
        break;
    case 'getAsesorGrafica':
        getAsesorGrafica();
        break;

//--------------
    case "get_stands_components":
        getStandComponents();
        break;

    case "get_stands_components_report":
        getStandComponentsReport();
        break;
    case 'personStands':
        personStands();
        break;
    case "get_asigned_stands":
        getAsignedStands();
        break;

    case "get_lobby_documentation":
        getLobbyDocs();
        break;

    case "get_pabs_documentation":
        getPabDocs();
        break;

    case "get_auds_documentation":
        getAudDocs();
        break;


    case "get_stands_asigned_report":
        getAsignedStandsReport();
        break;

    case "get_lobby_docs_report":
        getLobbyDocsReport();
        break;

    case "get_pabs_docs_report":
        getPabsDocsReport();
        break;
    case "download_visitantes":
        download_visitantes();
        break;
        //---------------------------------
}
function download_visitantes()
{

    include "../config/config.php";

    $q_stands = "SELECT first_name as Nombre ,
    last_name as Apellido ,
    email as Correo,
    cellphone as Telefono,
    CASE id_rol2 WHEN 5 THEN 'Estudiante' WHEN 6 THEN 'Acudiente' WHEN 9 THEN 'Profesional' END AS 'Rol' ,
    CASE kind WHEN '5_student' THEN 'Estudiante' WHEN '1_carer' THEN 'Padre' WHEN '2_carer' THEN 'Madre' WHEN '3_carer' THEN 'Familiar' WHEN '4_carer' THEN 'Otro' WHEN '1_professional' THEN 'Rector' WHEN '2_professional' THEN 'Docente' WHEN '3_professional' THEN 'Orientador Vocacional o Psicologo' WHEN '4_professional' THEN 'Administrativo' END as Perfil,
    CASE escuela WHEN 'Empty' then '--' else escuela END as Escuela ,
    country as Pais 
    from vistaVisitantes;";

    
    $json_data = array();
    $results = array();

    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        array_push($results, $row);
    }

    $json_data['succes'] = true;

    $json_data['data']['rows'] = $results;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}



//---------------------------------
function getAsesorGrafica(){
    include "../config/config.php";

    $confirmado = 0;
    $sinConfirmar = 0;

    $q_lobby = " SELECT is_validated from user,user_event where id_rol2 = 4 and id_user =  id_user3 and id_event3 = 167 ;";
    $query = mysqli_query($con, $q_lobby);

    while ($row = mysqli_fetch_array($query)) {

        if ($row['is_validated'] == 1) {
            $confirmado += 1;
        } else if($row['is_validated'] == 0) {
            $sinConfirmar += 1;
        }
    }

    $json_data['succes'] = true;

    $json_data['data']['confirmado'] = $confirmado;
    $json_data['data']['sinConfirmar'] = $sinConfirmar;

    echo json_encode($json_data, JSON_FORCE_OBJECT);       
}
function getExpositorGrafica(){
    include "../config/config.php";

    $confirmado = 0;
    $sinConfirmar = 0;
    $reservado = 0;

    $q_lobby = " SELECT is_validated from user,user_event where id_rol2 = 3 and id_user =  id_user3 and id_event3 = 167 ;";
    $query = mysqli_query($con, $q_lobby);

    while ($row = mysqli_fetch_array($query)) {

        if ($row['is_validated'] == 1) {
            $confirmado += 1;
        } else if($row['is_validated'] == 0) {
            $sinConfirmar += 1;
        }
    }


    $q_lobby = "SELECT * from stand_evento where status = 'En reserva' and id_evento = 167;";
    $query = mysqli_query($con, $q_lobby);
    $row = null;
    while ($row = mysqli_fetch_array($query)) {

        $reservado += 1;
        
    }






    $json_data['succes'] = true;

    $json_data['data']['confirmado'] = $confirmado;
    $json_data['data']['sinConfirmar'] = $sinConfirmar;
    $json_data['data']['reservado'] = $reservado;

    echo json_encode($json_data, JSON_FORCE_OBJECT);    
}
//---------------------------------

function updateOnline()
{

    include "../config/config.php";

    $q = "UPDATE user 
            set last_online_panel = CURRENT_TIMESTAMP, 
            is_online_panel = TRUE
            WHERE id_user = $uid";

    $query = mysqli_query($con, $q);
}

function reportChats()
{

    include "../config/config.php";


    $stands = array();
    $json_data = array();
    $hours = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23); //horarios expo
    $content = array();

    $q = "SELECT *
            FROM `stand_evento`
            WHERE id_userexpo  = $uid
            ";
    $query = mysqli_query($con, $q);

    while ($row = mysqli_fetch_array($query)) {

        $curr_standId = $row['id'];
        $curr_standName = $row['nm_commercial'];
        $values_hrs = array();


        $visits_csv_query = mysqli_query(
            $con,
            "SELECT nm_commercial,
                 user.first_name,
                 user.last_name,  
                 user.email,  
                 user.cellphone, 
                 user.area_interest,
                 interaction_date,
                 user.city

                    FROM `interactions`, `stand_evento`, `user`
                    WHERE (id_to_stand = $curr_standId AND id = $curr_standId) 
                    AND (kind_interaction = 'chat_created') 
                    AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                    AND (interactions.id_user4 = user.id_user)
                    AND user.kind = 7 
                    
                    "
        );

        while ($reg = mysqli_fetch_array($visits_csv_query)) {


            array_push(
                $content,
                array(
                    $reg['nm_commercial'],
                    $reg['name'],
                    $reg['lastname'],
                    $reg['email'],
                    $reg['phone'],
                    $reg['area_interest'],
                    $reg['interaction_date'],
                    $reg['city']
                )
            );
        }
    }

    $json_data['succes'] = true;
    $json_data['data']['cont'] = $content;
    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function reportVisits()
{

    include "../config/config.php";

    $stands = array();
    $json_data = array();
    $hours = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23); //horarios expo
    $content = array();

    $q = "SELECT *
            FROM `stand_evento`
            ";
    $query = mysqli_query($con, $q);

    while ($row = mysqli_fetch_array($query)) {

        $curr_standId = $row['id_stand'];
        $curr_standName = $row['name_stand'];
        $values_hrs = array();



        $visits_csv_query = mysqli_query(
            $con,
            "SELECT name_stand,
                 user.first_name,
                 user.last_name,  
                 user.email,  
                 user.cellphone, 
                 user.area_interest,
                 interaction_date,
                 user.city

                    FROM `interactions`, `stand_evento`, `user`
                    WHERE (id_to_stand = $curr_standId AND id = $curr_standId) 
                    AND (kind_interaction = 'stand_visit_hotspot' OR kind_interaction = 'stand_visit_map') 
                    AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                    AND (interactions.id_user4 = user.id_user)
                    AND user.kind = 7 
                    
                    "
        );

        while ($reg = mysqli_fetch_array($visits_csv_query)) {


            array_push(
                $content,
                array(
                    $reg['nm_commercial'],
                    $reg['name'],
                    $reg['lastname'],
                    $reg['email'],
                    $reg['phone'],
                    $reg['area_interest'],
                    $reg['interaction_date'],
                    $reg['city'],

                )
            );
        }
    }

    $json_data['succes'] = true;
    $json_data['data']['cont'] = $content;
    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function chatsCreated()
{

    include "../config/config.php";

    $q = "SELECT id_stand, name_stand 
        FROM stand_event
        ";

    $query = mysqli_query($con, $q);

    $json_data = array();

    $names = array();
    $values = array();

    while ($row = mysqli_fetch_array($query)) {

        $curr_standId = $row['id_stand'];
        $curr_standName = $row['name_stand'];

        /*$interaction_query = mysqli_query(
                $con,
                "SELECT id_user4
                FROM interactions, user
                WHERE id_to_stand = $curr_standId
                AND kind_interaction = 'chat_created' 
                AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
                AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                AND (id_user4 = id_user )
                AND ( kind = 7)
                "
            );*/

        $interaction_query = mysqli_query(
            $con,
            "SELECT id_interaction
                FROM interactions, user
                WHERE id_to_stand = $curr_standId
                AND kind_interaction = 'chat_created' 
                AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
                AND (id_user4 = id_user )
                "
        );

        $interacrion_val = mysqli_num_rows($interaction_query);

        array_push($names, $curr_standName);
        array_push($values, $interacrion_val);
    }

    $json_data['succes'] = true;
    $json_data['data']['names'] = $names;
    $json_data['data']['values'] = $values;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function visitsPerStand()
{

    include "../config/config.php";

    $stands = array();
    $json_data = array();
    $hours = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23);; //horarios expo
    $global_data = array();
    $global_names = array();

    //el id_stand  y el name_stand de cada stand checkeado

    $numeros = $_POST["standsSeleccionados"];

    $q = "SELECT codigo_stand,id_stand, name_stand 
            FROM stand_evento where id_stand in $numeros ;"; //esto de aquí son los labels--------------
    $query = mysqli_query($con, $q);

    while ($row = mysqli_fetch_array($query)) {

        $curr_standId = $row['id_stand'];
        $curr_standName = $row['codigo_stand'].' : '.$row['name_stand'];
        $values_hrs = array();

        foreach ($hours as $hour) {

            $visitsperhour_query = mysqli_query(
                $con,
                "SELECT id_stand, id_to_stand, name_stand, kind_interaction, interaction_date FROM `interactions`, `stand_evento`
                    WHERE (id_to_stand = $curr_standId AND id_stand = $curr_standId) 
                    AND (kind_interaction = 'stand_visit_hotspot' OR kind_interaction = 'stand_visit_map') 
                    AND (EXTRACT(HOUR FROM interaction_date) = '$hour' )
                    AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
                    AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                    "
            );

            $logs  = mysqli_num_rows($visitsperhour_query);

            array_push($values_hrs, $logs);
        }

        array_push($global_data, $values_hrs);
        array_push($global_names, $curr_standName);
    }

    $json_data['succes'] = true;
    $json_data['data']['names'] = $global_names;
    $json_data['data']['h_values'] = $global_data;
    echo json_encode($json_data, JSON_FORCE_OBJECT);
}
//INSERT INTO `interactions`(`id_user4`, `kind_interaction`, `id_to_stand`) VALUES (1,'chat_created',2)
function visitsEvent()
{

    include "../config/config.php";

    $json_data = array();
    $hours = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23);; //horarios expo
    $values_hrs = array();

    foreach ($hours as $hour) {

        $visitsperhour_query = mysqli_query(
            $con,
            "SELECT id_interaction 
            FROM interactions
            WHERE kind_interaction = 'general_visit' 
            AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
            AND (EXTRACT(HOUR FROM interaction_date) = '$hour' ) 
            AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
            
            "
        );

        $logs  = mysqli_num_rows($visitsperhour_query);

        array_push($values_hrs, $logs);
    }

    $json_data['succes'] = true;
    $json_data['data']['h_values'] = $values_hrs;
    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function cardsInfo()
{

    include "../config/config.php";

    $tot_stnd_visits = 0;
    $tot_chats = 0;
    $json_data = array();

    $q_user = "SELECT id_user, kind FROM `user` WHERE 1";

    $q_stands = "SELECT id_stand, name_stand 
        FROM stand_evento";

    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) { // get values bases on stand

        $curr_standId = $row['id_stand'];
        $curr_standName = $row['name_stand'];

        /*$visitsperstand_query = mysqli_query(
                $con,
                "SELECT kind_interaction 
                FROM interactions, user 
                WHERE id_to_stand = $curr_standId
                AND ( kind_interaction = 'stand_visit_map' OR kind_interaction = 'stand_visit_hotspot')
                AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                AND ( id_user4 = id_user )
                AND ( kind = 7 )
                "
            );*/

        $visitsperstand_query = mysqli_query(
            $con,
            "SELECT kind_interaction 
                FROM interactions, user 
                WHERE id_to_stand = $curr_standId
                AND ( kind_interaction = 'stand_visit_map' OR kind_interaction = 'stand_visit_hotspot')
                AND (id_user4 = id_user )
                "
        );


        /*$chatsperstand_query = mysqli_query(
                $con,
                "SELECT kind_interaction 
                FROM interactions, user
                WHERE id_to_stand = $curr_standId
                AND ( kind_interaction = 'chat_created' )
                AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                AND ( id_user4 = id_user )
                AND ( kind = 7 )
                "
            );*/

        $chatsperstand_query = mysqli_query(
            $con,
            "SELECT kind_interaction 
                FROM interactions, user
                WHERE id_to_stand = $curr_standId
                AND ( kind_interaction = 'chat_created' )
                AND (id_user4 = id_user )
                "
        );

        $tot_stnd_visits += mysqli_num_rows($visitsperstand_query);
        $tot_chats += mysqli_num_rows($chatsperstand_query);
    }
    $json_data['data']['stand_visitors'] = $tot_stnd_visits;
    $json_data['data']['tot_chats'] = $tot_chats;




    $q_chats = "SELECT id_user4, kind_interaction 
        FROM `interactions` 
        WHERE kind_interaction = 'chat_created'
        AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) );
        ";

    $q_visitors = "SELECT id_user4, kind_interaction, interaction_date 
        FROM `interactions` 
        WHERE kind_interaction = 'general_visit' 
        AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) );
        ";


    $query = mysqli_query($con, $q_visitors);
    $logs = mysqli_num_rows($query);
    $json_data['data']['visitors'] = $logs;

    /*$query = mysqli_query($con, $q_user);
        $logs = mysqli_num_rows($query);
        $json_data['data']['user'] = $logs;*/

    $query = mysqli_query($con, $q_stands);
    $logs = mysqli_num_rows($query);
    $json_data['data']['stands'] = $logs;

    $query = mysqli_query($con, $q_chats);
    $logs = mysqli_num_rows($query);
    $json_data['data']['chats'] = $logs;

    $json_data['succes'] = true;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function visitsPerChanner()
{
    include "../config/config.php";

    /*$q = "SELECT id_stand, name_stand 
            FROM stand
            WHERE id_userexpo = $uid
            "; //get stand names*/

    $numeros = $_POST["standsSeleccionados"];

    $q = "SELECT codigo_stand,id_stand, name_stand 
            FROM stand_evento where id_stand in $numeros ;"; //ESTO ES LO DE MEDIO DE VISITA 

    $query = mysqli_query($con, $q);

    $json_data = array();

    $names = array();
    $values_map = array();
    $values_hs = array();

    while ($row = mysqli_fetch_array($query)) { // get values bases on stand

        $curr_standId = $row['id_stand'];
        $curr_standName = $row['codigo_stand'];

        /*$interaction_map_query = mysqli_query(
                    $con,
                    "SELECT kind_interaction 
                    FROM interactions, user 
                    WHERE id_to_stand = $curr_standId
                    AND kind_interaction = 'stand_visit_map' 
                    AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
                    AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                    AND ( id_user4 = id_user )
                    AND ( kind = 7 )
                    "
                );*/

        $interaction_map_query = mysqli_query(
            $con,
            "SELECT kind_interaction 
                    FROM interactions, user 
                    WHERE id_to_stand = $curr_standId
                    AND kind_interaction = 'stand_visit_map' 
                    AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
                    AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                    "
        );

        /*$interaction_map_hotspot = mysqli_query(
                    $con,
                    "SELECT kind_interaction
                    FROM interactions, user 
                    WHERE id_to_stand = $curr_standId
                    AND kind_interaction = 'stand_visit_hotspot' 
                    AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
                    AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                    AND ( id_user4 = id_user )
                    AND ( kind = 7 )
                    "
                );*/

        $interaction_map_hotspot = mysqli_query(
            $con,
            "SELECT kind_interaction
                    FROM interactions, user 
                    WHERE id_to_stand = $curr_standId
                    AND kind_interaction = 'stand_visit_hotspot' 
                    AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
                    AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
                    "
        );

        array_push($names, $curr_standName);
        array_push($values_map, mysqli_num_rows($interaction_map_query));
        array_push($values_hs, mysqli_num_rows($interaction_map_hotspot));
    }

    $json_data['succes'] = true;
    $json_data['data']['names'] = $names;
    $json_data['data']['values_map'] = $values_map;
    $json_data['data']['values_hp'] = $values_hs;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function interactionsPerStand()
{

    include "../config/config.php";
    $numeros = $_POST["standsSeleccionados"];

    $q = "SELECT codigo_stand,id_stand, name_stand 
            FROM stand_evento where id_stand in $numeros ;"; //ESTO ES LO DE LA GRAFICA DE INTERACCIONES POR STAND

    $query = mysqli_query($con, $q);

    $json_data = array();

    $names = array();
    //$values_interactions = array();
    $v_gal = array();
    $v_doc = array();
    $v_vid = array();
    $v_ban = array();

    while ($row = mysqli_fetch_array($query)) { // get values bases on stand

        $curr_standId = $row['id_stand'];
        $curr_standName = $row['codigo_stand'].' : '.$row['name_stand'];


        $q_gal = mysqli_query($con, "SELECT kind_interaction FROM interactions 
            WHERE id_to_stand = $curr_standId 
            AND kind_interaction = 'viewed_gal' 
            AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
            AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
            ");

        $logs = mysqli_num_rows($q_gal);
        array_push($v_gal, $logs);

        $q_vid = mysqli_query($con, "SELECT kind_interaction FROM interactions
            WHERE id_to_stand = $curr_standId 
            AND kind_interaction = 'viewed_video' 
            AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
            AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
            ");

        $logs = mysqli_num_rows($q_vid);
        array_push($v_vid, $logs);

        $q_ban = mysqli_query($con, "SELECT kind_interaction FROM interactions 
            WHERE id_to_stand = $curr_standId 
            AND kind_interaction = 'viewed_banner'
            AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
            AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) ) 
            ");

        $logs = mysqli_num_rows($q_ban);
        array_push($v_ban, $logs);

        $q_doc = mysqli_query($con, "SELECT kind_interaction FROM interactions 
            WHERE id_to_stand = $curr_standId 
            AND kind_interaction = 'viewed_doc'
            AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
            AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
             ");

        $logs = mysqli_num_rows($q_doc);
        array_push($v_doc, $logs);


        array_push($names, $curr_standName);
        // array_push($values_interactions, mysqli_num_rows($interaction_query) );
    }

    $json_data['succes'] = true;
    $json_data['data']['names'] = $names;
    $json_data['data']['gal'] = $v_gal;
    $json_data['data']['vid'] = $v_vid;
    $json_data['data']['ban'] = $v_ban;
    $json_data['data']['doc'] = $v_doc;
    //$json_data['data']['values'] = $values_interactions;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function userList()
{

    include "../config/config.php";

    $json_data = array();

    //Usuarios Organizadores
    $usr_org = mysqli_query($con, "SELECT id_rol FROM `rolUser`, `user` WHERE id_rol = id_rol2 AND rol_name='organizer'; ");
    $usrorg = mysqli_num_rows($usr_org);
    //Usuarios Expositores
    $usr_exh = mysqli_query($con, "SELECT id_rol FROM `rolUser`, `user` WHERE id_rol = id_rol2 AND rol_name='exhibitor'; ");
    $usrexh = mysqli_num_rows($usr_exh);
    //Usuarios ASESORES
    $usr_adv = mysqli_query($con, "SELECT id_rol FROM `rolUser`, `user` WHERE id_rol = id_rol2 AND rol_name='adviser';");
    $usradv = mysqli_num_rows($usr_adv);
    //Usuarios VISITANTE
    $usr_vst = mysqli_query($con, "SELECT * from user where id_rol2 in (6,7,9,5);");
    $usrvst = mysqli_num_rows($usr_vst);

    $usr_adm = mysqli_query($con, "SELECT id_rol FROM `rolUser`, `user` WHERE id_rol = id_rol2 AND rol_name='admin';");
    $usradm = mysqli_num_rows($usr_adm);

    $json_data['succes'] = true;
    $json_data['data']['org'] = $usrorg;
    $json_data['data']['exp'] = $usrexh;
    $json_data['data']['adv'] = $usradv;
    $json_data['data']['vst'] = $usrvst;
    $json_data['data']['adm'] = $usradm;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function visitsDelimited()
{

    include "../config/config.php";

    $json_data = array();

    $q_user = "SELECT id_interaction, interaction_date, kind_interaction 
        FROM interactions
        WHERE kind_interaction = 'general_visit' 
        AND ( interaction_date BETWEEN '$ini_date' AND ( '$end_date'  + interval '1' day ) )
        AND ( (EXTRACT(HOUR FROM interaction_date) BETWEEN 0 AND 23 ) )
        
        ";

    $query = mysqli_query($con, $q_user);
    $logs = mysqli_num_rows($query);

    $json_data['succes'] = true;
    $json_data['data']['visitors'] = $logs;
    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function standTypes()
{

    include "../config/config.php";

    $q = "SELECT type_stand FROM stand_evento WHERE type_stand = 'Full Access'";
    $result = mysqli_query($con, $q);
    $dataIsla = mysqli_num_rows($result);

    $q = "SELECT type_stand FROM stand_evento WHERE type_stand = 'Corner M' ";
    $result = mysqli_query($con, $q);
    $dataLateral = mysqli_num_rows($result);


    $q = "SELECT type_stand FROM stand_evento WHERE type_stand = 'Central' ";
    $result = mysqli_query($con, $q);
    $dataCentral = mysqli_num_rows($result);

    $json_data['data']['isl'] = $dataIsla;
    $json_data['data']['lat'] = $dataLateral;
    $json_data['data']['cen'] = $dataCentral;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function onlineTour()
{

    include "../config/config.php";

    $json_data = array();

    $q_online = "SELECT is_online_tour
        FROM `user` 
        WHERE is_online_tour = TRUE";

    $query = mysqli_query($con, $q_online);
    $logs = mysqli_num_rows($query);
    $json_data['data']['users_online'] = $logs;

    $json_data['succes'] = true;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function getStandsList()
{

    include "../config/config.php";

    $json_data = array();

    $id_pabellon = $_POST["id_pabellon"];


    $q = "SELECT id_stand, name_stand,codigo_stand FROM stand_evento where id_pabellon = '$id_pabellon' and  status in ('Confirmado' , 'En espera' , 'En reserva') ORDER BY id_stand";

    $res = mysqli_query($con, $q);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}

function getAsignedStandsReport()
{

    include "../config/config.php";

    $json_data = array();

    $q = "SELECT id_stand, type_stand, status, name_stand, codigo_stand, correo_expositor, nombre_expo, apellido_expo FROM stand_evento ORDER BY id_stand";

    $res = mysqli_query($con, $q);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}
//----------------------------------------------

function getOrganizersReport()
{

    include "../config/config.php";

    $q_stands = "SELECT first_name,last_name,cellphone,email from user, user_event where id_rol2 = 2 and id_user3 = id_user and id_event3 = 167;";
    
    $json_data = array();
    $results = array();



    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        array_push($results, $row);
    }

    $json_data['succes'] = true;

    $json_data['data']['rows'] = $results;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}
function getExhibitorsReport()
{

    include "../config/config.php";

    $q_stands = "SELECT * from datosExpositor where id_evento = 167 and nombre_expo is not null order by correo_expositor desc;";
    
    $json_data = array();
    $results = array();



    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        array_push($results, $row);
    }

    $json_data['succes'] = true;

    $json_data['data']['rows'] = $results;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}
function getAdvisersReport()
{

    include "../config/config.php";

    $q_stands = "SELECT va.*,  adv.stand_confirmed as stand,adv.email_exhibitor from viewAsesores as va left join adviser as adv on va.email = adv.email2 ;";
    
    $json_data = array();
    $results = array();



    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        array_push($results, $row);
    }

    $json_data['succes'] = true;

    $json_data['data']['rows'] = $results;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}




//----------------------------------------------
function getStandComponents()
{

    include "../config/config.php";
    $completed = 0;
    $notCompleted = 0;
    $json_data = array();

    $q_stands = "SELECT subido from contenidos_stand where codigo_stand in (select codigo_stand from stand_evento where id_evento = 167);";

    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        if ($row['subido'] == 1)
            $completed += 1;

        else{
            $notCompleted += 1;

        }

    }

    $json_data['succes'] = true;

    $json_data['data']['completed'] = $completed;
    $json_data['data']['notCompleted'] = $notCompleted;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function getStandComponentsReport()
{

    include "../config/config.php";

    $q_stands = "SELECT  e.*, concat(e.SUB, ' de ', e.CONT) as SUBIDOS , s.correo_vendedor from estatusStands as e, stand_evento as s where s.codigo_stand = e.codigo_stand;;";

    $json_data = array();
    $results = array();



    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        array_push($results, $row);
    }

    $json_data['succes'] = true;

    $json_data['data']['rows'] = $results;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function personStands(){

    include "../config/config.php";

    $q_stands = "SELECT *, if( subido > 0,'Sí','No') as SUBIDO2  FROM stands_components;";

    $json_data = array();
    $results = array();



    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        array_push($results, $row);
    }

    $json_data['succes'] = true;

    $json_data['data']['rows'] = $results;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function getAsignedStands()
{
    include "../config/config.php";
    $asignados = 0;
    $reservados = 0;
    $libres = 0;
    $espera = 0;

    $q_stands = "SELECT `status` FROM stand_evento;";

    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        if ($row['status'] == "Confirmado")
            $asignados += 1;

        if ($row['status'] == "En reserva")
            $reservados += 1;

        if ($row['status'] == "En espera")
            $espera += 1;

        if ($row['status'] == "Sin Asignar")
            $libres += 1;
    }


    $json_data['succes'] = true;

    $json_data['data']['asigned'] = $asignados;
    $json_data['data']['reserved'] = $reservados;
    $json_data['data']['free'] = $libres;
    $json_data['data']['waiting'] = $espera;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}


function getLobbyDocs()
{
    include "../config/config.php";

    $uploaded = 0;
    $pendant = 0;

    $q_lobby = "SELECT subido from publicidad_espacio where id_padre = (select id_lobby from lobby where id_evento = 167); ";
    $query = mysqli_query($con, $q_lobby);

    while ($row = mysqli_fetch_array($query)) {

        if ($row['subido'] == 1) {
            $uploaded += 1;
        } else {
            $pendant += 1;
        }
    }

    $json_data['succes'] = true;

    $json_data['data']['uploaded'] = $uploaded;
    $json_data['data']['pendant'] = $pendant;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function getPabDocs()
{
    include "../config/config.php";

    $q_PI = "SELECT nombre_pabellon,subido from publicidad_espacio,pabellon where id_padre in (select id_pabellon from pabellon where codigo_pabellon != 'Sin codigo' and id_evento = 167) and id_pabellon = id_padre;";

    $json_data['succes'] = true;


    $query = mysqli_query($con, $q_PI);
    while ($row = mysqli_fetch_array($query)) {


        //es un pabellon nuevo se agrega a json_data
        $json_data['data'][$row['nombre_pabellon']] += 0;

        if ($row['subido'] == 1){
            $json_data['data'][$row['nombre_pabellon']] += 1;
        }

        $json_data['total'][$row['nombre_pabellon']] += 1;

    }

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function getAudDocs()
{
    include "../config/config.php";

    $q_PI = "SELECT nombre_auditorio,subido from publicidad_espacio,auditorio where id_padre in (select id_auditorio from auditorio where codigo_auditorio != 'Sin codigo' and id_evento = 167) and id_auditorio = id_padre;";

    $json_data['succes'] = true;


    $query = mysqli_query($con, $q_PI);
    while ($row = mysqli_fetch_array($query)) {


        //es un pabellon nuevo se agrega a json_data
        $json_data['data'][$row['nombre_auditorio']] += 0;

        if ($row['subido'] == 1){
            $json_data['data'][$row['nombre_auditorio']] += 1;
        }

        $json_data['total'][$row['nombre_auditorio']] += 1;

    }

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function getLobbyDocsReport()
{

    include "../config/config.php";

    $q_stands = "SELECT tipo_publicidad, nombre_publicidad, dimensiones_max, formato, subido FROM publicidad_espacio where nombre_publicidad like 'LB%' ;";
    $json_data = array();
    $results = array();

    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        array_push($results, $row);
    }

    $json_data['succes'] = true;

    $json_data['data']['rows'] = $results;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}

function getPabsDocsReport()
{

    include "../config/config.php";

    $q_stands = "SELECT nombre_publicidad, tipo_publicidad, dimensiones_max, formato, subido  FROM publicidad_espacio where nombre_publicidad like 'P%' ;";
    $json_data = array();
    $results = array();

    $query = mysqli_query($con, $q_stands);

    while ($row = mysqli_fetch_array($query)) {

        array_push($results, $row);
    }

    $json_data['succes'] = true;

    $json_data['data']['rows'] = $results;

    echo json_encode($json_data, JSON_FORCE_OBJECT);
}
