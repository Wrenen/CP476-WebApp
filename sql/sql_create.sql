CREATE DATABASE CP476_db;

use CP476_db;

CREATE TABLE `supplier` (
  `supplier_id` int NOT NULL AUTO_INCREMENT, 
  `supplier_name` varchar(50),
  `address` varchar(100),
  `phone` varchar(50),
  `email` varchar(60),
  PRIMARY KEY (`supplier_id`)
);

CREATE TABLE `product` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `product_name` varchar(50),
  `description` varchar(100),
  `price` varchar(50),
  `quantity` int,
  `status` char(2),
  `supplier_id` int,
  PRIMARY KEY (pid),
  FOREIGN KEY (supplier_id) REFERENCES supplier(supplier_id)
);

SET GLOBAL local_infile=1;

-- quit
-- mysql --local-infile=1 -u root -p
-- use CP476_db;

LOAD DATA LOCAL INFILE 'SupplierFile.txt' INTO TABLE supplier FIELDS TERMINATED BY ',';

LOAD DATA LOCAL INFILE 'ProductFile.txt' INTO TABLE product FIELDS TERMINATED BY ',' (product_id, product_name, description, price, quantity, status, supplier_id);