<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Resource Hub - Edit Resource</title>
    <link rel="stylesheet" href="./styles.css" />
</head>
<body>
<div class="layout">
    <?php include __DIR__ . "/partials/sidebar.php"; ?>

    <main class="site-main">
        <section class="add-resource">
            <div class="container">
                <?php
                $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
                $r = $resourceController->getResource($id);
                if (!$r) {
                    echo '<p>Resource not found. <a href="?page=admin">Back to admin</a></p>';
                    return;
                }
                ?>
                <h2>Edit Resource</h2>
                <p><a href="?page=admin">&larr; Back to Admin Panel</a></p>

                <?php if (isset($_SESSION["error"])): ?>
                    <div class="form-message error"><?php
                    echo htmlspecialchars($_SESSION["error"]);
                    unset($_SESSION["error"]);
                    ?></div>
                <?php endif; ?>

                <form class="add-form" method="POST" action="?page=edit_resource">
                    <input type="hidden" name="id" value="<?= $r["id"] ?>" />

                    <label for="resource_name">Resource Name
                        <input id="resource_name" type="text" name="resource_name"
                               value="<?= htmlspecialchars(
                                   $r["name"],
                               ) ?>" required />
                    </label>

                    <label for="category">Category
                        <select id="category" name="category" required>
                            <?php foreach (
                                [
                                    "Textbooks",
                                    "Mental Health",
                                    "Tech Support",
                                    "Career Services",
                                ]
                                as $cat
                            ): ?>
                                <option value="<?= $cat ?>" <?= $r[
    "category"
] === $cat
    ? "selected"
    : "" ?>><?= $cat ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>

                    <label for="url">URL
                        <input id="url" type="url" name="url"
                               value="<?= htmlspecialchars(
                                   $r["url"],
                               ) ?>" required />
                    </label>

                    <label for="description">Description
                        <textarea id="description" name="description" required><?= htmlspecialchars(
                            $r["description"],
                        ) ?></textarea>
                    </label>

                    <button type="submit" class="button primary">Save Changes</button>
                </form>
            </div>
        </section>
    </main>
</div>

<footer class="site-footer">
    <div class="container"><p>&copy; 2026 Student Resource Hub</p></div>
</footer>
</body>
</html>
