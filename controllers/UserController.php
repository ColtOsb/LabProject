<?php

require_once __DIR__ . "/../models/User.php";

class UserController
{
    private $user;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->user = new User($pdo);
    }

    public function isAdmin($userId)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM admins WHERE user_id = ?");
        $stmt->execute([$userId]);
        return (bool) $stmt->fetch();
    }

    public function login($post)
    {
        if (isset($post["email"], $post["password"])) {
            if ($this->user->verify($post["email"], $post["password"])) {
                $_SESSION["user_id"] = $this->user->getUserId($post["email"]);
                $_SESSION["email"] = $post["email"];
                header("Location: ?page=home");
                exit();
            } else {
                $_SESSION["error"] = "Invalid email or password";
            }
        }
    }

    public function register($post)
    {
        if (
            isset(
                $post["name"],
                $post["email"],
                $post["password"],
                $post["confirm_password"],
            )
        ) {
            if ($post["password"] !== $post["confirm_password"]) {
                $_SESSION["error"] = "Passwords do not match";
                return;
            }

            try {
                if (
                    $this->user->create(
                        $post["name"],
                        $post["email"],
                        $post["password"],
                    )
                ) {
                    if (isset($_SESSION["user_id"])) {
                        // Admin adding a user — stay in admin panel
                        $_SESSION[
                            "success"
                        ] = "User '{$post["name"]}' created successfully.";
                        header("Location: ?page=admin");
                    } else {
                        $_SESSION["success"] =
                            "Registration successful! Please login.";
                        header("Location: ?page=login");
                    }
                    exit();
                }
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    // Duplicate entry
                    $_SESSION["error"] =
                        "Username or email already exists. Try different ones.";
                } else {
                    $_SESSION["error"] =
                        "Registration failed: " . $e->getMessage();
                }
                return;
            }
        }
    }

    public function update($post)
    {
        if (isset($post["id"], $post["name"], $post["email"])) {
            $this->user->update(
                $post["id"],
                $post["name"],
                $post["email"],
                $post["password"] ?? "",
            );
            $_SESSION["success"] = "User updated successfully";
            header("Location: ?page=home");
            exit();
        }
    }

    public function delete($id)
    {
        $this->user->delete($id);
        $_SESSION["success"] = "User deleted successfully";
        header("Location: ?page=home");
        exit();
    }

    public function getAllUsers()
    {
        return $this->user->readAll();
    }

    public function getUser($id)
    {
        return $this->user->readOne($id);
    }
}
?>
