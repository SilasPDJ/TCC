<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASL - Tradução de Libras</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../../Js/videos.js"></script>

    <link rel="stylesheet" type="text/css" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body>
    <?php include('utils/navbar.php') ?>

    <main>

        <!-- Botão futurístico -->
        <div class="text-center mt-4">
            <button id="sendDataBtn" class="btn btn-dark btn-lg rounded-pill shadow-lg">
                Começar Treinamento de Gestos
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

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