<?php
session_start();

// Lidhja me bazën e të dhënave
$conn = new mysqli('localhost', 'root', '', 'smart_programmer_db');

// Kontrollo lidhjen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Merr të dhënat nga forma
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Kontrollo në databazë
$sql = "SELECT * FROM users WHERE username=? AND password=? AND role=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $role);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    if ($role === 'trainer') {
        header('Location: trainer.html');
    } else {
        echo "<script>
                localStorage.setItem('studentName', '$username');
                window.location.href = 'student.html';
              </script>";
    }
} else {
    echo "<h2>Login failed. Try again.</h2>";
    echo "<a href='login.html'>Go back</a>";
}

$conn->close();
?>
