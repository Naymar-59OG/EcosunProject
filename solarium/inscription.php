<?php
session_start();

 if(isset($_POST['validerBut'])){
    //on vérifie si l' utilisteur à renseigné les étapes du formulaire
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['identifiant'])  && isset($_POST['mdp']) && isset($_POST['roles'])){

        // déclaration des variables collectées depuis le formulaire

        $name = htmlspecialchars($_POST['nom']);
        $prenom =  htmlspecialchars($_POST['prenom']);
        $mesElec =  htmlspecialchars($_POST['email']);
        $motdepasse = $_POST['mdp'];
        $confirmdp = $_POST['mdpConf'];
        $identif = htmlspecialchars($_POST['identifiant']);
        $vocation = htmlspecialchars($_POST['roles']);
        $message = "  ";
        $erreur = " ";

        //on hash le mot de passe du nouveau utilisateur 

        $motdepasse_hash = password_hash($motdepasse, PASSWORD_DEFAULT);
        $Confmotdepasse_hash = password_hash($confirmdp, PASSWORD_DEFAULT);

        if ($motdepasse != $confirmdp) {
            $erreur = "Les 2 mots de passe sont différents";
            header("Location: inscription.php");
            exit();
        }else{
            $message = "Bienvenue parmis nous";
        }
        

        // déclaration des variables pour la connexion à la base de données

        $dbhost = "localhost";
        $dbuser = "admin";
        $dbpassword = "P@ssw0rd";
        $dbname = "ecosun2";
        

        // connexion à la base de données

        try {
            $bdd = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // pour afficher les erreurs SQL
            } catch (PDOException $e) {
                die('Erreur :votre erreur se situe ici ' . $e->getMessage());
                }
        try{
            $sql = ("INSERT INTO `utilisateur`( `name`, `FirstName`, `email`, `identifiant`, `passw0rd`, `confpassword` ,  `role`) VALUES(:nom, :prenom, :email, :identifiant, :mdp, :mdpConf, :roles)");
            $requete = $bdd->prepare( $sql);
            $requete->bindParam(':nom', $name, PDO::PARAM_STR);
            $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $requete->bindParam(':email', $mesElec, PDO::PARAM_STR);
            $requete->bindParam(':identifiant', $identif, PDO::PARAM_STR);
            $requete->bindParam(':mdp', $motdepasse_hash, PDO::PARAM_STR);
            $requete->bindParam(':mdpConf', $Confmotdepasse_hash, PDO::PARAM_STR);
            $requete->bindParam(':roles', $vocation, PDO::PARAM_STR);
            $requete->execute();
        }catch(PDOException $ajoute){
            die('votre erreur se situe ici: '.$ajoute->getMessage());
        }
        
        
    }

    

    
   
    
    
    
    

    
    $bdd = null;
    
}

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formatest.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="path/to/favicon.png">

 
    <title>Inscription</title>
</head>
<div>
<?php if (isset($_SESSION['Prenom'])) {
    // Vérifier si l'utilisateur est déjà connecté (session active)
    // Rediriger vers la page d'accueil ou une autre page appropriée
    
    } else {
    // Redirige l'utilisateur vers la page d'authentification s'il n'est pas connecté
    header("location: authentification.php");
    exit();
} ?>
</div>
<body> 
    <div class="container">
        
        <form id="myForm" method="POST" >
        
            <h2>Inscription</h2>
            <hr>
            <div class="inputBox">    
                <input type="text" placeholder="Nom" name="nom" id="nom" required><i class="fa-solid fa-user " style="color: red;"></i>
            </div>

            <div class="inputBox">
                <br>
                <input type="text" placeholder="Prénom" name="prenom" id="prenom" required><i class="fa-solid fa-user " style="color: rgb(238, 213, 21);"></i>
            </div> 

            
            <div class="inputBox">
                <br>
                <input id="mel" type="text" placeholder="Email" name="email" required><i class="fa-solid fa-envelope" style="color: #b86b14;"></i>
            </div>

            <div class="inputBox">
                <br>
                <input type="text" placeholder="identifiant" name="identifiant" required><i class="fa-solid fa-id-badge" style="color: #8d2070;"></i>
            </div>

            <div class="inputBox">
                <br>
                <input id="psswrd" type="Password" placeholder="Mot de pase" name="mdp" required><i class="fa-solid fa-lock" style="color: black"></i>
            </div>
            <div class="inputBox"><br> 
                <input id="confPasswrd" type="Password" placeholder="Confirmation du mot de passe" name="mdpConf" required><i class="fa-solid fa-shield" style="color: green;"></i>
            </div>
            <div class="inputBox"><br>
                <label for="role">Rôle :</label>
                <select id="role" name="roles" required>
                    <option value="">-- --</option>
                    <option value="admin">Administrateur</option>
                    <option value="user">Utilisateur</option>
                </select>
            </div>

            <div class="clickBut"><br>
                <input type="submit" id='submit' name="validerBut" value='Enregistrer' onsubmit="return validateForm()">
            </div>
            <?php
            
            if(isset($erreur)){
                echo $erreur;

            }
            if(isset($message)){
                echo $message;
            }
                
        ?>
        </form>
    </div>

    <div id="Message">
        <h3>Le mot de passe doit respecter les critères suivants:</h3>
        <p id="alpabet" class="invalide">au moins une lettre minuscule</p>
        <p id="capital" class="invalide">une lettre majuscule</p>
        <p id="nombre"  class="invalide">un chiffre</p>
        <p id="longueur" class="invalide">au moins une longueur de 8 caractères</p>
    </div>
    <script src="app.js"></script>
    <script src="https://kit.fontawesome.com/7b0ba4f40b.js" crossorigin="anonymous"></script>
</body>
</html>


