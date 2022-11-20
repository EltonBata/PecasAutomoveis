<?php 
session_start();
include_once '../models/Compra.php';


class registrarCompraController
{
    private $metodo;
    private $numero;
    private $compra;
    private $operacao;
    private $dados = [];
    private $id_metodo;
    private $preco_total;
    private $quantidade_total;
    private $local_entrega;
    private $data_entrega;
    private $data_compra;
    private $id_compra;
    private $id_peca;
    private $preco;
    private $quantidade;

    public function registrarCompra(){

        $this->compra = new Compra();

        if($_SERVER['REQUEST'] = 'POST'){

            $this->metodo = $_POST['metodo'];
            $this->numero = $_POST['numero'];
            
            $this->dados = [
                'metodo' => $this->metodo,
                'numero' => $this->numero
            ];

            $this->operacao = $this->compra->insertMetodo($this->dados);

            if($this->operacao == 1){

                $this->id_metodo = $this->compra->selectLastMetodo()->id;

                $this->preco_total = $_POST['preco_total'];
                $this->data_entrega = $_POST['data_entrega'];
                $this->local_entrega = $_POST['local_entrega'];
                $this->quantidade_total = $_POST['quantidade_total'];
                $this->data_compra = date('Y-m-d');

                $this->dados = [
                    'total_pago' => $this->preco_total,
                    'data_entrega' => $this->data_entrega,
                    'data_compra' => $this->data_compra,
                    'local_entrega' => $this->local_entrega,
                    'quantidade_total' => $this->quantidade_total,
                    'id_metodo' => $this->id_metodo,
                    'id_cliente' => 1,
                    'estado' => 'pendente',
                    'desconto' => 0
                ];
               

                $this->operacao = $this->compra->insert($this->dados);

                if($this->operacao == 1){

                    $this->id_compra = $this->compra->selectLastCompra()->id;

                    foreach ($_SESSION['carrinho'] as $key => $value) {
                        
                        $this->id_peca = $value;

                        $this->preco = $_POST['preco'.$value];
                        $this->quantidade = $_POST['quantidade'.$value];

                        $this->dados = [
                            'quantidade' => $this->quantidade,
                            'preco' => $this->preco,
                            'id_peca' => $this->id_peca,
                            'id_compra' => $this->id_compra,
                        ];

                        $this->operacao = $this->compra->insertCompraPeca($this->dados);

                        if(!$this->operacao == 1){
                            $_SESSION['erro'] = "Não foi possivel efectuar a compra";
                            $this->compra->deleteMetodo();
                            $this->compra->deleteCompra();
                            header("location: ../views/index.php");
                        }

                    }

                }else{
                    $_SESSION['erro'] = "Não foi possivel efectuar a compra";
                    $this->compra->deleteMetodo();
                    header("location: ../views/index.php");
                }

            }else{
                $_SESSION['erro'] = "Não foi possivel efectuar a compra";
                header("location: ../views/index.php");
            }

        }






    }


}

$registra = new registrarCompraController();
$registra->registrarCompra();

?>