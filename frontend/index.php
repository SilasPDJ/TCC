<!doctype html>
<html lang="en">

<head>
    <title>Página Inicial - LibrasConnect</title>
    <?php include_once('html/utils/head.php'); ?>
    <script src="js/elementsEffect.js"></script>
    <script>
        elementsEffect('sobre', 'quem-somos-title', 'quem-somos-text', 'objetivo', 'proposito', 'convite-img', 'convite-text')
    </script>
</head>


<body>
    <?php include 'html/utils/navbar.php'; ?>

    <main>
        <!-- CARROSSEL SLIDE -->
        <div class="carrossel">
            <div id="carouselExampleCaptions"
                class="carousel slide mx-auto meu-carrossel"
                data-bs-ride="carousel"
                data-bs-interval="4000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div id="carousel-inner" class="carousel-inner"></div>


                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Quem somos? -->
        <div class="container my-5">
            <div class="row">
                <div class="col quem-somos">
                    <h2 class="mb-4  text-center quem-somos-title">Quem Somos</h2>

                    <p class="lead quem-somos-text">
                        O projeto <b>LibrasConnect</b> surgiu em 2024, através de um grupo de TCC no curso de
                        Ciência da Computação da Universidade Municipal de São Caetano do Sul <i>(USCS)</i>.
                    </p>
                </div>
            </div>
            <div class="objetivo mt-4">
                <p class="lead">
                    Nosso principal <b>objetivo</b> é promover a <b>inclusão</b> e a <b>acessibilidade</b> para a comunidade surda,
                    a qual representa 5% da população brasileira (IBGE, 2021).
                </p>
            </div>

            <div class="sobre mt-4">
                <p class="lead">
                    Acreditamos que derrubar barreiras de <b>comunicação</b> entre diferentes grupos linguísticos é
                    um passo fundamental em busca de uma sociedade mais inclusiva.
                </p>
            </div>

            <div class="proposito mt-4">
                <p class="lead">
                    Visando isso, desenvolvemos uma <b>ferramenta</b> de reconhecimento e tradução de <b>Libras</b> <i>(Língua Brasileira de Sinais)</i>.
                    <?php if ($isUserLogged): ?><a href="/html/app_ia" class="link-dark">Clique aqui</a> para acessá-la. <?php else: ?>Para acessá-la, é necessário efetuar <a href="/html/login" class="link-dark">login</a>. <?php endif; ?>

                </p>
            </div>
        </div>


        <div class="container mt-5">
            <div class="row justify-content-center convite-text">
                <div class="col-md-10 text-center">
                    <h3 class="font-weight-bold">Junte-se a Nós</h3>
                    <p class="lead">
                        Queremos que você faça parte dessa revolução na inclusão linguística.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center convite-img mt-4">
                <div class="col-md-10">
                    <img src="img/ilove.jpg" class="img-fluid rounded shadow-lg mb-4" alt="Inclusão Linguística" />
                </div>
            </div>
        </div>


    </main>

    <!-- Rodapé da página -->
    <?php require_once('html/utils/footer.php'); ?>

    <script src="js/carousel.js"></script>



</body>

</html>