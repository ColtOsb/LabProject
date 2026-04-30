<?php
session_start();
require_once "../config/db.php";
require_once "../controllers/UserController.php";
require_once "../controllers/ResourceController.php";

$userController = new UserController($pdo);
$resourceController = new ResourceController($pdo);
$page = $_GET["page"] ?? "login";

$isLoggedIn = false;
if (isset($_SESSION["user_id"])) {
    $currentUser = $userController->getUser($_SESSION["user_id"]);
    if ($currentUser) {
        $isLoggedIn = true;
        $_SESSION["email"] = $currentUser["email"];
    } else {
        unset($_SESSION["user_id"]);
        unset($_SESSION["email"]);
        $_SESSION["error"] = "Your account was deleted. Please login again.";
    }
}

$protectedPages = ["add"];
if (!$isLoggedIn && in_array($page, $protectedPages)) {
    header("Location: ?page=login");
    exit();
}

switch ($page) {
    case "login":
        if ($_POST) {
            $userController->login($_POST);
        }
        include "../views/login.php";
        break;
    case "about":
        include "../views/about.php";
        break;
    case "register":
        if ($_POST) {
            $userController->register($_POST);
        }
        include "../views/register.php";
        break;
    case "logout":
        session_destroy();
        header("Location: ?page=login");
        exit();
    case "home":
        include "../views/home.php";
        break;
    case "add":
        if ($_POST) {
            $resourceController->create($_POST);
        }
        include "../views/add.php";
        break;
    default:
        include "../views/home.php";
}
?>
