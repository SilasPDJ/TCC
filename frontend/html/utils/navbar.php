<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentPage = basename($_SERVER['PHP_SELF']); // Captura o nome do arquivo atual

$isUserLogged = isset($_SESSION['logged_user']);

?>

<?php
function includeWithVariables($filePath, $variables = array(), $print = true)
{
    // Extract the variables to a local namespace
    extract($variables);

    // Start output buffering
    ob_start();

    // Include the template file
    include $filePath;

    // End buffering and return its contents
    $output = ob_get_clean();
    if (!$print) {
        return $output;
    }
    echo $output;
}
?>

<!-- TOPO -->
<header class="">
    <!-- NAVBAR RESPONSIVA -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-body m-0">
        <div class="container-fluid m-1">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav-logo">
                <a class="navbar-brand navtitle" href="/">
                    LibrasConnect <i class="fa-solid fa-language"></i>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <div class="navbar-nav mx-auto">
                    <?php if ($isUserLogged): ?>
                        <a class="nav-item nav-link <?php echo $currentPage == 'app_ia' ? 'active' : ''; ?> ml-4" href="/html/app_ia">Reconhecimento de Gestos</a>
                    <?php endif; ?>
                    <a class="nav-item nav-link <?php echo $currentPage == 'index' ? 'active' : ''; ?> ml-4" href="/">Início</a>
                    <a class="nav-item nav-link <?php echo $currentPage == 'traducao' ? 'active' : ''; ?> ml-4" href="/html/traducao">Tradução</a>
                    <a class="nav-item nav-link <?php echo $currentPage == 'aprenda' ? 'active' : ''; ?> ml-4" href="/html/aprenda">Aprenda</a>
                </div>
                <div class="">
                    <?php if ($isUserLogged): ?>
                        <div class="nav-item dropdown ml-4">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <span class="navbar-text mr-3"></span> -->
                                Bem-vindo de volta, <?php echo $_SESSION['logged_user']['nome']; ?>!
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-center" href="/html/atualizar_cadastro">Gerenciar Perfil</a>
                            </div>
                        </div>
                        <a href="/php/sair" class="btn btn-outline-danger my-2 my-sm-0">Sair</a>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-2 d-flex ms-auto gap-2">
                <a href="/html/login" class="btn btn-outline-secondary my-2 my-sm-0 ml-2">Login</a>
                <a href="/html/cadastro" class="btn btn-outline-primary my-2 my-sm-0 ml-2">Cadastre-se</a>
            </div>
        </div>
    </nav>
</header>