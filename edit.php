<?php
session_start();
require_once 'user.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = new User();
$u = $user->getById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user->update($_GET['id'], $_POST['name'], $_POST['email'])) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Failed to update user";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <div class="form-container">
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $u['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $u['email']; ?>" required>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>