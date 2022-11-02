<?php
session_start();
include_once '../models/Administrador.php';
include_once '../models/Gestor.php';


class VerFuncionarioController
{
    private $perfil;
    private $funcionario;
    private $dados;

    public function getDados(){
        return $this->dados;
    }

    public function view()
    {

        if (isset($_POST['submit'])) {

            $this->perfil = $_POST['perfil'];

            if ($this->perfil == 'admin') {
                $this->funcionario = new Administrador();
                $this->dados = $this->funcionario->selectAll();
            } else {
                $this->funcionario = new Gestor();
                $this->dados = $this->funcionario->selectAll();
            }
        }else{
            $this->funcionario = new Gestor();
            $this->dados = $this->funcionario->selectAll();
        }
    }
}

$verFuncionario = new VerFuncionarioController();
$verFuncionario->view();
$dados = $verFuncionario->getDados();