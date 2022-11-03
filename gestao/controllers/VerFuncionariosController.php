<?php
session_start();
include_once '../models/Administrador.php';
include_once '../models/Gestor.php';


class VerFuncionarioController
{
    private $funcionario;
    private $dados;

    public function getDados()
    {
        return $this->dados;
    }

    public function administrador()
    {

        $this->funcionario = new Administrador();
        $this->dados = $this->funcionario->selectAll();
        return $this->dados;
    }

    public function totalAdministradores()
    {
        $this->funcionario = new Administrador();
        $this->dados = $this->funcionario->count();
        return $this->dados;
    }

    public function totalGestores()
    {
        $this->funcionario = new Gestor();
        $this->dados = $this->funcionario->count();
        return $this->dados;
    }

    public function gestor()
    {
        $this->funcionario = new Gestor();
        $this->dados = $this->funcionario->selectAll();
        return $this->dados;
    }
}

$verFuncionario = new VerFuncionarioController();
$admin = $verFuncionario->administrador();
$totalAdmin = $verFuncionario->totalAdministradores();
$gestor = $verFuncionario->gestor();
$totalGestores = $verFuncionario->totalGestores();
