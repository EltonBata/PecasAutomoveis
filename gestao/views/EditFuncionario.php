<?php include_once './head.php'; ?>
<?php
session_start();
include_once '../models/Administrador.php';
include_once '../models/Gestor.php';

class EditFuncionario
{
    private $perfil;
    private $funcionario;
    private $dados;
    private $id;

    public function getDados()
    {
        return $this->dados;
    }

    public function view()
    {

        if (isset($_GET['id']) && isset($_GET['perfil'])) {

            $this->perfil = $_GET['perfil'];
            $this->id = $_GET['id'];

            if ($this->perfil == 'admin') {
                $this->funcionario = new Administrador();
                $this->dados = $this->funcionario->selectOne($this->id);
            } else {
                $this->funcionario = new Gestor();
                $this->dados = $this->funcionario->selectOne($this->id);
            }
        }
    }
}

$editFuncionario = new EditFuncionario();
$editFuncionario->view();
$dados = $editFuncionario->getDados();

?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-pen"></i> Editar Funcionario</h3>

    <div class="mt-2">
        <form action="../controllers/adicionaFuncionarioController.php" method="post" class="d-flex">
            <div class="container">

                <div class="container">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" required value="<?php echo $dados->nome ?>">
                </div>
                <div class="container">
                    <label class="form-label">Apelido:</label>
                    <input type="text" class="form-control" name="apelido" required value="<?php echo $dados->apelido ?>">
                </div>
                <div class="container">
                    <label class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="data_nasc" required value="<?php echo $dados->data_nascimento ?>">
                </div>
                <div class="container">
                    <label class="form-label">Nacionalidade:</label>
                    <input type="text" class="form-control" name="nacionalidade" required value="<?php echo $dados->nacionalidade ?>">
                </div>
                <div class="container">
                    <label class="form-label">Numero de BI:</label>
                    <input type="text" class="form-control" name="nrBI" required value="<?php echo $dados->nr_bi ?>">
                </div>
                <div class="container">
                    <label class="form-label">Sexo:</label>
                    <select name="sexo" class="form-select" value="<?php echo $dados->sexo ?>">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div class="container">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required value="<?php echo $dados->email ?>">
                </div>
            </div>

            <div class="container">
                <div class="container">
                    <label class="form-label">Contactos:</label>
                    <input type="text" class="form-control" name="contactos" required value="<?php echo $dados->contactos ?>">
                </div>
                <div class="container">
                    <label class="form-label">Morada:</label>
                    <textarea name="morada" cols="30" rows="10" class="form-control" required><?php echo $dados->morada ?></textarea>
                </div>

                <div class="container">
                    <label class="form-label">Perfil:</label>
                    <select name="perfil" class="form-select" disabled value="">
                        <?php if ($dados->perfil == 'admin') { ?>
                            <option value="admin">Administrador</option>
                        <?php } else { ?>
                            <option value="gestor">Gestor</option>
                        <?php } ?>
                    </select>
                </div>

                <div class="container my-3">
                    <button class="btn btn-success" type="submit">Actualizar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </form>

    </div>

</div>

</div>

<?php include_once './foot.php'; ?>