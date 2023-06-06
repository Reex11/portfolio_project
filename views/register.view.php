<div class="main-message">
    <h1> Register </h1>
    
    <div class="contect-form">
        <form method="POST" name="register" onsubmit="return validateForm()">
        <?php if (isset($error)) : ?>
            <div class="error-message">
            <?= $error;  ?>
            </div>
        <?php elseif(isset($errors)): ?>
            <div class="error-message">
            <?php foreach($errors as $field => $error) : ?>
                <p> <b><?= $field ?>:</b> <?= $error; ?> </p>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>
            <div class="form-group">
                <label for="username"> Username </label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required />
            </div>
            <div class="form-group">
                <label for="name"> Email </label>
                <input type="text" name="email" id="email" placeholder="Enter your email" required />
            </div>
            <div class="form-group">
                <label for="password"> Password </label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required />
            </div>
            <div class="form-group form-group-submit">
                <button name="submit" type="submit" class="btn btn-large"> Register </button>
            </div>            
        </form>
    </div>
</div>

<script src="assets/form-validation.js"></script>