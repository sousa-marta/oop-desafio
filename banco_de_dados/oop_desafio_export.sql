-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2019 at 09:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_desafio`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--
CREATE DATABASE oop_desafio;
USE oop_desafio;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `likes` int(11) DEFAULT 0,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `description`, `likes`, `id_user`) VALUES
(1, 'views/img/DER-oop-desafio.png', 'DER do Banco de Dados', 0, 1),
(5, 'views/img/teste.png', 'Primeira foto de um buraco negro', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `encPass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `encPass`) VALUES
(1, 'Marta', 'Sousa', 'msousa', '$2y$10$EbZ8zIveTYeiBPIrcS58I.a8H6rE.EwbXm/FNCP58I/yQRvZmn5iu'),
(2, 'Maria', 'da Silva', 'msilva', '$2y$10$zlhjq5ZcOCW2dJbXbp/hRODcxiGHGZCQMUTBklIg8AnixZUKMDaDi'),
(4, 'John', 'Doe', 'jdoe', '$2y$10$u5HlBBV3MIvGjRgsYydoxOwsNnn0j1kBJRCOx6ZKVTRVQ55P73i5.'),
(9, 'Jane', 'Doe', 'janedoe', '$2y$10$EFwquKyC9W2m8qKjuQ4bD.aL.nVMTsmZnzZfGP2YtSiPkv3HAogHi'),
(11, 'Maria', 'José', 'mariajose', '$2y$10$DCC3Id6ldpmXAbIW7hW9.eVaSS8l6dxxjN25.bPYGB0nG2RT7HN2W'),
(12, 'joao', 'silva', 'joaosilva', '$2y$10$GuY6y39iPhwBhTdJT9m1Pu0vF9ARm8IItT.i.tB0/pM5NmWRe/IvS'),
(14, 'carlos', 'magno', 'carlosmagno', '$2y$10$GT/ANHHLms6CW87XHOMlfOibdKRRqk9yvIsJpEc20hv5U.YijV5zS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
