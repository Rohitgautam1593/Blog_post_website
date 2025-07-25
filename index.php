<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/config/db.php';

$stmt = $pdo->query('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC');
$posts = $stmt->fetchAll();
?>
<main>
    <h1>Blog Posts</h1>
    <?php if (isLoggedIn()): ?>
        <a href="/templates/post_form.php">Create New Post</a>
    <?php endif; ?>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <a href="/templates/post_detail.php?id=<?= $post['id'] ?>">
                    <?= htmlspecialchars($post['title']) ?>
                </a>
                <small>by <?= htmlspecialchars($post['username']) ?> on <?= $post['created_at'] ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?> 