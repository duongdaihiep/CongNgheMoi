<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php
    include "./API.php";
    $p= new docAPI; 
    session_start(); 

    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    // if (isset($_SESSION['username'])) {
    //     // Nếu đã đăng nhập, chuyển hướng người dùng đến trang chính
    //     header("Location: http://localhost:8080/CNMProject/CongNgheMoi/index.php");
    //     exit;
    // }

    // Kiểm tra xem có dữ liệu POST từ biểu mẫu đăng nhập hay không
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kiểm tra xem dữ liệu đã được gửi từ biểu mẫu đăng nhập
        if (isset($_POST['username']) && isset($_POST['password'])) {
            // Kiểm tra tên đăng nhập và mật khẩu trong cơ sở dữ liệu
            $username = mysql_real_escape_string($_POST['username']);
            $password = mysql_real_escape_string($_POST['password']);
            $user_id = $p->login($username,$password);
            if ($user_id) {
                // Nếu thông tin đăng nhập chính xác, tạo một phiên đăng nhập và chuyển hướng người dùng đến trang chính
                $_SESSION['user_id'] = $user_id;
                header("Location: http://localhost:8080/CNMProject/CongNgheMoi/index.php");
                exit;
            } else {
                header("Location: http://localhost:8080/CNMProject/CongNgheMoi/dangnhap.php?flag=false");
            }
        }else{
            echo "<script>alert('lỗi')</script>";
        }
    }

    ?>
</body>
</html>