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
        <?php if ($isLoggedIn): ?>
            <a href="?page=add">Add Resource</a>
            <a href="?page=logout">Logout</a>
        <?php else: ?>
            <a href="?page=login">Login</a>
            <a href="?page=register">Register</a>
        <?php endif; ?>

        <?php if ($isAdmin): ?>
            <div class="nav-label">Admin</div>
            <a href="?page=admin">Admin Panel</a>
        <?php endif; ?>
    </nav>
</aside>
