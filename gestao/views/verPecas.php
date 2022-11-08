<?php include_once './head.php'; ?>

<div class="container conteudo col-sm-10 p-3">

    <?php if (isset($_SESSION['sucesso'])) { ?>
        <div class="alert alert-success alert-dismissible w-50 mx-auto">
            <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
            <?php echo $_SESSION['sucesso'];
            unset($_SESSION['sucesso']); ?>
        </div>
        <?php } else {
        if (isset($_SESSION['erro'])) { ?>
            <div class="alert alert-danger alert-dismissible w-50 mx-auto">
                <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
                <?php echo $_SESSION['erro'];
                unset($_SESSION['erro']) ?>
            </div>
    <?php }
    } ?>
    
    <h3 class="text-center">
        <?php if (isset($_GET['status'])) {

            if ($_GET['status'] == 'disponivel') {  ?>
                Pecas Disponiveis
            <?php  } else { ?>
                Pecas Indisponiveis
            <?php }
        } else { ?>
            Todas Pecas
        <?php } ?>
    </h3>

    <div class="container mt-2">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Tamanho</th>
                <th>Cor</th>
                <th>Data de Fabrico</th>
                <th>Local de Fabrico</th>
                <th>Preco</th>
                <th>Accao</th>
            </thead>
        </table>

    </div>
    <div class="relatorio">
        <a href="" class="btn btn-danger"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</a>
    </div>

</div>

</div>

<?php include_once './foot.php'; ?>