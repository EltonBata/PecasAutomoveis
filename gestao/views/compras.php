<?php include_once '../controllers/verComprasController.php'; ?>
<?php include_once './head.php'; ?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-cart-shopping"></i> Compras(<?php echo $totalCompras; ?>)</h3>

    <div class="container mt-2">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Data da Compra</th>
                <th>Data da Entrega</th>
                <th>Local da Entrega</th>
                <th>Status</th>
                <th>Quantidade</th>
                <th>Desconto</th>
                <th>Total Pago</th>
                
            </thead>

            <tbody>
                <?php foreach ($compras as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value->id ?></td>
                        <td><?php echo $value->data_compra ?></td>
                        <td><?php echo $value->data_entrega ?></td>
                        <td><?php echo $value->local_entrega ?></td>
                        <td><?php echo $value->status ?></td>
                        <td><?php echo $value->quantidade ?></td>
                        <td><?php echo $value->desconto."%" ?></td>
                        <td><?php echo $value->total_pago ?></td>
                      
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <div class="relatorio">
        <a href="" class="btn btn-danger"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</a>
    </div>

</div>

</div>

<?php include_once './foot.php'; ?>