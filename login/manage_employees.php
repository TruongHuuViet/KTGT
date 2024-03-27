<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login_process.php" method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Kiểm tra vai trò của người dùng
include "connect.php";

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username' AND role='admin'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count != 1) {
    echo "Bạn không có quyền truy cập.";
    exit();
}

// Các chức năng quản lý nhân viên sẽ được hiển thị ở đây
?>