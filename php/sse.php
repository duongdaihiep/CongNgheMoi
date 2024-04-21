<?php
// Kết nối đến cơ sở dữ liệu MySQL
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("cnmoi", $conn);

// Kiểm tra kết nối
if (!$conn) {
    die("ERROR: Không thể kết nối. " . mysql_error());
}

// Nhận dữ liệu tin nhắn từ request
$data = json_decode(file_get_contents("php://input"), true);
$message = $data['content'];

// Thêm tin nhắn vào cơ sở dữ liệu
$query = "INSERT INTO messenger (content, status) VALUES ('$message', 'send')";
if (mysql_query($query)) {
    echo json_encode(array("message" => "Tin nhắn đã được gửi."));
} else {
    echo json_encode(array("error" => "ERROR: Không thể gửi tin nhắn. " . mysql_error()));
}

// Đóng kết nối
mysql_close($conn);
?>
