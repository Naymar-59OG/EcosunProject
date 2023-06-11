<?php
require('dbconnexion.php')
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page d'administration</title>
	<!-- Inclure les fichiers CSS de Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}

body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			background-image: url("./img/logo.jpg");
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			
		}
		.session{
			color: white;
			display: flex;
			align_items: center;

		}

		.container {
			margin-top: 50px;
		}
		h2 {
			font-size: 30px;
			font-weight: bold;
			color: #f4f7f9;
			margin-bottom: 10px;
			text-align: center;
		}
		.btn {
			font-size: 16px;
			font-weight: bold;
			border-radius: 10px;
			margin-top: 10px;
			margin-right: 10px;
			padding: 10px 20px;
			transition: all 0.3s ease;
		}
		.btn-primary {
			background-color: transparent;
			border-color: #007bff;
			color: #ffffff;
		}
		.btn-secondary {
			background-color: #007bff;
			border-color: #007bff;
			color: #ffffff;
		}
		.btn:hover {
			transform: scale(1.1);
		}
		.logout-button {
            position: absolute;
            top: 0;
            right: 0;

		}
	</style>
</head>
<body>
	<nav class="navbar">
		<div class="container">
			<button class="btn btn-secondary logout-button" onclick="window.location.href='destroy.php'">Déconnexion</button>
		</div>
	</nav>
	<div class="container">
		
		<div class="session">
		<h2>
		<?php


// Vérifie si l'utilisateur est connecté avec un prénom stocké dans la session
if (isset($_SESSION['Prenom'])) {
    $prenom = $_SESSION['Prenom'];
    echo "Bonjour Bienvenue sur votre page d'administration, Mr " . $prenom ;
} else {
    // Redirige l'utilisateur vers la page d'authentification s'il n'est pas connecté
    header("location: authentification.php");
    exit();
}

?>
</h2>
</div>

		<div class="row justify-content-center">
			<div class="col-md-6 text-center">
				<button class="btn btn-primary" onclick="window.location.href='capteur.php'">État des capteurs mali</button>
			</div>
			<div class="col-md-6 text-center">
				<button class="btn btn-primary" onclick="window.location.href='capteur.php'">État des capteurs senegale</button>
			</div>
			<div class="col-md-6 text-center">
				<button class="btn btn-primary" onclick="window.location.href='capteur.php'">État des capteurs guinée</button>
			</div>
			<div class="col-md-6 text-center">
				<button class="btn btn-primary" onclick="window.location.href='capteur.php'">État des capteurs soudan</button>
			</div>
			<div class="col-md-6 text-center">
				<button class="btn btn-secondary" onclick="window.location.href='inscription.php'">Création de compte</button>
			</div>
		</div>
	</div>
	<!-- Inclure les fichiers JavaScript de Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
