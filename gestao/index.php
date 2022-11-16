<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/gestaoIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="container-fluid d-flex justify-content-center align-items-center">

        <div class="container form p-3">


            <div class="container logo border border-2 rounded-circle d-flex justify-content-center align-items-center"></div>

            <?php if (isset($_SESSION['erro'])) { ?>
                <div class="alert alert-danger alert-dismissible w-50 mx-auto mt-3">
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
                    <?php echo $_SESSION['erro'];
                    unset($_SESSION['erro']) ?>
                </div>
            <?php } ?>

            <form action="./controllers/LoginController.php" method="post" class="mt-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-user-gear"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Introduza o seu username(sem espa&ccedil;os)">
                </div>

                <div class="input-group mt-4">
                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Introduza a sua password">
                </div>

                <div class="mt-4">
                    <button class="btn btn-success">Login</button>
                </div>
            </form>

        </div>

    </div>



</body>

</html>