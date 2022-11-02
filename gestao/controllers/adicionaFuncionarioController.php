<?php
session_start();
include_once '../models/Gestor.php';
include_once '../models/Administrador.php';
include_once '../models/Perfil.php';

class AdicionaFuncionarioController
{
    private $funcionario;
    private $operacao;
    private $operacaoPerfil;
    private $dados = [];
    private $dadosPerfil = [];
    private $perfis;

    private $nome;
    private $apelido;
    private $data_nasc;
    private $nacionalidade;
    private $nr_bi;
    private $sexo;
    private $morada;
    private $email;
    private $contactos;
    private $perfil;
    private $id_gestor = null;
    private $id_administrador = null;
    

    public function adiciona()
    {
        if ($_SERVER['REQUEST'] = 'POST') {

            //Dados vindo do Formulario
            $this->nome = $_POST['nome'];
            $this->apelido = $_POST['apelido'];
            $this->data_nasc = $_POST['data_nasc'];
            $this->nacionalidade = $_POST['nacionalidade'];
            $this->nr_bi = $_POST['nrBI'];
            $this->sexo = $_POST['sexo'];
            $this->morada = $_POST['morada'];
            $this->email = $_POST['email'];
            $this->contactos = $_POST['contactos'];
            $this->perfil = $_POST['perfil'];

            //Os dados sao guardados no array dados[]
            $this->dados = [
                'nome' => $this->nome,
                'apelido' => $this->apelido,
                'data_nascimento' => $this->data_nasc,
                'nacionalidade' => $this->nacionalidade,
                'nr_bi' => $this->nr_bi,
                'sexo' => $this->sexo,
                'morada' => $this->morada,
                'email' => $this->email,
                'contactos' => $this->contactos
            ];

            $this->dadosPerfil = [
                'username' => $this->nome,
                'password' => $this->password,
                'perfil' => $this->perfil,
                'id_gestor' => $this->id_gestor,
                'id_administrador' => $this->id_administrador
            ];

            $this->perfis = new Perfil();

            //Validacao do perfil
            if ($this->perfil == 'admin') {
                //caso o perfil seja Administrador os dados serao inseridos na tabela Administrador
                $this->funcionario = new Administrador();
                $this->operacao = $this->funcionario->insert($this->dados);
                $this->operacaoPerfil = $this->perfis->insert($this->dadosPerfil);

                //verifica se os dados foram inseridos
                if ($this->operacao == 1 && $this->operacaoPerfil == 1) {
                    $_SESSION['sucesso'] = "Funcionario inserido com sucesso";
                    header("location: ../views/funcionarios.php");
                } else {
                    $_SESSION['erro'] = "Funcionario não inserido!";
                    header("location: ../views/funcionarios.php");
                }
            } else {
                //caso o perfil seja Gestor os dados serao inseridos na tabela Gestor
                $this->funcionario = new Gestor();
                $this->operacao = $this->funcionario->insert($this->dados);
                $this->operacaoPerfil = $this->perfis->insert($this->dadosPerfil);

                //verifica se os dados foram inseridos
                if ($this->operacao == 1 && $this->operacaoPerfil == 1) {
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

$adicionaFuncionario = new AdicionaFuncionarioController();
$adicionaFuncionario->adiciona();
