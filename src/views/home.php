<?php
$articles = $articleController->getAllArticles();
?>

<div style="max-width:800px; margin:20px auto; font-family:Arial, sans-serif;">
<h1>Latest News</h1>
</div>

<?php foreach ($articles as $a): ?>
    <div style="max-width:800px; margin:20px auto; font-family:Arial, sans-serif;">
    <article>
        <h2><?= htmlspecialchars($a['a_title']) ?></h2>
        <p><?= htmlspecialchars($a['a_teaser']) ?></p>
        <p><?= htmlspecialchars($a['a_slug']) ?></p>
        <!-- Next step is routing to full article -->
        <a href="index.php?page=article&id=<?= $a['a_id'] ?>">Read more</a>
    </article>
    <hr>
    </div>
<?php endforeach; ?>