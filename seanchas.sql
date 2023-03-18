-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 06:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stat` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `stories` (`id`, `title`, `cat`, `loc`, `image`, `Description`, `user_id`, `stat`) VALUES
(1, 'Intriguing Pocket Watch', 'Object', 'Aberdeen City', 'intriguing_objects_pocket_watch.jpg', 'This is some placeholder content for the custom component. It is intended to mimic what some real-world content would look like.', 1, 1);


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
(3, 'Jane', 'Don', 'janedon2001@yahoo.com', '$2y$10$3WvzQ7zAr...ACm3aJXEGeeyfzhhJssNajIBpLA9WkCLBmo7gMNIG', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `u_admin`
--
ALTER TABLE `u_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

