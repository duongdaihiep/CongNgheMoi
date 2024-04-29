<?php
    // Kiểm tra xem $_REQUEST['searchKey'] có tồn tại không
    $searchKey = isset($_REQUEST['searchKey']) ? $_REQUEST['searchKey'] : ''; 
    include "./php/API.php";
    $p = new docAPI;
    $results = $p->getByUrl("http://localhost:8080/CNMProject/CongNgheMoi/php/getProducts.php");
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PhoneStar</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="./assets/css/dungChung.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <!-- Thêm link đến Font Awesome CSS -->
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
         
        
      <!-- slider  -->
      <div class="slider-container mt-32">
        <div class="slider">
          <div class="slide">
            <!-- Nội dung của slide 1 -->
            <img src="./assets/img/banner/banner1.webp" alt="Banner 1" />
          </div>
          <div class="slide">
            <!-- Nội dung của slide 2 -->
            <img src="./assets/img/banner/banner2.webp" alt="Banner 2" />
          </div>
          <div class="slide">
            <!-- Nội dung của slide 3 -->
            <img src="./assets/img/banner/banner3.webp" alt="Banner 3" />
          </div>
          <div class="slide">
            <!-- Nội dung của slide 4 -->
            <img src="./assets/img/banner/banner4.webp" alt="Banner 4" />
          </div>
          <div class="slide">
            <!-- Nội dung của slide 5 -->
            <img src="./assets/img/banner/banner5.webp" alt="Banner 5" />
          </div>

          <!-- Thêm các slide khác nếu cần -->
        </div>
      </div>
      <!-- danh mục sản phẩm  -->
      <div class="card__container">
        <h2>Điện thoại nổi bật</h2>
        <a href=""></a>
        <?php
        $searchKey= $_REQUEST['searchKey'];
        if(!isset($searchKey)){
          $count = 0; // Biến đếm số lượng card đã được hiển thị trong mỗi dòng
          foreach($results as $data) {
              // Kiểm tra nếu biến đếm đạt đến 3, bắt đầu một hàng mới
              if ($count % 3 == 0) {
                echo '<div class="row">';
              }
              $price=$data->price;
              $formatted_price = number_format($price, 0, ',', '.');
              echo '
              <div class="col-md-4"><a href="">
              <div class="card">
                <img src="./assets/img/product/' . $data->image . '" alt="Phone 1" />
                <div class="card-content">
                  <div class="card-title">'.$data->brand .' '. $data->model.'</div>
                  <div class="price">'.$formatted_price.'<span class="currency"> VNĐ</span></div>
                </div>
              </div></a> 
            </div>';
              // Tăng biến đếm lên 1 sau mỗi card được hiển thị
              $count++;
              // Kiểm tra nếu đã hiển thị 3 card trong hàng, đóng hàng và bắt đầu hàng mới
              if ($count % 3 == 0) {
                  echo '</div>'; // Đóng hàng
              }
          }
        }else{
          $flag=false;
          $count = 0; // Biến đếm số lượng card đã được hiển thị trong mỗi dòng
          foreach($results as $data) {
            // Kiểm tra nếu biến đếm đạt đến 3, bắt đầu một hàng mới
            
            $price=$data->price;
            $formatted_price = number_format($price, 0, ',', '.');
            if (strpos($searchKey, $data->model) !== false || strpos($searchKey, $data->brand) !== false) {
              if ($count % 3 == 0) {
                echo '<div class="row">';
              }
              $flag=true;
              echo '<div class="col-md-4"><a href="">
              <div class="card">
              <img src="./assets/img/product/' . $data->image . '" alt="Phone 1" />
              <div class="card-content">
              <div class="card-title">'.$data->brand .' '. $data->model.'</div>
              <div class="price">'.$formatted_price.'<span class="currency"> VNĐ</span></div>
              </div>
              </div></a>
              </div>';
              
              // Tăng biến đếm lên 1 sau mỗi card được hiển thị
              $count++;
              
              // Kiểm tra nếu đã hiển thị 3 card trong hàng, đóng hàng và bắt đầu hàng mới
              if ($count % 3 == 0) {
                echo '</div>'; // Đóng hàng
              }
            }
          } 
          if ($flag == 0){
            echo '<h3>Không có dữ liệu</h3>';
          }
          // Kiểm tra nếu còn card mà chưa đủ 3 trong hàng cuối cùng, đóng hàng lại

          if ($count % 3 != 0) {
            echo '</div>'; // Đóng hàng
        }
        }
          
        ?>  
      </div>
      
      <script>
        addFooter();
      </script>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="login.js"></script> -->
    <script src="./js/index.js"></script>
  </body>
</html>
