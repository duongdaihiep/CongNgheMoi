<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "ten_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn SQL để lấy dữ liệu từ bảng lịch sử đơn hàng
$sql = "SELECT * FROM order_history";
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn và thêm dữ liệu vào bảng HTML
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["order_number"]."</td>
                <td>".$row["order_date"]."</td>
                <td>".$row["order_status"]."</td>
                <td>".$row["payment_status"]."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
}
$conn->close();
?>
