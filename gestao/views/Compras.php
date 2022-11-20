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
                <th>Peca</th>
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
                        <td><?php echo $value->cliNome . " " . $value->cliApelido ?></td>
                        <td><?php echo $value->pecaNome ?></td>
                        <td><?php echo $value->data_compra ?></td>
                        <td><?php echo $value->data_entrega ?></td>
                        <td><?php echo $value->local_entrega ?></td>
                        <td><?php echo $value->compraStatus ?></td>
                        <td><?php echo $value->compraQuantidade ?></td>
                        <td><?php echo $value->desconto . "%" ?></td>
                        <td><?php echo $value->total_pago ?></td>
                        <td><Button class="btn" data-bs-toggle='modal' data-bs-target="#detalhes<?php echo $value->compraID ?>">+</Button></td>

                        <div class="modal" id="detalhes<?php echo $value->compraID ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> <i class="fa-solid fa-trash-can"></i> Detalhes da Compra</h4>
                                    </div>

                                    <div class="modal-body d-flex justify-content-center">
                                        <div class="container p-2">
                                            <h5>Cliente</h5>
                                            <p>Nome: <?php echo $value->cliNome . " " . $value->cliApelido; ?></p>
                                            <p>Email: <?php echo $value->email ?></p>
                                            <p>Contactos: <?php echo $value->contactos ?></p>
                                        </div>
                                        <div class="container p-2">
                                            <h5>Peca</h5>
                                            <p>Nome: <?php echo $value->pecaNome ?></p>
                                            <p>Marca: <?php echo $value->marca ?></p>
                                            <p>Tamanho: <?php echo $value->tamanho ?></p>
                                            <p>Preco: <?php echo $value->preco ?></p>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Fechar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
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