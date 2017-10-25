<?php 
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	
	require "../vendor/autoload.php";
	
	$app = new \Slim\App;
	
	$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
		"users" => [
			"eu" => "eu"
		]
	]));
	
	$app->get("/api/{nome}", function (Request $request, Response $response) {
		$nome = $request->getAttribute("nome");
		$response->getBody()->write("Bem vindo a API basic Auth, $nome");
		return $response;
	});
	$app->run();
?>