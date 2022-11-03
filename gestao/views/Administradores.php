<?php include_once './head.php'; ?>

<?php include_once '../controllers/verFuncionariosController.php'; ?>

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

    <h3 class="text-center"><i class="fa-solid fa-user-gear"></i> Administradores(<?php echo $totalAdmin; ?>)</h3>

    <div class="btn-group">
        <a href="./Gestores.php" class="btn">Gestores</a>
        <a href="#" class="btn disabled">Administradores</a>
    </div>

    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Numero de BI</th>
                <th>Nome</th>
                <th>Apelido</th>
                <th>Data de Nascimento</th>
                <th>Nacionalidade</th>
                <th>sexo</th>
                <th>Morada</th>
                <th>Email</th>
                <th>Contactos</th>
                <th>Accoes</th>
            </thead>

            <tbody>
                <?php foreach ($admin as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
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
                            <a href="./EditFuncionario.php?id=<?php echo $value->id; ?>&perfil=<?php echo $value->perfil; ?>"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" data-bs-toggle='modal' data-bs-target="#delete"><i class="fa-solid fa-trash-can"></i></a>
                        </td>

                        <div class="modal" id="delete">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Apagar Administrador</h4>
                                    </div>

                                    <div class="modal-body">
                                        Deseja apagar o administrador <?php echo $value->nome." ".$value->apelido ?>?
                                    </div>

                                    <div class="modal-footer">
                                        <a href="../controllers/ApagaFuncionarioController.php?id=<?php echo $value->id ?>&perfil=admin" class="btn btn-danger">Sim</a>
                                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Não</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
            </tbody>
        </table>

    </div>

    <div class="relatorio">
        <a href="" class="btn btn-danger"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</a>
    </div>
</div>

</div>

<?php include_once './foot.php'; ?>
<script src="../../assets/js/gestao.js"></script>