<?php
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
    } else {
        $formErrors['civility'] = 'Veuillez sélectionner votre genre';
    }
    // Verification genre chercher choisie et cherche si existe dans le tableau civilityList
    if (isset($_POST['genre']) && in_array($_POST['genre'], $civilityList)) {
        $genre = htmlspecialchars($_POST['genre']);
    } else {
        $formErrors['genre'] = 'Veuillez sélectionner votre genre que vous cherchez';
    }
    /* Verification du nom de l'utilisateur 
     avec un message d'erreur à afficher si pas rempli ou erreur
     */
    if (!empty($_POST['pseudo'])) { // le champ n'est pas vide
        if (preg_match($regexPseudo, $_POST['pseudo'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
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
?>

<!DOCTYPE html>
<html lang="fr">
<!-- ======================== HEAD ===========================-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>connexion</title>
</head>

<body>
    <?php
    if (empty($formErrors) && isset($_POST['register']) || isset($_POST['login'])) {
    ?>
        <h3>Bonjour <?= $pseudo ?> ,Bienvenue dans notre site de rencontre </h3>
        <p> Veuillez completer votre profil </p>
        <div class="col-6 card">
            <h4> Pratiquez vous un sport ? si oui cochez vos differents sports?</h4>
            <div>
                <div>
                    <label for="choix-1"><input type="checkbox" id="choix-1" value="valeur-1">Athlétisme</label>
                </div>

                <div>
                    <label for="choix-2"><input type="checkbox" id="choix-2" value="valeur-2">Cyclisme</label>
                </div>

                <div>
                    <label for="choix-3"><input type="checkbox" id="choix-3" value="valeur-3">Sports de précision</label>
                </div>

                <div>
                    <label for="choix-4"><input type="checkbox" id="choix-4" value="valeur-4">Sports mécaniques</label>
                </div>
            </div>
            <h4> Parlez nous de votre personnalité</h4>
            <div>
                <div>
                    <label for="choix-2-1"><input type="checkbox" id="choix-2-1" value="valeur-2-1">Altruiste</label>
                </div>

                <div>
                    <label for="choix-2-2"><input type="checkbox" id="choix-2-2" value="valeur-2-2">Timide</label>
                </div>

                <div>
                    <label for="choix-3-2"><input type="checkbox" id="choix-3-2" value="valeur-3-2">intraverti</label>
                </div>

                <div>
                    <label for="choix-4-2"><input type="checkbox" id="choix-4-2" value="valeur-4-2">Extraverti</label>
                </div>
            </div>
            <h4> Avez vous un/des animaux de compagnie?</h4>
            <div>
                <input type="radio" id="oui" name="oui" value="Oui">
                <label for="oui">OUI</label>

                <input type="radio" id="non" name="oui" value="Non">
                <label for="non">NON</label>
            </div>
            <h4> Avez entré votre profil</h4>
            <input type="file" name="image" />
            <input type="submit" value="Envoyer" name="submit">
        </div>
    <?php

    } else {

    ?>
        <!-- ======================== MAIN===========================-->
        <div class="container">
            <div class="row mt-5">
                <div class="col-6 card">
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
                            <!-- ======================== CONNEXION ===========================-->
                            <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="pseudo" class="form-label">Nom d'utilisateur : </label>
                                        <input type="text" class="form-control <?= !isset($_POST['login']) ? null : (isset($formErrors['pseudo']) ? 'is-invalid' : 'is-valid') ?>" id="pseudo" name="pseudo" value="<?= !isset($pseudo) ? null : $pseudo ?>" />
                                        <?php if (isset($formErrors['pseudo'])) { ?>
                                            <p><small class="badge bg-danger"><?= $formErrors['pseudo'] ?></small></p>
                                        <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mot de passe: </label>
                                        <input type="password" class="form-control <?= !isset($_POST['login']) ? null : (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') ?>" id="password" name="password" value="<?= !isset($password) ? null : $password ?>" />
                                        <?php if (isset($formErrors['password'])) { ?>
                                            <p><small class="badge bg-danger"><?= $formErrors['password'] ?></small></p>
                                        <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-secondary" type="submit" name="login">Se connecter</button>
                                    </div>
                                </form>
                            </div>
                            <!-- ======================== INSCCRIPTION ===========================-->
                            <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="civility">Vous êtes :</label>
                                        <?php
                                        foreach ($civilityList as $value => $text) { ?>
                                            <label class="form-label" for="<?= $value ?>"><?= $text ?></label>
                                            <input type="radio" <?= (isset($civility) && $civility == $value) ? 'checked' : ''; ?> value="<?= $value ?>" name="civility" />
                                        <?php } ?>
                                        <p small class="badge bg-danger"><?= (isset($formErrors['civility'])) ? $formErrors['civility'] : ''; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="genre">Je cherche :</label>
                                        <?php
                                        foreach ($civilityList as $value => $text) { ?>
                                            <label class="form-label" for="<?= $value ?>"><?= $text ?></label>
                                            <input type="radio" <?= (isset($genre) && $genre == $value) ? 'checked' : ''; ?> value="<?= $value ?>" name="genre" />
                                        <?php } ?>
                                        <p small class="badge bg-danger"><?= (isset($formErrors['genre'])) ? $formErrors['genre'] : ''; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pseudo" class="form-label">Nom d'utilisateur : </label>
                                        <input type="text" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrors['pseudo']) ? 'is-invalid' : 'is-valid') ?>" id="pseudo" name="pseudo" value="<?= !isset($pseudo) ? null : $pseudo ?>" />
                                        <?php if (isset($formErrors['pseudo'])) { ?>
                                            <p><small class="badge bg-danger"><?= $formErrors['pseudo'] ?></small></p>
                                        <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Adresse mail : </label>
                                        <input type="email" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrorList['email']) ? 'is-invalid' : 'is-valid') ?>" id="email" name="email" value="<?= !isset($email) ? null : $email ?>" />
                                        <?php if (isset($formErrors['email'])) { ?>
                                            <p><small class="badge bg-danger"><?= $formErrors['email'] ?></small></p>
                                        <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mot de passe: </label>
                                        <input type="password" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') ?>" id="password" name="password" value="<?= !isset($password) ? null : $password ?>" />
                                        <?php if (isset($formErrors['password'])) { ?>
                                            <p><small class="badge bg-danger"><?= $formErrors['password'] ?></small></p>
                                        <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date de naissance : </label>
                                        <input type="date" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrors['dob']) ? 'is-invalid' : 'is-valid') ?>" id="dob" name="dob" value="<?= !isset($dob) ? null : $dob ?>" />
                                        <?php if (isset($formErrors['dob'])) { ?>
                                            <p><small class="badge bg-danger"><?= $formErrors['dob'] ?></small></p>
                                        <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">Ville : </label>
                                        <input type="text" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrors['city']) ? 'is-invalid' : 'is-valid') ?>" id="city" name="city" value="<?= !isset($city) ? null : $city ?>" />
                                        <?php if (isset($formErrors['city'])) { ?>
                                            <p><small class="badge bg-danger"><?= $formErrors['city'] ?></small></p>
                                        <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-secondary" type="submit" name="register">S'enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

</html>