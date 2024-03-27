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