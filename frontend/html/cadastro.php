<?php require_once('utils/security/redirecionar_index.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Meta tag para responsividade -->
    <title>Cadastro</title>
    <!-- Links to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous">
    <?php include_once('utils/head.php') ?>
</head>

<body>
    <?php include 'utils/navbar.php'; ?>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card border-light">
                        <img class="card-img-top" src="\img\libras.jpg" alt="Inclusão Linguística" />
                        <div class="card-body">
                            <h4 class="card-title text-center">Cadastre-se</h4>
                            <form id="cadastro-form">
                                <div class="form-group mb-3">
                                    <label for="inputName" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Digite seu nome" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputSurname" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" name="inputSurname" id="inputSurname" placeholder="Digite seu sobrenome" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputBornDate" class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="inputBornDate" id="inputBornDate" required>
                                    <div class="invalid-feedback">
                                        Data de Nascimento deve ser anterior à data atual.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputEmail" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Digite seu e-mail" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputPassword" class="form-label">Senha</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Digite sua senha" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fa fa-fw fa-eye field_icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputConfirmPassword" class="form-label">Confirme a Senha</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="inputConfirmPassword" id="inputConfirmPassword" placeholder="Confirme sua senha" required>
                                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                            <i class="fa fa-fw fa-eye field_icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <button id="btCadastrar" type="submit" class="btn btn-primary col-12">Cadastrar</button>
                                <div class="form-check mt-1">
                                    <div id="passwordMatchMessage" class="mt-1"></div>
                                    <div id="validationMessage"></div>
                                </div>
                            </form>
                            <div class="text-center mt-3">
                                Já possui cadastro? <a href="login">Faça login aqui</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once('utils/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Js/validators/cadastro.js"></script>
    <script src="../Js/common/events.js"></script>
    <script>
        // JavaScript to toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('inputPassword');
            const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', passwordType);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('inputConfirmPassword');
            const confirmPasswordType = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', confirmPasswordType);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>