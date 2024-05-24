<?php
class Projeto{
    private $Id;
    private $Nome;
    private $Duracao;
    private $Con;

    public function_construct($Id = null, $Nome = null, $Duracao = null){
        $this -> id = $Id;
        $this -> nome = $Nome;
        $this -> duracao = $Duracao;
        $this -> con = new PDO(SERVIDOR,USUARIO,SENHA);
    }
    public function all(){
        $sql = $this -> con -> prepare('SELECT * FROM ver_projeto');
        $sql -> execute();
        $rows = $sql -> fetchALL(PDO::FETCH_CLASS);
        return $rows;
    }
    public function create(){
        $sql = $this -> con -> prepare('INSERT INTO projeto (Nome, Duracao) VALUES (?,?)');
        $sql -> execute([$this -> Nome, $this -> Duracao]);
    }
    public function read(){
        $sql = $this -> con -> prepare('SELECT * FROM ver_projeto WHERE Id = ?');
        $sql -> execute([$this -> Id]);
        $row = $sql -> fetchObject();
        return $row;
    }
    public function update(){
        $sql = $this -> con -> prepare('UPDATE projeto SET Nome = ?, Duracao = ? WHERE Id = ?');
        $sql -> execute([$this -> Nome, $this -> Duracao, $this -> Id]);
    }
    public function delete(){
        $sql = $this -> con -> prepare('DELETE FROM projeto WHERE Id = ?');
        $sql -> execute([$this -> Id]);
    }
}
?>