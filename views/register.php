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
        <?php if (isset($_SESSION["error"])): ?>
            <div class="alert alert-error"><?php
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
            ?></div>
        <?php endif; ?>

        <section class="login">
          <div class="container">
            <h2>Create an Account</h2>

            <form class="login-form" id="register-form" method="POST" action="?page=register" novalidate>

              <label for="name">Name</label>
              <input id="name" type="text" name="name" placeholder="Your name" required />
              <div class="error-msg" id="err-name">3-30 chars (letters, numbers, _)</div>

              <label for="email">Email</label>
              <input id="email" type="email" name="email" placeholder="you@example.com" required />
              <div class="error-msg" id="err-email">Valid email required</div>


              <label for="password">Password</label>
              <input id="password" type="password" name="password" placeholder="password" required />
               <div class="error-msg" id="err-password">8+ characters</div>

              <label for="confirm_password">Confirm Password</label>
              <input id="confirm_password" type="password" name="confirm_password" placeholder="Re-enter password" required />
              <div class="error-msg" id="err-confirm">Passwords must match</div>


              <button type="submit" class="button primary">Create Account</button>


            </form>
            <p class="form-link">
              Already have an account? <a href="?page=login">Login</a>
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

    <script src="./scripts/auth.js"></script>
  </body>
</html>
