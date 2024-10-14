<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASL</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/carrossel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                <div class="carousel-inner">
                    <div class="carousel-item active rounded">
                        <img src="img/foto2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block">
                            <h3 class="h3-carrossel">Libras e ASL</h3>
                            <p class="p-carrossel">O caminho para uma boa comunicação.</p>
                            <a href="#sobre">
                                <button type="button" class="btn btn-outline-secondary slide">Saiba mais</button>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item rounded">
                        <img src="img/interprete.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block">
                            <h3 class="h3-carrossel">Tradução</h3>
                            <p class="p-carrossel">Traduza Libras para ASL em qualquer lugar!</p>
                            <a href="html/traducao">
                                <button type="button" class="btn btn-outline-secondary slide">Saiba mais</button>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item rounded">
                        <img src="img/estudo.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block">
                            <h3 class="h3-carrossel">Aprenda</h3>
                            <p class="p-carrossel">Saiba o caminho da comunicação com pessoas deficiêntes auditivas.</p>
                            <a href="html/aprenda">
                                <button type="button" class="btn btn-outline-secondary slide">Saiba mais</button>
                            </a>
                        </div>
                    </div>
                </div>
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
        <div class="seta">
            <a class="seta-click" href="#sobre">
                <i class="fa-solid fa-arrow-down"></i>
            </a>
        </div>

        <!-- Quem somos? -->
        <div>
            <div class="Title-1" id="sobre">
                <h2>Quem somos?</h2>
            </div>

            <div class="img1 container text-center">

                <div class="itensGeral row align-items-start">
                    <div class="col text">
                        Somos uma nova empresa tecnológica que surgiu a partir de um grupo na faculdade Metodista (UMESP), de tecnologia.
                        Com um objetivo em comum de criar soluções inovadoras e impactantes, decidimos unir nossas
                        habilidades e conhecimentos para fundar uma empresa especializada em promover inclusão e acessibilidade.
                        <br><br>
                        Nosso foco principal é o desenvolvimento de um site dedicado à língua de sinais, tanto em Libras (Língua Brasileira de Sinais)
                        quanto em ASL (American Sign Language). Reconhecemos a importância de derrubar barreiras de comunicação e proporcionar
                        igualdade de acesso a informações para a comunidade surda.
                        <br><br>
                        Em nosso site, você encontrará uma variedade de conteúdos abrangentes sobre o tema.
                        Nossas páginas são repletas de informações relevantes, artigos educativos e
                        atualizações sobre a língua de sinais. Nosso objetivo é compartilhar conhecimento e
                        promover uma compreensão mais ampla da cultura surda.
                    </div>
                    <div class="col dois">
                        <img src="img/comunidade.jpg" class="rounded float-end" alt="...">
                    </div>
                </div>

                <div class="itensGeral row align-items-start">
                    <div class="col dois">
                        <img src="img/macaquinhos.jpg" class="rounded float-end" alt="...">
                    </div>
                    <div class="col text" id="secaoAprenda">
                        Além disso, oferecemos cursos online, ministrados por instrutores qualificados, que visam capacitar pessoas interessadas em aprender Libras e ASL.
                        Nosso site fornece um ambiente de aprendizagem interativo, para que nossos alunos possam adquirir habilidades linguísticas
                        essenciais e se conectar com a comunidade surda.
                        <br><br>
                        Uma das principais funções de nosso site é a página de tradução de Libras. Reconhecemos a importância de fornecer uma ferramenta prática para
                        a tradução de texto para sinais, facilitando a comunicação entre pessoas surdas e ouvintes. Com essa funcionalidade, buscamos aproximar ainda mais os
                        diferentes grupos linguísticos e incentivar uma sociedade inclusiva.
                        <br><br>
                        Como uma empresa tecnológica, estamos sempre em busca de inovação. Estamos sempre aprimorando nosso
                        site para atender às necessidades e demandas. Valorizamos seu feedback
                        e estamos comprometidos em oferecer uma experiência única para você.
                    </div>
                </div>

                <div class="itensGeral row align-items-start">

                    <div class="col text">
                        Estamos entusiasmados com a oportunidade de fazer a diferença na vida das pessoas, promovendo a inclusão e a
                        acessibilidade por meio de nossa plataforma online.
                        Nossa missão é construir uma ponte de comunicação entre pessoas surdas e ouvintes, capacitando indivíduos e
                        comunidades para uma interação mais significativa.
                        <br><br>
                        Junte-se a nós nessa jornada e faça parte da revolução da inclusão linguística. Seja bem-vindo(a) à nossa empresa tecnológica dedicada à promoção da língua
                        de sinais e da igualdade de acesso à informação.
                        <br><br>
                        Estamos ansiosos para ajudar você a explorar, aprender e se conectar no mundo da Libras e da ASL.
                    </div>
                    <div class="col dois">
                        <img src="img/ilove.jpg" class="rounded float-end ilove" alt="...">
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
            <div class="Title-1" id="recursos">
                <h2>Principais Recursos</h2>
            </div>

            <div class="img1 container">

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
    <?php require_once('html/utils/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>