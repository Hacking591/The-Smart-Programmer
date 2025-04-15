<?php
$host = "localhost";
$db = "smart_programmer";
$user = "root"; // vendos emrin e përdoruesit të MySQL
$pass = ""; // vendos fjalëkalimin

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lidhja me databazën dështoi: " . $e->getMessage());
}
?>
