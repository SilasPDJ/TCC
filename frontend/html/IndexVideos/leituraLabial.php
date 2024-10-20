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
            <h3>Introdução à leitura labial</h3>
        </div>

        <div class="container-fluid">
            <div class="conteudo row">
                <div class="col-sm-8">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/PDrMpCQYdy4"
                            title="Leitura Labial faz parte da Língua Brasileira de Sinais | Conhecendo Libras"
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
                                O curso de leitura labial é uma valiosa oportunidade para pessoas surdas aprimorarem
                                suas habilidades de compreensão da fala por meio da leitura dos movimentos dos lábios e
                                expressões faciais. Desenvolvido especificamente para atender às necessidades e desafios
                                enfrentados pela comunidade surda, este curso oferece uma visão abrangente e prática da
                                leitura labial como uma ferramenta adicional de comunicação.<br><br>

                                <strong>Objetivos do curso:</strong><br>
                                A leitura labial é uma habilidade que permite às pessoas surdas obterem informações
                                complementares durante a interação verbal. Ao aprender a observar e interpretar os
                                movimentos dos lábios, expressões faciais e gestos relacionados, os participantes do
                                curso poderão compreender melhor a mensagem transmitida oralmente.<br><br>

                                <strong>1.</strong> Desenvolver habilidades de leitura labial: O principal objetivo do
                                curso é capacitar as pessoas surdas a aprimorarem suas habilidades de leitura labial. Os
                                alunos aprenderão a observar os movimentos dos lábios, expressões faciais e outros
                                sinais visuais para compreender melhor a fala e obter informações adicionais durante a
                                comunicação oral.<br><br>

                                <strong>2.</strong> Reconhecer sons e palavras através da leitura labial: O curso tem
                                como objetivo ajudar os alunos a reconhecer e distinguir diferentes sons e palavras por
                                meio da leitura labial. Eles aprenderão a identificar padrões de movimento dos lábios
                                associados a sons específicos, melhorando assim sua capacidade de compreensão da
                                fala.<br><br>

                                <strong>3.</strong> Utilizar pistas contextuais e visuais para auxiliar na compreensão:
                                Os participantes aprenderão a utilizar pistas contextuais e outras informações visuais
                                disponíveis para auxiliar na leitura labial. Eles serão treinados para observar gestos,
                                expressões faciais e outros elementos visuais que podem fornecer pistas adicionais sobre
                                o significado da fala.<br><br>

                                <strong>4.</strong> Lidar com desafios e aprimorar a concentração visual: O curso
                                abordará estratégias para lidar com desafios comuns encontrados na leitura labial, como
                                diferentes sotaques, condições de iluminação variadas e distorções visuais. Os alunos
                                também aprenderão técnicas para aprimorar sua concentração visual, permitindo que se
                                concentrem nos movimentos dos lábios de forma mais eficaz.<br><br>
                            </p>
                        </div>

                        <?php include('utils/avaliacao.php'); ?>

                        <!-- DESCRIÇÃO -->
                        <div id="descricao-descricao" class="descricao-ocultavel" style="display: none;">
                            <p class="descricaoText">
                                <strong>Conteúdo do curso:</strong><br>

                                O principal objetivo de um curso de leitura labial para surdos é capacitar os
                                participantes a desenvolverem habilidades eficazes de leitura dos movimentos dos lábios
                                e expressões faciais, permitindo-lhes compreender melhor a fala e obter informações
                                adicionais durante a comunicação oral. O curso visa proporcionar aos surdos uma
                                ferramenta adicional de comunicação, aumentando sua compreensão e promovendo uma
                                interação mais completa e inclusiva com outras pessoas.<br><br>

                                <strong>1.</strong> Introdução à leitura labial: Neste tópico, os alunos serão
                                introduzidos aos conceitos básicos da leitura labial, compreendendo sua importância e
                                como ela pode complementar a comunicação oral para pessoas surdas.<br><br>

                                <strong>2.</strong> Movimentos labiais e articulação: Os participantes irão aprender a
                                reconhecer e interpretar os diferentes movimentos dos lábios e articulações relacionados
                                à produção dos sons da fala. Serão abordados aspectos como formas de abertura dos
                                lábios, posição da língua e movimentos faciais.<br><br>

                                <strong>3.</strong> Expressões faciais e gestos: Este tópico explorará a importância das
                                expressões faciais e gestos em conjunto com a leitura labial. Os alunos aprenderão a
                                observar e interpretar as expressões faciais e os gestos que acompanham a fala,
                                fornecendo pistas adicionais para a compreensão do discurso.<br><br>

                                <strong>4.</strong> Contexto e pistas visuais: Os participantes aprenderão a utilizar o
                                contexto da conversa e outras pistas visuais disponíveis para auxiliar na leitura
                                labial. Isso inclui observar a linguagem corporal, gestos, postura e outras informações
                                visuais que podem ajudar na interpretação da fala.<br><br>

                                <strong>5.</strong> Treinamento prático: O curso incluirá atividades práticas que
                                permitirão aos alunos aprimorar suas habilidades de leitura labial. Eles terão a
                                oportunidade de praticar em diferentes situações de comunicação, como diálogos,
                                palestras ou vídeos, para desenvolver sua capacidade de compreensão.<br><br>

                                <strong>6.</strong> Estratégias de aprimoramento: Este tópico abordará estratégias para
                                aprimorar a leitura labial, como o uso da memória visual, a melhoria da concentração
                                visual e a superação de desafios específicos, como sotaques ou condições de iluminação
                                desfavoráveis.<br><br>

                                <strong>Benefícios do curso:</strong><br>
                                A leitura labial pode promover uma inclusão social mais ampla, permitindo que os surdos
                                se envolvam mais facilmente em conversas e interações com pessoas ouvintes. Isso reduz
                                as barreiras de comunicação e fortalece os laços entre indivíduos surdos e ouvintes.
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