<?php
include_once '../../config/db.php';

class Gestor
{
    private $conexao;
    private $sql;
    private $conta;
    private $dados = [];
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
        $this->sql = $this->conexao->query("SELECT * FROM gestor JOIN perfil WHERE gestor.id = perfil.id_gestor ORDER BY nome ASC");
        $this->sql->execute();
        $this->dados = $this->sql->fetchAll(PDO::FETCH_OBJ);
        return $this->dados;
    }

     public function selectOne($id)
    {
        $this->sql = $this->conexao->query("SELECT * FROM gestor JOIN perfil WHERE gestor.id = perfil.id_gestor AND gestor.id='$id'");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function count()
    {
        $this->sql = $this->conexao->query("SELECT * FROM gestor JOIN perfil WHERE gestor.id = perfil.id_gestor");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function insert($params = [])
    {
        $this->sql = $this->conexao->prepare("INSERT INTO gestor (nome, apelido, data_nascimento, nacionalidade, nr_bi, sexo, morada, email, contactos) VALUES (:nome, :apelido, :data_nascimento, :nacionalidade, :nr_bi, :sexo, :morada, :email, :contactos)");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function delete($id)
    {
        $this->sql = $this->conexao->prepare("DELETE FROM gestor WHERE id='$id'");
        $this->sql->execute();
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function update($params = [])
    {
        $this->sql = $this->conexao->prepare("UPDATE gestor SET nome=:nome, apelido=:apelido, data_nascimento=:data_nascimento, nacionalidade=:nacionalidade, nr_bi=:nr_bi, sexo=:sexo, morada=:morada, email=:email, contactos=:contactos WHERE id=:id");
        $this->sql->execute($params);
        $this->conta = $this->sql->rowCount();
        return $this->conta;
    }

    public function getLast()
    {
        $this->sql = $this->conexao->query("SELECT id FROM gestor ORDER BY id DESC LIMIT 1");
        $this->sql->execute();
        $this->dados = $this->sql->fetch(PDO::FETCH_OBJ);
        return $this->dados;
    }

    public function deleteLast()
    {
        $this->id = $this->getLast()->id;
        $this->sql = $this->conexao->query("DELETE FROM gestor WHERE id='$this->id'");
        $this->sql->execute();
    }
}
