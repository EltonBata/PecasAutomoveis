<?php
include_once './head.php';
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}
?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-user-plus"></i> Adicionar Novo Funcionario</h3>

    <div class="mt-2">
        <form action="../controllers/AdicionaFuncionarioController.php" method="post" class="d-flex">
            <div class="container">

                <div class="container">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" required placeholder="Introduz primeiro nome">
                </div>
                <div class="container">
                    <label class="form-label">Apelido:</label>
                    <input type="text" class="form-control" name="apelido" required placeholder="Introduz apelido">
                </div>
                <div class="container">
                    <label class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="data_nasc" required>
                </div>
                <div class="container">
                    <label class="form-label">Nacionalidade:</label>
                    <input type="text" class="form-control" name="nacionalidade" required placeholder="Introduz nacionalidade">
                </div>
                <div class="container">
                    <label class="form-label">Numero de BI:</label>
                    <input type="text" class="form-control" name="nrBI" required placeholder="Introduz numero de Identificacao">
                </div>
                <div class="container">
                    <label class="form-label">Sexo:</label>
                    <select name="sexo" class="form-select">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div class="container">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required placeholder="Introduz o email">
                </div>
            </div>

            <div class="container">
                <div class="container">
                    <label class="form-label">Contactos:</label>
                    <div class="d-flex">
                        <input type="text" class="form-control" name="contacto1" required placeholder="Introduz contacto principal">
                        <input type="text" class="form-control" name="contacto2" placeholder="Introduz contacto secundario">
                    </div>
                </div>
                <div class="container">
                    <label class="form-label">Endereco:</label>
                    <textarea name="morada" cols="30" rows="10" class="form-control" required placeholder="Introduz endereco"></textarea>
                </div>

                <div class="container">
                    <label class="form-label">Perfil:</label>
                    <select name="perfil" class="form-select">
                        <option value="admin">Administrador</option>
                        <option value="gestor">Gestor</option>
                    </select>
                </div>

                <div class="container my-3">
                    <button class="btn btn-success" type="submit">Registrar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </form>

    </div>

</div>

</div>

<?php include_once './foot.php'; ?>