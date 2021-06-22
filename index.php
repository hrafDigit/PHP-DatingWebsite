<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projet PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
    integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Header avec navbar -->
    <header class="navbar navbar-expand-md navbar-nav bg-red-400 navbar-dark sticky-top shadow">
        <nav class="container-fluid flex-wrap">
            <a class="navbar-brand text-light fst-italic" href="index.html" title="Page d'Accueil"><img
                    src="assets/img/logo_small.png" width="300em" height="50%" alt="Logo" title="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="index.html"
                            title="Page d'Accueil">Accueil</a>
                    </li>
                    <li class="nav-item dropdown text-center">
                        <a class="nav-item dropdown-toggle btn btn-outline-light rounded mx-2 my-1 p-2" href="#produits"
                        id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nos produits
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#pcPortable">PC Portables</a></li>
                        <li><a class="dropdown-item" href="#pcGaming">PC de jeux</a></li>
                        <li><a class="dropdown-item" href="#pcProfessionnel">PC professionnels</a></li>
                        <li><a class="dropdown-item" href="#accessoires">Accessoires</a></li>
                        </ul>
                    </li>
                    <li class="nav-item text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="#expertise"
                            title="Notre Expertise">Notre Expertise</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="#team"
                            title="Team">Notre équipe</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-md-auto">
                    <li class="nav-item text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="connexion.php"
                            title="Connexion">Connexion <i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section>
        <div class="container-fluid" id="team">
            <div class="row bg-primary px-5 pb-3 pb-4">
                <h2 class="text-center text-light my-4 display-2 mb-5 mt-5" style="text-decoration: underline;">Une équipe à vos côtés
                </h2>
                <div class="col-lg-5">
                    <img src="assets/img/equipe.jpg" style="width: 100%; border-radius: 1rem;" alt="photo de l'equipe"
                    title="photo de l'equipe">
                </div>
                <div class="col-lg-7 mt-3 text-white  d-flex h-75 align-self-center">
                <p>Pour vous accompagner dans l’ensemble de vos projets, une équipe commerciale accessible au téléphone
                    est à votre service. Nos collaborateurs sont tous experts et hautement certifiés sur la plupart des
                    technologies et des acteurs du marché<br><br>
                    Ils sauront vous écouter, comprendre vos besoins, vous proposer des solutions adaptées et si
                    nécessaire, mettre à votre disposition l’ensemble des ressources de l’entreprise.</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">
            <div class="social"><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i
                class="fab fa-snapchat"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i
                class="fab fa-facebook"></i></a></div>
                <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Accueil</a></li>
                <li class="list-inline-item"><a href="#">Nos produits</a></li>
                <li class="list-inline-item"><a href="#">Notre expertise</a></li>
                <li class="list-inline-item"><a href="#">Nous contacter</a></li>
                <li class="list-inline-item"><a href="mentionslegales.html">Mentions Legales</a></li>
                </ul>
                <p class="copyright">Computer experte © 2021</p>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>