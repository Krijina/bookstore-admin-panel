-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 07:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$F.LemnLA9kL2vtn1e4YfbeyL1XJYGUJr6qE/6vC7QNdr2oCnakFNi'),
(2, 'kriji', 'kriji@gmail.com', 'kriji123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `description`, `price`, `image`, `rate`) VALUES
(14, 'Mansoon', 'Subin Bhattarai', ' Monsoon can be taken as a metaphor for love, how love can be unpredictable and with ups and downs.\r\n', '450', './assets/image/book7.png', 3),
(15, 'Mansoon', 'Buddhi Sagar', 'Monsoon can be taken as a metaphor for love, how love can be unpredictable and with ups and downs.', '450', './assets/image/book7.png', 3),
(16, 'Harry Potter', 'JK Rowling', 'There is a door at the end of a silent corridor. And it’s haunting Harry Pottter’s dreams. Why else would he be waking in the middle of the night, screaming in terror?', '320', './assets/image/book9.png', 4),
(17, 'One Indian Girl', 'Chetan Bhagat', 'a story of a girl called Radhika Mehta who is a hot-shot banker working in the prestigious Investment Bank, Goldman Sachs.', '450', 'assets/image/book3.png', 2),
(19, 'One Indian Girl', 'Chetan Bhagat', 'a story of a girl called Radhika Mehta who is a hot-shot banker working in the prestigious Investment Bank, Goldman Sachs.', '450', 'assets/image/book3.png', 3),
(20, 'One Indian Girl', 'Chetan Bhagat', 'a story of a girl called Radhika Mehta who is a hot-shot banker working in the prestigious Investment Bank, Goldman Sachs.', '450', 'assets/image/book3.png', 3),
(21, 'One Indian Girl', 'Chetan Bhagat', 'a story of a girl called Radhika Mehta who is a hot-shot banker working in the prestigious Investment Bank, Goldman Sachs.', '450', 'assets/image/book3.png', 3),
(22, 'One Indian Girl', 'Chetan Bhagat', 'a story of a girl called Radhika Mehta who is a hot-shot banker working in the prestigious Investment Bank, Goldman Sachs.', '450', 'assets/image/book3.png', 3),
(23, 'The girl in the room 105', 'Chetan Bhagat', 'A story about a IIT coaching class tutor who goes to wish his ex-girlfriend on her birthday and finds her murdered.', '499', 'assets/image/book4.png', 4),
(24, 'The Alchemist', 'Paulo Coelho', 'a classic novel in which a boy named Santiago embarks on a journey seeking treasure in the Egyptian pyramids after having a recurring dream about it and on the way meets mentors, falls in love, and most importantly, learns the true importance of who he is', '499', 'assets/image/book5.png', 4),
(25, 'Summer Love', 'Subin Bhattarai', 'Atit is curious to find out the entrance topper Saaya, who also has the same way back to home as Atit has. At that time, they fall in love but as the college finishes, Atit has to go to Dhangadi and Saaya; Norway. But as time passed, ', '499', 'assets/image/book8.png', 2),
(26, 'The missing hour', 'Ellie Dean', 'The thirteenth heart-warming novel in the Beach View Boarding House series, from Sunday Times bestselling author Ellie Dean.\r\nAs the war continues to keep her family far away Peggy Reilly must continue to look after her girls at the Beach View Boarding Ho', '520', 'assets/image/the missing hour.jpg', 2),
(27, 'A thousand boy kisses', 'Tillie Cole', 'One kiss lasts a moment.But a thousand kisses can last a lifetime.One boy.One girl.A bond that is forged in an instant and cherished for a decade.A bond that neither time nor distance can break.A bond that will last forever.Or so they believe.When sevente', '950', 'assets/image/book12.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `user` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `star` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`user`, `user_id`, `book_id`, `book_name`, `star`) VALUES
('krijina', 0, 0, 'Harry Potter', 4),
('bishesh', 0, 0, 'The girl in the room 105', 4),
('aayush', 0, 0, 'One Indian Girl', 3),
('krijina', 0, 0, 'Summer Love', 3),
('krijina', 0, 0, 'One Indian Girl', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_price` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `contact`, `password`) VALUES
(2, 'krijina', 1234567890, 'krijina123'),
(3, 'bishesh', 2147483647, 'bishesh123'),
(4, 'aayush', 2147483647, 'aayush123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
