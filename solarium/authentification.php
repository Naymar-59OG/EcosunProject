<?php
require('dbconnexion.php');


if (isset($_POST['clickButton'])) {
    if (isset($_POST['Identifiant']) && isset($_POST['mot_de_passe'])) {
        $UseName = htmlspecialchars($_POST['Identifiant']);
        $Psswrd  = $_POST['mot_de_passe'];

        $req = mysqli_query($conn, "SELECT * FROM utilisateur WHERE (email= '$UseName' OR IDENTIFIANT= '$UseName')");
        $row = mysqli_fetch_assoc($req);

        if ($row) {
            $motdepasse_bd = $row['passw0rd'];
            if (password_verify($Psswrd, $motdepasse_bd)) {
                $_SESSION['Prenom'] = $row['FirstName']; // Sauvegarde le prénom dans la session
                
                // Vérification du rôle de l'utilisateur
                if ($row['role'] == 'admin') {
                    header("location: PageAdmin.php"); // Redirection vers la page admin
                } elseif ($row['role'] == 'user') {
                    header("location: client.php"); // Redirection vers la page client
                } else {
                    // Redirection vers une page par défaut si le rôle n'est pas défini correctement
                    header("location: default.php");
                }
                exit();
            } else {
                $erreur = "Identifiant ou mot de passe incorrect.";
            }
        } else {
            $erreur = "Identifiant ou mot de passe incorrect.";
        }
    }
}

mysqli_close($conn);
?>
    

<!DOCTYPE html>
<html lang="?>en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authentification</title>
    <link rel="stylesheet" href="authentification.css" media="screen" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<style>

</style>
<body>
    <div id="container">
 <!-- zone de connexion -->

<form   method="POST">
 <h1>Connexion</h1>
 <div class="erreur">
 <?php 
 if(isset($erreur)){
  echo $erreur ;
 }
 
 ?>
 </div></br>
 <label><b>Identifiant ou email</b></label>
 <div class="inputBox">
 <input type="text" placeholder="Entrer le nom d'utilisateur" name="Identifiant" required>
 <label><b>Mot de passe</b></label>
 <input type="password" placeholder="Entrer le mot de passe" name="mot_de_passe" required>

 <input type="submit" id='submit' name="clickButton" value='CONNEXION' >

 <p>
    <a id="lien1" href="http://localhost/solarium/PageAdmin.php" ><h3>Pas encore membre ? s'inscrire </h3></a>
 </p>
 </div>

 </form>

 </div>
<!--  -->
</body>

</html>
