<?php
 SESSION_START();
 $pseudo = $_SESSION['pseudo'] ?? '';
 $email = $_SESSION['email'] ?? '';
 $dob = $_SESSION['dob'] ?? '';
 $city = $_SESSION['city'] ?? '';
 $civility = $_SESSION['civility'] ?? '';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
    integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Notre réseau</title>
</head>
<body>
    <!-- Header avec navbar -->
    <header class="navbar navbar-expand-md navbar-nav bg-red-400 navbar-dark sticky-top shadow">
        <nav class="container-fluid flex-wrap">
            <a class="navbar-brand text-light fst-italic" href="index.php" title="Page d'Accueil"><img
                    src="assets/img/logo_small.png" width="300em" height="50%" alt="Logo" title="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="index.php" title="Page d'Accueil">Accueil</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-md-auto">
                    <li class="nav-item text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="index.php" title="Connexion">Déconnexion <i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>

    <h4>Bonjour 
        <?= $_SESSION['pseudo'] ?> .
        <?= $_SESSION['civility'] ?> .
        <?= $_SESSION['email'] ?> .
        <?= $_SESSION['dob'] ?> .
        <?= $_SESSION['city'] ?> ., 
    bienvenue dans notre site de rencontre
    </h4>

    <?php
    $file='data.json';
    $data=file_get_contents($file);
    $obj=json_decode($data);
    ?>
        <div class="container">
            <div class="col-10 card">
            <?php
            foreach($obj->{'profile'} as $profile){
                $name=$profile->{'name'};
                $image=$profile->{'img'};
                $age=$profile->{'age'};
                $city =$profile->{'city'};
            ?>
                <div>
                    <div class="row">
                        <div class="col-4">
                            <img src="assets/img/<?= $image; ?>" alt="" width="180px" height="150px">
                        </div>
                        <div class="col-6">
                            <p> Bonjour je m'appelle  <?= $name; ?> , j'ai <?= $age ; ?> et j'habite à  <?= $city ; ?>  </p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer">
            <div class="social"><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i
                class="fab fa-snapchat"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i
                class="fab fa-facebook"></i></a></div>
                <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Accueil</a></li>
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