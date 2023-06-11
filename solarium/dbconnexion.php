<?php
session_start();
$host = "localhost";
        $username = "admin";
        $password = "P@ssw0rd";
        $database = "ecosun2";

        try {
            $conn = mysqli_connect($host, $username, $password, $database);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
?>
