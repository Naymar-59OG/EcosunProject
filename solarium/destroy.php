<?php
session_start();
$_SESSION = array();
session_destroy();
header:('laction: authentification.php');
echo("<h2> vous êtes déconnectés </h2>cliquez ici ");header('location:home.php')    
?>
