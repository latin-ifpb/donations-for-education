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
</head>

<body>
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
        <!-- <table class="container">
            <tbody>
                <tr>
                    <td>
                        <div class="container">
                            <h1 class="display-4">Olá, você pode mudar o jogo!</h1>
                            <p class="lead">A pandemia do novo coronavírus revelou um ignorado cenário de desigualdade. Pensando
                                nisso, você, mais do que nunca, é peça fundamental para fazer a diferença na vida de algum
                                estudante.</p>
                            <hr class="my-4">
                            <p>Caso deseje e possa, clique no botão abaixo e faça uma doação.
                            </p>
                            <a class="btn btn-success btn-lg" href="donate.php" role="button">Faça uma doação</a>
                        </div>
                    </td>
                    <td><img src="media/indexgif.gif" width="100%" alt="Estudantes na Pandemia"></td>
                </tr>
            </tbody>
        </table>-->
        <div class = "container"><img src="media/indexgif.gif" display= "block" margin-left= "auto" margin-right= "auto" width="100%" alt="Estudantes na Pandemia"></div>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Olá, você pode mudar o jogo!</h1>
                <p class="lead">A pandemia do novo coronavírus revelou um ignorado cenário de desigualdade. Pensando
                    nisso, você, mais do que nunca, é peça fundamental para fazer a diferença na vida de algum
                    estudante.</p>
                <hr class="my-4">
                <p>Caso deseje e possa, clique no botão abaixo e faça uma doação.
                </p>
                <a class="btn btn-success btn-lg" href="donate.php" role="button">Faça uma doação</a>
            </div>
        </div>

        <!-- News cards -->
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="https://ichef.bbci.co.uk/news/800/cpsprodpb/15C03/production/_114719098_1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'Sem wi-fi': pandemia cria novo símbolo de desigualdade na educação
                            </h5>
                            <small class="text-muted">3 de outubro de 2020</small>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Fonte: <a href="https://www.bbc.com/portuguese/brasil-54380828" target="_blank">BBC News Brasil</a></small>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="https://irisbh.com.br/wp-content/uploads/2020/08/08_19-inclusao_digital_ead-THUMB-1200x678.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Inclusão digital ainda é desafio para o EAD, mesmo após 5 meses de
                                pandemia</h5>
                            <small class="text-muted">19 de agosto de 2020</small>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Fonte: <a href="https://irisbh.com.br/inclusao-digital-ainda-e-desafio-para-o-ead-mesmo-apos-5-meses-de-pandemia/" target="_blank">IRIS</a></small>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="https://conteudo.imguol.com.br/c/parceiros/ac/2020/07/25/escolas-em-todo-o-paiacutes-tiveram-que-fechar-por-causa-da-pandemia-da-covid-19-1595712632473_v2_900x506.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pandemia afetou o acesso à educação para 70% dos jovens no mundo</h5>
                            <small class="text-muted">11 de agosto de 2020</small>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Fonte: <a href="https://noticias.uol.com.br/colunas/jamil-chade/2020/08/11/pandemia-afetou-a-educacao-para-70-dos-jovens-no-mundo.htm" target="_blank">UOL</a></small>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="https://ichef.bbci.co.uk/news/800/cpsprodpb/2732/production/_113543001_xx.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pandemia deve intensificar abandono de escola entre alunos mais
                                pobres</h5>
                            <small class="text-muted">23 de julho de 2020</small>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Fonte: <a href="https://www.bbc.com/portuguese/brasil-53476057" target="_blank">BBC News Brasil</a></small>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="https://s2.glbimg.com/kZmJSuYlmMRvlimGbcpoMTmOBn8=/0x0:1340x814/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2020/Y/k/PwjnukTdW5Lv4UzSxY3A/disponibilidade-de-computador-no-domicilio.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Quase 40% dos alunos de escolas públicas não têm computador ou tablet
                                em casa, aponta estudo</h5>
                            <small class="text-muted">9 de junho de 2020</small>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Fonte: <a href="https://g1.globo.com/educacao/noticia/2020/06/09/quase-40percent-dos-alunos-de-escolas-publicas-nao-tem-computador-ou-tablet-em-casa-aponta-estudo.ghtml" target="_blank">G1</a></small>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="https://imagens.ebc.com.br/1MxNTeC2E-esXZNY8Y6-Vd1h58M=/1170x700/smart/https://agenciabrasil.ebc.com.br/sites/default/files/thumbnails/image/wide_tmazs_edit.07.08.2018_01.jpg?itok=QRjoTn8V" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Brasil tem 4,8 milhões de crianças e adolescentes sem internet em
                                casa</h5>
                            <small class="text-muted">17 de maio de 2020</small>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Fonte: <a href="https://agenciabrasil.ebc.com.br/educacao/noticia/2020-05/brasil-tem-48-milhoes-de-criancas-e-adolescentes-sem-internet-em-casa" target="_blank">Agência Brasil</a></small>
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
            $("main").css("padding-top", ($(".fixed-top").height() + 50) + "px");
        });
    </script>
</body>

</html>