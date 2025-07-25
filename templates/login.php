<?php
require_once __DIR__ . '/../includes/auth.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (loginUser($username, $password)) {
        header('Location: ../index.php');
        exit;
    } else {
        $message = 'Login failed. Invalid credentials.';
    }
}
?>
<h2>Login</h2>
<form method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<p><?= $message ?></p> 