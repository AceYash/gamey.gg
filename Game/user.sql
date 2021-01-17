-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 01:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `followername` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `uname`, `followername`) VALUES
(1, 'robin', 'verified'),
(2, 'robin', 'userid');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` varchar(160) NOT NULL,
  `posted_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `posted_at`, `user_id`, `likes`) VALUES
(1, 'd', '0000-00-00 00:00:00', 20, 0),
(2, 'ddd', '0000-00-00 00:00:00', 20, 0),
(3, 'axcasdqw', '0000-00-00 00:00:00', 20, 0),
(4, 'asdds', '0000-00-00 00:00:00', 20, 0),
(5, 'dqw', '0000-00-00 00:00:00', 20, 0),
(6, 'ad', '2019-02-08 04:16:14', 20, 0),
(8, 'sdadqw', '2019-02-08 04:21:16', 20, 0),
(9, 'asdqw', '2019-02-08 04:29:43', 20, 0),
(10, 'asdqw', '2019-02-08 04:30:01', 20, 0),
(11, 'asdasd', '2019-02-08 04:31:52', 20, 0),
(12, 'asdqwd', '2019-02-08 04:32:10', 20, 0),
(13, 'asddqw', '2019-02-08 04:32:21', 20, 0),
(14, 'asddqw', '2019-02-08 04:33:02', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `fname`, `lname`, `uname`, `email`, `password`, `verified`) VALUES
(1, 'yash', 'singh', 'yashsingh1', 'yash@gmail.com', '$2y$10$a3JqW.wxF9ReAXxO3Bklbux6z//QS5YQEl2zMP9hIa6.e7RJvbk3K', 0),
(3, 'Robin', 'Raj', 'robin', 'robin@gmail.com', '$2y$10$a3JqW.wxF9ReAXxO3Bklbux6z//QS5YQEl2zMP9hIa6.e7RJvbk3K', 1),
(14, 'yash', 'singh', 'new', 'neqw@gmail.com', '$2y$10$OrGECYdseyfLjpTIe9iiJ.DepGlN7xIUpK1z6E1HZCkwp2WhzLQg6', 0),
(16, 'tyasd2', 'asd', 'asd', 'asd@gmail.com', '$2y$10$Hw5Ae.Ad480FtiffNcqTUu3Pm/8290yUB6oMM/XtLV5FKbl5OG/Q.', 0),
(17, 'yash213', 'singhasd', 'asdasdasdas', 'yashkumar25@gmail.com', '$2y$10$HqnzJVgkVN51DBBC78TqnuNc82ZtLomZ0cJt5SxR2yN3G/s1FDR2S', 0),
(19, 'yash', 'singh', 'abc', 'abc@gmail.com', '$2y$10$xUjWWzbRsbzgkOAQxjlUJO/7LEnNGFLWoUrGHd9YV8McMO/TzG5jq', 0),
(20, 'user', 'user', 'userid', 'usermailid@gmail.com', '$2y$10$a3JqW.wxF9ReAXxO3Bklbux6z//QS5YQEl2zMP9hIa6.e7RJvbk3K', 0),
(21, 'test', 'again', 'testagain', 'testagain@gmail.com', '$2y$10$EAOm8p/Z4ihp.7HIyd/3meRpfagoDnXZvmDSwwF3Q4xYeIJHKRbkW', 0),
(22, 'verified', 'verified', 'verified', 'verified@gmail.com', '$2y$10$dHulcey3/p9aS0q0KC9STueB/OWHdQC/Gd5wVr3oGCfOPcccL.cCe', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
