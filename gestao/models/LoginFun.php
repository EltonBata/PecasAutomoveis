<?php
include_once '../../config/db.php';

class Loginfun{

    public $conexao;
    public $sql;

    function __construct()
    {
        $this->dbConnection = new dbConnection();
        $this->conexao = $this->dbConnection->connect();
        return $this->conexao;
    }

    function countRow($sql, $data = []) {
      
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($data);
    
        return $stmt->rowCount();
    }

    function readOne($sql, $id = []) {
        
        $stmt =$this->conexao->prepare($sql);
        $stmt->execute($id);
    
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function finde($dados) {
       
    
        $sql ="SELECT * FROM perfil WHERE username =:username";
        
        $stmt = $this->conexao->prepare($sql);
    
        $stmt->execute($dados);
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    


}