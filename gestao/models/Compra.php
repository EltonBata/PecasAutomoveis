<?php
include_once '../../config/db.php';

class Compra
{
    public $conexao;
    public $sql;
    public $conta;
    public $dados = [];
    public $dbConnection;

    function __construct()
    {
        $this->dbConnection = new dbConnection();
        $this->conexao = $this->dbConnection->connect();
        return $this->conexao;
    }

    public function selectOne($id)
    {
        $this->sql = $this->conexao->query("SELECT * FROM compra WHERE id='$id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectAll()
    {
        $this->sql = $this->conexao->query("SELECT compra.id AS compraID, data_compra, data_entrega, local_entrega, compra.quantidade AS compraQuantidade, desconto, cliente.nome AS cliNome, cliente.apelido AS cliApelido, email, contactos, peca.nome AS pecaNome, marca, preco, tamanho, compra.status AS compraStatus, total_pago  FROM compra JOIN cliente, peca WHERE compra.id_cliente = cliente.id AND compra.id_peca = peca.id");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function count()
    {
        $this->sql = $this->conexao->query("SELECT * FROM compra");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function countStatus()
    {
        $this->sql = $this->conexao->query("SELECT * FROM compra WHERE status LIKE 'pendente'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }


}
