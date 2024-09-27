<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASL</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/traducao.css">
    <link rel="stylesheet" type="text/css" href="../css/carrossel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>