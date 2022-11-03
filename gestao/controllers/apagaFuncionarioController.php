<?php
session_start();
include_once '../models/Administrador.php';
include_once '../models/Gestor.php';
include_once '../models/Perfil.php';

class ApagaFuncionarioController
{
    private $perfil;
    private $perfis;
    private $funcionario;
    private $operacao;
    private $operacaoPerfil;
    private $id;

    function apaga()
    {
        if (isset($_GET['perfil']) && isset($_GET['id'])) {
            $this->perfil = $_GET['perfil'];
            $this->id = $_GET['id'];

            $this->perfis = new Perfil();

            if ($this->perfil == 'admin') {
                $this->funcionario = new Administrador();
                $this->operacao = $this->funcionario->delete($this->id);
                $this->operacaoPerfil = $this->perfis->deleteAdmin($this->id);
                var_dump($this->operacao);
                if ($this->operacao == 1 && $this->operacaoPerfil == 1) {
                    $_SESSION['sucesso'] = "Administrador apagado com sucesso";
                    header("location: ../views/Administradores.php");
                } else {
                    $_SESSION['erro'] = "Administrador nao apagado!";
                    header("location: ../views/Administradores.php");
                }
            } else {
                $this->funcionario = new Gestor();
                $this->operacao = $this->funcionario->delete($this->id);
                $this->operacaoPerfil = $this->perfis->deleteGestor($this->id);

                if ($this->operacao == 1 && $this->operacaoPerfil == 1) {
                    $_SESSION['sucesso'] = "Gestor apagado com sucesso";
                    header("location: ../views/Gestores.php");
                } else {
                    $_SESSION['erro'] = "Gestor nao apagado!";
                    header("location: ../views/Gestores.php");
                }
            }
        }
    }
}

$apaga = new ApagaFuncionarioController();
$apaga->apaga();