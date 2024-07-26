<?php

$host = "db";
$port = "3306";
$dbname = "openclassrooms";
$username = "admin";
$password = "password";

try {
    $pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host . ";", $username, $password);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e);
}
