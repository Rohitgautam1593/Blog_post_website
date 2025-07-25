<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../config/db.php';
$query = $_GET['q'] ?? '';
if ($query) {
    $stmt = $pdo->prepare('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.title LIKE ? OR posts.content LIKE ? ORDER BY created_at DESC');
    $stmt->execute(['%' . $query . '%', '%' . $query . '%']);
    $posts = $stmt->fetchAll();
    echo '<h2>Search Results for "' . htmlspecialchars($query) . '"</h2>';
} else {
    $stmt = $pdo->query('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC');
    $posts = $stmt->fetchAll();
    echo '<h2>All Posts</h2>';
}
?>
<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="post_detail.php?id=<?= $post['id'] ?>">
                <?= htmlspecialchars($post['title']) ?>
            </a>
            <small>by <?= htmlspecialchars($post['username']) ?> on <?= $post['created_at'] ?></small>
        </li>
    <?php endforeach; ?>
</ul>
<?php require_once __DIR__ . '/../includes/footer.php'; ?> 