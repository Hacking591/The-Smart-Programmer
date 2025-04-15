<?php
$host = "sql210.infinityfree.com"; // vendos hostin e databazës nga InfinityFree
$user = "if0_38755413";    // përdoruesi yt
$pass = "CoKVJ4oOBj0k8";         // fjalëkalimi
$db = "if0_38755413_smartdb"; // databaza

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Lidhja dështoi: " . $conn->connect_error);
}
?>
