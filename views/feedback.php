<?php 
include_once 'head.php';
?>








<div class="container">

<h1 class="text-center fw-bold"> Feedback <i class="fa-solid fa-comment"></i></h1>
<div class="row justify-content-center">
    <form action="" class="col-sm-10 col-sm-8 col-lg-6">
    
<div class="form-floating mb-3">
    <input type="text" class="form-control" autofocus id="txtNome" placeholder="">
<label for="txtNome"> Nome Completo</label>
</div>

<div class="form-floating mb-3">
    <input type="email" class="form-control" autofocus id="txtEmail" placeholder="">
<label for="txtEmail">Email</label>
</div>

<div class="form-floating mb-3">
   <textarea class="form-control" id="txtMensagem" placeholder="" style="height: 200px;"  >
   </textarea>
   <label for="txtMensagem">Mensagem</label>
</div>

<button type="submit" class="btn btn-success">Enviar Mensagem <i class="fa-solid fa-check"></i> </button>


    </form>

</div>


</div>













<?php 
include_once 'footer.php'; 
?>