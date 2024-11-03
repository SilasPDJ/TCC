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
    <main>

        <div class="container">
            <div class="text-center">
                <h2 class="h2traduza"> <i class="fa-solid fa-language"></i> &nbsp Tradução de Libras e ASL</h2>
            </div>

            <div class=" row">
            </div>
            <div class="row mb-4">
                <div class="col-md-6 text-center">
                    <h3>LIBRAS</h3>

                    <div class="mb-4">
                        <a href="#textTranslated-portuguese" class="link-secondary">
                            Selecione uma frase em português (↑↓)
                        </a>
                    </div>
                    <select name="" id="textTranslated-portuguese" class="form-select form-select">
                        <!-- Criadas dinamicamente -->
                    </select>
                </div>
                </select>
                <div class="col-md-6 text-center">
                    <h3>ASL</h3>

                    <div class="mb-4">
                        <a href="#textTranslated-english" class="link-secondary">
                            Select an english phrase option below (↑↓)
                        </a>
                    </div>
                    <select name="" id="textTranslated-english" class="form-select">
                        <!-- Criadas dinamicamente -->
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="videos-libras"></div>
                </div>
                <div class="col-md-6">
                    <div class="videos-asl"></div>
                </div>
            </div>


        </div>

    </main>

    <!-- Rodapé da página -->
    <?php require_once('utils/footer.php') ?>

    <script src="../Js/traducao.js"></script>
</body>

</html>