<?php
include_once '../../config/db.php';

class Compra
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
        $this->sql = $this->conexao->prepare("INSERT INTO compra (data_compra, data_entrega, local_entrega, quantidade_total, desconto, estado, total_pago, id_cliente, id_metodo) VALUES (:data_compra, :data_entrega, :local_entrega, :quantidade_total, :desconto, :estado, :total_pago, :id_cliente, :id_metodo)");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function insertMetodo($params = [])
    {
        $this->sql = $this->conexao->prepare("INSERT INTO metodo_pagamento (metodo, numero) VALUES (:metodo, :numero)");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function insertCompraPeca($params = [])
    {
        $this->sql = $this->conexao->prepare("INSERT INTO compra_peca (quantidade, preco, id_peca, id_compra) VALUES (:quantidade, :preco, :id_peca, :id_compra)");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function selectLastMetodo()
    {
        $this->sql = $this->conexao->query("SELECT id FROM metodo_pagamento ORDER BY id DESC LIMIT 1 ");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectLastCompra()
    {
        $this->sql = $this->conexao->query("SELECT id FROM compra ORDER BY id DESC LIMIT 1 ");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function deleteMetodo(){

        $this->id = $this->selectLastMetodo();
        $this->sql = $this->conexao->query("DELETE FROM metodo_pagamento WHERE id='$this->id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function deleteCompra(){

        $this->id = $this->selectLastCompra();
        $this->sql = $this->conexao->query("DELETE FROM compra WHERE id='$this->id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

}

?>