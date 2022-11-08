<?php
session_start();
include_once '../models/Perfil.php';
include_once '../models/Administrador.php';
include_once '../models/Gestor.php';


class AlterarSenhaController
{

    private $senha;
    private $perfil;
    private $perfis;
    private $funcionario;
    private $operacao;
    private $id;
    private $id_perfil;
    private $dados2 = [];
    private $dados = [];

    public function alterarSenha()
    {
        $this->senha = rand(1000, 9999);

        if (isset($_GET['id']) && isset($_GET['perfil'])) {
            $this->id = $_GET['id'];
            $this->perfil = $_GET['perfil'];

            $this->perfis = new Perfil();

            if ($this->perfil == 'admin') {

                $this->funcionario = new Administrador();
                $this->dados = $this->funcionario->selectOne($this->id);
                $this->id_perfil = $this->dados->id_perfil;

                $this->dados2 = [
                    'senha' => password_hash($this->senha, PASSWORD_BCRYPT),
                    'id' => $this->id_perfil
                ];

                $this->operacao = $this->perfis->alterarSenha($this->dados2);
                if ($this->operacao == 1) {
                    $_SESSION['sucesso'] = "Senha alterada com sucesso. A nova senha do(a) Administrador(a) " . $this->dados->nome . " " . $this->dados->apelido . " é $this->senha!";
                    header("location: ../views/Administradores.php");
                } else {
                    $_SESSION['erro'] = "Erro ao tentar alterar a senha";
                    header("location: ../views/Administradores.php");
                }
            } else {
                $this->funcionario = new Gestor();
                $this->dados = $this->funcionario->selectOne($this->id);
                $this->id_perfil = $this->dados->id_perfil;

                $this->dados2 = [
                    'senha' => password_hash($this->senha, PASSWORD_BCRYPT),
                    'id' => $this->id_perfil
                ];


                $this->operacao = $this->perfis->alterarSenha($this->dados2);
                if ($this->operacao == 1) {
                    $_SESSION['sucesso'] = "Senha alterada com sucesso. A nova senha do(a) Gestor(a) " . $this->dados->nome . " " . $this->dados->apelido . " é $this->senha!";
                    header("location: ../views/Gestores.php");
                } else {
                    $_SESSION['erro'] = "Erro ao tentar alterar a senha";
                    header("location: ../views/Gestores.php");
                }
            }
        }
    }
}

$alterarSenha = new AlterarSenhaController();
$alterarSenha->alterarSenha();
