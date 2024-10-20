<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../css/videos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body>
    <!-- NAVBAR -->
    <?php include('../utils/navbar.php') ?>

    <!-- CONTEÚDO -->
    <main>
        <div class="tituloVideo">
            <h3>ASL Americano</h3>
        </div>

        <div class="container-fluid">
            <div class="conteudo row">
                <div class="col-sm-8">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/jCUaMdXsI7w?list=PL2rZQvyPycXJPaPuFSvtlyQxmb6GfNUP_"
                            title="LEARN ASL FAST with high frequency words | 24 common signs for everyday conversation"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>

                    <div class="video-bar">
                        <ul>
                            <li>
                                <a onclick="toggleDescricao('visao-geral')">Visão Geral</a>
                            </li>
                            <li>
                                <a onclick="toggleDescricao('descricao')">Descrição</a>
                            </li>
                            <li>
                                <a onclick="toggleDescricao('avaliacoes')">Avaliações</a>
                            </li>
                        </ul>
                    </div>

                    <div id="descricao-container" class="descricao-container">

                        <!-- VISÃO GERAL -->
                        <div id="descricao-visao-geral" class="descricao-ocultavel" style="display: none;">
                            <p class="descricaoText">
                                O curso de ASL Americano, também conhecido como American Sign Language (Língua de Sinais
                                Americana), é uma oportunidade empolgante de aprender a língua de sinais usada pela
                                comunidade surda nos Estados Unidos. Neste curso, os alunos serão introduzidos à Libras
                                Americana, que é a versão da ASL adaptada e utilizada no Brasil.<br><br>

                                <strong>Objetivos do curso:</strong><br>
                                O curso de ASL é sobre a língua primária utilizada pela comunidade surda nos Estados
                                Unidos e em algumas regiões do Canadá. Ao aprender ASL, você se capacita a se comunicar
                                diretamente com pessoas surdas, permitindo uma interação mais inclusiva e
                                significativa.<br><br>

                                <strong>1.</strong> Compreender a língua de sinais: O principal objetivo do curso de ASL
                                é capacitar os alunos a compreenderem e se comunicarem efetivamente por meio da língua
                                de sinais. Os alunos irão desenvolver habilidades para compreender os gestos, expressões
                                faciais e movimentos das mãos utilizados na ASL, permitindo-lhes interagir com a
                                comunidade surda de forma significativa.<br><br>

                                <strong>2.</strong> Dominar a gramática e vocabulário da ASL: O curso visa fornecer aos
                                alunos um conhecimento aprofundado da gramática e estrutura da ASL. Eles aprenderão os
                                princípios básicos da construção frasal, a ordem das palavras, o uso correto dos sinais
                                e a aquisição de um vocabulário amplo. Isso permitirá que os alunos se comuniquem de
                                maneira clara e precisa na ASL.<br><br>

                                <strong>3.</strong> Desenvolver habilidades de interpretação: Um objetivo importante do
                                curso de ASL é capacitar os alunos a atuarem como intérpretes entre pessoas surdas e
                                ouvintes. Os alunos aprenderão técnicas de interpretação consecutiva e simultânea, bem
                                como estratégias para lidar com desafios comuns durante a interpretação, como gírias,
                                expressões idiomáticas e termos técnicos.<br><br>

                                <strong>4.</strong> Explorar a cultura surda: Além do aspecto linguístico, o curso de
                                ASL também tem como objetivo proporcionar aos alunos uma compreensão da cultura surda.
                                Eles aprenderão sobre a história, identidade e valores da comunidade surda,
                                permitindo-lhes ter uma abordagem mais abrangente e respeitosa ao se comunicarem em ASL.
                                Isso promoverá a sensibilidade cultural e a inclusão social.<br><br>
                            </p>
                        </div>

                        <?php include('utils/avaliacao.php'); ?>

                        <!-- DESCRIÇÃO -->
                        <div id="descricao-descricao" class="descricao-ocultavel" style="display: none;">
                            <p class="descricaoText">
                                <strong>Conteúdo do curso:</strong><br>

                                O curso de intérprete de Libras oferece uma abordagem abrangente para o aprendizado da
                                língua e práticas interpretativas. Alguns dos tópicos abordados incluem:<br><br>

                                <strong>1.</strong> Introdução à ASL: Neste tópico, os alunos serão apresentados à
                                história, importância e características da ASL. Eles aprenderão sobre a comunidade surda
                                e a cultura associada à língua de sinais.<br><br>

                                <strong>2.</strong> Alfabeto manual e números: Os alunos aprenderão a soletrar palavras
                                e expressar números em ASL usando o alfabeto manual e sinais numéricos. Isso é
                                fundamental para a comunicação básica em ASL.<br><br>

                                <strong>3.</strong> Vocabulário básico: Este tópico abordará o vocabulário essencial em
                                ASL, como cumprimentos, saudações, pronomes, cores, membros da família, animais,
                                alimentos e objetos do cotidiano. Os alunos irão adquirir um repertório básico de sinais
                                para comunicação.<br><br>

                                <strong>4.</strong> Gramática e estrutura de frases: Os alunos estudarão a gramática e a
                                estrutura de frases da ASL. Eles aprenderão sobre a ordem das palavras, a utilização de
                                expressões faciais e corporais, bem como os recursos gramaticais específicos da língua
                                de sinais.<br><br>

                                <strong>5.</strong> Conversação e diálogos básicos: Nesta etapa, os alunos praticarão a
                                comunicação em ASL através de diálogos básicos. Eles aprenderão a iniciar e manter
                                conversas simples, fazer perguntas e responder de forma apropriada.<br><br>

                                <strong>6.</strong> Contextos e vocabulário temático: Este tópico apresentará aos alunos
                                o vocabulário e os sinais específicos de diferentes contextos temáticos, como educação,
                                saúde, viagens, trabalho e lazer. Isso permitirá que os alunos se comuniquem em
                                situações do mundo real de maneira mais eficaz.<br><br>

                                <strong>Benefícios do curso:</strong><br>
                                A ASL é uma expressão cultural única e uma língua completa, com sua própria gramática e
                                estrutura. Ao aprender ASL, você não apenas adquire uma nova habilidade linguística, mas
                                também demonstra respeito e valorização pela diversidade cultural e linguística
                                existente em nossa sociedade.
                                <br><br>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- Rodapé da página -->
    <?php require_once('../utils/footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="../../Js/videos.js"></script>

</body>

</html>