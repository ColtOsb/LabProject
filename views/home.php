<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Student Resource Hub - Home</title>
        <link rel="stylesheet" href="../styles.css" />
    </head>
    <body>
        <div class="layout">
            <aside class="sidebar">
              <h1 class="logo">Student Resource Hub</h1>
              <nav class="main-nav">
                <div class="nav-label">Main</div>
                <a href="?page=home">Home</a>
                <a href="?page=about">About</a>
                <div class="nav-label">Resources</div>
                <a href="?page=home" class="sub-link">Textbooks</a>
                <a href="?page=home" class="sub-link">Mental Health</a>
                <a href="?page=home" class="sub-link">Tech Support</a>
                <a href="?page=home" class="sub-link">Career Services</a>
                <div class="nav-label">Account</div>
                <a href="?page=login">Login</a>
                <a href="?page=register">Register</a>
                <a href="?page=add">Add Resources</a>
              </nav>
            </aside>

            <main class="site-main">
                <section class="hero">
                    <div class="container">
                        <h2>Find Resources for College Life</h2>
                        <p>
                            Free tools, links, and support — for any university
                            student.
                        </p>
                    </div>
                </section>

                <section class="resources">
                    <div class="container">
                        <h3>Browse Resources</h3>

                        <?php
                        require_once "../controllers/ResourceController.php";
                        $resourceController = new ResourceController($pdo);
                        $resources = $resourceController->getAllResources();
                        ?>

                        <?php if (empty($resources)): ?>
                            <p class="no-resources">No resources yet. <a href="?page=add">Add the first one!</a></p>
                        <?php else: ?>
                            <div class="resource-grid">
                                <?php foreach ($resources as $resource): ?>
                                    <article class="resource-card">
                                        <h4><?= htmlspecialchars(
                                            $resource["name"],
                                        ) ?></h4>
                                        <p><?= htmlspecialchars(
                                            $resource["description"],
                                        ) ?></p>
                                        <p><strong>Category:</strong> <?= htmlspecialchars(
                                            $resource["category"],
                                        ) ?></p>
                                        <a href="<?= htmlspecialchars(
                                            $resource["url"],
                                        ) ?>" class="resource-link" target="_blank">Visit Resource</a>
                                        <small>Added: <?= date(
                                            "M j, Y",
                                            strtotime($resource["created_at"]),
                                        ) ?></small>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            </main>
        </div>

        <footer class="site-footer">
            <div class="container">
                <p>&copy; 2026 Student Resource Hub</p>
            </div>
        </footer>
    </body>
</html>
