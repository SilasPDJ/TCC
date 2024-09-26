<?php
require_once('conexao.php');
require_once('recuperar_dados_usuario.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Inicia a sessão se não estiver ativa
}

$response = array();

$inputEmail = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : '';
$inputPassword = isset($_POST['inputPassword']) ? $_POST['inputPassword'] : '';


$response['success'] = false;
$response['message'] = "Fazendo login";

$emailId = buscaEmailUnico($conexao, $inputEmail);

if ($emailId !== -1) {
    $response['message'] = "Email existe";

    // Agora, verifique a senha com base no ID
    if (senhaEstaValida($conexao, $emailId, $inputPassword)) {
        // Login bem-sucedido, armazenar informações na sessão
        $_SESSION['logged_user'] = recuperaDadosUsuario($conexao, $emailId);

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
    $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email); // "s" significa que é uma string
    $stmt->execute();
    $result = $stmt->get_result();

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
        return $row['nome'] . ' ' . $row['sobrenome'];
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
