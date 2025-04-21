<?php
session_start();
require_once 'user.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    if ($user->create($_POST['name'], $_POST['email'], $_POST['password'])) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Failed to create user";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <div class="container">
        <h2>Create User</h2>
        <div class="form-container">
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</body>
</html>