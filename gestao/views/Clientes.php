<?php
include_once './head.php';
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}
?>

<?php include_once '../controllers/VerClienteControler.php'; ?>


<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-users-gear"></i> Cliente (<?php echo $totalClientes; ?>)</h3>

    <div class="container mt-2">
        <table class="table">
            <thead>
                <th>Nr</th>
                <th>Numero de BI</th>
                <th>Nome</th>
                <th>Apelido</th>
                <th>Email</th>
                <th>Contactos</th>
                <th>Morada</th>
            </thead>

            <tbody>
                <?php
                $count = 1;
                foreach ($cliente as $key => $value) {
                ?>
                    <tr>
                        <td class="text-start"><?php echo $count; ?></td>
                        <td class="text-start"><?php echo $value->nr_bi; ?></td>
                        <td class="text-start"><?php echo $value->nome; ?></td>
                        <td class="text-start"><?php echo $value->apelido; ?></td>
                        <td class="text-start"><?php echo $value->email; ?></td>
                        <td class="text-start"><?php echo $value->contactos; ?></td>
                        <td class="text-start"><?php echo $value->morada; ?></td>
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