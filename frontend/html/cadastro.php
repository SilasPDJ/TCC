<?php require_once('utils/security/redirecionar_index.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <!-- Links to Bootstrap CSS -->
    <?php include_once('utils/head.php') ?>

</head>

<body>
    <?php include 'utils/navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center pagina">
            <img src="../img/registerImage.png" class="rounded float-end registerImage" alt="...">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="icon-users">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <h4 class="card-title text-center">Cadastro</h4>
                    </div>
                    <div class="card-body">
                        <form id="cadastro-form">
                            <div class="form-row">
                                <div class="form-group col-md-6" id="name-group">
                                    <label for="inputName">Nome</label>
                                    <input type="text" class="form-control" name="inputName" id="inputName"
                                        placeholder="Digite seu nome" required>

                                </div>
                                <div class="form-group col-md-6" id="surname-group">
                                    <label for="inputSurname">Sobrenome</label>
                                    <input type="text" class="form-control" name="inputSurname" id="inputSurname"
                                        placeholder="Digite seu sobrenome" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" id="birthdate-group">
                                    <label for="inputBornDate">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="inputBornDate" id="inputBornDate"
                                        placeholder="Digite sua data de nascimento" required>
                                    <div class="invalid-feedback">
                                        Data de Nascimento deve ser anterior à data atual. </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12" id="email-group">
                                    <label for="inputEmail">E-mail</label>
                                    <input type="email" class="form-control" name="inputEmail" id="inputEmail"
                                        placeholder="Digite seu e-mail" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" id="password-group">
                                    <label for="inputPassword">Senha</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="inputPassword"
                                            id="inputPassword" placeholder="Digite sua senha" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-fw fa-eye field_icon toggle-password"
                                                    toggle="#inputPassword"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12" id="confirmPassword-group">
                                    <label for="inputConfirmPassword">Confirme a Senha</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="inputConfirmPassword"
                                            id="inputConfirmPassword" placeholder="Confirme sua senha" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-fw fa-eye field_icon toggle-password"
                                                    toggle="#inputConfirmPassword"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button id="btCadastrar" type="submit" class="btn btn-primary col-md-12">Cadastrar</button>
                            <div class="form-check mt-1">
                                <div id="passwordMatchMessage" class="mt-1"></div>
                                <div id="validationMessage"></div>
                            </div>
                        </form>

                        <div class="text-center mt-1">
                            Já possui cadastro? <a href="login">Faça login aqui</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('utils/footer.php') ?>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
    <script src="../Js/validators/cadastro.js"></script>
    <script src="../Js/common/events.js"></script>

</body>

</html>