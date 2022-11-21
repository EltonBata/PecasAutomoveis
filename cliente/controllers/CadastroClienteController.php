<?php
session_start();
include_once '../models/Cliente.php';
include_once '../../gestao/models/Perfil.php';

class CadastroClienteController
{

    private $nome;
    private $apelido;
    private $email;
    private $nr_bi;
    private $contactos;
    private $morada;
    private $cliente;
    private $id_cliente;
    private $operacao;
    private $dados;
    private $senha;
    private $senha2;
    private $perfil;

    public function cadastar()
    {

        if ($_SERVER['REQUEST'] = 'POST') {

            $this->nome = trim($_POST['nome']);
            $this->apelido = trim($_POST['apelido']);
            $this->email = $_POST['email'];
            $this->nr_bi = $_POST['nr_bi'];
            $this->contactos = $_POST['contactos'];
            $this->morada = $_POST['morada'];

            $this->dados = [
                'nome' => $this->nome,
                'apelido' => $this->apelido,
                'email' => $this->email,
                'morada' => $this->morada,
                'nr_bi' => $this->nr_bi,
                'contactos' => $this->contactos,
            ];

            $this->cliente = new Cliente();
            $this->operacao = $this->cliente->insert($this->dados);

            if ($this->operacao == 1) {

                $this->id_cliente = $this->cliente->selectLast()->id;
                $this->senha = $_POST['senha'];
                $this->senha2 = $_POST['senha2'];

                $this->perfil = new Perfil();

                if($this->senha != $this->senha2){
                    $this->cliente->deleteLast();
                    $_SESSION['erro'] = "Inseriu senhas incorrectas";
                    header('location: ../views/cadastroCliente.php');
                }else{
                    $this->dados = [
                        'username' => $this->nome." ".$this->apelido,
                        'senha' => password_hash($this->senha, PASSWORD_BCRYPT),
                        'id_cliente' => $this->id_cliente,
                        'id_administrador' => null,
                        'id_gestor' => null,
                        'perfil' => 'cliente'
                    ];

                    $this->operacao = $this->perfil->insert($this->dados);

                    if($this->operacao == 1){

                        $_SESSION['cliente'] = $this->id_cliente;
                        $_SESSION['sucesso'] = "Cadastro efectuado com sucesso";
                        $_SESSION['user'] = $this->nome." ".$this->apelido;
                        header("location: ../views/index.php");
                    }else{
                        $this->cliente->deleteLast();
                        $_SESSION['erro'] = "Erro ao tentar cadastrar. Tente novamente";
                        header("location: ../views/cadastroCliente.php");            
                    }
                }

            } else {
                $_SESSION['erro'] = "Erro ao tentar cadastrar. Tente novamente";
                header("location: ../views/cadastroCliente");
            }
        }
    }
}

$cadastro = new CadastroClienteController();
$cadastro->cadastar();

?>