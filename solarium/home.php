<?php 
require('dbconnexion.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="homepage.css" />
		<title>Page d'accueil</title>
	</head>
	<body>
		<div class="container">
			<h3>
			<nav>
				
			<img src="./img/logo.png" alt="" class="logo" />
				<ul>
					<li><a href="home.php">Accueil</a></li>
					<li><a href="authentification.php">connexion</a></li>
					<li><a href="apropos.html">A propos</a></li>
				</ul>
				<img src="/cart.png" alt="" class="cart" />
			
			</nav>
			<h1>
		<?php


// Vérifie si l'utilisateur est connecté avec un prénom stocké dans la session
if (isset($_SESSION['Prenom'])) {
    $prenom = $_SESSION['Prenom'];
    echo "Bonjour, Mr " . $prenom;
}else{
	session_destroy();
}

?>
</h1>
</div>
		</h3>
			<section class="site-container">
				<p>Bienvenu sur</p>
				<h1>SOLARIUM</h1>
				<h4>EN APESANTEUR, VENEZ PROFITER DU CALME DE CHEZ NOUS...</h4>

				<div class="row">
					<a href="#">Prendre un rendez-vous</a>
					<a href="#">Voir les sites <span>&#x27f6</span></a>
					<span>
						les panneaux solaires au coeur de la<br />
						transition écologique.
					</span>
				</div>
			</section>

            <section class="social-icons">
                <a href="https://github.com/Naymar-59OG/EcosunProject"><img src="./img/github-fill.png" alt=""></a>
                <a href="#"><img src="./img/instagram-fill.png" alt=""></a>
                <a href="#"><img src="./img/telegram-fill.png" alt=""></a>
                <a href="https://drive.google.com/file/d/1u2ZQxyamKsgJ4JxO-kYbytfxaaEkOT_a/view?usp=sharing" target="_blank"><img src="drive-fill.png" alt=""></a>
            </section>
		</div>
	</body>
</html>
