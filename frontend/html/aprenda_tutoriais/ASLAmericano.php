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
                <h5>Conteúdo:</h5>
                <p>
                    O vídeo tem como objetivo ensinar sinais essenciais da Língua de Sinais Americana (ASL) para conversas cotidianas.
                </p>


                <h5>Tópicos Abordados:</h5>

                <ul class="list-unstyled">
                    <li><strong>1. Importância das palavras de alta frequência</strong><br> Aprender palavras de alta frequência é essencial para adquirir uma língua de forma eficaz. Este método é similar à maneira como as crianças aprendem sua primeira língua e é apoiado por programas educacionais, como o programa Fairview, na Califórnia.</li>

                    <li><strong>2. Sinais para palavras do dia a dia</strong><br> Chris, o apresentador, ensina 10 palavras comuns e seus sinais correspondentes em ASL (Língua de Sinais Americana), destacando que muitas palavras em inglês têm múltiplos significados e, portanto, exigem sinais diferentes em ASL.</li>

                    <li><strong>3. Exemplos de sinais</strong><br> Sinais específicos demonstrados incluem 'away' (longe), 'big' (grande), 'blue' (azul), 'can' (poder), 'come' (vir), 'down' (baixo), 'find' (encontrar), 'for' (para), 'funny' (engraçado), 'go' (ir) e 'help' (ajudar), com explicações sobre os gestos e variações para cada sinal.</li>

                    <li><strong>4. Variações regionais</strong><br> Os espectadores são incentivados a aprender variações regionais dos sinais que podem encontrar em diferentes comunidades, destacando a importância de se adaptar às práticas locais da língua de sinais.</li>

                    <li><strong>5. Encorajamento e apoio</strong><br> Chris convida os espectadores a praticarem esses sinais nas conversas e oferece apoio para aqueles que têm dúvidas ou precisam de ajuda enquanto aprendem ASL.</li>

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