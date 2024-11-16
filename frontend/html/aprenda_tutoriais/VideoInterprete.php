<!DOCTYPE html>
<html>

<head>
    <title>Curso</title>
    <?php require_once('../utils/head.php') ?>

</head>

<body>
    <!-- NAVBAR -->
    <?php include('../utils/navbar.php');
    ?>

    <!-- CONTEÚDO -->
    <main class="container-fluid">
        <div class="text-center">
            <h2>Intérprete de Libras</h2>
        </div>

        <div>
            <?php
            ob_start();
            ?>
            <!-- Descrição -->
            <div class="mb-4">
                <h3 class="mb-3">Descrição</h3>

                <h5>Conteúdo:</h5>
                <p>
                    O vídeo apresenta a primeira aula de um curso gratuito de Língua Brasileira de Sinais (Libras) disponível no YouTube.
                </p>

                <h5>Tópicos Abordados:</h5>
                <ul class="list-unstyled">
                    <li><strong>1. Importância da Libras</strong><br> A Língua de Sinais é essencial para a comunicação das pessoas surdas, sendo a sua primeira língua e fundamental para o acesso à informação e inclusão social.</li>

                    <li><strong>2. Alfabeto Manual</strong><br> A aula começa com a introdução ao alfabeto manual, explicando o uso das letras em Libras para nomear pessoas, lugares e objetos. Cada letra é demonstrada detalhadamente com a mão, com exemplos práticos de como realizar os sinais.</li>

                    <li><strong>3. Cultura e Comunicação Surda</strong><br> A Língua de Sinais é parte da cultura da comunidade surda, e cada pessoa surda costuma ter um sinal que a identifica dentro da comunidade, um processo conhecido como "batismo", que não tem conotação religiosa, mas é uma forma de atribuição de um nome sinalizado.</li>

                    <li><strong>4. Prática e Exercícios</strong><br> Os alunos são incentivados a praticar o alfabeto em casa e a participar de atividades para descobrir palavras e criar suas próprias apresentações em Libras. A próxima aula será focada em sinais relacionados à família.</li>

                    <li><strong>5. Acessibilidade e Inclusão</strong><br> O curso visa tornar a comunicação mais acessível e inclusiva, ensinando os alunos a se comunicarem com pessoas surdas de maneira mais eficaz.</li>

                </ul>
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
                    <iframe
                        src="https://www.youtube.com/embed/4F5QfBq2vX0"
                        title="CURSO DE LIBRAS aula #01 Com apostila e Certificado!" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </main>

    <!-- Rodapé da página -->
    <?php require_once('../utils/footer.php') ?>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

</body>

</html>