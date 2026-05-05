<?php

require_once __DIR__ . "/../models/Resource.php";

class ResourceController
{
    private $resource;

    public function __construct($pdo)
    {
        $this->resource = new Resource($pdo);
    }

    public function create($post)
    {
        if (
            isset(
                $post["resource_name"],
                $post["category"],
                $post["url"],
                $post["description"],
            )
        ) {
            if (
                $this->resource->create(
                    $post["resource_name"],
                    $post["category"],
                    $post["url"],
                    $post["description"],
                )
            ) {
                $_SESSION["success"] = "Resource submitted successfully!";
                header("Location: ?page=home");
                exit();
            } else {
                $_SESSION["error"] = "Failed to submit resource. Try again.";
            }
        }
    }

    public function getAllResources()
    {
        return $this->resource->readAll();
    }

    public function getResource($id)
    {
        return $this->resource->readOne($id);
    }

    public function update($post)
    {
        if (
            isset(
                $post["id"],
                $post["resource_name"],
                $post["category"],
                $post["url"],
                $post["description"],
            )
        ) {
            $this->resource->update(
                $post["id"],
                $post["resource_name"],
                $post["category"],
                $post["url"],
                $post["description"],
            );
            $_SESSION["success"] = "Resource updated successfully";
            header("Location: ?page=admin");
            exit();
        }
    }

    public function delete($id)
    {
        $this->resource->delete($id);
        $_SESSION["success"] = "Resource deleted successfully";
        header("Location: ?page=admin");
        exit();
    }
}
?>
