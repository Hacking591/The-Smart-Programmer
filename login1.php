<?php
// Lista e përdoruesve (simulim)
$users = [
    'student1' => ['password' => '1234', 'role' => 'student'],
    'student2' => ['password' => 'abcd', 'role' => 'student'],
    'trainer1' => ['password' => 'admin', 'role' => 'trainer']
];

// Marrja e të dhënave nga forma
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Verifikimi
if (isset($users[$username]) && $users[$username]['password'] === $password && $users[$username]['role'] === $role) {
    // Vendos emrin në sesion dhe ridrejto
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    if ($role === 'trainer') {
        header('Location: trainer.html');
    } else {
        echo \"<script>
                localStorage.setItem('studentName', '$username');
                window.location.href = 'student.html';
              </script>\";
    }
} else {
    echo \"<h2>Login failed. Try again.</h2>\";
    echo \"<a href='login.html'>Go back</a>\";
}
?>
