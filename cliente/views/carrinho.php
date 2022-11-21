<?php include_once '../controllers/carrinhoController.php'; ?>
<?php include_once './head.php' ?>

<h1 class="text-center my-5 text-secondary">Meu Carrinho <i class="fa-solid fa-cart-shopping"></i></h1>
<div class="container-fluid p-0 d-flex carrinho-overflow">

    <?php  if(isset($_SESSION['carrinho'])){ ?>
    <div class="container py-3 border">

        <form method="POST" action="../controllers/registrarCompraController.php" id="form1">
            <?php foreach ($_SESSION['carrinho'] as $key => $value) {
            $dados = $carrinho->selectPecaId($value); ?>

            <div class="container">
                <h4 class="text-center my-3"><?php echo $dados->nome; ?></h4>
                <a href="../controllers/removerCarrinhoController.php?id=<?php echo $value ?>"
                    class="btn btn-danger position-absolute" style="right: 55%;">Remover</a>
                <?php $folder = glob("../../uploads/".$value."/*"); ?>

                <div class="container-fluid mb-5 clearfix">

                    <!-- Carousel -->
                    <div id="demo" class="carousel slide float-start w-50 " data-bs-ride="carousel">

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner h-50">
                            <div class="carousel-item active">
                                <img src="<?php echo $folder[0]; ?>" alt="" class="d-block img-fluid"
                                    style="width:100%; height: 300px;">
                            </div>
                            <?php foreach($folder as $fot) { ?>
                            <div class="carousel-item">
                                <img src="<?php echo $fot ?>" alt="" class="d-block img-fluid"
                                    style="width:100%; height: 300px;">
                            </div>
                            <?php } ?>
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>


                    <div class="container float-end w-50">
                        <p>Cor: <?php echo $dados->cor ?></p>
                        <p>Tipo de Peca: <?php echo $dados->tipo ?></p>
                        <p>Marca: <?php echo $dados->marca ?></p>
                        <p>Data de Fabrico: <?php echo $dados->data_fabrico ?></p>
                        <p>Local de Fabrico: <?php echo $dados->local_fabrico ?></p>
                        <p>Tamanho: <?php echo $dados->tamanho ?></p>
                        <p class="text-end" id="preco<?php echo $value; ?>" style="font-weight: bold;">Pre&ccedil;o:
                            <?php echo $dados->preco ?>
                        </p>

                        <input type="number" id="<?php echo $value; ?>" class="form-control quantidade"
                            name="quantidade<?php echo $value ?>" oninput="calcula('#<?php echo $value ?>')"
                            placeholder="quantidade" min="1" max="10" required>
                        <input type="hidden" value="<?php echo strval($dados->preco); ?>">
                        <input type="hidden" class="novopreco" name="preco<?php echo $value ?>">


                    </div>
                </div>
            </div>

            <?php } ?>

    </div>

    <div class="container p-3 border">
        <h5>Detalhes da Compra</h5>
        <p class="quantidade-text">Quantidade Total: <b> 0 </b></p>
        <p>Desconto: <b>0%</b></p>
        <p>Taxa: <b>17%</b></p>
        <p>Total a ser pago: <b class="pagamento">0</b><b>mt</b> </p>


        <div class="">
            <label>Data de Entega:</label>
            <input type="date" class="form-control" name="data_entrega"
                min="<?php echo date('Y-m-d', strtotime('+1 week')) ?>" required>
            <input type="hidden" name="quantidade_total" class="quantidade_total">
            <input type="hidden" name="preco_total" class="preco_total">
        </div>

        <div class="mt-3">
            <label>Local da Entrega</label>
            <input type="text" class="form-control" name="local_entrega" required>
        </div>

        <div>
            <h5 class="mt-5">Metodo de Pagamento</h5>

            <label>Selecione o metodo de pagamento</label>
            <select class="form-select" name="metodo">
                <option class="Mpesa">Mpesa</option>
                <option class="E-mola">E-mola</option>
                <option class="Mkesh">Mkesh</option>
                <option class="BCI">BCI</option>
                <option class="BIM">BIM</option>
            </select>

            <input type="number" name="numero" class="form-control mt-3" placeholder="Introduza o numero">

        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Comprar</button>
        </div>

        </form>

    </div>
    <?php }else{ ?>
    <div class="container">
        <h1 class="text-center mt-5 text-muted">Nenhum item adicionado</h1>
    </div>
    <?php } ?>
</div>




<script>
function calcula(input) {

    var input = $(input);
    var precotext = input.prev();
    var quantidade = input.val();
    var nextt = input.next();
    var next = input.next().val();
    var preco = quantidade * next;
    var precoTotal = nextt.next();
    console.log();

    if (quantidade != 0) {
        precotext.text("Preco: " + preco);
        precoTotal.val(preco);
    } else {
        precotext.text("Preco: " + next);
        precoTotal.val(0)
    }

    var precos = document.getElementsByClassName('novopreco');
    var inputs = document.getElementsByClassName('quantidade');
    var nr = 0;
    var totalPreco = 0;

    for (let index = 0; index < inputs.length; index++) {

        if (inputs[index].value != "") {
            nr += parseInt(inputs[index].value);

        }

    }

    for (let index = 0; index < precos.length; index++) {

        if (precos[index].value != "") {
            totalPreco += parseInt(precos[index].value);

        }

    }


    if (nr != 0) {
        $('.quantidade-text').html("Quantidade Total: <b>" + nr + "</b>");
        $('.quantidade_total').val(nr);

        $('.pagamento').text(totalPreco);
        $('.preco_total').val(totalPreco);
    }
}
</script>





<?php include_once './foot.php'; ?>