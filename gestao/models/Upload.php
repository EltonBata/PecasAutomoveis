<?php
include_once '../../config/db.php';

class Upload
{
    private $conexao;
    private $sql;
    private $conta;
    private $dados;
    private $dbConnection;
    private $id;

    function __construct()
    {
        $this->dbConnection = new dbConnection();
        $this->conexao = $this->dbConnection->connect();
        return $this->conexao;
    }

   

    public function selectAll($id)
    {
        $this->sql = $this->conexao->query("SELECT * FROM upload WHERE id_peca='$id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectOne($id)
    {
        $this->sql = $this->conexao->query("SELECT * FROM upload WHERE id_peca='$id' LIMIT 1");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function count($id)
    {
        $this->sql = $this->conexao->query("SELECT * FROM upload WHERE id_peca='$id'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }


    // public function insert($params = [])
    // {
    //     $this->sql = $this->conexao->prepare("INSERT INTO peca (nome, tipo, tamanho, marca, preco, data_fabrico, local_fabrico, cor, status, quantidade) VALUES (:nome, :tipo, :tamanho, :marca, :preco, :data_fabrico, :local_fabrico, :cor, :status, :quantidade)");
    //     $this->sql->execute($params);
    //     $this->conta = $this->sql->rowCount();
    //     return $this->conta;
    // }

    public function delete($id)
    {
        $this->sql = $this->conexao->prepare("DELETE FROM peca WHERE id='$id'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

  
}
