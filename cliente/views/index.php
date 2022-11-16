<?php include_once './head.php'; ?>
<?php include_once '../controllers/IndexController.php';?>

<div class="offcanvas offcanvas-start" id="demo">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title">Menu</h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">

        <h4>Marcas</h4>

        <?php foreach ($marca as $key => $value) { ?>
        <ul>
            <li>
                <a href="./index.php?marca=<?php echo $value->marca; ?>"
                    class="btn"><?php echo strtoupper($value->marca); ?></a>
            </li>
        </ul>
        <?php } ?>

        <h4>Pecas Disponiveis</h4>
        <?php foreach ($nomes as $key => $value) { ?>
        <ul>
            <li>
                <a href="./index.php?tipo=<?php echo $value->tipo; ?>"
                    class="btn"><?php echo strtoupper($value->tipo); ?></a>
            </li>
        </ul>
        <?php } ?>

    </div>
</div>

<?php if (isset($_SESSION['sucesso'])) { ?>
<div class="alert alert-success alert-dismissible mt-2 w-50 mx-auto">
    <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    <?php echo $_SESSION['sucesso'];
            unset($_SESSION['sucesso']); ?>
</div>
<?php } else {
        if (isset($_SESSION['erro'])) { ?>
<div class="alert alert-danger alert-dismissible mt-2 w-50 mx-auto">
    <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    <?php echo $_SESSION['erro'];
                unset($_SESSION['erro']); ?>
</div>
<?php } else { 
            if(isset($_SESSION['alerta'])){ ?>
<div class="alert alert-warning alert-dismissible mt-2 w-50 mx-auto">
    <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    <?php echo $_SESSION['alerta'];
                unset($_SESSION['alerta']); ?>
</div>
<?php } }
    } ?>


<div class="container-fluid my-4">
    <h3 class="text-secondary">Encontre aqui todo tipo de Pe&ccedil;as de Automoveis de todas as marcas e de alta
        qualidade</h3>
</div>


<div id="demo" class="carousel slide" data-bs-ride="carousel">
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../../assets/fotos/pecas-de-carros.jpg" alt="Los Angeles" class="d-block img-fluid"
                style="width:100%; max-height: 400px;">
        </div>
        <?php $folder = glob("../../assets/fotos/carrossel/*"); 

        foreach($folder as $fot){ ?>
        <div class="carousel-item">
            <img src="<?php echo $fot ?>" alt="" class="d-block" style="width:100%; max-height: 400px;">
        </div>
        <?php } ?>

    </div>
</div>


<div class="container-fluid d-flex m-3 mt-5">

    <?php foreach ($dados as $key => $value) {
            $img = $index->upload($value->id); ?>
    <div class="container h-25 pecas shadow border border-2 rounded p-3" data-bs-toggle='modal'
        data-bs-target="#detalhes<?php echo $value->id ?>">
        <h5><?php echo $value->nome ?></h5>
        <?php if (!empty($img)) { ?> <img src="../../uploads/<?php echo $value->id ?>/<?php echo $img->nome ?>"
            class="img-fluid imagem" alt=""> <?php } ?>
        <p class="mt-2">Tipo de Peca: <?php echo $value->tipo ?></p>
        <p>Marca: <?php echo $value->marca ?></p>
        <p>Data de Fabrico: <?php echo $value->data_fabrico ?></p>
        <p class="text-end" style="font-weight: bold;">Pre&ccedil;o: <?php echo $value->preco ?></p>
    </div>

    <div class="modal" id="detalhes<?php echo $value->id ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $value->nome ?></h4>
                </div>

                <div class="modal-body">

                    <div class="container-fluid d-flex">
                        <div class="container-fluid d-flex flex-wrap modal-pictures border">
                            <?php 
                                $folder = glob("../../uploads/".$value->id."/*"); 

                                foreach($folder as $fot){ ?>

                            <img src="<?php echo $fot ?>" alt="" class="img-fluid ">

                            <?php } ?>
                        </div>

                        <div class="container-fluid info">
                            <p>Cor: <?php echo $value->cor ?></p>
                            <p>Tipo de Peca: <?php echo $value->tipo ?></p>
                            <p>Marca: <?php echo $value->marca ?></p>
                            <p>Data de Fabrico: <?php echo $value->data_fabrico ?></p>
                            <p>Local de Fabrico: <?php echo $value->local_fabrico ?></p>
                            <p>Tamanho: <?php echo $value->tamanho ?></p>
                            <p class="text-end" style="font-weight: bold;">Pre&ccedil;o: <?php echo $value->preco ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="../controllers/carrinhoController.php?id=<?php echo $value->id ?>" class="btn btn-success">Adicionar ao carrinho</a>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
</div>

<button class="btn btn-secondary rounded-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
    <i class="fa-solid fa-arrow-right"></i>
</button>


<?php include_once './foot.php'; ?>