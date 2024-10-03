<?php
require_once('../conexao.php');
require_once('../recuperar_dados_usuario.php');


if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
