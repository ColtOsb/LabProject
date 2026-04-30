<?php
require_once __DIR__ . "/../config/db.php";

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($name, $email, $password)
    {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (name, email, password, create_datetime) VALUES (?, ?, ?, NOW())",
        );
        $result = $stmt->execute([$name, $email, $hashed]);
        if (!$result) {
            $error = $stmt->errorInfo()[1]; // Get MySQL error code
            throw new PDOException(
                "DB Error: " . implode(" ", $stmt->errorInfo()),
                $error,
            );
        }
        return $result;
    }

    public function readAll()
    {
        $stmt = $this->pdo->query(
            "SELECT id, name, email, create_datetime FROM users ORDER BY create_datetime DESC",
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $email, $password = "")
    {
        if (!empty($password)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare(
                "UPDATE users SET name=?, email=?, password=? WHERE id=?",
            );
            return $stmt->execute([$name, $email, $hashed, $id]);
        } else {
            $stmt = $this->pdo->prepare(
                "UPDATE users SET name=?, email=? WHERE id=?",
            );
            return $stmt->execute([$name, $email, $id]);
        }
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function verify($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user["password"]);
    }

    public function getUserId($email)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user["id"] : false;
    }
}
?>
