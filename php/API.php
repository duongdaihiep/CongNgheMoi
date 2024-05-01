<?php
class  docAPI{ 
    private function connect() {
        $conn = mysql_connect("localhost", "duong", "123456");
        if(!$conn) {
            echo '<script type="text/javascript">
            alert("Không kêt nối được csđl!");
            </script>';
            exit();
        }
        else {
            mysql_select_db("cnmoi");
            mysql_query("SET NAMES UTF8");
            return $conn;
        }
    }


    public function getByUrl($url){
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        
        // Kiểm tra lỗi cURL và xử lý nếu có
        if(curl_errno($client)){
            // Xử lý lỗi cURL ở đây
            echo 'Lỗi cURL: ' . curl_error($client);
            return false; // hoặc trả về một giá trị mặc định khác
        }
        
        curl_close($client);
        
        // Chuyển đổi phản hồi từ JSON sang đối tượng PHP
        $results = json_decode($response);
        return $results;
    }
    

    public function addUser($data){
        $link=$this->connect();        
        $newUsername = mysql_real_escape_string($_POST['newUsername']);
        $newPassword = hash('sha256',mysql_real_escape_string($_POST['newPassword']));
        $email = mysql_real_escape_string($_POST['email']);
        $phone = mysql_real_escape_string($_POST['phone']);
        $fullName = mysql_real_escape_string($_POST['fullName']);
        $dob = mysql_real_escape_string($_POST['dob']);
        $address = mysql_real_escape_string($_POST['address']);
        header('Content-Type:application/json; charset:utf-8');

        echo " <br> user namwe= $newUsername" ;
        echo "<br> passs=  $newPassword";
        echo "<br> emmail $email"  ;
        echo "<br> phone $phone";
        echo "full name $fullName";
        echo "<br> dob $dob";
        echo "<br> addrteesss $address";
        // Chuẩn bị câu lệnh SQL để thêm dữ liệu vào bảng users
        $sql = "INSERT INTO user (username, password, email, phone_number, full_name, dob, address)
        VALUES ('$newUsername', '$newPassword', '$email', '$phone', '$fullName', '$dob', '$address')";
    
        if (!mysql_query($sql, $link)) {
            echo "khong thanh cong";
            die('Error: ' . mysql_error());
        } else {
            echo " thanh cong";
            echo json_encode(array("success" => true));
        }
    }
    //kiểm tra đăng nhập hay chưa
    public function generateAuthenticationLink() {
        if (isset($_SESSION['username'])) {
            return '<button type="button" class="btn text-white" onclick="logout()">Đăng xuất</button>';
        } else {
            return '<a class="text-white" href="./dangnhap.php">Tài Khoản</a>';
        }
    }

    public function login($username, $password) {
        $conn = $this->connect(); // Kết nối đến cơ sở dữ liệu
    
        // Bảo vệ dữ liệu trước khi sử dụng trong truy vấn SQL
        $escapedUsername = mysql_real_escape_string($username);
        $escapedPassword = mysql_real_escape_string($password);
    
        // Băm mật khẩu
        $hashedPassword = hash('sha256', $escapedPassword);
    
        // Thực hiện truy vấn để kiểm tra tên người dùng và mật khẩu
        $query = "SELECT * FROM user WHERE username = '$escapedUsername' AND password = '$hashedPassword'";
        $result = mysql_query($query, $conn);
    
        // Kiểm tra kết quả truy vấn
        if ($result && mysql_num_rows($result) > 0) {
            // Tìm thấy người dùng có tên người dùng và mật khẩu khớp
            return true;
        } else {
            // Không tìm thấy người dùng hoặc thông tin đăng nhập không khớp
            return false;
        }
    }
    public function getProducts(){
        $conn = $this->connect(); // Kết nối đến cơ sở dữ liệu
        $query = "SELECT * FROM products";
        $result = mysql_query($query,$conn); 
        if ($result && mysql_num_rows($result) > 0) {
            $data = array();
            while ($row = mysql_fetch_assoc($result)) {
                $product = array(
                    "product_id" => $row["product_id"],
                    "brand" => $row["brand"],
                    "model" => $row["model"],
                    "price" => $row["price"],
                    "screen_size" => $row["screen_size"],
                    "ram" => $row["ram"],
                    "storage" => $row["storage"],
                    "screen_technology" => $row["screen_technology"],
                    "screen_resolution" => $row["screen_resolution"],
                    "main_camera_info" => $row["main_camera_info"],
                    "screen_size_info" => $row["screen_size_info"],
                    "operating_system" => $row["operating_system"],
                    "processor" => $row["processor"],
                    "internal_storage" => $row["internal_storage"],
                    "ram_info" => $row["ram_info"],
                    "mobile_network" => $row["mobile_network"],
                    "sim_slots" => $row["sim_slots"],
                    "inventory" => $row["inventory"],
                    "product_details" => $row["product_details"],
                    "image" => $row["image"]
                );
                $data[] = $product;
            }
            header('Content-Type:application/json; charset:utf-8');
            echo json_encode($data);
            return $data;
        } else {
            return false;
        }
    }
    

