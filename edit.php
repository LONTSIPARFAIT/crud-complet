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
    <link rel="stylesheet" href="./edit.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl mb-4">Edit User</h2>
        <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="<?php echo $u['name']; ?>" class="mt-1 p-2 w-full border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="<?php echo $u['email']; ?>" class="mt-1 p-2 w-full border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
        </form>
    </div>
</body>
</html>