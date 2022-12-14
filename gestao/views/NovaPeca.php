<?php
include_once './head.php';
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}
?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-wrench"></i> Adicionar Nova Peca</h3>

    <div class="mt-2 d-flex mt-5">
        <form action="../controllers/AdicionaPecaController.php" method="post" class="w-100 d-flex" enctype="multipart/form-data">

            <div class="container">
                <div class="container">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>
                <div class="container">
                    <label class="form-label">Tipo:</label>
                    <input type="text" class="form-control" name="tipo" required>
                </div>
                <div class="container">
                    <label class="form-label">Tamanho:</label>
                    <input type="text" class="form-control" name="tamanho" required>
                </div>
                <div class="container">
                    <label class="form-label">Marca:</label>
                    <input type="text" class="form-control" name="marca" required>
                </div>
                <div class="container">
                    <label class="form-label">Quantidade:</label>
                    <input type="text" class="form-control" name="quantidade" required>
                </div>
                <div class="container">
                    <label class="form-label">Data de Fabrico:</label>
                    <input type="date" class="form-control" name="data_fabrico" required>
                </div>
            </div>

            <div class="container">
                <div class="container">
                    <label class="form-label">Local de fabrico:</label>
                    <input type="text" class="form-control" name="local_fabrico">
                </div>
                <div class="container">
                    <label class="form-label">Cor:</label>
                    <input type="text" class="form-control" name="cor">
                </div>
                <div class="container">
                    <label class="form-label">Preco:</label>
                    <input type="text" class="form-control" name="preco" required>
                </div>
                <div class="container">
                    <label class="form-label">Status:</label>
                    <select name="status" class="form-select">
                        <option value="indisponivel">Indisponivel</option>
                        <option value="disponivel">Disponivel</option>
                    </select>
                </div>
                <div class="container my-3">
                    <button class="btn btn-success" type="submit">Registrar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </div>
            <div class="container mt-4">
                <input type="file" name="fotos[]" multiple class="upload mt-1" required>
                <button class="btn btn-primary container">Selecione fotos da peca</button>
            </div>
        </form>

       
    </div>

</div>

</div>

<?php include_once './foot.php'; ?>