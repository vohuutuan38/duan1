-- Bảng người dùng (Users)
CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  user_type ENUM('admin', 'customer') NOT NULL
);

-- Bảng danh mục (Categories)
CREATE TABLE Categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL
);

-- Bảng sản phẩm (Products)
CREATE TABLE Products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  stock_quantity INT NOT NULL,
  image_url VARCHAR(255),
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

-- Bảng đơn hàng (Orders)
CREATE TABLE Orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status ENUM('pending', 'processing', 'shipped', 'canceled') NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Bảng mục đơn hàng (OrderItems)
CREATE TABLE OrderItems (
  order_item_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_id INT,
  quantity INT NOT NULL,
  total_price DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES Orders(order_id),
  FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

-- Bảng quản trị viên (Admins)
CREATE TABLE Admins (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Bảng biến thể sản phẩm (ProductVariants)
CREATE TABLE ProductVariants (
  variant_id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  size VARCHAR(255),
  color VARCHAR(255),
  material VARCHAR(255),
  stock_quantity INT,
  FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

-- Bảng đánh giá và bình luận (ProductReviews)
CREATE TABLE ProductReviews (
  review_id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  user_id INT,
  rating INT NOT NULL,
  comment TEXT,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES Products(product_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Bảng chương trình khuyến mãi (Promotions)
CREATE TABLE Promotions (
  promotion_id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  discount_percentage DECIMAL(5, 2),
  start_date TIMESTAMP,
  end_date TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

-- Bảng phương thức thanh toán (PaymentMethods)
CREATE TABLE PaymentMethods (
  method_id INT AUTO_INCREMENT PRIMARY KEY,
  method_name VARCHAR(255)
);

-- Bảng lịch sử thanh toán (PaymentHistory)
CREATE TABLE PaymentHistory (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  method_id INT,
  amount DECIMAL(10, 2) NOT NULL,
  payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (order_id) REFERENCES Orders(order_id),
  FOREIGN KEY (method_id) REFERENCES PaymentMethods(method_id)
);
