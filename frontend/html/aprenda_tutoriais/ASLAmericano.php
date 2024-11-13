<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include_once('../utils/head.php') ?>
    <title>Curso ASL - Americano</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php include('../utils/navbar.php') ?>

    <!-- CONTEÚDO -->
    <main class="container-fluid">
        <div class="text-center">
            <h3>ASL Americano</h3>
        </div>
        <div>
            <?php
            ob_start();
            ?>

            <!-- DESCRIÇÃO -->
            <div>
                <h5>Conteúdo do vídeo:</h5>

                <p>
                    O curso de intérprete de Libras oferece uma abordagem abrangente para o aprendizado da língua e práticas interpretativas.
                </p>

                <h5>Alguns dos tópicos abordados incluem:</h5>

                <ul class="list-unstyled">
                    <li>
                        <strong>1. Introdução à ASL</strong><br> Neste tópico, os alunos serão apresentados à história, importância e características da ASL. Eles aprenderão sobre a comunidade surda e a cultura associada à língua de sinais.
                    </li>
                    <li>
                        <strong>2. Alfabeto manual e números</strong><br> Os alunos aprenderão a soletrar palavras e expressar números em ASL usando o alfabeto manual e sinais numéricos. Isso é fundamental para a comunicação básica em ASL.
                    </li>
                    <li>
                        <strong>3. Vocabulário básico</strong><br> Este tópico abordará o vocabulário essencial em ASL, como cumprimentos, saudações, pronomes, cores, membros da família, animais, alimentos e objetos do cotidiano. Os alunos irão adquirir um repertório básico de sinais para comunicação.
                    </li>
                    <li>
                        <strong>4. Gramática e estrutura de frases</strong><br> Os alunos estudarão a gramática e a estrutura de frases da ASL. Eles aprenderão sobre a ordem das palavras, a utilização de expressões faciais e corporais, bem como os recursos gramaticais específicos da língua de sinais.
                    </li>
                    <li>
                        <strong>5. Conversação e diálogos básicos</strong><br> Nesta etapa, os alunos praticarão a comunicação em ASL através de diálogos básicos. Eles aprenderão a iniciar e manter conversas simples, fazer perguntas e responder de forma apropriada.
                    </li>
                    <li>
                        <strong>6. Contextos e vocabulário temático</strong><br> Este tópico apresentará aos alunos o vocabulário e os sinais específicos de diferentes contextos temáticos, como educação, saúde, viagens, trabalho e lazer. Isso permitirá que os alunos se comuniquem em situações do mundo real de maneira mais eficaz.
                    </li>
                </ul>

                <h5>Benefícios do curso:</h5>
                <p>
                    A ASL é uma expressão cultural única e uma língua completa, com sua própria gramática e estrutura. Ao aprender ASL, você não apenas adquire uma nova habilidade linguística, mas também demonstra respeito e valorização pela diversidade cultural e linguística existente em nossa sociedade.
                </p>
            </div>

            <?php
            // Captura o conteúdo do buffer
            $htmlContent = ob_get_clean();

            // Passa o conteúdo para a função de inclusão
            includeWithVariables('modal/modal.php', array('title' => 'Visão Geral', 'content' => $htmlContent, 'textButton' => 'Mostrar Visão Geral'));
            ?>
        </div>

        <div class="row mt-4">
            <div class="col-md-9 col-sm-9 col-xs-12 mx-auto">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/jCUaMdXsI7w?list=PL2rZQvyPycXJPaPuFSvtlyQxmb6GfNUP_"
                        title="LEARN ASL FAST with high frequency words | 24 common signs for everyday conversation"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </main>

    <!-- Rodapé da página -->
    <?php require_once('../utils/footer.php') ?>

</body>

</html>