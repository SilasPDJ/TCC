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
                <h5>Conteúdo:</h5>
                <p>
                    O vídeo tem como objetivo explicar a relação entre a leitura labial e a Língua Brasileira de Sinais (Libras).
                </p>


                <h5>Tópicos Abordados:</h5>
                <ul class="list-unstyled">
                    <li><strong>1. Introdução ao tema da leitura labial</strong><br> A apresentadora introduz o tema da leitura labial e sua relação com a Língua Brasileira de Sinais (Libras), convidando os espectadores a seguir a página no YouTube e curtir o vídeo.</li>

                    <li><strong>2. Explicação sobre leitura labial</strong><br> A leitura labial é explicada como uma forma de entender a articulação das palavras observando os lábios do falante. A apresentadora menciona que sua importância depende da preferência individual da pessoa surda ou com deficiência auditiva.</li>

                    <li><strong>3. Relação entre leitura labial e Libras</strong><br> A apresentadora esclarece que a leitura labial não faz parte da estrutura da Libras. Algumas pessoas surdas preferem oralizar e usar leitura labial, enquanto outras optam por usar Libras como sua língua principal.</li>

                    <li><strong>4. Experiência pessoal com leitura labial</strong><br> Kelly, a apresentadora, compartilha sua experiência pessoal com leitura labial. Ela menciona que consegue entender cerca de 80% através da leitura labial, mas às vezes precisa pedir às pessoas para falarem mais devagar para melhor compreensão.</li>

                    <li><strong>5. Variação na eficácia da leitura labial</strong><br> O vídeo enfatiza que a eficácia da leitura labial varia de pessoa para pessoa. Algumas pessoas surdas podem entender melhor que outras, e a compreensão pode depender da velocidade da fala e da clareza da articulação.</li>

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