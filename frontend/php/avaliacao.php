<?php
require_once('conexao.php');
require_once('recuperar_dados_usuario.php');

$isUserLogged = isset($_SESSION['logged_user']);
$avaliacoesFile = 'avaliacoes.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isUserLogged) {
    $comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';
    $avaliacao = isset($_POST['avaliacao']) ? intval($_POST['avaliacao']) : 0;

    if (!empty($comentario) && $avaliacao >= 1 && $avaliacao <= 5) {
        $dadosAvaliacao = [
            'nome' => $_SESSION['logged_user']['nome'],
            'id' => $_SESSION['logged_user']['id'],
            'comentario' => htmlspecialchars($comentario, ENT_QUOTES, 'UTF-8'),
            'avaliacao' => $avaliacao,
            'data' => date('Y-m-d H:i:s'),
        ];

        $avaliacoes = [];
        if (file_exists($avaliacoesFile)) {
            $avaliacoes = json_decode(file_get_contents($avaliacoesFile), true);
        }

        $avaliacoes[] = $dadosAvaliacao;
        file_put_contents($avaliacoesFile, json_encode($avaliacoes, JSON_PRETTY_PRINT));

        echo json_encode(['status' => 'success', 'message' => 'Avaliação enviada com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Preencha todos os campos corretamente.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Você precisa estar logado para enviar uma avaliação.']);
}
