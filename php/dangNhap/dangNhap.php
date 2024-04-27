<?php
include './dangNhapAPI.php'; // Đường dẫn đến tệp chứa hàm connectToDatabase và addUser

// Thực hiện kết nối đến cơ sở dữ liệu

$dbname = "myDB"; // Thay thế bằng tên cơ sở dữ liệu của bạn
$conn = connect();

// Lấy dữ liệu từ JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Thêm dữ liệu vào bảng users
addUser($conn, $data);

// Đóng kết nối
mysql_close($conn);
?>
