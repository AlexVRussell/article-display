<?php 

// load database connection
require __DIR__ . '/../src/Database/database.php';
require __DIR__ . '/../src/controllers/ArticleController.php';

// Create instance of ArticleController
$articleController = new ArticleController($db);
// $articles = $articleController->getAllArticles();

$page = $_GET['page'] ?? 'home';

if ($page === 'article') {
    // show article page
    require __DIR__ . "/../src/views/articles.php";
} else if ($page === 'home') {
    require __DIR__ . "/../src/views/home.php";
} else if ($page === 'index') {
    echo "
        <body>
            <h2>Welcome to the home page</h2>
            <p>Database connected!</p>
        </body>";
} else {
    echo "<p>Page not found</p>";
}
?>
