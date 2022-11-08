<?php
session_start();
include_once '../models/Perfil.php';

class Login
{
    private $username;
    private $senha;
    private $perfil;
    private $operacao;
    private $dados = [];

    public function login()
    {

        if ($_SERVER['REQUEST'] = 'POST') {

            $this->username = $_POST['username'];
            $this->senha = $_POST['senha'];

            $this->dados = [
                'username' => $this->username,
                'senha' => $this->senha
            ];

            $this->perfil = new Perfil();

            $this->operacao = $this->perfil->login($this->dados);

            if($this->operacao == 1){

                "existe";
            }else{
                "nao existe";
            }
        }
    }
}

$login = new Login();
$login->login();