-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2017 at 06:20 AM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `predict`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(256) NOT NULL,
  `game_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game`, `game_date`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 'chelsea vs arsenal', '2017-09-07', 5, '2017-09-02 03:20:21', '2017-09-02 03:20:21'),
(2, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:41:18', '2017-09-02 03:41:18'),
(3, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:45:33', '2017-09-02 03:45:33'),
(4, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:45:37', '2017-09-02 03:45:37'),
(5, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:50:54', '2017-09-02 03:50:54'),
(6, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:51:28', '2017-09-02 03:51:28'),
(7, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:52:52', '2017-09-02 03:52:52'),
(8, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:53:24', '2017-09-02 03:53:24'),
(9, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:53:49', '2017-09-02 03:53:49'),
(10, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:54:20', '2017-09-02 03:54:20'),
(11, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:55:44', '2017-09-02 03:55:44'),
(12, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:56:20', '2017-09-02 03:56:20'),
(13, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:57:22', '2017-09-02 03:57:22'),
(14, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:57:33', '2017-09-02 03:57:33'),
(15, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:58:10', '2017-09-02 03:58:10'),
(16, 'Chelsea - Manchester United', '2017-09-07', 5, '2017-09-02 03:58:41', '2017-09-02 03:58:41'),
(17, 'Chelsea - Manchester United', '2017-09-03', 5, '2017-09-02 04:16:03', '2017-09-02 04:16:03'),
(18, 'chelsea vs arsenal', '2017-09-13', 5, '2017-09-02 04:19:56', '2017-09-02 04:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `make_free_predict`
--

DROP TABLE IF EXISTS `make_free_predict`;
CREATE TABLE IF NOT EXISTS `make_free_predict` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make_free_predict`
--

INSERT INTO `make_free_predict` (`id`, `user_id`, `count`, `updated_at`, `created_at`) VALUES
(1, 3, 2, '2017-09-01 21:21:26', '2017-09-01 21:21:26'),
(2, 4, 2, '2017-09-01 21:29:09', '2017-09-01 21:29:09'),
(3, 5, 2, '2017-09-01 21:40:08', '2017-09-01 21:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `predictions`
--

DROP TABLE IF EXISTS `predictions`;
CREATE TABLE IF NOT EXISTS `predictions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `prediction_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predictions`
--

INSERT INTO `predictions` (`id`, `game_id`, `prediction_id`, `updated_at`, `created_at`) VALUES
(1, 15, 1, '2017-09-02 03:58:10', '2017-09-02 03:58:10'),
(2, 16, 1, '2017-09-02 03:58:41', '2017-09-02 03:58:41'),
(3, 16, 5, '2017-09-02 03:58:41', '2017-09-02 03:58:41'),
(4, 16, 6, '2017-09-02 03:58:41', '2017-09-02 03:58:41'),
(5, 17, 2, '2017-09-02 04:16:03', '2017-09-02 04:16:03'),
(6, 17, 3, '2017-09-02 04:16:03', '2017-09-02 04:16:03'),
(7, 17, 4, '2017-09-02 04:16:03', '2017-09-02 04:16:03'),
(8, 18, 2, '2017-09-02 04:19:56', '2017-09-02 04:19:56'),
(9, 18, 4, '2017-09-02 04:19:56', '2017-09-02 04:19:56'),
(10, 18, 5, '2017-09-02 04:19:56', '2017-09-02 04:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `prediction_codes`
--

DROP TABLE IF EXISTS `prediction_codes`;
CREATE TABLE IF NOT EXISTS `prediction_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `definition` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prediction_codes`
--

INSERT INTO `prediction_codes` (`id`, `code`, `definition`) VALUES
(1, '1', 'Home Win'),
(2, '2', 'Away Win'),
(3, 'X', 'Draw'),
(4, 'HT1', 'Half Time Home Win'),
(5, 'HT2', 'Half Time Away Win'),
(6, 'HTX', 'Half Time Draw');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `subscription_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'john doe', 'john@gmail.com', '$2y$10$EvU7KKKPRBpL0XBVo.8Ti.r1pHL8FzJ05bzYMirAbPXqH/Io9u6O6', 'nOX8kyi9NFF1K2jxjd8sxz8YWdER98AxM1rxoyra0LD1CSHH4X9xkMTe27S2', '2017-09-01 21:05:18', '2017-09-01 21:05:18'),
(2, 'admin admin', 'admin4@gmail.com', '$2y$10$ow78g0sZZSy4fGUw3WcEo.5LQ.AUZEsDqRSi.EUsqXfMFdHLOUJQO', NULL, '2017-09-01 21:17:59', '2017-09-01 21:17:59'),
(3, 'admin admin', 'admin1@gmail.com', '$2y$10$ELdGxs5ckG4suHkWylhJa.MJSTQoJ2H9ztFroeZF20XnovKbf/nwK', NULL, '2017-09-01 21:21:26', '2017-09-01 21:21:26'),
(4, 'admin admin', 'admin2@gmail.com', '$2y$10$JqxyN1GpLunNb4qf44gW6OQ.ol8po.L/i6u.J3C1uUfruca43Mshq', NULL, '2017-09-01 21:29:09', '2017-09-01 21:29:09'),
(5, 'admin admin', 'admin@gmail.com', '$2y$10$0u/gBuyGcok3BdQnsivMMOPPcHY/xYFzPE.P36roA56Qg/YqvpTIG', 'E949unQSqJMT7WGvqPyzaSjb427l3GJcjJlwrwttPzvCm7Sp7RyUu0VWSwxm', '2017-09-01 21:40:08', '2017-09-01 21:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `view_free_predict`
--

DROP TABLE IF EXISTS `view_free_predict`;
CREATE TABLE IF NOT EXISTS `view_free_predict` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_free_predict`
--

INSERT INTO `view_free_predict` (`id`, `user_id`, `count`, `updated_at`, `created_at`) VALUES
(1, 3, 2, '2017-09-01 21:21:26', '2017-09-01 21:21:26'),
(2, 4, 2, '2017-09-01 21:29:09', '2017-09-01 21:29:09'),
(3, 5, 2, '2017-09-01 21:40:08', '2017-09-01 21:40:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
