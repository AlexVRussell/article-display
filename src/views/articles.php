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
?>

<h1><?= htmlspecialchars($article['a_title']) ?></h1>
<p><?= htmlspecialchars($article['a_slug']) ?></p>
<p><em><?= htmlspecialchars($article['a_teaser']) ?></em></p>
<p><?= nl2br(htmlspecialchars($article['a_content'])) ?></p>

<a href="index.php?page=home">Back to homepage</a>