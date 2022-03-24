<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

require '../config/db.php';

$app = AppFactory::create();
$app->setBasePath("/public");

// Parse json, form data and xml
$app->addBodyParsingMiddleware();

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);

// get the app's di-container
$c = $app->getContainer();
$c['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        return $response->withStatus(405)
            ->withHeader('Allow', implode(', ', $methods))
            ->withHeader('Content-type', 'text/html')
            ->write('Method must be one of: ' . implode(', ', $methods));
    };
};


$app = AppFactory::create();

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();

/*$app = AppFactory::create();

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();*/


/*require '../config/db.php';

//echo "todos los clientes -";

$sql = "SELECT * FROM customers";

try{


    $db = new DB();
    $db = $db->connect();
    $res = $db->query($sql);

    //echo ('There are nor any clients');

    if($res->rowCount() > 0 ){
        $clientes = $res->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($clientes);
    }else{
        echo '{"erro" : {"text": There are not any clients}';

    }

    $res = null;
    $db = null;

}catch(PDOException $e){
    echo '{"erro" : {"text":'.$e.'}';
}*/


?>

