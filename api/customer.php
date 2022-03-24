<?php

include("../../config/config_api.php");

//$idCustomer = $_REQUEST['id_customer'];

if ( isset($_REQUEST['firstname']) && isset($_REQUEST['lastname']) && isset($_REQUEST['email']) && isset($_REQUEST['dial']) && isset($_REQUEST['cellphone']) 
&& isset($_REQUEST['birthday']) && isset($_REQUEST['gender']) && isset($_REQUEST['id_lead_inconcert']) && isset($_REQUEST['id_operator'])  && isset($_REQUEST['name_operator'])   ) {

    $firstName = $_REQUEST['firstname'];
    $lastName = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $dial = $_REQUEST['dial'];
    $cellphone = $_REQUEST['cellphone'];

    $birthday = $_REQUEST['birthday'];
    $gender = $_REQUEST['gender'];

    $id_inconcert = $_REQUEST['id_lead_inconcert'];
    $id_operator = $_REQUEST['id_operator'];
    $name_operator = $_REQUEST['name_operator'];

    $query = "INSERT INTO skydesk_db.customers 
     (`firstname`,
      `lastname`,
      `email`,
      `dial`,
      `cellphone`,
      `birthday`,
      `gender`,
      `id_lead_inconcert`,
      `id_operator`,
      `name_operator`)VALUES (
        '$firstName', 
        '$lastName',
        '$email',
        '$dial',
        '$cellphone',
        '$birthday',
        '$gender',
        '$id_inconcert',
        '$id_operator',
        '$name_operator'
        );
    ";

    if (mysqli_query($con, $query)) {
        //echo "Record created successfully" . $query;
        echo "Record created successfully";
    } else {
        echo "Error creating record: " . mysqli_error($con);
    }
    
}else{
    echo "ERROR: input has incorrect number of params";
}


//mysqli_free_result($res);
mysqli_close($con);
