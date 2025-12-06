<?php
$id = $_GET['id'] ?? null;
$slug = $_GET['slug'] ?? null;

// echo "<p> $slug</p>";
// under the assumption that user knows the slug
// Ive added the slug to the preview of the article in home.php
if ($slug) {
    $article = $articleController->getArticleBySlug($slug);
} else if ($id > 0) {
    $article = $articleController->getArticleById($id);
} else {
    echo "<p>Invalid article ID.</p>";
    return;
}

if (!$article) {
    echo "<p>Article not found.</p>";
    return;
}

// premium article check
$isLoggedIn = isset($_SESSION['user_id']);
$isPremium  = isset($article['is_premium']) ? (bool)$article['is_premium'] : false;
?>
<div style="max-width:800px; margin:20px auto; font-family:Arial, sans-serif;">
<h1><?= htmlspecialchars($article['a_title']) ?></h1>
<p><?= htmlspecialchars($article['a_slug']) ?></p>
<p><em><?= htmlspecialchars($article['a_teaser']) ?></em></p>       
</div>

<?php if ($isPremium && !$isLoggedIn): ?>
    <div style="max-width:800px; margin:20px auto; font-family:Arial, sans-serif;">
    <p><strong>This is premium content.</strong></p>
    <p>Login or create an account to view the full article.</p>
    <a href="index.php?page=login">Login</a> |
    <a href="index.php?page=register">Register</a>
    </div>

<?php else: ?>
    <div style="max-width:800px; margin:20px auto; font-family:Arial, sans-serif;">
    <p><?= nl2br(htmlspecialchars($article['a_content'])) ?></p>
    </div>
<?php endif; ?>
<div style="max-width:800px; margin:20px auto; font-family:Arial, sans-serif;">
<a href="index.php?page=home">Back to homepage</a>
</div>