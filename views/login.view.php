<div class="main-message">
    <h1> Login </h1>
    
    <div class="contect-form">
        <form method="POST">
        <?php if (isset($error)) : ?>
            <div class="error-message">
            <?= $error;  ?>
            </div>
        <?php endif; ?>
            <div class="form-group">
                <label for="username"> Username </label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required />
            </div>
            <div class="form-group">
                <label for="password"> Password </label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required />
            </div>
            <div class="form-group form-group-submit">
                <button name="submit" type="submit" class="btn btn-large"> Login </button>
            </div>            
        </form>
    </div>
</div>
