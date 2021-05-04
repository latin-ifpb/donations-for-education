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
        <div class="container">
            <img src="media/sobre.png" id="donateImage" alt="Estudantes e Logotipo do Projeto"/>
        </div>

        <!-- Cards -->
        <div class="container about">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="media/Donations Parceria.png" width="95%" alt="Parcerias e Objetivos do Donations for Education">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">Donations for Education</h2>
                            <p class="card-text">O projeto Donations for Educations consiste no registro de doações para estudantes do Instituto Federal de Educação, Ciência e Tecnologia da Paraíba (IFPB), campus Campina Grande, com o intuito de arrecadar doações a fim de que cada estudante possa atingir sua meta e, consequentemente, adquirir um equipamento ou serviço de internet. Desse modo, melhorará as condições que subsidiem o processo educacional neste contexto de pandemia, ocasionada pelo novo Coronavírus. Com esse cenário, as aulas presenciais foram substituídas por aulas on-line. Entretanto, muitos alunos se encontram em condições vulneráveis para adquirir computadores e um serviço de internet adequado, o que o prejudica e torna o cenário educacional brasileiro cada vez mais desigual.</p>
                            <p class="card-text">Pensando nisso, esse projeto se configura em uma forma de você poder investir na educação diretamente. Para isso, é necessário ir à página “Doe” e escolher um estudante que receberá sua contribuição para atingir sua respectiva meta. No card de cada estudante, ficará disponível o quanto já foi arrecadado e a meta dele!. Esse projeto de pesquisa foi desenvolvido com a tecnologia Blockchain, a qual funciona como uma rede de blocos em cadeia, onde as informações são armazenadas de maneira segura, transparente e confiável. Dessa forma, cada doação é registrada, assim como quem a realizou e para qual estudante a quantia foi direcionada, com o intuito de transparecer segurança e confiabilidade.</p>
                            <p class="card-text">Além disso, o projeto contribui para o cumprimento do 4º e 10º Objetivos do Desenvolvimento Sustentável, dos 17 objetivos da Agenda 2030 da Organização das Nações Unidas (ONU), no tocante à Educação de Qualidade e à Redução das Desigualdades, respectivamente. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Pandemia</h2>
                    <p class="card-text">Em março de 2020, os alunos de todo Brasil precisaram modificar suas rotinas, de modo que a sala de aula, os colegas de classe, o trajeto de sua casa para escola tiveram que ser deixados de lado para serem substituídos por uma tela digital. Isso aconteceu a fim de evitar a propagação do novo Coronavírus que, atualmente, atingiu a marca de 160 mil mortes, segundo a Secretaria Estadual da Saúde. Acompanhando os rumos da saúde, segundo a Organização das Nações Unidas para a Educação, a Ciência e a Cultura (UNESCO), a pandemia da COVID-19 impactou a educação de mais de 1,5 bilhão de estudantes em 188 países, o que representa cerca de 91% do total de estudantes no planeta.</p>
                    <p class="card-text">Sob essa perspectiva, a educação foi impactada, principalmente, devido à falta de inclusão digital entre professores e alunos para o acesso às aulas do Ensino à Distância (EAD), que conta com aulas on-line em salas de aula virtuais. Contudo, segundo a pesquisa do Instituto Brasileiro de Geografia e Estatística (IBGE), apenas 57% da população do nosso país possui um computador em condições de executar softwares mais recentes, ou seja, essenciais para a educação on-line. Nessa perspectiva, outro estudo realizado em 2018, a Pesquisa TIC Domicílio, aponta que mais de 30% dos lares no Brasil não possuem acesso à internet, um serviço que é praticamente indispensável para o ensino remoto. Sendo assim, por falta de condições, muitos alunos ficaram sem condições de assistirem às aulas, devido à falta de acesso a equipamentos e serviços de internet, tornando-se, cada vez mais, um impasse para uma educação igualitária a todos os estudantes brasileiros.</p>
                </div>
                <img src="media/pandemia.png" width="50%" class="card-img-bottom" alt="Realidade de Pandemia">
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Blockchain</h2>
                    <p class="card-text">A tecnologia Blockchain consiste em um livro de razão pública, na qual se registra uma transação com moeda virtual, geralmente é o Bitcoin, de forma imutável e segura. Isso garante uma transparência nas transações que foram realizadas, uma vez que mostra quem realizou a transação, quem a recebeu, a quantia envolvida, bem como o horário na qual foi realizada. Nesse caso, os registros das doações serão feitas utilizando a tecnologia Blockchain, para conferir transparência ao serviço e torná-lo mais confiável para você.</p>
                    <p class="card-text">Para armazenar os dados, cada bloco armazena os registros de transações em um determinado tempo e se ligam aos demais blocos anteriores. Esses blocos são dependentes um dos outros e formam uma cadeia, por isso, o nome Blockchain, do inglês, Block = Bloco e Chain = Cadeia. Essa rede blockchain é formada por mineradores, que verificam e registram as transações no bloco, pois emprestam poder computacional para a rede, em troca de moedas digitais.</p>
                    <p class="card-text">Entretanto, essa transação só pode acontecer se uma maioria simples da rede concordar com a legitimidade dela, ou seja, só é efetuada caso o consenso da rede aprovar. Em relação as moedas do Bitcoin, por exemplo, esse consenso é medido por meio do poder computacional. Portanto, nota-se que Blockchain é uma tecnologia distribuída, a qual registra transações de moedas virtuais em uma cadeia de blocos, que podem contar com a participação honesta de cada participante para assegurar o registro de informações confiáveis, imutáveis transparentes.</p>
                    <img src="media/blockchain.png" class="card-img-top" alt="Rede de Blockchain">
                </div>
            </div>

            <div class="card">
                <h2>Integrantes</h2>
                <div class="team card-group">
                    <div class="person col mb-4">
                        <div class="circle">
                            <a href="https://github.com/catarinaramalho" target="_blank"><img src="media/team/Catarina.png" class="circleImage" /></a>
                        </div>
                        <h5>Catarina</h5>
                    </div>
                    <div class="person col mb-4">
                        <div class="circle">
                            <a href="https://github.com/gildercia" target="_blank"><img src="media/team/Gildércia.png" class="circleImage" /></a>
                        </div>
                        <h5>Gildércia</h5>
                    </div>
                    <div class="person col mb-4">
                        <div class="circle">
                            <a href="https://github.com/joaovitorsl" target="_blank"><img src="media/team/João.png" class="circleImage" /></a>
                        </div>
                        <h5>João Vitor</h5>
                    </div>
                    <div class="person col mb-4">
                        <div class="circle">
                            <a href="https://github.com/TavaresJonatas" target="_blank"><img src="media/team/Jônatas.png" class="circleImage" /></a>
                        </div>
                        <h5>Jônatas</h5>
                    </div>
                    <div class="person col mb-4">
                        <div class="circle">
                            <a href="https://github.com/katyusco" target="_blank"><img src="media/team/Katyusco.png" class="circleImage" /></a>
                        </div>
                        <h5>Katyusco</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- <h2>Donations for Education</h2>
            <p>O projeto Donations for Educations consiste no registro de doações para estudantes do Instituto Federal de Educação, Ciência e Tecnologia da Paraíba (IFPB), campus Campina Grande, com o intuito de arrecadar doações a fim de que cada estudante possa atingir sua meta e, consequentemente, adquirir um equipamento ou serviço de internet. Desse modo, melhorará as condições que subsidiem o processo educacional neste contexto de pandemia, ocasionada pelo novo Coronavírus. Com esse cenário, as aulas presenciais foram substituídas por aulas on-line. Entretanto, muitos alunos se encontram em condições vulneráveis para adquirir computadores e um serviço de internet adequado, o que o prejudica e torna o cenário educacional brasileiro cada vez mais desigual.</p>
            <p>Pensando nisso, esse projeto se configura em uma forma de você poder investir na educação diretamente. Para isso, é necessário ir à página “Doe” e escolher um estudante que receberá sua contribuição para atingir sua respectiva meta. No card de cada estudante, ficará disponível o quanto já foi arrecadado e a meta dele!. Esse projeto de pesquisa foi desenvolvido com a tecnologia Blockchain, a qual funciona como uma rede de blocos em cadeia, onde as informações são armazenadas de maneira segura, transparente e confiável. Dessa forma, cada doação é registrada, assim como quem a realizou e para qual estudante a quantia foi direcionada, com o intuito de transparecer segurança e confiabilidade.</p>
            <h2>Pandemia</h2>
            <p>Em março de 2020, os alunos de todo Brasil precisaram modificar suas rotinas, de modo que a sala de aula, os colegas de classe, o trajeto de sua casa para escola tiveram que ser deixados de lado para serem substituídos por uma tela digital. Isso aconteceu a fim de evitar a propagação do novo Coronavírus que, atualmente, atingiu a marca de 160 mil mortes, segundo a Secretaria Estadual da Saúde. Acompanhando os rumos da saúde, segundo a Organização das Nações Unidas para a Educação, a Ciência e a Cultura (UNESCO), a pandemia da COVID-19 impactou a educação de mais de 1,5 bilhão de estudantes em 188 países, o que representa cerca de 91% do total de estudantes no planeta.</p>
            <p>Sob essa perspectiva, a educação foi impactada, principalmente, devido à falta de inclusão digital entre professores e alunos para o acesso às aulas do Ensino à Distância (EAD), que conta com aulas on-line em salas de aula virtuais. Contudo, segundo a pesquisa do Instituto Brasileiro de Geografia e Estatística (IBGE), apenas 57% da população do nosso país possui um computador em condições de executar softwares mais recentes, ou seja, essenciais para a educação on-line. Nessa perspectiva, outro estudo realizado em 2018, a Pesquisa TIC Domicílio, aponta que mais de 30% dos lares no Brasil não possuem acesso à internet, um serviço que é praticamente indispensável para o ensino remoto. Sendo assim, por falta de condições, muitos alunos ficaram sem condições de assistirem às aulas, devido à falta de acesso a equipamentos e serviços de internet, tornando-se, cada vez mais, um impasse para uma educação igualitária a todos os estudantes brasileiros.</p>
            <h2>Blockchain</h2>
            <p>A tecnologia Blockchain consiste em um livro de razão pública, na qual se registra uma transação com moeda virtual, geralmente é o Bitcoin, de forma imutável e segura. Isso garante uma transparência nas transações que foram realizadas, uma vez que mostra quem realizou a transação, quem a recebeu, a quantia envolvida, bem como o horário na qual foi realizada. Nesse caso, os registros das doações serão feitas utilizando a tecnologia Blockchain, para conferir transparência ao serviço e torná-lo mais confiável para você.</p>
            <p>Para armazenar os dados, cada bloco armazena os registros de transações em um determinado tempo e se ligam aos demais blocos anteriores. Esses blocos são dependentes um dos outros e formam uma cadeia, por isso, o nome Blockchain, do inglês, Block = Bloco e Chain = Cadeia. Essa rede blockchain é formada por mineradores, que verificam e registram as transações no bloco, pois emprestam poder computacional para a rede, em troca de moedas digitais.</p>
            <p>Entretanto, essa transação só pode acontecer se uma maioria simples da rede concordar com a legitimidade dela, ou seja, só é efetuada caso o consenso da rede aprovar. Em relação as moedas do Bitcoin, por exemplo, esse consenso é medido por meio do poder computacional. Portanto, nota-se que Blockchain é uma tecnologia distribuída, a qual registra transações de moedas virtuais em uma cadeia de blocos, que podem contar com a participação honesta de cada participante para assegurar o registro de informações confiáveis, imutáveis transparentes.</p>-->


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