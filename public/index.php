<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
include '../lib/funtions.php';
require '../vendor/autoload.php';

$app = new Slim\App();

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('../templates');
};

/*$app->get('/home', function ($request, $response, $args) {
    return $this->view->render($response, 'list.html', [
        'name' => $args['name']
    ]);
})->setName('profile');*/
$app->get('/', function (Request $request, Response $response) {
    
    $obj = new Datos();
    $listado = $obj->listadoAll();
    
    $response = $this->view->render($response, "list.php", ["listado" => $listado]);
    return $response;
    
});

$app->get('/detail/{id}', function (Request $request, Response $response) {
    
    $id = $request->getAttribute('id');
    $obj = new Datos();
    $detail = $obj->detail($id);
    
    $response = $this->view->render($response, "detail.php", ["detail" => $detail]);
    return $response;
});

$app->post('/search', function (Request $request, Response $response) {
    
    $email =  $request->getParam('InputEmail');
    $obj = new Datos();
    $list = $obj->search($email);
    $response = $this->view->render($response, "detail.php", ["detail" => $list]);
    
    
    return $response;
});

$app->get('/api/{salary1}/{salary2}', function (Request $request, Response $response) {
    $s1 = $request->getAttribute('salary1');
    $s2 = $request->getAttribute('salary2');
    $obj = new Datos();
    $detail = $obj->searchSalary($s1, $s2);
    $xml = $obj->array2XML($detail);
    header('Content-Type: application/xml; charset=utf-8');
    echo $xml;

});


$app->run();
