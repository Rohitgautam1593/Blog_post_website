<?php
require_once __DIR__ . '/../includes/auth.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if (registerUser($username, $email, $password)) {
        $message = 'Registration successful! You can now <a href="login.php">login</a>.';
    } else {
        $message = 'Registration failed. Username or email may already exist.';
    }
}
?>
<h2>Register</h2>
<form method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>
<p><?= $message ?></p> 