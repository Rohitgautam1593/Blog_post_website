<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../config/db.php';
$post_id = $_GET['id'] ?? null;
if (!$post_id) {
    echo '<p>Post not found.</p>';
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}
// Fetch post
$stmt = $pdo->prepare('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?');
$stmt->execute([$post_id]);
$post = $stmt->fetch();
if (!$post) {
    echo '<p>Post not found.</p>';
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}
// Handle comment submission
$message = '';
if (isLoggedIn() && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'] ?? '';
    if ($content) {
        $stmt = $pdo->prepare('INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)');
        $stmt->execute([$post_id, $_SESSION['user_id'], $content]);
        $message = 'Comment submitted for moderation.';
    } else {
        $message = 'Comment cannot be empty.';
    }
}
// Fetch approved comments
$stmt = $pdo->prepare('SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE post_id = ? AND status = "approved" ORDER BY created_at ASC');
$stmt->execute([$post_id]);
$comments = $stmt->fetchAll();
?>
<article>
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    <small>by <?= htmlspecialchars($post['username']) ?> on <?= $post['created_at'] ?></small>
</article>
<section>
    <h3>Comments</h3>
    <?php foreach ($comments as $comment): ?>
        <div>
            <strong><?= htmlspecialchars($comment['username']) ?></strong>:
            <?= nl2br(htmlspecialchars($comment['content'])) ?>
            <small>(<?= $comment['created_at'] ?>)</small>
        </div>
    <?php endforeach; ?>
    <?php if (isLoggedIn()): ?>
        <form method="post">
            <textarea name="content" placeholder="Add a comment..." required></textarea><br>
            <button type="submit">Submit Comment</button>
        </form>
        <p><?= $message ?></p>
    <?php else: ?>
        <p><a href="login.php">Login</a> to comment.</p>
    <?php endif; ?>
</section>
<?php require_once __DIR__ . '/../includes/footer.php'; ?> 