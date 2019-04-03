-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 04:10 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `title_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `user_id`, `title_message`, `description_message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Test 3', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 10:48:34', '0000-00-00 00:00:00'),
(2, 2, 'Test 4', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 10:48:19', '0000-00-00 00:00:00'),
(3, 2, 'Test 5', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 10:49:23', '0000-00-00 00:00:00'),
(4, 2, 'Test 4', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:01:06', '0000-00-00 00:00:00'),
(5, 2, 'Test 6', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:03:26', '0000-00-00 00:00:00'),
(6, 2, 'Test abcd', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:05:46', '0000-00-00 00:00:00'),
(7, 2, 'TEst 9', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:06:22', '0000-00-00 00:00:00'),
(8, 2, 'TEst 9', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:06:35', '0000-00-00 00:00:00'),
(13, 2, 'TEst 14', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:11:06', '0000-00-00 00:00:00'),
(14, 2, 'Test 19', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:12:11', '0000-00-00 00:00:00'),
(15, 2, 'Test 19', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:12:13', '0000-00-00 00:00:00'),
(16, 2, 'Test 11', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:13:53', '0000-00-00 00:00:00'),
(17, 2, 'Test abcd', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui', 1, '2019-04-01 11:28:55', '0000-00-00 00:00:00'),
(18, 2, 'Test Abcd ', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-03 03:25:05', '0000-00-00 00:00:00'),
(25, 2, 'TEst 123', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-01 11:51:37', '0000-00-00 00:00:00'),
(26, 2, 'Test', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-03 03:24:16', '0000-00-00 00:00:00'),
(27, 3, 'Test', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-03 03:25:18', '0000-00-00 00:00:00'),
(28, 3, 'Test 123', 'Nemo enim ipsam viluptatem quia voluptas sit aspermatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui.', 1, '2019-04-03 03:30:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(5) NOT NULL DEFAULT '0',
  `user_type` int(5) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_login`, `user_pass`, `user_email`, `user_registered`, `user_activation_key`, `user_status`, `user_type`, `created_at`, `updated_at`) VALUES
(2, 'Nikkou Le', '123456', 'anhvuckm@gmail.com', '0000-00-00 00:00:00', '', 1, 1, '2019-04-02 03:28:01', '0000-00-00 00:00:00'),
(3, 'Janie Jones', '123456', 'janie@gmail.com', '0000-00-00 00:00:00', '', 1, 2, '2019-04-02 03:28:01', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
