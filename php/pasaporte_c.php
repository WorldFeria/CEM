<?php
$opc = $_POST['param'];
switch ($opc) {
    case 'visitors':
        getVisitors();
    break;
}

function getVisitors(){
    include("../config/config.php");

    $query = "SELECT id_user, first_name, last_name, name, cellphone, email, id_rol2, visitorAns1.ans_text as escuela ,
    (select count(*) from interactions where id_user4 = id_user) as total
    FROM rolUser, user, country, visitor, visitorAns5, visitorAns6,visitorAns1  WHERE id_rol=id_rol2 AND country=id AND id_user=id_user3 AND visitor.id_ans5=visitorAns5.id_ans5 AND visitor.id_ans6=visitorAns6.id_ans6 AND (id_rol='5' OR id_rol='6' OR id_rol='9') AND visitorAns1.id_ans1 = visitor.id_ans1 
    ORDER BY id_user DESC;";

    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_assoc($res)) {
        $array["data"][] = $data;
    }
    echo json_encode($array);

    mysqli_free_result($res);
    mysqli_close($con);
}
