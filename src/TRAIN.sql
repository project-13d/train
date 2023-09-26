-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2023 at 12:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TRAIN`
--

-- --------------------------------------------------------

--
-- Table structure for table `BOOK_T`
--

CREATE TABLE `BOOK_T` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_seat` char(5) NOT NULL,
  `book_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BOOK_T`
--

INSERT INTO `BOOK_T` (`book_id`, `user_id`, `book_seat`, `book_time`) VALUES
(75, 1, 'c2-2', '2023-09-23 02:58:11'),
(79, 2, 'c1-7', '2023-09-23 04:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `COACH_T`
--

CREATE TABLE `COACH_T` (
  `coach_id` int(11) NOT NULL,
  `coach_num` char(2) NOT NULL,
  `coach_total_seat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `COACH_T`
--

INSERT INTO `COACH_T` (`coach_id`, `coach_num`, `coach_total_seat`) VALUES
(1, 'c1', 20),
(2, 'c2', 20),
(3, 'c3', 20),
(4, 'c4', 20),
(5, 'c5', 20),
(6, 'c6', 20);

-- --------------------------------------------------------

--
-- Table structure for table `SEAT_T`
--

CREATE TABLE `SEAT_T` (
  `seat_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `seat_num` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SEAT_T`
--

INSERT INTO `SEAT_T` (`seat_id`, `coach_id`, `seat_num`) VALUES
(1, 1, 'c1-1'),
(3, 1, 'c1-2'),
(5, 1, 'c1-3'),
(6, 1, 'c1-4'),
(7, 1, 'c1-5'),
(8, 1, 'c1-6'),
(9, 1, 'c1-7'),
(10, 1, 'c1-8'),
(11, 1, 'c1-9'),
(12, 1, 'c1-10'),
(13, 1, 'c1-11'),
(14, 1, 'c1-12'),
(15, 1, 'c1-13'),
(16, 1, 'c1-14'),
(17, 1, 'c1-15'),
(18, 1, 'c1-16'),
(19, 1, 'c1-17'),
(20, 1, 'c1-18'),
(21, 1, 'c1-19'),
(22, 1, 'c1-20'),
(23, 2, 'c2-1'),
(24, 2, 'c2-2'),
(25, 2, 'c2-3'),
(26, 2, 'c2-4'),
(27, 2, 'c2-5'),
(28, 2, 'c2-6'),
(29, 2, 'c2-7'),
(30, 2, 'c2-8'),
(31, 2, 'c2-9'),
(32, 2, 'c2-10'),
(33, 2, 'c2-11'),
(34, 2, 'c2-12'),
(35, 2, 'c2-13'),
(36, 2, 'c2-14'),
(37, 2, 'c2-15'),
(38, 2, 'c2-16'),
(39, 2, 'c2-17'),
(40, 2, 'c2-18'),
(41, 2, 'c2-19'),
(42, 2, 'c2-20'),
(43, 3, 'c3-1'),
(44, 3, 'c3-2'),
(45, 3, 'c3-3'),
(46, 3, 'c3-4'),
(47, 3, 'c3-5'),
(48, 3, 'c3-6'),
(49, 3, 'c3-7'),
(50, 3, 'c3-8'),
(51, 3, 'c3-9'),
(52, 3, 'c3-10'),
(54, 3, 'c3-11'),
(55, 3, 'c3-12'),
(56, 3, 'c3-13'),
(57, 3, 'c3-14'),
(58, 3, 'c3-15'),
(59, 3, 'c3-16'),
(60, 3, 'c3-17'),
(61, 3, 'c3-18'),
(62, 3, 'c3-19'),
(63, 3, 'c3-20'),
(64, 4, 'c4-1'),
(65, 4, 'c4-2'),
(66, 4, 'c4-3'),
(67, 4, 'c4-4'),
(68, 4, 'c4-5'),
(69, 4, 'c4-6'),
(70, 4, 'c4-7'),
(71, 4, 'c4-8'),
(72, 4, 'c4-9'),
(73, 4, 'c4-10'),
(74, 4, 'c4-11'),
(75, 4, 'c4-12'),
(76, 4, 'c4-13'),
(77, 4, 'c4-14'),
(78, 4, 'c4-15'),
(79, 4, 'c4-16'),
(80, 4, 'c4-17'),
(81, 4, 'c4-18'),
(82, 4, 'c4-19'),
(83, 4, 'c4-20'),
(84, 5, 'c5-1'),
(85, 5, 'c5-2'),
(86, 5, 'c5-3'),
(87, 5, 'c5-4'),
(88, 5, 'c5-5'),
(89, 5, 'c5-6'),
(90, 5, 'c5-7'),
(91, 5, 'c5-8'),
(92, 5, 'c5-9'),
(93, 5, 'c5-10'),
(94, 5, 'c5-11'),
(95, 5, 'c5-12'),
(96, 5, 'c5-13'),
(97, 5, 'c5-14'),
(98, 5, 'c5-15'),
(99, 5, 'c5-16'),
(100, 5, 'c5-17'),
(101, 5, 'c5-18'),
(102, 5, 'c5-19'),
(103, 5, 'c5-20'),
(104, 6, 'c6-1'),
(105, 6, 'c6-2'),
(106, 6, 'c6-3'),
(107, 6, 'c6-4'),
(108, 6, 'c6-5'),
(109, 6, 'c6-6'),
(110, 6, 'c6-7'),
(111, 6, 'c6-8'),
(112, 6, 'c6-9'),
(113, 6, 'c6-10'),
(114, 6, 'c6-11'),
(115, 6, 'c6-12'),
(116, 6, 'c6-13'),
(117, 6, 'c6-14'),
(118, 6, 'c6-15'),
(119, 6, 'c6-16'),
(120, 6, 'c6-17'),
(121, 6, 'c6-18'),
(122, 6, 'c6-19'),
(123, 6, 'c6-20');

-- --------------------------------------------------------

--
-- Table structure for table `USER_T`
--

CREATE TABLE `USER_T` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_psw` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_seat` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `USER_T`
--

INSERT INTO `USER_T` (`user_id`, `user_username`, `user_psw`, `user_email`, `user_seat`) VALUES
(1, 'Adam', 'adm123', 'ad@gmail.com', 'c2-2'),
(2, 'Jackson', 'jwk123', 'jwk@gmail.com', 'c1-7'),
(3, 'John', 'jh12', 'john@gmail.com', ''),
(4, 'Nicki', 'nc123', 'nck@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BOOK_T`
--
ALTER TABLE `BOOK_T`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `COACH_T`
--
ALTER TABLE `COACH_T`
  ADD PRIMARY KEY (`coach_id`);

--
-- Indexes for table `SEAT_T`
--
ALTER TABLE `SEAT_T`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `USER_T`
--
ALTER TABLE `USER_T`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BOOK_T`
--
ALTER TABLE `BOOK_T`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `COACH_T`
--
ALTER TABLE `COACH_T`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `SEAT_T`
--
ALTER TABLE `SEAT_T`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `USER_T`
--
ALTER TABLE `USER_T`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BOOK_T`
--
ALTER TABLE `BOOK_T`
  ADD CONSTRAINT `book_t_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USER_T` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SEAT_T`
--
ALTER TABLE `SEAT_T`
  ADD CONSTRAINT `seat_t_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `COACH_T` (`coach_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
