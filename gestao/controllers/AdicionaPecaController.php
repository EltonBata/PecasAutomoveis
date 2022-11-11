<?php
session_start();
include_once '../models/Peca.php';

class AdicionaPecaController
{
    private $nome;
    private $tipo;
    private $tamanho;
    private $marca;
    private $quantidade;
    private $data_fabrico;
    private $local_fabrico;
    private $preco;
    private $cor;
    private $status;
    private $dados = [];
    private $peca;
    private $operacao;
    private $target_dir;
    private $target_file;
    private $id;
    private $formatos = [];
    private $extensao;

    public function adicionaPeca()
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
            ];

            $this->peca = new Peca();

            $this->operacao = $this->peca->insert($this->dados);

            if ($this->operacao == 1) {

                // //upload
                // $this->id = $this->peca->getLast()->id;

                // $this->formatos = ['png', 'jpg', 'jpeg', 'git'];

                // mkdir("../../uploads/$this->id", 0700);

                // $this->target_dir = "../../uploads/$this->id/";

                // $count = 0;
                // foreach ($_FILES as $file) {
                //     var_dump($file["name"][$count]);
                //     $this->target_file = $this->target_dir.$file['name'][$count];
                //     $this->extensao = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));

                //     if (in_array($this->extensao, $this->formatos)) {

                //         if (move_uploaded_file($file['tmp_name'][$count], $this->target_file)) {
                //             $_SESSION['sucesso'] = "Peca adicionada com sucesso";
                //            // header("location: ../views/verPecas.php?status=$this->status");
                //         } else {
                //             $this->peca->deleteLast();
                //             $this->id = $this->peca->getLast()->id;
                //             rmdir("../../uploads/$this->id/");
                //             $_SESSION['erro'] = "Erro ao tentar adicionar peca!";
                //            // header("location: ../views/verPecas.php");
                //         }
                    } else {
                        $this->peca->deleteLast();
                        $this->id = $this->peca->getLast()->id;
                        rmdir("../../uploads/$this->id/");
                        $_SESSION['erro'] = "Erro ao tentar adicionar peca!";
                       // header("location: ../views/verPecas.php");
                    }
                    
                }
            }
        }


$adicionaPeca = new AdicionaPecaController();
$adicionaPeca->adicionaPeca();
