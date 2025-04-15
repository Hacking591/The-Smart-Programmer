<?php
$studenti = $_GET['studenti'];

$conn = new mysqli("localhost", "root", "", "komunikimi");
if ($conn->connect_error) {
  die("Lidhja dështoi: " . $conn->connect_error);
}

$sql = "SELECT nga, mesazh, data_dhenies FROM mesazhet WHERE per = ? ORDER BY data_dhenies DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $studenti);
$stmt->execute();
$result = $stmt->get_result();

$mesazhet = [];
while ($row = $result->fetch_assoc()) {
  $mesazhet[] = $row;
}

echo json_encode($mesazhet);

$stmt->close();
$conn->close();
?>
