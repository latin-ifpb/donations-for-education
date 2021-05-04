<?php

require '../src/config.php';
require '../src/Donor.php';

session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    $conected = false;
    $user = "Entre ou Cadastre-se";
    $redirect = "signin.php";
} else {
    $conected = true;
    $user = $_SESSION['nome'];
    $redirect = "index.php";
    header('location:index.php');
}

if (isset($_POST['sair'])) {
    $donor = new Donor($mysql);
    $donor->sair();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donor = new Donor($mysql);
    $donor->fazerLogin($_POST['email'], $_POST['senha']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donations for Education</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="sortcut icon" href="../media/moeda.ico" type="image/x-icon" />
</head>

<body>
    <header>
        <!-- Navigation bar -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
            <h5 class="my-0 mr-md-auto font-weight-normal"><img src="../media/moeda.ico" width="10%" /> <a href="../index.php"><b>Donations for Education</b></a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="../index.php">Início</a>
                <a class="p-2 text-dark" href="../about.php">Sobre</a>
                <a class="dropdown">
                    <a class="dropdown-toggle p-2 text-dark" href="<?php echo $redirect ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Olá, <?php echo $user ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if ($conected == true) {
                            echo '<a class="dropdown-item" href="index.php">Minha conta</a><div class="dropdown-divider"></div><form action="" method="POST"><button type="submit" name="sair" class="dropdown-item">Sair</button></form>';
                        } else {
                            echo '<a class="dropdown-item" href="signup.php">Criar conta</a><div class="dropdown-divider"></div><a class="dropdown-item" href="signin.php">Entrar</a>';
                        }
                        ?>
                    </div>
                </a>
            </nav>
            <a class="btn btn-outline-success" href="../donate.php">Doe</a>
        </div>
    </header>

    <!-- Begin page content -->
    <main class="container">
        <form action="signin.php" method="POST">
            <div class="form-group">
                <h2>Entrar</h2>
                <label for="exampleInputEmail1">Endereço de e-mail</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Nós nunca compartilharemos seu endereço de e-mail com ninguém.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </main>

    <!-- Footer -->
    <footer class="navbar justify-content-center">
        Copyright &copy; 2020 Donations for Education | All rights reserved
    </footer>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(".fixed-top").add(window).on('resize load click', function(e) {
            $("main").css("padding-top", ($(".fixed-top").height() + 50) + "px");
        });
    </script>
</body>

</html>