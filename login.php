<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);
$username = $conn->real_escape_string($data["username"]);
$password = $data["password"];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  if (password_verify($password, $user['password'])) {
    echo json_encode($user);
  } else {
    echo "Gabim";
  }
} else {
  echo "Gabim";
}
?>
