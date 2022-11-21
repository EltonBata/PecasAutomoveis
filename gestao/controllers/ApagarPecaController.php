<?php
session_start();
include_once '../models/Peca.php';
include_once '../models/Upload.php';

class ApagaPecaController
{
    private $peca;
    private $operacao;
    private $id;
    private $folder;
    private $upload;
    private $operacao2;

    public function apagarPeca()
    {

        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
            $this->peca = new Peca();
            $this->operacao = $this->peca->delete($this->id);

            $this->upload = new Upload();
            $this->operacao2 = $this->upload->delete($this->id);

            $this->folder = glob("../../uploads/$this->id"."/*");
            
            foreach($this->folder as $file){

                if(is_file($file)){
                    unlink($file);
                }
            }

            rmdir("../../uploads/$this->id");
            
            if ($this->operacao == 1) {
                $_SESSION['sucesso'] = "Peca apagada com sucesso!";
                header("location: ../views/VerPecas.php");
            } else {
                $_SESSION['erro'] = "Erro ao tentar apagar peca";
                header("location: ../views/VerPecas.php");
            }
        }
    }
}

$apagarPeca = new ApagaPecaController();
$apagarPeca->apagarPeca();
