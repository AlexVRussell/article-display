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
    require __DIR__ . "/../src/views/article.php";
} else {
    require __DIR__ . "/../src/views/home.php";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    </head>
    <body>
        <h2>Welcome to the home page</h2>
        <p>Database connected!</p>
    </body>
</html>