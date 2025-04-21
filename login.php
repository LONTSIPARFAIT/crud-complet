<?php
require_once 'auth.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new Auth();
    if ($auth->login($_POST['email'], $_POST['password'])) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="text-center">Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>