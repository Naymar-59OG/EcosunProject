<?php
require('dbconnexion.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> capteurs</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-image: url("./img/Apple-large.jpg");
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-size: cover;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			margin: 50px 20px;
		}
		.card {
			width: 300px;
			height: 300px;
			margin: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			overflow: hidden;
		}
		.card h2 {
			text-align: center;
			margin-top: 20px;
		}
		.card p {
			text-align: center;
			margin-top: 50px;
			font-size: 36px;
			font-weight: bold;
		}
		.card .icon {
			display: block;
			margin: 30px auto;
			font-size: 72px;
			text-align: center;
			color: #333;
		}
		.card:hover {
			/* Styles lorsque la souris survole l'élément */
			background-color: white;
			transform: scale(1); /* Échelle normale */
			transition: transform 0.2s ease-in-out;
			
		  }

		  @keyframes beat {
			0% {
			  transform: scale(1); /* Échelle normale */
			}
			50% {
			  transform: scale(1.2); /* Échelle agrandie */
			}
			100% {
			  transform: scale(1); /* Échelle normale */
			}
		  }
		  
		  .card:hover {
			animation: beat 0.8s infinite; /* Appliquer l'animation de battement */
		  }
		  
		  
		@media screen and (max-width: 768px) {
			.card {
				width: calc(50% - 40px);
			}
		}
		@media screen and (max-width: 576px) {
			.card {
				width: 100%;
			}
		}
	</style>
	<script>
		// Fonction pour récupérer et mettre à jour les données des capteurs
        function updateSensorData() {
            // Appel à une URL ou à une API côté serveur pour récupérer les données de la base de données
            fetch('DonneeCapteur.php')
                .then(response => response.json())
                .then(data => {
                    // Mise à jour des éléments HTML avec les nouvelles données
                    document.getElementById("temperature").textContent = data.temperature;
                    document.getElementById("weight").textContent = data.weight;
                    document.getElementById("humidity").textContent = data.humidity;
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données des capteurs:', error);
                });
        }

        // Appel de la fonction de mise à jour au chargement de la page
        window.onload = updateSensorData;
	</script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>capteurs</title>
</head>
<body>
	
</body>
</html>
	<h1>Donnees de capteurs</h1>
	<h1>
    <?php
    // Vérifie si l'utilisateur est connecté avec un prénom stocké dans la session
    if (isset($_SESSION['Prenom'])) {
        $prenom = $_SESSION['Prenom'];
        echo " Mr " . $prenom;
		echo " Voici les données de vos capteur en ce jour du " . date('d/m/Y H:i'); // Afficher la date et l'heure actuelles
    }else{
		session_destroy();
		header("location: authentification.php");
	}
    
    ?>
</h1>

	<div class="container">
		<div class="card">
			<span class="icon">&#x1F321;</span>
			<h2>Temperature</h2>
			<p id="temperature">--</p>
		</div>
		<div class="card">
			<span class="icon">&#x2696;</span>
			<h2>Poids</h2>
			<p id="weight">--</p>
		</div>
		<div class="card">
			<span class="icon">&#x1F4A7;</span>
			<h2>Humidite</h2>
			<p id="humidity">--</p>
		</div>
	</div>
</body>
</html>