<?php
include_once '../../config/db.php';

class Cliente
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

    public function insert($params = [])
    {
        $this->sql = $this->conexao->prepare("INSERT INTO cliente (nome, apelido, nr_bi, morada, email, contactos) VALUES (:nome, :apelido, :nr_bi, :morada, :email, :contactos)");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }
}

?>