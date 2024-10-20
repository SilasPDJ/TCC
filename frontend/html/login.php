<?php require_once('utils/security/redirecionar_index.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Entrar</title>
    <!-- Links to Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">

</head>

<body>
    <?php include 'utils/navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-users">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <h4 class="card-title text-center">Entrar</h4>
                        <form id="login-form">
                            <div id="validationMessage" class="alert"></div>
                            <div class="form-group">
                                <label for="username">E-mail:</label>
                                <input type="email" class="form-control" id="username" name="username"
                                    placeholder="Digite o E-mail" required>
                            </div>
                            <div class="form-group" id="password-group">
                                <label for="password">Senha:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Digite a senha" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-fw fa-eye field_icon toggle-password"
                                                toggle="#password"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Lembrar-me</label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            <button type="button" class="btn btn-outline-secondary um btn-block"
                                onclick="window.location.href='/html/cadastro'">Cadastrar</button>
                            <!-- btn btn-outline-secondary um ml-4 mr-2 -->
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Links to Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>

    <script src="../Js/validators/login.js"></script>
    <script src="../Js/common/events.js"></script>

</body>

</html>