<?php
include_once '../../config/db.php';

class Administrador
{
    public $conexao;
    public $sql;
    public $conta;
    public $dados;
    public $dbConnection;

    function __construct()
    {
        $this->dbConnection = new dbConnection();
        $this->conexao = $this->dbConnection->connect();
        return $this->conexao;
    }

    public function selectAll()
    {
        $this->sql = $this->conexao->query("SELECT * FROM administrador");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_ASSOC);
        return $this->dados;
    }

    public function count()
    {
        $this->sql = $this->conexao->query("SELECT * FROM administrador");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function insert($params = [])
    {
        $this->sql = $this->conexao->prepare("INSERT INTO administrador (nome, apelido, data_nascimento, nacionalidade, nr_bi, sexo, morada, email, contactos) VALUES (:nome, :apelido, :data_nascimento, :nacionalidade, :nr_bi, :sexo, :morada, :email, :contactos)");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
    }

    public function delete($id)
    {
        $this->sql = $this->conexao->prepare("DELETE FROM administrador WHERE id='$id'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }
}
