CREATE DATABASE CP476_db;

CREATE TABLE `supplier` (
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50),
  `address` varchar(100),
  `phone` int,
  `email` varchar(60),
  PRIMARY KEY (`supplier_id`)
);

CREATE TABLE `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50),
  `description` varchar(100),
  `price` float,
  `quantity` int,
  `status` char(1),
  `supplier_id` int,
  PRIMARY KEY (product_id),
  FOREIGN KEY (supplier_id) REFERENCES supplier(supplier_id)
);
