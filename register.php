<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);
$username = $conn->real_escape_string($data["username"]);
$password = password_hash($data["password"], PASSWORD_DEFAULT);
$role = $conn->real_escape_string($data["role"]);

$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
if ($conn->query($sql)) {
  echo "Sukses";
} else {
  echo "Gabim: " . $conn->error;
}
?>
