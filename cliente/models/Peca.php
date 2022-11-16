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

    public function selectAllMarcas()
    {
        $this->sql = $this->conexao->query("SELECT marca FROM peca ORDER BY nome ASC");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectAllNome()
    {
        $this->sql = $this->conexao->query("SELECT tipo FROM peca ORDER BY tipo ASC");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectByMarca($marca)
    {
        $this->sql = $this->conexao->query("SELECT * FROM peca WHERE marca='$marca' ORDER BY nome ASC");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectByPeca($tipo)
    {
        $this->sql = $this->conexao->query("SELECT * FROM peca WHERE tipo='$tipo' ORDER BY nome ASC");
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

  
}
?>