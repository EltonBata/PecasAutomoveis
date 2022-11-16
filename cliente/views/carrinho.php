<?php include_once '../controllers/carrinhoController.php'; ?>
<?php include_once './head.php' ?>

<h1 class="text-center my-5 text-secondary">Meu Carrinho <i class="fa-solid fa-cart-shopping"></i></h1>
<div class="container-fluid p-0 d-flex carrinho-overflow">

    <div class="container py-3  border">

        <?php foreach ($_SESSION['carrinho'] as $key => $value) {
            $dados = $carrinho->selectPecaId($value); ?>

        <div class="container">
            <h4 class="text-center my-3"><?php echo $dados->nome; ?></h4>
            <?php $folder = glob("../../uploads/".$value."/*"); ?>

            <div class="container-fluid d-flex align-items-center">

                <!-- Carousel -->
                <div id="demo" class="carousel slide w-50 border" data-bs-ride="carousel">

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner h-50">
                        <div class="carousel-item active">
                            <img src="<?php echo $folder[0]; ?>" alt="" class="d-block img-fluid"
                                style="width:100%; max-height: 350px;">
                        </div>
                        <?php foreach($folder as $fot) { ?>
                        <div class="carousel-item">
                            <img src="<?php echo $fot ?>" alt="" class="d-block img-fluid" style="width:100%; height: 300px;">
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


                <div class="container w-50">
                    <p>Cor: <?php echo $dados->cor ?></p>
                    <p>Tipo de Peca: <?php echo $dados->tipo ?></p>
                    <p>Marca: <?php echo $dados->marca ?></p>
                    <p>Data de Fabrico: <?php echo $dados->data_fabrico ?></p>
                    <p>Local de Fabrico: <?php echo $dados->local_fabrico ?></p>
                    <p>Tamanho: <?php echo $dados->tamanho ?></p>
                    <p class="text-end" style="font-weight: bold;">Pre&ccedil;o: <?php echo $dados->preco ?>
                    </p>
                    <input type="number" class="form-control">
                </div>
            </div>
        </div>

        <?php } ?>
    </div>

    <div class="container py-3 border">

    </div>

</div>










<?php include_once './foot.php'; ?>