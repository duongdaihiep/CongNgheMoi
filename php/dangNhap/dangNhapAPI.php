<?php
class  docAPI{
    private function connect() {
        $conn = mysql_connect("localhost", "duong", "123456");
        if(!$conn) {
            echo '<script type="text/javascript">
            alert("Không kêt nối được csđl!");
            </script>';
            exit();
        }
        else {
            mysql_select_db("cnmoi");
            mysql_query("SET NAMES UTF8");
            return $conn;
        }
    }
    private function addUser(){
        function addUser($conn, $data) {
            // Lấy dữ liệu từ JavaScript
            $newUsername = mysql_real_escape_string($data['newUsername']);
            $newPassword = mysql_real_escape_string($data['newPassword']);
            $email = mysql_real_escape_string($data['email']);
            $phone = mysql_real_escape_string($data['phone']);
            $fullName = mysql_real_escape_string($data['fullName']);
            $dob = mysql_real_escape_string($data['dob']);
            $address = mysql_real_escape_string($data['address']);
        
            // Chuẩn bị câu lệnh SQL để thêm dữ liệu vào bảng users
            $sql = "INSERT INTO users (username, password, email, phone, full_name, dob, address)
            VALUES ('$newUsername', '$newPassword', '$email', '$phone', '$fullName', '$dob', '$address')";
        
            if (!mysql_query($sql, $conn)) {
                die('Error: ' . mysql_error());
            } else {
                echo json_encode(["success" => true]);
            }
        }
    }
}
?>