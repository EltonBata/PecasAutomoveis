<?php
include_once '../models/Cliente.php';


class verClienteControler{
    private $cliente;
    private $dados;

    public function Clientes()
    {

        $this->cliente = new Cliente();
        $this->dados = $this->cliente->selectAll();
        return $this->dados;
    }

    public function totalClientes()
    {
        $this->cliente = new Cliente();
        $this->dados = $this->cliente->count();
        return $this->dados;
    }


}
$verClienteContoler= new verClienteControler();
$totalClientes = $verClienteContoler->totalClientes();
$cliente=$verClienteContoler->Clientes();