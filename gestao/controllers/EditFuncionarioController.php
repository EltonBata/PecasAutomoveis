<?php
session_start();
include_once '../models/Gestor.php';
include_once '../models/Administrador.php';
include_once '../models/Perfil.php';

class EditFuncionarioController
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



    public function update()
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
            $this->contactos = trim($_POST['contactos']);
            $this->perfil = trim($_POST['perfil']);


            $this->perfis = new Perfil();

            if (isset($_GET['id'])) {

                $this->id = $_GET['id'];


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
                    'contactos' => $this->contactos,
                    'id' => $this->id
                ];

                $this->dadosPerfil = [
                    'username' => $this->nome,
                    'id' => $this->id
                ];


                //Validacao do perfil
                if ($this->perfil == 'admin') {
                    //caso o perfil seja Administrador os dados serao actualizados na tabela Administrador
                    $this->funcionario = new Administrador();
                    $this->operacao = $this->funcionario->update($this->dados);

                    //verifica se os dados foram acualizados na tabela Administrador
                    if ($this->operacao == 1) {

                        $this->operacaoPerfil = $this->perfis->updateAdmin($this->dadosPerfil);

                        if($this->operacaoPerfil == 1){

                            $_SESSION['sucesso'] = "Administrador(a) actualizado(a) com sucesso.";
                            header("location: ../views/Administradores.php");
                        }
                       
                    } else {
                        
                        $_SESSION['erro'] = "Administrador(a) n??o actualizado(a)!";
                        header("location: ../views/Administradores.php");
                    }


                    ///////////////////////////////////////////////////////////////////////////////////////////
                } else {
                    //caso o perfil seja Gestor os dados serao actualizados na tabela Gestor
                    $this->funcionario = new Gestor();
                    $this->operacao = $this->funcionario->update($this->dados);

                    //verifica se os dados foram actualizados
                    if ($this->operacao == 1) {

                        $this->operacaoPerfil = $this->perfis->updateGestor($this->dadosPerfil);

                        if($this->operacaoPerfil == 1){

                        }
                        
                        $_SESSION['sucesso'] = "Gestor(a) actualizado(a) com sucesso.";
                        header("location: ../views/Gestores.php");
                    } else {
                        
                        $_SESSION['erro'] = "Gestor(a) n??o actualizado(a)!";
                        header("location: ../views/Gestores.php");
                    }
                }
            }
        }
    }
}

$adicionaFuncionario = new EditFuncionarioController();
$adicionaFuncionario->update();
