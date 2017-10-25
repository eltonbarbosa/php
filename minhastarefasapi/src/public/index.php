<?php 
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
	
    require '../vendor/autoload.php';

    $app = new \Slim\App;

    $app->get('/api/{nome}', function (Request $request, Response $response) {
        $nome = $request->getAttribute('nome');
        $response->getBody()->write("Bem vindo a API, $nome");
        
        return $response;
    });

    //Recebendo dados via POST
    $app->post('/api/produtos', function (Request $request, Response $response) {
        $body = $request->getBody();
        echo $body;
    });

    $app->get('/api/getStatusCode/', function (Request $request, Response $response) {
        return $response->withStatus(401);
    });

    $app->get('/api/getHeaders/', function (Request $request, Response $response) {
        $newResponse = $response->withHeader("Content-type", "application/json");
        $newResponse = $response->withJson("{update:ok}", 200);

        return $newResponse;
    });

    $app->get('/api/getHeadersFromRequest/', function (Request $request, Response $response) {
        echo print_r($request->getHeaders());
    });

    $app->run();
?>