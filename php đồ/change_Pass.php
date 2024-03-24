<?php
function changePassword($oldPassword, $newPassword, $confirmPassword) {
    // Kiểm tra mật khẩu cũ
    $currentPassword = "password123"; // Mật khẩu hiện tại trong cơ sở dữ liệu
    if ($oldPassword !== $currentPassword) {
        return "Mật khẩu cũ không chính xác";
    }
    
    // Kiểm tra xác nhận mật khẩu mới
    if ($newPassword !== $confirmPassword) {
        return "Mật khẩu mới không khớp";
    }
    
    // Tạo mật khẩu mới và lưu vào cơ sở dữ liệu
    // Đây là nơi để thực hiện lưu mật khẩu mới vào cơ sở dữ liệu
    
    return "Mật khẩu đã được thay đổi thành công";
}

// Sử dụng hàm changePassword
$oldPassword = $_POST['old_password']; // Lấy mật khẩu cũ từ form
$newPassword = $_POST['new_password']; // Lấy mật khẩu mới từ form
$confirmPassword = $_POST['confirm_password']; // Lấy xác nhận mật khẩu mới từ form

$result = changePassword($oldPassword, $newPassword, $confirmPassword);
echo $result;
?>
