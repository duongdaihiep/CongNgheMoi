<?php
  // Kiểm tra xem $_REQUEST['searchKey'] có tồn tại không
  $searchKey = isset($_REQUEST['searchKey']) ? $_REQUEST['searchKey'] : ''; 
  include "./php/API.php";
  $product_id=$_REQUEST['product_id'];
  $p = new docAPI;
  // echo $product_id;
  $url = "http://localhost:8080/CNMProject/CongNgheMoi/php/getProducts.php?id=" . $product_id;
  $results = $p->getByUrl($url); 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đơn Hàng - Phone Store</title>
    <!-- Link CSS Bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <!-- Link CSS tùy chỉnh -->
    <link rel="stylesheet" href="./assets/css/chiTietSanPham.css"/>
    <link rel="stylesheet" href="./assets/css/dungChung.css">
    <script src="./js/dungChung.js"></script>
  </head>
  <body>
    <?php
  // echo $url;
  // $results;

?>
    <div class="container">
      <!-- Navbar -->
      <script>addHeader()</script>
      <?php
      // $product_id=$_REQUEST['product_id'];
      if(!isset($product_id)){
        echo "<h2>không tìm thấy sản phẩm</h2>";
      } else{
        foreach ($results as $data){
          $price=$data->price;
          $formatted_price = number_format($price, 0, ',', '.');
          echo '<div class="container mt-4">
            <div class="row ">
              <!-- Thông tin sản phẩm -->
              <div class="col-md-7 img-fluid img-container">

                <img
                  class="product-image"
                  src="./assets/img/product/'.$data->image.'"
                  alt="Ảnh sản phẩm"
                />

                <!-- Thêm các thông tin khác về sản phẩm -->
              </div>
              
              <div class="col-md-5">
                <h2>'.$data->brand.'</h2>
                <div class="price"><span class="currency"> Giá Chỉ: </span>'.$formatted_price.'<span class="currency"> VNĐ</span></div>

                <div class="mt-3">
                  <button class="btn btn-primary mr-2" onclick="addToCart()">
                    Thêm vào giỏ hàng
                  </button>
                  <button class="btn btn-success" onclick="buyNow()">Mua hàng</button>
                </div>

                <table class="table table-striped details-section">
                  <h3>Thông Tin Chi Tiết</h3>
                  <tbody>
                    <tr>
                      <th scope="row">Kích Thước Màn Hình</th>
                      <td>'.$data->screen_size_info.'</td>
                    </tr>
                    <tr>
                      <th scope="row">Dung Lượng RAM</th>
                      <td>'.$data->ram.'</td>
                    </tr>
                    <tr>
                      <th scope="row">Dung Lượng Lưu Trữ</th>
                      <td>'.$data->storage.'</td>
                    </tr>
                    <tr>
                      <th scope="row">Màn Hình</th>
                      <td>'.$data->screen_size_info.', Full HD+</td>
                    </tr>
                    <tr>
                      <th scope="row">Công Nghệ Màn Hình</th>
                      <td>'.$data->screen_technology.'</td>
                    </tr>
                    <tr>
                      <th scope="row">Độ Phân Giải Màn Hình</th>
                      <td>1'.$data->screen_resolution.'</td>
                    </tr>

                    <!-- Thêm các dòng khác tùy thuộc vào thông tin bạn muốn hiển thị -->
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Chi tiết sản phẩm -->
            <div class="row mt-4">
              <div class="col-md-12">
                <h3>Chi Tiết Sản Phẩm</h3>
                <p>'.$data->product_details.'</p>
              </div>
            </div>
          </div>';
        }
      }
      ?>
      <!-- Content -->
      
    </div>

    <!-- Script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
