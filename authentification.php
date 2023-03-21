<?php
session_start();
require 'utile.php';

$pass = '$2y$10$YSBoWwiFcznykvujI2VA7ON1SH0wsw3dieowhp5iWFlGZqXGTRqEK';
if(isset($_POST['clickButton'])){// on verifie si le visiteur à cliquer sur le bouton
    if(isset($_POST['Identifiant']) && isset($_POST['mot_de_passe'])){

        //$_hash= password_hash($pass,PASSWORD_BCRYPT);
        $UseName = $_POST['Identifiant'];
        $Psswrd  = $_POST['mot_de_passe'];
        $valider = $_POST['clickButton'];
        $erreur = " ";    
   
    // Connectez-vous à la base de données MySQL
        $host = "localhost"; // Hôte de la base de données
        $username = "admin"; // Nom d'utilisateur de la base de données
        $password = "P@ssw0rd"; // Mot de passe de la base de données
        $database = "ecosun"; // Nom de la base de données
        
// Connexion à la base de données
        try{
            $conn = mysqli_connect($host, $username, $password, $database );
        }catch(Exception $e){
            die('Erreur : '.$e->getMessage() );
        }
       
        $bdd = new PDO("mysql:host=$host;dbname=$database",$username, $password);

// Vérifiez si l'utilisateur existe dans la base de données
        $req = mysqli_query($conn , "SELECT * FROM utilisateurs WHERE IDENTIFIANT = '$UseName' AND MOT_DE_PASSE = '$Psswrd' ");
        $row = mysqli_num_rows($req);
        if($row > 0){
            header("location: test.php");
        }else{
            $erreur = "identifiant ou mot de passe incorrecte."; 
          }
    }


} 
     
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authentification</title>
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<style>

</style>
<body>
    <div id="container">
 <!-- zone de connexion -->

<form  method="POST">
 <h1>Connexion</h1>
 
 <label><b>Nom d'utilisateur ou email</b></label>
 <div class="inputBox">
 <input type="text" placeholder="Entrer le nom d'utilisateur" name="Identifiant" required>
 <label><b>Mot de passe</b></label>
 <input type="password" placeholder="Entrer le mot de passe" name="mot_de_passe" required>
 <input type="submit" id='submit' name="clickButton" value='CONNEXION' >
 </div>
<div class="erreur">
 <?php 
 if(isset($erreur)){
  echo $erreur ;
 }
 
 ?>
 </div>
 </form>

 </div>
<!--  -->
</body>
</html>
