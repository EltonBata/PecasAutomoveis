<?php include_once '../controllers/carrinhoController.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/clienteIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>


    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../assets/fotos/logo.png" alt="">
            </a>
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <?php if (!isset($_SESSION['cliente'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/cadastroCliente.php"><i class="fa-solid fa-user-plus"></i>
                            Cadastrar-se</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-circle-info"></i> Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-phone"></i> Contacte-nos</a>
                </li>
                <li class="nav-item carrinho">
                    <a class="nav-link" href="./carrinho.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho (<?php echo $carrinho->contaCarrinho(); ?>)</a>
                </li>
                <?php if (isset($_SESSION['cliente'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="fa-solid fa-arrow-left-to-bracket"></i>
                            Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>

    </nav>