<?php require_once('utils/security/redirecionar_index.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recuperar Senha</title>
    <!-- Links to Bootstrap CSS -->
    <?php require_once('utils/head.php') ?>
    <!-- Adicionando jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include 'utils/navbar.php'; ?>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-light mt-5">
                        <div class="card-body">
                            <h4 class="card-title text-center">Recuperar Senha</h4>
                            <p class="text-center">Digite o e-mail associado à sua conta. Enviaremos instruções para redefinir sua senha.</p>
                            <form id="recover-form" method="POST" action="/php/recover_senha.php">
                                <div class="form-group mb-3">
                                    <label for="email">E-mail:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                                </div>
                                <div id="validationMessage"></div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                    <button type="button" class="btn btn-outline-secondary btn-block"
                                        onclick="window.location.href='/html/login'">Voltar ao Login</button>
                                </div>
                            </form>
                            <!-- Aqui será inserido o alerta Bootstrap -->
                            <div id="alert-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'utils/footer.php'; ?>

    <!-- Scripts adicionais -->
    <script>
        // Aguardar o envio do formulário
        $('#recover-form').submit(function(event) {
            event.preventDefault(); // Impede o envio do formulário

            // Validar o e-mail
            var email = $('#email').val();
            if (!email.includes('@')) {
                // Se o e-mail não for válido, mostrar um alerta
                $('#alert-container').html('<div class="alert alert-danger" role="alert">Por favor, insira um e-mail válido.</div>');
                return false;
            }

            // Simulação de resposta do servidor
            $.ajax({
                type: 'POST',
                url: '/php/recover_senha.php', // URL do seu PHP
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        // Caso o servidor retorne sucesso, mostrar a mensagem de sucesso
                        $('#alert-container').html('<div class="alert alert-success" role="alert">' + response.message + '</div>');
                    } else {
                        // Caso contrário, exibe a mensagem de erro
                        $('#alert-container').html('<div class="alert alert-danger" role="alert">' + response.message + '</div>');
                    }
                },
                error: function() {
                    $('#alert-container').html('<div class="alert alert-danger" role="alert">Erro ao enviar a solicitação. Tente novamente.</div>');
                }
            });
        });
    </script>
</body>

</html>