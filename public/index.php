<?php
session_start();

require __DIR__ . '/../src/Database/database.php';
require __DIR__ . '/../src/controllers/ArticleController.php';
require __DIR__ . '/../src/controllers/UserController.php';

$articleController = new ArticleController($db);
$userController = new UserController($db);

$page = $_GET['page'] ?? 'home';

// simple nav bar
if (isset($_SESSION['user_id'])) {
    // Logged in
    echo "Welcome, " . htmlspecialchars($_SESSION['email']) . " | ";
    echo "<a href='index.php?page=logout'>Logout</a>";
} else {
    // Logged out
    echo "<a href='index.php?page=login'>Login</a> | ";
    echo "<a href='index.php?page=register'>Register</a>";
}

echo " | <a href='index.php?page=home'>Home</a>";
echo "</nav><hr>";

// handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($page === 'login') {
        $result = $userController->login($_POST['email'], $_POST['password']);

        if ($result['success']) {
            header("Location: index.php?page=home");
            exit;
        }
        $error = $result['message'];
    }

    if ($page === 'register') {
        $result = $userController->register($_POST['email'], $_POST['password']);

        if ($result['success']) {
            header("Location: index.php?page=login&registered=1");
            exit;
        }
        $error = $result['message'];
    }
}

// routing to views
if ($page === 'login') {
    require __DIR__ . "/../src/views/login.php";
} 
elseif ($page === 'register') {
    require __DIR__ . "/../src/views/register.php";
}
elseif ($page === 'logout') {
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
    header("Location: index.php?page=home");
    exit;   
}
elseif ($page === 'article') {
    require __DIR__ . "/../src/views/articles.php";
}
else { 
    require __DIR__ . "/../src/views/home.php";
}
