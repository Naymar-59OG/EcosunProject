<?php
require('dbconnexion.php');
// Requête pour récupérer les données des capteurs
$sql = "SELECT temperature, weight, humidity FROM sensor_data ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $temperature = $row["temperature"];
    $weight = $row["weight"];
    $humidity = $row["humidity"];
} else {
    $temperature = "--";
    $weight = "--";
    $humidity = "--";
}

$conn->close();

// Convertir les données en format JSON
$sensorData = array(
    "temperature" => $temperature,
    "weight" => $weight,
    "humidity" => $humidity
);
$jsonResponse = json_encode($sensorData);

// Envoyer les données JSON en réponse
header('Content-Type: application/json');
echo $jsonResponse;
?>
