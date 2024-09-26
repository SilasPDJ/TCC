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
                    <a class="nav-item nav-link <?php echo $currentPage == 'sistema.html' ? 'active' : ''; ?> ml-4" href="/sistema.html">Sistema</a>
                <?php endif; ?>

                <a class="nav-item nav-link <?php echo $currentPage == 'index.php' ? 'active' : ''; ?> ml-4" href="/">Início</a>
                <a class="nav-item nav-link <?php echo $currentPage == 'traducao.php' ? 'active' : ''; ?> ml-4" href="/html/traducao.php">Tradução</a>
                <a class="nav-item nav-link <?php echo $currentPage == 'aprenda.php' ? 'active' : ''; ?> ml-4" href="/html/aprenda.php">Aprenda</a>

                <!-- Dropdown para "Sobre" e "Recursos" -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ml-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mais
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item <?php echo $currentPage == 'index.php' && strpos($_SERVER['REQUEST_URI'], '#secao1') !== false ? 'active' : ''; ?>" href="/#secao1">Sobre</a>
                        <a class="dropdown-item <?php echo $currentPage == 'index.php' && strpos($_SERVER['REQUEST_URI'], '#secao2') !== false ? 'active' : ''; ?>" href="/#secao2">Recursos</a>
                    </div>
                </div>

                <hr class="linhabar d-lg-none w-100 my-2">
            </div>
            <div class="navbar-nav">
                <?php if ($isUserLogged): ?>
                    <span class="navbar-text mr-3">Bem-vindo de volta, <?php echo $_SESSION['logged_user']['nome']; ?>!</span>
                    <a href="/php/sair.php" class="btn btn-outline-danger my-2 my-sm-0">Sair</a>
                <?php else: ?>
                    <a href="html/login.html" target="_blank" class="btn btn-outline-secondary my-2 my-sm-0 ml-2">Entrar</a>
                    <a href="html/cadastrar.html" target="_blank" class="btn btn-outline-primary my-2 my-sm-0 ml-2">Cadastre-se</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>