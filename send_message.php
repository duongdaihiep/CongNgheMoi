<?php
// Kết nối đến cơ sở dữ liệu
include './php/API.php';
$p= new docAPI;
$conn = $p->connect();

// Lấy dữ liệu từ yêu cầu POST
$content = $_POST["content"];

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Chèn tin nhắn vào cơ sở dữ liệu
$sql = "INSERT INTO messages (sender_id, content) VALUES (1, '$content')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("status" => "success", "message" => "Tin nhắn đã được gửi thành công."));
} else {
    echo json_encode(array("status" => "error", "message" => "Có lỗi xảy ra khi gửi tin nhắn."));
}
// $conn->close();
?>
