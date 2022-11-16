<?php
session_start();
include_once '../models/Peca.php';

class EditPecaController
{
    private $id;
    private $peca;
    private $operacao;
    private $dados;

    public function editPeca()
    {

        if ($_SERVER['REQUEST'] = 'POST') {

            $this->nome = $_POST['nome'];
            $this->tamanho = $_POST['tamanho'];
            $this->marca = $_POST['marca'];
            $this->quantidade = $_POST['quantidade'];
            $this->data_fabrico = $_POST['data_fabrico'];
            $this->local_fabrico = $_POST['local_fabrico'];
            $this->preco = $_POST['preco'];
            $this->cor = $_POST['cor'];
            $this->status = $_POST['status'];
            $this->tipo = $_POST['tipo'];
            $this->id = $_POST['id'];

            $this->dados = [
                'nome' => $this->nome,
                'tipo' => $this->tipo,
                'tamanho' => $this->tamanho,
                'quantidade' => $this->quantidade,
                'data_fabrico' => $this->data_fabrico,
                'local_fabrico' => $this->local_fabrico,
                'cor' => $this->cor,
                'status' => $this->status,
                'preco' => $this->preco,
                'marca' => $this->marca,
                'id' => $this->id,
            ];

            $this->peca = new Peca();

            $this->operacao = $this->peca->update($this->dados);

            if ($this->operacao == 1) {
                $_SESSION['sucesso'] = "Peca actualizada com sucesso!";
                header("location: ../views/VerPecas.php");
            } else {
                $_SESSION['erro'] = "Erro ao tentar actualizar peca";
                header("location: ../views/VerPecas.php");
            }
        }
    }
}

$editPeca = new EditPecaController();
$editPeca->editPeca();
