<?php
include_once '../../config/db.php';

class Estatisticas
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

    public function totalAdmin()
    {
        $this->sql = $this->conexao->query("SELECT * FROM administrador JOIN perfil WHERE administrador.id = perfil.id_administrador");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }


    public function totalGestor()
    {
        $this->sql = $this->conexao->query("SELECT * FROM gestor JOIN perfil WHERE gestor.id = perfil.id_gestor");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }


    public function totalClientes()
    {
        $this->sql = $this->conexao->query("SELECT * FROM cliente");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function totalCompras()
    {
        $this->sql = $this->conexao->query("SELECT * FROM compra");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function comprasPendentes()
    {
        $this->sql = $this->conexao->query("SELECT * FROM compra WHERE status LIKE 'pendente'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function comprasCanceladas()
    {
        $this->sql = $this->conexao->query("SELECT * FROM compra WHERE status LIKE 'cancelado'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function comprasEntregues()
    {
        $this->sql = $this->conexao->query("SELECT * FROM compra WHERE status LIKE 'entregado'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function pecas()
    {

        $this->sql = $this->conexao->query("SELECT nome, COUNT(*) AS total FROM peca GROUP BY nome");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function totalPecas()
    {
        $this->sql = $this->conexao->query("SELECT * FROM peca");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }
}
