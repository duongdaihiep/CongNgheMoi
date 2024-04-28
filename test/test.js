function submitRegisterForm() {
    // Lấy giá trị từ các trường nhập liệu
    var newUsername = document.getElementById("newUsername").value;
    var newPassword = document.getElementById("newPassword").value; 
    var confirmPassword = document.getElementById("confirmPassword").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var fullName = document.getElementById("fullName").value;
    var dob = document.getElementById("dob").value;
    var address = document.getElementById("address").value;

    // Kiểm tra mật khẩu có khớp không
    if (newPassword !== confirmPassword) {
        alert("Password and Confirm Password do not match");
        return;
    }

    // Băm mật khẩu trước khi gửi đến máy chủ
    var hashedPassword = CryptoJS.SHA256(newPassword).toString(CryptoJS.enc.Hex);

    // Tạo đối tượng dữ liệu để gửi đến PHP
    var data = {
        newUsername: newUsername,
        newPassword: hashedPassword, // Sử dụng mật khẩu đã được băm
        email: email,
        phone: phone,
        fullName: fullName,
        dob: dob,
        address: address
    };

    // Gửi dữ liệu đến tệp PHP để xử lý
    fetch('dangNhap.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        alert("Registration successful");
        // Reset form sau khi đăng ký thành công
        document.getElementById("registerForm").reset();
    })
    .catch((error) => {
        console.error('Error:', error);
        alert("An error occurred. Please try again later.");
    });
}
