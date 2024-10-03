<?php
require_once('utils.php');

// Inicialize um array para armazenar a resposta
$response = array();

// Receba os dados do JavaScript
$inputName = $_POST['inputName'];
$inputSurname = $_POST['inputSurname'];
$inputEmail = $_POST['inputEmail'];
$inputUser = $_POST['inputUser'];
$inputPassword = $_POST['inputPassword'];
$termosUso = $_POST['termosUso'] === 'true' ? 1 : 0;

// --- Verifica se as variáveis estão definidas e não vazias
if (!isset($inputName) || empty($inputName)) {
    $response['inputName'] = "Preencha o campo nome.";
}

if (!isset($inputSurname) || empty($inputSurname)) {
    $response['inputSurname'] = "Preencha o campo sobrenome.";
}

if (!isset($inputEmail) || empty($inputEmail)) {
    $response['inputEmail'] = "Preencha o campo email.";
}

if (!isset($inputUser) || empty($inputUser)) {
    $response['inputUser'] = "Preencha o campo nome de usuário.";
}


// Atualiza os dados do usuário
if (empty($response)) {
    $userId = $_SESSION['logged_user']['id'];
    $senhaBuscada = buscarSenhaAtual($conexao, $userId) ?? '';

    if (!$senhaBuscada || !password_verify($inputPassword, $senhaBuscada)) {
        $response['success'] = false;
        $response['message'] = "Erro ao confirmar a atualização de dados";
    } else if (atualizarDadosUsuario($conexao, $userId, $inputName, $inputSurname, $inputEmail, $inputUser, $termosUso)) {
        $response['success'] = true;
        $response['message'] = "Dados atualizados com sucesso.";

        $_SESSION['logged_user'] = recuperaDadosUsuario($conexao, $userId);
    } else {
        $response['inputUser'] = "Erro ao atualizar usuário.";
    }
} else {
    $response['success'] = false;
}

// Função para atualizar os dados do usuário
function atualizarDadosUsuario($conexao, $id, $nome, $sobrenome, $email, $nomeDeUsuario, $termosAceitos)
{
    $sql = "UPDATE usuarios SET nome = ?, sobrenome = ?, email = ?, nome_de_usuario = ?, termos_aceitos = ?
            WHERE id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssssi", $nome, $sobrenome, $email, $nomeDeUsuario, $termosAceitos, $id);

    return $stmt->execute();
}

// Fechar a conexão após o uso
$conexao->close();

header('Content-Type: application/json');
echo json_encode($response);
exit;
