<?php

    $opc = $_POST['param'];

    switch ($opc) {

        case 'card_data':
            getCardData();
        break;

        case 'save_mandatory':
            updateMandatoryInfo();
        break;

        case 'save_complementary':
            updateComplementaryInfo();
        break;

        case 'get_country_list':
            getCountriesList();
        break;

        case 'get_zip_data':
            getZipData();
        break;

        case 'save_adress':
            updateAdress();
        break;

        case 'add_sibling':
            addSibling();
        break;

        case 'add_contact':
            addContact();
        break;

        case 'add_recommendation':
            addRecommendation();
        break;

        case 'delete_record':
            deleteRecord();
        break;

        case 'delete_record':
            deleteRecord();
        break;

        case 'upd_proint':
            updateProgramInterest();
        break;

        case 'upd_proint_more':
            updateProgramInterestMoreDetails();
        break;

        case 'upd_source':
            updateProgramSource();
        break;
    }

    function getCardData()
    {
        include("../config/config.php");

        $id_customer = $_POST['id_customer'];
        $json_data = array();

        $query = "SELECT * FROM skydesk_db.customers, skydesk_db.lead_status
                WHERE customers.id_lead_status = lead_status.id_lead_status
                AND customers.id_customer = $id_customer";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_array($res)) {

            $json_data["data"]['score'] = $data['score'];
            $json_data['succes'] = true;

            //-----BASIC
            $json_data["data"]['firstname'] = $data['firstname'];
            $json_data["data"]['lastname'] = $data['lastname'];

            $json_data["data"]['email'] = $data['email'];
            $json_data["data"]['dial'] = $data['dial'];
            $json_data["data"]['cellphone'] = $data['cellphone'];
            $json_data["data"]['lead_status'] = $data['name_status'];
            $json_data["data"]['birthday'] = $data['birthday'];
            $json_data["data"]['gender'] = $data['gender'];

            //------ADRESS
            $json_data["data"]['foreinger'] = $data['foreinger'];
            $json_data["data"]['usrCountry'] = $data['country'];
            $json_data["data"]['zip_code'] = $data['zip_code'];
            $json_data["data"]['state'] = $data['state'];
            $json_data["data"]['city'] = $data['city'];
            $json_data["data"]['settlement'] = $data['settlement'];
            $json_data["data"]['colony'] = $data['colony'];
            $json_data["data"]['name_street'] = $data['name_street'];
            $json_data["data"]['num_ext'] = $data['num_ext'];
            $json_data["data"]['num_int'] = $data['num_int'];

            //------PROGRAM
            $json_data["data"]['program_interest'] = $data['program_interest'];
            $json_data["data"]['country_interest'] = $data['country_interest'];
            $json_data["data"]['tentative_date'] = $data['tentative_date'];
            $json_data["data"]['paid_mode'] = $data['paid_mode'];
            $json_data["data"]['budget'] = $data['budget'];
            $json_data["data"]['lang_level'] = $data['lang_level'];

            $json_data["data"]['program_kind'] = $data['program_kind'];
            $json_data["data"]['interest_area'] = $data['interest_area'];
            $json_data["data"]['mother_lang'] = $data['mother_lang'];
            $json_data["data"]['interest_lang'] = $data['interest_lang'];
            $json_data["data"]['program_lenght'] = $data['program_lenght'];

            $json_data["data"]['source'] = $data['source'];
            $json_data["data"]['specific_source'] = $data['specific_source'];
        }

        echo json_encode($json_data, JSON_FORCE_OBJECT);

        mysqli_free_result($res);
        mysqli_close($con);
    }

    function updateMandatoryInfo()
    {
        include("../config/config.php");

        $idCustomer = $_POST['id_customer'];
        $firstName = $_POST['inputAccordionFirstname'];
        $lastName = $_POST['inputAccordionLastname'];
        $email = $_POST['inputAccordionEmail'];
        $dial = $_POST['inputAccordionDial'];
        $cellphone = $_POST['inputAccordionCellphone'];

        $query = " UPDATE skydesk_db.customers 
        SET firstname = '$firstName', 
        lastname = '$lastName',
        email = '$email',
        dial = '$dial',
        cellphone = '$cellphone'
        WHERE (`id_customer` = '$idCustomer');";

        if (mysqli_query($con, $query)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
        //mysqli_free_result($res);
        mysqli_close($con);
    }

    function updateComplementaryInfo()
    {
        include("../config/config.php");

        $idCustomer = $_POST['id_customer'];
        $birthday = $_POST['inputAccordionBirthday'];
        $gender = $_POST['inputAccordionGender'];

        $query = " UPDATE skydesk_db.customers 
        SET birthday = '$birthday', 
        gender = '$gender'
        WHERE (`id_customer` = '$idCustomer');";

        if (mysqli_query($con, $query)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
        //mysqli_free_result($res);
        mysqli_close($con);
    }

    function getCountriesList()
    {
        include("../config/config.php");

        $json_data = array();

        $query = "SELECT ISO4217_Currency_Country_Name FROM skydesk_db.countries WHERE ISO4217_Currency_Country_Name != '' ";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {
            $array["data"][] = $data;
        }

        echo json_encode($array);

        mysqli_free_result($res);
        mysqli_close($con);
    }

    function getZipData()
    {

        include("../config/config.php");
        $zipCode = $_POST['zip_code'];

        $query = "SELECT * FROM skydesk_db.zip_mx WHERE codigo = $zipCode;";

        $res = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($res)) {
            $array["data"] = $data;
        }

        echo json_encode($array);

        mysqli_free_result($res);
        mysqli_close($con);
    }

    function updateAdress()
    {
        include("../config/config.php");

        $idCustomer = $_POST['id_customer'];

        $cbForeigner = false;
        if (isset($_POST['gridCheckForeigner'])) {
            $cbForeigner = true;
        }

        $country = $_POST['inputAccordionUsrCountry'];
        $zip = $_POST['inputAccordionZip'];
        $state = $_POST['inputAccordionState'];
        $city = $_POST['inputAccordionCity'];
        $settlement = $_POST['inputAccordionSettlement'];
        $colony = $_POST['inputAccordionColony'];
        $street = $_POST['inputAccordionStreet'];
        $numExt = $_POST['inputAccordionExt'];
        $numInt = $_POST['inputAccordionInt'];

        $query = " UPDATE skydesk_db.customers 
        SET 
        foreinger = '$cbForeigner', 
        country = '$country',
        zip_code = '$zip',
        `state` = '$state',
        city = '$city',
        settlement = '$settlement',
        colony = '$colony',
        name_street = '$street',
        num_ext = '$numExt',
        num_int = '$numInt'
        WHERE (`id_customer` = '$idCustomer');";

        if (mysqli_query($con, $query)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
        //mysqli_free_result($res);
        mysqli_close($con);
    }

    function addSibling()
    {

        include("../config/config.php");

        $idCustomer = $_POST['id_customer'];
        $firstname = $_POST['inputSiblingFirstname'];
        $lastname = $_POST['inputSiblingLastname'];
        $gender = $_POST['inputSiblingGender'];
        $birthday = $_POST['inputSiblingBirthday'];

        $query = "INSERT INTO `skydesk_db`.`siblings` 
        (`sibling_firstname`, `sibling_lastname`, `sibling_birthday`, `sibling_gender`, `id_customer3`) 
        VALUES ('$firstname', '$lastname', '$birthday', '$gender', '$idCustomer');";

        if (mysqli_query($con, $query)) {
            echo "Record SAVED successfully";
        } else {
            echo "Error writing record: " . mysqli_error($con);
        }
        //mysqli_free_result($res);
        mysqli_close($con);
    }

    function addContact()
    {
        
        include("../config/config.php");

        $foreign = false;
        if (isset($_POST['gridCheckForeignerContact'])) {
            $foreign = true;
        }

        $idCustomer = $_POST['id_customer'];
        $firstname = $_POST['inputContactFirstname'];
        $lastname = $_POST['inputContactLastname'];
        $email = $_POST['inputContactEmail'];
        $relation = $_POST['inputContactRelation'];
        $ocupation = $_POST['inputContactOcupation'];
        $gender = $_POST['inputContactGender'];
        $dial = $_POST['inputContactDial'];
        $cellphone = $_POST['inputContactCellphone'];
        $birthday = $_POST['inputContactBirthday'];
        $birthPlace = $_POST['inputContactBPlace'];

        $country = $_POST['inputAccordionUsrCountryContact'];
        $zip = $_POST['inputAccordionZipContact'];
        $state = $_POST['inputAccordionStateContact'];
        $city = $_POST['inputAccordionCityContact'];
        $settlement = $_POST['inputAccordionSettlementContact'];
        $colony = $_POST['inputAccordionColonyContact'];
        $nameStreet = $_POST['inputAccordionStreetContact'];
        $numExt = $_POST['inputAccordionExtContact'];
        $numInt = $_POST['inputAccordionIntContact'];

        $query = "INSERT INTO `skydesk_db`.`contacts` 
        (
            `contact_firstname`, `contact_lastname`,
            `contact_email`, `contact_relation`,
            `contact_occupation`, `contact_gender`,
            `contact_dial`, `contact_cellphone`,
            `contact_birthday`, `contact_birth_place`,
            `contact_foreigner`, `contact_country`,
            `contact_street_name`, `contact_num_ext`,
            `contact_num_int`, `contact_zip`,
            `contact_state`, `contact_city`,
            `contact_settlement`, `contact_locality`,
            `id_customer4`
        )  
        
        VALUES (
            '$firstname', '$lastname',
            '$email', '$relation',
            '$ocupation','$gender',
            '$dial','$cellphone',
            '$birthday', '$birthPlace',
            '$foreign', '$country', 
            '$nameStreet', '$numExt',
            '$numInt','$zip',
            '$state','$city',
            '$settlement', '$colony',
            '$idCustomer'
        );";

        if (mysqli_query($con, $query)) {
            echo "Record SAVED successfully";
        } else {
            echo "Error writing record: " . mysqli_error($con);
        }
        //mysqli_free_result($res);
        mysqli_close($con);
    }

    function addRecommendation()
    {

        include("../config/config.php");

        $idCustomer = $_POST['id_customer'];
        $firstname = $_POST['inputRecomendationFirstname'];
        $lastname = $_POST['inputRecommendationLastname'];
        $email = $_POST['inputRecommendationEmail'];
        $birthday = $_POST['inputRecommendationBirthday'];
        $country = $_POST['inputRecommendationCountry'];
        $dial = $_POST['inputRecommendationDial'];
        $cellphone = $_POST['inputRecommendationCellphone'];

        $query = "INSERT INTO `skydesk_db`.`recommendations` 
        (`recommendation_firstname`, `recommendation_lastname`,
        `recommendation_country`, `recommendation_dial`,
        `recommendation_cellphone`, `recommendation_email`,
        `recommendation_birthday`, `id_customer5`) 

        VALUES (
            '$firstname', '$lastname',
            '$country', '$dial', 
            '$cellphone','$email',
            '$birthday', $idCustomer
        );";

        if (mysqli_query($con, $query)) {
            echo "Record SAVED successfully";
        } else {
            echo "Error writing record: " . mysqli_error($con);
        }
        //mysqli_free_result($res);
        mysqli_close($con);
    }

    function deleteRecord()
    {

        $idTarget = $_POST['id'];
        $kind = $_POST['kind'];

        switch ($kind) {

            case 'recommendations':
                include("../config/config.php");

                $query = "DELETE FROM `skydesk_db`.`recommendations` WHERE (`id_recommendation` = $idTarget);";

                if (mysqli_query($con, $query)) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . mysqli_error($con);
                }

                mysqli_close($con);
                break;


            case 'contacts':
                include("../config/config.php");

                $query = "DELETE FROM `skydesk_db`.`contacts` WHERE (`id_contacts` = $idTarget);";

                if (mysqli_query($con, $query)) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . mysqli_error($con);
                }

                mysqli_close($con);
                break;


            case 'siblings':
                include("../config/config.php");

                $query = "DELETE FROM `skydesk_db`.`siblings` WHERE (`id_sibling` = $idTarget);";

                if (mysqli_query($con, $query)) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . mysqli_error($con);
                }

                mysqli_close($con);
                break;
        }
    }

    function updateProgramInterest(){
        include("../config/config.php");

        $idCustomer = $_POST['id_customer'];

        $program = $_POST['inputAccordionProgram'];
        $countryinterest = $_POST['inputAccordionCountryInterest'];
        $datestart = $_POST['inputAccordionStart'];
        $paidmode = $_POST['inputAccordionPaid'];
        $budgetavailable = $_POST['inputAccordionBudget'];
        $languajelevel = $_POST['inputAccordionLanLevel'];

        $query = " UPDATE skydesk_db.customers 
        SET 
        program_interest = '$program',
        country_interest = '$countryinterest',
        tentative_date = '$datestart',
        paid_mode = '$paidmode',
        budget = '$budgetavailable',
        lang_level = '$languajelevel'
        WHERE (`id_customer` = '$idCustomer');";

        mysqli_query($con, $query);
        mysqli_close($con);
    }

    function updateProgramInterestMoreDetails(){
        include("../config/config.php");

        $idCustomer = $_POST['id_customer'];

        $programkind = $_POST['inputAccordionProgramKind'];
        $areainterest = $_POST['inputAccordionAreaInterest'];
        $motherñanguage = $_POST['inputAccordionMotherLanguage'];
        $programlanguage = $_POST['inputAccordionProgramLanguage'];
        $programlenght = $_POST['inputAccordionProgramLenght'];

        $query = " UPDATE skydesk_db.customers 
        SET 
        program_kind = '$programkind',
        interest_area = '$areainterest',
        mother_lang = '$motherñanguage',
        interest_lang = '$programlanguage',
        program_lenght = '$programlenght'
        WHERE (`id_customer` = '$idCustomer');";

        mysqli_query($con, $query);
        mysqli_close($con);
    }

    function updateProgramSource(){
        include("../config/config.php");

        $idCustomer = $_POST['id_customer'];

        $source = $_POST['inputAccordionSource'];
        $specificsource = $_POST['inputAccordionSpecificSource'];

        $query = " UPDATE skydesk_db.customers 
        SET 
        source = '$source',
        specific_source = '$specificsource'
        WHERE (`id_customer` = '$idCustomer');";

        mysqli_query($con, $query);
        mysqli_close($con);
    }

?>