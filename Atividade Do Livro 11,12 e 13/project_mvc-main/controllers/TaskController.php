<?php

include_once 'models/task.php';

class TaskController {
    private $db;
    private $tasks;

    public function __construct($db) {
        $this->db = $db;
        $this->tasks = new Task($db);
    }

    public function create($task, $prazo) {
        $this->tasks->task = $task;
        $this->tasks->prazo = $prazo;

        if($this->tasks->create()) {
            return "Tarefa criada.";
        } else {
            return "Não foi possível criar tarefa.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($idtask) {
        $this->tasks->idtask = $idtask;
        $this->tasks->readOne();

        if($this->tasks->task != null) {
            // Cria um array associativo com os detalhes do usuário
            $task_arr = array(
                "idtask" => $this->tasks->idtask,
                "task" => $this->tasks->task,
                "prazo" => $this->tasks->prazo
            );
            return $task_arr;
        } else {
            return "Usuário não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update($idtask, $task, $prazo) {
        $this->tasks->idtask = $idtask;
        $this->tasks->task = $task;
        $this->tasks->prazo = $prazo;

        if($this->tasks->update()) {
            return "Usuário atualizado.";
        } else {
            return "Não foi possível atualizar o usuário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($idtask) {
        $this->tasks->idtask = $idtask;

        if($this->tasks->delete()) {
            return "Tarefa foi excluída.";
        } else {
            return "Nao foi possível excluir usuário.";
        }
    }
    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll() {
        $query = "SELECT idtask, task, prazo  FROM " . $this->tasks->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }
}
?>