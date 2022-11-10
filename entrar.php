<?php 
include_once 'head.php';
?>

<div class="container">

<h1 class="text-center"> Login <i class="fa-solid fa-right-to-bracket"></i></h1>

<div class="container">
        <div class="row mt-5">
            <div class="col-sm-6 offset-sm-3 card bg-light p-5">
        <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="" class="form-control">
         </div>
        <div class="mb-3">
            <label for="" class="form-label"> Senha</label>
            <input type="password" name="password" class="form-control">
        </div>
      
        <div class="m-4">
            <button type="submit" class="btn btn-success">Entrar <i class="fa-solid fa-check"></i></button>
            <div class="form-text"> A senha deve ter entre 6 e 16 caracteres</div>
        </div>
        </form>
</div>


        </div>













<?php 
include_once 'footer.php'; 
?>