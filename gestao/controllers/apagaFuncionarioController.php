<?php
include_once '../models/Administrador.php';

class apagaFuncionarioController
{
    private $perfil;
    private $funcionario;
    private $operacao;
    private $id;

    function apaga(){
        if($_GET['perfil'] && $_GET['id']){
            $this->perfil = $_GET['perfil'];
            $this->id = $_GET['id'];
            
            if($this->perfil == 'admin'){
                $this->funcionario = new Administrador();
                $this->operacao = $this->funcionario->delete($this->id);
            }else{
                $this->funcionario = new Gestor();
                $this->operacao = $this->funcionario->delete($this->id);
            }
        }
    }
}


?>