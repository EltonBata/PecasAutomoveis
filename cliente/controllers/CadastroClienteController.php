<?php
session_start();
include_once '../models/Cliente.php';

class CadastroClienteController
{

    private $nome;
    private $apelido;
    private $email;
    private $nr_bi;
    private $contactos;
    private $morada;
    private $cliente;
    private $operacao;
    private $dados;

    public function cadastar()
    {

        if ($_SERVER['REQUEST'] = 'POST') {

            $this->nome = $_POST['nome'];
            $this->apelido = $_POST['apelido'];
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
                $_SESSION['sucesso'] = "Cadastro efectuado com sucesso";
                $_SESSION['user'] = $this->nome." ".$this->apelido;
                header("location: ../index.php");
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