    public function getOrders(){
        $conn = $this->connect(); // Kết nối đến cơ sở dữ liệu
        $query = "SELECT * FROM orders";
        $result = mysql_query($query, $conn); 
        if ($result && mysql_num_rows($result) > 0) {
            $data = array();
            while ($row = mysql_fetch_assoc($result)) {
                $order = array(
                    "order_id" => $row["order_id"],
                    "user_id" => $row["user_id"],
                    "order_date" => $row["order_date"],
                    "total_amount" => $row["total_amount"],
                    "payment_method" => $row["payment_method"],
                    "shipping_address" => $row["shipping_address"],
                    "shipping_status" => $row["shipping_status"]
                );
                $data[] = $order;
            }
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
            return $data;
        } else {
            return false;
        }
    }
    
    public function getOrderDetails(){
        $conn = $this->connect(); // Kết nối đến cơ sở dữ liệu
        $query = "SELECT * FROM order_details";
        $result = mysql_query($query, $conn); 
        if ($result && mysql_num_rows($result) > 0) {
            $data = array();
            while ($row = mysql_fetch_assoc($result)) {
                $orderDetail = array(
                    "order_detail_id" => $row["order_detail_id"],
                    "order_id" => $row["order_id"],
                    "product_id" => $row["product_id"],
                    "quantity" => $row["quantity"],
                    "price" => $row["price"]
                );
                $data[] = $orderDetail;
            }
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
            return $data;
        } else {
            return false;
        }
    }
    
    
    public function getPurchaseHistory(){
        $conn = $this->connect(); // Kết nối đến cơ sở dữ liệu
        $query = "SELECT * FROM purchase_history";
        $result = mysql_query($query, $conn); 
        if ($result && mysql_num_rows($result) > 0) {
            $data = array();
            while ($row = mysql_fetch_assoc($result)) {
                $purchaseHistory = array(
                    "purchase_id" => $row["purchase_id"],
                    "user_id" => $row["user_id"],
                    "product_id" => $row["product_id"],
                    "purchase_date" => $row["purchase_date"],
                    "quantity" => $row["quantity"],
                    "total_amount" => $row["total_amount"]
                );
                $data[] = $purchaseHistory;
            }
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
            return $data;
        } else {
            return false;
        }
    }
    
    public function getCart(){
        $conn = $this->connect(); // Kết nối đến cơ sở dữ liệu
        $query = "SELECT * FROM cart";
        $result = mysql_query($query, $conn); 
        if ($result && mysql_num_rows($result) > 0) {
            $data = array();
            while ($row = mysql_fetch_assoc($result)) {
                $cartItem = array(
                    "cart_id" => $row["cart_id"],
                    "user_id" => $row["user_id"],
                    "product_id" => $row["product_id"],
                    "quantity" => $row["quantity"]
                );
                $data[] = $cartItem;
            }
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
            return $data;
        } else {
            return false;
        }
    }
    
    
    
    
    


}
?>