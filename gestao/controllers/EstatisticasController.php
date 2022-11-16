<?php
include_once '../models/Estatisticas.php';


class EstatisticasController
{
    private $estatistica;
    private $count;
    private $dados = [];

    public function totalAdmin()
    {
        $this->estatistica = new Estatisticas();
        $this->count = $this->estatistica->totalAdmin();
        return $this->count;
    }

    public function totalGestor()
    {
        $this->estatistica = new Estatisticas();
        $this->count = $this->estatistica->totalGestor();
        return $this->count;
    }

    public function totalFunc()
    {
        $this->count = $this->totalAdmin() + $this->totalGestor();
        return $this->count;
    }

    public function totalCompras()
    {
        $this->estatistica = new Estatisticas();
        $this->count = $this->estatistica->totalCompras();
        return $this->count;
    }

    public function totalComprasPendentes()
    {
        $this->estatistica = new Estatisticas();
        $this->count = $this->estatistica->comprasPendentes();
        return $this->count;
    }

    public function totalComprasEntregues()
    {
        $this->estatistica = new Estatisticas();
        $this->count = $this->estatistica->comprasEntregues();
        return $this->count;
    }

    public function pecas()
    {

        $this->estatistica = new Estatisticas();
        $this->dados = $this->estatistica->pecas();
        return $this->dados;
    }

    public function totalPecas()
    {
        $this->estatistica = new Estatisticas();
        $this->count = $this->estatistica->totalPecas();
        return $this->count;
    }
}

$estatistica = new EstatisticasController();
$admins = $estatistica->totalAdmin();
$gestores = $estatistica->totalGestor();
$funcs = $estatistica->totalFunc();
$compras = $estatistica->totalCompras();
$cPendentes = $estatistica->totalComprasPendentes();
$cEntregues = $estatistica->totalComprasEntregues();
$pecas = $estatistica->pecas();
$totalpecas = $estatistica->totalPecas();
