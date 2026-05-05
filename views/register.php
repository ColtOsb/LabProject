<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Resource Hub - Register</title>
    <link rel="stylesheet" href="./styles.css" />
  </head>
  <body>
    <div class="layout">
        <?php include __DIR__ . "/partials/sidebar.php"; ?>
      <main class="site-main">
        <section class="login">
          <div class="container">
            <h2>Create an Account</h2>

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

            <form class="login-form" id="register-form" method="POST" action="?page=register" novalidate>
              <div id="form-message" class="form-message" role="alert"></div>

              <label for="name">Name</label>
              <input id="name" type="text" name="name" placeholder="Your name" required />

              <label for="email">Email</label>
              <input id="email" type="email" name="email" placeholder="you@example.com" required />

              <label for="password">Password</label>
              <input id="password" type="password" name="password" placeholder="8+ characters" required />

              <label for="confirm_password">Confirm Password</label>
              <input id="confirm_password" type="password" name="confirm_password" placeholder="Re-enter password" required />

              <button type="submit" class="button primary">Create Account</button>
            </form>

            <?php if (!isset($_SESSION["user_id"])): ?>
            <p class="form-link">
              Already have an account? <a href="?page=login">Login</a>
            </p>
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
    <script src="./scripts/auth.js"></script>
  </body>
</html>
