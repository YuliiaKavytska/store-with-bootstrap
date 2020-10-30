-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 01:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Брюки'),
(2, 'Джинсы'),
(10, 'Футболки'),
(11, 'Шапки'),
(12, 'Перчатки');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stuff` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `stuff`, `created`, `address`, `phone`) VALUES
(1, 1, '1', '2020-10-28 13:37:46', '', ''),
(2, 2, '2', '2020-10-28 13:38:05', '', ''),
(3, 1, '<br />\r\n<b>Notice</b>:  Array to string conversion in <b>C:xampphtdocsstorepagesasket.php</b> on line <b>86</b><br />\r\nArray', '2020-10-28 14:06:49', ' м. Черкаси', ''),
(4, 1, 'брюки 3 шт; Футболка 1 шт; футболка 2 шт; ', '2020-10-28 14:13:11', 'qqq', ''),
(5, 1, 'брюки 2 шт; брюки 3 2 шт; футболка 1 шт; шапка 1 шт; ', '2020-10-28 14:20:45', 'qqq', ''),
(6, 1, 'Футболка 2 шт; футболка 2 шт; брюки 3 шт; ', '2020-10-28 14:26:08', '22222', ''),
(7, 1, 'брюки 5 шт; ', '2020-10-28 14:48:01', 'qqq', '0935951067');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `content`, `category_id`, `image`) VALUES
(1, 'брюки', 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(2, 'Футболка', 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(12, 'футболка', 'красная футболка', 'катоновая красная ', 10, '2'),
(17, 'шапка', 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(18, 'перчатки кожаные', 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(19, 'брюки 2', 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(20, 'Футболка2', 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(21, 'футболка', 'красная футболка', 'катоновая красная ', 10, '2'),
(22, 'шапка', 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(23, 'перчатки кожаные', 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(24, 'брюки 3', 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(25, 'Футболка3', 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(26, 'футболка', 'красная футболка', 'катоновая красная ', 10, '2'),
(27, 'шапка', 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(28, 'перчатки кожаные', 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(29, 'брюки', 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(30, 'Футболка 4', 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(31, 'футболка', 'красная футболка', 'катоновая красная ', 10, '2'),
(32, 'шапка', 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(33, 'перчатки кожаные', 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(34, 'брюки', 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(35, 'Футболка5', 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(36, 'футболка', 'красная футболка', 'катоновая красная ', 10, '2'),
(37, 'шапка', 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(38, 'перчатки кожаные 99999', 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(39, 'брюки', 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(40, 'Футболка6', 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(41, 'футболка', 'красная футболка', 'катоновая красная ', 10, '2'),
(42, 'шапка', 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(43, 'перчатки кожаные', 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(44, 'брюки', 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(45, 'Футболка7', 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(46, 'футболка', 'красная футболка', 'катоновая красная ', 10, '2'),
(47, 'шапка', 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(48, 'перчатки кожаные', 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(49, 'брюки', 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(50, 'Футболка8', 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(51, 'футболка', 'красная футболка', 'катоновая красная ', 10, '2'),
(52, 'шапка', 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(53, 'перчатки кожаные this is end', 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
