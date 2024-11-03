<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>ASL - Tradução de Libras</title>
    <?php include_once('utils/head.php') ?>

</head>

<body>
    <?php include('utils/navbar.php') ?>

    <main>

        <!-- Botão futurístico -->
        <div class="text-center mt-4">
            <button id="sendDataBtn" class="btn btn-dark btn-lg rounded-pill shadow-lg">
                Começar Reconhecimento de Gestos
            </button>
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
        document.getElementById('sendDataBtn').addEventListener('click', function() {
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
                    alert('Dados enviados com sucesso!');
                })
                .catch((error) => {
                    alert('Erro ao enviar dados.');
                });
        });
    </script>
</body>

</html>