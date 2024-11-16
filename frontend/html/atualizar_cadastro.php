<?php require_once('utils/security/redirecionar_index_no_session.php');
$userData = $_SESSION['logged_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atualizar Cadastro</title>
    <?php include_once('utils/head.php'); ?>

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
            padding: 20px;
            min-height: 500px;
        }

        .form-row {
            margin-bottom: 15px;
        }

        .input-group-text {
            cursor: pointer;
        }

        .registerImage {
            max-width: 100%;
            height: auto;
            margin-left: 20px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php require_once('utils/navbar.php') ?>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-between">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="card-title">Atualizar Cadastro</h4>
                        </div>

                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col">
                                    <div class="card card-button" id="btnAtualizarDados">
                                        <div class="card-body d-flex justify-content-center align-items-center p-3">
                                            <h5 class="card-title m-0">Atualizar Dados</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card card-button" id="btnAtualizarSenha">
                                        <div class="card-body d-flex justify-content-center align-items-center p-3">
                                            <h5 class="card-title m-0">Alterar Senha</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Formulário de Dados Pessoais -->
                        <div id="atualizar-dados" class="form-section">
                            <form id="atualizar-dados-form">
                                <h5 class="mb-4">Dados Pessoais</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputName">Nome</label>
                                        <input type="text" class="form-control" name="inputName" id="inputName"
                                            placeholder="Digite seu nome" value="<?php echo htmlspecialchars($userData['nome']); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputSurname">Sobrenome</label>
                                        <input type="text" class="form-control" name="inputSurname" id="inputSurname"
                                            placeholder="Digite seu sobrenome" value="<?php echo htmlspecialchars($userData['sobrenome']); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputBornDate">Data de Nascimento</label>
                                        <input type="date" class="form-control" name="inputBornDate" id="inputBornDate"
                                            value="<?php echo htmlspecialchars($userData['data_nascimento']); ?>" required>
                                        <div class="invalid-feedback">Data de Nascimento deve ser anterior à data atual.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail">E-mail</label>
                                        <input type="email" class="form-control" name="inputEmail" id="inputEmail"
                                            placeholder="Digite seu e-mail" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword" class="form-label">Senha atual</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Digite sua senha para confirmar" required>
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword" required>
                                                <i class="fa fa-fw fa-eye field_icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button id="btAtualizarDados" type="submit" class="btn btn-primary col-md-12 mt-3">Atualizar Dados</button>
                            </form>
                            <div class="text-center mt-4" id="validationMessageData">
                                <div class="alert alert-dismissible fade show" style="display: none;" role="alert">
                                    <span id="alertText"></span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <!-- Formulário de Alteração de Senha -->
                        <div id="atualizar-senha" class="form-section">
                            <form id="atualizar-senha-form">
                                <h5 class="mb-4">Alterar Senha</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputOldPassword">Senha Antiga</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="inputOldPassword"
                                                id="inputOldPassword" placeholder="Digite sua senha antiga" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa-eye field_icon toggle-password" toggle="#inputOldPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputNewPassword">Nova Senha</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="inputNewPassword"
                                                id="inputNewPassword" placeholder="Digite sua nova senha" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa-eye field_icon toggle-password" toggle="#inputNewPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputConfirmNewPassword">Confirme a Nova Senha</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="inputConfirmNewPassword"
                                                id="inputConfirmNewPassword" placeholder="Confirme sua nova senha" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa-eye field_icon toggle-password" toggle="#inputConfirmNewPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="btAtualizarSenha" type="submit" class="btn btn-primary col-md-12 mt-3">Alterar Senha</button>
                            </form>
                            <div class="mt-2 text-danger" id="passwordMatchMessage"></div>
                            <div class="text-center mt-2" id="validationMessagePswd">
                                <div class="alert alert-dismissible fade show" style="display: none;" role="alert">
                                    <span id="alertText"></span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <img src="../img/registerImage.png" class="registerImage" alt="Imagem de atualização de cadastro">
                </div>
            </div>
        </div>
    </main>

    <?php require_once('utils/footer.php') ?>

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