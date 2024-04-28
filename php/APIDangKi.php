<?php
include './API.php'; // Đường dẫn đến tệp chứa hàm connectToDatabase và addUser


$p= new docAPI; // Thay thế bằng tên cơ sở dữ liệu của bạn
// $conn = $p->connect();

// Lấy dữ liệu từ JavaScript
$data = json_decode(file_get_contents('php://input'), true);
echo $data;

// Thêm dữ liệu vào bảng users
$p->addUser($data);
header("Location: http://localhost:8080/CNMProject/CongNgheMoi/index.php");
exit;

?>
