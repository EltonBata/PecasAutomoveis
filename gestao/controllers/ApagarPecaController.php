<?php
session_start();
include_once '../models/Peca.php';

class ApagaPecaController
{
    private $peca;
    private $operacao;
    private $id;

    public function apagarPeca()
    {

        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
            $this->peca = new Peca();
            $this->operacao = $this->peca->delete($this->id);

            if ($this->operacao == 1) {
                $_SESSION['sucesso'] = "Peca apagada com sucesso!";
                header("location: ../views/verPecas.php");
            }else{
                $_SESSION['erro'] = "Erro ao tentar apagar peca";
                header("location: ../views/verPecas.php");
            }
        }
    }
}

$apagarPeca = new ApagaPecaController();
$apagarPeca->apagarPeca();