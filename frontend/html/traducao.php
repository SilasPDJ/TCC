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

    </main>

    <!-- Rodapé da página -->
    <?php require_once('utils/footer.php') ?>

    <script src="../Js/traducao.js"></script>
    <script src="../Js/libra.js"></script>

</body>

</html>