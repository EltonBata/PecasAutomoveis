<?php
session_start();
include_once '../models/Compra.php';

if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}

class Head
{
    private $perfil;
    private $username;
    private $userLetra;
    private $id;
    private $compras;

    function __construct()
    {
        if (isset($_SESSION['username']) && isset($_SESSION['perfil']) && isset($_SESSION['id'])) {

            $this->perfil = $_SESSION['perfil'];
            $this->username = $_SESSION['username'];
            $this->id = $_SESSION['id'];
            $this->userLetra = $this->username[0];
        }
    }


    public function getUserName()
    {
        return $this->username;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function getUserLetra()
    {
        return $this->userLetra;
    }

    public function getId()
    {
        return $this->id;
    }

    public function totalComprasPendentes()
    {
        $this->compras = new Compra();
        $this->dados = $this->compras->countStatus();
        return $this->dados;
    }
}

$head = new Head();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/gestaoHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/jquery.js"></script>
</head>

<body>

    <div class="container-fluid head shadow">
        <nav class="navbar navbar-expand-sm">
            <a href="#" class="navbar-brand">
                <img src="../../assets/fotos/logo.png" alt="" class="logo">
            </a>
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a href="./verPecas.php" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item user-parent dropdown dropstart">

                    <a href="" class="nav-link user rounded-circle dropdown-toggle" data-bs-toggle="dropdown"><?php echo $head->getUserLetra(); ?></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header"><?php echo $head->getUserName(); ?></li>
                        <li>
                            <a href="#" data-bs-toggle='modal' data-bs-target="#alterar-senha" class="dropdown-item" <?php if($head->getPerfil() == "gestor"){ ?> hidden <?php } ?>>Mudar minha senha</a>
                        </li>
                        <li>
                            <a href="../controllers/LogoutController.php" class="dropdown-item">Logout</a>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>
    </div>

    <div class="modal" id="alterar-senha">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-key"></i> Alterar senha</h4>
                </div>

                <div class="modal-body">
                    Deseja alterar a tua senha?
                </div>

                <div class="modal-footer">
                    <a href="../controllers/AlterarSenhaController.php?id=<?php echo $head->getId(); ?>" class="btn btn-danger">Sim</a>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Não</button>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid principal p-0">

        <div class="container menu col-sm-2 mt-0">
            <nav class="navbar">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./novaPeca.php" class="nav-link"><i class="fa-solid fa-wrench"></i> Nova Peca</a>
                    </li>
                    <li class="nav-item">
                        <a href="./verPecas.php?status=disponivel" class="nav-link"><i class="fa-solid fa-eye"></i> Pecas Disponiveis</a>
                    </li>
                    <li class="nav-item">
                        <a href="./verPecas.php?status=indisponivel" class="nav-link"><i class="fa-solid fa-eye-slash"></i> Pecas Indisponiveis</a>
                    </li>
                    <hr>
                    <li class="nav-item d-flex align-items-center">
                        <a href="./compras.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i> Compras</a>
                        <span class="rounded-circle ms-2 d-flex justify-content-center align-items-center"><?php echo $head->totalComprasPendentes(); ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="./clientes.php" class="nav-link"><i class="fa-solid fa-users-gear"></i> Clientes</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="./feedback.php" class="nav-link"><i class="fa-solid fa-comment"></i> Feedbacks</a>
                        <span class="rounded-circle ms-2 d-flex justify-content-center align-items-center">5</span>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a href="./adicionarFuncionario.php" class="nav-link" <?php if($head->getPerfil() == "gestor"){ ?> hidden <?php } ?>><i class="fa-solid fa-user-plus"></i> Novo Funcionario</a>
                    </li>
                    <li class="nav-item">
                        <a href="./Gestores.php" class="nav-link"><i class="fa-solid fa-user-gear"></i> Funcionarios</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a href="./Estatisticas.php" class="nav-link"><i class="fa-solid fa-chart-line"></i> Estatisticas</a>
                    </li>
                </ul>
            </nav>

        </div>