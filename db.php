<?php
$host = "sqlXXX.epizy.com"; // vendos hostin e databazës nga InfinityFree
$user = "epiz_12345678";    // përdoruesi yt
$pass = "password";         // fjalëkalimi
$db = "epiz_12345678_smartdb"; // databaza

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Lidhja dështoi: " . $conn->connect_error);
}
?>
