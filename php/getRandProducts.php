<?php
    include './API.php';
    $p = new docAPI;
    // Nhận và giải mã dữ liệu JSON từ POST
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['array']) && is_array($data['array'])) {
        // echo TRUE;
        $array = $data['array'];

        // Kiểm tra độ dài của mảng để đảm bảo có đủ phần tử
        if (count($array) >= 4) {
            $thirdElement = $array[2]; // Phần tử thứ 3 (chỉ số 2)
            $fourthElement = $array[3]; // Phần tử thứ 4 (chỉ số 3)

            // Giả sử bạn muốn truy vấn sản phẩm bằng ID từ phần tử thứ 3 hoặc thứ 4
            $id = $thirdElement; // Hoặc $fourthElement, tùy vào yêu cầu của bạn
            // Gọi phương thức getProducts với ID được xác định
            $p->getProducts("SELECT * FROM products");

        } 
    }
?>