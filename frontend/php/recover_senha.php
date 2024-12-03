<?php
require_once('conexao.php');
header('Content-Type: application/json; charset=UTF-8');

$response = array('success' => false, 'message' => 'Erro desconhecido');
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Validação do e-mail
if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['message'] = 'E-mail não fornecido ou inválido.';
    echo json_encode($response);
    exit;
}

// Verificar se o e-mail está cadastrado na tabela usuarios
$emailId = buscaEmailUnico($conexao, $email);

if ($emailId === -1) {
    $response['message'] = 'E-mail não encontrado.';
    echo json_encode($response);
    exit;
}

// Gerar token único e data de expiração
$token = bin2hex(random_bytes(32));
$expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

// // Atualizar o token e a expiração diretamente na tabela usuarios
// $stmt = $conexao->prepare("UPDATE usuarios SET reset_token = ?, reset_token_expires = ? WHERE id = ?");
// $stmt->bind_param("ssi", $token, $expiry, $emailId);

// if ($stmt->execute()) {
// Dados do e-mail e token
$data = [
    'email' => $email,
    'token' => $token
];

// // Simulação de envio de e-mail
$emailSent = simulateEmailSending();
if ($emailSent) {
    $response['success'] = true;
    $response['message'] = 'E-mail de recuperação enviado.';
} else {
    $response['message'] = 'Erro ao enviar o e-mail.';
}

// } else {
// $response['message'] = 'Erro ao gerar o token.';
// }

// Função para buscar o ID do usuário pelo e-mail
function buscaEmailUnico($conexao, $email)
{
    $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        return $row['id'];
    }
    return -1; // Não encontrado
}

// Função para simular o envio de e-mail
function simulateEmailSending()
{
    // Simulação de envio de e-mail com resultado aleatório
    return rand(0, 1) === 1; // Retorna true ou false aleatoriamente
}

// Fechar a conexão
$conexao->close();

echo json_encode($response);
exit;
