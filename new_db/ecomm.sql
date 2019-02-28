-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 04:25 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(38, 25, 44, 1),
(39, 25, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(8, 'Cat Name 1', 'cat-name-1'),
(9, 'Cat Name 2', 'cat-name-2');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(45, 25, 44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `users` varchar(255) DEFAULT NULL,
  `users_id` int(30) DEFAULT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `users`, `users_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`, `date_added`) VALUES
(44, 8, 'Hello World', 1, 'artwork 1', '<p>adadadad</p>\r\n', 'artwork-1', 1, 'artwork-1.png', '2019-02-28', 54, '2019-02-28'),
(45, 8, 'hello 123', 23, 'Artwork hello', '<p>asdad</p>\r\n', 'artwork-hello', 12, 'artwork-hello.jpg', '2019-02-28', 23, '2019-02-28'),
(46, 9, 'Test11 asdas', 25, 'Artwork test 11', '<p>asd</p>\r\n', 'artwork-test-11', 4, 'artwork-test-11.png', '2019-02-28', 30, '2019-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(25, 9, 'PAYID-LR3T4TA986779099M3245902', '2019-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(255) NOT NULL,
  `users` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `date_added` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `users`, `user_id`, `fullname`, `date_added`) VALUES
(11, 'hello 123', '25', 'Test11 asdas', '2019-02-28'),
(12, 'Hello World', '25', 'Test11asdas', '2019-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `bio` varchar(50) DEFAULT NULL,
  `user_slug` varchar(255) DEFAULT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `bio`, `user_slug`, `created_on`) VALUES
(1, 'admin@123.com', '$2y$10$GEBK5XfmNgXvm227qHlM2eghiylipdTkVr8myF3zVJEdqPv2ohLW.', 1, 'Hello', 'World', 'Cebu City', '22234', 'google.jpg', 1, '', '', '', 'Hello World', '2019-02-21'),
(9, 'user@123.com', '$2y$10$UM8ra31xB3npfZEilz2kFe2n3L/jHg9qpJqMJ13K2h06IeNOy0tSK', 0, 'User', '123', 'Silay City, Negros Occidental', '092735719', 'YouTube_logo_(2013-2015).png', 1, 'k8FBpynQfqsv', 'wzPGkX5IODlTYHg', '', 'User 123', '2019-02-21'),
(21, 'dasd@a.com', '$2y$10$E.Zx.ptaaS7nAMZHb6eLU.jUQkpSXksTmUmb3FmUipQnOPV8304l6', 0, 'asdasdas', 'dasd', '', '343', '', 1, 'NIeBf3b4L98W', '', '', 'asdasdas dasd', '2019-02-21'),
(22, 'test@hello.com', '$2y$10$yFO.DubtyEFlKBm8JErP9eenHcoFEBU1j6AGYawQpyg2I77RT3baW', 0, 'test Hello', 'World', '', '343', 'profile.jpg', 1, 'yXDRajlksmNc', '', '', 'test Hello', '2019-02-22'),
(23, 'hello@123.com', '$2y$10$LfJzyCiz47MfIHvR97aJXO5AabfvIK4hdHXJ0yzcIOuJ1KOeI2ONS', 0, 'hello', '123', '', '34', '', 1, 'CkT6Sbr4eOE2', '', '', 'hello 123', '2019-02-22'),
(24, 'Test1@a.com', '$2y$10$YPcagCJP1KwIZ17QQKGSQuQUNfX5dE14sJOtdVJGRGZ7tO/XkBj7y', 0, 'Test1', 'sasdasd', '', '454', 'profile.jpg', 1, 'nlW9kxHvpiS8', '', '', 'Test1 	\r\nsasdasd', '2019-02-22'),
(25, 'Test11@a.com', '$2y$10$75e8.sVf3IxMEB7kiJ2Qle9YWMW/O7XCRQcfZzI3FYk1n.FY7wGmW', 0, 'Test11', 'asdas', '', '4566', 'profile.jpg', 1, 'N69xnSwcPZsy', '', '', 'Test11 asdas', '2019-02-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
