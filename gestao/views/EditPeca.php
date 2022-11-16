<?php
include_once './head.php';
include_once '../models/Peca.php';
include_once '../models/Upload.php';

if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}

class EditPeca
{

    private $peca;
    private $dados;
    private $id;

    public function view()
    {
        if (isset($_GET['id'])) {

            $this->id = $_GET['id'];
            $this->peca = new Peca();
            $this->dados = $this->peca->selectOne($this->id);
            return $this->dados;
        }
    }

    public function uploads(){

        if (isset($_GET['id'])) {

            $this->id = $_GET['id'];
            $this->peca = new Upload();
            $this->dados = $this->peca->selectAll($this->id);
            return $this->dados;
        }
    }
}

$editPeca = new EditPeca();
$dados = $editPeca->view();
$upload = $editPeca->uploads();
?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-wrench"></i> Editar Peca</h3>

    <div class="mt-2 d-flex mt-5">
        <form action="../controllers/EditPecaController.php" method="post" class="w-100 d-flex" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $dados->id ?>">
            <div class="container">
                <div class="container">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" required value="<?php echo $dados->nome ?>">
                </div>
                <div class="container">
                    <label class="form-label">Tipo:</label>
                    <input type="text" class="form-control" name="tipo" required value="<?php echo $dados->tipo ?>">
                </div>
                <div class="container">
                    <label class="form-label">Tamanho:</label>
                    <input type="text" class="form-control" name="tamanho" required value="<?php echo $dados->tamanho ?>">
                </div>
                <div class="container">
                    <label class="form-label">Marca:</label>
                    <input type="text" class="form-control" name="marca" required value="<?php echo $dados->marca ?>">
                </div>
                <div class="container">
                    <label class="form-label">Quantidade:</label>
                    <input type="text" class="form-control" name="quantidade" required value="<?php echo $dados->quantidade ?>">
                </div>
                <div class="container">
                    <label class="form-label">Data de Fabrico:</label>
                    <input type="date" class="form-control" name="data_fabrico" value="<?php echo $dados->data_fabrico ?>">
                </div>
            </div>

            <div class="container">
                <div class="container">
                    <label class="form-label">Local de fabrico:</label>
                    <input type="text" class="form-control" name="local_fabrico" value="<?php echo $dados->local_fabrico ?>">
                </div>
                <div class="container">
                    <label class="form-label">Cor:</label>
                    <input type="text" class="form-control" name="cor" value="<?php echo $dados->cor ?>">
                </div>
                <div class="container">
                    <label class="form-label">Preco:</label>
                    <input type="text" class="form-control" name="preco" required value="<?php echo $dados->preco ?>">
                </div>
                <div class="container">
                    <label class="form-label">Status:</label>
                    <select name="status" class="form-select" value="<?php echo $dados->status ?>">
                        <option value="indisponivel">Indisponivel</option>
                        <option value="disponivel">Disponivel</option>
                    </select>
                </div>
                <div class="container my-3">
                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </div>
            <div class="container mt-4">
                <h5>Fotos</h5>
                <div class="container fotos shadow-sm clearfix p-2">
                    <?php foreach($upload as $key => $values){ ?>
                        <img src="../../uploads/<?php echo $dados->id ?>/<?php echo $values->nome ?>" class="img-fluid mt-2" alt="">
                    <?php } ?>
                </div>
            </div>
        </form>


    </div>

</div>

</div>

<?php include_once './foot.php'; ?>