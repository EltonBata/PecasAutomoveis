<?php
include_once '../models/Peca.php';
include_once '../models/Upload.php';

class VerPecasController
{

    private $peca;
    private $dados;
    private $status = null;
    private $total;

    public function verPeca()
    {
        $this->peca = new Peca();

        if (isset($_GET['status'])) {
            $this->status = $_GET['status'];
            $this->dados = $this->peca->selectStatus($this->status);
        } else {
            $this->dados = $this->peca->selectAll();
        }

        return $this->dados;
    }

    public function totalPeca()
    {
        $this->peca = new Peca();

        if (isset($_GET['status'])) {
            $this->status = $_GET['status'];
            $this->total = $this->peca->countStatus($this->status);
        } else {
            $this->total = $this->peca->count();
        }

        return $this->total;
    }

    public function upload($id)
    {

        $this->peca = new Upload();
        $this->dados = $this->peca->selectOne($id);
        return $this->dados;
    }
}

$verPeca = new VerPecasController();
$peca = $verPeca->verPeca();
$total = $verPeca->totalPeca();
