<?php
require_once __DIR__ . '/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog App</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<header>
    <nav>
        <a href="/index.php">Home</a>
        <?php if (!isLoggedIn()): ?>
            <a href="/templates/login.php">Login</a>
            <a href="/templates/register.php">Register</a>
        <?php else: ?>
            <a href="/logout.php">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
        <?php endif; ?>
    </nav>
</header> 