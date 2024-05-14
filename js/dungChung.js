// file này chứa mã  nguồn dùng chung cho các phần của FE 
function addHeader() {
    document.write(
        `<header>
            <div class="top-nav">
                <ul class="nav-list">
                    <li class="nav-item"><a class="custom-link" type="button">Tuyển Dụng</a></li>
                    <li class="nav-item"><a class="custom-link" type="button">Hệ Thống Siêu Thị</a></li>
                    <li class="nav-item"><a class="custom-link" type="button">Trung Tâm Bảo Hành</a></li>
                </ul>
            </div>
            <div class="nav">
                <h2 class="header-logo text-white ">
                    <a class="header-logo text-white " href="./index.php">PhoneStar</a>
                    <i class="fa-regular fa-star"></i>                
                </h2>
                <div class="nav-list category text-white">
                    <button type="button" class="btn text-white" data-toggle="modal" data-target="#loginModal">
                    <i class="fa-solid fa-list"></i>Danh Mục
                    </button>
                </div>

                <form class="search-form">
                    <input type="text" id="searchInput" placeholder="Tìm kiếm...">
                    <button type="submit" id="searchBtn" class="search-btn"><i class="fa fa-search"></i></button>
                </form>
                <ul class="nav-list">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" >
                        <a class=" text-white" href="./gioHang.php">Giỏ hàng</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-no-active text-white" >
                        <a class=" text-white" href="./donHang.php">Đơn Hàng</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button id="accountBtn" type="button" class="btn text-white">
                        <a class=" text-white" href="./dangnhap.php">Tài Khoản</a>
                        <i class="text-white fa-regular fa-user" style="margin-left:12px"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </header>`
    );

    // Xử lý sự kiện khi click vào nút đăng xuất
    // document.getElementById('accountBtn').addEventListener('click', function() {
    //     if(isLogged) {
    //         // Nếu đã đăng nhập, chuyển hướng đến trang logout.php để xóa phiên
    //         window.location.href = '../php/APIDangXuat.php';
    //     }
    // });
    
}



//  Footer 
        
function addFooter(){
    document.write(
        `<footer class="footer mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Thông Tin Liên Hệ</h4>
                        <p>Địa chỉ: 12 Nguyễn Văn Bảo, Gò Vấp, Tp.HCM</p>
                        <p>Email: 20029511.duong@student.iuh.edu.com</p>
                        <p>Điện thoại: 0869217942</p>
                    </div>
                    <div class="col-md-4">
                        <h4>Danh Mục</h4>
                        <ul>
                            <li class="mt-16"><a href="#">Điện thoại di động</a></li>
                            <li class="mt-16"><a href="#">Phụ kiện</a></li>
                            <!-- Thêm các mục danh mục khác -->
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Theo Dõi Chúng Tôi</h4>
                        <ul>
                            <li class="mt-16"><a href=""><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                            <li class="mt-16"><a href=""><i class="fa-solid fa-z"></i> Zalo</a> </li>
                        </ul>
                        <!-- Thêm các biểu tượng mạng xã hội (ví dụ: Facebook, Instagram, Twitter) -->
                    </div>
                </div>
            </div>
        </footer>`
    )
}
// hàm hiện chatbox
var chatIcon = document.querySelector(".fa-comments");
    chatIcon.addEventListener("click", function() {
        // Ẩn biểu tượng chat
        chatIcon.style.display = "none";
        // Hiện hộp thoại tin nhắn
        var chatContainer = document.querySelector(".chat-container");
        chatContainer.style.display = "block";
    });




// Hàm ẩn chatbox
function closeChatbox() {
    var chatContainer = document.querySelector(".chat-container");
    chatContainer.style.display = "none";
    // Hiển thị lại biểu tượng chat
    var chatIcon = document.querySelector(".fa-comments");
    chatIcon.style.display = "block";
}

// Hàm để gửi tin nhắn bằng AJAX
function sendMessage() {
    var messageInput = document.getElementById("messageInput").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Xử lý phản hồi từ máy chủ
            var response = JSON.parse(xhr.responseText);
            if (response.status === "success") {
                // Nếu tin nhắn được gửi thành công, cập nhật lại chatbox
                updateChatbox();
            } else {
                // Xử lý lỗi nếu có
                console.error("Lỗi khi gửi tin nhắn: " + response.message);
            }
        }
    };
    xhr.open("POST", "../send_message.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("content=" + messageInput);
}

// Hàm để cập nhật lại chatbox
function updateChatbox() {
    var chatbox = document.getElementById("chatbox");
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Xử lý phản hồi từ máy chủ
            chatbox.innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "../get_messages.php", true);
    xhr.send();
}

// Cập nhật chatbox mỗi 2 giây
setInterval(updateChatbox, 2000);
