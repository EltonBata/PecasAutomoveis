<?php
include_once './models/Peca.php';
//include_once './models/Upload.php';

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
}

$index = new ClienteIndex();
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
    <link rel="stylesheet" href="../assets/css/clienteIndex.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/fotos/logo.png" alt="">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cadastrar-se</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacte-nos</a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="container-fluid">

        <?php foreach ($dados as $key => $value) { ?>
            <div class="container w-25 flex-wrap shadow">
                <h5><?php echo $value->nome ?></h5>
            </div>
        <?php } ?>
    </div>