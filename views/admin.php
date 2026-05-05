<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Resource Hub - Admin Panel</title>
    <link rel="stylesheet" href="../styles.css" />
</head>
<body>
<div class="layout">
    <?php include __DIR__ . "/partials/sidebar.php"; ?>

    <main class="site-main">
        <section class="admin-panel">
            <div class="container">
                <h2>Admin Panel</h2>

                <?php if (isset($_SESSION["error"])): ?>
                    <div class="form-message error"><?php
                    echo htmlspecialchars($_SESSION["error"]);
                    unset($_SESSION["error"]);
                    ?></div>
                <?php endif; ?>
                <?php if (isset($_SESSION["success"])): ?>
                    <div class="form-message success"><?php
                    echo htmlspecialchars($_SESSION["success"]);
                    unset($_SESSION["success"]);
                    ?></div>
                <?php endif; ?>

                <!-- ── Users ──────────────────────────────────────────────── -->
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:0.75rem;">
                    <h3 style="margin:0">Users</h3>
                    <a class="button small primary" href="?page=register">+ Add User</a>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $users = $userController->getAllUsers();
                        foreach ($users as $u):
                            $isSelf =
                                (int) $u["id"] ===
                                (int) $_SESSION["user_id"]; ?>
                            <tr>
                                <td><?= $u["id"] ?></td>
                                <td><?= htmlspecialchars($u["name"]) ?></td>
                                <td><?= htmlspecialchars($u["email"]) ?></td>
                                <td><?= date(
                                    "M j, Y",
                                    strtotime($u["create_datetime"]),
                                ) ?></td>
                                <td class="action-cell">
                                    <a class="button small secondary" href="?page=edit_user&id=<?= $u[
                                        "id"
                                    ] ?>">Edit</a>
                                    <?php if (!$isSelf): ?>
                                        <a class="button small danger"
                                           href="?page=delete_user&id=<?= $u[
                                               "id"
                                           ] ?>"
                                           onclick="return confirm('Delete user <?= htmlspecialchars(
                                               $u["name"],
                                           ) ?>?')">Delete</a>
                                    <?php else: ?>
                                        <span class="badge">You</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>

                <!-- ── Resources ─────────────────────────────────────────── -->
                <div style="display:flex; align-items:center; justify-content:space-between; margin-top:2rem; margin-bottom:0.75rem;">
                    <h3 style="margin:0">Resources</h3>
                    <a class="button small primary" href="?page=add">+ Add Resource</a>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>URL</th>
                                <th>Added</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $resources = $resourceController->getAllResources();
                        foreach ($resources as $r): ?>
                            <tr>
                                <td><?= $r["id"] ?></td>
                                <td><?= htmlspecialchars($r["name"]) ?></td>
                                <td><?= htmlspecialchars($r["category"]) ?></td>
                                <td><a href="<?= htmlspecialchars(
                                    $r["url"],
                                ) ?>" target="_blank" class="table-link">Link ↗</a></td>
                                <td><?= date(
                                    "M j, Y",
                                    strtotime($r["created_at"]),
                                ) ?></td>
                                <td class="action-cell">
                                    <a class="button small secondary" href="?page=edit_resource&id=<?= $r[
                                        "id"
                                    ] ?>">Edit</a>
                                    <a class="button small danger"
                                       href="?page=delete_resource&id=<?= $r[
                                           "id"
                                       ] ?>"
                                       onclick="return confirm('Delete resource <?= htmlspecialchars(
                                           $r["name"],
                                       ) ?>?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </main>
</div>

<footer class="site-footer">
    <div class="container"><p>&copy; 2026 Student Resource Hub</p></div>
</footer>
</body>
</html>
