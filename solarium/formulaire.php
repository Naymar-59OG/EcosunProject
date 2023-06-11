
<?php
session_start();

if (isset($_SESSION['Prenom'])) {
    // Vérifier si l'utilisateur est déjà connecté (session active)
    // Rediriger vers la page d'accueil ou une autre page appropriée
    
    } else {
    // Redirige l'utilisateur vers la page d'authentification s'il n'est pas connecté
    header("location: authentification.php");
    exit();
} 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    
    // Établir une connexion à la base de données
    $server = "localhost";
    $dbusername = "admin";
    $dbpassw0rd = "P@ssw0rd";
    $dbname = "ecosun2";

    $conn = new mysqli($server, $dbusername, $dbpassw0rd, $dbname);

//on définis les variables
    $friog = 150;
    $lamp = 60;
    $lampEco = 24;
    $TV = 60;
    $ventilo = 18;
    $climat = 220;
    $ordi = 130;
    $Pompe = 220;
    $Bouilloir = 1200;
    $Robot = 700;
    $Imprime = 278;
    $phone = 20;
    $chargeur = 370;
    $chauff = 150;
    $divers = 300;

    $Mess = " ";

    $app1 = $_POST['appareil1'];
    $app2 = $_POST['appareil2'];
    $app3 = $_POST['appareil3'];
    $app4 = $_POST['appareil4'];
    $app5 = $_POST['appareil5'];
    $app6 = $_POST['appareil6'];
    $app7 = $_POST['appareil7'];
    $app8 = $_POST['appareil8'];
    $app9 = $_POST['appareil9'];
    $app10 = $_POST['appareil10'];
    $app11 = $_POST['appareil11'];
    $app12= $_POST['appareil12'];
    $app13= $_POST['appareil13'];
    $app14= $_POST['appareil14'];
    $app15= $_POST['appareil15'];

    $result1 = round($app1* $friog+ $app2*$lamp + $app3*$lampEco + $app4*$TV  + $app5*$ventilo  + $app6*$climat  + $app7*$ordi  + $app8*$Pompe  + $app9*$Bouilloir  + $app10*$Robot  + $app11*$Imprime  + $app12*$phone  + $app13*$chargeur  + $app14*$chauff  + $app15*$divers,7);


    $mess ="Vos bésoins energétiques sont estimés à ". $result1 ."Wc";

// Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

// Effectuer la requête SQL pour récupérer les valeurs de la colonne "PUISSANCE_MAX" de la table "gamme_mobil_watt"
    $sql = "SELECT PUISSANCE_MAX,MODELE FROM gamme_mobil_watt";
    $result = $conn->query($sql);

// Initialiser la valeur la plus proche supérieure
    $valeur_mobilWatt = null;
    $model_mobilWatt = null;

// Comparer le résultat de votre calcul avec les valeurs de la table
    while ($row = $result->fetch_assoc()) {
        $valeur_bd = $row["PUISSANCE_MAX"];
        $model_bd = $row["MODELE"];

    
        if ($valeur_bd > $result1 && ($valeur_mobilWatt === null || $valeur_bd < $valeur_mobilWatt)) {
            $valeur_mobilWatt = $valeur_bd;
            $model_mobilWatt  = $model_bd;
    }
}

// Afficher la valeur la plus mobilWatt supérieure si une telle valeur a été trouvée
    if ($valeur_mobilWatt !== null) {
    $mess2 = "La solution mobile watt la plus adaptée à vos bésoins est le: " .  $model_mobilWatt ." , Sa puissance est estimée à: ". $valeur_mobilWatt." Wc";
    } else {
        echo "Aucune valeur supérieure trouvée dans la base de données.";
    }

// Fermer la connexion à la base de données
    $conn->close();

}












?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="client.css">

    <title>espace client</title>
    
    <!DOCTYPE html>
<html>
<head>
  <title>Formulaire de nombre</title>
</head>
<body>

<div id="container">
    
<div class="message1">
<h2>
<?php

if(isset($mess)){
    echo $mess;

    }
    ?>
</h2>
</div>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return verifierValeurs()">
<div class="message2">
    <h2>
        <?php 
        if(isset($mess2)){
            echo $mess2;
        }
        ?>
    </h2>

</div>
<h1>CALCULER VOS BESOINS ENERGETIQUES</h1>
<h3>
  <label for="nombre">Lampe économique 60w : </label> 
  <input type="number" id="lampeco" name="appareil1" required>

  <label for="nombre">Lampe standard 90w :</label> 
  <input type="number" id="LampStd" name="appareil2" required>

  <label for="nombre">Réfrigerateur 24w :</label>
  <input type="number" id="frigo" name="appareil3" required>

  <label for="nombre">TV/LCD 60w :</label>
  <input type="number" id="tele" name="appareil4" required>

  <label for="nombre">Ventilateur 18w :</label>
  <input type="number" id="ventilo" name="appareil5" required>

  <label for="nombre">Climatisation 220w :</label> 
  <input type="number" id="clime" name="appareil6" required>

  <label for="nombre">Ordinateur 130w :</label>
  <input type="number" id="ordi" name="appareil7" required>

  <label for="nombre">Pompe à eau 220w :</label>
  <input type="number" id="pompe" name="appareil8" required>

  <label for="nombre">Bouilloir eau 120w :</label> 
  <input type="number" id="bouilloir" name="appareil9" required>

  <label for="nombre">Robot cuisine 700w :</label>
  <input type="number" id="robot" name="appareil10" required>

  <label for="nombre">Imprimante 278 :</label>
  <input type="number" id="imprime" name="appareil11" required>

  <label for="nombre">téléphone sans fils 20w :</label>
  <input type="number" id="portable" name="appareil12" required>

  <label for="nombre">Chargeur batterie 370w :</label>
  <input type="number" id="chargeur" name="appareil13" required>

  <label for="nombre">Chauffe eau 150w :</label>
  <input type="number" id="chauffe" name="appareil14" required>

  <label for="nombre">Moteur divers 300w :</label>
  <input type="number" id="divers" name="appareil15" required>

  
  <input type="submit" value="Envoyer">
  <div>
  </h3>   
  </div>
</form>
</div>
<script src="calculform.js"></script>
</body>
</html>