<?php
include_once './/models/Peca.php';
include '../config/db.php';
include_once './models/Upload.php';

class ClienteIndex
{

    private $peca;
    private $operacao;
    private $dados = [];

    public function peca()
    {
        $this->peca = new Peca();
        $this->dados = $this->peca->selectAll();
        return $this->dados;
    }

    public function upload($id)
    {
        $this->peca = new Upload();
        $this->dados = $this->peca->selectOne($id);
        return $this->dados;
    }

    function __construct()
    {
        $this->dbConnection = new dbConnection();
        $this->conexao = $this->dbConnection->connect();
        return $this->conexao;
    }
}


$index = new ClienteIndex();
$index->__construct();
$dados = $index->peca();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/clienteIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>


    <div class="offcanvas offcanvas-start" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Heading</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <p>Some text lorem ipsum.</p>
            <p>Some text lorem ipsum.</p>
            <p>Some text lorem ipsum.</p>
            <button class="btn btn-secondary" type="button">A Button</button>
        </div>
    </div>

    <button class="btn btn-secondary rounded-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">

    </button>

    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/fotos/logo.png" alt="">
            </a>
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-user-plus"></i> Cadastrar-se</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-circle-info"></i> Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacte-nos</a>
                </li>
                <li class="nav-item carrinho">
                    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i> Carrinho</a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="container-fluid my-4">
        <h3 class="text-secondary">Encontre aqui todo tipo de Pe&ccedil;as de Automoveis de todas as marcas e de alta qualidade</h3>
    </div>
    <div class="container-fluid d-flex m-3">

        <?php foreach ($dados as $key => $value) {
            $img = $index->upload($value->id); ?>
            <div class="container h-25 pecas shadow border border-2 rounded p-3">
                <h5><?php echo $value->nome ?></h5>
                <?php if (!empty($img)) { ?> <img src="../uploads/<?php echo $value->id ?>/<?php echo $img->nome ?>" class="img-fluid imagem" alt=""> <?php } ?>
                <p class="mt-2">Marca: <?php echo $value->marca ?></p>
                <p>Fabricado em: <?php echo $value->local_fabrico ?></p>
                <p>Data de Fabrico: <?php echo $value->data_fabrico ?></p>
                <p class="text-end" style="font-weight: bold;">Pre&ccedil;o: <?php echo $value->preco ?></p>
            </div>
        <?php } ?>
    </div>


   