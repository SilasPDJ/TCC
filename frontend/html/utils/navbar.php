<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentPage = basename($_SERVER['PHP_SELF']); // Captura o nome do arquivo atual

$isUserLogged = isset($_SESSION['logged_user']);

?>

<!-- TOPO -->
<header>
    <!-- NAVBAR RESPONSIVA -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="nav-logo">
            <a class="navbar-brand navtitle" href="/">
                ASL <i class="fa-solid fa-language"></i>
            </a>
        </div>

        <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <?php if ($isUserLogged): ?>
                    <a class="nav-item nav-link <?php echo $currentPage == 'app_ia' ? 'active' : ''; ?> ml-4" href="/html/app_ia">Reconhecimento de Gestos</a>
                <?php endif; ?>

                <a class="nav-item nav-link <?php echo $currentPage == 'index' ? 'active' : ''; ?> ml-4" href="/">Início</a>
                <a class="nav-item nav-link <?php echo $currentPage == 'traducao' ? 'active' : ''; ?> ml-4" href="/html/traducao">Tradução</a>
                <a class="nav-item nav-link <?php echo $currentPage == 'aprenda' ? 'active' : ''; ?> ml-4" href="/html/aprenda">Aprenda</a>
                <div class="nav-item dropdown ml-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mais
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/#sobre">Sobre</a>
                        <a class="dropdown-item" href="/#recursos">Recursos</a>
                    </div>
                </div>
                <hr class="linhabar d-lg-none w-100 my-2">
            </div>
            <div class="navbar-nav">
                <?php if ($isUserLogged): ?>
                    <span class="navbar-text mr-3">Bem-vindo de volta, <?php echo $_SESSION['logged_user']['nome']; ?>!</span>
                    <a href="/php/sair" class="btn btn-outline-danger my-2 my-sm-0">Sair</a>
                <?php else: ?>
                    <a href="/html/login" class="btn btn-outline-secondary my-2 my-sm-0 ml-2">Entrar</a>
                    <a href="/html/cadastro" class="btn btn-outline-primary my-2 my-sm-0 ml-2">Cadastre-se</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>