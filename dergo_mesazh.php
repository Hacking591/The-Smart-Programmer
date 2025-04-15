<?php
$nga = $_POST['nga'];
$per = $_POST['per'];
$mesazh = $_POST['mesazh'];

$conn = new mysqli("localhost", "root", "", "komunikimi");
if ($conn->connect_error) {
  die("Lidhja dështoi: " . $conn->connect_error);
}

$sql = "INSERT INTO mesazhet (nga, per, mesazh) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nga, $per, $mesazh);

if ($stmt->execute()) {
  echo "Mesazhi u dërgua me sukses!";
} else {
  echo "Gabim: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
