

--Signup & Login :

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL,
  name VARCHAR(100),
  PRIMARY KEY (id)
);



--Customer selecting items from categories (men, women and kids wear) :

CREATE TABLE featured_items (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  price DECIMAL(8,2) NOT NULL,
  description TEXT,
  PRIMARY KEY (id)
);

CREATE TABLE categories (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE item_categories (
  item_id INT NOT NULL,
  category_id INT NOT NULL,
  PRIMARY KEY (item_id, category_id),
  FOREIGN KEY (item_id) REFERENCES featured_items(id),
  FOREIGN KEY (category_id) REFERENCES categories(id)
);




--Shopping cart (add-to-cart) :

CREATE TABLE customers (
  customer_id INT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  address VARCHAR(200) NOT NULL,
  city VARCHAR(100) NOT NULL,
  state VARCHAR(100) NOT NULL,
  zip_code VARCHAR(20) NOT NULL
);

CREATE TABLE orders (
  order_id INT PRIMARY KEY,
  customer_id INT NOT NULL,
  card_number VARCHAR(20) NOT NULL,
  expiration_date VARCHAR(10) NOT NULL,
  cvv VARCHAR(10) NOT NULL,
  total_price DECIMAL(10, 2) NOT NULL,
  order_date DATETIME NOT NULL,
  FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);




--Checkout :

CREATE TABLE products (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL
);

CREATE TABLE product_options (
  id SERIAL PRIMARY KEY,
  product_id INTEGER NOT NULL,
  size VARCHAR(10) NOT NULL,
  quantity INTEGER NOT NULL,
  FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE carts (
  id SERIAL PRIMARY KEY,
  created_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE cart_items (
  id SERIAL PRIMARY KEY,
  cart_id INTEGER NOT NULL,
  product_id INTEGER NOT NULL,
  size VARCHAR(10) NOT NULL,
  quantity INTEGER NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (cart_id) REFERENCES carts(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);







