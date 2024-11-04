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

                <h5>Conteúdo do curso:</h5>
                <p>
                    O curso de intérprete de Libras oferece uma abordagem abrangente para o aprendizado da língua e práticas interpretativas.
                </p>

                <h5>Alguns dos tópicos abordados incluem:</h5>
                <ul class="list-unstyled">
                    <li>
                        <strong>1. Introdução à Libras</strong><br> História, estrutura gramatical, vocabulário básico e expressões faciais e corporais.
                    </li>
                    <li>
                        <strong>2. Cultura surda</strong><br> Conhecendo a comunidade surda, suas conquistas, desafios e a importância da inclusão.
                    </li>
                    <li>
                        <strong>3. Técnicas de interpretação</strong><br> Interpretação consecutiva e simultânea, estratégias de tradução, práticas de acompanhamento e gerenciamento de estresse.
                    </li>
                    <li>
                        <strong>4. Terminologia especializada</strong><br> Vocabulário específico em áreas como educação, saúde, jurídica, entre outras.
                    </li>
                    <li>
                        <strong>5. Ética e profissionalismo</strong><br> Diretrizes éticas para a atuação como intérprete de Libras, confidencialidade, postura profissional e desenvolvimento contínuo.
                    </li>
                    <li>
                        <strong>6. Práticas supervisionadas</strong><br> Oportunidades para praticar as habilidades interpretativas em situações reais, sob a supervisão de instrutores experientes.
                    </li>
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