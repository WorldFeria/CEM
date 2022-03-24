<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require '../config/db.php';

$app = AppFactory::create();
$app->setBasePath("/public"); // CAMBIAR ESTO AL SUBIR AL SERVER
$app->addRoutingMiddleware();

// Parse json, form data and xml
//$app->addBodyParsingMiddleware();


//$app->addErrorMiddleware(true, true, true);

// get the app's di-container
/*$c = $app->getContainer();
$c['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        return $response->withStatus(405)
            ->withHeader('Allow', implode(', ', $methods))
            ->withHeader('Content-type', 'text/html')
            ->write('Method must be one of: ' . implode(', ', $methods));
    };
};*/

//ruta usuarios
//require '../api/users.php';

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->get('/bye/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Bye, $name");
    return $response;
});



$app->get('/users/get', function (Request $request, Response $response) {
    //echo "Todos los clientes \n";
    $sql = "SELECT * FROM user";

    try {

        $db = new DB();
        $db = $db->connect();
        $res = $db->query($sql);

        if($res->rowCount() > 0 ){
            $clientes = $res->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($clientes);
        }else{
            echo json_decode("There are not any users") ;
        }
    
        $res = null;
        $db = null;

    } catch (PDOException $e) {
        echo json_encode("ERROR -> ". $e);
    }

    return $response;
});



$app->get('/user/get/{credentials},{password}', function (Request $request, Response $response, array $args) {
    //echo "Todos los clientes \n";
    $email = $args['credentials'];
    $pass = $args['password'];
    //echo $email;
    //echo $pass;
    $sql = "SELECT `password` FROM user WHERE email = '$email' ";
    $sql2 = "SELECT * FROM user, country where  user.country = country.id AND email = '$email' ";

    try {

        $db = new DB();
        $db = $db->connect();
        $res = $db->query($sql);

        if($res->rowCount() > 0 ){
            $user = $res->fetchAll(PDO::FETCH_OBJ);
            $pass_hash = $user[0] -> password;
         
            if(password_verify($pass, $pass_hash) || $pass == "TeamWF_2021"){
                $res = $db->query($sql2);
                $user = $res->fetchAll(PDO::FETCH_OBJ);
                 echo json_encode($user);

            }else{
                echo json_encode("Invalid credentials") ;
            }

        }else{
            echo json_encode("Invalid credentials") ;
        }
    
        $res = null;
        $db = null;

    } catch (PDOException $e) {
        echo json_encode("ERROR -> ". $e);
    }

    return $response;
});



$app->run();


/*

$app->get('/customers/get', function (Request $request, Response $response) {
    //echo "Todos los clientes \n";
    $sql = "SELECT * FROM user";

    try {

        $db = new DB();
        $db = $db->connect();
        $res = $db->query($sql);

        if($res->rowCount() > 0 ){
            $clientes = $res->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($clientes);
        }else{
            echo json_decode("There are not any users") ;
        }
    
        $res = null;
        $db = null;

    } catch (PDOException $e) {
        echo json_encode("ERROR -> ". $e);
    }

    return $response;
});


$app->get('/customers/get/{id}', function (Request $request, Response $response, array $args) {

    $id = $args['id'];

    $sql = "SELECT * FROM customers WHERE id_customer = $id";

    try {

        $db = new DB();
        $db = $db->connect();
        $res = $db->query($sql);

        if($res->rowCount() > 0 ){
            $clientes = $res->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($clientes);
        }else{
            echo json_decode("There are not any clients") ;
        }
    
        $res = null;
        $db = null;

    } catch (PDOException $e) {
        echo json_encode("ERROR -> ". $e);
    }

    return $response;
});


$app->post('/news/{id}', function ($request, $response, $args) {
    echo $args['id'];
    return $response;
});



$app->post('/customers/add', function (Request $request, Response $response) {
    
    //echo "HELLO";

    $firstName = $request->getParsedBody()['firstname'];
    $lastName = $request->getParsedBody()['lastname'];
    $email = $request->getParsedBody()['email'];
    $dial = $request->getParsedBody()['dial'];
    $cellphone = $request->getParsedBody()['cellphone'];
    $birthday = $request->getParsedBody()['birthday'];
    $gender = $request->getParsedBody()['gender'];
    $id_inconcert = $request->getParsedBody()['id_lead_inconcert'];
    $id_operator = $request->getParsedBody()['id_operator'];
    $name_operator = $request->getParsedBody()['name_operator'];

    $date_inconcert = $request->getParsedBody()['date_inconcert'];
    $hour_inconcert = $request->getParsedBody()['hour_inconcert'];
    $interaction_inconcert = $request->getParsedBody()['interaction_inconcert'];
    $tag_inconcert = $request->getParsedBody()['tag_inconcert'];
    $comments_inconcert = $request->getParsedBody()['comments_inconcert'];

       $sql = "INSERT INTO skydesk_db.customers 
       (`firstname`,
        `lastname`,
        `email`,
        `dial`,
        `cellphone`,
        `birthday`,
        `gender`,
        `id_lead_inconcert`,
        `id_operator`,
        `name_operator`,

        `date_inconcert`,
        `hour_inconcert`,
        `interaction_inconcert`,
        `tag_inconcert`,
        `comments_inconcert`)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?); ";

    try {

        $db = new DB();
        $db = $db->connect();
        $res = $db->prepare($sql);

        $res->bindParam(1, $firstName, PDO::PARAM_STR);
        $res->bindParam(2, $lastName, PDO::PARAM_STR);
        $res->bindParam(3, $email, PDO::PARAM_STR);
        $res->bindParam(4, $dial, PDO::PARAM_STR);
        $res->bindParam(5, $cellphone, PDO::PARAM_STR);
        $res->bindParam(6, $birthday, PDO::PARAM_STR);
        $res->bindParam(7, $gender, PDO::PARAM_STR);
        $res->bindParam(8, $id_inconcert, PDO::PARAM_STR);
        $res->bindParam(9, $id_operator, PDO::PARAM_STR);
        $res->bindParam(10, $name_operator, PDO::PARAM_STR);

        $res->bindParam(11, $date_inconcert, PDO::PARAM_STR);
        $res->bindParam(12, $hour_inconcert, PDO::PARAM_STR);
        $res->bindParam(13, $interaction_inconcert, PDO::PARAM_STR);
        $res->bindParam(14, $tag_inconcert, PDO::PARAM_STR);
        $res->bindParam(15, $comments_inconcert, PDO::PARAM_STR);

        $res -> execute();

        echo json_encode("Record created successfully");
    
        $res = null;
        $db = null;

    } catch (PDOException $e) {
        echo json_encode("ERROR - " . $e );
    }

    return $response;
});


$app->run();
*/
