<!DOCTYPE html>
<html>

<head>
    <?php include_once('utils/head.php') ?>

    <title>ASL</title>

</head>


<body>
    <!-- TOPO -->
    <?php include 'utils/navbar.php'; ?>

    <!-- CONTEÚDO -->
    <main class="traducao-Conteudo">
        <div class="titleTraduza">
            <div class="traduza">
                <h2 class="h2traduza"> <i class="fa-solid fa-language"></i> &nbsp Tradução de Libras e ASL</h2>
            </div>
        </div>

        <div class=" translation-dica">
            <a href="#textTranslated-portuguese" class="link-secondary">
                Selecione uma frase em português (↑↓)
            </a>
            <a href="#textTranslated-english" class="link-secondary">
                Select an english phrase option below (↑↓)
            </a>
        </div>
        <div class=" row">
        </div>
        <div class="textInsert">
            <select name="" id="textTranslated-portuguese" class="translatedText topo option-grid" size="5">

                <!-- Criadas dinamicamente -->
            </select>
            <select name="" id="textTranslated-english" class="translatedText" size="5">
                <!-- Criadas dinamicamente -->
            </select>
        </div>

        <div class="textInsert translation-special-options">
            <h3>LIBRAS</h3>
            <h3>ASL</h3>
        </div>


        <div class="videos">
        </div>

        <div class="container information">
            <div class="Conteudos row mb-4 pb-4">
                <div class="primeiroConteudo col-md-6">
                    <h2>Por que aprender a traduzir de Libras para ASL?</h2>
                    <p class="resposta">A Língua Brasileira de Sinais (Libras) é uma língua de sinais utilizada
                        no Brasil. A Língua Americana de Sinais (ASL) é uma língua de sinais utilizada nos
                        Estados Unidos. Aprender a traduzir de Libras para ASL pode ser útil para pessoas que
                        se comunicam em Libras e querem se comunicar com pessoas que utilizam a ASL.</p>
                </div>
                <div class="segundoConteudo col-md-6">
                    <h2>Como funciona a tradução de Libras para ASL?</h2>
                    <p class="resposta">A tradução de Libras para ASL envolve a interpretação dos gestos e expressões
                        faciais da pessoa
                        que está utilizando a Libras e a tradução desses gestos para a língua de sinais americana (ASL).
                        É importante notar que essas duas línguas de sinais são distintas e possuem diferenças em termos
                        de vocabulário, gramática e estrutura.
                </div>
            </div>
        </div>
    </main>

    <!-- Rodapé da página -->
    <?php require_once('utils/footer.php') ?>

    <script src="../Js/traducao.js"></script>
    <script src="../Js/libra.js"></script>

</body>

</html>