<?php
require_once('conexao.php');
require_once('recuperar_dados_usuario.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inicialize um array para armazenar a resposta
$response = array();

// Receba os dados do JavaScript
$inputPassword = $_POST['inputPassword'];
$inputConfirmPassword = $_POST['inputConfirmPassword'];

// --- Verifica se as variáveis estão definidas e não vazias
if (!isset($inputPassword) || empty($inputPassword)) {
    $response['inputPassword'] = "Preencha o campo senha.";
}

if (!isset($inputConfirmPassword) || empty($inputConfirmPassword)) {
    $response['inputConfirmPassword'] = "Preencha o campo confirmação de senha.";
}

// --- Validando formulario
if ($inputPassword !== $inputConfirmPassword) {
    $response['inputConfirmPassword'] = "Verifique as informações e tente novamente!";
}

// Atualiza a senha do usuário
if (empty($response)) {
    $userId = $_SESSION['logged_user']['id']; // Obtém o ID do usuário da sessão
    if (atualizarSenhaUsuario($conexao, $userId, $inputPassword)) {
        $response['success'] = true;
        $response['message'] = "Senha atualizada com sucesso.";
    } else {
        $response['inputPassword'] = "Erro ao atualizar a senha.";
    }
} else {
    $response['success'] = false;
}

// Função para atualizar a senha do usuário
function atualizarSenhaUsuario($conexao, $id, $senha)
{
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("si", $senhaHash, $id);

    return $stmt->execute();
}

// Fechar a conexão após o uso
$conexao->close();

header('Content-Type: application/json');
echo json_encode($response);
exit;
