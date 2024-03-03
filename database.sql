
--tạo bảng brand
CREATE TABLE brand (
    brand_id INT AUTO_INCREMENT PRIMARY KEY, -- ID tự động tăng cho mỗi nhãn hiệu
    brand_name VARCHAR(255) NOT NULL -- Tên nhãn hiệu
);
-- tạo bảng product 

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY, -- ID tự động tăng cho mỗi sản phẩm
    brand_id INT, -- Khóa ngoại liên kết với brand_id trong bảng brand
    model VARCHAR(255) NOT NULL, -- tên của sản phẩm
    price DECIMAL(10, 2) NOT NULL, -- Giá của sản phẩm với tối đa 10 chữ số, 2 sau dấu thập phân
    screen_size DECIMAL(4, 2) NOT NULL, -- Kích thước màn hình với tối đa 4 chữ số, 2 sau dấu thập phân
    ram INT NOT NULL, -- Dung lượng RAM của sản phẩm
    storage INT NOT NULL, -- Dung lượng lưu trữ của sản phẩm
    screen_technology VARCHAR(255), -- Công nghệ màn hình của sản phẩm
    screen_resolution VARCHAR(255), -- Độ phân giải màn hình của sản phẩm
    main_camera_info VARCHAR(255), -- Thông tin về camera chính của sản phẩm
    screen_size_info VARCHAR(20), -- Thông tin về kích thước màn hình của sản phẩm
    operating_system VARCHAR(50), -- Hệ điều hành của sản phẩm
    processor VARCHAR(50), -- Bộ xử lý của sản phẩm
    internal_storage VARCHAR(20), -- Dung lượng lưu trữ nội bộ của sản phẩm
    ram_info VARCHAR(20), -- Thông tin về RAM của sản phẩm
    mobile_network VARCHAR(50), -- Mạng di động hỗ trợ của sản phẩm
    sim_slots VARCHAR(50), -- Số lượng khe sim của sản phẩm
    inventory INT NOT NULL, -- Số lượng tồn kho của sản phẩm
    product_details TEXT, -- Chi tiết sản phẩm
    img text,   --lưu tên hình ảnh sản phẩm
    FOREIGN KEY (brand_id) REFERENCES brand(brand_id) -- Liên kết khóa ngoại với bảng brand
);



-- Thêm dữ liệu cho 3 sản phẩm iPhone vào bảng products


--tạo bảng user
CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    [password] VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(10) NOT NULL,
    full_name VARCHAR(255),
    date_of_birth DATE,
    gender ENUM('Male', 'Female', 'Other'),
    [address] VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP,
    is_active BOOLEAN DEFAULT 0,
    [role] ENUM('admin', 'guest', 'employee', 'store_owner') DEFAULT 'guest',
    score INT DEFAULT 0
);

--đia chỉ giao hàng mới
CREATE TABLE shipping_address (
    address_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    order_id INT,
    new_shipping_address VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (order_id) REFERENCES `order`(order_id)
);

-- tạo bảng lịch sử mua hàng
CREATE TABLE purchase_history (
    purchase_id INT AUTO_INCREMENT PRIMARY KEY, -- ID lịch sử mua hàng
    user_id INT, -- ID người dùng
    order_id INT, -- ID đơn hàng liên kết
    purchase_date DATE, -- Ngày mua hàng
    total_amount DECIMAL(10, 2) NOT NULL, -- Tổng giá trị mua hàng với tối đa 10 chữ số, 2 sau dấu thập phân
    payment_method VARCHAR(50), -- Phương thức thanh toán
    shipping_address VARCHAR(255), -- Địa chỉ giao hàng
    [status] VARCHAR(20) CHECK (TinhTrang IN ('Cho Duyệt', 'Xử Lý', 'Đã Giao', 'Đã Nhận', 'Hủy Bỏ')), -- Trạng thái đơn hàng: đã giao, đang giao, v.v.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Ngày tạo lịch sử mua hàng (mặc định là thời điểm hiện tại)
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Ngày cập nhật lịch sử mua hàng (mặc định là thời điểm hiện tại và tự động cập nhật khi có sự thay đổi)
);
--bảng order
CREATE TABLE order (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    seller_id INT,
    order_date DATE,
    total_amount DECIMAL(10, 2),
    [status] VARCHAR(20) CHECK (TinhTrang IN ('Chờ Duyệt', 'Xử Lý', 'Đã Giao', 'Đã Nhận', 'Đã Hủy')),
    payment_method VARCHAR(255),
    shipping_address VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
    FOREIGN KEY (seller_id) REFERENCES user(user_id)
);

--bảng order detail
CREATE TABLE order_detail (
    detail_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT,
    price_per_unit DECIMAL(10, 2),
    total_price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES `order`(order_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);



-- trigger
DELIMITER //

CREATE TRIGGER after_order_insert
AFTER INSERT ON `order` FOR EACH ROW
BEGIN
    INSERT INTO purchase_history (user_id, order_id, purchase_date, total_amount, payment_method, shipping_address, status)
    VALUES (
        NEW.user_id,
        NEW.order_id,
        NEW.order_date,
        NEW.total_amount,
        NEW.payment_method,
        NEW.shipping_address,
        NEW.status
    );
END //

DELIMITER ;
