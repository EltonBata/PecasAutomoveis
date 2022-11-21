<?php
session_start();

include '../../gestao/models/Perfil.php';

class LoginFuncionario
{

    private $password;
    private $username;
    private $dados;
    private $verificaSenha;

    public function verificar()
    {

        if ($_SERVER['REQUEST'] = 'POST') {

            $this->password = trim($_POST['password']);

            $this->username = trim($_POST['username']);

            $this->login = new Perfil();

            $this->dados = $this->login->login($this->username);

            if (!empty($this->dados)) {

                $this->senhaUser = $this->dados->senha;

                $this->verificaSenha = password_verify($this->password, $this->senhaUser);

                if($this->dados->perfil == 'cliente'){
                    if ($this->verificaSenha) {
                   
                        $_SESSION['cliente'] = $this->dados->id_cliente;
                        $_SESSION['user'] = $this->dados->username;
                        
                        header("location: ../views/index.php");

                } else {
                    $_SESSION['erro'] =  "Usuario ou Senha incorrectos";
                    header("location:../views/login.php");
                }
                }if ($this->verificaSenha) {
                   
                    $_SESSION['cliente'] = $this->dados->id_cliente;
                    $_SESSION['user'] = $this->dados->username;
                    
                    header("location: ../views/index.php");

            } else {
                $_SESSION['erro'] =  "Usuario ou Senha incorrectos";
                header("location:../views/login.php");
            }
            } else {
                
                $_SESSION['erro'] =  "Usuario ou Senha incorrectos";
                header("location:../views/login.php");
            }
        }
    }
}
$log = new LoginFuncionario();
$log->verificar();