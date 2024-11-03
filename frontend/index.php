<!doctype html>
<html lang="en">

<head>
    <title>ASL</title>
    <?php include_once('html/utils/head.php'); ?>
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

        <!-- SETA 1 -->

        <!-- Quem somos? -->
        <div class="container my-5">
            <div class="row">
                <div class="col text-center">
                    <h2 class="mb-4">Quem Somos</h2>
                    <p class="lead">
                        O projeto <strong>LibrasConnect</strong> surgiu em 2024, através de um grupo de TCC do curso de Ciência da Computação da Universidade Municipal de São Caetano do Sul (USCS).
                    </p>
                </div>
                <hr class="my-4">
                <p class="">
                    Nosso principal objetivo é gerar valor à sociedade, promovendo inclusão e acessibilidade de comunicação para a comunidade surda.
                </p>
                <p>
                    Por meio da divulgação das Libras (Língua Brasileira de Sinais), buscamos não apenas informar, mas também transformar a forma como a sociedade interage.
                    Acreditamos que derrubar barreiras de comunicação é um passo fundamental em busca da igualdade de acesso à informação.
                </p>
                <p>
                    Em nosso site, você encontrará uma variedade de conteúdos abrangentes sobre o tema, com informações relevantes e artigos educativos sobre a Língua Brasileira de Sinais.
                </p>
            </div>
        </div>


        <div class="container my-5">
            <div class="row mb-4">
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h3 class="mb-3">Cursos Online</h3>
                        <p>
                            Oferecemos cursos online, ministrados por instrutores qualificados, que visam capacitar pessoas interessadas em aprender Libras e ASL.
                            Nosso site fornece um ambiente de aprendizagem interativo, para que nossos alunos possam adquirir habilidades linguísticas
                            essenciais e se conectar com a comunidade surda.
                        </p>
                        <p>
                            Uma das principais funções de nosso site é a página de tradução de Libras. Reconhecemos a importância de fornecer uma ferramenta prática para
                            a tradução de texto para sinais, facilitando a comunicação entre pessoas surdas e ouvintes. Com essa funcionalidade, buscamos aproximar ainda mais os
                            diferentes grupos linguísticos e incentivar uma sociedade inclusiva.
                        </p>
                        <p>
                            Como uma empresa tecnológica, estamos sempre em busca de inovação. Estamos constantemente aprimorando nosso
                            site para atender às necessidades e demandas. Valorizamos seu feedback e estamos comprometidos em oferecer uma experiência única para você.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="img/macaquinhos.jpg" class="img-fluid rounded" alt="Cursos Online" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <img src="img/ilove.jpg" class="img-fluid rounded" alt="Inclusão Linguística" />
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h3 class="mb-3">Junte-se a Nós</h3>
                        <p>
                            Junte-se a nós nessa jornada e faça parte da revolução da inclusão linguística em busca da igualdade de acesso à informação.
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <!-- SETA 2 -->
        <div class="seta2">
            <a class="seta-click" href="#recursos">
                <i class="fa-solid fa-arrow-down"></i>
            </a>
        </div>

        <!-- SOBRE -->
        <div>
            <div class="text-center" id="recursos">
                <h2>Principais Recursos</h2>
            </div>

            <div class=" container">

                <div class="itensGeral row align-items-start">
                    <div class="col dois">
                        <img src="img/libras.jpg" class="rounded float-end" alt="...">
                    </div>
                    <div class="col text mt-4 pt-2">
                        Estamos comprometidos em fornecer recursos de alta qualidade para tornar o aprendizado da Libras uma experiência enriquecedora.
                        Sua opinião é fundamental para nós. Se você tiver algum feedback sobre nossos recursos ou encontrar algum problema,
                        não hesite em entrar em contato conosco.
                        <br><br>

                        Concluindo, convidamos você a explorar nossos recursos e embarcar nessa jornada de aprendizado da Libras.
                        Ao dominar essa linguagem, você estará contribuindo para um mundo mais inclusivo e acessível.

                        <!-- <button type="button" class="btn saiba btn-secondary  col-md-2">
                            <i class="fa-solid fa-phone-volume"></i>
                        </button> -->
                    </div>


                </div>


            </div>
        </div>

    </main>

    <!-- Rodapé da página -->
    <?php require_once('html/utils/footer.php'); ?>

    <script src="js/carousel.js"></script>

</body>

</html>