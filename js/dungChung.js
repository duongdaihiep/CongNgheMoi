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
                        <a class=" text-white" href="./dangnhap.php">Tài Khoản
                        <i class="text-white fa-regular fa-user" style="margin-left:12px"></i></a>
                        </button>
                    </li>
                </ul>
            </div>
        </header>`
    );
    // 

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
                        <p>Email: 20030691.duong@student.iuh.edu.com</p>
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