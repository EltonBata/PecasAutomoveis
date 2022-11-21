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
    private $contacto1;
    private $contacto2;
    private $perfil;
    private $id_gestor = null;
    private $id_administrador = null;
    private $id_cliente = null;
    private $senha = "";


    public function adiciona()
    {
        if ($_SERVER['REQUEST'] = 'POST') {

            //Dados vindo do Formulario
            $this->nome = trim($_POST['nome']);
            $this->apelido = trim($_POST['apelido']);
            $this->data_nasc = trim($_POST['data_nasc']);
            $this->nacionalidade = trim($_POST['nacionalidade']);
            $this->nr_bi = trim($_POST['nrBI']);
            $this->sexo = trim($_POST['sexo']);
            $this->morada = trim($_POST['morada']);
            $this->email = trim($_POST['email']);
            $this->contacto1 = trim($_POST['contacto1']);
            $this->contacto2 = trim($_POST['contacto2']);
            $this->perfil = trim($_POST['perfil']);
            $this->senha = rand(1000,9999);


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
                'contactos' => $this->contacto1.", ".$this->contacto2
            ];

            $this->perfis = new Perfil();

            //Validacao do perfil
            if ($this->perfil == 'admin') {
                //caso o perfil seja Administrador os dados serao inseridos na tabela Administrador
                $this->funcionario = new Administrador();
                $this->operacao = $this->funcionario->insert($this->dados);

                //verifica se os dados foram inseridos na tabela Administrador
                if ($this->operacao == 1) {
                    
                    //pega o id do administrador recem registrado
                    $this->id_administrador = $this->funcionario->getLast()->id;
                    
                    $this->dadosPerfil = [
                        'username' => $this->nome." ".$this->apelido,
                        'senha' => password_hash($this->senha, PASSWORD_BCRYPT),
                        'perfil' => $this->perfil,
                        'id_gestor' => $this->id_gestor,
                        'id_administrador' => $this->id_administrador,
                        'id_cliente' => $this->id_cliente
                    ];

                    $this->operacaoPerfil = $this->perfis->insert($this->dadosPerfil);
                   
                    //verifica se o perfil adm foi inserido
                    if ($this->operacaoPerfil == 1) {

                        $_SESSION['sucesso'] = "Administrador(a) inserido(a) com sucesso. A sua senha é $this->senha";
                        header("location: ../views/Administradores.php");
                    } else {
                        
                        //caso o perfil nao seja adicionado o ultimo administrador sera apagado
                        $this->funcionario->deleteLast();
                        $_SESSION['erro'] = "Administrador(a) não inserido!";
                        header("location: ../views/Administradores.php");
                    }
                } else {
                    $_SESSION['erro'] = "Administrador(a) não inserido!";
                    header("location: ../views/Administradores.php");
                }


                ///////////////////////////////////////////////////////////////////////////////////////////
            } else {
                //caso o perfil seja Gestor os dados serao inseridos na tabela Gestor
                $this->funcionario = new Gestor();
                $this->operacao = $this->funcionario->insert($this->dados);

                //verifica se os dados foram inseridos
                if ($this->operacao == 1) {

                    //pega o id do administrador recem registrado
                    $this->id_gestor = $this->funcionario->getLast()->id;

                    $this->dadosPerfil = [
                        'username' => $this->nome."".$this->apelido,
                        'senha' => password_hash($this->senha, PASSWORD_BCRYPT),
                        'perfil' => $this->perfil,
                        'id_gestor' => $this->id_gestor,
                        'id_administrador' => $this->id_administrador,
                        'id_cliente' => $this->id_cliente
                    ];

                    $this->operacaoPerfil = $this->perfis->insert($this->dadosPerfil);

                    //verifica se o perfil adm foi inserido
                    if ($this->operacaoPerfil == 1) {

                        $_SESSION['sucesso'] = "Gestor(a) inserido(a) com sucesso.  A sua senha é $this->senha";
                        header("location: ../views/Gestores.php");
                    } else {
                        //caso o perfil nao seja adicionado o ultimo administrador sera apagado
                        $this->funcionario->deleteLast();
                        $_SESSION['erro'] = "Gestor(a) não inserido!";
                        header("location: ../views/Gestores.php");
                    }

                } else {
            
                    $_SESSION['erro'] = "Gestor(a) não inserido!";
                    header("location: ../views/Gestores.php");
                }
            }
        }
    }
}

$adicionaFuncionario = new AdicionaFuncionarioController();
$adicionaFuncionario->adiciona();
