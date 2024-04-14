-- tạo bảng product 
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    screen_size DECIMAL(4, 2) NOT NULL,
    ram INT NOT NULL,
    storage INT NOT NULL,
    screen_technology VARCHAR(255),
    screen_resolution VARCHAR(255),
    main_camera_info VARCHAR(255),
    screen_size_info VARCHAR(20),
    operating_system VARCHAR(50),
    processor VARCHAR(50),
    internal_storage VARCHAR(20),
    ram_info VARCHAR(20),
    mobile_network VARCHAR(50),
    sim_slots VARCHAR(50),
    inventory INT;
    product_details TEXT
);


-- Thêm dữ liệu cho 3 sản phẩm iPhone vào bảng products
INSERT INTO products (brand, model, price, screen_size, ram, storage, screen_technology, screen_resolution, main_camera_info, screen_size_info, operating_system, processor, internal_storage, ram_info, mobile_network, sim_slots, inventory, product_details)
VALUES
    ('Apple', 'iPhone 13 Pro', 29990000, 6.1, 6, 128, 'Super Retina XDR OLED', '1170x2532 pixels', '12 MP + 12 MP + 12 MP', '6.1 inches', 'iOS 15', 'A15 Bionic', '128 GB', '6 GB', '5G', 'Single SIM', 50, 'High-end Pro model'),
    ('Apple', 'iPhone 13 Mini', 20990000, 5.4, 4, 128, 'Super Retina XDR OLED', '1080x2340 pixels', '12 MP + 12 MP', '5.4 inches', 'iOS 15', 'A15 Bionic', '128 GB', '4 GB', '5G', 'Dual SIM', 30, 'Compact and powerful'),
    ('Apple', 'iPhone SE', 10990000, 4.7, 3, 64, 'Retina IPS LCD', '750x1334 pixels', '12 MP', '4.7 inches', 'iOS 15', 'A13 Bionic', '64 GB', '3 GB', '4G', 'Single SIM', 20, 'Budget-friendly option'),
-- Thêm dữ liệu cho 3 sản phẩm Samsung vào bảng products
    ('Samsung', 'Galaxy S21', 17990000, 6.2, 8, 128, 'Dynamic AMOLED 2X', '1080x2400 pixels', '12 MP + 12 MP + 64 MP', '6.2 inches', 'Android 11', 'Exynos 2100', '128 GB', '8 GB', '5G', 'Dual SIM', 40, 'High-end flagship from Samsung'),
    ('Samsung', 'Galaxy Note 20', 22990000, 6.7, 8, 256, 'Dynamic AMOLED 2X', '1080x2400 pixels', '12 MP + 64 MP + 12 MP', '6.7 inches', 'Android 10', 'Exynos 990', '256 GB', '8 GB', '5G', 'Hybrid SIM', 25, 'Powerful flagship with S Pen'),
    ('Samsung', 'Galaxy A52', 8490000, 6.5, 6, 128, 'Super AMOLED', '1080x2400 pixels', '64 MP + 12 MP + 5 MP + 5 MP', '6.5 inches', 'Android 11', 'Snapdragon 720G', '128 GB', '6 GB', '4G', 'Dual SIM', 35, 'Mid-range phone with versatile camera'),
-- Thêm dữ liệu cho 3 sản phẩm Oppo vào bảng products
    ('Oppo', 'Find X3 Pro', 24990000, 6.7, 12, 256, 'AMOLED', '1440x3216 pixels', '50 MP + 50 MP + 13 MP + 3 MP', '6.7 inches', 'Android 11', 'Snapdragon 888', '256 GB', '12 GB', '5G', 'Dual SIM', 30, 'Flagship with versatile camera system'),
    ('Oppo', 'Reno6 Pro', 14990000, 6.55, 12, 256, 'AMOLED', '1080x2400 pixels', '64 MP + 8 MP + 2 MP + 2 MP', '6.55 inches', 'Android 11', 'Dimensity 1200', '256 GB', '12 GB', '5G', 'Dual SIM', 20, 'Premium mid-range phone with 64 MP camera'),
    ('Oppo', 'A94', 6990000, 6.43, 8, 128, 'AMOLED', '1080x2400 pixels', '48 MP + 8 MP + 2 MP + 2 MP', '6.43 inches', 'Android 11', 'Mediatek Helio P95', '128 GB', '8 GB', '4G', 'Dual SIM', 25, 'Affordable mid-range option with AMOLED display'),
-- Thêm dữ liệu cho 3 sản phẩm Xiaomi vào bảng products
('Xiaomi', 'Mi 11 Ultra', 25990000, 6.81, 12, 256, 'AMOLED', '1440x3200 pixels', '50 MP + 48 MP + 48 MP + 20 MP', '6.81 inches', 'Android 11', 'Snapdragon 888', '256 GB', '12 GB', '5G', 'Dual SIM', 30, 'Ultra flagship with secondary display'),
    ('Xiaomi', 'Redmi Note 10', 4490000, 6.43, 4, 64, 'Super AMOLED', '1080x2400 pixels', '48 MP + 8 MP + 2 MP + 2 MP', '6.43 inches', 'Android 10', 'Snapdragon 678', '64 GB', '4 GB', '4G', 'Dual SIM', 25, 'Mid-range phone with AMOLED display'),
    ('Xiaomi', 'POCO X3 Pro', 6990000, 6.67, 6, 128, 'IPS LCD', '1080x2400 pixels', '48 MP + 8 MP + 2 MP + 2 MP', '6.67 inches', 'Android 11', 'Snapdragon 860', '128 GB', '6 GB', '4G', 'Dual SIM', 20, 'Performance-focused mid-range option'),
