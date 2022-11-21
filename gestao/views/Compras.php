<?php include_once './head.php'; ?>
<?php
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}
include_once '../controllers/VerComprasController.php';
?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-cart-shopping"></i> Compras (<?php echo $totalCompras; ?>)</h3>

    <div class="container mt-2">
        <table class="table">
            <thead>
                <th>Nr</th>
                <th>Cliente</th>
                <th>Data da Compra</th>
                <th>Data da Entrega</th>
                <th>Local da Entrega</th>
                <th>Status</th>
                <th>Quantidade</th>
                <th>Desconto</th>
                <th>Total Pago</th>

            </thead>

            <tbody>
                <?php
                $count = 1;
                foreach ($compras as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $value->nome . " " . $value->apelido ?></td>
                        <td><?php echo $value->data_compra ?></td>
                        <td><?php echo $value->data_entrega ?></td>
                        <td><?php echo $value->local_entrega ?></td>
                        <td><?php echo $value->estado ?></td>
                        <td><?php echo $value->quantidade_total ?></td>
                        <td><?php echo $value->desconto . "%" ?></td>
                        <td><?php echo $value->total_pago ?></td>
                        <td><a href="./DetalhesCompra.php?id=<?php echo $value->compraID ?>" class="btn"><i class="fa-solid fa-circle-info"></i></a></td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>

    </div>
    <div class="relatorio">
        <a href="" class="btn btn-danger"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</a>
    </div>

</div>

</div>

<?php include_once './foot.php'; ?>