<?php
// Redireciona ao index, se usuário já estiver no sistema e tentar acessar as urls de login e cadastro

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['logged_user'])) {
    header('Location: /index.php');
    exit();
}
