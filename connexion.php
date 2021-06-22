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
            <a class="navbar-brand text-light fst-italic" href="index.php" title="Page d'Accueil"><img
                    src="assets/img/logo_small.png" width="300em" height="50%" alt="Logo" title="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="index.php"
                            title="Page d'Accueil">Accueil</a>
                    </li>
                    
                    <li class="nav-item text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="#team"
                            title="Team">Notre réseau</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-md-auto">
                    <li class="nav-item text-center">
                        <a class="btn btn-outline-light rounded mx-2 my-1 p-2" href="#cart"
                            title="Déconnexion">Connexion <i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="login p-4 text-center">
        <?php
        $userInfo = null;
        // Get user info from cookie if cookie exists.
        if (!empty($_COOKIE['user'])) {
            $userInfo = unserialize($_COOKIE['user']);    
        }
        // Get user info and put it in a cookie if login and password variables are not empty.
        if(isset($_POST['authentication'])){
            $formErrors = [];
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                // Data in userInfo array are stringyfied. Before, password is hashed.
                $userInfo = [
                    'login' => $_POST['login'],
                    'password' => $_POST['password']
                ];
                setcookie('user', serialize($userInfo), time() + 60 * 60 * 24);
            } else {
                $formErrors['form'] = 'Veuillez saisir votre login et votre mot de passe';
            }
        }

        ?>

        <?php if (!isset($_POST['authentication']) || !empty($formErrors)) : ?>
            <form action="" method="POST">
                <label for="login">Identifiant : </label>
                <input type="text" id="login" name="login" value=""><br><br>
                <label for="password">Mot de passe : </label>
                <input type="password" id="password" name="password" value="">
                <p><?= !empty($formErrors['form']) ? $formErrors['form'] : ''; ?></p>
                <input type="submit" name="authentication" value="Se connecter"><br><br>
                <div id="formFooter">
                    <a class="underlineHover" href="#">Mot de passe oublié ?</a>
                </div>
            </form>
        <?php else : header('Location: members.php '); ?>          
        <?php endif ?>
            
    </section>
    <footer>
        <div class="footer text-white">
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