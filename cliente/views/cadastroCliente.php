<?php include_once './head.php'; ?>

<link rel="stylesheet" href="../../assets/css/loginCliente.css">

<div class="container-fluid d-flex div-p p-0">

    <div class="container-fluid w-25 barra-lateral p-3 m-0">
        <h5 class="text-white text-center my-5">YA</h5>
        <hr class="text-white">
        <p class="text-white text-center mt-5 conta">Já tens uma conta?</p>
        <a href="./login.php" class="btn text-white cadastro ms-5">Faça Login</a>
    </div>

    <div class="container form p-3">

        <h2 class="text-center mt-5 text-white">Cadastrar-se</h2>

        <?php if (isset($_SESSION['erro'])) { ?>
            <div class="alert alert-danger alert-dismissible w-50 mx-auto mt-3">
                <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
                <?php echo $_SESSION['erro'];
                unset($_SESSION['erro']) ?>
            </div>
        <?php } ?>

        <form action="../controllers/CadastroClienteController.php" method="post" class=" mx-auto d-flex cadastro-form">
            <div class="container">
                <div class="container">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" required placeholder="Introduz primeiro nome">
                </div>
                <div class="container mt-3">
                    <label class="form-label">Apelido:</label>
                    <input type="text" class="form-control" name="apelido" required placeholder="Introduz apelido">
                </div>
                <div class="container mt-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required placeholder="Introduz email">
                </div>
            </div>
            <div class="container">
                <div class="container">
                    <label class="form-label">Contactos:</label>
                    <input type="text" class="form-control" name="contactos" required placeholder="Introduz contacto">
                </div>
                <div class="container mt-3">
                    <label class="form-label">Numero de BI:</label>
                    <input type="text" class="form-control" name="nr_bi" required placeholder="Introduz numero de Identificacao">
                </div>
                <div class="container mt-3">
                    <label class="form-label">Morada:</label>
                    <textarea name="morada" class="form-control"></textarea>
                </div>

                <div class="mt-4 container">
                    <button class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>

    </div>

</div>