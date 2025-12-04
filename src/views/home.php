<?php
$articles = $articleController->getAllArticles();
?>

<h1>Latest News</h1>

<?php foreach ($articles as $a): ?>
    <article>
        <h2><?= htmlspecialchars($a['a_title']) ?></h2>
        <p><?= htmlspecialchars($a['a_teaser']) ?></p>
        <a href="index.php?page=article&id=<?= $a['id'] ?>">Read more</a>
    </article>
    <hr>
<?php endforeach; ?>