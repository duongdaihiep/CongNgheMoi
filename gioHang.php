<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>

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
</head>
<body>
    <div class="container">
        <script>
            addHeader();
        </script>

        <div class="content">
            <h3 class="header">Giỏ hàng của bạn</h3>
            <div id="cartContainer">
                <!-- Nội dung giỏ hàng -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên SP</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="cartContent" class="cart-content"></tbody>
                </table>
                <div class="total-amount">
                    Tổng số tiền phải thanh toán: <span id="totalAmount">0</span>
                </div>
                <button class="modal__submit btn btn-danger" onclick="clearCart()">
                    Xóa giỏ hàng
                </button>
                <button class="modal__submit btn btn-success" onclick="checkout()">
                    Thanh toán
                </button>
            </div>
            



        </div>
        <script>
            addFooter();
        </script>
    </div>

</body>
</html>