<?php
session_start();
require_once "../config/db.php";
require_once "../controllers/UserController.php";
require_once "../controllers/ResourceController.php";

$userController = new UserController($pdo);
$resourceController = new ResourceController($pdo);
$page = $_GET["page"] ?? "login";

$isLoggedIn = false;
$isAdmin = false;

if (isset($_SESSION["user_id"])) {
    $currentUser = $userController->getUser($_SESSION["user_id"]);
    if ($currentUser) {
        $isLoggedIn = true;
        $_SESSION["email"] = $currentUser["email"];
        $isAdmin = $userController->isAdmin($_SESSION["user_id"]);
    } else {
        unset($_SESSION["user_id"]);
        unset($_SESSION["email"]);
        $_SESSION["error"] = "Your account was deleted. Please login again.";
    }
}

$protectedPages = ["add"];
$adminPages = [
    "admin",
    "edit_resource",
    "edit_user",
    "delete_resource",
    "delete_user",
];

if (!$isLoggedIn && in_array($page, $protectedPages)) {
    header("Location: ?page=login");
    exit();
}
if (!$isAdmin && in_array($page, $adminPages)) {
    header("Location: ?page=home");
    exit();
}

switch ($page) {
    case "login":
        if ($_POST) {
            $userController->login($_POST);
        }
        include "../views/login.php";
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

    case "about":
        include "../views/about.php";
        break;

    case "home":
        include "../views/home.php";
        break;

    case "add":
        if ($_POST) {
            $resourceController->create($_POST);
        }
        include "../views/add.php";
        break;

    // ── Admin ─────────────────────────────────────────────────────────────────
    case "admin":
        include "../views/admin.php";
        break;

    case "edit_resource":
        if ($_POST) {
            $resourceController->update($_POST);
        }
        include "../views/edit_resource.php";
        break;

    case "delete_resource":
        if (isset($_GET["id"])) {
            $resourceController->delete((int) $_GET["id"]);
        }
        header("Location: ?page=admin");
        exit();

    case "edit_user":
        if ($_POST) {
            $userController->update($_POST);
        }
        include "../views/edit_user.php";
        break;

    case "delete_user":
        if (isset($_GET["id"])) {
            // Prevent self-deletion
            if ((int) $_GET["id"] !== (int) $_SESSION["user_id"]) {
                $userController->delete((int) $_GET["id"]);
            } else {
                $_SESSION["error"] = "You cannot delete your own account.";
            }
        }
        header("Location: ?page=admin");
        exit();

    default:
        include "../views/home.php";
}
?>
