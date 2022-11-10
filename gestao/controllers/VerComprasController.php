<?php

include_once '../models/Compra.php';



class VerComprasController
{
    private $compra;
    private $dados;

    public function getDados()
    {
        return $this->dados;
    }

    public function compras()
    {

        $this->compra = new Compra();
        $this->dados = $this->compra->selectAll();
        return $this->dados;
    }

    public function totalCompras()
    {
        $this->funcionario = new Compra();
        $this->dados = $this->funcionario->count();
        return $this->dados;
    }

    
}

$verCompras = new VerComprasController();
$compras = $verCompras->compras();
$totalCompras = $verCompras->totalCompras();

