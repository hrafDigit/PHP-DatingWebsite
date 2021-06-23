<!-- ===================================================== -->
<!-- Bonne pratique : Débuter avec le php avant le Doctype -->
<?php
session_start();
// ** SESSION START **
//== WARNING :: Obligatoire en procédural

//On peut définir plusieurs variables et les xxxx à vide -> empty values
// $nameErr = $emailErr = $genderErr = $websiteErr = "";
// $name = $email = $gender = $comment = $website = "";

//TIPS :: This function should go in a config file, to escape data
// function html($str) {
// 	return htmlspecialchars($str, ENT_QUOTES);
// }
//END TIPS

// $formData = []; // tableau vide
$formErrors = []; // tableau vide

$civilityList = ['homme' => 'Homme', 'femme' => 'Femme'];		// tableau associatif
var_dump($civilityList);

$regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$regexPseudo = '/^[a-zA-Z \-]+$/';
$regexVille = '/^[a-zA-Z\- ]+$/';

if (isset($_POST['register'])) {

	// Sexe/Genre
	if (isset($_POST['civility']) && in_array($_POST['civility'], $civilityList)) {
		$civility = htmlspecialchars($_POST['civility']);
		//On définit des variables de session
		$_SESSION['civility'] = $civility;
		$_SESSION['civility'];
		var_dump($civility);
	} else {
		$formErrors['civility'] = 'Veuillez sélectionner votre genre';
	}

	// pseudo
	if (!empty($_POST['pseudo'])) {
		if (preg_match($regexPseudo, $_POST['pseudo'])) {
			$pseudo = htmlspecialchars($_POST['pseudo']);
			var_dump($pseudo);
			// $_SESSION['pseudo'] = $pseudo;
		} else {
			$formErrors['pseudo'] = 'Merci de ne renseigner que des lettres';
		}
	} else {
		$formErrors['pseudo'] = 'Veuillez entrer votre Pseudo';
	}
}


// $_SESSION['pseudo'] = $formData['pseudo'];
// $_SESSION['pseudo'] = $pseudo;

// var_dump($_SESSION);

// == sur la page #1 ==
$varFirstname = 'Jean-Michel';
$varLastname = 'Basquiat';
$_SESSION['firstname'] = $varFirstname;
$_SESSION['lastname'] = $varLastname;
var_dump($_SESSION);


$_SESSION['pseudo'] = $_POST['pseudo'];

?>
<!-- ===================================================== -->

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Cursus Dév-PHP | @La Manu, L'Ecole des Métiers du numérique, Paris-Versailles | 2021" />
	<meta name="author" content="Achraf (aka) hrafDigit" />
	<meta name="robots" content="index, follow">
	<title>Lamor | Site de matching (TP)</title>

	<!-- Mobile Specific Meta
	================================================== -->
	<meta name="viewport" cogntent="width=device-width, initial-scale=1.0">

	<!-- Favicon
	================================================== -->
	<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->

	<!-- CSS (libs, Framework, etc.)
	================================================== -->

	<!-- JAVASCRIPT (mandatory inside head-tags)
	================================================== -->
	<!-- NoScript
	================================================== -->
	<noscript>
		<meta http-equiv="refresh" content=1;url="path_to_noscript.html" />
	</noscript>
</head>

<body>
	<!-- START Header -->
	<header class="navigation">

	</header>
	<!-- END header -->

	<!-- START Main -->
	<main>
		Bonjour... le Monde !
		<section>
			<form action="index.php" method="post" name="#" id="#" class="#" alt="#" title="#" enctype="multipart/form-data" accept-charset="utf-8">
				<ul>
					<li>
						<label for="civility">Vous êtes :</label>
						<?php
						foreach ($civilityList as $value => $text) { ?>
							<label class="form-label" for="<?= $value ?>"><?= $text ?></label>
							<input type="radio" <?= (isset($civility) && $civility == $value) ? 'checked' : ''; ?> value="<?= $value ?>" name="civility" />
						<?php } ?>
						<p small class="badge bg-danger"><?= (isset($formErrors['civility'])) ? $formErrors['civility'] : ''; ?></p>
					</li>
					<li>
						<label for="userPseudo">Pseudo :</label>
						<input type="text" id="userPseudo" name="pseudo" value="<?= isset($pseudo) ? $pseudo : ''; ?>" />
						<p><?= (isset($formErrors['pseudo'])) ? $formErrors['pseudo'] : ''; ?></p>
					</li>
					<li>
						<label for="userEmail">Email :</label>
						<input type="email" id="userEmail" name="email" value="<?= isset($email) ? $email : ''; ?>" />
						<p><?= (isset($formErrors['email'])) ? $formErrors['email'] : ''; ?></p>
					</li>
					<li>
						<label for="userPassword">Mot de passe (8 caractères minimum) :</label>
						<input type="password" id="userPassword" name="password" value="<?= isset($password) ? $password : ''; ?>" />
						<p><?= (isset($formErrors['password'])) ? $formErrors['password'] : ''; ?></p>
					</li>
					<li>
						<input type="submit" name="register" value="S'inscrire">
					</li>
				</ul>
			</form>
			<?php
			// You don't want to keep this data any longer
			// unset($_SESSION['form']);
			?>
		</section>
	</main>

	<!-- START Footer -->
	<footer></footer>

	<!-- JAVASCRIPT (libs, Framework, etc.)
	================================================== -->

</body>

</html>