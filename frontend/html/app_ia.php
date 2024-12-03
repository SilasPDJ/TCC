<?php require_once('utils/security/redirecionar_index_no_session.php') ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once('utils/head.php') ?>
    <title>Reconhecimento de Gestos - LibrasConnect</title>
</head>

<body>
    <?php include('utils/navbar.php') ?>

    <main>

        <!-- Botão futurístico -->
        <!-- Botão futurístico -->
        <div class="text-center mt-4 text-dark">
            <button id="sendDataBtn" class="btn btn-dark btn-lg rounded-pill shadow-lg d-flex align-items-center justify-content-center mx-auto">
                Começar Reconhecimento de Gestos
                <!-- Elemento de carregamento (inicialmente escondido) -->
                <div id="loadingSpinner" class="spinner-border text-light d-none ms-2" role="status">
                    <span class="visually-hidden">Carregando...</span>
                </div>
            </button>
            <div id="disclaimerSuccess" class="d-none">
                <span>Aguarde, em breve o sistema de reconhecimentos aparecerá...</span>
            </div>
            <div id="disclaimerError" class="d-none text-danger">
                <span>Falha ao acessar Reconhecimento de Gestos</span>
            </div>
            <div id="disclaimerRefresh" class="d-none my-2">
                <a href="#" id="reloadPageLink" class="">Clique aqui para recarregar</a>
            </div>
        </div>



        <!-- Informações -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3>Por que aprender a traduzir de Libras para ASL?</h3>
                    <p>A Língua Brasileira de Sinais (Libras) é utilizada no Brasil. Já a Língua Americana de Sinais (ASL)
                        é usada nos EUA. Traduzir entre Libras e ASL é útil para comunicação entre usuários dessas
                        línguas.</p>
                </div>
                <div class="col-md-6 mb-4">
                    <h3>Como funciona a tradução de Libras para ASL?</h3>
                    <p>A tradução envolve a interpretação de gestos e expressões faciais de quem usa Libras e sua
                        conversão para a ASL. Embora sejam línguas de sinais, Libras e ASL têm diferenças
                        significativas de vocabulário e gramática.</p>
                </div>
            </div>
        </div>
    </main>
    <!-- Rodapé da página -->
    <?php require_once('utils/footer.php') ?>

    <!-- JavaScript para enviar dados ao Flask -->
    <script src="../Js/app_ia.js"></script>

</body>

</html>