<?php include_once './head.php'; ?>

<div class="container conteudo col-sm-10 p-3">

    <h3 class="text-center"><i class="fa-solid fa-user-plus"></i> Adicionar Novo Funcionario</h3>

    <div class="mt-2">
        <form action="" method="post" class="d-flex">
            <div class="container">
                
                <div class="container">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="container">
                    <label class="form-label">Apelido:</label>
                    <input type="text" class="form-control" name="apelido">
                </div>
                <div class="container">
                    <label class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="dataNascimento">
                </div>
                <div class="container">
                    <label class="form-label">Nacionalidade:</label>
                    <input type="text" class="form-control" name="nacionalidade">
                </div>
                <div class="container">
                    <label class="form-label">Numero de BI:</label>
                    <input type="text" class="form-control" name="nrBI">
                </div>
                <div class="container">
                    <label class="form-label">Sexo:</label>
                    <select name="sexo" class="form-select">
                        <option value="m">M</option>
                        <option value="f">F</option>
                    </select>
                </div>
                <div class="container">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email">
                </div>
            </div>

           <div class="container">
            <div class="container">
                    <label class="form-label">Contactos:</label>
                    <input type="text" class="form-control" name="contactos">
                </div>
                <div class="container">
                    <label class="form-label">Morada:</label>
                    <textarea name="morada" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="container">
                    <label class="form-label">Perfil:</label>
                    <select name="perfil" class="form-select">
                        <option value="admin">Administrador</option>
                        <option value="gestor">Gestor</option>
                    </select>
                </div>
                
                <div class="container my-3">
                    <button class="btn btn-success" type="submit">Registrar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
           </div>
        </form>

    </div>

</div>

</div>

<?php include_once './foot.php'; ?>