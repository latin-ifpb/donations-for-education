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
    $donor->cadastrar($_POST['nome'], $_POST['sobrenome'], $_POST['genero'], $_POST['telefone'], $_POST['email'], $_POST['senha'], $_POST['carteira']);
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
            <h5 class="my-0 mr-md-auto font-weight-normal"><img src="../media/moeda.ico" width="10%" /> <a href="index.php"><b>Donations for Education</b></a></h5>
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
        <h2>Cadastre-se</h2>
        <form class="needs-validation" action="signup.php" method="POST" name="cadastro">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Nome</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome" required>
                    <div class="valid-feedback">
                        Parece bom!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Sobrenome</label>
                    <input type="text" class="form-control" id="validationCustom02" name="sobrenome" required>
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
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Não-binário">Não-binário</option>
                        <option value="Prefiro não informar">Prefiro não informar</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione um gênero.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom05">Número de telefone</label>
                    <input type="text" class="form-control" id="validationCustom05" name="telefone" placeholder="(99) 99999-9999" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" required>
                    <div class="invalid-feedback">
                        Por favor, selecione um telefone válido. Ex.: (00) 90000-0000.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col mb-3">
                    <label for="validationCustom05">Endereço de e-mail</label>
                    <input type="text" class="form-control" id="validationCustom05" name="email" placeholder="exemplo@email.com" required>
                    <div class="invalid-feedback">
                        Por favor, selecione um endereço de e-mail válido. Ex.: exemplo@exemplo.com.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col mb-3">
                    <label for="validationCustom05">Carteira Blockchain</label>
                    <input type="text" class="form-control" id="validationCustom05" name="carteira" required>
                    <div class="invalid-feedback">
                        Por favor, informe uma carteira válida.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="password1">Senha</label>
                    <input type="password" name="senha" class="form-control" aria-describedby="passwordHelpBlock" name="senha">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password2">Repita a senha</label>
                    <input type="password" name="senha2" class="form-control" aria-describedby="passwordHelpBlock" name="senha">
                    <div class="invalid-feedback">
                        Senhas não coincidem.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Concordo com os termos e condições.
                    </label>
                    <div class="invalid-feedback">
                        Você precisa concordar para poder se cadastrar.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" onClick="verificarSenha();">Fazer cadastro</button>
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
    <script type="text/JavaScript">
        /*Máscara telefone*/
        function mask(o, f) {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                    o.value = v;
                }
            }, 1);
        }

        function mphone(v) {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (r.length > 2) {
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }

        function verificarSenha() {
            senha1 = document.getElementByName(senha).value;
            senha2 = document.getElementByName(senha2).value;
            alert(senha1, senha2);
            if (senha1 == senha2) {
                document.cadastro.submit();
            } else {
                event.preventDefault();
                event.stopPropagation();
                alert("As senhas não coincidem.");
            }
        }

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>