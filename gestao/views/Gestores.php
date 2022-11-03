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

    <h3 class="text-center"><i class="fa-solid fa-user-gear"></i> Gestores(<?php echo $totalGestores; ?>)</h3>

    <div class="btn-group">
        <a href="#" class="btn disabled">Gestores</a>
        <a href="./Administradores.php" class="btn">Administradores</a>
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
                <?php foreach ($gestor as $key => $value) { ?>
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
                        <td>
                            <a href="./EditFuncionario.php?id=<?php echo $value->id ?>&perfil=<?php echo $value->perfil; ?>"><i class="fa-solid fa-pen">edit</i></a>
                            <a href=""><i class="fa-solid fa-trash-can"></i></a>
                        </td>
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