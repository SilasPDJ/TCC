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
            <h3>Intérprete de Libras</h3>
        </div>

        <div class="container-fluid">
            <div class="conteudo row">
                <div class="col-sm-8">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/4F5QfBq2vX0"
                            title="CURSO DE LIBRAS aula #01 Com apostila e Certificado!" frameborder="0"
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
                                O curso de intérprete de Libras (Língua Brasileira de Sinais) é uma formação essencial
                                para aqueles que desejam atuar como mediadores de comunicação entre pessoas surdas e
                                ouvintes. A Libras é reconhecida como uma língua oficial no Brasil, e a demanda por
                                intérpretes qualificados tem crescido significativamente. Este curso abrangente oferece
                                aos participantes os conhecimentos teóricos e práticos necessários para se tornarem
                                intérpretes profissionais e promoverem a inclusão de pessoas surdas na
                                sociedade.<br><br>

                                <strong>Objetivos do curso:</strong><br>
                                O curso de intérprete de Libras tem como principal objetivo capacitar os alunos a
                                compreenderem e se comunicarem efetivamente por meio da língua de sinais, a fim de
                                facilitar a interação entre surdos e ouvintes. Os objetivos específicos incluem:<br><br>

                                <strong>1.</strong> Compreender a cultura surda: O curso proporciona um entendimento
                                aprofundado da cultura, história e identidade surda, ajudando os alunos a desenvolverem
                                uma sensibilidade cultural essencial para o trabalho de interpretação.<br><br>

                                <strong>2.</strong> Dominar a língua de sinais: Os participantes aprendem a dominar a
                                gramática, vocabulário e estrutura da Libras, bem como a expressão facial e corporal
                                necessárias para uma comunicação eficaz.<br><br>

                                <strong>3.</strong> Desenvolver habilidades interpretativas: O curso abrange técnicas de
                                interpretação consecutiva e simultânea, bem como estratégias para lidar com situações
                                desafiadoras e garantir a precisão e fluência na tradução.<br><br>

                                <strong>4.</strong> Conhecer terminologias específicas: Os alunos também são
                                introduzidos a terminologias específicas em diversas áreas, como educação, saúde,
                                direito e outros campos, preparando-os para atuar em diferentes contextos
                                profissionais.<br><br>
                            </p>
                        </div>

                        <?php include('utils/avaliacao.php'); ?>

                        <!-- DESCRIÇÃO -->
                        <div id="descricao-descricao" class="descricao-ocultavel" style="display: none;">
                            <p class="descricaoText">
                                <strong>Conteúdo do curso:</strong><br>

                                O curso de intérprete de Libras oferece uma abordagem abrangente para o aprendizado da
                                língua e práticas interpretativas. Alguns dos tópicos abordados incluem:<br><br>

                                <strong>1.</strong> Introdução à Libras: história, estrutura gramatical, vocabulário
                                básico e expressões faciais e corporais.<br><br>

                                <strong>2.</strong> Cultura surda: conhecendo a comunidade surda, suas conquistas,
                                desafios e a importância da inclusão.<br><br>

                                <strong>3.</strong> Técnicas de interpretação: interpretação consecutiva e simultânea,
                                estratégias de tradução, práticas de acompanhamento e gerenciamento de estresse.<br><br>

                                <strong>4.</strong> Terminologia especializada: vocabulário específico em áreas como
                                educação, saúde, jurídica, entre outras.<br><br>

                                <strong>5.</strong> Ética e profissionalismo: diretrizes éticas para a atuação como
                                intérprete de Libras, confidencialidade, postura profissional e desenvolvimento
                                contínuo.<br><br>

                                <strong>6.</strong> Práticas supervisionadas: oportunidades para praticar as habilidades
                                interpretativas em situações reais, sob a supervisão de instrutores experientes.<br><br>

                                <strong>Benefícios do curso:</strong><br>

                                Ao concluir o curso de intérprete de Libras, os alunos estarão preparados para ingressar
                                em uma carreira gratificante como intérpretes profissionais. Além disso, eles
                                contribuirão diretamente para a inclusão de pessoas surdas e mudas.<br><br>
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