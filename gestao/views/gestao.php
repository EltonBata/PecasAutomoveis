<?php include_once './head.php'; ?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-list-check"></i> Gestao</h3>

    <div class="container mt-4 d-flex">
        <div class="container">
            <h4><i class="fa-solid fa-bars-progress"></i> Operacoes</h4>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Mensagem</th>
                    <th>Data</th>
                    <th>Resposta</th>
                    <th>Accao</th>
                </thead>
            </table>
        </div>

        <div class="container">
            <h4><i class="fa-solid fa-chart-line"></i> Estatisticas</h4>
        </div>

    </div>
    <div class="relatorio">
        <a href="" class="btn btn-danger"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</a>
    </div>

</div>

</div>

<?php include_once './foot.php'; ?>