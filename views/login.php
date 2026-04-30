<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Student Resource Hub - Login</title>
        <link rel="stylesheet" href="./styles.css" />
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
                <section class="login">
                    <div class="container">
                        <h2>Login</h2>
                        <?php if (isset($_SESSION["error"])): ?>
                            <div class="alert alert-error"><?php
                            echo $_SESSION["error"];
                            unset($_SESSION["error"]);
                            ?></div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["success"])): ?>
                            <div class="alert alert-success"><?php
                            echo $_SESSION["success"];
                            unset($_SESSION["success"]);
                            ?></div>
                        <?php endif; ?>

                        <form
                            class="login-form"
                            id="login-form"
                            action="?page=login"
                            method="POST"
                            novalidate
                        >
                            <div
                                id="form-message"
                                class="form-message"
                                role="alert"
                            ></div>

                            <label for="email"> Email </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                placeholder="you@example.com"
                                required
                            />

                            <label for="password">Password</label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                required
                            />



                            <button type="submit" class="button primary">
                                Login
                            </button>
                        </form>
                        <p class="form-link">
                            Don't have an account?
                            <a href="?page=register">Register</a>
                        </p>
                    </div>
                </section>
            </main>
        </div>

        <footer class="site-footer">
            <div class="container">
                <p>&copy; 2026 Student Resource Hub</p>
            </div>
        </footer>

        <script src="auth.js"></script>
    </body>
</html>
