-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 12:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `moduleName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `moduleName`) VALUES
(0, 'school question '),
(2, 'funny question'),
(3, 'daily question');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `posttext` text NOT NULL,
  `postdate` date NOT NULL,
  `uploads` varchar(50) NOT NULL,
  `moduleid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `posttext`, `postdate`, `uploads`, `moduleid`, `userid`) VALUES
(23, '        How is the weather today        ', '2024-12-13', 'Chicken.jpg', 3, 2),
(24, '                                    This friend sleeps well but class is in session                                    ', '2024-12-13', 'taingu.jpg', 0, 1),
(26, 'Does anyone know any interesting games?', '2024-12-13', 'Chicken.jpg', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'tai', '', ''),
(2, 'hoa', '', ''),
(3, 'thanh', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `moduleid` (`moduleid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`moduleid`) REFERENCES `module` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
