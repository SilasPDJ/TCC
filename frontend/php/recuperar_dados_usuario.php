<?php
// Inicia a sessão
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('conexao.php');

function recuperaDadosUsuario($conexao, $id)
{
    // Usando prepared statements para evitar SQL injection
    $sql = "SELECT id, nome, sobrenome, email, data_nascimento, termos_aceitos FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id); // "i" indica que o parâmetro é um inteiro
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        return $row; // Retorna todos os dados do usuário como um array associativo
    }

    return null; // Retorna null se o usuário não for encontrado
}
