<?php
session_start();
require 'utile.php';
/*
$pass = 'P@ssw0rd';
$hach = password_hash($pass,PASSWORD_BCRYPT);
echo  password_hash($pass,PASSWORD_BCRYPT);
echo password_verify($pass, $hach);
// password_verify($pass,$hash);

*/
$erreur = " ";
if(isset($_POST['clickButton'])){// on verifie si le visiteur à cliquer sur le bouton
  if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['numéro']) && isset($_POST['genre'])){
    // Connectez-vous à la base de données MySQL
$host = "localhost"; // Hôte de la base de données
$username = "admin"; // Nom d'utilisateur de la base de données
$password = "P@ssw0rd"; // Mot de passe de la base de données
$database = "ecosun"; // Nom de la base de données
$conn = mysqli_connect($host, $username, $password, $database );

// Connexion à la base de données
$bdd = new PDO("mysql:host=$host;dbname=$database",$username, $password);


// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$InputPsswrd = $_POST['password'];
$numero = $_POST['numéro'];
$genre = $_POST['genre'];
$identif = $_POST['identifiant'];
$city = $_POST['ville'];
$addr =$_POST['adresse'];
$CP =$_POST['code_postal'];


// Hashage du mot de passe
$hash = password_hash($InputPsswrd, PASSWORD_DEFAULT);

$conn =  mysqli_connect($host, $username, $password, $database);

$bdd = new PDO("mysql:host=$host;dbname=$database",$username, $password);
// Vérifier la connexion
if ($bdd->connect_error) {
die("La connexion a échoué : " . $conn->connect_error);
}

// Requête d'insertion des données dans la table "utilisateurs"
$sql = "INSERT INTO `utilisateurs` (`ID_UTILISATEUR`, `NOM`, `PRENOM`, `ADRESSE`, `NUM_UTILISATEUR`, `VILLE`, `CODE_POSTALE`, `GENRE`, `EMAIL`, `IDENTIFIANT`, `MOT_DE_PASSE`, `ADMINISTRATEUR`) VALUES (NULL, '$nom', '$prenom ', '$addr ', '$numero', '$city', '$addr', '$genre', '$email', '$identif', '$InputPsswrd', NULL)";
if ($conn->query($sql) == TRUE) {
  echo "L'utilisateur a été ajouté avec succès.";
  header("location: test.php");
} else {
echo $erreur = "identifiant ou mot de passe incorrecte.";
}

// Fermer la connexion
$conn->close();
}
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Espace administrateur</title>
</head>
<body>
  

    
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    
     

  <div class="container">
    <div class="title">INSCRIPTION</div>
    <div class="content">
      <form  methode="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" placeholder="votre nom" name = "nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prenom</span>
            <input type="text" placeholder="Enter your username" name="prenom" required >
          </div>
          
          <div class="input-box">
            <span class="details">identifiant</span>
            <input type="text" placeholder="Enter your username" name="identifiant" required >
          </div>

          <div class="input-box">
            <span class="details">Adresse</span>
            <input type="text" placeholder="Enter your username" name="adresse" required >
          </div>

          <div class="input-box">
            <span class="details">Numéro</span>
            <input type="text" placeholder="Enter your number" name="némero" required>
          </div>

          <div class="input-box">
            <span class="details">Ville</span>
            <input type="text" placeholder="Enter your username" name="ville" required >
          </div>

          <div class="input-box">
            <span class="details">code postal</span>
            <input type="text" placeholder="Enter your username" name="adresse" code_Postal >
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>
          
          <div class="input-box">
            <span class="details">mot de passe </span>
            <input type="text" placeholder="Enter your password" name="mot_de_passe" required>
          </div>
          <div class="input-box">
            <span class="details">confirmation mot de passe</span>
            <input type="text" placeholder="Confirm your password" name="mot_de_passe"required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">genre</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">homme</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Femme</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Administrateur</span>
          </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="buttonInscript ">
        </div>
        <div class="erreur">
 <?php 
 if(isset($erreur)){
  echo $erreur ;
 }
 
 ?>
      </form>
    </div>
  </div>

</body>
</html>