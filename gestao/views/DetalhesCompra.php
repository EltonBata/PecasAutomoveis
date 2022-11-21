<?php
include_once './head.php';
include_once '../controllers/DetalhesCompraController.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$detalhes = new DetalhesCompraController();
$detalhes->actualizaEstado($id);
$compra = $detalhes->viewCompra($id);
$peca = $detalhes->viewPecas($id);

?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center my-3"><i class="fa-solid fa-circle-info"></i> Detalhes</h3>

    <div class="container-fluid d-flex">
        <div class="Container text-center" style="width: 33%;">
            <h5 class="text-center">Cliente</h5>
            <p>Nome do Cliente: <b> <?php echo $compra->clinome." ".$compra->apelido ?> </b></p>
            <p>Email: <b><?php echo $compra->email ?> </b></p>
            <p>Contactos: <b><?php echo $compra->contactos ?></b></p>

        </div>

        <div class="container text-center overflow-y" style="width: 33%;">
            <h5 class="text-center">Itens</h5>
            <?php foreach ($peca as $key => $value) { ?>

            <p>Nome: <b><?php echo $value->nome ?></b></p>
            <p>Tipo: <b><?php echo $value->tipo ?></b></p>
            <p>Marca: <b><?php echo $value->marca ?></b></p>
            <p>Cor: <b><?php echo $value->cor ?></b></p>
            <p>Quantidade: <b><?php echo $value->quantidade1 ?></b></p>
            <p class="mb-5">Preco: <b><?php echo $value->preco1 ?> mt</b></p>
            <p class="border"></p>
            <?php } ?>
        </div>

        <div class="container text-center" style="width: 33%;">
            <h5 class="text-center">Compra</h5>
            <p>Data da Compra: <b><?php echo $compra->data_compra ?></b></p>
            <p>Metodo de Pagamento: <b><?php echo $compra->metodo ?></b></p>
            <p>Numero de Pagamento: <b><?php echo $compra->numero ?></b></p>
            <p>Data da Entrega: <b><?php echo $compra->data_entrega ?></b></p>
            <p>Local da Entrega: <b><?php echo $compra->local_entrega ?></b></p>
            <p>Quantidade Total: <b><?php echo $compra->quantidade_total ?></b></p>
            <p>Desconto: <b><?php echo $compra->desconto ?></b></p>
            <p>Total Pago: <b><?php echo $compra->total_pago ?> mt</b></p>

        </div>

    </div>
</div>