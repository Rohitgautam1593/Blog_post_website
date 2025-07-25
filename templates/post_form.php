<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../config/db.php';
if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $user_id = $_SESSION['user_id'];
    if ($title && $content) {
        $stmt = $pdo->prepare('INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)');
        $stmt->execute([$user_id, $title, $content]);
        header('Location: /index.php');
        exit;
    } else {
        $message = 'All fields are required.';
    }
}
?>
<h2>Create New Post</h2>
<form method="post">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="content" placeholder="Content" required></textarea><br>
    <button type="submit">Publish</button>
</form>
<p><?= $message ?></p>
<?php require_once __DIR__ . '/../includes/footer.php'; ?> 