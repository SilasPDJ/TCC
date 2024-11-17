<?php require_once('utils/security/redirecionar_index.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Acesso ao Sistema de Reconhecimento</title>
    <!-- Links to Bootstrap CSS -->
    <?php require_once('utils/head.php') ?>

</head>

<body>
    <?php include 'utils/navbar.php'; ?>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card border-light">
                        <img class="card-img-top" src="\img\libras.jpg" alt="Card image cap">

                        <div class="card-body">

                            <h4 class="card-title text-center">Login</h4>
                            <form id="login-form">
                                <div class="form-group mb-3">
                                    <label for="username">E-mail:</label>
                                    <input type="email" class="form-control" id="username" name="username"
                                        placeholder="Digite o E-mail" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Senha:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fa fa-fw fa-eye field_icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Lembrar-me</label>
                                </div>
                                <div id="validationMessage"></div>

                                <div class="d-grid gap-2">

                                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                                    <button type="button" class="btn btn-outline-secondary btn-block"
                                        onclick="window.location.href='/html/cadastro'">Não possui cadastro?</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'utils/footer.php'; ?>


    <!-- Links to Bootstrap JavaScript -->

    <script src="../Js/validators/login.js"></script>
    <script src="../Js/common/events.js"></script>

</body>

</html>