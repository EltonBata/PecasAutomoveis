<?php
include_once '../../config/db.php';

class feedback
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

    public function selectOne($id)
    {
        $this->sql = $this->conexao->query("SELECT * FROM feedback WHERE id='$id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function selectAll()
    {
        $this->sql = $this->conexao->query("SELECT *FROM feedback 
        INNER JOIN cliente on feedback.id_cliente= cliente.id JOIN resposta on feedback.id_resposta= resposta.id;");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

}

?>