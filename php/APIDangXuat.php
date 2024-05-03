<?php
// Bắt đầu phiên
session_start();

// Xóa tất cả các biến phiên
$_SESSION = array();

// Hủy phiên
session_destroy();

// Chuyển hướng đến trang chính hoặc trang đăng nhập
header("Location: http://localhost:8080/CNMProject/CongNgheMoi/index.php");
exit;
?>
