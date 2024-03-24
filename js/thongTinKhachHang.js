function showChangePassword() {
    var passwordFields = document.getElementById('password-fields');
    if (passwordFields.style.display === 'none') {
        passwordFields.style.display = 'block';
    } else {
        passwordFields.style.display = 'none';
    }
}


function changePassword() {
    var oldPassword = document.getElementById('old-password').value;
    var newPassword = document.getElementById('new-password').value;
    var confirmPassword = document.getElementById('confirm-password').value;

    // Thực hiện kiểm tra và đổi mật khẩu ở đây, có thể gọi hàm PHP thông qua Ajax
    // Để đơn giản, ở đây ta chỉ log ra console kết quả
    console.log("Mật khẩu cũ: " + oldPassword);
    console.log("Mật khẩu mới: " + newPassword);
    console.log("Xác nhận mật khẩu mới: " + confirmPassword);
}