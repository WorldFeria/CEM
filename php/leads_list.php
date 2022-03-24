
<?php

$opc = $_POST['param'];

switch ($opc) {

    case 'customers':
        getCustomersTable();
        break;

    case 'siblings':
        getSiblingsTable();
        break;

    case 'contacts':
        getContactsTable();
        break;

    case 'recommendations':
        getRecommendationsTable();
        break;
}

function getCustomersTable()
{

    include("../config/config.php");

    $query = "SELECT * FROM skydesk_db.customers, skydesk_db.lead_status
        WHERE customers.id_lead_status = lead_status.id_lead_status 
        ORDER BY customers.id_customer DESC;";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {

        //$array['data'][] = array_map("utf8_encode", $data);
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}


function getSiblingsTable()
{

    include("../config/config.php");

    $idCustomer = $_POST['id_customer'];

    $query = "SELECT * FROM skydesk_db.siblings
        WHERE siblings.id_customer3 = '$idCustomer';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}


function getContactsTable()
{

    include("../config/config.php");

    $idCustomer = $_POST['id_customer'];

    $query = "SELECT * FROM skydesk_db.contacts
        WHERE contacts.id_customer4 = '$idCustomer';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}


function getRecommendationsTable()
{

    include("../config/config.php");

    $idCustomer = $_POST['id_customer'];

    $query = "SELECT * FROM skydesk_db.recommendations
        WHERE recommendations.id_customer5 = '$idCustomer';";

    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }

    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}


?>