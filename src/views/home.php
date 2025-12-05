<?php
$articles = $articleController->getAllArticles();
?>

<h1>Latest News</h1>

<?php foreach ($articles as $a): ?>
    <article>
        <h2><?= htmlspecialchars($a['a_title']) ?></h2>
        <p><?= htmlspecialchars($a['a_teaser']) ?></p>
        <!-- Next step is routing to full article -->
        <a href="index.php?page=article&id=<?= $a['a_id'] ?>">Read more</a>
    </article>
    <hr>
<?php endforeach; ?>