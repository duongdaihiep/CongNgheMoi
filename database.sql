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
    phone_number VARCHAR(10) NOT NULL UNIQUE,
    full_name VARCHAR(255),
    date_of_birth DATE,
    gender ENUM('Male', 'Female', 'Other'),
    address VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP,
    is_active BOOLEAN DEFAULT 0,
    role ENUM('admin', 'guest', 'employee', 'store_owner') DEFAULT 'guest'
);
 -- dữ liệu bảng user
 INSERT INTO user (username, password, email, phone_number, full_name, date_of_birth, gender, address, last_login, is_active, role) VALUES
 ('admin', 'password1234', 'john@example.com', '1234567890', 'John Doe', '1990-05-15', 'Male', '123 Main Street, City, Country', '2024-04-10 12:30:00', 1, 'admin'),
('jane_smith', 'password1234', 'jane@example.com', '9876543210', 'Jane Smith', '1985-08-25', 'Female', '456 Elm Street, City, Country', '2024-04-11 09:45:00', 1, 'employee'),
('alex_wilson', 'password1234', 'alex@example.com', '5551234567', 'Alex Wilson', '1995-02-12', 'Other', '789 Oak Street, City, Country', NULL, 0, 'guest'),
('customer1', 'password123', 'customer1@example.com', '1111111111', 'Customer One', '1992-03-20', 'Female', '123 Park Avenue, City, Country', NULL, 1, 'guest'),
('customer2', 'password456', 'customer2@example.com', '2222222222', 'Customer Two', '1988-07-12', 'Female', '456 Maple Street, City, Country', NULL, 1, 'guest'),
('customer3', 'password789', 'customer3@example.com', '3333333333', 'Customer Three', '1990-11-05', 'Female', '789 Pine Road, City, Country', NULL, 1, 'guest'),
('customer4', 'password123', 'customer4@example.com', '4444444444', 'Customer Four', '1985-05-28', 'Female', '321 Oak Lane, City, Country', NULL, 1, 'guest'),
('customer5', 'password456', 'customer5@example.com', '5555555555', 'Customer Five', '1996-09-15', 'Female', '543 Cedar Court, City, Country', NULL, 1, 'guest'),
('customer6', 'password789', 'customer6@example.com', '6666666666', 'Customer Six', '1994-12-10', 'Female', '987 Elm Drive, City, Country', NULL, 1, 'guest'),
('customer7', 'password123', 'customer7@example.com', '7777777777', 'Customer Seven', '1987-02-18', 'Female', '654 Birch Avenue, City, Country', NULL, 1, 'guest'),
('customer8', 'password456', 'customer8@example.com', '8888888888', 'Customer Eight', '1991-06-22', 'Female', '321 Pine Street, City, Country', NULL, 1, 'guest'),
('customer9', 'password789', 'customer9@example.com', '9999999999', 'Customer Nine', '1989-10-30', 'Female', '876 Maple Road, City, Country', NULL, 1, 'guest'),
('customer10', 'password123', 'customer10@example.com', '1010101010', 'Customer Ten', '1993-04-25', 'Female', '345 Cedar Lane, City, Country', NULL, 1, 'guest');
