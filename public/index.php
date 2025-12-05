<?php
// public/index.php

require __DIR__ . '/../src/Database/database.php';
require __DIR__ . '/../src/controllers/ArticleController.php';

// Create controller instance (ArticleController expects $db from database.php)
$articleController = new ArticleController($db);

$page = $_GET['page'] ?? 'home';

if ($page === 'article') {
    // view will call $articleController->getArticleById() or ->getArticleBySlug()
    require __DIR__ . "/../src/views/articles.php";
} elseif ($page === 'home') {
    require __DIR__ . "/../src/views/home.php";
} else {
    echo "<p>Page not found</p>";
}