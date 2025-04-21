<?php
session_start();
require_once 'user.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = new User();
$user->delete($_GET['id']);
header("Location: index.php");
exit();
?>