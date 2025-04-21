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
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Welcome, <?php echo $_SESSION['user_name']; ?></h2>
            <a href="logout.php" class="logout">Logout</a>
        </div>
        <h3>Users</h3>
        <a href="create.php" class="add-user">Add User</a>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?php echo $u['id']; ?></td>
                            <td><?php echo $u['name']; ?></td>
                            <td><?php echo $u['email']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $u['id']; ?>">Edit</a>
                                <a href="delete.php?id=<?php echo $u['id']; ?>" class="delete" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>