<?php
include_once '../../config/db.php';

class Peca
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

    public function selectAll()
    {
        $this->sql = $this->conexao->query("SELECT * FROM peca ORDER BY nome ASC");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectStatus($status)
    {
        $this->sql = $this->conexao->query("SELECT * FROM peca WHERE status='$status' ORDER BY nome ASC");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectOne($id)
    {
        $this->sql = $this->conexao->query("SELECT * FROM peca WHERE id='$id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function count()
    {
        $this->sql = $this->conexao->query("SELECT * FROM peca");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function countStatus($status)
    {
        $this->sql = $this->conexao->query("SELECT * FROM peca WHERE status='$status'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function insert($params = [])
    {
        $this->sql = $this->conexao->prepare("INSERT INTO peca (nome, tipo, tamanho, marca, preco, data_fabrico, local_fabrico, cor, status, quantidade) VALUES (:nome, :tipo, :tamanho, :marca, :preco, :data_fabrico, :local_fabrico, :cor, :status, :quantidade)");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function delete($id)
    {
        $this->sql = $this->conexao->prepare("DELETE FROM peca WHERE id='$id'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function update($params = [])
    {
        $this->sql = $this->conexao->prepare("UPDATE peca SET nome=:nome, tipo=:tipo, tamanho=:tamanho, marca=:marca, preco=:preco, data_fabrico=:data_fabrico, local_fabrico=:local_fabrico, cor=:cor, status=:status, quantidade=:quantidade WHERE id=:id");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function getLast()
    {
        $this->sql = $this->conexao->query("SELECT id FROM peca ORDER BY id DESC LIMIT 1");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function deleteLast()
    {
        $this->id = $this->getLast()->id;
        $this->sql = $this->conexao->query("DELETE FROM peca WHERE id='$this->id'");
        $this->sql->execute();
    }
}
