<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Resource Hub - Edit User</title>
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
                $u = $userController->getUser($id);
                if (!$u) {
                    echo '<p>User not found. <a href="?page=admin">Back to admin</a></p>';
                    return;
                }
                ?>
                <h2>Edit User</h2>
                <p><a href="?page=admin">&larr; Back to Admin Panel</a></p>

                <?php if (isset($_SESSION["error"])): ?>
                    <div class="form-message error"><?php
                    echo htmlspecialchars($_SESSION["error"]);
                    unset($_SESSION["error"]);
                    ?></div>
                <?php endif; ?>

                <form class="add-form" method="POST" action="?page=edit_user">
                    <input type="hidden" name="id" value="<?= $u["id"] ?>" />

                    <label for="name">Name
                        <input id="name" type="text" name="name"
                               value="<?= htmlspecialchars(
                                   $u["name"],
                               ) ?>" required />
                    </label>

                    <label for="email">Email
                        <input id="email" type="email" name="email"
                               value="<?= htmlspecialchars(
                                   $u["email"],
                               ) ?>" required />
                    </label>

                    <label for="password">New Password <span style="font-weight:normal;color:#6b7280">(leave blank to keep current)</span>
                        <input id="password" type="password" name="password" placeholder="••••••••" />
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
