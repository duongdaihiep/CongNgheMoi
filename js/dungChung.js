// file này chứa mã  nguồn dùng chung cho các phần của FE 
function addHeader(){
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
                    PhoneStar
                    <i class="fa-regular fa-star"></i>                
                </h2>
                <div class="nav-list category text-white">
                    <button type="button" class="btn text-white" data-toggle="modal" data-target="#loginModal">
                    <i class="fa-solid fa-list"></i>Danh Mục
                    </button>
                </div>

                <form class="search-form">
                    <input type="text" placeholder="Tìm kiếm...">
                    <button type="submit search-btn"><i class="fa fa-search"></i></button>
                </form>
                <ul class="nav-list">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartModal" >
                        Giỏ hàng </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-no-active text-white" data-toggle="modal" data-target="#loginModal">
                        Đơn Hàng
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#loginModal">
                        Tài Khoản<i class="text-white fa-regular fa-user" style="margin-left:12px"></i>
                        </button>
                        
                    </li>
                </ul>
            </div>
        </header>`
    )
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
