<?php
class Resource
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($name, $category, $url, $desc)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO resources (name, category, url, description, created_at)
            VALUES (?, ?, ?, ?, NOW())
        ");
        return $stmt->execute([$name, $category, $url, $desc]);
    }

    public function readAll()
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM resources ORDER BY created_at DESC",
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM resources WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $category, $url, $desc)
    {
        $stmt = $this->pdo->prepare("
            UPDATE resources SET name=?, category=?, url=?, description=? WHERE id=?
        ");
        return $stmt->execute([$name, $category, $url, $desc, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM resources WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
