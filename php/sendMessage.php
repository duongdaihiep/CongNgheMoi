<?php
// Kết nối đến cơ sở dữ liệu MySQL
include './API.php';
$p = new docAPI;
$conn = $p->connect();

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy tin nhắn từ phía client
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Kiểm tra xem tin nhắn có giá trị không
if (!empty($message)) {
    // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO messages (`sender_id` ,`receiver_id` ,`content` ,) VALUES (23,1,'$message')";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {  
        // Trả về thông báo nếu chèn thành công
        echo "Tin nhắn đã được gửi thành công.";
    } else {
        // Trả về thông báo lỗi nếu có lỗi xảy ra
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    // Trả về thông báo nếu tin nhắn trống
    echo "Vui lòng nhập tin nhắn.";
}
?>
