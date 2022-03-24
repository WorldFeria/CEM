<?php
$opc = $_POST['param'];
switch ($opc) {
    case 'create_exhibitor':
        createExhibitor();
    break;
    case 'ponentes':
        getExhibitors();
    break;
    case 'country':
        getExtensionsCountries();
    break;
}

function createExhibitor() {
    include("../config/config.php");

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $cellphone = $_POST['cellphone'];

    $query = "INSERT INTO user (id_rol2, email, country, cellphone, first_name, last_name) VALUES ('3', '$email', '$country', '$cellphone', '$firstName', '$lastName');";
    if (mysqli_query($con, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);
}

function getExhibitors() {
    include("../config/config.php");

    $query = "SELECT * FROM user, rolUser, country WHERE id_rol=id_rol2 AND country=id AND rol_name='exhibitor' ORDER BY user.first_name DESC;";
    $res = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}

function getExtensionsCountries() {
    include("../config/config.php");

    $sql = "SELECT id, name, phonecode FROM country ORDER BY name ASC;";
    $query = mysqli_query($con, $sql);

    $html.="<option selected>-- Selecciona --</option>";
    while ($r = mysqli_fetch_array($query)) {
        $html.="<option value='".$r['id']."'>".$r['name']." - +".$r['phonecode']."</option>";
    }
    echo $html;

    mysqli_free_result($res);
    mysqli_close($con);
}