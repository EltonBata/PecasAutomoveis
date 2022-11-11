<?php
include_once './head.php';
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}
?>

<?php include_once '../controllers/VerPecasController.php'; ?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center">
        <?php if (isset($_GET['status'])) {

            if ($_GET['status'] == 'disponivel') {  ?>
                Pecas Disponiveis
            <?php  } else { ?>
                Pecas Indisponiveis
            <?php }
        } else { ?>
            Todas Pecas
        <?php } ?>
        (<?php echo $total; ?>)
    </h3>

    <?php if (isset($_SESSION['sucesso'])) { ?>
        <div class="alert alert-success alert-dismissible w-50 mx-auto">
            <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
            <?php echo $_SESSION['sucesso'];
            unset($_SESSION['sucesso']); ?>
        </div>
        <?php } else {
        if (isset($_SESSION['erro'])) { ?>
            <div class="alert alert-danger alert-dismissible w-50 mx-auto">
                <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
                <?php echo $_SESSION['erro'];
                unset($_SESSION['erro']) ?>
            </div>
    <?php }
    } ?>


    <div class="container mt-2">
        <table class="table">
            <thead>
                <th>Nr</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Tamanho</th>
                <th>Cor</th>
                <th>Data de Fabrico</th>
                <th>Local de Fabrico</th>
                <th>Preco</th>
                <th>Status</th>
                <th></th>
            </thead>

            <tbody>
                <?php
                $count = 1;
                foreach ($peca as $key => $value) { $img = $verPeca->upload($value->id);
                ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td>
                            <?php if(!empty($img)){ ?> <img src="../../uploads/<?php echo $value->id ?>/<?php echo $img->nome ?>" class="img-fluid imagem" alt=""> <?php } ?>
                        </td>
                        <td><?php echo $value->nome ?></td>
                        <td><?php echo $value->tipo ?></td>
                        <td><?php echo $value->marca ?></td>
                        <td><?php echo $value->tamanho ?></td>
                        <td><?php echo $value->cor ?></td>
                        <td><?php echo $value->data_fabrico ?></td>
                        <td><?php echo $value->local_fabrico ?></td>
                        <td><?php echo $value->preco ?></td>
                        <td><?php echo $value->status ?></td>
                        <td style="text-align: center;" class="accoes">

                            <div class="dropdown">
                                <button type="button" class=" btn dropdown-toggle" data-bs-toggle="dropdown"></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="./EditPeca.php?id=<?php echo $value->id; ?>" class="dropdown-item">
                                            <i class="fa-solid fa-pen"></i> Editar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle='modal' data-bs-target="#delete<?php echo $value->id ?>" class="dropdown-item">
                                            <i class="fa-solid fa-trash-can"></i> Apagar
                                        </a>
                                    </li>

                                </ul>
                            </div>

                        </td>
                    </tr>
                    <div class="modal" id="delete<?php echo $value->id ?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> <i class="fa-solid fa-trash-can"></i> Apagar Peca</h4>
                                </div>

                                <div class="modal-body">
                                    Deseja apagar esta peca?
                                </div>

                                <div class="modal-footer">
                                    <a href="../controllers/ApagarPecaController.php?id=<?php echo $value->id ?>" class="btn btn-danger">Sim</a>
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Não</button>
                                </div>
                            </div>

                        </div>
                    </div>
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