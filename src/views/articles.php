<?php

$id = (int)$_GET['id'];
$article = $articleController->getArticleById($id);

if (!$article) {
    echo "<p>Article not found.</p>";
    return;
}

?>

<h1><?= htmlspecialchars($article['a_title']) ?></h1>
<p><em><?= htmlspecialchars($article['a_teaser']) ?></em></p>
<p><?= nl2br(htmlspecialchars($article['a_content'])) ?></p>

<a href="index.php?page=home">Back to homepage</a>