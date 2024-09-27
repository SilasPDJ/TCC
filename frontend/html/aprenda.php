<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aprenda</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/aprenda.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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