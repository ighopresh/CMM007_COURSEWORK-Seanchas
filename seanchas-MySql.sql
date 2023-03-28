-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 08:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seanchas`
--

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `descript` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `stat` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `cat`, `loc`, `img`, `descript`, `user_id`, `stat`) VALUES
(1, 'Intriguing Pocket Watch', 'Object', 'Aberdeen City', 'intriguing_objects_pocket_watch.jpg', 'This is some placeholder content for the custom component. It is intended to mimic what some real-world content would look like.', 1, 1),
(4, 'Intriguing Objects Violin', 'Object', 'Edinburgh (City of)', 'intriguing_objects_violin.jpg', 'Over 70 different pieces of wood are put together to form the modern violin. The word violin comes from the Medieval Latin word vitula, meaning stringed instrument, and graduated into the family of Viols. The world record in cycling backwards playing a violin is 60.45 kilometres in 5 hours 8 seconds.', 1, 1),
(6, 'Biggest Castle in Scotland', 'Place', 'Edinburgh (City of)', 'SD.jpg', 'The largest castle in Scotland is Edinburgh Castle. This iconic structure looms over the capital city, resting atop an ancient, dormant volcano. The craggy rock face leading up toward the castle is as intimidating as it is picturesque.\nThere is no shorta', 1, 1),
(7, 'history of library', 'Place', 'Angus', 'Facts-about-Scotland-1.jpg', '         could transform themselves from seal to human form and back again. The legend of the selkie apparently originated on the Orkney and Shetland Islands where selch or selk(ie) is the Scots word for seal. Tales once abounded of a man who found a beautiful female selkie sunbathing on a beach, stole her skin and forced her to become his wife and bear his children. The selkie woman was often seen gazing lovingly at the ocean. Years later, the selkie found her skin and later escaped back to seal form and to the sea, leaving her own children behind, never to return.\r\n\r\nSome versions of the legend say that the selkie revisits her children on land once a year, others say that the children would witness a large seal approach them and say hello.\r\n\r\nA Shetland version of the tale about the selkie compelled to become a human wife was published in 1822. In this edition, the selkie already had a husband of her own kind in the ocean before she was forced to stay on land. Some stories from Shetland have selkies luring islanders into the sea at midsummer, the lovelorn humans never returning to dry land.                     ', 4, 1),
(8, 'aberdeen land', 'Place', 'Aberdeen City', 'Facts-about-Scotland-4.jpg', 'Facts about Scotland\r\nOfficial name: Scotland, Alba\r\n\r\nForm of government: constitutional monarchy\r\n\r\nCapital city: Edinburgh\r\n\r\nLargest city: Glasgow\r\n\r\nPopulation: around 5.2 million\r\n\r\nMonetary unit: Pound sterling (GBP)\r\n\r\nOfficial languages: English/Gaelic/Scots\r\n\r\nArea: 78,772 km² (30,414 sq mi)\r\n\r\nMajor mountain ranges: Southern Uplands, Central Lowlands, Grampian Mountains, North West Highlands\r\n\r\nMajor rivers: River Tay, River Spey, River Dee, River Tweed, River Clyde', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(128) NOT NULL,
  `l_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `stat` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `password_hash`, `stat`) VALUES
(1, 'Precious', 'Omega', 'precious200@gmail.com', '$2y$10$QRgYDeCA7ymkgXp6YAT.1ODK4Ca9AOADjQvlaKNtDwia5JNwX83cK', 1),
(2, 'John', 'Doe', 'johndoe99@gmail.com', '$2y$10$QRgYDeCA7ymkgXp6YAT.1ODK4Ca9AOADjQvlaKNtDwia5JNwX83cK', 1),
(4, 'the', 'girl', 'thegirl@yahoo.com', '$2y$10$Z0fTsu0XfSUK6GubyGiXD.9KRzy9Fm.GFsZeRVEwuEJLVqbPwKGMi', 1),
(5, 'the', 'girl', 'thegirl@gmail.com', '$2y$10$izCvbzb2DQnhFvT2ZKDAEuo51adUnIkrCA5bJJq00PcFU71EOynJW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `u_admin`
--

CREATE TABLE `u_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `u_admin`
--

INSERT INTO `u_admin` (`id`, `username`, `email`, `pass_hash`) VALUES
(1, 'Ighomon', 'admin001@gmail.com', '$2y$10$AsAvyR6E6qQBajlB/ksFGOM.3hFfXwcoe6BuAmIXcbr8S0OOPl.Au');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `u_admin`
--
ALTER TABLE `u_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `u_admin`
--
ALTER TABLE `u_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
