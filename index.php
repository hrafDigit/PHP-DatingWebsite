<?php
SESSION_START();

$_SESSION['age'] = 29;
// tableau associatif des civilités avec la value et le text affiché
$civilityList = ['Homme' => 'Homme', 'Femme' => 'Femme'];
define('YEAR', date('Y') - 1);
// tableau vide pour l'affichage des erreurs
$formErrors = [];
//regex pour la verification des données a entrer pas de chiffre sur les noms et prenoms
$regexPseudo = '/^([a-zA-Z0-9-_]{2,36})$/';
$regexVille = '/^[a-zA-Z\- ]+$/';
$regexMail = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';

if (isset($_POST['register'])) {
    // Verification civilité choisie et cherche si existe dans le tableau civilityList
    if (isset($_POST['civility']) && in_array($_POST['civility'], $civilityList)) {
        $civility = htmlspecialchars($_POST['civility']);
        //On définit des variables de session
        $_SESSION['civility'] = $civility;
        } else {
        $formErrors['civility'] = 'Veuillez sélectionner votre genre';
    }
    // Verification genre chercher choisie et cherche si existe dans le tableau civilityList
    if (isset($_POST['genre']) && in_array($_POST['genre'], $civilityList)) {
        $genre = htmlspecialchars($_POST['genre']);
        $_SESSION['genre'] = $genre;
    } else {
        $formErrors['genre'] = 'Veuillez sélectionner votre genre que vous cherchez';
    }
    /* Verification du nom de l'utilisateur 
     avec un message d'erreur à afficher si pas rempli ou erreur
     */
    if (!empty($_POST['pseudo'])) { // le champ n'est pas vide
        if (preg_match($regexPseudo, $_POST['pseudo'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $_SESSION['pseudo'] = $pseudo;
        } else {
            $formErrors['pseudo'] = 'Merci de renseigner un pseudo correct';
        }
    } else {
        $formErrors['pseudo'] = 'Veuillez entrer votre nom d\'utilisateur';
    }
    //verification de la date de naissance si utilisateur est majeur
    if (!empty($_POST['dob'])) {
        $birthArray = explode('-', $_POST['dob']);
        if (checkdate($birthArray[1], $birthArray[2], $birthArray[0])) {
            if ($birthArray[0] <= YEAR  && $birthArray[0] >= 1900) {
                if ($birthArray[0] < 2003) {
                    $dob = htmlspecialchars($_POST['dob']);
                    $_SESSION['dob'] = $dob;
                } else {
                    $formErrors['dob'] = 'Vous n\'êtes pas majeurs ';
                }
            } else {
                $formErrors['dob'] = 'Veuillez entrer une date compris entre la date du jour et 1900 ';
            }
        } else {
            $formErrors['dob'] = 'Veuillez entrer une date valide';
        }
    } else {
        $formErrors['dob'] = 'Veuillez rentrer la date';
    }
    /* Verification des caracteres de la ville
     avec un message d'erreur à afficher si pas rempli ou erreur
     */
    if (!empty($_POST['city'])) { // le champ n'est pas vide
        if (preg_match($regexVille, $_POST['city'])) {
            $city = htmlspecialchars($_POST['city']);
            $_SESSION['city'] = $city;
        } else {
            $formErrors['city'] = 'Merci de ne renseigner que des lettres et/ou tiret';
        }
    } else {
        $formErrors['city'] = 'Veuillez entrer votre ville';
    }
    // Verification mot de passe qui doit contenir des majuscules minuscules et chiffre
    $uppercase = preg_match('@[A-Z]@', $_POST['password']);
    $lowercase = preg_match('@[a-z]@', $_POST['password']);
    $number  = preg_match('@[0-9]@', $_POST['password']);

    if (!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) {
        $formErrors['password'] = 'Veuillez entrer un mot de passe qui contient au moins une lettre majuscule et miniscule et au moins un chiffre';
    } else {
        $password = htmlspecialchars($_POST['password']);
    }
    // Verifier de email
    if (!empty($_POST['email'])) {
        if (preg_match($regexMail, $_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
            $_SESSION['email'] = $email;
        } else {
            $formErrors['email'] = 'Merci de renseigner une adresse mail correct';
        }
    } else {
        $formErrors['email'] = 'Veuillez entrer votre adresse mail';
    }
}
if ((isset($_POST['login']))) {
    $uppercase = preg_match('@[A-Z]@', $_POST['password']);
    $lowercase = preg_match('@[a-z]@', $_POST['password']);
    $number  = preg_match('@[0-9]@', $_POST['password']);

    if (!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) {
        $formErrors['password'] = 'Veuillez entrer un mot de passe qui contient au moins une lettre majuscule et miniscule et au moins un chiffre';
    } else {
        $password = htmlspecialchars($_POST['password']);
    }
    if (!empty($_POST['pseudo'])) { // le champ n'est pas vide
        if (preg_match($regexPseudo, $_POST['pseudo'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
        } else {
            $formErrors['pseudo'] = 'Merci de renseigner un pseudo correct';
        }
    } else {
        $formErrors['pseudo'] = 'Veuillez entrer votre nom d\'utilisateur';
    }
}
if ((isset($_POST['submit']))) {
    // Verification image choisie 
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        if ($_FILES['image']['size'] <= 1500000) {
            $file = $_FILES['image']['name'];
            $tmpFile = $_FILES['image']['tmp_name'];
            $typeMime = mime_content_type($tmpFile);
            $allowedTypes = [
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
                'jpg' => 'image/jpeg'
            ];
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            var_dump($extension);
            if (!in_array($typeMime, $allowedTypes) || !array_key_exists($extension, $allowedTypes)) {
                $formErrors['image'] = 'Ce fichier n\'est pas une image';
            }
        } else {
            $formErrors['image'] = 'l\'image est trop lourd ou est mal téléchargé';
        }
    } else {
        $formErrors['image'] = 'Veuillez sélectionner votre fichier';
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<!-- ======================== HEAD ===========================-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>connexion</title>
</head>

<body>
   <!-- ==================== INCLUDE HEADER======================-->
    <?php include('header.inc.php'); ?>
    <?php
    if (empty($formErrors) && isset($_POST['register']) || isset($_POST['login'])) {
        include('completeProfile.inc.php');
    } 
        else {

    ?>
        <!-- ======================== MAIN===========================-->
        <section class="main">
            <div class="container">
                <div class="col-8 card">
                    <div class="card-body">
                        <!-- ======================== CONNEXION TABS===========================-->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="connexion">
                                <button class="nav-link " id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="home" aria-selected="true">Connexion</button>
                            </li>
                            <li class="nav-item" role="connexion">
                                <button class="nav-link active" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Inscription</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- ======================== include CONNEXION ===========================-->
                            <?php include('connexion.inc.php'); ?>
                            <!-- =============== INCLUDE INSCRIPTION =========================-->
                            <?php include('register.inc.php'); ?>
                        </div>
                    </div>
                </div>
                <img src="assets/img/lovers4x.png" alt="" width=400px height=400px>
            </div>
            </div>
        <?php } ?>
        </section>
</body>

</html>