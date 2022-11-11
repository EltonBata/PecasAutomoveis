<?php
include_once './head.php';
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}
 include_once '../controllers/Verfeedback.php'; 
?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-comment"></i> Feedbacks</h3>

    <div class="container mt-2">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Cliente</th>
                <th>Mensagem</th>
                <th>Data</th>
                <th>Resposta</th>

            </thead>
            <tbody>
                <?php foreach ($feedback as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->nome; ?></td>
                        <td><?php echo $value->mensagem; ?></td>
                        <td><?php echo $value->data; ?></td>
                        <td><?php echo $value->resposta; ?></td>
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