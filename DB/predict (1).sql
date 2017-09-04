-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2017 at 02:32 AM
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
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People''s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

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
(17, 'Chelsea - Manchester United', '2017-09-02', 1, '2017-09-02 04:16:03', '2017-09-02 04:16:03'),
(18, 'chelsea vs arsenal', '2017-09-13', 1, '2017-09-02 04:19:56', '2017-09-02 04:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `graded_games`
--

DROP TABLE IF EXISTS `graded_games`;
CREATE TABLE IF NOT EXISTS `graded_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `predictor_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `graded_games`
--

INSERT INTO `graded_games` (`id`, `game_id`, `user_id`, `predictor_id`, `grade_id`, `updated_at`, `created_at`) VALUES
(1, 18, 5, 0, 0, '2017-09-03 23:42:39', '2017-09-03 23:42:39'),
(3, 18, 5, 0, 0, '2017-09-04 00:00:00', '2017-09-04 00:00:00'),
(4, 18, 5, 0, 0, '2017-09-04 00:32:01', '2017-09-04 00:32:01'),
(5, 18, 5, 0, 0, '2017-09-04 00:32:59', '2017-09-04 00:32:59'),
(6, 18, 5, 0, 0, '2017-09-04 00:34:04', '2017-09-04 00:34:04'),
(7, 18, 5, 0, 0, '2017-09-04 00:42:04', '2017-09-04 00:42:04'),
(8, 18, 5, 0, 0, '2017-09-04 00:43:01', '2017-09-04 00:43:01'),
(9, 18, 5, 0, 0, '2017-09-04 00:43:52', '2017-09-04 00:43:52'),
(10, 18, 5, 0, 0, '2017-09-04 00:45:29', '2017-09-04 00:45:29'),
(11, 18, 5, 0, 0, '2017-09-04 00:46:17', '2017-09-04 00:46:17'),
(12, 18, 5, 0, 0, '2017-09-04 00:47:33', '2017-09-04 00:47:33'),
(13, 18, 5, 0, 0, '2017-09-04 00:52:27', '2017-09-04 00:52:27'),
(14, 18, 5, 0, 0, '2017-09-04 01:05:56', '2017-09-04 01:05:56'),
(15, 18, 5, 0, 0, '2017-09-04 01:06:21', '2017-09-04 01:06:21'),
(16, 18, 5, 0, 0, '2017-09-04 01:08:18', '2017-09-04 01:08:18'),
(17, 18, 5, 0, 0, '2017-09-04 01:09:00', '2017-09-04 01:09:00'),
(18, 18, 5, 0, 0, '2017-09-04 01:11:46', '2017-09-04 01:11:46'),
(19, 18, 5, 0, 0, '2017-09-04 01:13:05', '2017-09-04 01:13:05'),
(20, 18, 5, 0, 0, '2017-09-04 01:13:24', '2017-09-04 01:13:24'),
(21, 18, 5, 0, 0, '2017-09-04 01:14:01', '2017-09-04 01:14:01'),
(22, 18, 5, 0, 0, '2017-09-04 01:14:52', '2017-09-04 01:14:52'),
(23, 18, 5, 0, 0, '2017-09-04 01:15:16', '2017-09-04 01:15:16'),
(24, 16, 5, 1, 1, '2017-09-04 01:15:44', '2017-09-04 01:15:44'),
(25, 17, 5, 1, 2, '2017-09-04 01:15:50', '2017-09-04 01:15:50'),
(26, 18, 5, 1, 2, '2017-09-04 01:16:50', '2017-09-04 01:16:50'),
(27, 18, 5, 0, 0, '2017-09-04 01:16:57', '2017-09-04 01:16:57'),
(28, 18, 5, 0, 0, '2017-09-04 01:17:03', '2017-09-04 01:17:03'),
(29, 18, 5, 0, 0, '2017-09-04 01:17:09', '2017-09-04 01:17:09'),
(30, 18, 5, 0, 0, '2017-09-04 01:18:29', '2017-09-04 01:18:29'),
(31, 18, 5, 0, 0, '2017-09-04 01:19:26', '2017-09-04 01:19:26'),
(32, 18, 5, 0, 0, '2017-09-04 01:19:44', '2017-09-04 01:19:44'),
(33, 18, 5, 0, 0, '2017-09-04 01:19:55', '2017-09-04 01:19:55'),
(34, 18, 5, 0, 0, '2017-09-04 01:21:32', '2017-09-04 01:21:32'),
(35, 18, 5, 0, 0, '2017-09-04 01:22:23', '2017-09-04 01:22:23'),
(36, 18, 5, 0, 0, '2017-09-04 01:22:50', '2017-09-04 01:22:50'),
(37, 18, 5, 0, 0, '2017-09-04 01:23:12', '2017-09-04 01:23:12'),
(38, 18, 5, 0, 0, '2017-09-04 01:24:44', '2017-09-04 01:24:44'),
(39, 18, 5, 0, 0, '2017-09-04 01:25:38', '2017-09-04 01:25:38');

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
-- Table structure for table `make_prediction_category`
--

DROP TABLE IF EXISTS `make_prediction_category`;
CREATE TABLE IF NOT EXISTS `make_prediction_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make_prediction_category`
--

INSERT INTO `make_prediction_category` (`id`, `category`) VALUES
(1, 'freemium'),
(2, 'premium');

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
-- Table structure for table `sys_grades`
--

DROP TABLE IF EXISTS `sys_grades`;
CREATE TABLE IF NOT EXISTS `sys_grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_grades`
--

INSERT INTO `sys_grades` (`id`, `code`) VALUES
(1, 'poor'),
(2, 'good'),
(3, 'expert');

-- --------------------------------------------------------

--
-- Table structure for table `sys_ratings`
--

DROP TABLE IF EXISTS `sys_ratings`;
CREATE TABLE IF NOT EXISTS `sys_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `poor` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `expert` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_ratings`
--

INSERT INTO `sys_ratings` (`id`, `user_id`, `poor`, `good`, `expert`, `updated_at`, `created_at`) VALUES
(1, 5, 1, 0, 0, '2017-09-03 12:22:34', '2017-09-03 12:22:34'),
(2, 1, 36, 30, 30, '2017-09-12 00:00:00', '2017-09-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_rating` int(11) NOT NULL,
  `make_prediction_category` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `country`, `email`, `user_rating`, `make_prediction_category`, `password`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'john doe', 1, 'john@gmail.com', 3, 1, '$2y$10$EvU7KKKPRBpL0XBVo.8Ti.r1pHL8FzJ05bzYMirAbPXqH/Io9u6O6', 'nOX8kyi9NFF1K2jxjd8sxz8YWdER98AxM1rxoyra0LD1CSHH4X9xkMTe27S2', '2017-09-01 21:05:18', '2017-09-01 21:05:18'),
(2, 'admin admin', 0, 'admin4@gmail.com', 0, 0, '$2y$10$ow78g0sZZSy4fGUw3WcEo.5LQ.AUZEsDqRSi.EUsqXfMFdHLOUJQO', NULL, '2017-09-01 21:17:59', '2017-09-01 21:17:59'),
(3, 'admin admin', 0, 'admin1@gmail.com', 0, 0, '$2y$10$ELdGxs5ckG4suHkWylhJa.MJSTQoJ2H9ztFroeZF20XnovKbf/nwK', NULL, '2017-09-01 21:21:26', '2017-09-01 21:21:26'),
(4, 'admin admin', 0, 'admin2@gmail.com', 0, 0, '$2y$10$JqxyN1GpLunNb4qf44gW6OQ.ol8po.L/i6u.J3C1uUfruca43Mshq', NULL, '2017-09-01 21:29:09', '2017-09-01 21:29:09'),
(5, 'admin admin', 0, 'admin@gmail.com', 1, 0, '$2y$10$0u/gBuyGcok3BdQnsivMMOPPcHY/xYFzPE.P36roA56Qg/YqvpTIG', 'B8NI9UVOv6oQUAvZxxmIqH85dMvE0ksfTVD0vkhMLGlgqf45qgRgrNKsDwkS', '2017-09-01 21:40:08', '2017-09-01 21:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

DROP TABLE IF EXISTS `user_category`;
CREATE TABLE IF NOT EXISTS `user_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `category`) VALUES
(1, 'freemium'),
(2, 'premium');

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
