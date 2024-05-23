<?php
session_start();

// Kiểm tra xem có phiên đăng nhập không
if(isset($_SESSION['user']) && $_SESSION['user'] === true) {
    $isLogged = true;
} else {
    $isLogged = false;
}
?>



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
    <script src="./js/index.js"></script>
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
              <div class="col-md-4"><a href="http://localhost:8080/CNMProject/CongNgheMoi/chiTietSanPham.php?product_id='.$data->product_id.'">
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
            // echo gettype($data->brand);
            // echo gettype($searchKey);
            // echo ($searchKey .'<br>'); 
            // echo ($data->brand .'<br>');
            // Kiểm tra nếu biến đếm đạt đến 3, bắt đầu một hàng mới
              $price=$data->price;
            $formatted_price = number_format($price, 0, ',', '.');
            if (strpos( strtoupper($data->model),strtoupper($searchKey)) !==false || strpos(strtoupper($data->brand),strtoupper($searchKey))!== false) {
            // if($data->model.indexOf($searchKey)!==-1){}
              if ($count % 3 == 0) {
                echo '<div class="row">';
              }
              $flag=true;
              echo '<div class="col-md-4"><a href="http://localhost:8080/CNMProject/CongNgheMoi/chiTietSanPham.php?product_id='.$data->product_id.'">
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

      <!-- icon chatbox -->
      <div class="chat">
        <button class="chat-icon"><i class="fa fa-comments" aria-hidden="true"></i></button>
      </div>
      <!-- Hộp thoại chat -->
      <div class="chat-container">
        <div class="chat-header">
          ChatBot
          <button class="btn-admin" onclick="toggleElements()" title="chat với nhân viên tư vấn">
          <i class="fa fa-user" aria-hidden="true"></i>
          </button>
          <button class="close" onclick="closeChatbox()">
              <i class="fa fa-times" aria-hidden="true"></i>
          </button>
        </div>
        <div class="chatbox" id="chatbox">
        <div class="message received"> Xin chào!</div>
        <div class="message received">Tôi có thể tư vấn cho bạn được không?</div>
            <!-- Nơi hiển thị tin nhắn -->
        </div>
        <div class="input-group" id ="inputGroup">
          <input type="text" class="form-control" id="messageInput" placeholder="Nhập tin nhắn..." />
          <div class="input-group-append">
              <button class="btn btn-primary" type="button" onclick="sendMessage()">Gửi</button>
          </div>
        </div>
        <div class="question-group" id="questionGroup">
          <button class="question" id="question" onclick="botSendMessage2()"  >Bắt đầu tư vấn</button>
        </div>
      </div>

        <script src="https://cdn.socket.io/4.1.3/socket.io.min.js"></script>
          <script>
            const socket = io('http://localhost:8080');

            socket.on('message', (msg) => {
                displayMessage(msg, 'received');
            });

            function toggleChat() {
                const chatContainer = document.getElementById('chatContainer');
                chatContainer.classList.toggle('active');
            }

            function closeChatbox() {
                const chatContainer = document.getElementById('chatContainer');
                chatContainer.classList.remove('active');
            }

            function sendMessage() {
                const messageInput = document.getElementById('messageInput');
                const message = messageInput.value.trim();
                if (message === '') return;

                displayMessage(message, 'sent');
                socket.emit('message', message);
                messageInput.value = '';
            }

            function displayMessage(message, sender) {
                const chatbox = document.getElementById('chatbox');
                const messageElement = document.createElement('div');
                messageElement.classList.add('message', sender);
                messageElement.textContent = message;
                chatbox.appendChild(messageElement);
                // Tự động cuộn xuống cuối chatbox khi có tin nhắn mới
                chatbox.scrollTop = chatbox.scrollHeight;
            }
        </script>
        <!-- footer  -->
        <script>
          addFooter();
        </script>
      <!-- </div> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="login.js"></script> -->
    <script src="./js/chatbox.js"></script>
  </body>
</html>
