<div class="navbar">
    <div class="navbar-logo">
        <a href="/">
            <img src="/assets/images/abdulmalik.png" alt="<?= $_ENV['SITE_NAME']?>"/>
        </a>
    </div>
    <div class="navbar-links">
        <a href="/">Home</a>
        <a href="/experience">Experience</a>
        <a href="/contact">Contact Me</a>

        <div class="navbar-user">    
            <?php if (isset($_SESSION['user'])): ?>
                Hello <?= $_SESSION['username'] ?>,
                <a href="/logout">Logout</a>
            <?php else: ?>
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            <?php endif; ?>
        </div>
    </div>
</div>