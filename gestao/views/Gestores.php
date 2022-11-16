<?php include_once './head.php'; ?>
<?php
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}
include_once '../controllers/VerFuncionariosController.php';
?>


<div class="container conteudo col-sm-10 p-3">


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

    <h3 class="text-center"><i class="fa-solid fa-user-gear"></i> Gestores (<?php echo $totalGestores; ?>)</h3>

    <div class="btn-group">
        <a href="#" class="btn disabled">Gestores</a>
        <a href="./Administradores.php" class="btn">Administradores</a>
    </div>

    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
                <th>Nr</th>
                <th>Numero de BI</th>
                <th>Nome</th>
                <th>Apelido</th>
                <th>Data de Nascimento</th>
                <th>Nacionalidade</th>
                <th>sexo</th>
                <th>Morada</th>
                <th>Email</th>
                <th>Contactos</th>
                <th></th>
            </thead>

            <tbody>
                <?php 
                    $count = 1;
                    foreach ($gestor as $key => $value) { 
                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $value->nr_bi; ?></td>
                        <td><?php echo $value->nome; ?></td>
                        <td><?php echo $value->apelido; ?></td>
                        <td><?php echo $value->data_nascimento; ?></td>
                        <td><?php echo $value->nacionalidade; ?></td>
                        <td><?php echo $value->sexo; ?></td>
                        <td><?php echo $value->morada; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->contactos; ?></td>
                        <td style="text-align: center;" class="accoes">
                            <div class="dropdown">
                                <button type="button" class=" btn dropdown-toggle" data-bs-toggle="dropdown" <?php if ($head->getPerfil() == "gestor") { ?> hidden <?php } ?>></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="./EditFuncionario.php?id=<?php echo $value->id; ?>&perfil=<?php echo $value->perfil; ?>" class="dropdown-item">
                                            <i class="fa-solid fa-pen"></i> Editar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle='modal' data-bs-target="#delete<?php echo $value->id ?>" class="dropdown-item">
                                            <i class="fa-solid fa-trash-can"></i> Apagar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle='modal' data-bs-target="#alterar-senha<?php echo $value->id ?>" class="dropdown-item">
                                            <i class="fa-solid fa-key"></i> Alterar senha
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>

                        <div class="modal" id="delete<?php echo $value->id ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> <i class="fa-solid fa-trash-can"></i> Apagar Gestor</h4>
                                    </div>

                                    <div class="modal-body">
                                        Deseja apagar o gestor <?php echo $value->nome . " " . $value->apelido ?>?
                                    </div>

                                    <div class="modal-footer">
                                        <a href="../controllers/ApagaFuncionarioController.php?id=<?php echo $value->id ?>&perfil=gestor" class="btn btn-danger">Sim</a>
                                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Não</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal" id="alterar-senha<?php echo $value->id ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> <i class="fa-solid fa-key"></i> Alterar senha</h4>
                                    </div>

                                    <div class="modal-body">
                                        Deseja alterar a senha do gestor <?php echo $value->nome . " " . $value->apelido ?>?
                                    </div>

                                    <div class="modal-footer">
                                        <a href="../controllers/AlterarSenhaController.php?id=<?php echo $value->id ?>&perfil=gestor" class="btn btn-danger">Sim</a>
                                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Não</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php $count++; } ?>



            </tbody>
        </table>

    </div>

    <div class="relatorio">
        <a href="" class="btn btn-danger"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</a>
    </div>
</div>

</div>

<?php include_once './foot.php'; ?>