<?php
require_once('conexao.php');
require_once('recuperar_dados_usuario.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inicialize um array para armazenar a resposta
$response = array();

// Receba os dados do JavaScript
$inputName = $_POST['inputName'];
$inputSurname = $_POST['inputSurname'];
$inputEmail = $_POST['inputEmail'];
$inputUser = $_POST['inputUser'];
$inputPassword = $_POST['inputPassword'];
$inputConfirmPassword = $_POST['inputConfirmPassword'];
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

// Validação para verificar se o e-mail já está em uso
if (emailJaCadastrado($conexao, $inputEmail)) {
    $response['inputEmail'] = "Verifique as informações e tente novamente!";
}

if ($termosUso !== 1) {
    $response['termosUso'] = "Você deve aceitar os termos de uso.";
}

// Insira o novo usuário
if (empty($response)) {
    if (inserirNovoUsuario($conexao, $inputName, $inputSurname, $inputEmail, $inputUser, $inputPassword, $termosUso)) {
        // Recuperar o ID do novo usuário inserido
        $emailId = buscaEmailUnico($conexao, $inputEmail);

        // Armazena informações do usuário na sessão
        $_SESSION['logged_user'] = recuperaDadosUsuario($conexao, $emailId);

        $response['success'] = true;
        $response['message'] = "Usuário criado com sucesso.";
    } else {
        $response['inputUser'] = "Erro ao inserir usuário.";
    }
} else {
    $response['success'] = false;
}

// Verificar se o email já foi cadastrado
function emailJaCadastrado($conexao, $email)
{
    $sql = "SELECT COUNT(*) AS count FROM usuarios WHERE email = '$email'";
    $result = $conexao->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        return $row['count'] > 0;
    }
    return false;
}

// Função para inserir o novo usuário
function inserirNovoUsuario($conexao, $nome, $sobrenome, $email, $nomeDeUsuario, $senha, $termosAceitos)
{
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, sobrenome, email, nome_de_usuario, senha, termos_aceitos)
            VALUES ('$nome', '$sobrenome', '$email', '$nomeDeUsuario', '$senhaHash', '$termosAceitos')";
    return $conexao->query($sql);
}

// Função para buscar o ID do usuário pelo email
function buscaEmailUnico($conexao, $email)
{
    $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        return $row['id'];
    }
    return -1; // false
}

// Fechar a conexão após o uso
$conexao->close();

header('Content-Type: application/json');
echo json_encode($response);
exit;
