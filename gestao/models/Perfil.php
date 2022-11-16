<?php
include_once '../../config/db.php';

class Perfil
{
   private $conexao;
   private $sql;
   private $conta;
   private $dados = [];
   private $dbConnection;

    function __construct()
    {
        $this->dbConnection = new dbConnection();
        $this->conexao = $this->dbConnection->connect();
        return $this->conexao;
    }

    public function selectOne($id)
    {
        $this->sql = $this->conexao->query("SELECT * FROM perfil WHERE id_perfil='$id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function insert($params = [])
    {
        $this->sql = $this->conexao->prepare("INSERT INTO perfil (username, senha, perfil, id_administrador, id_gestor, id_cliente) VALUES (:username, :senha, :perfil, :id_administrador, :id_gestor, :id_cliente)");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function updateAdmin($params = [])
    {
        $this->sql = $this->conexao->prepare("UPDATE perfil SET username=:username WHERE id_administrador=:id");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function updateGestor($params = [])
    {
        $this->sql = $this->conexao->prepare("UPDATE perfil SET username=:username WHERE id_gestor=:id");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function deleteAdmin($id)
    {
        $this->sql = $this->conexao->prepare("DELETE FROM perfil WHERE id_administrador='$id'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function deleteGestor($id)
    {
        $this->sql = $this->conexao->prepare("DELETE FROM perfil WHERE id_gestor='$id'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function alterarSenha($params = [])
    {
        $this->sql = $this->conexao->prepare("UPDATE perfil SET senha=:senha WHERE id_perfil=:id");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function login($params)
    {
        $this->sql = $this->conexao->query("SELECT * FROM perfil WHERE username='$params'");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }
}
