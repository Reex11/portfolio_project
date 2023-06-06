<nav class="navbar">

    <a href="/" class="navbar-logo">
        <img src="assets/images/portfolio-svgrepo-com.svg" alt="<?= $_ENV['SITE_NAME']?>"/>
        <span style="display: block">Abdulmalik Portfolio</span>
    </a>
    <div class="navbar-links">
        <a href="/">Home</a>
        <a href="/experiences.php">Experience</a>
        <a href="/contact.php">Contact Me</a>
    </div>
    <div class="navbar-user">    
        <?php if (isset($_SESSION['userid'])): ?>
        <span class="center" style="font-style: italic;">
            Hello <?= $_SESSION['username'] ?>!
        </span>

            <a href="/messages.php">Messages</a>
            <a href="/logout.php">Logout</a>
        <?php else: ?>
            <a href="/login.php">Login</a>
            <a href="/register.php">Register</a>
        <?php endif; ?>
    </div>
</nav>