-- Thêm dữ liệu cho 3 sản phẩm Realme vào bảng products
    ('Realme', 'GT Master Edition', 10990000, 6.43, 6, 128, 'Super AMOLED', '1080x2400 pixels', '64 MP + 8 MP + 2 MP', '6.43 inches', 'Android 11', 'Snapdragon 778G', '128 GB', '6 GB', '5G', 'Dual SIM', 25, 'Master Edition with suitcase-inspired design'),
    ('Realme', 'Narzo 30', 4990000, 6.5, 4, 128, 'IPS LCD', '1080x2400 pixels', '48 MP + 2 MP + 2 MP', '6.5 inches', 'Android 10', 'Mediatek Helio G95', '128 GB', '4 GB', '4G', 'Dual SIM', 20, 'Budget-friendly option with gaming focus'),
    ('Realme', 'C25', 3490000, 6.5, 4, 64, 'IPS LCD', '720x1600 pixels', '13 MP + 2 MP + 2 MP', '6.5 inches', 'Android 10', 'Mediatek Helio G70', '64 GB', '4 GB', '4G', 'Dual SIM', 15, 'Entry-level device with large battery'),
-- Thêm dữ liệu cho 3 sản phẩm Asus ROG vào bảng products
    ('Asus ROG', 'ROG Phone 6 Pro', 29990000, 6.59, 16, 512, 'AMOLED', '1080x2340 pixels', '64 MP + 13 MP + 5 MP + 2 MP', '6.59 inches', 'Android 11', 'Snapdragon 8cx Gen 3', '512 GB', '16 GB', '5G', 'Dual SIM', 20, 'Gaming phone with high-end specs and accessories'),
    ('Asus ROG', 'ROG Phone 5s', 21990000, 6.78, 16, 256, 'AMOLED', '1080x2448 pixels', '64 MP + 13 MP + 5 MP', '6.78 inches', 'Android 11', 'Snapdragon 888+', '256 GB', '16 GB', '5G', 'Dual SIM', 15, 'Gaming-centric flagship with AirTrigger buttons'),
    ('Asus ROG', 'ROG Phone 5s Pro', 24990000, 6.78, 18, 512, 'AMOLED', '1080x2448 pixels', '64 MP + 13 MP + 5 MP', '6.78 inches', 'Android 11', 'Snapdragon 888+', '512 GB', '18 GB', '5G', 'Dual SIM', 10, 'Pro variant with additional gaming features'),
-- Thêm dữ liệu cho 3 sản phẩm HTC vào bảng products
    ('HTC', 'U20 5G', 7990000, 6.8, 8, 256, 'IPS LCD', '1080x2400 pixels', '48 MP + 8 MP + 2 MP + 2 MP', '6.8 inches', 'Android 10', 'Snapdragon 765G', '256 GB', '8 GB', '5G', 'Dual SIM', 15, 'Mid-range 5G smartphone with large display'),
    ('HTC', 'Desire 21 Pro 5G', 5490000, 6.7, 6, 128, 'IPS LCD', '1080x2400 pixels', '48 MP + 8 MP + 2 MP + 2 MP', '6.7 inches', 'Android 10', 'Snapdragon 690', '128 GB', '6 GB', '5G', 'Dual SIM', 20, 'Budget-friendly 5G device with modern design'),
    ('HTC', 'Wildfire E3', 2490000, 6.5, 4, 64, 'IPS LCD', '720x1600 pixels', '13 MP + 2 MP + 2 MP', '6.5 inches', 'Android 10', 'Mediatek Helio P22', '64 GB', '4 GB', '4G', 'Dual SIM', 25, 'Entry-level smartphone with decent specifications'),
-- Thêm dữ liệu cho 3 sản phẩm Nokia vào bảng products
    ('Nokia', '8.3 5G', 9990000, 6.81, 8, 128, 'IPS LCD', '1080x2400 pixels', '64 MP + 12 MP + 2 MP + 2 MP', '6.81 inches', 'Android 10', 'Snapdragon 765G', '128 GB', '8 GB', '5G', 'Dual SIM', 18, 'Mid-range 5G Nokia smartphone with PureDisplay'),
    ('Nokia', '5.4', 3490000, 6.39, 4, 64, 'IPS LCD', '720x1560 pixels', '48 MP + 5 MP + 2 MP + 2 MP', '6.39 inches', 'Android 10', 'Snapdragon 662', '64 GB', '4 GB', '4G', 'Dual SIM', 25, 'Budget-friendly Nokia phone with quad-camera setup'),
    ('Nokia', '1.4', 1490000, 6.51, 2, 32, 'IPS LCD', '720x1600 pixels', '8 MP + 2 MP', '6.51 inches', 'Android 10', 'Quad-core', '32 GB', '2 GB', '4G', 'Dual SIM', 30, 'Entry-level Nokia phone with large display'),


--tạo bảng user
CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(10) NOT NULL,
    full_name VARCHAR(255),
    date_of_birth DATE,
    gender ENUM('Male', 'Female', 'Other'),
    address VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP,
    is_active BOOLEAN DEFAULT 0,
    role ENUM('admin', 'guest', 'employee', 'store_owner') DEFAULT 'guest'
);
 -- tạo bảng danh mục
 CREATE TABLE category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(255) NOT NULL,
    parent_category_id INT,
    [description] TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_category_id) REFERENCES category(category_id)
);
