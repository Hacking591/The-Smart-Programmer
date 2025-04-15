<?php
require 'db.php';

$action = $_POST['action'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($action === "register") {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        echo "Ekziston";
        exit;
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $hashed, $role]);
    echo "Sukses";
} elseif ($action === "login") {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo json_encode([
            "username" => $user['username'],
            "role" => $user['role']
        ]);
    } else {
        echo "Gabim";
    }
}
?>
