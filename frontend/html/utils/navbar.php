<?php
session_start(); // Certifique-se de iniciar a sessão aqui
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
                <a class="nav-item nav-link active ml-4" href="/">Início</a>
                <a class="nav-item nav-link ml-4" href="/html/traducao.php">Tradução</a>
                <a class="nav-item nav-link ml-4" href="/#secao1">Conheça</a>
                <a class="nav-item nav-link ml-4" href="/html/aprenda.php">Aprenda</a>
                <a class="nav-item nav-link ml-4" href="/#secao2">Sobre</a>
                <hr class="linhabar d-lg-none w-100 my-2">
            </div>
            <div class="navbar-nav">
                <?php if (isset($_SESSION['logged_user'])): ?>
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