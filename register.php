<?php
require_once 'auth.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new Auth();
    if ($auth->register($_POST['name'], $_POST['email'], $_POST['password'])) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Registration failed";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="./register.php">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl mb-4">Register</h2>
        <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="mt-1 p-2 w-full border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="mt-1 p-2 w-full border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="mt-1 p-2 w-full border rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Register</button>
        </form>
        <p class="mt-4">Already have an account? <a href="login.php" class="text-blue-500">Login</a></p>
    </div>
</body>
</html>