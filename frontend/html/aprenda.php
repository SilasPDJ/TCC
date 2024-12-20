<!DOCTYPE html>
<html>

<head>

    <title>Aprenda online - LibrasConnect</title>
    <?php include_once('utils/head.php') ?>

</head>

<body>
    <!-- TOPO -->
    <?php include 'utils/navbar.php'; ?>



    <main>
        <!-- BANNER -->
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url('../../img/fundoAprenda.png'); background-size: cover;">
            <div class="container text-center">
                <h1 class="display-4 title">Aprenda online</h1>
                <p class="lead subTitle">Os melhores cursos voltados à Libras e ASL para você.</p>
            </div>
        </div>
        <!-- CARDS DOS CURSOS -->
        <div class="container cursos mt-4">
            <div class="row justify-content-center">
                <div class="col-md-4 d-flex mt-2">
                    <div class="card w-100 h-100">
                        <img class="card-img-top" src="../../img/interprete.jpg" alt="Imagem 1">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Intérprete de Libras</h5>
                            <p class="card-text">
                                O curso de intérprete de Libras é essencial para aqueles que desejam mediar uma comunicação entre pessoas surdas e ouvintes através de
                                conhecimentos teóricos e práticos.
                            </p>
                            <a href="/html/aprenda_tutoriais/VideoInterprete" class="btn btn-primary mt-auto">Clique para conhecer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex mt-2">
                    <div class="card w-100 h-100">
                        <img class="card-img-top" src="../../img/labial.png" alt="Imagem 3">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Introdução à leitura labial</h5>
                            <p class="card-text">
                                O curso de Introdução à Leitura Labial ensina técnicas essenciais para se comunicar com pessoas surdas ou com dificuldades auditivas,
                                focando na interpretação de movimentos labiais e expressões faciais.
                            </p>
                            <a href="/html/aprenda_tutoriais/leituraLabial" class="btn btn-primary mt-auto">Clique para conhecer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex mt-2">
                    <div class="card w-100 h-100">
                        <img class="card-img-top" src="../../img/aslAmerica.png" alt="Imagem 2">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">ASL - Americano</h5>
                            <p class="card-text">
                                O curso de ASL, ou American Sign Language (Língua de Sinais Americana), oferece uma introdução completa à língua de sinais
                                utilizada pela comunidade surda nos Estados Unidos.
                            </p>
                            <a href="/html/aprenda_tutoriais/ASLAmericano" class="btn btn-primary mt-auto">Clique para conhecer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Rodapé da página -->
    <?php require_once('utils/footer.php') ?>


</body>

</html>