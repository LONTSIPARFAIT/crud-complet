<?php
session_start();
require_once 'user.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = new User();
$users = $user->getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl">Welcome, <?php echo $_SESSION['user_name']; ?></h2>
            <a href="logout.php" class="bg-red-500 text-white p-2 rounded">Logout</a>
        </div>
        <h3 class="text-xl mb-4">Users</h3>
        <a href="create.php" class="bg-green-500 text-white p-2 rounded mb-4 inline-block">Add User</a>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td class="border p-2"><?php echo $u['id']; ?></td>
                        <td class="border p-2"><?php echo $u['name']; ?></td>
                        <td class="border p-2"><?php echo $u['email']; ?></td>
                        <td class="border p-2">
                            <a href="edit.php?id=<?php echo $u['id']; ?>" class="text-blue-500">Edit</a>
                            <a href="delete.php?id=<?php echo $u['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>