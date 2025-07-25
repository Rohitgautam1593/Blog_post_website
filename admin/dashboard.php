<?php
require_once __DIR__ . '/../includes/header.php';
if (!isAdmin()) {
    echo '<p>Access denied.</p>';
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}
?>
<h2>Admin Dashboard</h2>
<ul>
    <li><a href="moderate_comments.php">Moderate Comments</a></li>
    <li><a href="../index.php">View Blog</a></li>
    <!-- Add more admin links as needed -->
</ul>
<?php require_once __DIR__ . '/../includes/footer.php'; ?> 