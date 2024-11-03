<!DOCTYPE html>
<html>

<head>

    <title>Aprenda</title>
    <link rel="stylesheet" type="text/css" href="../css/aprenda.css">
    <?php include_once('utils/head.php') ?>

</head>

<body>
    <!-- TOPO -->
    <?php include 'utils/navbar.php'; ?>



    <!-- BANNER -->
    <div class="jumbotron jumbotron-fluid"
        style="background-image: url('../img/fundoAprenda.png'); background-size: cover;">
        <div class="container">
            <h1 class="display-4 title">Aprenda Online!</h1>
            <p class="lead subTitle">Os melhores cursos voltados à Libras e ASL para você.</p>
            <a class="btn btn-primary btn-lg" href="/#secaoAprenda" role="button">Saiba mais</a>
        </div>
    </div>


    <!-- CARDS DOS CURSOS -->
    <div class="container cursos">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/interprete.jpg" alt="Imagem 1">
                    <div class="card-body">
                        <h5 class="card-title">Intérprete de Libras</h5>
                        <p class="card-text">Saiba fazer interpretação de libras.</p>
                        <p class="card-text"> Certificado
                            <span class="material-symbols-outlined">workspace_premium</span>
                        </p>
                        <p class="card-text">Duração: 12 Horas</p>
                        <a href="../html/IndexVideos/VideoInterprete" class="btn btn-primary">Ver
                            mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/aslAmerica.png" alt="Imagem 2">
                    <div class="card-body">
                        <h5 class="card-title">ASL - Americano</h5>
                        <p class="card-text">Curso completo de libras Americana (ASL).</p>
                        <p class="card-text"> Certificado
                            <span class="material-symbols-outlined">workspace_premium</span>
                        </p>
                        <p class="card-text">Duração: 22 Horas</p>
                        <a href="../html/IndexVideos/ASLAmericano" class="btn btn-primary">Ver
                            mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/labial.png" alt="Imagem 3">
                    <div class="card-body">
                        <h5 class="card-title">Introdução à leitura labial</h5>
                        <p class="card-text">Começe a aprender os conceitos da leitura labial.</p>
                        <p class="card-text"> Certificado
                            <span class="material-symbols-outlined">workspace_premium</span>
                        </p>
                        <p class="card-text">Duração: 8 Horas</p>
                        <a href="../html/IndexVideos/leituraLabial" class="btn btn-primary">Ver
                            mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rodapé da página -->
    <?php require_once('utils/footer.php') ?>


</body>

</html>