<?php
session_start(); // Bắt đầu phiên

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    // Nếu phiên đăng nhập không tồn tại, chuyển hướng người dùng đến trang đăng nhập
    header("Location: http://localhost:8080/CNMProject/CongNgheMoi/dangnhap.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng </title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="./assets/css/dungChung.css" />
    <link rel="stylesheet" href="./assets/css/gioHang.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="./js/dungChung.js"></script>
    <script src="./js/donHang.js"></script>
</head>
<body>
    <div class="container">
        <script>
            addHeader();
        </script>

        <div class="content">
            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending">Đơn hàng chờ xác nhận</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping">Đang giao</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="delivered-tab" data-toggle="tab" href="#delivered" role="tab" aria-controls="delivered">Đã giao</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review">Đánh giá</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <!-- Đơn hàng chờ xác nhận -->
                    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Danh sách sản phẩm</th>
                                    <th>Giá trị đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody id="pendingOrders"></tbody>
                        </table>
                    </div>
                    <!-- Đang giao -->
                    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <!-- <th>Danh sách sản phẩm</th> -->
                                    <th>Giá trị đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody id="shippingOrders"></tbody>
                        </table>
                    </div>
                    <!-- Đã giao -->
                    <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="delivered-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Danh sách sản phẩm</th>
                                    <!-- <th>Giá trị đơn hàng</th> -->
                                    <th>Ngày đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody id="deliveredOrders"></tbody>
                        </table>
                    </div>
                    <!-- Đánh giá -->
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Danh sách sản phẩm</th>
                                    <th>Giá trị đơn hàng</th>
                                    <!-- <th>Ngày đặt hàng</th> -->
                                </tr>
                            </thead>
                            <tbody id="reviewOrders"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            



        </div>
        <script>
            addFooter();
        </script>
    </div>

</body>
</html>