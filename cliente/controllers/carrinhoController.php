<?php
session_start();
include_once '../models/Peca.php';

class carrinhoController
{

    private $id;
    private $peca;
    private $dados = [];

    public function adicionaCarrinho()
    {

        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];

            if (isset($_SESSION['carrinho'])) {

                if (count($_SESSION['carrinho']) <= 5) {
                    if (in_array($this->id, $_SESSION['carrinho'])) {
                        $_SESSION['alerta'] = "Este item ja foi adicionado ao carrinho.";
                        header("location: ../views/index.php");
                    } else {
                        $_SESSION['carrinho'][count($_SESSION['carrinho'])] = $this->id;
                        header("location: ../views/index.php");
                    }
                } else {
                    $_SESSION['alerta'] = "Nao eh permitido adicionar mais de 5 itens ao carrinho";
                    header("location: ../views/index.php");
                }
            } else {
                $_SESSION['carrinho'][0] = $this->id;
                header("location: ../views/index.php");
            }
            
        }
    }

    public function contaCarrinho(){
        if(isset($_SESSION['carrinho'])){
            return count($_SESSION['carrinho']);
        }else{
            return '0';
        }
    }

    public function selectPecaId($id){

        $this->peca = new Peca();
        $this->dados = $this->peca->selectOne($id);
        return $this->dados;
    }
}

$carrinho = new carrinhoController();
$carrinho->adicionaCarrinho();

?>