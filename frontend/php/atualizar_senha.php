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
$inputOldPassword = $_POST['inputOldPassword'];

// Verifica se as variáveis estão definidas e não vazias
if (!isset($inputPassword) || empty($inputPassword)) {
    $response['message'] = "Preencha o campo senha.";
}

if (!isset($inputConfirmPassword) || empty($inputConfirmPassword)) {
    $response['message'] = "Preencha o campo confirmação de senha.";
}

if (!isset($inputOldPassword) || empty($inputOldPassword)) {
    $response['message'] = "Preencha o campo senha atual.";
}

// Validando formulário
if ($inputPassword !== $inputConfirmPassword) {
    $response['message'] = "Verifique as informações e tente novamente!";
}

// Verifique se a senha antiga está correta antes de atualizar
if (empty($response)) {
    $userId = $_SESSION['logged_user']['id']; // Obtém o ID do usuário da sessão

    // Busque a senha atual do usuário no banco de dados
    $senhaAtual = buscarSenhaAtual($conexao, $userId);

    if ($senhaAtual && password_verify($inputOldPassword, $senhaAtual)) {
        // Se a senha antiga estiver correta, atualize a senha
        if (atualizarSenhaUsuario($conexao, $userId, $inputPassword)) {
            $response['success'] = true;
            $response['message'] = "Senha atualizada com sucesso.";
        } else {
            $response['message'] = "Erro ao atualizar a senha.";
            $response['success'] = false;
        }
    } else {
        $response['message'] = "Senha atual incorreta.";
        $response['success'] = false;
    }
} else {
    $response['success'] = false;
}

function buscarSenhaAtual($conexao, $id)
{
    $sql = "SELECT senha FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $senhaAtual = '';
        $stmt->bind_param("i", $id);

        // Executa a consulta
        $stmt->execute();

        $stmt->bind_result($senhaAtual);

        if ($stmt->fetch()) {
            $stmt->close();
            return $senhaAtual;
        } else {
            $stmt->close();
            return null;
        }
    } else {
        return null;
    }
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
