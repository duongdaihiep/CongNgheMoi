<?php
class  docAPI{
    private function connect() {
        $conn = mysql_connect("localhost", "cnmoi", "123");
        if(!$conn) {
            echo '<script type="text/javascript">
            alert("Không kêt nối được csđl!");
            </script>';
            exit();
        }
        else {
            mysql_select_db("cnmoi_db");
            mysql_query("SET NAMES UTF8");
            return $conn;
        }
    }
    private function addUser(){
        // Xử lý dữ liệu từ form đăng ký khi form được gửi đi
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $newUsername = $_POST['newUsername'];
            $newPassword = $_POST['newPassword'];
            
            // Mã hóa mật khẩu trước khi lưu vào CSDL
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
            $conn=$this->connect();
            // Thêm người dùng mới vào CSDL
            $sql_insert_user = "INSERT INTO user (username, password) VALUES ('$newUsername', '$hashed_password')";
            if ($conn->query($sql_insert_user) === TRUE) {
                echo "User registered successfully.";
            } else {
                echo "Error";
            }
        }
    }
}
?>