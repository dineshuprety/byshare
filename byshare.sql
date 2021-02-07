-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2021 at 07:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `byshare_profile_details`
--

CREATE TABLE `byshare_profile_details` (
  `byshare_profile_details_id` int(11) NOT NULL,
  `byshare_id` int(11) NOT NULL,
  `byshare_profile_details_fname` varchar(50) NOT NULL,
  `byshare_profile_details_lname` varchar(50) NOT NULL,
  `byshare_profile_details_username` varchar(100) NOT NULL,
  `byshare_profile_details_profile_pic` varchar(255) NOT NULL,
  `byshare_profile_details_dob` date NOT NULL,
  `byshare_profile_details_skill` varchar(100) NOT NULL,
  `byshare_profile_details_phone_num` varchar(15) NOT NULL,
  `byshare_profile_details_country` varchar(100) NOT NULL,
  `byshare_profile_details_member` date NOT NULL,
  `byshare_profile_details_gender` varchar(10) NOT NULL,
  `byshare_profile_details_your_info` text NOT NULL,
  `online_users` bigint(20) NOT NULL,
  `user_close` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `byshare_profile_details`
--

INSERT INTO `byshare_profile_details` (`byshare_profile_details_id`, `byshare_id`, `byshare_profile_details_fname`, `byshare_profile_details_lname`, `byshare_profile_details_username`, `byshare_profile_details_profile_pic`, `byshare_profile_details_dob`, `byshare_profile_details_skill`, `byshare_profile_details_phone_num`, `byshare_profile_details_country`, `byshare_profile_details_member`, `byshare_profile_details_gender`, `byshare_profile_details_your_info`, `online_users`, `user_close`) VALUES
(1, 1, 'Dinesh', 'Uprety', 'dinesh_uprety', '5f8f9bff38cf8code.png', '2000-05-29', 'Programming', '9807393225', 'Nepal', '2020-10-21', 'Male', 'Hi, I am a full stack developer. I am a freelancer developer. if anyone wanna hire me she/he can visit my website: https://dineshuprety.com.np', 1612193382, 'no'),
(2, 3, 'Nep', 'Uprety', 'dinesh_uprety_0', '5f8f9eaca8992weed.jpg', '2000-05-29', 'node.js', '9807393225', 'Nepal', '2020-10-21', 'Male', 'Hi, I am a full stack developer. I am a freelancer developer. if anyone wanna hire me she/he can visit my website: https://dineshuprety.com.np', 1610261300, 'no'),
(3, 2, 'Dynamic', 'Hacker', 'dynamic_hacker', '5fce58985b5b0photo.jpg', '2000-05-29', 'Eithcal hacking', '9807393225', 'Nepal', '2020-10-21', 'Male', 'Hi, I am a nephacke(Dhacker). I work for government to secure there website and database thank you :)!', 1612193392, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `byshare_users`
--

CREATE TABLE `byshare_users` (
  `byshare_id` int(11) NOT NULL,
  `byshare_email` varchar(100) NOT NULL,
  `byshare_password` varchar(100) NOT NULL,
  `byshare_close_user` varchar(3) NOT NULL,
  `byshare_status` bigint(20) NOT NULL,
  `byshare_setup_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `byshare_users`
--

INSERT INTO `byshare_users` (`byshare_id`, `byshare_email`, `byshare_password`, `byshare_close_user`, `byshare_status`, `byshare_setup_status`) VALUES
(1, 'coffeecoder500@gmail.com', '$2y$10$1J4lOenQsZIS3JLIjuWDA.PDP02HYgdDXjTyBPXFLGkT6HLwyXEyW', 'no', 0, 1),
(2, 'nepha6ker@gmail.com', '$2y$10$xVrS1ppDyZZ9zFfiSe64pODGzC1/bM8EJotDrx/UcpmVwb9RLlaUi', 'no', 0, 1),
(3, 'dineshuprety500@gmail.com', '$2y$10$NUK.kb7FQb7rzbt0IFlZP.PP6pf04o4hFuDN19Fl.bWPql17M3Wiy', 'no', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `iso`, `country_name`, `iso3`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 'AFG', 93),
(2, 'AX', 'Aland Islands', 'ALA', 358),
(3, 'AL', 'Albania', 'ALB', 355),
(4, 'DZ', 'Algeria', 'DZA', 213),
(5, 'AS', 'American Samoa', 'ASM', 1684),
(6, 'AD', 'Andorra', 'AND', 376),
(7, 'AO', 'Angola', 'AGO', 244),
(8, 'AI', 'Anguilla', 'AIA', 1264),
(9, 'AQ', 'Antarctica', 'ATA', 0),
(10, 'AG', 'Antigua and Barbuda', 'ATG', 1268),
(11, 'AR', 'Argentina', 'ARG', 54),
(12, 'AM', 'Armenia', 'ARM', 374),
(13, 'AW', 'Aruba', 'ABW', 297),
(14, 'AU', 'Australia', 'AUS', 61),
(15, 'AT', 'Austria', 'AUT', 43),
(16, 'AZ', 'Azerbaijan', 'AZE', 994),
(17, 'BS', 'Bahamas', 'BHS', 1242),
(18, 'BH', 'Bahrain', 'BHR', 973),
(19, 'BD', 'Bangladesh', 'BGD', 880),
(20, 'BB', 'Barbados', 'BRB', 1246),
(21, 'BY', 'Belarus', 'BLR', 375),
(22, 'BE', 'Belgium', 'BEL', 32),
(23, 'BZ', 'Belize', 'BLZ', 501),
(24, 'BJ', 'Benin', 'BEN', 229),
(25, 'BM', 'Bermuda', 'BMU', 1441),
(26, 'BT', 'Bhutan', 'BTN', 975),
(27, 'BO', 'Bolivia', 'BOL', 591),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'BES', 599),
(29, 'BA', 'Bosnia and Herzegovina', 'BIH', 387),
(30, 'BW', 'Botswana', 'BWA', 267),
(31, 'BV', 'Bouvet Island', 'BVT', 0),
(32, 'BR', 'Brazil', 'BRA', 55),
(33, 'IO', 'British Indian Ocean Territory', 'IOT', 246),
(34, 'BN', 'Brunei Darussalam', 'BRN', 673),
(35, 'BG', 'Bulgaria', 'BGR', 359),
(36, 'BF', 'Burkina Faso', 'BFA', 226),
(37, 'BI', 'Burundi', 'BDI', 257),
(38, 'KH', 'Cambodia', 'KHM', 855),
(39, 'CM', 'Cameroon', 'CMR', 237),
(40, 'CA', 'Canada', 'CAN', 1),
(41, 'CV', 'Cape Verde', 'CPV', 238),
(42, 'KY', 'Cayman Islands', 'CYM', 1345),
(43, 'CF', 'Central African Republic', 'CAF', 236),
(44, 'TD', 'Chad', 'TCD', 235),
(45, 'CL', 'Chile', 'CHL', 56),
(46, 'CN', 'China', 'CHN', 86),
(47, 'CX', 'Christmas Island', 'CXR', 61),
(48, 'CC', 'Cocos (Keeling) Islands', 'CCK', 672),
(49, 'CO', 'Colombia', 'COL', 57),
(50, 'KM', 'Comoros', 'COM', 269),
(51, 'CG', 'Congo', 'COG', 242),
(52, 'CD', 'Congo, the Democratic Republic of the', 'COD', 242),
(53, 'CK', 'Cook Islands', 'COK', 682),
(54, 'CR', 'Costa Rica', 'CRI', 506),
(55, 'CI', 'Cote D\'Ivoire', 'CIV', 225),
(56, 'HR', 'Croatia', 'HRV', 385),
(57, 'CU', 'Cuba', 'CUB', 53),
(58, 'CW', 'Curacao', 'CUW', 599),
(59, 'CY', 'Cyprus', 'CYP', 357),
(60, 'CZ', 'Czech Republic', 'CZE', 420),
(61, 'DK', 'Denmark', 'DNK', 45),
(62, 'DJ', 'Djibouti', 'DJI', 253),
(63, 'DM', 'Dominica', 'DMA', 1767),
(64, 'DO', 'Dominican Republic', 'DOM', 1809),
(65, 'EC', 'Ecuador', 'ECU', 593),
(66, 'EG', 'Egypt', 'EGY', 20),
(67, 'SV', 'El Salvador', 'SLV', 503),
(68, 'GQ', 'Equatorial Guinea', 'GNQ', 240),
(69, 'ER', 'Eritrea', 'ERI', 291),
(70, 'EE', 'Estonia', 'EST', 372),
(71, 'ET', 'Ethiopia', 'ETH', 251),
(72, 'FK', 'Falkland Islands (Malvinas)', 'FLK', 500),
(73, 'FO', 'Faroe Islands', 'FRO', 298),
(74, 'FJ', 'Fiji', 'FJI', 679),
(75, 'FI', 'Finland', 'FIN', 358),
(76, 'FR', 'France', 'FRA', 33),
(77, 'GF', 'French Guiana', 'GUF', 594),
(78, 'PF', 'French Polynesia', 'PYF', 689),
(79, 'TF', 'French Southern Territories', 'ATF', 0),
(80, 'GA', 'Gabon', 'GAB', 241),
(81, 'GM', 'Gambia', 'GMB', 220),
(82, 'GE', 'Georgia', 'GEO', 995),
(83, 'DE', 'Germany', 'DEU', 49),
(84, 'GH', 'Ghana', 'GHA', 233),
(85, 'GI', 'Gibraltar', 'GIB', 350),
(86, 'GR', 'Greece', 'GRC', 30),
(87, 'GL', 'Greenland', 'GRL', 299),
(88, 'GD', 'Grenada', 'GRD', 1473),
(89, 'GP', 'Guadeloupe', 'GLP', 590),
(90, 'GU', 'Guam', 'GUM', 1671),
(91, 'GT', 'Guatemala', 'GTM', 502),
(92, 'GG', 'Guernsey', 'GGY', 44),
(93, 'GN', 'Guinea', 'GIN', 224),
(94, 'GW', 'Guinea-Bissau', 'GNB', 245),
(95, 'GY', 'Guyana', 'GUY', 592),
(96, 'HT', 'Haiti', 'HTI', 509),
(97, 'HM', 'Heard Island and Mcdonald Islands', 'HMD', 0),
(98, 'VA', 'Holy See (Vatican City State)', 'VAT', 39),
(99, 'HN', 'Honduras', 'HND', 504),
(100, 'HK', 'Hong Kong', 'HKG', 852),
(101, 'HU', 'Hungary', 'HUN', 36),
(102, 'IS', 'Iceland', 'ISL', 354),
(103, 'IN', 'India', 'IND', 91),
(104, 'ID', 'Indonesia', 'IDN', 62),
(105, 'IR', 'Iran, Islamic Republic of', 'IRN', 98),
(106, 'IQ', 'Iraq', 'IRQ', 964),
(107, 'IE', 'Ireland', 'IRL', 353),
(108, 'IM', 'Isle of Man', 'IMN', 44),
(109, 'IL', 'Israel', 'ISR', 972),
(110, 'IT', 'Italy', 'ITA', 39),
(111, 'JM', 'Jamaica', 'JAM', 1876),
(112, 'JP', 'Japan', 'JPN', 81),
(113, 'JE', 'Jersey', 'JEY', 44),
(114, 'JO', 'Jordan', 'JOR', 962),
(115, 'KZ', 'Kazakhstan', 'KAZ', 7),
(116, 'KE', 'Kenya', 'KEN', 254),
(117, 'KI', 'Kiribati', 'KIR', 686),
(118, 'KP', 'Korea, Democratic People\"s Republic of', 'PRK', 850),
(119, 'KR', 'Korea, Republic of', 'KOR', 82),
(120, 'XK', 'Kosovo', 'XKX', 381),
(121, 'KW', 'Kuwait', 'KWT', 965),
(122, 'KG', 'Kyrgyzstan', 'KGZ', 996),
(123, 'LA', 'Lao People\'s Democratic Republic', 'LAO', 856),
(124, 'LV', 'Latvia', 'LVA', 371),
(125, 'LB', 'Lebanon', 'LBN', 961),
(126, 'LS', 'Lesotho', 'LSO', 266),
(127, 'LR', 'Liberia', 'LBR', 231),
(128, 'LY', 'Libyan Arab Jamahiriya', 'LBY', 218),
(129, 'LI', 'Liechtenstein', 'LIE', 423),
(130, 'LT', 'Lithuania', 'LTU', 370),
(131, 'LU', 'Luxembourg', 'LUX', 352),
(132, 'MO', 'Macao', 'MAC', 853),
(133, 'MK', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 389),
(134, 'MG', 'Madagascar', 'MDG', 261),
(135, 'MW', 'Malawi', 'MWI', 265),
(136, 'MY', 'Malaysia', 'MYS', 60),
(137, 'MV', 'Maldives', 'MDV', 960),
(138, 'ML', 'Mali', 'MLI', 223),
(139, 'MT', 'Malta', 'MLT', 356),
(140, 'MH', 'Marshall Islands', 'MHL', 692),
(141, 'MQ', 'Martinique', 'MTQ', 596),
(142, 'MR', 'Mauritania', 'MRT', 222),
(143, 'MU', 'Mauritius', 'MUS', 230),
(144, 'YT', 'Mayotte', 'MYT', 269),
(145, 'MX', 'Mexico', 'MEX', 52),
(146, 'FM', 'Micronesia, Federated States of', 'FSM', 691),
(147, 'MD', 'Moldova, Republic of', 'MDA', 373),
(148, 'MC', 'Monaco', 'MCO', 377),
(149, 'MN', 'Mongolia', 'MNG', 976),
(150, 'ME', 'Montenegro', 'MNE', 382),
(151, 'MS', 'Montserrat', 'MSR', 1664),
(152, 'MA', 'Morocco', 'MAR', 212),
(153, 'MZ', 'Mozambique', 'MOZ', 258),
(154, 'MM', 'Myanmar', 'MMR', 95),
(155, 'NA', 'Namibia', 'NAM', 264),
(156, 'NR', 'Nauru', 'NRU', 674),
(157, 'NP', 'Nepal', 'NPL', 977),
(158, 'NL', 'Netherlands', 'NLD', 31),
(159, 'AN', 'Netherlands Antilles', 'ANT', 599),
(160, 'NC', 'New Caledonia', 'NCL', 687),
(161, 'NZ', 'New Zealand', 'NZL', 64),
(162, 'NI', 'Nicaragua', 'NIC', 505),
(163, 'NE', 'Niger', 'NER', 227),
(164, 'NG', 'Nigeria', 'NGA', 234),
(165, 'NU', 'Niue', 'NIU', 683),
(166, 'NF', 'Norfolk Island', 'NFK', 672),
(167, 'MP', 'Northern Mariana Islands', 'MNP', 1670),
(168, 'NO', 'Norway', 'NOR', 47),
(169, 'OM', 'Oman', 'OMN', 968),
(170, 'PK', 'Pakistan', 'PAK', 92),
(171, 'PW', 'Palau', 'PLW', 680),
(172, 'PS', 'Palestinian Territory, Occupied', 'PSE', 970),
(173, 'PA', 'Panama', 'PAN', 507),
(174, 'PG', 'Papua New Guinea', 'PNG', 675),
(175, 'PY', 'Paraguay', 'PRY', 595),
(176, 'PE', 'Peru', 'PER', 51),
(177, 'PH', 'Philippines', 'PHL', 63),
(178, 'PN', 'Pitcairn', 'PCN', 0),
(179, 'PL', 'Poland', 'POL', 48),
(180, 'PT', 'Portugal', 'PRT', 351),
(181, 'PR', 'Puerto Rico', 'PRI', 1787),
(182, 'QA', 'Qatar', 'QAT', 974),
(183, 'RE', 'Reunion', 'REU', 262),
(184, 'RO', 'Romania', 'ROM', 40),
(185, 'RU', 'Russian Federation', 'RUS', 70),
(186, 'RW', 'Rwanda', 'RWA', 250),
(187, 'BL', 'Saint Barthelemy', 'BLM', 590),
(188, 'SH', 'Saint Helena', 'SHN', 290),
(189, 'KN', 'Saint Kitts and Nevis', 'KNA', 1869),
(190, 'LC', 'Saint Lucia', 'LCA', 1758),
(191, 'MF', 'Saint Martin', 'MAF', 590),
(192, 'PM', 'Saint Pierre and Miquelon', 'SPM', 508),
(193, 'VC', 'Saint Vincent and the Grenadines', 'VCT', 1784),
(194, 'WS', 'Samoa', 'WSM', 684),
(195, 'SM', 'San Marino', 'SMR', 378),
(196, 'ST', 'Sao Tome and Principe', 'STP', 239),
(197, 'SA', 'Saudi Arabia', 'SAU', 966),
(198, 'SN', 'Senegal', 'SEN', 221),
(199, 'RS', 'Serbia', 'SRB', 381),
(200, 'CS', 'Serbia and Montenegro', 'SCG', 381),
(201, 'SC', 'Seychelles', 'SYC', 248),
(202, 'SL', 'Sierra Leone', 'SLE', 232),
(203, 'SG', 'Singapore', 'SGP', 65),
(204, 'SX', 'Sint Maarten', 'SXM', 1),
(205, 'SK', 'Slovakia', 'SVK', 421),
(206, 'SI', 'Slovenia', 'SVN', 386),
(207, 'SB', 'Solomon Islands', 'SLB', 677),
(208, 'SO', 'Somalia', 'SOM', 252),
(209, 'ZA', 'South Africa', 'ZAF', 27),
(210, 'GS', 'South Georgia and the South Sandwich Islands', 'SGS', 0),
(211, 'SS', 'South Sudan', 'SSD', 211),
(212, 'ES', 'Spain', 'ESP', 34),
(213, 'LK', 'Sri Lanka', 'LKA', 94),
(214, 'SD', 'Sudan', 'SDN', 249),
(215, 'SR', 'Suriname', 'SUR', 597),
(216, 'SJ', 'Svalbard and Jan Mayen', 'SJM', 47),
(217, 'SZ', 'Swaziland', 'SWZ', 268),
(218, 'SE', 'Sweden', 'SWE', 46),
(219, 'CH', 'Switzerland', 'CHE', 41),
(220, 'SY', 'Syrian Arab Republic', 'SYR', 963),
(221, 'TW', 'Taiwan, Province of China', 'TWN', 886),
(222, 'TJ', 'Tajikistan', 'TJK', 992),
(223, 'TZ', 'Tanzania, United Republic of', 'TZA', 255),
(224, 'TH', 'Thailand', 'THA', 66),
(225, 'TL', 'Timor-Leste', 'TLS', 670),
(226, 'TG', 'Togo', 'TGO', 228),
(227, 'TK', 'Tokelau', 'TKL', 690),
(228, 'TO', 'Tonga', 'TON', 676),
(229, 'TT', 'Trinidad and Tobago', 'TTO', 1868),
(230, 'TN', 'Tunisia', 'TUN', 216),
(231, 'TR', 'Turkey', 'TUR', 90),
(232, 'TM', 'Turkmenistan', 'TKM', 7370),
(233, 'TC', 'Turks and Caicos Islands', 'TCA', 1649),
(234, 'TV', 'Tuvalu', 'TUV', 688),
(235, 'UG', 'Uganda', 'UGA', 256),
(236, 'UA', 'Ukraine', 'UKR', 380),
(237, 'AE', 'United Arab Emirates', 'ARE', 971),
(238, 'GB', 'United Kingdom', 'GBR', 44),
(239, 'US', 'United States', 'USA', 1),
(240, 'UM', 'United States Minor Outlying Islands', 'UMI', 1),
(241, 'UY', 'Uruguay', 'URY', 598),
(242, 'UZ', 'Uzbekistan', 'UZB', 998),
(243, 'VU', 'Vanuatu', 'VUT', 678),
(244, 'VE', 'Venezuela', 'VEN', 58),
(245, 'VN', 'Viet Nam', 'VNM', 84),
(246, 'VG', 'Virgin Islands, British', 'VGB', 1284),
(247, 'VI', 'Virgin Islands, U.s.', 'VIR', 1340),
(248, 'WF', 'Wallis and Futuna', 'WLF', 681),
(249, 'EH', 'Western Sahara', 'ESH', 212),
(250, 'YE', 'Yemen', 'YEM', 967),
(251, 'ZM', 'Zambia', 'ZMB', 260),
(252, 'ZW', 'Zimbabwe', 'ZWE', 263);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `messages` text NOT NULL,
  `msg_type` varchar(50) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `user_to`, `user_from`, `messages`, `msg_type`, `msg_time`, `opened`, `viewed`, `deleted`) VALUES
(1, 'dinesh_uprety', 'dinesh_uprety_0', 'hey', 'text', '2020-10-21 03:36:54', 'yes', 'yes', 'no'),
(2, 'dinesh_uprety_0', 'dynamic_hacker', 'hey', 'text', '2020-10-21 05:01:00', 'yes', 'yes', 'no'),
(3, 'dynamic_hacker', 'dinesh_uprety_0', 'hello', 'text', '2020-10-21 05:01:07', 'yes', 'yes', 'no'),
(4, 'dinesh_uprety_0', 'dynamic_hacker', 'i having problem in php code can you fix it?', 'text', '2020-10-21 05:02:08', 'yes', 'yes', 'no'),
(5, 'dynamic_hacker', 'dinesh_uprety_0', 'sure i will try my best', 'text', '2020-10-21 05:02:28', 'yes', 'yes', 'no'),
(6, 'dinesh_uprety_0', 'dynamic_hacker', 'thank you i have to go now chat you later nep hacker', 'text', '2020-10-21 05:03:14', 'yes', 'yes', 'no'),
(7, 'dinesh_uprety_0', 'dynamic_hacker', 'assets/images/emoji/001-smile.png', 'emoji', '2020-10-21 05:03:17', 'yes', 'yes', 'no'),
(8, 'dynamic_hacker', 'dinesh_uprety_0', 'see you soon', 'text', '2020-10-21 05:03:31', 'yes', 'yes', 'no'),
(9, 'dynamic_hacker', 'dinesh_uprety_0', 'you are a hacker why you need an help', 'text', '2020-10-21 05:04:07', 'yes', 'yes', 'no'),
(10, 'dinesh_uprety_0', 'dynamic_hacker', 'just i wanna hack some banks thats why hahahaha', 'text', '2020-10-21 05:04:33', 'yes', 'yes', 'no'),
(11, 'dinesh_uprety_0', 'dynamic_hacker', 'assets/images/emoji/003-happy.png', 'emoji', '2020-10-21 05:04:39', 'yes', 'yes', 'no'),
(12, 'dinesh_uprety_0', 'dynamic_hacker', 'bye nep', 'text', '2020-10-21 05:05:28', 'yes', 'yes', 'no'),
(13, 'dynamic_hacker', 'dinesh_uprety_0', 'bye', 'text', '2020-10-21 05:05:35', 'yes', 'yes', 'no'),
(14, 'dynamic_hacker', 'dinesh_uprety_0', 'assets/images/emoji/044-silly.png', 'emoji', '2020-10-21 05:05:48', 'yes', 'yes', 'no'),
(15, 'dinesh_uprety_0', 'dynamic_hacker', '5f8ffbad85edbIMG_3135.JPG', 'JPG', '2020-10-21 09:13:17', 'yes', 'yes', 'no'),
(16, 'dinesh_uprety_0', 'dynamic_hacker', 'assets/images/emoji/009-kiss.png', 'emoji', '2020-10-21 09:32:22', 'yes', 'yes', 'no'),
(17, 'dynamic_hacker', 'dinesh_uprety_0', '5f9000fa50cd0Dinesh Uprety.pdf', 'pdf', '2020-10-21 09:35:54', 'yes', 'yes', 'no'),
(18, 'dinesh_uprety_0', 'dynamic_hacker', 'assets/images/emoji/025-cool.png', 'emoji', '2020-10-21 09:36:44', 'yes', 'yes', 'no'),
(19, 'dynamic_hacker', 'dinesh_uprety_0', 'hey dinesh', 'text', '2020-10-23 06:58:37', 'yes', 'yes', 'no'),
(20, 'dinesh_uprety_0', 'dynamic_hacker', 'k gardai xas', 'text', '2020-10-23 06:58:48', 'yes', 'yes', 'no'),
(21, 'dinesh_uprety_0', 'dynamic_hacker', 'assets/images/emoji/004-happy.png', 'emoji', '2020-10-23 06:58:55', 'yes', 'yes', 'no'),
(22, 'dynamic_hacker', 'dinesh_uprety_0', '5f927f44eef03IMG_3135.JPG', 'JPG', '2020-10-23 06:59:16', 'yes', 'yes', 'no'),
(23, 'dynamic_hacker', 'dinesh_uprety_0', '5f927f5688607Dinesh Uprety.pdf', 'pdf', '2020-10-23 06:59:34', 'yes', 'yes', 'no'),
(24, 'dynamic_hacker', 'dinesh_uprety_0', 'hey nep', 'text', '2020-10-30 07:01:29', 'yes', 'yes', 'no'),
(25, 'dynamic_hacker', 'dinesh_uprety_0', 'assets/images/emoji/007-tongue out.png', 'emoji', '2020-10-30 07:01:38', 'yes', 'yes', 'no'),
(26, 'dinesh_uprety_0', 'dynamic_hacker', 'assets/images/emoji/009-kiss.png', 'emoji', '2020-10-30 07:01:46', 'yes', 'yes', 'no'),
(27, 'dinesh_uprety', 'dinesh_uprety_0', 'assets/images/emoji/006-in love.png', 'emoji', '2020-10-30 07:03:35', 'yes', 'yes', 'no'),
(28, 'dinesh_uprety', 'dinesh_uprety_0', '5f9bbb092f963Modern+Javascript+2020+Notes.pdf', 'pdf', '2020-10-30 07:04:41', 'yes', 'yes', 'no'),
(29, 'dinesh_uprety_0', 'dinesh_uprety', 'hwy', 'text', '2020-11-21 07:01:01', 'yes', 'yes', 'no'),
(30, 'dinesh_uprety_0', 'dinesh_uprety', '5fc5d4eb8d9a6chart.png', 'png', '2020-12-01 05:30:19', 'yes', 'yes', 'no'),
(31, 'dinesh_uprety', 'dinesh_uprety_0', 'hey dinesh', 'text', '2020-12-01 05:31:41', 'yes', 'yes', 'no'),
(32, 'dynamic_hacker', 'dinesh_uprety_0', 'assets/images/emoji/025-cool.png', 'emoji', '2020-12-01 05:34:21', 'yes', 'yes', 'no'),
(33, 'dinesh_uprety', 'dinesh_uprety_0', 'assets/images/emoji/041-lie.png', 'emoji', '2020-12-01 05:35:23', 'yes', 'yes', 'no'),
(34, 'dinesh_uprety', 'dinesh_uprety_0', 'try 1', 'text', '2020-12-01 05:39:39', 'yes', 'yes', 'no'),
(35, 'dinesh_uprety_0', 'dinesh_uprety', 'hey', 'text', '2020-12-07 15:16:51', 'yes', 'yes', 'no'),
(36, 'dinesh_uprety_0', 'dinesh_uprety', 'hello', 'text', '2020-12-07 15:35:51', 'yes', 'yes', 'no'),
(37, 'dynamic_hacker', 'dinesh_uprety', 'hey', 'text', '2020-12-07 15:41:57', 'yes', 'yes', 'no'),
(38, 'dynamic_hacker', 'dinesh_uprety', 'assets/images/emoji/008-confused.png', 'emoji', '2020-12-07 16:06:36', 'yes', 'yes', 'no'),
(39, 'dinesh_uprety', 'dynamic_hacker', 'k gardai', 'text', '2020-12-07 16:22:24', 'yes', 'yes', 'no'),
(40, 'dynamic_hacker', 'dinesh_uprety', 'oa', 'text', '2020-12-08 05:19:29', 'yes', 'yes', 'no'),
(41, 'dinesh_uprety', 'dinesh_uprety_0', 'oa', 'text', '2020-12-08 05:20:12', 'yes', 'yes', 'no'),
(42, 'dinesh_uprety_0', 'dinesh_uprety', 'assets/images/emoji/009-kiss.png', 'emoji', '2020-12-08 05:26:17', 'yes', 'yes', 'no'),
(43, 'dinesh_uprety_0', 'dinesh_uprety', 'assets/images/emoji/009-kiss.png', 'emoji', '2020-12-08 05:26:26', 'yes', 'yes', 'no'),
(44, 'dinesh_uprety_0', 'dinesh_uprety', 'assets/images/emoji/042-ghost.png', 'emoji', '2020-12-08 05:43:14', 'yes', 'yes', 'no'),
(45, 'dinesh_uprety', 'dynamic_hacker', 'hey dinesh', 'text', '2020-12-08 05:44:39', 'yes', 'yes', 'no'),
(46, 'dinesh_uprety_0', 'dynamic_hacker', 'assets/images/emoji/008-confused.png', 'emoji', '2020-12-08 05:45:35', 'yes', 'yes', 'no'),
(47, 'dynamic_hacker', 'dinesh_uprety', 'hello', 'text', '2020-12-08 05:46:38', 'yes', 'yes', 'no'),
(48, 'dinesh_uprety_0', 'dinesh_uprety', 'assets/images/emoji/003-happy.png', 'emoji', '2020-12-08 05:49:43', 'yes', 'yes', 'no'),
(49, 'dinesh_uprety_0', 'dinesh_uprety', 'k ghardai xas', 'text', '2020-12-08 05:53:16', 'yes', 'yes', 'no'),
(50, 'dinesh_uprety_0', 'dynamic_hacker', 'oa', 'text', '2020-12-08 05:54:06', 'yes', 'yes', 'no'),
(51, 'dinesh_uprety_0', 'dinesh_uprety', 'hello nep', 'text', '2020-12-08 10:13:31', 'yes', 'yes', 'no'),
(52, 'dinesh_uprety_0', 'dinesh_uprety', 'assets/images/emoji/044-silly.png', 'emoji', '2020-12-19 08:05:38', 'yes', 'yes', 'no'),
(53, 'dinesh_uprety_0', 'dinesh_uprety', '5fe196857c99169279123_362428057979862_9168113077818753024_n.jpg', 'jpg', '2020-12-22 06:47:33', 'yes', 'yes', 'no'),
(54, 'dinesh_uprety', 'dinesh_uprety_0', 'assets/images/emoji/004-happy.png', 'emoji', '2020-12-22 06:48:55', 'yes', 'yes', 'no'),
(55, 'dinesh_uprety_0', 'dinesh_uprety', 'oa jama', 'text', '2020-12-22 06:49:07', 'yes', 'yes', 'no'),
(56, 'dinesh_uprety_0', 'dinesh_uprety', 'assets/images/emoji/001-smile.png', 'emoji', '2020-12-27 10:07:52', 'yes', 'yes', 'no'),
(57, 'dinesh_uprety', 'dinesh_uprety_0', 'assets/images/emoji/008-confused.png', 'emoji', '2020-12-27 10:09:23', 'yes', 'yes', 'no'),
(58, 'dinesh_uprety_0', 'dinesh_uprety', 'assets/images/emoji/005-neutral.png', 'emoji', '2021-01-03 03:35:58', 'yes', 'yes', 'no'),
(59, 'dynamic_hacker', 'dinesh_uprety_0', 'assets/images/emoji/044-silly.png', 'emoji', '2021-01-03 03:42:17', 'no', 'yes', 'no'),
(60, 'dinesh_uprety_0', 'dinesh_uprety', 'hey nep', 'text', '2021-01-10 06:45:10', 'yes', 'yes', 'no'),
(61, 'dinesh_uprety', 'dinesh_uprety_0', 'hey', 'text', '2021-01-10 06:45:30', 'yes', 'yes', 'no'),
(62, 'dinesh_uprety_0', 'dinesh_uprety', '5ffaa2a125efdchart.png', 'png', '2021-01-10 06:45:53', 'yes', 'yes', 'no'),
(63, 'dynamic_hacker', 'dinesh_uprety', 'hey', 'text', '2021-01-27 12:48:19', 'yes', 'yes', 'no'),
(64, 'dynamic_hacker', 'dinesh_uprety', 'oee muji k xa', 'text', '2021-01-29 08:12:58', 'yes', 'yes', 'no'),
(65, 'dinesh_uprety', 'dynamic_hacker', 'thik xa', 'text', '2021-01-29 08:13:13', 'yes', 'yes', 'no'),
(66, 'dinesh_uprety', 'dynamic_hacker', 'hi', 'text', '2021-01-29 08:13:30', 'yes', 'yes', 'no'),
(67, 'dynamic_hacker', 'dinesh_uprety', 'assets/images/emoji/001-smile.png', 'emoji', '2021-01-29 08:13:57', 'yes', 'yes', 'no'),
(68, 'dynamic_hacker', 'dinesh_uprety', '6013c3eda74abttt.zip', 'zip', '2021-01-29 08:14:37', 'yes', 'yes', 'no'),
(69, 'dinesh_uprety_0', 'dinesh_uprety', 'hjh', 'text', '2021-01-29 08:38:14', 'no', 'no', 'no'),
(70, 'dinesh_uprety_0', 'dinesh_uprety', 'hey', 'text', '2021-01-31 03:43:18', 'no', 'no', 'no'),
(71, 'dinesh_uprety_0', 'dinesh_uprety', '<>', 'text', '2021-01-31 22:27:04', 'no', 'no', 'no'),
(72, 'dinesh_uprety', 'dynamic_hacker', 'hey', 'text', '2021-02-01 15:22:17', 'yes', 'yes', 'no'),
(73, 'dynamic_hacker', 'dinesh_uprety', 'hello', 'text', '2021-02-01 15:22:31', 'yes', 'yes', 'no'),
(74, 'dinesh_uprety_0', 'dinesh_uprety', 'assets/images/emoji/031-angry.png', 'emoji', '2021-02-01 15:28:15', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skills_id` int(11) NOT NULL,
  `skills_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skills_id`, `skills_name`) VALUES
(1, 'IOT(Internet of things)'),
(2, 'Eithcal hacking'),
(3, 'Programming'),
(4, 'node.js');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `byshare_profile_details`
--
ALTER TABLE `byshare_profile_details`
  ADD PRIMARY KEY (`byshare_profile_details_id`);

--
-- Indexes for table `byshare_users`
--
ALTER TABLE `byshare_users`
  ADD PRIMARY KEY (`byshare_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skills_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `byshare_profile_details`
--
ALTER TABLE `byshare_profile_details`
  MODIFY `byshare_profile_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `byshare_users`
--
ALTER TABLE `byshare_users`
  MODIFY `byshare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skills_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
