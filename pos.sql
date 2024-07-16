SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `pos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pos`;

DROP TABLE IF EXISTS `add_to_inventory`;
CREATE TABLE `add_to_inventory` (
  `add_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `units` varchar(255) NOT NULL,
  `tax_type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `serial` varchar(255) NOT NULL,
  `reorder_level` varchar(255) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `quantity_predefined` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `buying_price` int(255) NOT NULL,
  `markup_percentage` int(20) NOT NULL,
  `marked_price` int(255) NOT NULL,
  `opening_stock` int(255) NOT NULL,
  `narrative` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `add_to_inventory` (`add_id`, `category`, `brand`, `name`, `units`, `tax_type`, `color`, `image`, `serial`, `reorder_level`, `availability`, `quantity_predefined`, `class`, `buying_price`, `markup_percentage`, `marked_price`, `opening_stock`, `narrative`, `active`) VALUES
(1, '33', '', 'monster energy drink', '3', 'None', 'red', '', '122233', '1', 'yes', '23', 'for sale', 0, 10, 100, 20, 'very good', 'yes'),
(2, '1', '', 'name', '1', 'None', 'red', '', 'serial', '1', '2', '3', 'class', 4, 5, 6, 7, '8', '10'),
(3, '2', '', 'name2', '2', 'None', 'blue', '', '1', '2', '3', '4', '5', 6, 7, 8, 9, '10', '11'),
(4, '2', '', 'name2', '2', 'None', 'blue', '', '1', '2', '3', '4', '5', 6, 7, 8, 9, '10', '11'),
(5, 'breakfast', '', 'name3', 'bowl', 'exempted', 'red', '', '1', '2', '3', '4', '5', 6, 7, 8, 9, '10', '11'),
(6, 'breakfast', '', 'name3', 'bowl', 'exempted', 'red', '', '1', '2', '3', '4', '5', 6, 7, 8, 9, '10', '11');

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'cup'),
(2, 'delmonte'),
(3, 'delmonte juices'),
(4, 'farmers choice'),
(5, 'glass'),
(6, 'honda'),
(7, 'hp'),
(8, 'ikonic'),
(9, 'keringet'),
(10, 'keringet water'),
(11, 'lenovo'),
(12, 'mt kenya'),
(13, 'pick n peel'),
(14, 'platter'),
(15, 'redbull'),
(16, 'seimens');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'breakfast'),
(2, 'omelettes'),
(3, 'sandwiches'),
(4, 'salads'),
(5, 'hot drinks'),
(6, 'cold drinks'),
(7, 'small bites'),
(8, 'burger corner'),
(9, 'chicken'),
(10, 'accompaniments'),
(11, 'fish cornor'),
(12, 'choma zone'),
(13, 'soup'),
(14, 'pizzeria'),
(15, 'tex-mex'),
(16, 'vegan&pasta'),
(17, 'sizzlers'),
(18, 'ice corner'),
(19, 'adili'),
(20, 'conference'),
(21, 'hard disk'),
(22, 'argricultural machinery'),
(23, '8hp hand tractor'),
(24, 'combined feed chopper'),
(25, 'backpack brush cutter'),
(26, 'earth auger'),
(27, 'juices'),
(28, 'keringet'),
(29, 'redbull'),
(30, 'route salesman'),
(31, 'juice'),
(32, 'water'),
(33, 'energy drink'),
(34, 'soft drink');

DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'red'),
(2, 'yellow'),
(3, 'blue');

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tax type`;
CREATE TABLE `tax type` (
  `tax_id` int(11) NOT NULL,
  `tax_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tax type` (`tax_id`, `tax_name`) VALUES
(1, 'exempted'),
(2, 'kavya tax'),
(3, 'VAT');

DROP TABLE IF EXISTS `units`;
CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `units` (`unit_id`, `unit_name`) VALUES
(1, 'bowl'),
(2, 'box'),
(3, 'can'),
(4, 'carton'),
(5, 'cas'),
(6, 'crate'),
(7, 'cup'),
(8, 'each'),
(9, 'glass'),
(10, 'plate'),
(11, 'platter'),
(12, 'satchets'),
(13, 'unit');


ALTER TABLE `add_to_inventory`
  ADD PRIMARY KEY (`add_id`);

ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

ALTER TABLE `tax type`
  ADD PRIMARY KEY (`tax_id`);

ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);


ALTER TABLE `add_to_inventory`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `login`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tax type`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
