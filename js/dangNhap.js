$(
    function submitLoginForm() {
        event.preventDefault();
        var formData = new FormData(form);
        fetch("../php/APIDangNhap.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        // .then(data => {
        //     if (data.success) {
        //         window.location.href = "../index.php"; // Chuyển hướng người dùng đến trang chính
        //     } else { 
        //         // Hiển thị thông báo lỗi
        //         alert(data.message);
        //     }
        // })
        .catch(error => {
            console.error("There was an error with the fetch operation:", error);
        });
    }
)