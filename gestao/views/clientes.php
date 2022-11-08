<?php include_once './head.php'; ?>

<?php include_once '../controllers/verClienteControler.php'; ?>


<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-users-gear"></i> (<?php echo $totalClientes; ?>)</h3>

    <div class="container mt-2">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Numero de BI</th>
                <th>Nome</th>
                <th>Apelido</th>
                <th>Email</th>
                <th>Contactos</th>
                <th>Morada</th>
            </thead>
     
        <tbody>
                <?php foreach ($cliente as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->nome; ?></td>
                        <td><?php echo $value->apelido; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->contactos; ?></td>
                        <td><?php echo $value->morada; ?></td>
                        <td><?php echo $value->nr_bi; ?></td>
                        <?php }?>

            </tbody>
            </table> 

    </div>
    <div class="relatorio">
        <a href="" class="btn btn-danger"><i class="fa-solid fa-file-invoice"></i> Gerar Relatorio</a>
    </div>

</div>

</div>

<?php include_once './foot.php'; ?>