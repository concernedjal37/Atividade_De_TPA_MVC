<?php

class Task {
    private $conn;
    public $table_name = "tasks";

    public $idtask;
    
    public $task;
    public $prazo;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (task, prazo) VALUES (:task, :prazo)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->task = htmlspecialchars(strip_tags($this->task));
        $this->prazo = htmlspecialchars(strip_tags($this->prazo));

        // Bind parameters
        $stmt->bindParam(':task', $this->task);
        $stmt->bindParam(':prazo', $this->prazo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne() {
        $query = "SELECT task, prazo FROM " . $this->table_name . " WHERE idtask = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idtask);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->task = $row['task'];
        $this->prazo = $row['prazo'];
    }

    // Update - Atualizar os dados de um usuário
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET task = :task, prazo = :prazo WHERE idtask = :idtask";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idtask = htmlspecialchars(strip_tags($this->idtask));
        $this->task = htmlspecialchars(strip_tags($this->task));
        $this->prazo = htmlspecialchars(strip_tags($this->prazo));

        // Bind parameters
        $stmt->bindParam(':idtask', $this->idtask);
        $stmt->bindParam(':task', $this->task);
        $stmt->bindParam(':prazo', $this->prazo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idtask = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idtask);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>