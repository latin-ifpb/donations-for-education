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
}

$validar = 0;
if ($_SESSION['imagem'] == "default.png") {
    $foto = false;
} else {
    $foto = true;
}
if (isset($_POST['sair'])) {
    $donor = new Donor($mysql);
    $donor->sair();
} else if (isset($_POST['cancelar'])) {
    header('location:index.php');
} else if (isset($_POST['alterarSenha'])) {
    header('location:changePassword.php');
} else if (isset($_POST['salvar'])) {
    $donor = new Donor($mysql);
    $validar = $donor->editar($_POST['nome'], $_POST['sobrenome'], $_POST['genero'], $_POST['telefone'], $_POST['email'], $_POST['carteira'], $_POST['senha']);
} else if(isset($_POST['removerImagem'])){
    $donor = new Donor($mysql);
    $donor->removerImagem();
    header('location:edit.php');
} else if(isset($_POST['alterarImagem'])){
    $nome_arquivo = $_FILES['arquivo']['name'];
    $extensao = pathinfo ($nome_arquivo, PATHINFO_EXTENSION);
    $extensao = strtolower ($extensao);
    if (strstr ('.jpg;.jpeg;.gif;.png', $extensao)) {
        $novo_nome = uniqid (time()) . '.' . $extensao;
        $dir = 'profilePhotos/'.$novo_nome;
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir)){
            $imagem = $novo_nome;
            $donor = new Donor($mysql);
            $donor->alterarImagem($imagem);
        }
    }
    header('location:edit.php');
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
    <link rel="stylesheet" href="../css/perfil.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="sortcut icon" href="../media/bitcoin.ico" type="image/x-icon" />

</head>

<body class="perfil">
    <header>
        <!-- Navigation bar -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
            <h5 class="my-0 mr-md-auto font-weight-normal"><img src="../media/bitcoin.ico" width="5%" /> <a href="../index.php"><b>Donations for Education</b></a></h5>
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
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="profilePhotos/<?php echo $_SESSION["imagem"] ?>" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <input type="file" name="arquivo" accept="image/*" style="margin-bottom: 10px" required>
                                        <button class="btn btn-warning" tipe="submit" <?php if ($foto == true) {echo 'name="alterarImagem" style="float:left"><i class="fa fa-file" aria-hidden="true"></i> Alterar imagem';} else {echo 'name="alterarImagem"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar imagem';}?></button>
                                    </form>
                                    <?php if ($foto == true) {echo '<form method="post" action=""><button class="btn btn-danger" tipe="submit" name="removerImagem" style="float:right"><i class="fa fa-trash" aria-hidden="true"></i> Remover imagem</button></form>';}?>
                                    <h4 style="margin-top: 50px"><?php echo $_SESSION["nome"]; ?></h4>
                                    <p class="text-secondary mb-1">Doador</p>
                                    <p class="text-muted font-size-sm">Instituto Federal de Educação, Ciência e Tecnologia da Paraíba, campus Campina Grande</p>
                                    <form method="post" action="">  
                                        <button class="btn btn-danger" name="sair"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</button>
                                        <button class="btn btn-outline-secondary" name="cancelar"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form class="needs-validation" action="" method="POST">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Nome</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="nome" value="<?php echo $_SESSION["nome"]; ?>" required>
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Sobrenome</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="sobrenome" value="<?php echo $_SESSION["sobrenome"]; ?>" required>
                                        <div class="valid-feedback">
                                            Parece bom!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Gênero</label>
                                        <select class="custom-select" id="validationCustom04" name="genero" required>
                                            <option selected disabled>Escolha...</option>
                                            <option value="Feminino" <?php if ($_SESSION["genero"] == "Feminino") {
                                                                            echo 'selected="selected"';
                                                                        } ?>>Feminino</option>
                                            <option value="Masculino" <?php if ($_SESSION["genero"] == "Masculino") {
                                                                            echo 'selected="selected"';
                                                                        } ?>>Masculino</option>
                                            <option value="Não-binário" <?php if ($_SESSION["genero"] == "Não-binário") {
                                                                            echo 'selected="selected"';
                                                                        } ?>>Não-binário</option>
                                            <option value="Prefiro não informar" <?php if ($_SESSION["genero"] == "Prefiro não informar") {
                                                                                        echo 'selected="selected"';
                                                                                    } ?>>Prefiro não informar</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, selecione um gênero.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom05">Número de telefone</label>
                                        <input type="text" class="form-control" id="validationCustom05" name="telefone" value="<?php echo $_SESSION["telefone"]; ?>" required>
                                        <div class="invalid-feedback">
                                            Por favor, selecione um telefone válido. Ex.: (00) 90000-0000.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for="validationCustom05">Endereço de e-mail</label>
                                        <input type="text" class="form-control" id="validationCustom05" name="email" value="<?php echo $_SESSION["email"]; ?>" required>
                                        <div class="invalid-feedback">
                                            Por favor, selecione um endereço de e-mail válido. Ex.: exemplo@exemplo.com.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for="validationCustom05">Carteira Blockchain</label>
                                        <input type="text" class="form-control" id="validationCustom05" name="carteira" value="<?php echo $_SESSION["carteira"]; ?>" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe uma carteira válida.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for="inputPassword5">Senha atual</label>
                                        <input type="password" id="inputPassword5" class="form-control <?php if ($validar == 1) {echo 'is-invalid';} ?>" aria-describedby="passwordHelpBlock" name="senha">
                                        <?php if ($validar != 1) {echo '<small id="emailHelp" class="form-text text-muted">Digite sua senha atual para garantirmos que é você mesmo.</small>';} ?>
                                        <div class="invalid-feedback">
                                            Senha incorreta.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-primary" type="submit" name="alterarSenha"><i class="fa fa-key" aria-hidden="true"></i> Alterar senha</button>
                                <button class="btn btn-success" type="submit" name="salvar" style="float: right;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            $("main").css("padding-top", ($(".fixed-top").height()) + "px");
        });
    </script>
</body>

</html>