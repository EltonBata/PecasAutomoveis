<?php
session_start();
include_once '../models/Peca.php';
include_once '../models/Upload.php';

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
    private $pasta;
    private $temporario;
    private $novoNome;
    private $id;
    private $formatos = [];
    private $extensao;
    private $nrArquivos;
    private $contador;
    private $contador2 = 0;
    private $controlador = true;
    private $upload;

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

                //upload
                $this->id = $this->peca->getLast()->id;

                mkdir("../../uploads/$this->id", 0700);

                $this->formatos = ['png', 'jpg', 'jpeg', 'git'];
                $this->nrArquivos = count($_FILES['fotos']['name']);
                $this->contador = 0;

                while ($this->contador < $this->nrArquivos) {

                    $this->extensao = pathinfo($_FILES['fotos']['name'][$this->contador], PATHINFO_EXTENSION);

                    if (in_array($this->extensao, $this->formatos)) {

                        $this->pasta = "../../uploads/$this->id/";
                        $this->temporario = $_FILES['fotos']['tmp_name'][$this->contador];
                        $this->novoNome = uniqid() . "." . $this->extensao;

                        if (!move_uploaded_file($this->temporario, $this->pasta . $this->novoNome)) {
                            $this->controlador = false;
                            $this->contador2++;
                        } else {
                            $this->upload = new Upload();

                            $this->dados = [
                                'nome' => $this->novoNome,
                                'id_peca' => $this->id,
                            ];

                            $this->operacao = $this->upload->insert($this->dados);
                        }
                    }

                    $this->contador++;
                }

                if (!$this->controlador) {
                    $_SESSION['alerta'] = "Peca adicionada com sucesso. Porem não foi possivel fazer upload de $this->contador2 fotos";
                } else {
                    $_SESSION['sucesso'] = "Peca adicionada com sucesso";
                }

                header("location: ../views/verPecas.php");
            } else {
                $this->peca->deleteLast();
                $this->id = $this->peca->getLast()->id;
                rmdir("../../uploads/$this->id/");
                $_SESSION['erro'] = "Erro ao tentar adicionar peca!";
                header("location: ../views/verPecas.php");
            }
        }
    }
}


$adicionaPeca = new AdicionaPecaController();
$adicionaPeca->adicionaPeca();
