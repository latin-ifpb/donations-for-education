<?php

require 'src/config.php';
require 'src/Donor.php';

session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    $conected = false;
    $user = "Entre ou Cadastre-se";
    $redirect = "profile/signin.php";
} else {
    $conected = true;
    $user = $_SESSION['nome'];
    $redirect = "profile/index.php";
}

if (isset($_POST['sair'])) {
    $donor = new Donor($mysql);
    $donor->sair();
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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="sortcut icon" href="media/moeda.ico" type="image/x-icon" />
    <script type="text/javascript" src="js/script.js"></script>
</head>

<body onload="pagination()">
    <header>
        <!-- Navigation bar -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
            <h5 class="my-0 mr-md-auto font-weight-normal"><img src="media/moeda.ico" width="10%" /> <a href="index.php"><b>Donations for Education</b></a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="index.php">Início</a>
                <a class="p-2 text-dark" href="about.php">Sobre</a>
                <a class="dropdown">
                    <a class="dropdown-toggle p-2 text-dark" href="<?php echo $redirect ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Olá, <?php echo $user ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if ($conected == true) {
                            echo '<a class="dropdown-item" href="profile/index.php">Minha conta</a><div class="dropdown-divider"></div><form action="" method="POST"><button type="submit" name="sair" class="dropdown-item">Sair</button></form>';
                        } else {
                            echo '<a class="dropdown-item" href="profile/signup.php">Criar conta</a><div class="dropdown-divider"></div><a class="dropdown-item" href="profile/signin.php">Entrar</a>';
                        }
                        ?>
                    </div>
                </a>
            </nav>
            <a class="btn btn-outline-success" href="donate.php">Doe</a>
        </div>
    </header>

    <!-- Begin page content -->
    <main>
        <!-- Cards -->
        <div class="container">
            <img src="media/doe.png" id="donateImage" alt="Passo a passo para doação transformadora"/>
            <div class="options row row-cols-1 row-cols-md-4">
                <div class="input-group col mb-3">
                    <select class="custom-select" id="etnia_cor" onchange="pagination()">
                        <option value="0" selected>Etnia/Cor</option>
                        <option value="1">Preta</option>
                        <option value="2">Parda</option>
                        <option value="3">Indígena</option>
                        <option value="4">Amarela</option>
                        <option value="5">Branca</option>
                    </select>
                </div>
                <div class="input-group col mb-3">
                    <select class="custom-select" id="pcd" onchange="pagination()">
                        <option value="0" selected>Pessoa com Deficiência</option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                </div>
                <div class="input-group col mb-3">
                    <select class="custom-select" id="tipoArea" onchange="pagination()">
                        <option value="0" selected>Tipo da Área Residencial</option>
                        <option value="1">Urbana</option>
                        <option value="2">Rural</option>
                        <option value="3">Comunidade Indígena</option>
                        <option value="4">Comunidade Quilombola</option>
                        <option value="5">Comunidade Cigana</option>
                        <option value="6">Assentamento</option>
                    </select>
                </div>
                <div class="input-group col mb-3">
                    <select class="custom-select" id="curso" onchange="pagination()">
                        <option value="0" selected>Curso</option>
                        <optgroup label="Técnico Integrado">
                            <option value="1">Administração (PROEJA)</option>
                            <option value="2">Edificações</option>
                            <option value="3">Informática</option>
                            <option value="4">Mineração</option>
                            <option value="5">Petróleo e Gás</option>
                            <option value="6">Química</option>
                        </optgroup>
                        <optgroup label="Técnico Subsequente">
                            <option value="7">Informática</option>
                            <option value="8">Informática (EaD)</option>
                            <option value="9">Manutenção e Suporte em Informática</option>
                            <option value="10">Mineração</option>
                            <option value="11">Segurança do Trabalho</option>
                        </optgroup>
                        <optgroup label="Técnológico">
                            <option value="12">Construção de Edifícios</option>
                            <option value="13">Telemática</option>
                        </optgroup>
                        <optgroup label="Bacharelado">
                            <option value="14">Engenharia de Computação</option>
                        </optgroup>
                        <optgroup label="Licenciatura">
                            <option value="15">Física</option>
                            <option value="16">Letras - Língua Portuguesa</option>
                            <option value="17">Licenciatura em Matemática</option>
                        </optgroup>
                        <optgroup label="Especialização">
                            <option value="18">Docência para a Educação Profissional e Tecnológica (EaD/UAB)</option>
                            <option value="19">Ensino de Matemática</option>
                        </optgroup>
                        <optgroup label="Mestrado">
                            <option value="20">Propriedade Intelectual e Transferência de Tecnologia para a Inovação (PROFNIT)</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <hr />

            <div class="row row-cols-1 row-cols-md-3" id="students"></div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                </ul>
            </nav>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="makeDonation" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Fazer doação</h5>
                        <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row align-items-center justify-content-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">R$</div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="0,00" id="quantity" minlength="3" onkeypress='$(this).mask("#.##0,00", {reverse: true});' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Finalizar Doação</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table 
        <div class="container">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Meta</th>
                        <th scope="col">Arrecadado</th>
                        <th scope="col" width="25%">Progresso</th>
                    </tr>
                </thead>
            </table>
        </div>-->
    </main>

    <!-- Footer -->
    <footer class="navbar justify-content-center">
        Copyright &copy; 2020 Donations for Education | All rights reserved
    </footer>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('input:text').val('');
            });
        });

        $(".fixed-top").add(window).on('resize load click', function(e) {
            $("main").css("padding-top", ($(".fixed-top").height() + 15) + "px");
        });
    </script>
</body>

</html>