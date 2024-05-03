<?php
// Kết nối đến cơ sở dữ liệu
include './php/API.php';
$p= new docAPI;
$conn = $p->connect();
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy tin nhắn từ cơ sở dữ liệu
$sql = "SELECT * FROM messages ORDER BY sent_at DESC";
$result = mysql_query($sql,$conn);
if ($result->num_rows > 0) {
    // Duyệt qua các hàng kết quả và hiển thị tin nhắn
    while($row = $result->fetch_assoc()) {
        echo "<div><strong>" . $row["sender_id"] . ":</strong> " . $row["content"] . "</div>";
    }
} else {
    echo "Chưa có tin nhắn.";
}

?>
