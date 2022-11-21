<?php
include_once '../models/Compra.php';
include_once '../models/Peca.php';


class DetalhesCompraController
{

    private $compra;
    private $dados;
    
    public function actualizaEstado($id){

        $this->compra = new Compra();

        $this->compra->updateEstado($id);

    }

    public function viewCompra($id){

        $this->compra = new Compra();

        $this->dados = $this->compra->selectOne($id);
        return $this->dados;
    }

    public function viewPecas($id){

        $this->peca = new Peca();

        $this->dados = $this->peca->selectOneCompra($id);
        return $this->dados;
    }


}

?>
