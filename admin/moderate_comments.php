<?php
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../config/db.php';
if (!isAdmin()) {
    echo '<p>Access denied.</p>';
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}
// Approve or delete comment
if (isset($_GET['approve'])) {
    $stmt = $pdo->prepare('UPDATE comments SET status = "approved" WHERE id = ?');
    $stmt->execute([$_GET['approve']]);
}
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare('DELETE FROM comments WHERE id = ?');
    $stmt->execute([$_GET['delete']]);
}
// Fetch pending comments
$stmt = $pdo->query('SELECT comments.*, users.username, posts.title FROM comments JOIN users ON comments.user_id = users.id JOIN posts ON comments.post_id = posts.id WHERE comments.status = "pending" ORDER BY comments.created_at ASC');
$comments = $stmt->fetchAll();
?>
<h2>Moderate Comments</h2>
<table border="1">
    <tr><th>Post</th><th>User</th><th>Comment</th><th>Actions</th></tr>
    <?php foreach ($comments as $comment): ?>
        <tr>
            <td><?= htmlspecialchars($comment['title']) ?></td>
            <td><?= htmlspecialchars($comment['username']) ?></td>
            <td><?= nl2br(htmlspecialchars($comment['content'])) ?></td>
            <td>
                <a href="?approve=<?= $comment['id'] ?>">Approve</a> |
                <a href="?delete=<?= $comment['id'] ?>" onclick="return confirm('Delete this comment?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/../includes/footer.php'; ?> 