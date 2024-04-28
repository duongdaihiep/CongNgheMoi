<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
     <!-- Link CSS Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/dungChung.css">
    <link rel="stylesheet" href="./assets/css/admin.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/dungChung.js"></script>

</head>
<body>
  <div class="container">
    <script>addHeader();</script>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" data-target="#users" href="#">Quản lý Người dùng</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" data-target="#products" href="#">Quản lý Sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" data-target="#revenue" href="#">Doanh thu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" data-target="#order" href="#">Đơn Hàng</a>
      </li>
    </ul>
      
    <div class="tab-content">
      <div id="users" class="tab-pane active tab-pane_content">
        <table class="table">
          <thead>
              <tr>
                  <th>STT</th>
                  <th>User ID</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th> <!-- Thêm cột hành động -->
              </tr>
          </thead>
          <tbody id="userTableBody">
              <!-- Dòng dữ liệu sẽ được thêm vào đây bằng JavaScript -->
          </tbody>
        </table>
      </div>
      <div id="products" class="tab-pane">
        <div class="tab-pane_content">
          <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá niêm yết</th>
                  <th>Giá khuyến mãi</th>
                  <th>Hình ảnh</th>
                  <th>Thông số</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td contenteditable="true">1</td>
                  <td contenteditable="true">Điện thoại A</td>
                  <td contenteditable="true">$500</td>
                  <td contenteditable="true">$450</td>
                  <td contenteditable="true"><a href="#" onclick="showProductImage('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo3Yof6Ag7VdHyVDTIs2Zntl7317VMSOToZvHp6Dq_og&s')">Xem ảnh sản phẩm</a></td>
                  <td contenteditable="true">Thông số sản phẩm A</td> 
                  <td><button class="btn btn-primary edit-btn">Sửa</button></td>
                </tr>
                <!-- Thêm các hàng khác tùy thuộc vào số lượng sản phẩm -->
              </tbody>
          </table>

        </div>
        <!-- <button class="btn btn-primary mt-3">Thêm sản phẩm</button> -->
        <button class="btn btn-success" id="add-product-btn">Thêm sản phẩm</button>
      </div>
      <div id="revenue" class="tab-pane tab-pane_content">
        <p>Nội dung doanh thu</p>
      </div>
      <div id="inventory" class="tab-pane tab-pane_content">
        <p>Nội dung kho</p>
      </div>
      <div class="tab-pane tab-pane_content" id="order" role="tabpanel" aria-labelledby="pending-tab">
        <table class="table table-striped table-hover">
          <thead>
              <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Danh sách sản phẩm</th>
                  <th>Giá trị đơn hàng</th>
                  <th>Trạng Thái</th>
                  <th>Ngày đặt hàng</th>
              </tr>
          </thead>
          <tbody id="pendingOrders">

          </tbody>
        </table>
      </div>
    </div>
  <script>addFooter();</script>

  </div>
  <div id="productOverlay" class="product-overlay">
      <img id="productImage" src="placeholder.jpg" alt="Ảnh sản phẩm">
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
  <script src="./js/admin.js"></script>

</body>
</html>
