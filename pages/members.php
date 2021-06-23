<!-- ===================================================== -->
<!-- Bonne pratique : Débuter avec le php avant le Doctype -->
<?php
session_start();
// ** SESSION START **
//== WARNING :: Obligatoire en procédural

// $data = $_SESSION['form'];
// var_dump($data);

// $data = $_POST;
// var_dump($data);

// = OPTION #3 =
//= recommended solution for post-7+ PHP versions =
$gender = $_SESSION['gender'] ?? '';
$pseudo = $_SESSION['pseudo'] ?? '';

$varFirstname = $_SESSION['firstname'] ?? '';
$varLastname = $_SESSION['lastname'] ?? '';
var_dump($_SESSION);

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
		<h1>Page des membres pecho.php</h1>
		<section>
			<div class="wrapper">
			</div>
		</section>
	</main>

	<!-- START Footer -->
	<footer></footer>

	<!-- JAVASCRIPT (libs, Framework, etc.)
	================================================== -->

</body>

</html>