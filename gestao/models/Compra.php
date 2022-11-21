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
        $this->sql = $this->conexao->query("SELECT cliente.nome AS clinome, apelido,email,contactos,morada,nr_bi, data_entrega, data_compra, local_entrega, quantidade_total, estado, desconto, total_pago, metodo,numero FROM compra JOIN cliente,metodo_pagamento WHERE compra.id_cliente = cliente.id AND compra.id_metodo = metodo_pagamento.id AND compra.id = '$id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }
    

    public function selectAll()
    {
        $this->sql = $this->conexao->query("SELECT compra.id AS compraID, nome, apelido, data_entrega, data_compra, local_entrega, quantidade_total, estado, desconto, total_pago FROM compra JOIN cliente WHERE compra.id_cliente = cliente.id");
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
        $this->sql = $this->conexao->query("SELECT * FROM compra WHERE estado LIKE 'pendente'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function updateEstado($id)
    {
        $this->sql = $this->conexao->query("UPDATE compra SET estado = 'vista' WHERE id='$id'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }


}
