<?php
session_start();
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destrói a sessão
header("Location: /"); // Redireciona o usuário para a página inicial (ou outra página)
exit();
