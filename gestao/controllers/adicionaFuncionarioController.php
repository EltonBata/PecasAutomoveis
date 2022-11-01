<?php
session_start();
include_once '../models/Gestor.php';

class adicionaFuncionarioController
{
    private $funcionario;
    private $operacao;
    private $dados = [];

    public function adiciona()
    {
        if ($_SERVER['REQUEST'] = 'POST') {

            //Dados vindo do Formulario
            $nome = $_POST['nome'];
            $apelido = $_POST['apelido'];
            $data_nasc = $_POST['data_nasc'];
            $nacionalidade = $_POST['nacionalidade'];
            $nr_bi = $_POST['nrBI'];
            $sexo = $_POST['sexo'];
            $morada = $_POST['morada'];
            $email = $_POST['email'];
            $contactos = $_POST['contactos'];
            $id_admin = 1;
            $perfil = $_POST['perfil'];

            //Os dados sao guardados no array dados[]
            $this->dados = [
                'nome' => $nome,
                'apelido' => $apelido,
                'data_nascimento' => $data_nasc,
                'nacionalidade' => $nacionalidade,
                'nr_bi' => $nr_bi,
                'sexo' => $sexo,
                'morada' => $morada,
                'email' => $email,
                'contactos' => $contactos
            ];

            //Validacao do perfil
            if ($perfil == 'admin') {
                //caso o perfil seja Administrador os dados serao inseridos na tabela Administrador
                //$this->funcionario = new Administrador();
            } else {
                //caso o perfil seja Gestor os dados serao inseridos na tabela Gestor
                $this->funcionario = new Gestor();
                $this->operacao = $this->funcionario->insert($this->dados);

                //verifica se os dados foram inseridos
                if ($this->operacao == 1) {
                    $_SESSION['sucesso'] = "Funcionario inserido com sucesso";
                    header("location: ../views/funcionarios.php");
                } else {
                    $_SESSION['erro'] = "Funcionario não inserido!";
                    header("location: ../views/funcionarios.php");
                }
            }
        }
    }
}

$adicionaFuncionario = new adicionaFuncionarioController();
$adicionaFuncionario->adiciona();
