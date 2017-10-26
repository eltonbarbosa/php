<?php
class TarefaService {

    private $db;

    public function __construct(){
        $this->db = Banco::getConnection();
    }

    public function cadastrarTarefa($tarefa){
        $statementHandle = $this->db->prepare("INSERT INTO tarefas (titulo,descricao,concluida) VALUES (?, ?, ?)");
        $statementHandle->bindParam(1, $tarefa->getTitulo());
        $statementHandle->bindParam(2, $tarefa->getDescricao());
        $statementHandle->bindParam(3, $tarefa->getConcluida());
        $statementHandle->execute();
    }

    public function listarTodasTarefas(){
        $sql = "SELECT * FROM tarefas";
        $result = $this->db->query($sql);

        $tarefas = [];
        /* Aqui usei o fetchObject ao invés do fetchAll(PDO::FETCH_ASSOC),
        ** estamos orientados a objeto :)
        */
        while ($tarefa = $result->fetchObject('Tarefa')) {//Tarefa é a classe do modelo
            $tarefas[] = $tarefa;
        }

        return $tarefas;
    }
}

?>