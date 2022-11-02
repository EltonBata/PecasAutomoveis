<?php include_once './head.php'; ?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-wrench"></i> Adicionar Nova Peca</h3>

    <div class="mt-2 d-flex mt-5">
        <form action="" method="post" class="w-75 d-flex">

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
                    <label class="form-label">Marca:</label>
                    <input type="text" class="form-control" name="marca" required>
                </div>
                <div class="container">
                    <label class="form-label">Data de Fabrico:</label>
                    <input type="date" class="form-control" name="data_fabrico">
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
        </form>

        <form action="" class="mt-4 w-25">
            <input type="file" name="fotos" class="upload mt-1">
            <button class="btn btn-primary container">Selecione fotos da peca</button>
        </form>
    </div>

</div>

</div>

<?php include_once './foot.php'; ?>