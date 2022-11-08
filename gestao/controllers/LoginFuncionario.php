<?php
session_start();
include '../models/Perfil.php';
include_once '../../config/db.php';

class LoginFuncionario
{

    private $password;
    private $username;
    private $dados;
    private $verificaSenha;

    public function verificar()
    {

        if ($_SERVER['REQUEST'] = 'POST') {

            $this->password = $_POST['password'];

            $this->username = $_POST['username'];

            $this->login = new Perfil();

            $this->dados = $this->login->login($this->username);

            if (!empty($this->dados)) {

                $this->senhaUser = $this->dados->senha;

                $this->verificaSenha = password_verify($this->password, $this->senhaUser);

                if ($this->verificaSenha) {
                    $_SESSION['username'] = $this->dados->username;
                    $_SESSION['perfil'] = $this->dados->perfil;
                    header("location: ../views/verPecas.php");
                } else {
                    $_SESSION['erro'] =  "Usuario ou Senha incorrectos";
                    header("location:../index.php");
                }
            } else {
                $_SESSION['erro'] =  "Usuario ou Senha incorrectos";
                header("location:../index.php");
            }
        }
    }
}
$log = new LoginFuncionario();
$log->verificar();
