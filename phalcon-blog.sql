-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2018 at 06:55 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.1.16-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phalcon-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_posts` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `file` text,
  `kategori` enum('gaya hidup','kesehatan','olahraga','teknologi','pendidikan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_posts`, `id_users`, `title`, `description`, `file`, `kategori`) VALUES
(5, 1, 'workshop batu akik invinity', 'TIF UIN SUSKA bekerja sama dengan toni stark dan juga SUPARMAN dari DC . Mereka mengadakan workshop batu akik untuk mempersiapkan batu akik sebelum lomba', '06-42-58_09-05-2018_220px-Avengers_Infinity_War_soundtrack_cover.jpg', 'gaya hidup'),
(6, 7, 'batu akik', 'lomba batu akik dengan kekuatan menabjubkan dimenangkan oleh tanos', '06-17-21_09-05-2018_untitled-5-1511899505810_270h.jpg', 'gaya hidup');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` text,
  `hak_akses` enum('administrator','blogger') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`, `hak_akses`) VALUES
(1, 'circlenode blogger', 'circlenode', '56d8489f1bde8f2cc4c46f298590f978', 'blogger'),
(2, 'admin ganteng', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(7, 'runi', 'runi', '9fe62835fd2c9e88e7d40db64c2fe859', 'blogger'),
(8, 'cece', 'cece', 'b4ea23a368b20bc1623e058f392f1fe4', 'blogger');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_posts`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_posts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
