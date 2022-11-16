<?php include_once './head.php'; ?>
<?php include_once '../controllers/EstatisticasController.php'; ?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-chart-line"></i> Estatisticas</h3>

    <div class="container-fluid d-flex flex-wrap">
        <div class="container w-50 mt-4">

            <table class="table table-sm table-striped">
                <caption>Funcionarios</caption>

                <tr>
                    <th>Administradores</th>
                    <td><?php echo $admins ?></td>

                </tr>
                <tr>
                    <th>Gestores</th>
                    <td><?php echo $gestores ?></td>

                </tr>
                <tr>
                    <th>Total</th>
                    <td><?php echo $funcs ?></td>
                </tr>

            </table>

        </div>

        <div class="w-50 container mt-4">
            <table class="table table-sm table-striped">
                <caption>Compras</caption>

                <tr>
                    <th>Compras Entregues</th>
                    <td><?php echo $cEntregues ?></td>

                </tr>
                <tr>
                    <th>Compras Pendentes</th>
                    <td><?php echo $cPendentes ?></td>

                </tr>
                <tr>
                    <th>Compras Totais</th>
                    <td><?php echo $compras ?></td>
                </tr>

            </table>
        </div>

        <div class="container w-50 mt-4">
            <table class="table table-sm table-striped">
                <caption>Pecas</caption>
                <thead>
                    <th>Nome</th>
                    <th class="text-center">Total</th>
                </thead>

                <tbody>
                    <?php foreach ($pecas as $key => $value) { ?>
                        <tr>
                            <td class="text-start"><?php echo $value->nome ?></td>
                            <td><?php echo $value->total ?></td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <th>Pecas Totais</th>
                        <td><?php echo $totalpecas ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="relatorio">
        <a href="" class="btn btn-danger"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</a>
    </div>

</div>

</div>

<?php include_once './foot.php'; ?>