$(
    function submitRegisterForm() {
        // Lấy dữ liệu từ form
        var newUsername = document.getElementById("newUsername").value;
        var newPassword = document.getElementById("newPassword").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var fullName = document.getElementById("fullName").value;
        var dob = document.getElementById("dob").value;
        var address = document.getElementById("address").value;
    
        // Gửi dữ liệu đến tệp PHP xử lý
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "register.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText); // Hiển thị thông báo từ tệp PHP
            }
        };
        var data = "newUsername=" + newUsername + "&newPassword=" + newPassword + "&email=" + email + "&phone=" + phone + "&fullName=" + fullName + "&dob=" + dob + "&address=" + address;
        xhr.send(data);
    }
)