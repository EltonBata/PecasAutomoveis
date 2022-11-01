<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/gestaoHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="container-fluid head shadow">
        <nav class="navbar navbar-expand-sm">
            <a href="#" class="navbar-brand">
                <img src="../../assets/fotos/logo.png" alt="" class="logo">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="./verPecas.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Logout(Elton Bata)</a>
                </li>
            </ul>
        </nav>
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
                        <span class="rounded-circle ms-2 d-flex justify-content-center align-items-center">5</span>
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
                        <a href="./adicionarFuncionario.php" class="nav-link"><i class="fa-solid fa-user-plus"></i> Novo Funcionario</a>
                    </li>
                    <li class="nav-item">
                        <a href="./funcionarios.php" class="nav-link"><i class="fa-solid fa-user-gear"></i> Funcionarios</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a href="./gestao.php" class="nav-link"><i class="fa-solid fa-list-check"></i> Gestao</a>
                    </li>
                </ul>
            </nav>

        </div>