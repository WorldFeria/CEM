<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
//require '../config/db.php';

$app = AppFactory::create();
$app->setBasePath("/cem/public"); // CAMBIAR ESTO AL SUBIR AL SERVER
$app->addRoutingMiddleware();

$app = AppFactory::create();
//echo "todos los clientes -";

$sql = "SELECT * FROM user";

try{


    $db = new DB();
    $db = $db->connect();
    $res = $db->query($sql);

    //echo ('There are nor any clients');

    if($res->rowCount() > 0 ){
        $clientes = $res->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($clientes);
    }else{
        echo '{"erro" : {"text": There are not any users}';

    }

    $res = null;
    $db = null;

}catch(PDOException $e){
    echo '{"error" : {"text":'.$e.'}';
}
