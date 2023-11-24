CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  avatar VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(10) NOT NULL,
  address VARCHAR(255) NOT NULL,
  role ENUM('admin', 'customer') NOT NULL DEFAULT 'customer',
  status VARCHAR(10) NOT NULL DEFAULT 'true'
);

CREATE TABLE Categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL
);

CREATE TABLE Products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  price DOUBLE(10,2) NOT NULL,
  image VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL,
  category_id INT NOT NULL,
  FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

CREATE TABLE ProductVariants (
  variant_id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  size VARCHAR(255),
  color VARCHAR(255),
  stock_quantity INT,
  FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

CREATE TABLE Comments (
  comment_id INT AUTO_INCREMENT PRIMARY KEY,
  content VARCHAR(255) NOT NULL,
  product_id INT NOT NULL,
  user_id INT NOT NULL,
  date_comment VARCHAR(255) NOT NULL,
  FOREIGN KEY (product_id) REFERENCES Products(product_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Bill (
  bill_id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  phone VARCHAR(10) NOT NULL,
  total_money INT NOT NULL,
  pttt TINYINT(1) NOT NULL DEFAULT 1 COMMENT '0.Thanh toán khi nhận hàng\r\n1.Thanh toán bằng Paypal\r\n',
  status TINYINT(1) DEFAULT 0 COMMENT '0.Đơn hàng mới 1.Đang xử lý 2.Đang giao hàng 3.Đã hoàn thành',
  user_id INT,
  ngaydathang VARCHAR(255) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Cart (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  price DOUBLE(10,2) NOT NULL,
  amount INT NOT NULL,
  product_id INT NOT NULL,
  variant_id INT NOT NULL,
  bill_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (product_id) REFERENCES Products(product_id),
  FOREIGN KEY (variant_id) REFERENCES ProductVariants(variant_id),
  FOREIGN KEY (bill_id) REFERENCES Bill(bill_id)
);
