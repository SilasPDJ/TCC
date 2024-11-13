<!DOCTYPE html>
<html>

<head>
    <?php include_once('../utils/head.php') ?>
    <title>Curso</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php include('../utils/navbar.php') ?>
    <!-- CONTEÚDO -->
    <main class="container-fluid">
        <div class="text-center">
            <h3>Introdução à leitura labial</h3>
        </div>
        <div>
            <?php
            ob_start();
            ?>

            <div>
                <h5>Conteúdo do curso:</h5>
                <p>
                    O principal objetivo de um curso de leitura labial para surdos é capacitar os participantes a desenvolverem habilidades eficazes de leitura dos movimentos dos lábios e expressões faciais. Isso permite uma melhor compreensão da fala e fornece uma ferramenta adicional de comunicação, promovendo uma interação mais inclusiva.
                </p>

                <h5>Alguns dos tópicos abordados incluem:</h5>
                <ul class="list-unstyled">
                    <li>
                        <strong>1. Introdução à leitura labial</strong><br> Conceitos básicos, a importância da leitura labial e como ela pode complementar a comunicação oral para pessoas surdas.
                    </li>
                    <li>
                        <strong>2. Movimentos labiais e articulação</strong><br> Reconhecimento e interpretação dos movimentos dos lábios e articulações relacionados à produção dos sons da fala, incluindo formas de abertura dos lábios, posição da língua e movimentos faciais.
                    </li>
                    <li>
                        <strong>3. Expressões faciais e gestos</strong><br> Importância das expressões faciais e gestos junto à leitura labial, com foco na observação e interpretação dessas pistas visuais.
                    </li>
                    <li>
                        <strong>4. Contexto e pistas visuais</strong><br> Utilização do contexto da conversa e de outras pistas visuais, como linguagem corporal e postura, para auxiliar na leitura labial.
                    </li>
                    <li>
                        <strong>5. Treinamento prático</strong><br> Atividades práticas para aprimorar as habilidades de leitura labial, com exercícios em diferentes situações de comunicação, como diálogos, palestras ou vídeos.
                    </li>
                    <li>
                        <strong>6. Estratégias de aprimoramento</strong><br> Técnicas para melhorar a leitura labial, como o uso da memória visual, a concentração visual, e formas de lidar com desafios específicos, como sotaques ou iluminação desfavorável.
                    </li>
                </ul>

                <h5>Benefícios do curso:</h5>
                <p>
                    A leitura labial pode promover uma inclusão social mais ampla, facilitando a participação dos surdos em conversas e interações com pessoas ouvintes. Isso ajuda a reduzir as barreiras de comunicação e fortalece os laços entre surdos e ouvintes.
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
                    <iframe src="https://www.youtube.com/embed/PDrMpCQYdy4"
                        title="Leitura Labial faz parte da Língua Brasileira de Sinais | Conhecendo Libras"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen class="embed-responsive-item"></iframe>
                </div>
            </div>
        </div>
    </main>
    <!-- Rodapé da página -->
    <?php require_once('../utils/footer.php') ?>

</body>

</html>