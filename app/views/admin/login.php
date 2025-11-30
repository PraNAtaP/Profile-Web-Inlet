<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/auth.css">
</head>
<body>
    <div class="container">
        <img src="<?= BASEURL; ?>/img/LOGO.png" alt="Logo">
        <form action="<?= BASEURL; ?>/admin/auth" method="POST">
            <?php if (isset($_SESSION['login_error'])) : ?>
                <div class="error-message">
                    <?= $_SESSION['login_error']; ?>
                </div>
                <?php unset($_SESSION['login_error']); ?>
            <?php endif; ?>
            <h2>Admin Login</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>