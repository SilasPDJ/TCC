<!DOCTYPE html>
<html>

<head>
    <?php include_once('utils/head.php') ?>
    <title>ASL - Tradução de Libras</title>
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
    <script>
        document.getElementById('reloadPageLink').addEventListener('click', function(event) {
            event.preventDefault(); // Impede o comportamento padrão de recarregar a página ao clicar no link
            location.reload(); // Recarrega a página
        });
        document.getElementById('sendDataBtn').addEventListener('click', function() {
            const button = this;
            const loadingSpinner = document.getElementById('loadingSpinner');
            const disclaimerRefresh = document.getElementById('disclaimerRefresh')
            const disclaimerSuccess = document.getElementById('disclaimerSuccess')
            const disclaimerError = document.getElementById('disclaimerError')

            // Desativa o botão e mostra o spinner
            button.disabled = true;
            loadingSpinner.classList.remove('d-none');

            const language = "Portuguese";
            const data = {
                selectedLanguage: language,
                message: "Iniciando captura de gestos."
            };

            fetch('http://127.0.0.1:5000/send-data', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                    disclaimerSuccess.classList.remove('d-none')
                    disclaimerSuccess.classList.remove('d-none')
                })
                .catch((error) => {
                    alert(error)
                    errorDisclaimer.classList.remove('d-none')
                })
                .finally(() => {
                    // Habilita o botão e esconde o spinner após o carregamento
                    // button.disabled = false;
                    loadingSpinner.classList.add('d-none');
                    disclaimerRefresh.classList.remove('d-none')
                });
        });
    </script>
</body>

</html>