<?php 
include_once 'head.php';
?>

<div class="container">
<h1 class="text-center fw-bold "> Cadastro de cliente <i class="fa-solid fa-person"></i></h1>

<form action="">
    <div class="row">
<div class="col-sm-12 col-md-6">
        
       <div class="mt-3">
        <label for="Nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="Nome">
       </div>

       <div class="mt-3">
        <label for="Apelido" class="form-label">Apelido</label>
        <input type="text" class="form-control" id="Apelido">
       </div>

       <div class="mt-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email">
       </div>

       

</div>
<div class="col-sm-12 col-md-6">

<div class="mt-3">
        <label for="contactos" class="form-label">Contactos</label>
        <input type="text" class="form-control" id="Contactos">

       </div>
       <div class="mt-3">
        <label for="Morada" class="form-label">Morada</label>
        <input type="text" class="form-control" id="Morada">
        
       </div>
       <div class="mt-3">
        <label for="BI" class="form-label">Numero de BI</label>
        <input type="text" class="form-control" id="BI">
       </div>


</div>

<div class="container my-4 m-5 ">
<button class="btn btn-success" type="submit">Registrar <i class="fa-solid fa-check"></i></button>
<button class="btn btn-danger">Cancelar <i class="fa-solid fa-xmark"></i></button>
</div>



    </div>
</form>

</div>



<?php 
include_once 'footer.php'; 
?>
