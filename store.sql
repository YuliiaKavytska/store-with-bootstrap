-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 08:00 AM
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
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `stuff`, `created`, `address`, `status`) VALUES
(23, 3, '{\"basket\":[{\"product_id\":\"2\",\"count\":3},{\"product_id\":\"1\",\"count\":1}]}', '2020-10-31 12:31:22', 'Борщагівська 146', 'Отправлено клиенту'),
(24, 9, '{\"basket\":[{\"product_id\":\"12\",\"count\":2}]}', '2020-10-31 12:31:48', 'Борщагівська 14', 'Новый'),
(25, 10, '{\"basket\":[{\"product_id\":\"1\",\"count\":\"9\"},{\"product_id\":\"2\",\"count\":\"4\"}]}', '2020-10-31 19:49:41', 'Борщагівська 146', 'Новый'),
(26, 1, '{\"basket\":[{\"product_id\":\"1\",\"count\":3},{\"product_id\":\"2\",\"count\":\"3\"}]}', '2020-10-31 19:57:49', 'Борщагівська 146', 'Новый'),
(27, 11, '{\"basket\":[{\"product_id\":\"2\",\"count\":1}]}', '2020-10-31 20:00:05', 'Крещатик', 'Новый');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `content`, `category_id`, `image`) VALUES
(1, 'брюки', 75, 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(2, 'Футболка', 90, 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(12, 'футболка', 0, 'красная футболка', 'катоновая красная ', 10, '2'),
(17, 'шапка', 0, 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(18, 'перчатки кожаные', 0, 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(19, 'брюки 2', 0, 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(20, 'Футболка2', 0, 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(21, 'футболка', 0, 'красная футболка', 'катоновая красная ', 10, '2'),
(22, 'шапка', 0, 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(23, 'перчатки кожаные', 0, 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(24, 'брюки 3', 0, 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(25, 'Футболка3', 0, 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(26, 'футболка', 0, 'красная футболка', 'катоновая красная ', 10, '2'),
(27, 'шапка', 0, 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(28, 'перчатки кожаные', 0, 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(29, 'брюки', 0, 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(30, 'Футболка 4', 0, 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(31, 'футболка', 0, 'красная футболка', 'катоновая красная ', 10, '2'),
(32, 'шапка', 0, 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(33, 'перчатки кожаные', 0, 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(34, 'брюки', 0, 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(35, 'Футболка5', 0, 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(36, 'футболка', 0, 'красная футболка', 'катоновая красная ', 10, '2'),
(37, 'шапка', 0, 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(38, 'перчатки кожаные 99999', 0, 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(39, 'брюки', 0, 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(40, 'Футболка6', 0, 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(41, 'футболка', 0, 'красная футболка', 'катоновая красная ', 10, '2'),
(42, 'шапка', 0, 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(43, 'перчатки кожаные', 0, 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(44, 'брюки', 0, 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(45, 'Футболка7', 0, 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(46, 'футболка', 0, 'красная футболка', 'катоновая красная ', 10, '2'),
(47, 'шапка', 0, 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(48, 'перчатки кожаные', 0, 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, ''),
(49, 'брюки', 0, 'Катоновые брюки.', 'Катоновые женские брюки на резинке. Приятные на ощпь и носятся 100 лет. Цвет хаки', 1, 'img/1.jpg'),
(50, 'Футболка8', 0, 'зеленая футболка', 'зеденая футболка на флисе', 10, 'img/2.jpg'),
(51, 'футболка', 0, 'красная футболка', 'катоновая красная ', 10, '2'),
(52, 'шапка', 0, 'шапка из шерсти', 'теплая шапка', 11, 'вв'),
(53, 'перчатки кожаные this is end', 0, 'перчатки из кожи', 'теплые, мягки кожаные перчатки', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `verifided` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `phone`, `email`, `password`, `confirm_mail`, `verifided`) VALUES
(1, '1', '0935951018', '', '', '', 0),
(3, 'Борщагівська 146', '0935951019', '', '', '', 0),
(9, 'Борщагівська 146', '0935951021', '', '', '', 0),
(10, 'Юлия', '0935951020', '', '', '', 0),
(11, 'Имя Имя', '0935953456', '', '', '', 0),
(39, 'yuliia_kavytskaya', '', 'julia.k106.l7@gmail.com', '96e79218965eb72c92a549dd5a330112', 'myAM7t6pOA2UWYRjqPF9', 1),
(41, 'yuliia', '', 'jul6.l7@gmail.com', '202cb962ac59075b964b07152d234b70', 'lQxJ49fqFsAfvKAzHktV', 1),
(42, '111', '', 'n@n.n', 'c4ca4238a0b923820dcc509a6f75849b', 'njaobPEKP8lfHJ8w52vV', 1),
(43, '1111111', '', 'i@i.i', 'c4ca4238a0b923820dcc509a6f75849b', 'H3gcr0FMTBWZdmm86HPh', 1),
(44, 'yuliia_kavytskaya', '', 'g@g.g', 'c4ca4238a0b923820dcc509a6f75849b', 'D1ZbPLhvbNvKw4otdqnN', 0);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
