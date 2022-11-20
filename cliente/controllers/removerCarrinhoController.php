<?php 
session_start();
class removerCarrinhoController
{

    private $id;
    private $array = [];
    private $i;

    public function removerCarrinho(){

        if(isset($_GET['id'])){

            $this->id = $_GET['id'];

            $this->i = 0;
            foreach ($_SESSION['carrinho'] as $key => $value) {
                
                if($value != $this->id){
                    $this->array[$this->i] = $value;
                    $this->i++;
                }
            }

            if(empty($this->array)){
                unset($_SESSION['carrinho']);
            }else{
                $_SESSION['carrinho'] = $this->array;
            }
            
            header("location: ../views/carrinho.php");
        }


    }

}

$remove = new removerCarrinhoController();
$remove->removerCarrinho();





?>