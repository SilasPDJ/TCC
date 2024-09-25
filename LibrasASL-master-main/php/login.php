<?php
require_once('conexao.php');

// Inicia a sessão
session_start();

$response = array();

$inputEmail = $_POST['inputEmail'];
$inputPassword = $_POST['inputPassword'];

$response['success'] = false;
$response['message'] = "Fazendo login";

$emailId = buscaEmailUnico($conexao, $inputEmail);

if ($emailId !== -1) {
    $response['message'] = "Email existe";

    // Agora, verifique a senha com base no ID do email
    if (senhaEstaValida($conexao, $emailId, $inputPassword)) {
        // Login bem-sucedido, armazenar informações na sessão
        $_SESSION['logged_user'] = buscaNomeDoUsuario($conexao, $emailId);

        $response['success'] = true;
        $response['message'] = "Login bem-sucedido";
    } else {
        $response['message'] = "E-mail ou Senha incorretos.";
    }
} else {
    $response['message'] = "E-mail ou Senha incorretos.";
}

function buscaEmailUnico($conexao, $email)
{
    $sql = "SELECT id FROM usuarios WHERE email = '$email'";
    $result = $conexao->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        return $row['id'];
    }
    return -1; // false
}

function buscaNomeDoUsuario($conexao, $id)
{
    $sql = "SELECT nome, sobrenome FROM usuarios WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['nome'] + ' ' + $row['sobrenome']; // Retorna o nome do usuário
    }

    return null; // Retorna null se o usuário não for encontrado
}


function senhaEstaValida($conexao, $id, $senha)
{
    $sql = "SELECT senha FROM usuarios WHERE id = $id";
    $result = $conexao->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        $hash = $row['senha'];
        return password_verify($senha, $hash);
    }
    return false;
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
