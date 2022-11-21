<?php include_once './head.php'; ?>

<link rel="stylesheet" href="../../assets/css/loginCliente.css">

<div class="container-fluid d-flex div-p p-0">

    <div class="container-fluid w-25 barra-lateral p-3 m-0">
        <h5 class="text-white text-center my-5">POOA</h5>
        <hr class="text-white">
        <p class="text-white text-center mt-5 conta">Não tens uma conta?</p>
        <a href="./cadastroCliente.php" class="btn text-white cadastro ms-5">Cadastre-se</a>
    </div>

    <div class="container form p-3">

        <h2 class="text-center mt-5 text-white">Login</h2>

        <?php if (isset($_SESSION['erro'])) { ?>
            <div class="alert alert-danger alert-dismissible w-50 mx-auto mt-3">
                <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
                <?php echo $_SESSION['erro'];
                unset($_SESSION['erro']) ?>
            </div>
        <?php } ?>

        <form action="../controllers/loginController.php" method="post" class="w-75 mx-auto login-form">
            <div class="container">
                <label class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Introduza o seu username">
            </div>

            <div class="container mt-4">
                <label class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Introduza a sua password">
            </div>

            <div class="mt-4 container">
                <button class="btn btn-success">Login</button>
            </div>
        </form>

    </div>

</div>