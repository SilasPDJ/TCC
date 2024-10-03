<?php require_once('utils/security/redirecionar_index_no_session.php');
$userData = $_SESSION['logged_user'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Atualizar Cadastro</title>
    <!-- Links to Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .card-button {
            cursor: pointer;
            border: none;
            outline: none;
            height: 100%;
            width: 100%;
            text-align: center;
        }

        .card-button.active {
            background-color: #007bff;
            color: white;
        }

        .form-section {
            display: none;
            min-height: 500px;
            /* Defina a altura mínima desejada */
        }
    </style>
</head>

<body>
    <?php require_once('utils/navbar.php') ?>
    <div class="container mt-5">
        <div class="row justify-content-center pagina">
            <img src="../img/registerImage.png" class="rounded float-end registerImage" alt="...">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title">Atualizar Cadastro</h4>

                    </div>

                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col">
                                <div class="card card-button" id="btnAtualizarDados">
                                    <div class="card-body">
                                        <h5 class="card-title">Atualizar Dados</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-button" id="btnAtualizarSenha">
                                    <div class="card-body">
                                        <h5 class="card-title">Alterar Senha</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Formulário de Dados Pessoais -->
                    <div id="atualizar-dados" class="form-section">
                        <div class="card-body">
                            <form id="atualizar-dados-form">
                                <h5 class="mt-3">Dados Pessoais</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-6" id="name-group">
                                        <label for="inputName">Nome</label>
                                        <input type="text" class="form-control" name="inputName" id="inputName"
                                            placeholder="Digite seu nome" value="<?php echo htmlspecialchars($userData['nome']); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6" id="surname-group">
                                        <label for="inputSurname">Sobrenome</label>
                                        <input type="text" class="form-control" name="inputSurname" id="inputSurname"
                                            placeholder="Digite seu sobrenome" value="<?php echo htmlspecialchars($userData['sobrenome']); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12" id="email-group">
                                        <label for="inputEmail">E-mail</label>
                                        <input type="email" class="form-control" name="inputEmail" id="inputEmail"
                                            placeholder="Digite seu e-mail" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12" id="user-group">
                                        <label for="inputUser">Nome de Usuário</label>
                                        <input type="text" class="form-control" name="inputUser" id="inputUser"
                                            placeholder="Digite seu Usuário" value="<?php echo htmlspecialchars($userData['nome_de_usuario']); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row" id="password-group">
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword">Senha atual</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="inputPassword"
                                                id="inputPassword" placeholder="Digite sua senha para confirmar" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa-eye field_icon toggle-password"
                                                        toggle="#inputPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="btAtualizarDados" type="submit" class="btn btn-primary col-md-12">Atualizar Dados</button>
                            </form>
                            <div class="text-center mt-4" id="validationMessageData">
                                <!-- Alerta Bootstrap -->
                                <div class="alert alert-dismissible fade show" style="display: none;" role="alert">
                                    <span id="alertText"></span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Formulário de Alteração de Senha -->
                    <div id="atualizar-senha" class="form-section">
                        <div class="card-body">
                            <form id="atualizar-senha-form">
                                <h5 class="mt-4">Alterar Senha</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-12" id="password-group">
                                        <label for="inputOldPassword">Senha Antiga</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="inputOldPassword"
                                                id="inputOldPassword" placeholder="Digite sua senha antiga" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa-eye field_icon toggle-password"
                                                        toggle="#inputOldPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12" id="new-password-group">
                                        <label for="inputNewPassword">Nova Senha</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="inputNewPassword"
                                                id="inputNewPassword" placeholder="Digite sua nova senha" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa-eye field_icon toggle-password"
                                                        toggle="#inputNewPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12" id="confirmNewPassword-group">
                                        <label for="inputConfirmNewPassword">Confirme a Nova Senha</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="inputConfirmNewPassword"
                                                id="inputConfirmNewPassword" placeholder="Confirme sua nova senha" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa-eye field_icon toggle-password"
                                                        toggle="#inputConfirmNewPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button id="btAtualizarSenha" type="submit" class="btn btn-primary col-md-12">Alterar Senha</button>
                            </form>
                            <div class="mt-2 text-danger" id="passwordMatchMessage"></div>
                            <div class="text-center mt-2" id="validationMessagePswd">
                                <!-- Alerta Bootstrap -->
                                <div class="alert alert-dismissible fade show" style="display: none;" role="alert">
                                    <span id="alertText"></span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                            </div>
                        </div>
                        <!-- <div class="text-center">
                            Deseja cancelar? <a href="/">Clique aqui para voltar</a>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
    <script src="../Js/validators/atualizar_cadastro.js" type=""></script>
    <script src="../Js/common/events.js"></script>

    <script>
        $(document).ready(function() {
            $("#btnAtualizarDados").click(function() {
                $(".form-section").hide();
                $("#atualizar-dados").show();
                $(".card-button").removeClass("active");
                $(this).addClass("active");
            });

            $("#btnAtualizarSenha").click(function() {
                $(".form-section").hide();
                $("#atualizar-senha").show();
                $(".card-button").removeClass("active");
                $(this).addClass("active");
            });

            // Definir o botão de dados como ativo por padrão
            $("#btnAtualizarDados").click();
        });
    </script>


</body>

</html>