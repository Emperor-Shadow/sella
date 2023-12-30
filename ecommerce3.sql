-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table ecommerce.address: ~2 rows (approximately)
INSERT INTO `address` (`id`, `user_id`, `address`, `city`, `state`) VALUES
	(10, 1, '40 Brookfield Corporate Dr Chantilly, VA 20151, USA', 'Chantilly VA', 'Virginia'),
	(11, 1, 'No 45 Erelu Way Off Amikanle Road Alagbado Lagos', 'Alagbado', 'Lagos');

-- Dumping data for table ecommerce.cart: ~0 rows (approximately)

-- Dumping data for table ecommerce.categories: 4 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category_name`) VALUES
	(11, 'Clothing'),
	(5, 'Shoes'),
	(6, 'Shirts'),
	(7, 'Electronics');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping data for table ecommerce.messages: ~28 rows (approximately)
INSERT INTO `messages` (`id`, `user_id`, `message`, `timesent`, `channel`, `time`, `msg_type`, `reciever`, `sender`) VALUES
	(1, 27, 'Hello admin', '2023-11-08 17:20:18', 'admin_27', '1699460418', 'text', 'admin', '27'),
	(14, 28, 'Hello admin, this is Shina', '2023-11-12 17:05:21', 'admin_28', '1699805121', 'text', 'admin', '28'),
	(16, 28, 'How can we help you', '2023-11-13 00:14:46', 'admin_28', '1699830886', 'text', '28', 'admin'),
	(17, 28, 'Do you need our help?', '2023-11-13 00:15:10', 'admin_28', '1699830910', 'text', '28', 'admin'),
	(18, 28, 'my cart isnt working', '2023-11-13 00:19:19', 'admin_28', '1699831159', 'text', 'admin', '28'),
	(19, 28, 'can you be specific please?', '2023-11-13 00:21:38', 'admin_28', '1699831298', 'text', '28', 'admin'),
	(20, 27, 'Welcome to Sella Mini Store. How can i help you damilolasaheeb@gmail.com?', '2023-11-13 00:23:10', 'admin_27', '1699831390', 'text', '27', 'admin'),
	(21, 28, 'Oh its working now. thanks for your help', '2023-11-13 00:23:39', 'admin_28', '1699831419', 'text', 'admin', '28'),
	(22, 28, 'I\'m glad i could be of help', '2023-11-13 00:24:20', 'admin_28', '1699831460', 'text', '28', 'admin'),
	(23, 28, 'hi', '2023-11-13 11:15:16', 'admin_28', '1699870516', 'text', 'admin', '28'),
	(24, 28, 'How can we help you?', '2023-11-13 11:17:17', 'admin_28', '1699870637', 'text', '28', 'admin'),
	(25, 28, 'How can we help you?', '2023-11-13 11:17:33', 'admin_28', '1699870653', 'text', '28', 'admin'),
	(32, 27, 'Goodbye', '2023-11-15 10:01:45', 'admin_27', '1700038905', 'text', '27', 'admin'),
	(33, 27, 'Thanks for using us', '2023-11-15 10:02:41', 'admin_27', '1700038961', 'text', '27', 'admin'),
	(34, 27, 'Hello admin, this is Shina', '2023-11-20 12:20:53', 'admin_27', '1700479253', 'text', 'admin', '27'),
	(35, 27, 'hi', '2023-11-20 12:29:53', 'admin_27', '1700479793', 'text', 'admin', '27'),
	(38, 27, '271675728254881.jpg', '2023-11-20 16:20:46', 'admin_27', '1700493645', 'image', 'admin', '27'),
	(39, 27, '271679598312549.jpg', '2023-11-20 16:32:55', 'admin_27', '1700494375', 'image', 'admin', '27'),
	(40, 27, 'Okay. error solved', '2023-11-20 16:42:13', 'admin_27', '1700494933', 'text', 'admin', '27'),
	(41, 27, 'Okay. Thank you', '2023-11-21 23:16:42', 'admin_27', '1700605002', 'text', '27', 'admin'),
	(42, 27, '11681361110247.jpg', '2023-11-21 23:20:10', 'admin_1', '1700605210', 'image', '27', 'admin'),
	(43, 27, '11681361110247.jpg', '2023-11-21 23:21:32', 'admin_1', '1700605292', 'image', '27', 'admin'),
	(44, 27, '11680797776480.jpg', '2023-11-21 23:21:47', 'admin_1', '1700605307', 'image', '1', 'admin'),
	(45, 28, 'hello sella', '2023-12-01 16:55:46', 'admin_28', '1701446146', 'text', 'admin', '28'),
	(46, 28, 'dddd', '2023-12-01 17:55:09', 'admin_28', '1701449709', 'text', 'admin', '28'),
	(47, 28, 'hi', '2023-12-01 17:55:57', 'admin_28', '1701449757', 'text', '28', 'admin'),
	(48, 28, 'my cart isnt working', '2023-12-01 17:56:25', 'admin_28', '1701449785', 'text', 'admin', '28'),
	(49, 28, 'ok please cus id', '2023-12-01 17:56:47', 'admin_28', '1701449807', 'text', '28', 'admin');

-- Dumping data for table ecommerce.order_tb: ~9 rows (approximately)
INSERT INTO `order_tb` (`id`, `user_id`, `product_id`, `quantity`, `tracking_id`, `time_ordered`) VALUES
	(1, 1, 13, 1, '1442', '2023-10-30 17:46:51'),
	(2, 1, 11, 1, '1442', '2023-10-30 17:46:51'),
	(7, 1, 7, 1, '3922', '2023-10-31 01:07:05'),
	(8, 27, 13, 1, '4548', '2023-11-01 13:05:20'),
	(9, 27, 11, 1, '4548', '2023-11-01 13:05:20'),
	(10, 1, 6, 1, '9701', '2023-11-03 13:29:22'),
	(11, 1, 5, 1, '7456', '2023-11-08 12:21:35'),
	(12, 1, 7, 1, '7456', '2023-11-08 12:21:35'),
	(13, 1, 11, 1, '9667', '2023-11-08 15:08:35');

-- Dumping data for table ecommerce.products: 10 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `product_name`, `product_category`, `product_description`, `product_new_price`, `product_old_price`, `product_stock_quantity`, `discount`, `product_picture`, `date_added`) VALUES
	(4, 'JBL Headphone White', 'Electronics', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nisi pariatur quibusdam facilis nobis suscipit ratione reiciendis unde alias nam?', 46679.74, 49136.00, 100, 5, 'JBL Headphonecat-img-4.jpg', '2023-11-01 13:08:11'),
	(5, 'NIKE leather black sneakers', 'Shoes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nisi pariatur quibusdam facilis nobis suscipit ratione reiciendis unde alias nam?', 146720.00, 146720.00, 100, 0, 'NIKE leather black sneakerscat-img-2.jpg', '2023-11-01 13:08:11'),
	(6, 'Leather brown Wristwatch', 'Clothing & Ornaments', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nisi pariatur quibusdam facilis nobis suscipit ratione reiciendis unde alias nam?', 113990.96, 113990.00, 100, 0, 'Leather brown Wristwatchcat-img-3.jpg', '2023-11-01 13:08:11'),
	(7, 'Light blue round neck', 'Shirts', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nisi pariatur quibusdam facilis nobis suscipit ratione reiciendis unde alias nam?', 15636.16, 15636.00, 100, 0, 'Light blue round neckproduct-3.jpg', '2023-11-01 13:08:11'),
	(8, 'Apple wristwatch', 'Clothing & Ornaments', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nisi pariatur quibusdam facilis nobis suscipit ratione reiciendis unde alias nam?', 146720.00, 146720.00, 100, 0, 'Apple wristwatchproduct-detail-3.jpg', '2023-11-01 13:08:11'),
	(9, 'Apple white wristwatch', 'Clothing & Ornaments', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nisi pariatur quibusdam facilis nobis suscipit ratione reiciendis unde alias nam?', 132016.56, 132016.00, 100, 0, 'Apple white wristwatchproduct-detail-4.jpg', '2023-11-01 13:08:11'),
	(10, 'A9 Polaroid E-Camera', 'Electronics', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora, velit.', 1467545.84, 1467545.00, 100, 0, 'A9 Polaroid E-Cameraproduct-10.jpg', '2023-11-01 13:08:11'),
	(11, 'JBL Earpods', 'Electronics', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nisi pariatur quibusdam facilis nobis suscipit ratione reiciendis unde alias nam?', 4716.00, 4716.00, 100, 0, 'JBL Earpodsproduct-1.jpg', '2023-11-01 13:08:11'),
	(13, 'Armani Yellow T-shirt', 'Shirts', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora, velit.', 8488.80, 8488.00, 100, 0, 'Armani Yellow T-shirtcustomer-2.png', '2023-11-01 13:08:11'),
	(14, 'Black Vintage Shirt', 'Electronics', 'sss', 20960.00, 20960.00, 100, 0, 'Black Vintage Shirtuser8-128x128.jpg', '2023-11-01 13:08:11');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping data for table ecommerce.transactions: ~2 rows (approximately)
INSERT INTO `transactions` (`id`, `tracking_id`, `reference_id`, `user_id`, `status`, `amount_paid`, `time_created`, `payment_type`) VALUES
	(1, '1442', '601102994', 1, 'success', '13204', '2023-10-30 17:46:51', 'online'),
	(8, '9667', NULL, 1, 'success', '4716', '2023-11-08 15:08:35', 'on-delivery');

-- Dumping data for table ecommerce.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `email`, `fname`, `lname`, `password`, `user_type`) VALUES
	(1, 'janetmaxwell2022@gmail.com', 'Damilola', 'Ayomide', '$2y$10$UCyDtukWWpxKMAhnEaAmM.zMmBJRcIOOaAHV/mfnDB2.H2IfqNjBS', 'admin'),
	(27, 'damilolasaheeb@gmail.com', 'Damilola', 'Saheeb', '$2y$10$NJuQ0fDamhlBotTvGynJaOt8P89HJ2gC1ax54AT5mX92iEW7pBniq', 'standard'),
	(28, 'shina@gmail.com', 'Shina', 'Shina', '$2y$10$71DuyhBf8RS3kaGQhJ5pROi3IEZjT6AE/BUAiYMhr2.1T7Rq1RteS', 'standard');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
