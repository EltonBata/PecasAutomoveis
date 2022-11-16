<?php
include_once '../models/Peca.php';
include_once '../models/Upload.php';

class ClienteIndex
{

    private $peca;
    private $operacao;
    private $dados = [];
    private $marca;
    private $tipo;
    private $carrinho = [];

    public function peca()
    {
        $this->peca = new Peca();

        if(!isset($_GET['marca'])){
            if(!isset(($_GET['tipo']))){
            
                $this->dados = $this->peca->selectAll();
                return $this->dados;
            }else{
                $this->tipo = $_GET['tipo'];
                $this->dados = $this->peca->selectByPeca($this->tipo);
                return $this->dados;
            }
        }else{
                 
            $this->marca = $_GET['marca'];
            $this->dados = $this->peca->selectByMarca($this->marca);
            return $this->dados;
            
        }
    }

    public function selectNomes(){
        $this->peca = new Peca();
        $this->dados = $this->peca->selectAllNome();
        return $this->dados;
    }

    public function selectMarcas(){
        $this->peca = new Peca();
        $this->dados = $this->peca->selectAllMarcas();
        return $this->dados;
    }

    public function upload($id)
    {
        $this->peca = new Upload();
        $this->dados = $this->peca->selectOne($id);
        return $this->dados;
    }

   
    
}


$index = new ClienteIndex();
$dados = $index->peca();
$nomes = $index->selectNomes();
$marca = $index->selectMarcas();

?>