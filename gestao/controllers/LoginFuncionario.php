<?php
session_start();
include '../models/LoginFun.php';
include_once '../../config/db.php';

 class LoginFuncionario{
    private $passaword;
    private $username;
    private $data;
    private $perfil;
    private $sql;
    private $dados;
    private $senhaVerificada;

public function verificar(){

    $passaword=$_POST['password'];
    $data=[
        'username'=>$_POST['username']
          ];

    $login= new Loginfun();

    $sql="SELECT * FROM perfil WHERE username =:username";
    //$sql= $login->finde([':username'=> $username]);
    $dados = $login->readOne($sql, $data);
    $senhaUser = $dados['senha'];
    $perfil=$dados['perfil'];
    $senhaVerificada = password_verify($passaword, $senhaUser) ? $senhaUser : null ;
   

    if ($senhaVerificada != null){

        $sql = "SELECT * FROM perfil WHERE username= :username AND senha = :senha AND perfil = :perfil";
    

    
    $data = [
        'username' => $_POST['username'],
        'senha' => $senhaUser,
        'perfil' => $perfil,
    ];

    $contaVerificada =$login->countRow($sql, $data);
    if ($contaVerificada == 1) {
    
    if ($dados['perfil']=='admin'){

        header("location: ../views/verPecas.php");
        $_SESSION['log'] = "BEM VINDO ".$dados['username'];
        $_SESSION['pass']= $dados['username'];

    } else{

    if($dados['perfil']=='gestor'){

        header("location: ../views/verPecas.php");
        $_SESSION['log'] = " <p style='text-align:center'>BEM VINDO </p>".$dados['username'];
        $_SESSION['pass']= $dados['username'];
     

    }
    else{
    
        $error = "<p>Usuario ou Senha incorrectos!</p>";

            $_SESSION['erro'] = $error;
            header("location: ../views/index.php");
        }
}
    
}else
{
    $error = "<p>Usuario ou Senha incorrectos! por favor tente novamente</p>";

    $_SESSION['erro'] = $error;
    header("location:../views/index.php");
}

 } else{
    $error = "<p>Usuario ou Senha incorrectos!</p>";

    $_SESSION['erro'] = $error;
    header("location:../index.php");
 }

}

}
$log= new LoginFuncionario;
$log->verificar();

