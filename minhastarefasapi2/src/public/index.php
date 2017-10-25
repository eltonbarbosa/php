<?php 
    use \Psr\Http\Message\ServerRequestInterface as Request; 
    use \Psr\Http\Message\ResponseInterface as Response;
    
    require '../vendor/autoload.php';

    $config['displayErrorDetails'] = true; 
    $config['addContentLengthHeader'] = false;
    $config['db']['host'] = "localhost"; 
    $config['db']['user'] = "systarefas"; 
    $config['db']['pass'] = "systarefas"; 
    $config['db']['dbname'] = "minhastarefas";

    $app = new \Slim\App(["config" => $config]);
    $container = $app->getContainer();

    $container['db'] = function ($c) 
    { 
        $dbConfig = $c['config']['db']; 
        $pdo = new PDO("mysql:host=" . $dbConfig['host'] . ";dbname=" . $dbConfig['dbname'], $dbConfig['user'], $dbConfig['pass']); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
        $db = new NotORM($pdo); 
        return $db; 
    };

    $app->get('/api/{nome}', function (Request $request, Response $response) 
    { 
        $nome = $request->getAttribute('nome'); 
        $response->getBody()->write("Bem vindo a API, $nome");
        return $response; 
    });

    $app->get('/api/tarefas/{id}', function (Request $request, Response $response) 
    {
        $tarefas = array();
        $idTarefa = $request->getAttribute("id");
        /*foreach ($this->db->tarefas() as $tarefa) {
            if($idTarefa == $tarefa["id"]) 
            {
                $tarefas = [
                    "id" => $tarefa["id"],
                    "titulo" => $tarefa["titulo"],
                    "descricao" => $tarefa["descricao"],
                    "concluida" => $tarefa["concluida"]
                ];
            }
        }*/
        $tarefa = $this->db->tarefas("id = ?", $idTarefa)->fetch();

        //return $response->withJson($tarefas);
        return $response->withJson($tarefa);
    
    });

    $app->run(); 
?>

