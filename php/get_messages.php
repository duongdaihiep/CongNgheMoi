<?php
// Kết nối đến cơ sở dữ liệu
include './API.php';
$p = new docAPI;
$conn = $p->connect();
if (!$conn) {
    die("Kết nối không thành công: " . mysql_error());
}

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM messages WHERE sender_id = $user_id OR receiver_id = $user_id ORDER BY sent_at DESC";
    $result = mysql_query($sql, $conn);

    // $messages = [];
    if (mysql_num_rows($result) > 0) {
        $messages=array();
        // Duyệt qua các hàng kết quả và lưu tin nhắn vào mảng
        while ($row = mysql_fetch_assoc($result)) {
            $messages[] = array(
                "id" => $row['id'],
                "sender_id" => $row['sender_id'],
                "receiver_id" => $row['receiver_id'],
                "content" => $row['content'],
                "sent_at" => $row['sent_at'],
                // "is_read" => $row['is_read']
            );
            header('Content-Type:application/json; charset:utf-8');
            echo json_encode($messages);
        }
    }

}

// Lấy tin nhắn từ cơ sở dữ liệu


mysql_close($conn);
?>
