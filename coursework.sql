-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2025 at 10:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursework`
--

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `moduleName` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `moduleName`, `user`) VALUES
(1, 'funny joke', '1'),
(2, 'ahuhu', '2'),
(3, 'aleule', '3'),
(4, 'happier', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `name`, `email`, `role`, `password`) VALUES
(1, 'Canna', 'cananambonai@gmail.com', 'admin', '$2y$10$afWz2i3iYeiOnhfxk6BGBO4OknkTGwh0yBj4Fxr28O40zMyRTK1mG'),
(2, 'Kim Chong Un', 'kimyunsalt@gmail.com', 'user', '$2y$10$uvOfCCSxOTY63BGqrBe.h.9TXfeRGFNVedqmSKjmSsM8x6AlS7wJa'),
(4, 'Uyen', 'uyenhdtgcs230534@fpt.edu.vn', 'user', '$2y$10$hxZr2bkdpLaj8QzTeS2EeeEYHK4Xdfp9fvei0cf1w/w24SjQ2sw2a'),
(5, 'Nana', 'nananambonai@gmail.com', 'admin', '$2y$10$eYFdYdGjlgNCm1BTWFMhfu/tEfPfdTSjzpOS54sj7BmHguug700mC');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `questiontext` varchar(255) DEFAULT NULL,
  `questiondate` date DEFAULT NULL,
  `postid` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `questiontext`, `questiondate`, `postid`, `image`, `moduleid`) VALUES
(15, 'sbdjsjd', '2025-04-26', 2, 'penguin3.png', 1),
(16, 'sjkwkjdgdw', '2025-04-26', 2, 'penguin1.png', 2),
(18, 'sjhvghsvghw', '2025-04-26', 1, 'penguin4.png', 1),
(19, 'gừhqwfhswqjfsj', '2025-04-26', 1, 'penguin1.png', 1),
(22, 'gfyftyftd6', '2025-04-28', 1, 'penguin3.png\r\n', 1),
(23, 'happy quá điiiiii', '2025-04-28', 2, 'penguin1.png', 2),
(26, 'ghegdgeqgd', '2025-04-28', 2, 'penguin5.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorid` (`postid`),
  ADD KEY `categoryid` (`moduleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`moduleid`) REFERENCES `module` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`postid`) REFERENCES `post` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
