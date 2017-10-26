<?php
    include "config.php";
    include "model/Tarefa.php";
    include "services/Banco.php";
    include "services/TarefaService.php";

    $tarefas = array();
    $errosValidacao = array();
    $houveErros = false;
    $tarefaService = new TarefaService();

    if (count($_POST) > 0) {
        if (!isset($_POST["titulo"]) || $_POST["titulo"] == ""){
            $errosValidacao["titulo"] = "Campo titulo obrigatorio!";
            $houveErros = true;     
         }
     
         if (isset($_POST["concluida"])) {
             $errosValidacao["concluida"] = "Não é possível adicionar uma tarefa já concluída!";
             $houveErros = true;
         }
     
         if (!$houveErros) {

             $tarefa = new Tarefa();
             $tarefa->setTitulo($_POST["titulo"]);
             $tarefa->setDescricao($_POST["descricao"]);
             $tarefa->setConcluida($_POST["concluida"]);

             $tarefaService->cadastrarTarefa($tarefa);
     
             header("Location: minhastarefas.php");
             die();
         }
    }

    $tarefas = $tarefaService->listarTodasTarefas();

    include "template.php";
?>
